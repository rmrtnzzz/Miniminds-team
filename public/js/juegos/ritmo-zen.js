const LEVELS = [
  {name:"Brisa suave",bpm:28,notes:12,breath:"Respira profundo 3 veces",breathDetail:"Inhala por la nariz 4 segundos, sostén 4, exhala 6."},
  {name:"Lluvia tranquila",bpm:35,notes:16,breath:"Técnica 4-7-8",breathDetail:"Inhala 4 seg, sostén 7 seg, exhala por la boca 8 seg."},
  {name:"Viento entre árboles",bpm:42,notes:18,breath:"Respiración cuadrada",breathDetail:"Inhala 4, sostén 4, exhala 4, sostén 4. Repite 3 veces."},
  {name:"Océano en calma",bpm:50,notes:20,breath:"Respiración diafragmática",breathDetail:"Pon la mano en el vientre. Respira inflando el vientre, no el pecho."},
];

let state = {
  running:false, score:0, combo:0, maxCombo:0,
  totalNotes:0, hitNotes:0, level:0,
  notes:[], noteId:0, lastBeat:0, beatIndex:0,
  pattern:[], notesFired:0,
};

const canvas = document.getElementById('rz-canvas');
const ctx3 = canvas.getContext('2d');
let particles3D = [];

function resize3D(){
  canvas.width = canvas.offsetWidth;
  canvas.height = canvas.offsetHeight;
}
resize3D();
window.addEventListener('resize', resize3D);

function rnd(a,b){return a+Math.random()*(b-a)}

function init3D(){
  particles3D = [];
  for(let i=0;i<120;i++){
    particles3D.push({
      x: rnd(0,canvas.width), y: rnd(0,canvas.height),
      z: rnd(0.1,1), vx:rnd(-0.3,0.3), vy:rnd(-0.5,-0.1),
      size:rnd(1,4), hue:rnd(220,300), alpha:rnd(0.3,0.9),
      pulse:rnd(0,Math.PI*2), pulseSpeed:rnd(0.01,0.04)
    });
  }
}
init3D();

let wave = 0;
function draw3D(){
  const W=canvas.width, H=canvas.height;
  ctx3.clearRect(0,0,W,H);

  
  const grd = ctx3.createRadialGradient(W/2,H/2,0,W/2,H/2,Math.max(W,H)*0.7);
  grd.addColorStop(0,'#1a0035');
  grd.addColorStop(0.5,'#0d0025');
  grd.addColorStop(1,'#050010');
  ctx3.fillStyle = grd;
  ctx3.fillRect(0,0,W,H);

  wave += 0.015;

  
  for(let r=0;r<4;r++){
    ctx3.beginPath();
    const hue = 260 + r*25;
    ctx3.strokeStyle = `hsla(${hue},80%,60%,${0.06+r*0.02})`;
    ctx3.lineWidth = 2;
    for(let x=0;x<=W;x+=4){
      const y = H*0.5 + Math.sin(x*0.008 + wave + r*0.8)*80 + Math.sin(x*0.015 - wave*0.7)*40;
      x===0?ctx3.moveTo(x,y):ctx3.lineTo(x,y);
    }
    ctx3.stroke();
  }

  
  particles3D.forEach(p=>{
    p.x += p.vx * p.z;
    p.y += p.vy * p.z;
    p.pulse += p.pulseSpeed;
    if(p.y < -10) p.y = H+10;
    if(p.x<0) p.x=W; if(p.x>W) p.x=0;
    const s = p.size * p.z * (1 + Math.sin(p.pulse)*0.3);
    const a = p.alpha * p.z;
    ctx3.beginPath();
    ctx3.arc(p.x, p.y, s, 0, Math.PI*2);
    ctx3.fillStyle = `hsla(${p.hue},80%,70%,${a})`;
    ctx3.fill();
    
    ctx3.beginPath();
    ctx3.arc(p.x, p.y, s*2.5, 0, Math.PI*2);
    ctx3.fillStyle = `hsla(${p.hue},80%,70%,${a*0.1})`;
    ctx3.fill();
  });

  
  const laneX = [canvas.width/2-270+67, canvas.width/2-270+202, canvas.width/2-270+337, canvas.width/2-270+472];
  laneX.forEach((x,i)=>{
    const colors=['#ff6b9d','#a78bfa','#34d399','#fbbf24'];
    ctx3.beginPath();
    ctx3.moveTo(x, H);
    ctx3.lineTo(x, 0);
    ctx3.strokeStyle = colors[i]+'20';
    ctx3.lineWidth = 60;
    ctx3.stroke();
    ctx3.beginPath();
    ctx3.moveTo(x, H);
    ctx3.lineTo(x, 0);
    ctx3.strokeStyle = colors[i]+'08';
    ctx3.lineWidth = 2;
    ctx3.stroke();
  });
}

const COLS = [0,1,2,3];
const COLORS = ['col0','col1','col2','col3'];
const EMOJIS = ['♥','✦','✿','★'];

function generatePattern(n){
  const pat=[];
  for(let i=0;i<n;i++) pat.push(Math.floor(Math.random()*4));
  return pat;
}

function rzStart(){
  document.getElementById('rz-start-panel').style.display='none';
  state.level=0;
  rzStartLevel();
}

function rzStartLevel(){
  const lv = LEVELS[state.level];
  document.getElementById('rz-level').textContent = state.level+1;
  state.pattern = generatePattern(lv.notes);
  state.notesFired=0; state.notes=[]; state.beatIndex=0;
  state.running=true;
  document.getElementById('rz-notes-layer').innerHTML='';
  document.getElementById('rz-level-box').querySelector('div:last-child').textContent = state.level+1;
  state.lastBeat = performance.now();
  requestAnimationFrame(gameLoop);
}

let animFrame;
function gameLoop(ts){
  draw3D();
  if(!state.running){animFrame=requestAnimationFrame(gameLoop);return;}
  const lv = LEVELS[state.level];
  const beatMs = 60000/lv.bpm;

  
  if(state.notesFired < state.pattern.length && ts - state.lastBeat >= beatMs){
    const col = state.pattern[state.notesFired];
    spawnNote(col);
    state.notesFired++;
    state.lastBeat = ts;
    state.totalNotes++;
  }

  
  const layer = document.getElementById('rz-lane-area');
  const laneH = layer.offsetHeight - 160;
  state.notes.forEach(n=>{
    if(n.dead) return;
    const el = document.getElementById('note-'+n.id);
    if(!el) return;
    n.y += n.speed;
    el.style.top = n.y+'px';
    if(n.y > laneH){
      n.dead=true;
      el.remove();
      missNote();
    }
  });

  
  if(state.notesFired >= state.pattern.length && state.notes.filter(n=>!n.dead).length===0){
    state.running=false;
    setTimeout(()=>showBreath(lv), 400);
  }

  animFrame=requestAnimationFrame(gameLoop);
}

function spawnNote(col){
  const id = state.noteId++;
  const el = document.createElement('div');
  el.className = `rz-note ${COLORS[col]}`;
  el.id = 'note-'+id;
  el.textContent = EMOJIS[col];
  const lane = document.getElementById('rz-notes-layer');
  lane.appendChild(el);
  const lv = LEVELS[state.level];
  state.notes.push({id, col, y:0, speed: 0.6 + lv.bpm/120, dead:false});
}

function rzTap(col){
  if(!state.running) return;
  
  const laneH = document.getElementById('rz-lane-area').offsetHeight - 160;
  const closest = state.notes
    .filter(n=>!n.dead && n.col===col)
    .sort((a,b)=>b.y-a.y)[0];
  if(!closest) return missNote();

  const dist = Math.abs(closest.y - (laneH - 40));
  if(dist < 80){
    hitNote(closest, dist);
  } else {
    missNote();
  }

  
  const hz = document.getElementById('hz'+col);
  hz.classList.add('hit');
  setTimeout(()=>hz.classList.remove('hit'),120);
}

function hitNote(n, dist){
  n.dead=true;
  const el=document.getElementById('note-'+n.id);
  if(el) el.remove();
  state.hitNotes++;
  state.combo++;
  if(state.combo>state.maxCombo) state.maxCombo=state.combo;
  const pts = dist<30?150:dist<60?100:70;
  state.score += pts * Math.max(1, Math.floor(state.combo/5));
  document.getElementById('rz-score').textContent = state.score;
  document.getElementById('rz-combo-disp').textContent = state.combo+'x';
  document.getElementById('rz-combo-fill').style.width = Math.min(100, state.combo*5)+'%';
  const msgs = dist<30?['¡PERFECTO! ✨','¡GENIAL! 💫']:['¡BIEN! 🎵','¡COOL! 🌊'];
  showFeedback(msgs[Math.floor(Math.random()*msgs.length)], '#b8a0ff');
  spawnParticles(n.col);
}

function missNote(){
  state.combo=0;
  document.getElementById('rz-combo-disp').textContent='0x';
  document.getElementById('rz-combo-fill').style.width='0%';
  showFeedback('...', '#ffffff66');
}

function showFeedback(txt,color){
  const el=document.getElementById('rz-feedback');
  el.textContent=txt; el.style.color=color;
  el.classList.add('show');
  setTimeout(()=>el.classList.remove('show'),600);
}

function spawnParticles(col){
  const colors=['#ff6b9d','#a78bfa','#34d399','#fbbf24'];
  const c = colors[col];
  const wrap = document.getElementById('rz-wrap');
  for(let i=0;i<8;i++){
    const p=document.createElement('div');
    const dx=(Math.random()-0.5)*100, dy=(Math.random()-1)*100;
    p.style.cssText=`position:absolute;width:8px;height:8px;border-radius:50%;background:${c};left:50%;top:55%;--dx:${dx}px;--dy:${dy}px`;
    p.classList.add('rz-particle');
    wrap.appendChild(p);
    setTimeout(()=>p.remove(),600);
  }
}

let breathTimer, breathPhase=0;
function showBreath(lv){
  document.getElementById('rz-breath-panel').style.display='flex';
  document.getElementById('rz-breath-title').textContent=lv.breath;
  document.getElementById('rz-breath-desc').textContent=lv.breathDetail;
  animateBreath();
}

function animateBreath(){
  const circle=document.getElementById('rz-breath-circle');
  const txt=document.getElementById('rz-breath-text');
  const phases=[
    {scale:'120px',shadow:'0 0 80px #6d28d9',text:'Inhala... 😮‍💨',dur:4000},
    {scale:'80px',shadow:'0 0 30px #6d28d9',text:'Sostén... 😤',dur:4000},
    {scale:'60px',shadow:'0 0 15px #3b0764',text:'Exhala... 😮‍💨',dur:6000},
  ];
  let i=0;
  function step(){
    const ph=phases[i%3];
    circle.style.width=ph.scale; circle.style.height=ph.scale;
    circle.style.boxShadow=ph.shadow; txt.textContent=ph.text;
    i++;
    breathTimer=setTimeout(step, ph.dur);
  }
  step();
}

function rzEndBreath(){
  clearTimeout(breathTimer);
  document.getElementById('rz-breath-panel').style.display='none';
  state.level++;
  if(state.level >= LEVELS.length){
    rzEndGame();
  } else {
    rzStartLevel();
  }
}

function rzEndGame(){
  const acc = state.totalNotes>0?Math.round(state.hitNotes/state.totalNotes*100):0;
  document.getElementById('rz-end-score').textContent=state.score;
  document.getElementById('rz-end-acc').textContent=acc+'%';
  document.getElementById('rz-end-combo').textContent=state.maxCombo;
  const msgs = acc>80?'¡Increíble! Eres un maestro de la calma. 🌟':
                acc>50?'¡Muy bien! La práctica te llevará más lejos. 🎵':
                '¡Sigue intentando! Cada vez te relajas más. 🌊';
  document.getElementById('rz-end-msg').textContent=msgs;
  document.getElementById('rz-end-panel').style.display='flex';
}

function rzReset(){
  document.getElementById('rz-end-panel').style.display='none';
  state={running:false,score:0,combo:0,maxCombo:0,totalNotes:0,hitNotes:0,level:0,notes:[],noteId:0,lastBeat:0,beatIndex:0,pattern:[],notesFired:0};
  document.getElementById('rz-score').textContent='0';
  document.getElementById('rz-combo-disp').textContent='0x';
  document.getElementById('rz-notes-layer').innerHTML='';
  document.getElementById('rz-start-panel').style.display='flex';
}

document.addEventListener('keydown',e=>{
  if(!state.running) return;
  const map={d:0,f:1,j:2,k:3};
  if(map[e.key.toLowerCase()]!==undefined) rzTap(map[e.key.toLowerCase()]);
});

requestAnimationFrame(function loop(){draw3D();if(!state.running)requestAnimationFrame(loop);});

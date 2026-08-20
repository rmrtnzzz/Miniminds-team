const SITUATIONS = [
  {
    emoji:'😤', text:'Tu amigo/a rompió tu juguete favorito sin querer y no te pidió disculpas.',
    options:[
      {text:'🤬 Empujarlo y gritarle',good:false,feedback:'Lastimar a alguien nunca resuelve el problema. Puede hacerlo sentir peor y alejarte de tu amigo.'},
      {text:'🗣️ Decirle cómo me siento',good:true,feedback:'¡Genial! Hablar de tus emociones es muy valiente. Puedes decir: "Me sentí triste porque ese juguete era especial para mí."'},
      {text:'😤 Romper algo de él',good:false,feedback:'Hacer daño a cambio de daño no te hará sentir mejor. Busca una forma de expresar lo que sientes sin hacerle daño a nadie.'},
      {text:'🧘 Respirar y esperar',good:true,feedback:'¡Excelente! Calmarte antes de actuar es una habilidad muy importante. Así puedes pensar con claridad.'},
    ]
  },
  {
    emoji:'😟', text:'Sacaste mala nota en un examen y sientes que no sirves para nada.',
    options:[
      {text:'📚 Pedir ayuda al profe',good:true,feedback:'¡Muy inteligente! Pedir ayuda cuando la necesitas es señal de fortaleza, no de debilidad.'},
      {text:'✏️ Rayar y romper el examen',good:false,feedback:'Destruir cosas cuando estamos frustrados no nos ayuda a mejorar. Mejor guarda esa energía para estudiar más.'},
      {text:'😴 Esconderme y no hablar',good:false,feedback:'Guardar todo por dentro puede hacerte sentir peor con el tiempo. Hablar con alguien de confianza siempre ayuda.'},
      {text:'💪 Intentarlo de nuevo',good:true,feedback:'¡Eso es! Una mala nota no define quién eres. Cada error es una oportunidad de aprender algo nuevo.'},
    ]
  },
  {
    emoji:'😔', text:'Alguien en el recreo se burló de ti y te sientes muy mal por dentro.',
    options:[
      {text:'👊 Pelearme con esa persona',good:false,feedback:'Pelear puede lastimarte a ti también y traer consecuencias. Hay formas más seguras de protegerte.'},
      {text:'🧑‍🏫 Contarle a un adulto de confianza',good:true,feedback:'¡Muy bien! Pedir apoyo a un adulto cuando alguien nos hace daño es lo correcto y lo más valiente.'},
      {text:'🎨 Dibujar cómo me siento',good:true,feedback:'¡Excelente! El arte es una forma poderosa de sacar las emociones difíciles de forma segura y creativa.'},
      {text:'😶 No decirle a nadie',good:false,feedback:'Cargar eso solo puede ser muy pesado. Mereces apoyo y nadie debería aguantar el bullying en silencio.'},
    ]
  },
  {
    emoji:'😠', text:'Estás muy enojado/a y sientes que quieres hacer algo que te pueda lastimar.',
    options:[
      {text:'🌬️ Respirar profundo 10 veces',good:true,feedback:'¡Perfecto! La respiración profunda activa tu sistema de calma. Inhala por la nariz, exhala despacio por la boca.'},
      {text:'🆘 Buscar a alguien en quien confíe',good:true,feedback:'¡Muy bien! Cuando las emociones se sienten muy grandes, hablar con alguien de confianza siempre es la mejor opción.'},
      {text:'🤕 Lastimar mi cuerpo',good:false,feedback:'Tu cuerpo es precioso y merece cuidado. Lastimarte nunca resuelve el dolor — existe ayuda y siempre hay alguien dispuesto a escucharte.'},
      {text:'🏃 Correr o moverme',good:true,feedback:'¡Excelente! El movimiento libera tensión de forma segura. Caminar, saltar o bailar ayuda al cerebro a calmarse.'},
    ]
  },
  {
    emoji:'😰', text:'Tienes que hablar en clase y el corazón te late muy rápido de los nervios.',
    options:[
      {text:'🙈 Fingir que estoy enfermo',good:false,feedback:'Evitar las cosas que nos dan miedo hace que el miedo crezca. Enfrentarlo poco a poco, con apoyo, es lo que funciona.'},
      {text:'💨 Respirar y recordar que puedo',good:true,feedback:'¡Eso es! Recordarte a ti mismo que has superado cosas difíciles antes te da fuerza. ¡Tú puedes!'},
      {text:'🧑‍🤝‍🧑 Pedirle apoyo a un amigo',good:true,feedback:'¡Muy bien! Apoyarnos en los demás en momentos difíciles es inteligente y valiente.'},
      {text:'😤 Enojarme con todos',good:false,feedback:'El enojo no suele venir solo — a veces esconde miedo o tristeza. Trata de identificar qué sientes realmente.'},
    ]
  },
  {
    emoji:'😢', text:'Extrañas mucho a alguien y sientes un hueco grande en el pecho.',
    options:[
      {text:'✍️ Escribir o dibujar lo que siento',good:true,feedback:'¡Genial! Expresar el dolor a través del arte o la escritura es una de las formas más saludables de procesarlo.'},
      {text:'📵 No comer ni dormir',good:false,feedback:'Cuando estamos tristes, el cuerpo necesita aún más cuidado. Dormir, comer y moverse ayudan al cerebro a sanar.'},
      {text:'🤗 Hablar con alguien de confianza',good:true,feedback:'¡Exacto! Compartir la tristeza con alguien que te quiere la hace más liviana. No tienes que sentirla solo/a.'},
      {text:'😤 Encerrarme y no salir',good:false,feedback:'El aislamiento puede intensificar la tristeza. Un pequeño paseo o una conversación pueden hacer una gran diferencia.'},
    ]
  },
];

let viState = {
  idx:0, score:0, good:0, stress:20,
  answered:false
};

function viStart(){
  viState={idx:0,score:0,good:0,stress:20,answered:false};
  buildProgress();
  showScreen('vi-game');
  loadSituation();
  updateVolcan();
}

function buildProgress(){
  const p=document.getElementById('vi-progress');
  p.innerHTML='';
  SITUATIONS.forEach((_,i)=>{
    const d=document.createElement('div');
    d.className='vi-prog-dot'+(i===0?' current':'');
    d.id='pd-'+i;
    p.appendChild(d);
  });
}

function loadSituation(){
  const s=SITUATIONS[viState.idx];
  document.getElementById('vi-emoji').textContent=s.emoji;
  document.getElementById('vi-situation-text').textContent=s.text;
  const opts=document.getElementById('vi-options');
  opts.innerHTML='';
  
  const shuffled=[...s.options].sort(()=>Math.random()-.5);
  shuffled.forEach((o,i)=>{
    const btn=document.createElement('button');
    btn.className='vi-opt';
    btn.textContent=o.text;
    btn.onclick=()=>viAnswer(o,btn);
    opts.appendChild(btn);
  });
  document.getElementById('vi-feedback-box').style.display='none';
  document.getElementById('vi-next-btn').style.display='none';
  viState.answered=false;
}

function viAnswer(opt,btn){
  if(viState.answered) return;
  viState.answered=true;

  const fb=document.getElementById('vi-feedback-box');
  if(opt.good){
    btn.classList.add('selected-good');
    fb.className='vi-feedback-box good';
    fb.innerHTML='✅ '+opt.feedback;
    viState.good++;
    viState.score+=100;
    viState.stress=Math.max(5, viState.stress-12);
  } else {
    btn.classList.add('selected-bad');
    fb.className='vi-feedback-box bad';
    fb.innerHTML='⚠️ '+opt.feedback;
    viState.stress=Math.min(95, viState.stress+18);
  }
  fb.style.display='block';
  document.getElementById('vi-next-btn').style.display='block';
  updateVolcan();
  updateProgress();
}

function updateVolcan(){
  const pct=viState.stress;
  const fill=document.getElementById('vi-stress-fill');
  fill.style.width=pct+'%';
  fill.style.background=pct<40?'#34d399':pct<70?'#fbbf24':'#ef4444';
  document.getElementById('vi-stress-pct').textContent=Math.round(pct)+'%';

  const lava=document.getElementById('vi-lava');
  const h=Math.max(0,(pct-30)*1.2);
  lava.style.height=h+'px';
  lava.style.opacity=pct>30?1:0;

  const sparks=document.getElementById('vi-sparks');
  sparks.innerHTML='';
  if(pct>60){
    for(let i=0;i<6;i++){
      const sp=document.createElement('div');
      sp.className='vi-spark';
      const ang=Math.random()*Math.PI*2;
      const r=20+Math.random()*40;
      sp.style.cssText=`--sx:${Math.cos(ang)*r}px;--sy:${-Math.sin(ang)*r-20}px;animation-delay:${Math.random()*.8}s;background:${Math.random()>.5?'#fbbf24':'#f97316'}`;
      sparks.appendChild(sp);
    }
  }
}

function updateProgress(){
  SITUATIONS.forEach((_,i)=>{
    const d=document.getElementById('pd-'+i);
    if(!d) return;
    d.className='vi-prog-dot'+(i<viState.idx?'done':i===viState.idx?'current':'');
  });
}

function viNext(){
  viState.idx++;
  if(viState.idx >= SITUATIONS.length){
    showScreen('vi-draw-screen');
  } else {
    updateProgress();
    loadSituation();
  }
}

function viGoToDraw(){
  showScreen('vi-draw-screen');
}

function viShowEnd(){
  const calma = Math.round(100 - viState.stress);
  document.getElementById('vi-end-good').textContent=viState.good;
  document.getElementById('vi-end-pts').textContent=viState.score;
  document.getElementById('vi-end-stress').textContent=calma+'%';
  const msgs=[
    [5,'¡Eres un/a experto/a en manejar emociones! Tu volcán está casi apagado. Sigues aprendiendo cosas increíbles sobre ti mismo/a. 🌟'],
    [3,'¡Muy bien! Estás aprendiendo a cuidarte. Cada vez que eliges una respuesta saludable, tu cerebro se fortalece. 💜'],
    [0,'Aprender a manejar emociones lleva tiempo. Lo importante es que lo estás intentando. ¡Sigue practicando! 🌱'],
  ];
  for(const[min,msg] of msgs){
    if(viState.good>=min){document.getElementById('vi-end-msg').textContent=msg;break;}
  }
  showScreen('vi-end-screen');
}

function viReset(){
  viStart();
}

let drawing=false, drawColor='#ef4444', drawSize=4, erasing=false;
const dc=document.getElementById('vi-draw-canvas');
const dctx=dc.getContext('2d');

function getPos(e,canvas){
  const r=canvas.getBoundingClientRect();
  const src=e.touches?e.touches[0]:e;
  return{x:src.clientX-r.left,y:src.clientY-r.top};
}

dc.addEventListener('mousedown',e=>{drawing=true;const p=getPos(e,dc);dctx.beginPath();dctx.moveTo(p.x,p.y)});
dc.addEventListener('mousemove',e=>{
  if(!drawing)return;
  const p=getPos(e,dc);
  dctx.lineTo(p.x,p.y);
  dctx.strokeStyle=erasing?'#ffffff':drawColor;
  dctx.lineWidth=erasing?drawSize*3:drawSize;
  dctx.lineCap='round';dctx.lineJoin='round';
  dctx.stroke();
  dctx.beginPath();dctx.moveTo(p.x,p.y);
});
dc.addEventListener('mouseup',()=>drawing=false);
dc.addEventListener('mouseleave',()=>drawing=false);

dc.addEventListener('touchstart',e=>{e.preventDefault();drawing=true;const p=getPos(e,dc);dctx.beginPath();dctx.moveTo(p.x,p.y)},{passive:false});
dc.addEventListener('touchmove',e=>{
  e.preventDefault();if(!drawing)return;
  const p=getPos(e,dc);
  dctx.lineTo(p.x,p.y);
  dctx.strokeStyle=erasing?'#ffffff':drawColor;
  dctx.lineWidth=erasing?drawSize*3:drawSize;
  dctx.lineCap='round';dctx.lineJoin='round';
  dctx.stroke();dctx.beginPath();dctx.moveTo(p.x,p.y);
},{passive:false});
dc.addEventListener('touchend',()=>drawing=false);

function viSetColor(c,el){
  drawColor=c; erasing=false;
  document.querySelectorAll('.vi-color-btn').forEach(b=>b.classList.remove('active'));
  el.classList.add('active');
  document.getElementById('vi-eraser-btn').textContent='🧹 Borrador';
}
function viSetSize(s,el){
  drawSize=s;
  document.querySelectorAll('.vi-size-btn').forEach(b=>b.classList.remove('active'));
  el.classList.add('active');
}
function viToggleEraser(el){
  erasing=!erasing;
  el.textContent=erasing?'✏️ Pincel':'🧹 Borrador';
  el.style.background=erasing?'#6d28d9':'rgba(255,255,255,.1)';
}
function viClearCanvas(){
  dctx.clearRect(0,0,dc.width,dc.height);
}

function showScreen(id){
  document.querySelectorAll('.vi-screen').forEach(s=>s.classList.remove('active'));
  document.getElementById(id).classList.add('active');
  window.scrollTo({top:0,behavior:'smooth'});
}

const lavaDemoEl=document.getElementById('vi-lava-demo');
let demoDir=1, demoH=0;
setInterval(()=>{
  demoH+=demoDir*2;
  if(demoH>60)demoDir=-1;
  if(demoH<0)demoDir=1;
  lavaDemoEl.style.height=demoH+'px';
  lavaDemoEl.style.opacity=demoH>0?1:0;
},50);

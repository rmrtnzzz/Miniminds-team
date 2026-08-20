const LEVELS = [
  {
    name: 'La mochila escolar',
    time: 60,
    tip: 'Organizar tu mochila cada noche te ayuda a sentirte más tranquilo/a por la mañana.',
    zones: [
      {id:'libros', label:'📚 Libros y cuadernos', color:'#818cf8'},
      {id:'utiles', label:'✏️ Útiles', color:'#38bdf8'},
      {id:'lonchera', label:'🥪 Lonchera', color:'#34d399'},
    ],
    items: [
      {id:'cuaderno',   emoji:'📓', label:'Cuaderno',    zone:'libros'},
      {id:'libro',      emoji:'📕', label:'Libro',       zone:'libros'},
      {id:'lapiz',      emoji:'✏️',  label:'Lápiz',       zone:'utiles'},
      {id:'regla',      emoji:'📏', label:'Regla',       zone:'utiles'},
      {id:'tijeras',    emoji:'✂️',  label:'Tijeras',     zone:'utiles'},
      {id:'sandwich',   emoji:'🥪', label:'Sandwich',    zone:'lonchera'},
      {id:'manzana',    emoji:'🍎', label:'Manzana',     zone:'lonchera'},
      {id:'borrador',   emoji:'🧹', label:'Borrador',    zone:'utiles'},
      {id:'colores',    emoji:'🖍️', label:'Colores',     zone:'utiles'},
    ]
  },
  {
    name: 'El cuarto',
    time: 70,
    tip: 'Un cuarto ordenado ayuda al cerebro a calmarse y concentrarse mejor antes de dormir.',
    zones: [
      {id:'cama',     label:'🛏️ En la cama',      color:'#a78bfa'},
      {id:'closet',   label:'👕 En el closet',    color:'#f9a8d4'},
      {id:'escritorio', label:'🖥️ Escritorio',   color:'#fbbf24'},
      {id:'juguetes', label:'🧸 Juguetes',        color:'#34d399'},
    ],
    items: [
      {id:'almohada',   emoji:'🛌', label:'Almohada',   zone:'cama'},
      {id:'cobija',     emoji:'🧣', label:'Cobija',     zone:'cama'},
      {id:'camisa',     emoji:'👕', label:'Camisa',     zone:'closet'},
      {id:'zapatos',    emoji:'👟', label:'Zapatos',    zone:'closet'},
      {id:'lapicero',   emoji:'🖊️', label:'Lapicero',   zone:'escritorio'},
      {id:'tarea',      emoji:'📄', label:'Tarea',      zone:'escritorio'},
      {id:'osito',      emoji:'🧸', label:'Osito',      zone:'juguetes'},
      {id:'lego',       emoji:'🧱', label:'Legos',      zone:'juguetes'},
      {id:'rompecabezas',emoji:'🧩',label:'Puzzle',     zone:'juguetes'},
      {id:'pantalon',   emoji:'👖', label:'Pantalón',   zone:'closet'},
    ]
  },
  {
    name: 'La cocina',
    time: 75,
    tip: 'Ayudar en casa a ordenar nos hace sentir útiles y parte del equipo familiar.',
    zones: [
      {id:'nevera',   label:'🧊 Nevera',         color:'#38bdf8'},
      {id:'alacena',  label:'🫙 Alacena',        color:'#f97316'},
      {id:'fregadero',label:'🚿 Fregadero',      color:'#34d399'},
      {id:'mesa',     label:'🍽️ Mesa',           color:'#fbbf24'},
    ],
    items: [
      {id:'leche',    emoji:'🥛', label:'Leche',        zone:'nevera'},
      {id:'jugo',     emoji:'🧃', label:'Jugo',         zone:'nevera'},
      {id:'queso',    emoji:'🧀', label:'Queso',        zone:'nevera'},
      {id:'arroz',    emoji:'🍚', label:'Arroz',        zone:'alacena'},
      {id:'frijoles', emoji:'🫘', label:'Frijoles',     zone:'alacena'},
      {id:'vaso',     emoji:'🥤', label:'Vaso sucio',   zone:'fregadero'},
      {id:'plato',    emoji:'🍽️', label:'Plato sucio',  zone:'fregadero'},
      {id:'tenedor',  emoji:'🍴', label:'Tenedor',      zone:'mesa'},
      {id:'sal',      emoji:'🧂', label:'Sal',          zone:'alacena'},
      {id:'manzana2', emoji:'🍎', label:'Manzana',      zone:'nevera'},
    ]
  },
  {
    name: 'El baño',
    time: 65,
    tip: 'Mantener el baño ordenado es un acto de cuidado hacia ti mismo/a y tu familia.',
    zones: [
      {id:'ducha',    label:'🚿 Ducha',          color:'#38bdf8'},
      {id:'lavabo',   label:'🪥 Lavabo',         color:'#818cf8'},
      {id:'botiquin', label:'💊 Botiquín',       color:'#f87171'},
      {id:'toallero', label:'🧺 Toallero',       color:'#34d399'},
    ],
    items: [
      {id:'shampoo',  emoji:'🧴', label:'Shampoo',      zone:'ducha'},
      {id:'esponja',  emoji:'🧽', label:'Esponja',      zone:'ducha'},
      {id:'jabon',    emoji:'🧼', label:'Jabón',        zone:'lavabo'},
      {id:'cepillo',  emoji:'🪥', label:'Cepillo',      zone:'lavabo'},
      {id:'pasta',    emoji:'🦷', label:'Pasta dental', zone:'lavabo'},
      {id:'curitas',  emoji:'🩹', label:'Curitas',      zone:'botiquin'},
      {id:'medicina', emoji:'💊', label:'Medicina',     zone:'botiquin'},
      {id:'toalla1',  emoji:'🧻', label:'Toalla',       zone:'toallero'},
      {id:'toalla2',  emoji:'🧣', label:'Paño de manos',zone:'toallero'},
    ]
  },
];

const TIPS_GENERAL = [
  'Ordenar un poco cada día evita que el desorden se acumule y abrume.',
  'Cuando todo tiene su lugar, es más fácil encontrar las cosas y sentirse tranquilo/a.',
  'El orden externo ayuda a crear orden interno — ¡tu mente lo agradece!',
];

let gState = {
  level:0, score:0, correctTotal:0, levelsCompleted:0,
  timer:60, timerInterval:null,
  correctInLevel:0, totalInLevel:0,
  dragItem:null, selectedItem:null,
};

function goStart(){
  gState={level:0,score:0,correctTotal:0,levelsCompleted:0,timer:60,timerInterval:null,correctInLevel:0,totalInLevel:0,dragItem:null,selectedItem:null};
  document.getElementById('go-score-val').textContent='0';
  document.getElementById('go-correct-val').textContent='0';
  showGoScreen('go-game');
  buildLevelDots();
  loadLevel();
}

function buildLevelDots(){
  const c=document.getElementById('go-dots');
  c.innerHTML='';
  LEVELS.forEach((_,i)=>{
    const d=document.createElement('div');
    d.className='go-ld'+(i===0?' active':'');
    d.id='gd-'+i;
    c.appendChild(d);
  });
}

function updateDots(){
  LEVELS.forEach((_,i)=>{
    const d=document.getElementById('gd-'+i);
    if(!d) return;
    d.className='go-ld'+(i<gState.level?' done':i===gState.level?' active':'');
  });
}

function loadLevel(){
  const lv=LEVELS[gState.level];
  document.getElementById('go-level-val').textContent=gState.level+1;
  document.getElementById('go-lvl-complete').style.display='none';
  gState.correctInLevel=0;
  gState.totalInLevel=lv.items.length;
  gState.timer=lv.time;
  updateTimerDisplay();
  updateDots();

  
  const chaos=document.getElementById('go-chaos');
  chaos.innerHTML='';
  const shuffled=[...lv.items].sort(()=>Math.random()-.5);
  shuffled.forEach(item=>chaos.appendChild(buildItem(item, lv)));

  
  const zones=document.getElementById('go-zones');
  zones.innerHTML='';
  lv.zones.forEach(z=>{
    const div=document.createElement('div');
    div.className='go-drop-zone';
    div.id='zone-'+z.id;
    div.innerHTML=`<div class="dz-label" style="color:${z.color}">${z.label}</div>`;
    div.style.borderColor=z.color+'44';

    div.addEventListener('dragover',e=>{e.preventDefault();div.classList.add('drag-over')});
    div.addEventListener('dragleave',()=>div.classList.remove('drag-over'));
    div.addEventListener('drop',e=>{
      e.preventDefault();
      div.classList.remove('drag-over');
      if(gState.dragItem) dropItem(gState.dragItem, z.id);
    });
    div.addEventListener('click',()=>{
      if(gState.selectedItem) dropItem(gState.selectedItem, z.id);
    });
    zones.appendChild(div);
  });

  
  chaos.addEventListener('dragover',e=>{e.preventDefault();chaos.classList.add('drag-over')});
  chaos.addEventListener('dragleave',()=>chaos.classList.remove('drag-over'));
  chaos.addEventListener('drop',e=>{e.preventDefault();chaos.classList.remove('drag-over')});

  startTimer();
}

function buildItem(item, lv){
  const el=document.createElement('div');
  el.className='go-item';
  el.id='item-'+item.id;
  el.draggable=true;
  const zone=lv.zones.find(z=>z.id===item.zone);
  el.style.background=zone?zone.color+'22':'rgba(255,255,255,.08)';
  el.style.borderColor=zone?zone.color+'55':'rgba(255,255,255,.15)';
  el.innerHTML=`<span style="font-size:20px">${item.emoji}</span><span>${item.label}</span>`;
  el.dataset.zone=item.zone;
  el.dataset.id=item.id;

  el.addEventListener('dragstart',()=>{
    gState.dragItem=item;
    el.classList.add('dragging');
    if(gState.selectedItem===item){gState.selectedItem=null;el.style.outline=''}
  });
  el.addEventListener('dragend',()=>{
    el.classList.remove('dragging');
    gState.dragItem=null;
  });
  el.addEventListener('click',()=>{
    if(gState.selectedItem===item){
      gState.selectedItem=null;
      el.style.outline='';
    } else {
      if(gState.selectedItem){
        const prev=document.getElementById('item-'+gState.selectedItem.id);
        if(prev) prev.style.outline='';
      }
      gState.selectedItem=item;
      el.style.outline='2px solid #818cf8';
      el.style.outlineOffset='2px';
    }
  });
  return el;
}

function dropItem(item, zoneId){
  const el=document.getElementById('item-'+item.id);
  if(!el) return;
  if(item.zone===zoneId){
    
    const zone=document.getElementById('zone-'+zoneId);
    el.classList.add('correct');
    el.style.outline='';
    el.draggable=false;
    el.style.cursor='default';
    el.onclick=null;
    zone.appendChild(el);
    gState.correctInLevel++;
    gState.correctTotal++;
    gState.score+=80+Math.floor(gState.timer*0.5);
    document.getElementById('go-score-val').textContent=gState.score;
    document.getElementById('go-correct-val').textContent=gState.correctTotal;
    showFloat('¡Correcto! ✨','#34d399');
    if(zone.querySelectorAll('.go-item').length===LEVELS[gState.level].items.filter(i=>i.zone===zoneId).length){
      zone.classList.add('complete');
    }
    if(gState.correctInLevel>=gState.totalInLevel) setTimeout(showLevelComplete,400);
  } else {
    el.classList.add('wrong');
    showFloat('Intenta otra vez 🤔','#fbbf24');
    setTimeout(()=>el.classList.remove('wrong'),400);
    gState.score=Math.max(0,gState.score-10);
    document.getElementById('go-score-val').textContent=gState.score;
  }
  gState.selectedItem=null;
  if(el) el.style.outline='';
  gState.dragItem=null;
}

function showLevelComplete(){
  clearInterval(gState.timerInterval);
  gState.levelsCompleted++;
  const lv=LEVELS[gState.level];
  const compl=document.getElementById('go-lvl-complete');
  const isLast=gState.level>=LEVELS.length-1;
  compl.querySelector('h3').textContent=isLast?'🏆 ¡Completaste todos los niveles!':'🎉 ¡Nivel completado!';
  compl.querySelector('p').textContent=lv.tip;
  compl.querySelector('button').textContent=isLast?'Ver mi resultado':'Siguiente nivel →';
  compl.querySelector('button').onclick=isLast?goEnd:goNextLevel;
  compl.style.display='block';
  compl.scrollIntoView({behavior:'smooth',block:'center'});
}

function goNextLevel(){
  gState.level++;
  if(gState.level>=LEVELS.length){goEnd();return;}
  document.getElementById('go-lvl-complete').style.display='none';
  loadLevel();
  window.scrollTo({top:0,behavior:'smooth'});
}

function goEnd(){
  clearInterval(gState.timerInterval);
  document.getElementById('go-end-score').textContent=gState.score;
  document.getElementById('go-end-correct').textContent=gState.correctTotal;
  document.getElementById('go-end-lvls').textContent=gState.levelsCompleted;
  const tip=gState.correctTotal>25?TIPS_GENERAL[2]:gState.correctTotal>15?TIPS_GENERAL[1]:TIPS_GENERAL[0];
  document.getElementById('go-end-tip').textContent='💡 '+tip;
  showGoScreen('go-end');
}

function startTimer(){
  clearInterval(gState.timerInterval);
  gState.timerInterval=setInterval(()=>{
    gState.timer--;
    updateTimerDisplay();
    if(gState.timer<=10) document.getElementById('go-timer-val').classList.add('warn');
    else document.getElementById('go-timer-val').classList.remove('warn');
    if(gState.timer<=0){
      clearInterval(gState.timerInterval);
      
      showFloat('⏰ ¡Tiempo!','#f87171');
      setTimeout(()=>{
        gState.score=Math.max(0,gState.score-30);
        document.getElementById('go-score-val').textContent=gState.score;
        showLevelComplete();
      },800);
    }
  },1000);
}

function updateTimerDisplay(){
  document.getElementById('go-timer-val').textContent=gState.timer;
}

let floatTimer;
function showFloat(txt,color){
  const el=document.getElementById('go-float');
  el.textContent=txt; el.style.color=color;
  el.classList.add('show');
  clearTimeout(floatTimer);
  floatTimer=setTimeout(()=>el.classList.remove('show'),700);
}

function showGoScreen(id){
  document.querySelectorAll('.go-screen').forEach(s=>s.classList.remove('active'));
  document.getElementById(id).classList.add('active');
  window.scrollTo({top:0,behavior:'smooth'});
}

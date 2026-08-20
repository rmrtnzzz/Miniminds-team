const cloudLayer = document.getElementById('cloudsLayer');
const NUM_CLOUDS = 9;
for(let i=0;i<NUM_CLOUDS;i++){
 const c = document.createElement('div');
 c.className = 'cloud';
 const size = 120 + Math.random()*180;
 const top = Math.random()*100;
 const speed = 28 + Math.random()*40;
 const delay = -Math.random()*speed;
 const opacity = 0.3 + Math.random()*0.4;
 c.style.cssText = `top:${top}%;left:-${size+40}px;width:${size}px;opacity:${opacity}`;
 c.innerHTML = `<svg width="${size}" height="${size*0.55}" viewBox="0 0 200 110" xmlns="http://www.w3.org/2000/svg">
 <path d="M30 80 Q10 80 10 60 Q10 42 28 40 Q28 18 50 18 Q62 8 76 18 Q88 8 104 20 Q120 10 136 22 Q152 14 164 28 Q180 28 180 46 Q188 50 188 64 Q188 80 168 80 Z" fill="white"/>
 </svg>`;
 c.style.animation = `drift ${speed}s ${delay}s linear infinite`;
 cloudLayer.appendChild(c);
}
const styleEl = document.createElement('style');
styleEl.textContent = `@keyframes drift{from{transform:translateX(0)}to{transform:translateX(calc(100vw + 400px))}}`;
document.head.appendChild(styleEl);

const darkBtn = document.getElementById('darkBtn');
function toggleDark(){
 const html = document.documentElement;
 const isDark = html.getAttribute('data-theme')==='dark';
 html.setAttribute('data-theme', isDark?'light':'dark');
 darkBtn.innerHTML = isDark ? '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';
 localStorage.setItem('mm-theme', isDark?'light':'dark');
}
(function(){
 const saved = localStorage.getItem('mm-theme');
 if(saved==='dark'){
 document.documentElement.setAttribute('data-theme','dark');
 darkBtn.innerHTML='<i class="fas fa-sun"></i>';
 }
})();

const langBtn = document.getElementById('langBtn');
const langDropdown = document.getElementById('langDropdown');
let currentLang = 'es';
const i18n = {
 es:{
 'nav.about':'Nosotros','nav.team':'Nuestro equipo','nav.families':'Familias',
 'nav.how':'Cómo funciona','nav.contact':'Contacto','nav.chat':'Hablar con IA','nav.register':'Registrarse',
 'hero.badge':' NUEVO · IA especializada en neurodivergencia infantil',
 'hero.sub':'Miniminds acompaña a familias con niños neurodivergentes. Información clara, apoyo emocional y estrategias prácticas — cuando más lo necesitas.',
 'hero.cta1':'Hablar con nuestro equipo IA','hero.cta2':'Conocer más',
 's1.title':'Cada niño tiene su <em>propio superpoder</em>',
 's1.text':'El TEA, TDAH, dislexia, dispraxia y otras neurodivergencias no son limitaciones — son formas distintas de procesar el mundo. Miniminds te ayuda a entenderlas y a convertirlas en fortalezas.',
 's2.title':'Apoyo cuando <em>más lo necesitas</em>',
 's2.text':'Sabemos que recibir un diagnóstico puede ser abrumador. Nuestro equipo está disponible 24/7 para responder tus dudas y acompañarte en cada etapa.',
 's3.title':'Información clara, <em>sin tecnicismos</em>',
 's3.text':'Nuestros especialistas virtuales traducen la información médica a un lenguaje que toda la familia puede entender.',
 'team.title':'Conoce a tu equipo','team.intro':'Cuatro especialistas virtuales, cada uno experto en su área.',
 'team.nilo.role':'Información','team.nilo.desc':'El explorador curioso. Experto en diagnósticos y condiciones del neurodesarrollo.',
 'team.kairo.role':'Apoyo emocional','team.kairo.desc':'El héroe protector. Especializado en manejo de crisis y apoyo emocional.',
 'team.pipo.role':'Estrategias','team.pipo.desc':'El inventor creativo. Estrategias prácticas y actividades para el hogar y la escuela.',
 'team.luma.role':'Motivación','team.luma.desc':'La guardiana de las estrellas. Celebra cada logro, por pequeño que sea.',
 'fam.title':'Lo que dicen las familias','fam.intro':'Familias reales que encontraron apoyo cuando más lo necesitaban.',
 'fam.t1':'"Nilo me explicó el diagnóstico de mi hijo de una forma que finalmente pude entender."',
 'fam.t2':'"Pipo me dio una rutina de estudio que realmente funciona para mi hija."',
 'fam.t3':'"Kairo me ayudó cuando Mateo estaba en crisis. Su calma marcó la diferencia."',
 'fam.t4':'"Luma me recuerda cada semana los avances de mi hija."',
 'how.title':'Cómo funciona','how.intro':'Tres pasos simples para empezar.',
 'how.s1.title':'Abre el chat','how.s1.text':'Haz clic en la mascota flotante. Sin registro, sin espera.',
 'how.s2.title':'Cuéntanos qué pasa','how.s2.text':'Escribe con tus propias palabras. El sistema detecta quién puede ayudarte.',
 'how.s3.title':'Recibe apoyo real','how.s3.text':'La mascota correcta responde con lo que necesitas.',
 'how.cta':'Empezar ahora — es gratis',
 'footer.desc':'Apoyo al desarrollo de mentes sanas y adaptativas.','footer.platform':'Plataforma','footer.resources':'Recursos',
 'fab.tooltip':'¡Hola! ¿En qué te ayudo?','chat.sub':'Tu equipo de apoyo siempre disponible'
 },
 en:{
 'nav.about':'About','nav.team':'Our team','nav.families':'Families',
 'nav.how':'How it works','nav.contact':'Contact','nav.chat':'Talk to AI','nav.register':'Sign up',
 'hero.badge':' NEW · AI specialized in childhood neurodivergence',
 'hero.sub':'Miniminds supports families with neurodivergent children. Clear information, emotional support and practical strategies — when you need them most.',
 'hero.cta1':'Talk to our AI team','hero.cta2':'Learn more',
 's1.title':'Every child has their <em>own superpower</em>',
 's1.text':'ASD, ADHD, dyslexia, dyspraxia and other neurodivergences are not limitations — they are different ways of processing the world.',
 's2.title':'Support when <em>you need it most</em>',
 's2.text':'We know a diagnosis can feel overwhelming. Our team is available 24/7 to answer your questions and guide you at every stage.',
 's3.title':'Clear information, <em>no jargon</em>',
 's3.text':'Our virtual specialists translate medical and psychological information into language the whole family can understand.',
 'team.title':'Meet your team','team.intro':'Four virtual specialists, each an expert in their area. Always ready to help.',
 'team.nilo.role':'Information','team.nilo.desc':'The curious explorer. Expert in diagnoses and neurodevelopmental conditions.',
 'team.kairo.role':'Emotional support','team.kairo.desc':'The brave protector. Specialized in crisis management and emotional support.',
 'team.pipo.role':'Strategies','team.pipo.desc':'The creative inventor. Practical strategies and activities for home and school.',
 'team.luma.role':'Motivation','team.luma.desc':'The star guardian. Celebrates every achievement, no matter how small.',
 'fam.title':'What families say','fam.intro':'Real families who found support when they needed it most.',
 'fam.t1':'"Nilo explained my son\'s diagnosis in a way I could finally understand."',
 'fam.t2':'"Pipo gave me a study routine that really works for my daughter."',
 'fam.t3':'"Kairo helped me when Mateo was in an emotional crisis. His calm made the difference."',
 'fam.t4':'"Luma reminds me every week of my daughter\'s progress."',
 'how.title':'How it works','how.intro':'Three simple steps to get started.',
 'how.s1.title':'Open the chat','how.s1.text':'Click the floating mascot. No registration, no waiting.',
 'how.s2.title':'Tell us what\'s happening','how.s2.text':'Write in your own words. The system detects who can help you best.',
 'how.s3.title':'Get real support','how.s3.text':'The right mascot responds with what you need.',
 'how.cta':'Start now — it\'s free',
 'footer.desc':'Supporting healthy and adaptive mind development.','footer.platform':'Platform','footer.resources':'Resources',
 'fab.tooltip':'Hi! How can I help?','chat.sub':'Your support team always available'
 }
};

function toggleLang(){
 langDropdown.classList.toggle('open');
}
document.addEventListener('click', e=>{
 if(!e.target.closest('.lang-wrap')) langDropdown.classList.remove('open');
});
function setLang(lang){
 currentLang = lang;
 langBtn.textContent = lang.toUpperCase();
 langDropdown.classList.remove('open');
 document.querySelectorAll('.lang-opt').forEach(b=>b.classList.toggle('active', b.textContent.includes(lang==='es'?'Español':'English')));
 document.querySelectorAll('[data-i18n]').forEach(el=>{
 const key = el.getAttribute('data-i18n');
 if(i18n[lang][key]) el.innerHTML = i18n[lang][key];
 });
 document.getElementById('cinput').placeholder = lang==='es'?'Escribe tu pregunta...':'Write your question...';
}

window.addEventListener('scroll',()=>{
 document.getElementById('nav').classList.toggle('scrolled',window.scrollY>20);
});

const fabs=['','','',''];
let fi=0;
setInterval(()=>{fi=(fi+1)%fabs.length;document.getElementById('chatFab').textContent=fabs[fi];},2000);

function openChat(){
 document.getElementById('chat-panel').classList.add('open');
 document.getElementById('overlay').classList.add('visible');
 setTimeout(()=>document.getElementById('cinput').focus(),400);
}
function closeChat(){
 document.getElementById('chat-panel').classList.remove('open');
 document.getElementById('overlay').classList.remove('visible');
}

const API='http://127.0.0.1:5000/chat';
const SESSION_ID='session_'+Math.random().toString(36).slice(2,9);
let mascotaActual=null, enviando=false;
const messagesEl=document.getElementById('chat-messages');
const inputEl=document.getElementById('cinput');
const sendBtn=document.getElementById('csendBtn');
const typingEl=document.getElementById('ctyping');

inputEl.addEventListener('input',()=>{inputEl.style.height='auto';inputEl.style.height=Math.min(inputEl.scrollHeight,90)+'px';});
inputEl.addEventListener('keydown',e=>{if(e.key==='Enter'&&!e.shiftKey){e.preventDefault();enviar();}});
sendBtn.addEventListener('click',e=>{e.preventDefault();e.stopPropagation();enviar();});

function scrollAbajo(){messagesEl.scrollTop=messagesEl.scrollHeight;}
function actualizarPill(m){
 document.querySelectorAll('.m-pill').forEach(p=>p.classList.remove('active'));
 if(m&&m!=='equipo'){const p=document.getElementById('pill-'+m);if(p)p.classList.add('active');}
}
function agregarMensaje(texto,tipo,mascota,esCrisis){
 mascota=mascota||'equipo';
 const N={nilo:' Nilo',kairo:' Kairo',pipo:' Pipo',luma:' Luma',equipo:' Equipo Miniminds'};
 const msg=document.createElement('div');
 msg.className='cmsg '+tipo;
 if(tipo==='bot'){
 const lbl=document.createElement('div');
 lbl.className='cmsg-label '+mascota;
 lbl.textContent=N[mascota]||' Equipo';
 msg.appendChild(lbl);
 }
 const bub=document.createElement('div');
 bub.className='cbubble '+(tipo==='user'?'':(esCrisis?'crisis':mascota));
 bub.textContent=texto;
 msg.appendChild(bub);
 messagesEl.appendChild(msg);
 scrollAbajo();
}
async function enviar(){
 const texto=inputEl.value.trim();
 if(!texto||enviando)return;
 enviando=true;
 inputEl.value='';inputEl.style.height='auto';sendBtn.disabled=true;
 agregarMensaje(texto,'user');
 messagesEl.appendChild(typingEl);
 typingEl.classList.add('visible');
 scrollAbajo();
 try{
 const res=await fetch(API,{method:'POST',headers:{'Content-Type':'application/json'},
 body:JSON.stringify({mensaje:texto,rol:'padre',mascota_actual:mascotaActual,session_id:SESSION_ID})});
 if(!res.ok)throw new Error('Error '+res.status);
 const data=await res.json();
 mascotaActual=data.mascota;
 actualizarPill(mascotaActual);
 agregarMensaje(data.respuesta,'bot',data.mascota,data.es_crisis||false);
 }catch(err){
 agregarMensaje('No pude conectarme. Asegúrate de que app.py esté corriendo en http://127.0.0.1:5000 ','bot','equipo',false);
 }finally{
 typingEl.classList.remove('visible');sendBtn.disabled=false;enviando=false;inputEl.focus();
 }
}

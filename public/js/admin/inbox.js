function showTab(id){
 document.querySelectorAll('.inbox-tab').forEach((t,i)=>{
 const panels=['tab-pacientes','tab-especialistas','tab-desbaneo','tab-infracciones'];
 t.classList.toggle('active', panels[i]===id);
 document.getElementById(panels[i]).classList.toggle('active', panels[i]===id);
 });
}
function openModal(id){document.getElementById(id).classList.add('open')}
function closeModal(id){document.getElementById(id).classList.remove('open')}
document.querySelectorAll('.modal-overlay').forEach(m=>m.addEventListener('click',e=>{if(e.target===m)m.classList.remove('open')}));

function seSelectOpt(q,v){
 document.querySelectorAll(`[id^="opt-${q}-"]`).forEach(el=>el.classList.remove('selected'));
 document.getElementById(`opt-${q}-${v}`).classList.add('selected');
 updateProgress();
}
function updateProgress(){
 const total=7;
 const answered=document.querySelectorAll('input[type=radio]:checked').length;
 document.getElementById('se-prog').style.width=(answered/total*100)+'%';
}
document.querySelectorAll('input[type=radio]').forEach(r=>r.addEventListener('change',updateProgress));

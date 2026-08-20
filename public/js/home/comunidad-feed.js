function initComunidadFeed(FEED_URL){
(function(){
 const list = document.getElementById('feed-list');
 const empty = document.getElementById('feed-empty');
 let lastId = 0;
 const seen = new Set();

 const DEFAULT_AVATAR = "data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Ccircle cx=%2715%27 cy=%2715%27 r=%2715%27 fill=%27%23cccccc%27/%3E%3Ccircle cx=%2715%27 cy=%2712%27 r=%275%27 fill=%27%23ffffff%27/%3E%3Cpath d=%27M4 27c2-7 8-10 11-10s9 3 11 10%27 fill=%27%23ffffff%27/%3E%3C/svg%3E";

 function renderItem(item, prepend) {
 if (seen.has(item.id)) return;
 seen.add(item.id);

 const card = document.createElement('article');
 card.className = 'tarjeta';
 card.innerHTML = `
 <div class="encabezado-tarjeta">
 <img class="foto-usuario" src="${item.foto || DEFAULT_AVATAR}" alt="Foto de usuario" onerror="this.onerror=null;this.src='${DEFAULT_AVATAR}';">
 <div class="datos-usuario">
 <h2><a href="${item.url}" style="color:inherit;text-decoration:none;"></a></h2>
 <span></span>
 </div>
 </div>
 <p class="mensaje"></p>
 `;
 card.querySelector('h2 a').textContent = item.titulo;
 card.querySelector('span').textContent = 'Por ' + item.autor + ' · ' + item.fecha;
 card.querySelector('.mensaje').textContent = item.resumen;

 if (prepend) list.prepend(card); else list.appendChild(card);
 if (item.id > lastId) lastId = item.id;
 }

 async function loadInitial() {
 try {
 const res = await fetch(FEED_URL);
 const data = await res.json();
 if (!data.experiencias.length) { empty.style.display = 'block'; return; }
 data.experiencias.forEach(item => renderItem(item, false));
 } catch (e) { /* silencioso */ }
 }

 async function pollNew() {
 try {
 const res = await fetch(FEED_URL + '?after_id=' + lastId);
 const data = await res.json();
 if (data.experiencias.length) {
 empty.style.display = 'none';
 [...data.experiencias].reverse().forEach(item => renderItem(item, true));
 }
 } catch (e) { /* silencioso */ }
 }

 loadInitial();
 setInterval(pollNew, 8000);
})();
}

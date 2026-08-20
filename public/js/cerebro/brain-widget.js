function initCerebroBrain(rootId, modelUrl, loaderImgUrl){
 const root = document.getElementById(rootId);
 if (!root || typeof THREE === 'undefined') return;

 // Color de identidad de cada lóbulo (se mantiene fijo, sin importar el trastorno elegido)
 const REGION_COLORS = {
 frontal:0xf472b6, parietal:0x60a5fa, temporal:0xfb923c,
 occipital:0x34d399, cerebelo:0xfacc15, emociones:0xe879f9,
 };
 const REGION_LABELS = {
 frontal:'Lóbulo Frontal', parietal:'Lóbulo Parietal', temporal:'Lóbulo Temporal',
 occipital:'Lóbulo Occipital', cerebelo:'Cerebelo', emociones:'Sistema Límbico',
 };

 // Cada botón/zona explica qué función cumple esa parte del cerebro
 const REGIONES = {
 frontal:{ badge:'Lóbulo Frontal', title:'Planear, decidir y controlar impulsos',
 text:'El lóbulo frontal es el centro de la planificación, la toma de decisiones y el control de impulsos. También participa en el movimiento voluntario y en regular cómo actuamos frente a una situación. Es como el "director" que organiza lo que hacemos.',
 regions:['frontal'] },
 parietal:{ badge:'Lóbulo Parietal', title:'Sentir y ubicarse en el espacio',
 text:'El lóbulo parietal procesa lo que sentimos al tocar algo (temperatura, presión, textura) y nos ayuda a ubicarnos en el espacio, calcular distancias y coordinar movimientos con lo que vemos.',
 regions:['parietal'] },
 temporal:{ badge:'Lóbulo Temporal', title:'Escuchar, hablar y recordar',
 text:'El lóbulo temporal procesa los sonidos y el lenguaje, y guarda un papel clave en la memoria. Gracias a él reconocemos voces, entendemos palabras y recordamos experiencias pasadas.',
 regions:['temporal'] },
 occipital:{ badge:'Lóbulo Occipital', title:'Ver e interpretar imágenes',
 text:'El lóbulo occipital se encarga de procesar todo lo que vemos: formas, colores y movimiento. Es el centro visual del cerebro, ubicado en la parte de atrás de la cabeza.',
 regions:['occipital'] },
 cerebelo:{ badge:'Cerebelo', title:'Equilibrio y coordinación',
 text:'El cerebelo ajusta el equilibrio y coordina los movimientos finos, como escribir o atrapar una pelota. Aunque es pequeño, contiene la mayor parte de las neuronas del cerebro.',
 regions:['cerebelo'] },
 emociones:{ badge:'Sistema Límbico', title:'Emociones y memoria emocional',
 text:'El sistema límbico es donde "viven" las emociones: alegría, miedo, calma, enojo. También conecta esas emociones con los recuerdos, por eso ciertos momentos se sienten tan intensos.',
 regions:['emociones'] },
 neuronas:{ badge:'Neuronas', title:'Los mensajeros del cerebro',
 text:'Tu cerebro tiene 86,000 millones de neuronas. Cada cerebro las conecta de una forma distinta — por eso no hay dos formas de pensar iguales. ¡Estudiar y jugar literalmente fortalece esas conexiones!',
 regions:[] },
 };

 // Direcciones aproximadas (desde el centro) hacia cada zona anatómica.
 // Se usan para "disparar un rayo" desde afuera hacia el centro y encontrar
 // el punto exacto de la superficie real del modelo cargado.
 const REGION_DEF = {
 frontal: { dir:[0.8, 0.35, 0.85], mirror:true },
 parietal: { dir:[0.55, 0.85, -0.25], mirror:true },
 temporal: { dir:[0.85, -0.2, 0.15], mirror:true },
 occipital:{ dir:[0.5, 0.25, -0.85], mirror:true },
 cerebelo: { dir:[0.45, -0.75, -0.6], mirror:true },
 emociones:{ dir:[0.3, -0.05, -0.1], mirror:true },
 };

 const canvasWrap = root.querySelector('.cb-canvas-wrap');

 // ---------- Loader overlay (misma pantalla de carga de la marca) ----------
 const loaderEl = document.createElement('div');
 loaderEl.className = 'pantalla-carga carga-incrustada cb-loader';
 loaderEl.innerHTML = `
 <div class="carga-caja">
 <div class="carga-emblema">
 <div class="carga-anillo"></div>
 <img src="${loaderImgUrl || ''}" alt="" class="carga-mascota">
 </div>
 <p class="carga-texto">Cargando el cerebro<span class="carga-puntos"><span>.</span><span>.</span><span>.</span></span></p>
 </div>`;
 canvasWrap.appendChild(loaderEl);

 const scene = new THREE.Scene();
 const camera = new THREE.PerspectiveCamera(45, (canvasWrap.clientWidth || 300) / (canvasWrap.clientHeight || 300), 0.1, 100);
 camera.position.set(0, 0.6, 8.5);

 const renderer = new THREE.WebGLRenderer({ antialias:true, alpha:true });
 renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
 renderer.setSize(canvasWrap.clientWidth || 300, canvasWrap.clientHeight || 300);
 let ResizeObserverInstance;
 if ('outputEncoding' in renderer) renderer.outputEncoding = THREE.sRGBEncoding;
 if ('physicallyCorrectLights' in renderer) renderer.physicallyCorrectLights = true;
 renderer.toneMapping = THREE.ACESFilmicToneMapping;
 renderer.toneMappingExposure = 1.15;
 canvasWrap.insertBefore(renderer.domElement, loaderEl);

 const controls = new THREE.OrbitControls(camera, renderer.domElement);
 controls.enableDamping = true;
 controls.dampingFactor = 0.08;
 controls.autoRotate = true;
 controls.autoRotateSpeed = 1.1;
 controls.minDistance = 5;
 controls.maxDistance = 14;
 controls.enablePan = false;
 renderer.domElement.addEventListener('pointerdown', () => controls.autoRotate = false);

 // ---------- Luces ----------
 scene.add(new THREE.HemisphereLight(0xd8c8ff, 0x1a0a20, 0.65));
 scene.add(new THREE.AmbientLight(0x8d7bb0, 0.35));
 const keyLight = new THREE.DirectionalLight(0xfff1e8, 1.05);
 keyLight.position.set(4, 5, 6);
 scene.add(keyLight);
 const fillLight = new THREE.DirectionalLight(0xbcd3ff, 0.35);
 fillLight.position.set(-4, 1, 3);
 scene.add(fillLight);
 const rimLight = new THREE.PointLight(0xc4b5fd, 1.4, 20);
 rimLight.position.set(-5, 2, -4);
 scene.add(rimLight);
 const bounceLight = new THREE.PointLight(0xf0abfc, 0.6, 15);
 bounceLight.position.set(2, -3, 4);
 scene.add(bounceLight);

 const brainGroup = new THREE.Group();
 scene.add(brainGroup);

 // ---------- Textura de brillo (glow) para los hotspots ----------
 function makeGlowTexture(hexColor){
 const c = document.createElement('canvas');
 c.width = c.height = 128;
 const ctx = c.getContext('2d');
 const r = new THREE.Color(hexColor);
 const rgb = `${Math.round(r.r*255)},${Math.round(r.g*255)},${Math.round(r.b*255)}`;
 const grad = ctx.createRadialGradient(64,64,0,64,64,64);
 grad.addColorStop(0, `rgba(${rgb},0.9)`);
 grad.addColorStop(0.4, `rgba(${rgb},0.45)`);
 grad.addColorStop(1, `rgba(${rgb},0)`);
 ctx.fillStyle = grad;
 ctx.fillRect(0,0,128,128);
 const tex = new THREE.CanvasTexture(c);
 return tex;
 }

 let modelRadius = 1.8; // se recalcula al cargar el modelo
 const hotspots = {}; // key -> [{group, core, glow, basePos}]
 const placeRaycaster = new THREE.Raycaster();

 function findSurfacePoint(dirArr, isLeft){
 const dir = new THREE.Vector3(isLeft ? -dirArr[0] : dirArr[0], dirArr[1], dirArr[2]).normalize();
 const origin = dir.clone().multiplyScalar(modelRadius * 4);
 placeRaycaster.set(origin, dir.clone().negate());
 placeRaycaster.far = modelRadius * 8;
 const hits = brainMesh ? placeRaycaster.intersectObject(brainMesh, true) : [];
 if (hits.length) {
 const hit = hits[0];
 let normal = dir;
 if (hit.face) {
 normal = hit.face.normal.clone().transformDirection(hit.object.matrixWorld).normalize();
 }
 return hit.point.clone().add(normal.multiplyScalar(0.02 * modelRadius));
 }
 // fallback si el rayo no pega en la malla (por si acaso)
 return dir.multiplyScalar(modelRadius * 0.85);
 }

 function buildHotspots(){
 scene.updateMatrixWorld(true);
 Object.entries(REGION_DEF).forEach(([key, def]) => {
 const variants = def.mirror ? [false, true] : [false];
 hotspots[key] = variants.map(isLeft => {
 const surfacePos = findSurfacePoint(def.dir, isLeft);
 const group = new THREE.Group();
 group.position.copy(surfacePos);

 // Zona de contacto invisible: solo sirve para detectar el
 // hover/click, ya no se ve una "bola" flotando sobre el cerebro.
 const core = new THREE.Mesh(
 new THREE.SphereGeometry(0.06 * modelRadius, 12, 12),
 new THREE.MeshBasicMaterial({ visible:false })
 );
 group.add(core);

 // La función se marca iluminando esa parte real del cerebro: una
 // luz puntual pegada a la superficie (se enciende con el pulso) en
 // vez de un ícono/esfera separada.
 const light = new THREE.PointLight(REGION_COLORS[key], 0, 1.4 * modelRadius, 2);
 light.position.set(0, 0, 0.02 * modelRadius);
 group.add(light);

 // Halo suave sobre la superficie, pegado a la malla, para que se
 // note la zona incluso desde lejos sin dibujar una bola encima.
 const glowMat = new THREE.SpriteMaterial({
 map: makeGlowTexture(REGION_COLORS[key]),
 transparent:true, opacity:0.55, depthWrite:false,
 blending: THREE.AdditiveBlending
 });
 const glow = new THREE.Sprite(glowMat);
 const glowScale = 0.22 * modelRadius;
 glow.scale.set(glowScale, glowScale, 1);
 glow.position.set(0, 0, 0.015 * modelRadius);
 group.add(glow);

 group.userData.key = key;
 brainGroup.add(group);
 return { group, core, glow, light };
 });
 });
 }

 // ---------- Partículas (neuronas) ----------
 const particleCount = 260;
 const particleGeo = new THREE.BufferGeometry();
 const particleMat = new THREE.PointsMaterial({ color:0xc4b5fd, size:0.045, transparent:true, opacity:0.25 });
 const particles = new THREE.Points(particleGeo, particleMat);
 brainGroup.add(particles);

 function buildParticles(){
 const positions = new Float32Array(particleCount * 3);
 for (let i = 0; i < particleCount; i++) {
 const v = new THREE.Vector3(
 (Math.random() - 0.5) * 2, (Math.random() - 0.5) * 2, (Math.random() - 0.5) * 2
 ).normalize().multiplyScalar((1.35 + Math.random() * 0.55) * modelRadius);
 positions[i*3] = v.x; positions[i*3+1] = v.y * 0.9; positions[i*3+2] = v.z;
 }
 particleGeo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
 particleMat.size = 0.045 * modelRadius;
 }

 // ---------- Carga del modelo GLB ----------
 const loader = new THREE.GLTFLoader();
 let brainMesh = null;

 loader.load(modelUrl, (gltf) => {
 const model = gltf.scene;

 // Matcap blanco/perlado translúcido — reemplaza el look de "arcilla verde"
 // por un blanco suave con brillos, más parecido a porcelana o vidrio esmerilado.
 function makeClayMatcap(){
 const c = document.createElement('canvas');
 c.width = c.height = 256;
 const ctx = c.getContext('2d');
 // base blanco perlado -> sombra lila muy tenue en los bordes (para no
 // perderse contra el fondo oscuro del visor)
 const base = ctx.createRadialGradient(128,128,10,128,128,180);
 base.addColorStop(0, '#ffffff');
 base.addColorStop(0.55, '#e4defa');
 base.addColorStop(1, '#a79bd6');
 ctx.fillStyle = base;
 ctx.fillRect(0,0,256,256);
 // brillo arriba-izquierda, más marcado, para que se note la forma
 const hi = ctx.createRadialGradient(95,85,4,95,85,120);
 hi.addColorStop(0, 'rgba(255,255,255,1)');
 hi.addColorStop(0.35, 'rgba(255,255,255,0.55)');
 hi.addColorStop(1, 'rgba(255,255,255,0)');
 ctx.fillStyle = hi;
 ctx.fillRect(0,0,256,256);
 const tex = new THREE.CanvasTexture(c);
 return tex;
 }

 const brainMaterial = new THREE.MeshMatcapMaterial({
 matcap: makeClayMatcap(),
 transparent: true,
 opacity: 0.94,
 });

 model.traverse((child) => {
 if (child.isMesh) {
 child.material = brainMaterial;
 brainMesh = child;
 }
 });

 // Centrar y normalizar tamaño para que encaje con la cámara/controles existentes
 const box = new THREE.Box3().setFromObject(model);
 const center = box.getCenter(new THREE.Vector3());
 const sphere = box.getBoundingSphere(new THREE.Sphere());
 const targetRadius = 1.85;
 const scaleFactor = targetRadius / sphere.radius;

 model.position.sub(center);
 const wrapper = new THREE.Group();
 wrapper.add(model);
 wrapper.scale.setScalar(scaleFactor);
 brainGroup.add(wrapper);

 modelRadius = targetRadius;
 buildHotspots();
 buildParticles();

 loaderEl.classList.add('oculta');
 setTimeout(() => loaderEl.remove(), 400);
 }, undefined, (err) => {
 console.error('No se pudo cargar el modelo del cerebro:', err);
 loaderEl.innerHTML = '<p class="carga-texto">No se pudo cargar el modelo 3D 😕</p>';
 });

 // ---------- Interacción ----------
 const raycaster = new THREE.Raycaster();
 const pointer = new THREE.Vector2();
 const hoverTag = root.querySelector('.cb-hover-tag');

 function allHotspotMeshes() {
 return Object.values(hotspots).flat().map(h => h.core);
 }

 function setPointer(e) {
 const rect = renderer.domElement.getBoundingClientRect();
 pointer.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
 pointer.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
 return rect;
 }

 renderer.domElement.addEventListener('pointermove', (e) => {
 const rect = setPointer(e);
 raycaster.setFromCamera(pointer, camera);
 const meshes = allHotspotMeshes();
 const hit = meshes.length ? raycaster.intersectObjects(meshes)[0] : null;
 if (hit) {
 const key = hit.object.parent.userData.key;
 hoverTag.textContent = REGION_LABELS[key];
 hoverTag.style.left = (e.clientX - rect.left) + 'px';
 hoverTag.style.top = (e.clientY - rect.top) + 'px';
 hoverTag.classList.add('show');
 renderer.domElement.style.cursor = 'pointer';
 } else {
 hoverTag.classList.remove('show');
 renderer.domElement.style.cursor = 'grab';
 }
 });

 // Toca una parte del cerebro para descubrir qué hace (antes solo funcionaba el hover)
 let pointerDownPos = null;
 renderer.domElement.addEventListener('pointerdown', (e) => {
 pointerDownPos = { x: e.clientX, y: e.clientY };
 });
 renderer.domElement.addEventListener('pointerup', (e) => {
 if (!pointerDownPos) return;
 const movedDist = Math.hypot(e.clientX - pointerDownPos.x, e.clientY - pointerDownPos.y);
 pointerDownPos = null;
 if (movedDist > 6) return; // fue un arrastre para rotar, no un click

 setPointer(e);
 raycaster.setFromCamera(pointer, camera);
 const meshes = allHotspotMeshes();
 const hit = meshes.length ? raycaster.intersectObjects(meshes)[0] : null;
 if (hit) {
 const key = hit.object.parent.userData.key;
 if (REGIONES[key]) selectRegion(key);
 }
 });

 let activeKey = null;
 let pulseT = 0;

 const infoIdle = root.querySelector('.cb-idle');
 const infoContent = root.querySelector('.cb-info-content');
 const infoBadge = root.querySelector('.cb-info-badge');
 const infoTitle = root.querySelector('.cb-info-title');
 const infoText = root.querySelector('.cb-info-text');

 function selectRegion(key) {
 activeKey = key;
 pulseT = 0;
 controls.autoRotate = false;

 root.querySelectorAll('.cb-fact-pill').forEach(p => p.classList.toggle('active', p.dataset.key === key));

 const info = REGIONES[key];
 const activeRegions = info.regions || [];

 Object.entries(hotspots).forEach(([hKey, variants]) => {
 const isActive = activeRegions.includes(hKey);
 variants.forEach(h => {
 h.light.intensity = isActive ? 1.1 : 0;
 h.glow.material.opacity = isActive ? 0.85 : 0.08;
 const s = (isActive ? 0.34 : 0.16) * modelRadius;
 h.glow.scale.set(s, s, 1);
 });
 });

 particleMat.opacity = key === 'neuronas' ? 0.9 : 0.15;
 particleMat.size = (key === 'neuronas' ? 0.075 : 0.045) * modelRadius;

 infoIdle.style.display = 'none';
 infoContent.classList.remove('show'); void infoContent.offsetWidth; infoContent.classList.add('show');
 infoBadge.textContent = info.badge;
 infoTitle.textContent = info.title;
 infoText.textContent = info.text;
 }

 function closeFact() {
 activeKey = null;
 root.querySelectorAll('.cb-fact-pill').forEach(p => p.classList.remove('active'));
 Object.values(hotspots).flat().forEach(h => {
 h.light.intensity = 0.35;
 h.glow.material.opacity = 0.4;
 const s = 0.2 * modelRadius;
 h.glow.scale.set(s, s, 1);
 });
 particleMat.opacity = 0.25; particleMat.size = 0.045 * modelRadius;
 infoContent.classList.remove('show');
 infoIdle.style.display = 'block';
 controls.autoRotate = true;
 }

 root.querySelector('.cb-info-close').addEventListener('click', closeFact);
 root.querySelectorAll('.cb-fact-pill').forEach(pill => {
 pill.addEventListener('click', () => selectRegion(pill.dataset.key));
 });

 function animate() {
 requestAnimationFrame(animate);
 pulseT += 0.05;
 if (activeKey && REGIONES[activeKey]) {
 const pulse = 0.95 + Math.sin(pulseT * 3) * 0.35;
 (REGIONES[activeKey].regions || []).forEach(rKey => {
 (hotspots[rKey] || []).forEach(h => { h.light.intensity = pulse; });
 });
 }
 if (activeKey === 'neuronas' || !activeKey) {
 particles.rotation.y += 0.0015;
 }
 controls.update();
 renderer.render(scene, camera);
 }
 animate();

 ResizeObserverInstance = new ResizeObserver(() => {
 const w = canvasWrap.clientWidth || 300;
 const h = canvasWrap.clientHeight || 300;
 camera.aspect = w / h;
 camera.updateProjectionMatrix();
 renderer.setSize(w, h);
 root.classList.toggle('cb-compact', root.clientWidth < 760);
 });
 ResizeObserverInstance.observe(canvasWrap);
 root.classList.toggle('cb-compact', root.clientWidth < 760);
}
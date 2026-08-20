function mostrarTab(tab, btn) {
 document.getElementById('seccion-cuenta').style.display = tab === 'cuenta' ? 'block' : 'none';
 document.getElementById('seccion-paciente').style.display = tab === 'paciente' ? 'block' : 'none';
 document.getElementById('seccion-solicitudes').style.display = tab === 'solicitudes' ? 'block' : 'none';
 document.querySelectorAll('.perfil-tab-btn').forEach(b => b.classList.remove('activo'));
 btn.classList.add('activo');
}

function editarCampo(icon) {
 const row = icon.closest('.campo-perfil');
 const staticEl = row.querySelector('[data-static]');
 const inputEl = row.querySelector('[data-input]');
 staticEl.classList.add('d-none');
 inputEl.classList.remove('d-none');
 inputEl.focus();
}

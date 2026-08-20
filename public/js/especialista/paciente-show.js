function toggleAsignacionTipo() {
    var esJuego = document.querySelector('input[name="tipo"]:checked').value === 'juego';
    document.getElementById('campos-terapia').style.display = esJuego ? 'none' : 'block';
    document.getElementById('campos-juego').style.display = esJuego ? 'block' : 'none';
}

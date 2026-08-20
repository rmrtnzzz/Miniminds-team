window.addEventListener("scroll", () => {

    const navbar =
        document.querySelector(".NAVBARCONTENIDO");

    if(window.scrollY > 50){
        navbar.classList.add("scrolled");
    }
    else{
        navbar.classList.remove("scrolled");
    }

});

document.addEventListener('DOMContentLoaded', () => {

    const navLinks = document.querySelectorAll('.nav-btn');
    const navItems = document.querySelectorAll('.nav-item');

    // botones normales
    navLinks.forEach((btn) => {
        btn.addEventListener('click', () => {

            navLinks.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    // dropdown con hover
    navItems.forEach((item) => {
        const dropdown = item.querySelector('.dropdown');
        const chevron = item.querySelector('.chevron');

        if (dropdown) {
item.addEventListener('mouseenter', () => {

    dropdown.classList.add('show');

    if (chevron) {
        chevron.classList.add('open');
    }

    item.querySelector(".nav-btn").classList.add("active-menu");

});

item.addEventListener('mouseleave', () => {

    dropdown.classList.remove('show');

    if (chevron) {
        chevron.classList.remove('open');
    }

    item.querySelector(".nav-btn").classList.remove("active-menu");

});
            item.addEventListener('mouseleave', () => {
                dropdown.classList.remove('show');
                if (chevron) chevron.classList.remove('open');
            });
        }
    });

    
const abrir = document.getElementById('gear-icon');
const ventana_contenedor = document.querySelector('.ventana-contenedor');
const cerrar = document.querySelector('.equis');

console.log(abrir);
console.log(ventana_contenedor);
console.log(cerrar);

abrir.addEventListener('click', () => {
    ventana_contenedor.classList.add('show');
});

cerrar.addEventListener('click', () => {
    ventana_contenedor.classList.remove('show');
});



//CARRUSEL DE LA HOMEPAGE
const slides = document.querySelectorAll(".slide");
const indicadoresCont = document.querySelector(".indicadores");

let actual = 0;

slides.forEach((_, index)=>{

    const barra = document.createElement("div");

    barra.classList.add("indicador");

    if(index === 0){
        barra.classList.add("activo");
    }

    barra.addEventListener("click", ()=>{
        mostrarSlide(index);
    });

    indicadoresCont.appendChild(barra);

});

const indicadores = document.querySelectorAll(".indicador");

function mostrarSlide(indice){

    slides.forEach(slide =>
        slide.classList.remove("activo")
    );

    indicadores.forEach(barra =>
        barra.classList.remove("activo")
    );

    slides[indice].classList.add("activo");
    indicadores[indice].classList.add("activo");

    actual = indice;
}

document.querySelector(".next").addEventListener("click", ()=>{

    actual++;

    if(actual >= slides.length){
        actual = 0;
    }

    mostrarSlide(actual);

});

document.querySelector(".prev").addEventListener("click", ()=>{

    actual--;

    if(actual < 0){
        actual = slides.length - 1;
    }

    mostrarSlide(actual);

});


});

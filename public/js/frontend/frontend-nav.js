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
                if (chevron) chevron.classList.add('open');
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

/*las tarjetas de los apartados de nuerodiversidades */


const botones = document.querySelectorAll(".toggle");

botones.forEach(boton=>{

    boton.addEventListener("click",()=>{

        const card = boton.parentElement;

        card.classList.toggle("active");

        if(card.classList.contains("active")){
            boton.firstChild.textContent="Ver menos ";
        }else{
            boton.firstChild.textContent="Ver más ";
        }

    });

});

/*IA INTERFAZ */

const botonAbrir = document.querySelector(".chat-toggle");
const botonCerrar = document.querySelector(".cerrar-chat");
const panelChat = document.querySelector(".chat-panel");
const overlay = document.querySelector(".chat-overlay");

function abrirChat(){

    panelChat.classList.add("activo");
    overlay.classList.add("activo");

}

function cerrarChat(){

    panelChat.classList.remove("activo");
    overlay.classList.remove("activo");

}

botonAbrir.addEventListener("click", abrirChat);

botonCerrar.addEventListener("click", cerrarChat);

overlay.addEventListener("click", cerrarChat);

document.addEventListener("keydown", function(e){

    if(e.key === "Escape"){

        cerrarChat();

    }

});

/*BOTÓN DARKMODE O LIGHTMODE */



const toggle = document.getElementById("darkmode-toggle");

// Cargar preferencia
if(localStorage.getItem("darkmode") === "true"){
    document.body.classList.add("darkmode");
    toggle.checked = true;
}

toggle.addEventListener("change", ()=>{

    if(toggle.checked){

        document.body.classList.add("darkmode");
        localStorage.setItem("darkmode","true");

    }else{

        document.body.classList.remove("darkmode");
        localStorage.setItem("darkmode","false");

    }

});



/*MODO OSCURO */

const darkToggle = document.getElementById("darkmode-toggle");

if(localStorage.getItem("theme") === "dark"){
    document.body.classList.add("dark");
    darkToggle.checked = true;
}

darkToggle.addEventListener("change", function(){

    document.body.classList.toggle("dark", this.checked);

    localStorage.setItem(
        "theme",
        this.checked ? "dark" : "light"
    );

});


/*scroll suavecito*/
document.addEventListener("DOMContentLoaded", () => {

    const elementos = document.querySelectorAll(
        "section, section h1, section h2, section h3, section p, section img, section button, section a, section .card, section .tarjeta"
    );

    const observer = new IntersectionObserver((entries) => {

        entries.forEach((entry) => {

            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target);
            }

        });

    }, {
        threshold: 0.12
    });

    elementos.forEach((elemento) => {
        elemento.classList.add("scroll-reveal");
        observer.observe(elemento);
    });

});


/*equipo mascotas para celu*/

document.querySelectorAll('.personaje-card').forEach(card => {

    card.addEventListener('click', () => {

        card.classList.toggle('volteada');

    });

});

window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".NAVBARCONTENIDO");
    if (navbar) {
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    }
});

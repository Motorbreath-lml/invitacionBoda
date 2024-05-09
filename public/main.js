// Contador regresivo
// Los meses comienzan a contar desde el 0, 0 es enero - 11 diciembre
// año, mes, dias, horas, minutos
let fechaBoda = new Date(2024, 12, 7, 12);

let h1Dias = document.querySelector('#dias');
let h1Horas = document.querySelector('#horas');
let h1Minutos = document.querySelector('#minutos');
let h1Segundos = document.querySelector('#segundos');

function actualizarReloj() {
    let horaActual = new Date();
    // Diferencia de tiempo, se trabaja en milisegundos
    let diferenciaMilisegundos = fechaBoda.getTime() - horaActual.getTime();
    // Convertir dias, horas, minutos y segundos
    let dias = Math.floor(diferenciaMilisegundos / (1000 * 60 * 60 * 24));
    let modDias = diferenciaMilisegundos % (1000 * 60 * 60 * 24);

    let horas = Math.floor(modDias / (1000 * 60 * 60));
    let modHoras = modDias % (1000 * 60 * 60);

    let minutos = Math.floor(modHoras / (1000 * 60))
    let modMinutos = modHoras % (1000 * 60);

    let segundos = Math.floor(modMinutos / 1000);

    // Formato de horas, dias, minutos, segundos
    horas=formatoTiempo(horas);
    minutos=formatoTiempo(minutos);
    segundos=formatoTiempo(segundos);

    //Indresar los nuevos valores a las etiquetas
    h1Dias.textContent=dias;
    h1Horas.textContent=horas;
    h1Minutos.textContent=minutos;
    h1Segundos.textContent=segundos;
}
function formatoTiempo(tiempo){
    if(tiempo<10){
        tiempo='0'+tiempo;
    }
    return tiempo;
}
actualizarReloj();

// Iniciar Reloj
const reloj = setInterval(actualizarReloj, 1000);

//Boton de musica
const botonMusica= document.querySelector('#botonMusica');
const musicaFondo= document.querySelector('#musicaFondo');


botonMusica.addEventListener('click', ()=>{
    intercambioIconoMusica();
});

function intercambioIconoMusica(){
    if(botonMusica.classList.contains('bi-volume-up-fill')){
        botonMusica.classList.add('bi-volume-mute-fill');
        botonMusica.classList.remove('bi-volume-up-fill');
        musicaFondo.pause();
    }else{
        botonMusica.classList.add('bi-volume-up-fill');
        botonMusica.classList.remove('bi-volume-mute-fill');
        musicaFondo.play();
    }
}

//Detectar cuando la cancion termina volver a reproducir
musicaFondo.addEventListener('ended', function() {
    musicaFondo.play();
});

// Modal de musica de fondo
const modalMusica = bootstrap.Modal.getOrCreateInstance('#modalMusica');
window.addEventListener('DOMContentLoaded',()=>{
    modalMusica.show();
});

const verConMusica = document.querySelector('#verConMusica');

verConMusica.addEventListener('click',()=>{
    intercambioIconoMusica();
});
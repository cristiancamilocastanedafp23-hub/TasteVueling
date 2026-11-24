// CODIGO GENERADO POR IA
// La IA me ha hecho este código para que la página donde este actualmente el usuario
// se quede con la linea de abajo, lo habia hecho con PHP de forma propia
// pero al tener dos secciones de una misma página no se podia hacer con PHP

function actualizarMenu() {
    const paginaActual = new URLSearchParams(window.location.search).get('controller');
    const seccionActual = window.location.hash;
    
    const enlaces = document.querySelectorAll('.navbar .nav-link');

    enlaces.forEach(enlace => {
        enlace.classList.remove('active');
    });

    if (paginaActual === 'carta') {

        document.querySelectorAll('.navbar a[href*="controller=carta"]')
            .forEach(enlace => enlace.classList.add('active'));

    }

    else if (paginaActual === 'home' && seccionActual === '#club') {

        document.querySelectorAll('.navbar a[href*="#club"]')
            .forEach(enlace => enlace.classList.add('active'));

    }

    else if (paginaActual === 'home' && seccionActual === '#alergenos') {

        document.querySelectorAll('.navbar a[href*="#alergenos"]')
            .forEach(enlace => enlace.classList.add('active'));

    }

    else if (paginaActual === 'home' && seccionActual === '') {

        document.querySelectorAll('.navbar a[href*="controller=home"]:not([href*="#"])')
            .forEach(enlace => enlace.classList.add('active'));

    }
}

document.addEventListener('DOMContentLoaded', actualizarMenu);

window.addEventListener('hashchange', actualizarMenu);

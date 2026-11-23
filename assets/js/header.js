// CÓDIGO GENERADO POR IA
// Para esta animación la IA me ha generado el código para
// que detecte cuando se está scrolleando y el menú pueda aplicar el cambio de estilos
// no lo he realizado yo, ya que no lo sabia hacer y como es una animación considero que no
// afecta mucho en mi aprendizaje, además que es para la parte de usuario

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar.contenedor");
    const banner = document.querySelector(".banner");
    const menuMovil = document.getElementById("menuHamburguesa");

    function actualizarMenu() {
        const limiteScroll = banner ? (banner.offsetHeight - navbar.offsetHeight) : 50;

        if (window.scrollY >= limiteScroll) {
            navbar.classList.add("scrolled");
        } else {
            const estaAbierto = menuMovil && menuMovil.classList.contains("show");
            if (!estaAbierto) {
                navbar.classList.remove("scrolled");
            }
        }
    }

    if (menuMovil) {
        menuMovil.addEventListener("show.bs.collapse", function () {
            navbar.classList.add("scrolled");
        });
        menuMovil.addEventListener("hidden.bs.collapse", actualizarMenu);
    }

    window.addEventListener("scroll", actualizarMenu);
    window.addEventListener("resize", actualizarMenu);
    actualizarMenu();
});
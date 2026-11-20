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
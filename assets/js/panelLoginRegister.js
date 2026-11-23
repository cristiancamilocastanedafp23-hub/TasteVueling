// CÓDIGO GENERADO POR IA
// Para esta animación también me he ayudado de la IA, donde
// he mostrado el mensaje de error en caso de que no 
// se logue bien o el registro mal, o se registre correctamente
// Como es animacion no considero que no afecta en mi aprendizaje

document.addEventListener("DOMContentLoaded", function () {
    const loginPanelEl = document.getElementById('loginPanel');

    if (loginPanelEl && loginPanelEl.querySelector('.alert-danger')) {
        const loginPanel = new bootstrap.Offcanvas(loginPanelEl);
        loginPanel.show();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const loginPanelEl = document.getElementById('loginPanel');
    const registrePanelEl = document.getElementById('registrePanel');

    if (loginPanelEl && loginPanelEl.querySelector('.alert')) {
        new bootstrap.Offcanvas(loginPanelEl).show();
    } else if (registrePanelEl && registrePanelEl.querySelector('.alert')) {
        new bootstrap.Offcanvas(registrePanelEl).show();
    }
});
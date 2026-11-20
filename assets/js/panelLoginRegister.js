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
<div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-5">
    <div class="avion-icon"></div>
    <h1 class="vueling">ERROR <?= (int) $errorCode ?></h1>
    <p class="sourceSans"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p>
    <a href="?controller=home" class="sourceSans botonVolver">Volver a la home</a>
</div>

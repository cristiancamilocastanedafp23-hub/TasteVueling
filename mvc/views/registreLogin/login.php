<!-- Login -->
<div class="offcanvas offcanvas-end contenedor-loginRegistro" tabindex="-1" id="loginPanel" aria-labelledby="loginPanelLabel">

    <!-- Header del login -->
    <div class="offcanvas-header border-bottom">
        <!-- Titulo -->
        <h4 class="offcanvas-title vueling" id="loginPanelLabel">ACCEDE A TU CUENTA</h4>
        <!-- Boton de cerrar -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>

    <!-- Cuerpo del login-->
    <div class="offcanvas-body sourceSans">
        <!-- Texto introductorio-->
        <p class="sourceSans fw-bold">
            Identifícate para disfrutar de todas las ventajas de ser TasteVueling club.
        </p>

        <!-- Formulario -->
        <form action="<?= url ?>?controller=usuario&action=login" method="POST">
            <!-- Correo -->
            <div class="mb-3 ">
                <input type="email" name="email" class="form-control labelInput" placeholder="Email" required>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <input type="password" name="password" class="form-control labelInput" placeholder="Contraseña" required>
            </div>

            <!-- Botón accender -->
            <div class="text-center fs-6 my-4">
                <button type="submit" class="botonRL vueling">ACCEDER</button>
            </div>
        </form>

        <!-- Mensaje de error si el login falla -->
        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="alert alert-danger text-center sourceSans" role="alert"> 
                <?= htmlspecialchars($_SESSION['error_login']) ?>
            </div>
            <?php unset($_SESSION['error_login']); ?>
        <?php endif; ?>


        <!-- Enlace al registro-->
        <div class="text-center mb-1 sourceSans">
            <p>¿Aún no eres TasteVueling Club?</p>
            <a href="#" class="link" data-bs-toggle="offcanvas" data-bs-target="#registrePanel" aria-controls="registrePanel">
                Únete gratis
            </a>
        </div>

    </div>
</div>

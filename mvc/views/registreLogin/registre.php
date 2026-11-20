<!-- Registro -->
<div class="offcanvas offcanvas-end contenedor-loginRegistro" tabindex="-1" id="registrePanel" aria-labelledby="registrePanelLabel">

    <!-- Header del registro -->
    <div class="offcanvas-header border-bottom">
        <!-- Título -->
        <h4 class="offcanvas-title vueling" id="registrePanelLabel">ÚNETE A TASTEVUELING CLUB</h4>
        <!-- Botón de cerrar -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>

    <!-- Cuerpo del registro -->
    <div class="offcanvas-body sourceSans">
        <!-- Texto introductorio -->
        <p class="sourceSans fw-bold">
            Regístrate gratis y empieza a acumular ventajas exclusivas en cada pedido.
        </p>

        <!-- Formulario (ya preparado para cuando montes el UserController) -->
        <form action="<?= url ?>?controller=usuario&action=register" method="POST">
            <!-- Nombre -->
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control labelInput" placeholder="Nombre" required>
            </div>

            <!-- Fecha de nacimiento --> 
            <div class="mb-3">
                <input type="date" name="fecha-nacimiento" class="form-control labelInput" required>
            </div>

            <!-- Correo -->
            <div class="mb-3">
                <input type="email" name="email" class="form-control labelInput" placeholder="Email" required>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <input type="password" name="password" class="form-control labelInput" placeholder="Contraseña" required>
            </div>

            <!-- Botón registrarse -->
            <div class="text-center fs-6 my-4">
                <button type="submit" class="botonRL vueling">CREAR CUENTA</button>
            </div>
        </form>

        <!-- Mensaje si el registro es valido -->
        <?php if (isset($_SESSION['registro_valido'])): ?>
            <div class="alert alert-success text-center sourceSanss" role="alert"> 
                <?= htmlspecialchars($_SESSION['registro_valido']) ?>
            </div>
            <?php unset($_SESSION['registro_valido']); ?>
        <?php endif; ?>

        <!-- Mensaje de error si el login falla -->
        <?php if (isset($_SESSION['error_registro'])): ?>
            <div class="alert alert-danger text-center sourceSans" role="alert"> 
                <?= htmlspecialchars($_SESSION['error_registro']) ?>
            </div>
            <?php unset($_SESSION['error_registro']); ?>
        <?php endif; ?>

        <!-- Enlace de vuelta al login -->
        <div class="text-center mb-1 sourceSans">
            <p>¿Ya eres miembro de TasteVueling Club?</p>
            <a href="#" class="link" data-bs-toggle="offcanvas" data-bs-target="#loginPanel" aria-controls="loginPanel">
                Inicia sesión
            </a>
        </div>

    </div>
</div>
<!-- Incluimos los archivos del login y el registro -->
<?php include_once 'mvc/views/registreLogin/login.php'; ?>
<?php include_once 'mvc/views/registreLogin/registre.php'; ?>

<!-- -- Contenedor principal del header -- -->
<nav class="navbar navbar-expand-lg contenedor menu-<?= $_GET['controller'] ?>"> 
    
    <!-- Menu escritorio -->
    <div class="row menu-container align-items-center d-none d-lg-flex">

        <!-- 3 columnas vacias y 6 columnas: Inicio y carta, logo y Club y Alérgenos -->
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between align-items-center gap-4">

                <!-- Inicio y Carta -->
                <ul class="navbar-nav d-flex gap-5 align-items-center vueling">
                    <li class="nav-item">
                        <a href="<?php echo url . "?controller=home" ?>" class="nav-link text-dark"> INICIO </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo url . "?controller=carta" ?>" class="nav-link text-dark"> CARTA </a>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="navbar-brand" href="<?php echo url . "?controller=home"?>">
                    <img src="assets/img/header/logoNegro.webp" class="img-logo logo-negro" alt="Logo del restaurante con letras negras">
                    <img src="assets/img/header/logoBlanco.webp" class="img-logo logo-blanco" alt="Logo del restaurante colocado con letras blancas">
                </a>

                <!-- Club y Alérgenos -->
                <ul class="navbar-nav d-flex gap-5 align-items-center vueling">
                    <li class="nav-item">
                        <a href="<?php echo url . "?controller=home#club"?>" class="nav-link text-dark"> CLUB </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo url . "?controller=home#alergenos"?>" class="nav-link text-dark"> ALÉRGENOS </a>
                    </li>
                </ul>

            </div>
            
        </div>

        <!-- 1 columnas vacia y 2 columnas: Usuario y Carrito -->
        <div class="col-md-2 offset-md-1 d-flex gap-3">
            <!-- Condicional para detectar que hay sesión -->
            <?php if (isset($_SESSION['usuario'])): ?>

                <!-- Usuario con sesion iniciada -->
                <div class="dropdown">
                    <!-- Nombre del usuario que tenga sesión iniciada -->
                    <a href="#" class="dropdown-toggle usuario-nombre text-decoration-none text-nowrap vueling" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= htmlspecialchars($_SESSION['usuario']['nombre']) ?>
                    </a>

                    <!-- Menú desplegable -->
                    <ul class="dropdown-menu dropdown-menu-end">

                        <!-- Panel de administración -->
                        <li>
                            <a class="dropdown-item sourceSansPro" href="<?= url ?>?controller=usuario&action=panel">Mi panel</a>
                        </li>
                        <!-- Cerrar sesión -->
                        <li>
                            <a class="dropdown-item cerrar-sesion sourceSansPro" href="<?= url ?>?controller=usuario&action=logout">Cerrar sesión</a>
                        </li>

                    </ul>
                </div>

            <?php else: ?>
                <!-- Usuario sin sesión iniciada -->
                <div class="user-icon" role="button" data-bs-toggle="offcanvas" data-bs-target="#loginPanel" aria-controls="loginPanel"></div>
            <?php endif; ?>

            <!-- Carrito -->
            <div class="carrito-icon"></div>
        </div>  

    </div>

    <!-- MENU MOVIL -->
    <div class="d-lg-none d-flex align-items-center justify-content-between w-100 px-3">

        <!-- Hamburguesa -->
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menuHamburguesa"
            aria-controls="menuHamburguesa"
            aria-expanded="false"
            aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Logo -->
        <a class="navbar-brand logo" href="<?php echo url . "?controller=home" ?>">
            <img src="assets/img/header/logoNegro.webp" class="img-logo logo-negro" alt="Logo del restaurante con letras negras">
            <img src="assets/img/header/logoBlanco.webp" class="img-logo logo-blanco" alt="Logo del restaurante con letras blancas">
        </a>

        <!-- Carrito -->
        <div class="carrito-icon" aria-label="Ver carrito"></div>

    </div>

    <!-- MENU DESPLEGABLE AL DARLE AL BOTÓN HAMBURGUESA -->
    <div class="collapse d-lg-none w-100 px-3" id="menuHamburguesa">

        <!-- Navegación -->
        <ul class="navbar-nav vueling py-3">
            
            <!-- Condicional que detecta si hay sesión iniciada -->
            <?php if (isset($_SESSION['usuario'])): ?>

                <!-- Panel de usuario -->
                <li class="nav-item">
                    <a href="<?= url ?>?controller=usuario&action=panel" class="nav-link text-dark">MI PANEL</a>                    
                </li>

                <!-- Cerrar sesión -->
                <li class="nav-item">
                    <a href="<?= url ?>?controller=usuario&action=logout" class="nav-link cerrar-sesion">CERRAR SESIÓN</a>
                </li>

            <?php else: ?>

                <!-- Iniciar sesión -->
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark" data-bs-toggle="offcanvas" data-bs-target="#loginPanel" aria-controls="loginPanel">INICIAR SESIÓN</a>
                </li>
                
            <?php endif; ?>

            <!-- Inicio -->
            <li class="nav-item">
                <a href="<?php echo url . "?controller=home"?>" class="nav-link text-dark">INICIO</a>
            </li>

            <!-- Carta -->
            <li class="nav-item">
                <a href="<?php echo url . "?controller=carta"?>" class="nav-link text-dark">CARTA</a>
            </li>

            <!-- Club -->
            <li class="nav-item">
                <a href="<?php echo url . "?controller=home#club"?>" class="nav-link text-dark">CLUB</a>
            </li>

            <!-- Alérgenos -->
            <li class="nav-item">
                <a href="<?php echo url . "?controller=home#alergenos"?>" class="nav-link text-dark">ALÉRGENOS</a>
            </li>

        </ul>

    </div>

</nav>

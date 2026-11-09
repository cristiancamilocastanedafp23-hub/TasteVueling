<!--HEADER -->
<nav class="navbar navbar-expand-lg border-bottom py-2 contenedor"> 
    
    <!-- Menu escritorio -->
    <div class="row menu-container align-items-center d-none d-lg-flex">

        <!-- 3 columnas -->
        <div class="col-md-3"> </div>

        <!-- 6 columnas -->
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center gap-4">

                <!-- Inicio y Carta -->
                <ul class="navbar-nav d-flex gap-5 align-items-center texto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark"> INICIO </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark"> CARTA </a>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="assets/img/header/logoSinFondo.jpg" class="img-logo" alt="Logo del restaurante">
                </a>

                <!-- Club y Alérgenos -->
                <ul class="navbar-nav d-flex gap-5 align-items-center texto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark"> CLUB </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark"> ALÉRGENOS </a>
                    </li>
                </ul>

            </div>
            
        </div>

        <!-- 2 columnas -->
        <div class="col-md-2"> </div>


        <!-- 1 columna -->
        <div class="col-md-1 d-flex gap-3">  

            <!-- User-->
            <div class="user-icon"></div>
            <!--Carrito  --> 
            <div class="carrito-icon"></div>
            
        </div>

    </div>

    <!-- MENU MOVIL -->
    <div class="d-flex d-lg-none align-items-center justify-content-between w-100">

        <!-- Hamburguesa y logo -->
        <div class="d-flex align-items-center gap-2">

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
            <a class="navbar-brand logo" href="#">
                <img src="assets/img/header/logoSinFondo.jpg" class="img" alt="Logo del restaurante">
            </a>

        </div>

        <!-- Carrito -->
        <div class="carrito-icon"></div>

    </div>

    <!-- MENU DESPLEGABLE MOVIL -->
    <div class="collapse d-lg-none w-100" id="menuHamburguesa">

        <ul class="navbar-nav texto py-3">

            <li class="nav-item">
                <a href="#" class="nav-link text-dark">INICIAR SESIÓN</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link text-dark">INICIO</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link text-dark">CARTA</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link text-dark">CLUB</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link text-dark">ALÉRGENOS</a>
            </li>

        </ul>

    </div>

</nav>


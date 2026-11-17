<!-- BANNER -->
<div class="banner">
    <!-- Envolvemos en el contenedor -->
    <div class="contenedor">

        <!-- Titulo principal -->
        <div class="row">
            <div class="offset-md-7 col-md-5 vueling">
                <h1>SABORES</h1>
                <h1>QUE TE HARÁN</h1>
                <h1>VIAJAR</h1>
            </div>
        </div>

        <!-- Subtitulo -->
        <div class="row">
            <div class="offset-md-7 col-md-5 vueling">
                <h4>¿LISTO PARA UNA NUEVA AVENTURA?</h4>
            </div>
        </div>

        <!-- Boton -->
        <div class="row">
            <div class="offset-md-7 col-md-1 mt-2 vueling">
                <a href="<?php echo url . "?controller=carta"?>" class="botonBanner">EXPLOREMOS</a>
            </div>
        </div>

    </div>
</div>

<!-- SECCION 1 -->
<section class="margen py-5">

    <div class="contenedor">

        <!-- Titulo de los continentes-->
        <div class="row vueling">
            <h1>SABOREA A TRAVÉS DEL MUNDO</h1>
        </div>    

        <!-- Tarjetas -->
        <div class="row g-4 mt-4">
            <!-- Bucle para recorrer los continentes -->
            <?php foreach ($continentes as $continente) :?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="tarjetas d-flex flex-column">

                        <!-- Imagen -->
                        <img src="assets/img/home/<?= htmlspecialchars($continente->getImagen()) ?>" 
                            class="imgContinentes"
                            alt="<?= htmlspecialchars($continente->getNombre()) ?>"
                        >

                        <div class="cuerpo-tarjeta d-flex flex-column flex-grow-1">

                            <!-- Nombre del continente -->
                            <h4 class="vueling"> <?= htmlspecialchars($continente->getNombre()) ?></h4>

                            <!-- Descricion -->
                            <p class="descripcion sourceSans textoJustificado"><?= htmlspecialchars($continente->getDescripcion()) ?></p>

                            <!-- Precio -->
                            <h5 class="precio vueling"> Desde  <?= htmlspecialchars($continente->getPrecio()) ?> €</h5>

                            <!-- Boton de añadir a la carta-->
                            <a href="<?= url ?>?controller=carta&continente=<?= $continente->getNombre() ?>"
                                class="botonContinente">
                                    IR A <?=  htmlspecialchars( $continente ->getNombre()) ?>
                            </a>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<!-- SECCIÓN 2 -->
<section id="club" class="margen">
    <div class="contenedor">

        <!--CONTENIDO -->
        <div class="row">

            <!-- Texto izquierdo -->
            <div class="col-md-6 d-flex flex-column gap-5 justify-content-center">
                <h1 class="tituloClub vueling">YA ESTÁ AQUÍ EL NUEVO TASTEVUELING CLUB</h1>
                <p class="sourceSans fw-semibold textoJustificado">Regístrate gratis y empieza a disfrutar de ventajas exclusivas en nuestro restaurante. 
                Acumula puntos con cada visita, desbloquea recompensas y descubre promociones especiales. 
                ¡Solo por registrarte, ya formas parte de una experiencia llena de sabor!</p>
                <a href="#" class="botonClub vueling align-self-start"> ÚNETE AL CLUB</a>
            </div>

            <!--Imagen club -->
            <div class="col-md-6">
                <!-- Contenedor -->
                <div class="club">
                    <!-- Foto avion -->
                    <img src="assets/img/home/club.webp" class="fotoClub" alt="TasteVueling Club">
                    
                    <!-- Estamos de estreno -->
                    <div class="estreno sourceSans">
                        <h4 class="fw-bold">¡ESTAMOS DE ESTRENO!</h4>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<!-- SECCIÓN 3 -->
<section id="alergenos" class="margen py-5">

    <div class="contenedor">

        <!-- TÍTULO ALÉRGENOS -->
        <div class="row">
            <div class="col-md-12 vueling text-center">
                <h1>¿TIENES ALGÚN TIPO DE ALÉRGENO A LA COMIDA?</h1>
            </div>
        </div>

        <!-- Contenido -->
        <div class="row mt-4">

            <!-- CHEFS -->
            <div class="col-md-4 d-flex flex-column align-items-center text-center vueling">
                <div class="chef-icon"></div>
                <h5>CHEFS ESPECIALIZADOS</h5>
                <p class="sourceSans textoAlergenos">Contamos con especialistas en todo tipo de alérgenos</p>
            </div>

            <!-- DUDAS -->
            <div class="col-md-4 d-flex flex-column align-items-center text-center vueling">
                <div class="phone-icon"></div>
                <h5>¿DUDAS O INQUIETUDES?</h5>
                <p class="sourceSans textoAlergenos">Puedes contactar con nosotros para cualquier duda</p>
            </div>

            <!-- ALÉRGENOS -->
            <div class="col-md-4 d-flex flex-column align-items-center text-center vueling">
                <div class="certificado-icon"></div>
                <h5>CERTIFICADOS DE ALÉRGENOS</h5>
                <p class="sourceSans textoAlergenos">Estamos certificados para poder tratar todo tipo de alérgenos</p>
            </div>

        </div>

    </div>

</section>
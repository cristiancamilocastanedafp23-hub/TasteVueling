<!-- VISTA CARTA -->

<div class="contenedor">

    <!-- TITULO CARTA-->
    <div class="row">
        <div class="col-md-12 mt-5 vueling">
            <!-- Titulo carta-->
            <h1>NUESTRA CARTA</h1>
        </div>
    </div>

    <!-- INTRODUCCIÓN CARTA -->
    <div class="row">
        <div class="col-md-12">
            <p class="fs-6 textoJustificado vueling">
                Bienvenido a una experiencia sin fronteras. Te invitamos a recorrer 
                los cinco continentes a través de sus sabores más icónicos. 
                En cada destino encontrarás una cuidada selección de cuatro especialidades saladas, 
                una bebida tradicional para acompañar tu viaje y
                un toque dulce final para cerrar tu travesía gastronómica como se merece. 
                ¡Despega con nosotros y descubre el mundo en cada bocado!
            </p>
        </div>
    </div>

    <!-- NAVEGACIÓN POR BOTONES EN LAS CATEGORIAS DE LOS CONTINENTES -->
    <div class="row g-2 g-md-3 mt-4 vueling">

        <!--Botones -->
        <?php foreach ($continentes as $continente): ?>
            <div class="col-12 col-md-auto">
                <a href="#<?htmlspecialchars($continente->getNombre())?>" class="boton-continente">
                    <?=htmlspecialchars($continente->getnombre())?>
                </a>
            </div>
        <?php endforeach; ?>

    </div> 
    
    <!-- SECCION DE PLATOS POR CONTINENTES -->
    <div class="margen mt-5 mb-5">
        <?php foreach ($continentes as $continente): ?>

            <!-- Recorremos para enseñar todas las categorias -->
            <section class="seccion-continente mb-5" data-continente="<?= htmlspecialchars($continente->getNombre()) ?>">
                <!-- Titulo continente -->
                <div class="row mb-3">
                    <div class="col-12 vueling">
                        <h2><?= htmlspecialchars($continente->getNombre()) ?></h2>
                    </div>
                </div>

                <!-- Enseñamos todos los platos en fila -->
                <div class="row g-4">
                    <?php foreach ($tipos as $nombreTipo => $productos): ?>
                        <?php foreach ($productos as $producto): ?>
                            <?php if ($producto->getCategoriaId() == $continente->getId()): ?>
                                
                                <!-- Enseñamos la tarjeta -->
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="tarjetas d-flex flex-column">
                                        <!-- Imagen -->
                                        <img src="assets/img/platos/<?= htmlspecialchars($producto->getImagen()) ?>"
                                            class="imgPlatos"
                                            alt="<?= htmlspecialchars($producto->getNombre()) ?>">
                                        <!-- Nombre del plato -->
                                        <div class="cuerpo-tarjeta d-flex flex-column flex-grow-1 p-3">
                                            <h4 class="titulo-plato vueling">
                                                <?= htmlspecialchars($producto->getNombre()) ?>
                                            </h4>
                                        <!-- Descripcion -->
                                            <p class="descripcion textoJustificado">
                                                <?= htmlspecialchars($producto->getDescripcion()) ?>
                                            </p>
                                        <!-- Boton y precio --> 
                                            <div class="pie-tarjeta d-flex justify-content-between align-items-center mt-auto">
                                                <button class="botonProducto">AÑADIR</button>
                                                <h5 class="precio vueling mb-0"><?= htmlspecialchars($producto->getPrecio()) ?> €</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
</div>
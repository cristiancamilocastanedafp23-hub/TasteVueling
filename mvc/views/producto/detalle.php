<!-- VISTA DETALLE DEL PRODUCTO -->
<div class="contenedor margenAbajo">

    <!-- MIGAS DE PAN -->
    <nav aria-label="breadcrumb" class="mt-5">
        <ol class="breadcrumb vueling">

            <!-- Carta -->
            <li class="breadcrumb-item">
                <a href="<?= url ?>?controller=carta">
                    Carta
                </a>
            </li>

            <!-- Continente -->
            <li class="breadcrumb-item">
                <a href="<?= url ?>?controller=carta&continente=<?= $nombreCategoria ?>">
                    <?= htmlspecialchars(mb_convert_case($nombreCategoria, MB_CASE_TITLE, "UTF-8"), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>                
                </a>
            </li>

            <!-- Producto actual -->
            <li class="breadcrumb-item active" aria-current="page">
                <?= htmlspecialchars(ucwords(strtolower($producto->getNombre()))) ?>
            </li>

        </ol>
    </nav>
    
    <div class="row gx-5 mt-4">
        <!-- ================= COLUMNA IZQUIERDA ================= -->
        <div class="col-12 col-lg-6">

            <!-- Titulo del plato-->
            <h2 class="vueling">
                <?= htmlspecialchars($producto->getNombre()) ?>
            </h2>
        
            <!-- Descripcion -->
            <div class="descripcionEditar sourceSans">
                <p><?= htmlspecialchars($producto->getDescripcion()) ?></p>
            </div>

            <!-- Imagen -->
            <div class="mt-4">
                <img src="assets/img/platos/<?= htmlspecialchars($producto->getImagen()) ?>"
                    class="imagenEditar"
                    alt="<?= htmlspecialchars($producto->getNombre()) ?>">
            </div>

            <!-- Ingredientes base -->
            <div class="mt-3 tarjetaBase">

                <!-- Base -->
                <div class="d-flex gap-2 mt-3 ms-3 sourceSans">
                    <div class="info-icon" aria-hidden="true"></div>
                    <p class="fw-bold">Ingredientes base</p>
                </div>

                <p class="sourceSans textoBase">
                    <?= implode(' · ', array_map('htmlspecialchars', $ingredientesBase)) ?>
                </p>

            </div>

            <!-- Alérgenos -->
            <div class="mt-3 tarjetaAlergenos">

                <!-- Iconos y nombre -->
                <div class="d-flex gap-2 mt-3 ms-3 sourceSans">
                    <div class="alert-icon" aria-hidden="true"></div>
                    <p class="fw-bold">Alérgenos que puede contener</p>
                </div>

                <!-- Iconos y su nombre -->
                <?php if (!empty($alergenos)): ?>
                    <div class="d-flex gap-3 pb-3 sourceSans textoBase">
                        <?php foreach ($alergenos as $alergeno): ?>
                            <div class="d-flex align-items-center gap-1 ">
                                <img  src="assets/icons/alergenos/<?= htmlspecialchars($alergeno->getIcono()) ?>"
                                    alt="<?= htmlspecialchars($alergeno->getNombre()) ?>"
                                    class="iconosAlergenos">
                                <span><?= htmlspecialchars($alergeno->getNombre()) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="sourceSans textoBase">Sin alérgenos declarados.</p>
                <?php endif; ?>

            </div>

        </div>

        <!-- ================= COLUMNA DERECHA ================= -->
        <div class="col-12 col-lg-6">
            
            <!-- Titulo y puntos -->
            <div class="d-flex gap-1">
                <!-- Personaliza -->
                <h2 class="vueling">
                    PERSONALIZA TU VIAJE POR <?= htmlspecialchars($nombreCategoria) ?>
                </h2>
                
                <!-- Puntos que obtienen el usuario -->
                <div class="d-flex flex-column tarjetaPuntos sourceSans">

                    <!-- Icono y cantidad de puntos ganados -->
                    <div class="d-flex gap-2 mb-2">
                        <div class="moneda-icon"></div>
                        <span id="puntosObtenidos" class="textoAmarillo fw-bold"> + <?= htmlspecialchars($puntosObtenidos) ?> PUNTOS OBTENIDOS </span>
                    </div>
                    
                    <!-- Texto -->
                    <p class="text-white fw-bold">¡SIGUE SUMANDO PUNTOS PARA OBTENER MEJORES RECOMPENSAS!</p>
                </div>
                
            </div>

            <!-- Formulario -->
            <form method="POST" action="<?= url ?>?controller=producto&action=detalle&id=<?= $producto->getId() ?>&tipo=<?= $producto->getTipoId() ?>">
                <!-- Bucle para recorrer todos los ingredientes -->
                <?php foreach ($ingredientes as $ingrediente):?>

                    <!-- Condicional para que no enseñe los ingredientes obligatorios del plato-->
                    <?php if ($ingrediente->getTipo() !== 'base'): ?>
                        
                        <!-- Ingredientes -->
                        <label class="ingredientes">

                            <!-- Check del ingrediente -->
                            <span class="ingredienteCheck">
                                <input type="checkbox" onclick="recalcularSubtotalProducto(this, <?= $ingrediente->getPrecioExtra()?>)"
                                    name="ingredientes[]"
                                    value="<?= $ingrediente->getIngredienteId() ?>"
                                    <?= in_array($ingrediente->getIngredienteId(), $marcados) && $ingrediente->getTipo() === 'incluido' ? 'checked' : '' ?>
                                >

                                <!-- Nombre ingredientes -->
                                <span class="sourceSans fw-bold">
                                    <?= htmlspecialchars($ingrediente->getNombre()) ?>
                                </span>
                            </span>

                            <!-- Precio de los ingredientes extra -->
                            <?php if ($ingrediente->getTipo() === 'extra'): ?>

                                <span class="precioExtra"> 
                                    <span class="masRosa" aria-hidden="true">+</span>
                                    <?= number_format((float)$ingrediente->getPrecioExtra(), 2, ',', '.') ?> €
                                </span>

                            <?php endif; ?>

                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- Boton de añadir al carrito -->
                <button id="botonAnadir" type="submit" name="accion" value="anadir" class="botonAnadir vueling mt-4">
                    Añadir al carrito por <?= number_format($precioTotal, 2, ',', '.') ?> €
                </button>

            </form>

        </div>
    </div>
</div>
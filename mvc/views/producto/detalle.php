<!-- VISTA DETALLE DEL PRODUCTO -->
<div class="contenedor margen">
    
    <div class="row gx-5">
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
                    <div class="info-icon"></div>
                    <p class="fw-bold">Ingredientes base</p>
                </div>

                <p class="sourceSans textoBase">
                    <?= implode(' · ', array_map('htmlspecialchars', $ingredientesBase)) ?>
                </p>

            </div>

            <!-- Alérgenos -->
            <div class="mt-3 tarjetaAlergenos">

                <!-- Base -->
                <div class="d-flex gap-2 mt-3 ms-3 sourceSans">
                    <div class="alert-icon"></div>
                    <p class="fw-bold">Alérgenos que puede contener</p>
                </div>

                <p class="sourceSans textoBase">
                    <?= implode(' · ', array_map('htmlspecialchars', $alergenos)) ?>
                </p>

            </div>

        </div>

        <!-- ================= COLUMNA DERECHA ================= -->
        <div class="col-12 col-lg-6">
            
            <!-- Personaliza -->
            <h2 class="vueling">
                PERSONALIZA TU VIAJE POR <?= htmlspecialchars($nombreCategoria) ?>
            </h2>

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
                                    <span class="masRosa">+</span>
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
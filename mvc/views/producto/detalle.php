<!-- VISTA DETALLE DEL PRODUCTO -->

<script>

function recalcularSubtotalProducto(cb, precioExtraSeleccionado){
    const boton = document.querySelector("#botonAnadir");
    textoBotonAnadir=boton.textContent;
    const importe = textoBotonAnadir.match(/[\d.,]+/);
    const importeBoton = importe ? parseFloat(importe[0].replace(",", ".")) : 0;
    
    let suma=importeBoton;
    
    if (cb.checked) {
       suma = precioExtraSeleccionado + importeBoton;
      // sumo el importe del producto con extra chequeado
    } else {
       suma= importeBoton - precioExtraSeleccionado;
      // resto el importe del producto con extra chequeado
    }
    
    const sumaconComa =  suma.toFixed(2).replace(".", ",");
    boton.textContent="Añadir al carrito por " + sumaconComa + " €";
}

</script>

<div class="contenedor margen">

    <!-- Títulos -->
    <div class="row">
        
            <!-- Titulo del plato-->
        <div class="col-12 col-lg-6 text-center">
            <h2 class="vueling">
                <?= htmlspecialchars($producto->getNombre()) ?>
            </h2>

        </div>

        <!-- Personaliza -->
        <div class="col-12 col-lg-6">
            <h2 class="vueling">
                PERSONALIZA TU VIAJE POR <?= htmlspecialchars($nombreCategoria) ?>
            </h2>
        </div>
        
    </div>
    
    <div class="row">

        <!-- ================= COLUMNA IZQUIERDA ================= -->
        <div class="col-12 col-lg-6">
            <!-- Imagen -->
            <div class="mt-4">
                <img src="assets/img/platos/<?= htmlspecialchars($producto->getImagen()) ?>"
                     class="imagenEditar"
                     alt="<?= htmlspecialchars($producto->getNombre()) ?>">
            </div>

            <!-- Ingredientes base y alérgenos -->
            <div class="mt-3 tarjetaBaseAlergenos">

                <!-- Base -->
                <div class="d-flex gap-2 mt-3 ms-3 sourceSans">
                    <div class="info-icon"></div>
                    <p class="fw-bold">Ingredientes base</p>
                </div>

                <p class="sourceSans textoBase">
                    <?= implode(' · ', array_map('htmlspecialchars', $ingredientesBase)) ?>
                </p>

                <!-- Alérgenos -->
                <div class="d-flex gap-2 mt-3 ms-3 sourceSans">
                    <div class="alert-icon"></div>
                    <p class="fw-bold">Alérgenos</p>
                </div>

                <p class="sourceSans textoBase">
                    <?= implode(' · ', array_map('htmlspecialchars', $alergenos)) ?>
                </p>

            </div>

        </div>

        <!-- ================= COLUMNA DERECHA ================= -->
        <div class="col-12 col-lg-6 mt-4">
            <!-- Formulario -->
            <form method="POST" action="<?= url ?>?controller=producto&action=detalle&id=<?= $producto->getId() ?>&tipo=<?= $producto->getTipoId() ?>">
                <!-- Bucle para recorrer todos los ingredientes -->
                <?php foreach ($ingredientes as $ingrediente): ?>

                    <!-- Condicional para que no enseñe los ingredientes obligatorios del plato-->
                    <?php if ($ingrediente->getTipo() !== 'base'): ?>
                        
                        <!-- Ingredientes -->
                        <label class="ingredientes">

                            <!-- Check del ingrediente -->
                            <span class="ingredienteCheck">
                                <input type="checkbox" onclick="recalcularSubtotalProducto(this, <?= $ingrediente->getPrecioExtra()?>)"
                                    name="ingredientes[] "
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
                                    <?= $ingrediente->getPrecioExtra() ?> €
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
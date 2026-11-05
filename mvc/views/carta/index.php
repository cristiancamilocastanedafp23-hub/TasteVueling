<section class="carta-container">
    <div class="carta-header">
        <h2>NUESTRA CARTA</h2>
        <p>Bienvenido a una experiencia sin fronteras. Recorre los cinco continentes a través de sus platos y postres icónicos[cite: 11].</p>
    </div>

    <!-- Navegación por Continentes y Bebidas -->
    <div class="continentes-nav">
        <a href="#Europa" class="btn-continente">EUROPA</a>
        <a href="#África" class="btn-continente">ÁFRICA</a>
        <a href="#Norte América" class="btn-continente">NORTE AMÉRICA</a>
        <a href="#Ásia" class="btn-continente">ÁSIA</a>
        <a href="#Sur América" class="btn-continente">SUR AMÉRICA</a>
        <a href="#Bebidas" class="btn-continente btn-bebidas">BEBIDAS</a>
    </div>

    <!-- 1. Secciones de comida por Continente -->
    <div class="carta-secciones">
        <?php foreach ($cartaProductos as $continente => $tipos): ?>
            <div id="<?= htmlspecialchars($continente) ?>" class="continente-seccion">
                <h3><?= htmlspecialchars($continente) ?></h3>
                
                <!-- Platos principales salados -->
                <?php if (isset($tipos['plato'])): ?>
                    <div class="grid-productos">
                        <?php foreach ($tipos['plato'] as $producto): ?>
                            <article class="card-producto">
                                <h5><?= htmlspecialchars($producto->getNombre()) ?></h5>
                                <p><?= htmlspecialchars($producto->getDescripcion()) ?></p>
                                <span class="precio"><?= number_format($producto->getPrecio(), 2) ?> €</span>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Postre al final del continente -->
                <?php if (isset($tipos['postre'])): ?>
                    <div class="postre-bloque">
                        <h4>Toque dulce</h4>
                        <?php foreach ($tipos['postre'] as $postre): ?>
                            <article class="card-producto card-postre">
                                <h5><?= htmlspecialchars($postre->getNombre()) ?></h5>
                                <p><?= htmlspecialchars($postre->getDescripcion()) ?></p>
                                <span class="precio"><?= number_format($postre->getPrecio(), 2) ?> €</span>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- 2. Sección global e independiente de Bebidas -->
    <div id="Bebidas" class="bebidas-seccion">
        <h3>NUESTRAS BEBIDAS</h3>
        <?php if (empty($bebidas)): ?>
            <p>No hay bebidas disponibles en este momento.</p>
        <?php else: ?>
            <div class="grid-productos">
                <?php foreach ($bebidas as $bebida): ?>
                    <article class="card-producto card-bebida">
                        <h5><?= htmlspecialchars($bebida->getNombre()) ?></h5>
                        <p><?= htmlspecialchars($bebida->getDescripcion()) ?></p>
                        <span class="precio"><?= number_format($bebida->getPrecio(), 2) ?> €</span>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
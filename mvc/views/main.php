<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taste Vueling</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS del Header usando la constante URL global -->
    <link rel="stylesheet" href="<?= url ?>assets/css/header.css">
</head>
<body>

    <!-- Carga segura del Header / Partial -->
    <?php 
    $headerPath = __DIR__ . '/partials/header.php';
    if (file_exists($headerPath)) {
        include_once $headerPath;
    }
    ?>

    <!-- Contenido principal dinámico de la página -->
    <main class="container my-4">
        <?php 
        if (isset($view) && file_exists($view)) {
            include_once $view;
        } else {
            echo "<p>No se pudo cargar el contenido de la vista.</p>";
        }
        ?>
    </main>

    <!-- Carga segura del Footer / Partial -->
    <?php 
    $footerPath = __DIR__ . '/partials/footer.php';
    if (file_exists($footerPath)) {
        include_once $footerPath;
    }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
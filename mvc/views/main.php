<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taste Vueling</title>

    <!-- Favicon --> 
    <link rel="icon" type="image/jpeg" href="/assets/img/header/logoSinFondo.jpg">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootrstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Global -->
    <link rel="stylesheet" href="assets/css/global.css">

    <!-- CSS del Header -->
    <link rel="stylesheet" href="assets/css/header.css">

    <!-- CSS de la Carta -->
    <link rel="stylesheet" href="assets/css/carta.css">

    <!-- CSS del Footer -->
    <link rel="stylesheet" href="assets/css/footer.css">

    
</head>
<body>

    <!-- Cargamos el Header-->
    <?php include_once __DIR__ . '/partials/header.php';?>

    <?php include_once $view ?>

    <!-- Cargamos el Footer --> 
    <?php include_once __DIR__ . '/partials/footer.php';?>

</body>
</html>
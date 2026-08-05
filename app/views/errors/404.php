<?php

http_response_code(404);
$site = require APP_PATH . '/config/site.php';
$title = 'Pagina no encontrada | ' . $site['brand']['name'];
$description = 'La pagina solicitada no existe.';
$view = __FILE__;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title); ?></title>
    <link rel="stylesheet" href="<?= asset('css/styles.css'); ?>">
</head>
<body>
    <main class="error-page">
        <p class="eyebrow">404</p>
        <h1>Pagina no encontrada</h1>
        <p>La ruta que intentaste abrir no esta disponible.</p>
        <a class="button button--primary" href="<?= url(); ?>">Volver al inicio</a>
    </main>
</body>
</html>

<?php

$title = $title ?? 'SENANMI';
$description = $description ?? '';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($description); ?>">
    <title><?= e($title); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/styles.css'); ?>">
</head>
<body>
    <header class="site-header" data-header>
        <a class="brand" href="<?= url(); ?>" aria-label="Inicio SENANMI">
            <img class="brand__logo" src="<?= media_url($site['brand']['logo'] ?? 'img/lg.png'); ?>" alt="<?= e($site['brand']['name'] ?? 'SENANMI'); ?>">
        </a>

        <button class="nav-toggle" type="button" data-nav-toggle aria-label="Abrir menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="site-nav" data-nav>
            <a href="#inicio">Inicio</a>
            <a href="#que-es">SENANMI</a>
            <a href="#problema">Problema</a>
            <a href="#solucion">Solucion</a>
            <a href="#app-movil">App</a>
            <a href="#crm">CRM</a>
            <a href="#video-demo">Video</a>
            <a href="#contacto">Contacto</a>
        </nav>
    </header>

    <main>
        <?php require $view; ?>
    </main>

    <footer class="site-footer">
        <div class="site-footer__top">
            <a href="<?= url(); ?>" aria-label="Inicio SENANMI">
                <img class="site-footer__logo" src="<?= media_url($site['brand']['logo'] ?? 'img/lg.png'); ?>" alt="<?= e($site['brand']['name'] ?? 'SENANMI'); ?>">
            </a>
        </div>

        <div class="site-footer__grid">
            <div class="site-footer__about">
                <p><?= e($site['brand']['tagline'] ?? 'Tecnologia para la gestion vial.'); ?></p>
            </div>

            <nav class="site-footer__links" aria-label="Enlaces rapidos">
                <h3>Enlaces rapidos</h3>
                <a href="#inicio">Inicio</a>
                <a href="#que-es">SENANMI</a>
                <a href="#problema">Problema</a>
                <a href="#solucion">Solucion</a>
                <a href="#app-movil">Aplicacion en tablet</a>
                <a href="#crm">CRM Administrativo</a>
                <a href="#croquis">Croquis inteligente</a>
                <a href="#video-demo">Video</a>
                <a href="#contacto">Contacto</a>
            </nav>

            <div class="site-footer__contact">
                <h3>Contactanos</h3>
                <?php if (!empty($site['contact']['address'])): ?>
                    <address><?= e($site['contact']['address']); ?></address>
                <?php endif; ?>
                <?php if (!empty($site['contact']['phone'])): ?>
                    <a href="tel:<?= preg_replace('/\D+/', '', $site['contact']['phone']); ?>"><?= e($site['contact']['phone']); ?></a>
                <?php endif; ?>
                <a href="mailto:<?= e($site['contact']['email'] ?? 'contacto@senanmi.com'); ?>">
                    <?= senanmi_icon('mail'); ?>
                    <span><?= e($site['contact']['email'] ?? 'contacto@senanmi.com'); ?></span>
                </a>
                <?php if (!empty($site['contact']['whatsapp'])): ?>
                    <a href="https://wa.me/<?= e($site['contact']['whatsapp']); ?>" target="_blank" rel="noopener">
                        <?= senanmi_icon('whatsapp'); ?>
                        <span>WhatsApp</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; <?= date('Y'); ?> <?= e($site['brand']['name'] ?? 'SENANMI'); ?>. Todos los derechos reservados.</p>
            
        </div>
    </footer>

    <script src="<?= asset('js/main.js'); ?>" defer></script>
</body>
</html>

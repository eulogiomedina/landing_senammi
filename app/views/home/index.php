<?php

$heroVideo = media_url($site['media']['hero_video'] ?? '');
$heroImage = media_url($site['media']['hero_image'] ?? '');
$heroPoster = media_url($site['media']['hero_poster'] ?? '');
$dashboardImage = media_url($site['media']['dashboard'] ?? '');
$appMainImage = media_url($site['media']['app_main'] ?? '');
$solutionImage = media_url($site['media']['solution_image'] ?? '');
$demoVideoSource = $site['media']['demo_video'] ?? '';
$demoVideo = media_url($demoVideoSource);
$demoEmbed = youtube_embed_url($demoVideoSource);
$demoPoster = media_url($site['media']['demo_poster'] ?? '');
$sketchVideo = media_url($site['media']['sketch_video'] ?? '');
$sketchBefore = media_url($site['media']['sketch_before'] ?? '');
$sketchAfter = media_url($site['media']['sketch_after'] ?? '');
$pdfPreview = media_url($site['media']['pdf_preview'] ?? '');
?>

<section class="hero hero--media" id="inicio">
    <?php if ($heroImage !== ''): ?>
        <img class="hero__video" src="<?= e($heroImage); ?>" alt="" aria-hidden="true">
    <?php elseif ($heroVideo !== ''): ?>
        <video class="hero__video" autoplay muted loop playsinline <?php if ($heroPoster !== ''): ?>poster="<?= e($heroPoster); ?>"<?php endif; ?>>
            <source src="<?= e($heroVideo); ?>" type="video/mp4">
        </video>
    <?php else: ?>
        <div class="hero__video hero__video--placeholder" aria-hidden="true"></div>
    <?php endif; ?>

    <div class="hero__overlay"></div>

    <div class="hero__content" data-reveal>
        <img class="hero__logo" src="<?= media_url($site['brand']['logo'] ?? 'img/lg.png'); ?>" alt="<?= e($site['brand']['name']); ?>">
        <h1><?= e($site['hero']['title']); ?></h1>
        <p class="hero__description"><?= e($site['hero']['description']); ?></p>

        <div class="hero__actions">
            <a class="button button--primary" href="<?= e($site['hero']['primary_cta']['href']); ?>">
                <?= e($site['hero']['primary_cta']['label']); ?>
            </a>
            <a class="button button--secondary" href="<?= e($site['hero']['secondary_cta']['href']); ?>">
                <?= e($site['hero']['secondary_cta']['label']); ?>
            </a>
            <a class="button button--secondary" href="https://wa.me/<?= e($site['contact']['whatsapp']); ?>" target="_blank" rel="noopener">
                <?= senanmi_icon('whatsapp'); ?>
                <span>WhatsApp</span>
            </a>
        </div>
    </div>
</section>

<section class="section section--split" id="que-es">
    <div class="section__intro" data-reveal>
        <p class="eyebrow"><?= e($site['about']['eyebrow']); ?></p>
        <h2><?= e($site['about']['title']); ?></h2>
        <p><?= e($site['about']['description']); ?></p>
        <ul class="check-list">
            <?php foreach ($site['about']['points'] as $point): ?>
                <li><?= e($point); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="about-media-stack" data-reveal>
        <div class="media-frame media-frame--dashboard media-frame--float">
            <?php if ($dashboardImage !== ''): ?>
                <img src="<?= e($dashboardImage); ?>" alt="Dashboard CRM SENANMI">
            <?php else: ?>
                <div class="media-placeholder">
                    <span>Dashboard CRM</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="about-tablet-preview media-frame--float-delayed">
            <?php if ($appMainImage !== ''): ?>
                <img src="<?= e($appMainImage); ?>" alt="Pantalla principal de la aplicacion SENANMI">
            <?php else: ?>
                <span>Pantalla principal</span>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section" id="problema">
    <div class="section__intro" data-reveal>
        <p class="eyebrow">Problema</p>
        <h2>Lo que hoy frena la atencion vial</h2>
    </div>

    <div class="problem-grid">
        <?php foreach ($site['problems'] as $index => $problem): ?>
            <article class="problem-card" data-reveal>
                <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                <h3><?= e($problem['title']); ?></h3>
                <p><?= e($problem['description']); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section solution-section" id="solucion">
    <div class="section__intro" data-reveal>
        <p class="eyebrow"><?= e($site['solution']['eyebrow']); ?></p>
        <h2><?= e($site['solution']['title']); ?></h2>
        <p><?= e($site['solution']['description']); ?></p>
    </div>

    <div class="solution-board" data-reveal>
        <figure class="solution-photo">
            <?php if ($solutionImage !== ''): ?>
                <img src="<?= e($solutionImage); ?>" alt="<?= e($site['solution']['image_caption']); ?>">
            <?php else: ?>
                <div class="media-placeholder">
                    <span>Fotografia grande</span>
                </div>
            <?php endif; ?>
        </figure>

        <ol class="solution-steps">
            <?php foreach ($site['solution']['steps'] as $index => $step): ?>
                <li>
                    <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                    <strong><?= e($step); ?></strong>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>

    <div class="section-cta" data-reveal>
        <p>Quieres ver como este flujo se adapta a tu municipio o dependencia?</p>
        <a class="button button--primary" href="https://wa.me/<?= e($site['contact']['whatsapp']); ?>" target="_blank" rel="noopener">
            <?= senanmi_icon('whatsapp'); ?>
            <span>Hablar por WhatsApp</span>
        </a>
    </div>
</section>

<section class="section video-section" id="video-demo">
    <div class="section__intro" data-reveal>
        <p class="eyebrow"><?= e($site['video_demo']['eyebrow']); ?></p>
        <h2><?= e($site['video_demo']['title']); ?></h2>
        <p><?= e($site['video_demo']['description']); ?></p>
    </div>

    <div class="video-shell" data-reveal>
        <?php if ($demoEmbed !== ''): ?>
            <iframe src="<?= e($demoEmbed); ?>" title="Video demostrativo SENANMI" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <?php elseif ($demoVideo !== ''): ?>
            <video controls <?php if ($demoPoster !== ''): ?>poster="<?= e($demoPoster); ?>"<?php endif; ?>>
                <source src="<?= e($demoVideo); ?>" type="video/mp4">
            </video>
        <?php else: ?>
            <div class="media-placeholder media-placeholder--video">
                <span>Video demostrativo 2-4 min</span>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="section app-story-section" id="app-movil">
    <div class="section__intro" data-reveal>
        <p class="eyebrow">Aplicacion en tablet</p>
        <h2>El parte vial se captura paso a paso desde campo</h2>
        <p>Cada pantalla acompana al oficial durante la atencion del incidente, reduciendo procesos manuales y ordenando la informacion desde el primer registro.</p>
    </div>

    <div class="app-story">
        <?php foreach ($site['mobile_screens'] as $index => $screen): ?>
            <?php $screenImage = media_url($screen['image'] ?? ''); ?>
            <?php $orientation = strtolower($screen['title']) === 'croquis' ? 'landscape' : 'portrait'; ?>
            <article class="app-story-item app-story-item--<?= e($orientation); ?>" data-reveal>
                <div class="app-story-copy">
                    <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                    <h3><?= e($screen['title']); ?></h3>
                    <p><?= e($screen['description'] ?? 'Pantalla operativa de SENANMI.'); ?></p>
                </div>

                <div class="app-story-device">
                    <div class="app-story-screen">
                        <?php if ($screenImage !== ''): ?>
                            <img src="<?= e($screenImage); ?>" alt="<?= e($screen['title']); ?>">
                        <?php else: ?>
                            <span><?= e($screen['title']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section crm-section" id="crm">
    <div class="section__intro" data-reveal>
        <p class="eyebrow">CRM Administrativo</p>
        <h2>Control administrativo, consulta operativa y estadisticas en tiempo real</h2>
    </div>

    <div class="crm-carousel" data-slider data-slider-autoplay="7500" data-reveal>
        <button class="slider-button" type="button" data-slider-prev aria-label="Ver captura anterior">&lt;</button>
        <div class="crm-track" data-slider-track>
        <?php foreach ($site['crm_screens'] as $screen): ?>
            <?php $screenImage = media_url($screen['image'] ?? ''); ?>
            <article class="crm-card">
                <?php if ($screenImage !== ''): ?>
                    <img src="<?= e($screenImage); ?>" alt="<?= e($screen['title']); ?>">
                <?php else: ?>
                    <div class="media-placeholder"><span><?= e($screen['title']); ?></span></div>
                <?php endif; ?>
                <div class="crm-card__body">
                    <h3><?= e($screen['title']); ?></h3>
                    <p><?= e($screen['description'] ?? 'Pantalla administrativa de SENANMI.'); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
        </div>
        <button class="slider-button" type="button" data-slider-next aria-label="Ver captura siguiente">&gt;</button>
    </div>
</section>

<section class="section sketch-section" id="croquis">
    <div class="section__intro" data-reveal>
        <p class="eyebrow"><?= e($site['sketch']['eyebrow']); ?></p>
        <h2><?= e($site['sketch']['title']); ?></h2>
        <p><?= e($site['sketch']['description']); ?></p>
    </div>

    <div class="compare-grid">
        <div class="media-frame compare-card compare-card--from-left" data-reveal>
            <span>Antes</span>
            <?php if ($sketchBefore !== ''): ?>
                <img src="<?= e($sketchBefore); ?>" alt="Croquis antes">
            <?php else: ?>
                <div class="media-placeholder"><span>Antes</span></div>
            <?php endif; ?>
        </div>
        <div class="media-frame compare-card compare-card--from-right" data-reveal>
            <span>Despues</span>
            <?php if ($sketchVideo !== ''): ?>
                <video controls>
                    <source src="<?= e($sketchVideo); ?>" type="video/mp4">
                </video>
            <?php elseif ($sketchAfter !== ''): ?>
                <img src="<?= e($sketchAfter); ?>" alt="Croquis despues">
            <?php else: ?>
                <div class="media-placeholder"><span>Despues</span></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="sketch-benefits">
        <?php foreach ($site['sketch']['benefits'] as $index => $benefit): ?>
            <span data-reveal style="--delay: <?= e((string) ($index * 120)); ?>ms;"><?= e($benefit); ?></span>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section--split" id="pdf">
    <div class="section__intro" data-reveal>
        <p class="eyebrow">Reportes PDF</p>
        <h2>Generacion automatica de expedientes digitales</h2>
        <p>El reporte final puede incluir datos generales, lugar del accidente, vehiculos, conductores, peatones, testigos, evidencias, croquis, observaciones y datos del oficial.</p>
    </div>

    <div class="pdf-preview" data-reveal>
        <?php if ($pdfPreview !== ''): ?>
            <img src="<?= e($pdfPreview); ?>" alt="Reporte PDF SENANMI">
        <?php else: ?>
            <div class="pdf-sheet">
                <span>PDF</span>
                <strong>Expediente digital</strong>
                <i></i><i></i><i></i><i></i>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="section" id="beneficios">
    <div class="section__intro" data-reveal>
        <p class="eyebrow">Beneficios</p>
        <h2>Valor institucional, no solo funcionalidades</h2>
    </div>

    <div class="benefit-list">
        <?php foreach ($site['benefits'] as $index => $benefit): ?>
            <span data-reveal style="--delay: <?= e((string) ($index * 80)); ?>ms;"><?= e($benefit); ?></span>
        <?php endforeach; ?>
    </div>
</section>

<section class="stats stats--large" aria-label="Estadisticas">
    <?php foreach ($site['stats'] as $index => $stat): ?>
        <article data-reveal style="--delay: <?= e((string) ($index * 90)); ?>ms;">
            <strong><?= e($stat['value']); ?></strong>
            <span><?= e($stat['label']); ?></span>
        </article>
    <?php endforeach; ?>
</section>

<section class="section faq-section" id="faq">
    <div class="section__intro" data-reveal>
        <h2>Preguntas frecuentes</h2>
    </div>

    <div class="faq-list">
        <?php foreach ($site['faqs'] as $faq): ?>
            <details data-reveal>
                <summary><?= e($faq['question']); ?></summary>
                <p><?= e($faq['answer']); ?></p>
            </details>
        <?php endforeach; ?>
    </div>
</section>

<section class="contact-band" id="contacto" data-reveal>
    <div>
        <p class="eyebrow">Contacto</p>
        <h2><?= e($site['contact']['title']); ?></h2>
        <p><?= e($site['contact']['description']); ?></p>
    </div>

    <div class="contact-direct">
        <a class="contact-button contact-button--mail" href="mailto:<?= e($site['contact']['email']); ?>">
            <?= senanmi_icon('mail'); ?>
            <span>
                <strong>Enviar correo</strong>
                <small><?= e($site['contact']['email']); ?></small>
            </span>
        </a>
        <a class="contact-button contact-button--whatsapp" href="https://wa.me/<?= e($site['contact']['whatsapp']); ?>" target="_blank" rel="noopener">
            <?= senanmi_icon('whatsapp'); ?>
            <span>
                <strong>Agendar por WhatsApp</strong>
                <small><?= e($site['contact']['phone']); ?></small>
            </span>
        </a>
    </div>
</section>

# Landing SENANMI

Estructura base para una landing page sencilla en PHP, pensada para correr en XAMPP.

## Estructura

```text
landing_senanmi/
├── app/
│   ├── config/
│   │   └── site.php
│   ├── controllers/
│   │   └── HomeController.php
│   ├── core/
│   │   └── helpers.php
│   └── views/
│       ├── errors/
│       │   └── 404.php
│       ├── home/
│       │   └── index.php
│       └── layouts/
│           └── main.php
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── styles.css
│   │   ├── img/
│   │   └── js/
│   │       └── main.js
│   ├── .htaccess
│   └── index.php
└── index.php
```

## Uso en XAMPP

Abre una de estas rutas:

- `http://localhost/landing_senanmi/`
- `http://localhost/landing_senanmi/public/`

## Donde editar

- Textos y secciones: `app/config/site.php`
- Maquetacion de la landing: `app/views/home/index.php`
- Layout HTML general: `app/views/layouts/main.php`
- Estilos: `public/assets/css/styles.css`
- Interacciones: `public/assets/js/main.js`

## Medios pendientes

La landing ya esta preparada para recibir imagenes y videos desde `app/config/site.php`.

Campos principales:

- `media.hero_video`: video comercial corto del hero.
- `media.hero_image`: imagen de fondo del hero cuando no se use video.
- `media.hero_poster`: imagen de respaldo del video del hero.
- `media.dashboard`: captura grande del Dashboard CRM.
- `media.demo_video`: video demostrativo largo.
- `media.demo_poster`: imagen de respaldo del video demostrativo.
- `media.sketch_before`, `media.sketch_after`, `media.sketch_video`: material para Croquis Inteligente.
- `media.pdf_preview`: vista del PDF.
- `modules[*].image`: capturas de modulos.
- `mobile_screens[*].image`: capturas de la app movil.
- `crm_screens[*].image`: capturas del CRM.
- `gallery[*].image`: imagenes para la galeria.

Puedes usar rutas relativas dentro de `public/assets`, por ejemplo:

```php
'media' => [
    'hero_video' => 'video/senanmi-comercial.mp4',
    'dashboard' => 'img/dashboard-crm.png',
],
```

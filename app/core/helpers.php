<?php

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string
{
    $path = ltrim($path, '/');

    return ASSET_URL . '/' . $path;
}

function media_url(?string $path): string
{
    $path = trim((string) $path);

    if ($path === '') {
        return '';
    }

    if (preg_match('/^https?:\/\//', $path) || str_starts_with($path, '/')) {
        return $path;
    }

    $normalized = str_replace('\\', '/', $path);
    $publicPath = str_replace('\\', '/', PUBLIC_PATH);
    $publicAssets = $publicPath . '/assets/';

    if (str_starts_with($normalized, $publicAssets)) {
        return asset(substr($normalized, strlen($publicAssets)));
    }

    if (str_starts_with($normalized, 'public/assets/')) {
        return asset(substr($normalized, strlen('public/assets/')));
    }

    if (str_starts_with($normalized, 'assets/')) {
        return asset(substr($normalized, strlen('assets/')));
    }

    return asset($normalized);
}

function senanmi_icon(string $name): string
{
    $icons = [
        'mail' => '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 6h16v12H4z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'whatsapp' => '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12.04 3.5a8.43 8.43 0 0 0-7.16 12.9L4 20.5l4.22-1a8.45 8.45 0 1 0 3.82-16Z" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linejoin="round"/><path d="M8.55 8.25c.18-.42.35-.43.7-.43h.5c.16 0 .38.05.58.45.22.47.74 1.75.8 1.88.07.13.1.29.02.46-.08.18-.12.29-.25.44-.12.15-.26.33-.37.44-.12.12-.25.25-.1.5.15.26.68 1.12 1.46 1.82 1 .9 1.85 1.18 2.1 1.31.26.14.41.12.56-.07.16-.18.65-.76.82-1.02.18-.26.35-.22.59-.13.25.08 1.56.73 1.83.87.27.13.45.2.52.31.06.12.06.68-.16 1.34-.23.66-1.3 1.26-1.82 1.34-.46.07-1.05.1-1.7-.1-.39-.12-.9-.29-1.55-.56-2.72-1.17-4.5-3.9-4.64-4.08-.14-.19-1.1-1.46-1.1-2.78 0-1.32.7-1.97.95-2.24.25-.27.55-.34.75-.34Z" fill="currentColor"/></svg>',
    ];

    return $icons[$name] ?? '';
}

function youtube_embed_url(string $url): string
{
    if (preg_match('/youtu\.be\/([A-Za-z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    if (preg_match('/youtube\.com\/watch\?v=([A-Za-z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    if (preg_match('/youtube\.com\/embed\/([A-Za-z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    return '';
}

function url(string $path = ''): string
{
    $path = trim($path, '/');

    if ($path === '') {
        return BASE_URL ?: '/';
    }

    return rtrim(BASE_URL, '/') . '/' . $path;
}

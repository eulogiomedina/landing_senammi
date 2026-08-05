<?php

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', __DIR__);

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = $scriptDir === '/' ? '' : rtrim($scriptDir, '/');
$isPublicEntry = str_ends_with($scriptDir, '/public') || $scriptDir === '/public';
$documentRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: '';
$isPublicDocumentRoot = $documentRoot !== '' && $documentRoot === realpath(PUBLIC_PATH);

define('BASE_URL', $scriptDir);
define('ASSET_URL', ($isPublicEntry || $isPublicDocumentRoot ? $scriptDir : $scriptDir . '/public') . '/assets');

require APP_PATH . '/core/helpers.php';
require APP_PATH . '/controllers/HomeController.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$basePath = BASE_URL ?: '';

if ($basePath !== '' && str_starts_with($requestPath, $basePath)) {
    $requestPath = substr($requestPath, strlen($basePath)) ?: '/';
}

$requestPath = trim($requestPath, '/');

if ($requestPath === '' || $requestPath === 'index.php') {
    (new HomeController())->index();
    exit;
}

require APP_PATH . '/views/errors/404.php';

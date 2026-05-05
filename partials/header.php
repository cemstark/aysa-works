<?php
require_once __DIR__ . '/../data.php';
$pageTitle = $pageTitle ?? $site['name'];
$pageDescription = $pageDescription ?? 'Aysa Works architecture and interiors portfolio.';
$bodyClass = $bodyClass ?? '';
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <title><?= e($pageTitle) ?></title>
    <link rel="preload" as="image" href="images/oturmaodasi.jpeg">
    <link rel="preload" href="assets/fonts/jost/jost-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/source-sans-3/source-sans-3-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="<?= e($bodyClass) ?>">
    <header class="site-header" data-header>
        <a class="brand" href="index.php" aria-label="<?= e($site['name']) ?> ana sayfa">
            <img src="images/logo.jpeg" alt="<?= e($site['name']) ?> logo">
            <span>
                <strong><?= e($site['name']) ?></strong>
                <em><?= e($site['tagline']) ?></em>
            </span>
        </a>
        <button class="menu-button" type="button" aria-expanded="false" aria-controls="site-nav" data-menu-button>
            Menu
        </button>
        <nav class="site-nav" id="site-nav" data-nav aria-label="Ana navigasyon">
            <div class="site-nav-inner">
                <div class="nav-folder <?= current_page() === 'projects.php' || current_page() === 'project.php' ? 'is-active' : '' ?>">
                    <a class="nav-folder-title" href="projects.php">Projects</a>
                    <div class="nav-folder-menu">
                        <a href="projects.php#residential-architecture">Residential Architecture</a>
                        <a href="projects.php#interiors-decor">Interiors & Decor</a>
                        <a href="projects.php#thoughtful-details">Thoughtful Details</a>
                        <a href="projects.php#furniture-objects">Furniture & Objects</a>
                    </div>
                </div>
                <div class="nav-folder <?= current_page() === 'studio.php' || current_page() === 'services.php' ? 'is-active' : '' ?>">
                    <a class="nav-folder-title" href="studio.php">Studio</a>
                    <div class="nav-folder-menu">
                        <a href="studio.php#collaboration">Design Approach</a>
                        <a href="services.php">Services</a>
                        <a href="studio.php#functionality">Functionality</a>
                    </div>
                </div>
                <div class="nav-folder <?= current_page() === 'contact.php' ? 'is-active' : '' ?>">
                    <a class="nav-folder-title" href="contact.php">Contact</a>
                    <div class="nav-folder-menu">
                        <a href="contact.php">General Contact</a>
                        <a href="contact.php">Project Inquiries</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>

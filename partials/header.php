<?php
require_once __DIR__ . '/../data.php';
$lang = current_lang();
$pageTitle = $pageTitle ?? $site['name'];
$pageDescription = $pageDescription ?? t('meta.description.default');
$bodyClass = $bodyClass ?? '';
$brandAria = sprintf(t('header.brand_aria'), $site['name']);
?>
<!doctype html>
<html lang="<?= e($lang) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <title><?= e($pageTitle) ?></title>
    <link rel="preload" as="image" href="images/hero-quality.webp" type="image/webp">
    <link rel="preload" href="assets/fonts/jost/jost-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/source-sans-3/source-sans-3-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="assets/css/fonts.css?v=<?= @filemtime(__DIR__ . '/../assets/css/fonts.css') ?: time() ?>">
    <link rel="stylesheet" href="assets/css/style.css?v=<?= @filemtime(__DIR__ . '/../assets/css/style.css') ?: time() ?>">
</head>
<body class="<?= e($bodyClass) ?>">
    <header class="site-header" data-header>
        <a class="brand" href="index.php" aria-label="<?= e($brandAria) ?>">
            <img src="images/logo.jpeg" alt="<?= e($site['name']) ?> logo">
            <span>
                <strong><?= e($site['name']) ?></strong>
                <em><?= e(tr($site['tagline'])) ?></em>
            </span>
        </a>
        <button class="menu-button" type="button" aria-expanded="false" aria-controls="site-nav" data-menu-button>
            <?= e(t('header.menu_button')) ?>
        </button>
        <nav class="site-nav" id="site-nav" data-nav aria-label="<?= e(t('header.nav_aria')) ?>">
            <div class="site-nav-inner">
                <div class="nav-folder <?= current_page() === 'projects.php' || current_page() === 'project.php' ? 'is-active' : '' ?>">
                    <a class="nav-folder-title" href="projects.php"><?= e(tr($nav['projects.php'])) ?></a>
                    <div class="nav-folder-menu">
                        <a href="projects.php#residential-architecture"><?= e(t('nav.projects.residential')) ?></a>
                        <a href="projects.php#interiors-decor"><?= e(t('nav.projects.interiors')) ?></a>
                        <a href="projects.php#thoughtful-details"><?= e(t('nav.projects.details')) ?></a>
                        <a href="projects.php#furniture-objects"><?= e(t('nav.projects.furniture')) ?></a>
                    </div>
                </div>
                <div class="nav-folder <?= current_page() === 'studio.php' || current_page() === 'services.php' ? 'is-active' : '' ?>">
                    <a class="nav-folder-title" href="studio.php"><?= e(tr($nav['studio.php'])) ?></a>
                    <div class="nav-folder-menu">
                        <a href="studio.php#collaboration"><?= e(t('nav.studio.approach')) ?></a>
                        <a href="services.php"><?= e(t('nav.studio.services')) ?></a>
                        <a href="studio.php#functionality"><?= e(t('nav.studio.functionality')) ?></a>
                    </div>
                </div>
                <div class="nav-folder <?= current_page() === 'contact.php' ? 'is-active' : '' ?>">
                    <a class="nav-folder-title" href="contact.php"><?= e(tr($nav['contact.php'])) ?></a>
                    <div class="nav-folder-menu">
                        <a href="contact.php"><?= e(t('nav.contact.general')) ?></a>
                        <a href="contact.php"><?= e(t('nav.contact.inquiries')) ?></a>
                    </div>
                </div>
            </div>
            <div class="lang-switch" role="group" aria-label="<?= e(t('header.lang_aria')) ?>">
                <a href="<?= e(lang_url('tr')) ?>" class="<?= $lang === 'tr' ? 'is-active' : '' ?>" hreflang="tr" lang="tr"<?= $lang === 'tr' ? ' aria-current="true"' : '' ?>>TR</a>
                <span aria-hidden="true">|</span>
                <a href="<?= e(lang_url('en')) ?>" class="<?= $lang === 'en' ? 'is-active' : '' ?>" hreflang="en" lang="en"<?= $lang === 'en' ? ' aria-current="true"' : '' ?>>EN</a>
            </div>
        </nav>
    </header>
    <main>

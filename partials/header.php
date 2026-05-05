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
        <nav class="site-nav" id="site-nav" data-nav>
            <?php foreach ($nav as $href => $label): ?>
                <a href="<?= e($href) ?>" class="<?= current_page() === $href ? 'is-active' : '' ?>"><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main>

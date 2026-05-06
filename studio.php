<?php
require_once __DIR__ . '/data.php';
$pageTitle = t('page.studio.title');
$pageDescription = t('page.studio.description');
require __DIR__ . '/partials/header.php';
?>

<section class="studio-opening section-wrap">
    <figure>
        <img src="images/yatakodasi.webp" alt="<?= e(t('studio.opening_alt')) ?>">
    </figure>
    <div>
        <p><?= e(t('studio.opening_text')) ?></p>
        <h1><?= e(t('studio.opening_title')) ?></h1>
    </div>
</section>

<section class="approach section-wrap" id="collaboration">
    <h2><?= e(t('studio.collab_title')) ?></h2>
    <div>
        <h3><?= e(t('studio.collab.clients.title')) ?></h3>
        <p><?= e(t('studio.collab.clients.text')) ?></p>
        <h3><?= e(t('studio.collab.studio.title')) ?></h3>
        <p><?= e(t('studio.collab.studio.text')) ?></p>
        <h3><?= e(t('studio.collab.builders.title')) ?></h3>
        <p><?= e(t('studio.collab.builders.text')) ?></p>
    </div>
</section>

<section class="approach section-wrap" id="functionality">
    <h2><?= e(t('studio.functionality_title')) ?></h2>
    <div>
        <figure class="inline-image">
            <img src="images/giyinmeodasi.webp" alt="<?= e(t('studio.functionality_alt')) ?>">
        </figure>
        <h3><?= e(t('studio.functionality.durable.title')) ?></h3>
        <p><?= e(t('studio.functionality.durable.text')) ?></p>
        <h3><?= e(t('studio.functionality.flex.title')) ?></h3>
        <p><?= e(t('studio.functionality.flex.text')) ?></p>
    </div>
</section>

<section class="approach section-wrap" id="materials">
    <h2><?= e(t('studio.sustainability_title')) ?></h2>
    <div>
        <h3><?= e(t('studio.sustainability.materials.title')) ?></h3>
        <p><?= e(t('studio.sustainability.materials.text')) ?></p>
        <h3><?= e(t('studio.sustainability.waste.title')) ?></h3>
        <p><?= e(t('studio.sustainability.waste.text')) ?></p>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

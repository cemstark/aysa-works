<?php
require_once __DIR__ . '/data.php';
$pageTitle = t('page.services.title');
$pageDescription = t('page.services.description');
require __DIR__ . '/partials/header.php';
?>

<section class="page-hero section-wrap">
    <p class="eyebrow"><?= e(t('services.eyebrow')) ?></p>
    <h1><?= e(t('services.title')) ?></h1>
</section>

<section class="service-page section-wrap">
    <figure>
        <img src="images/mutfak2.webp" alt="<?= e(t('services.kitchen_alt')) ?>">
    </figure>
    <div class="service-sections">
        <section id="architectural-design">
            <h2><?= e(t('services.section.architectural.title')) ?></h2>
            <p><?= e(t('services.section.architectural.text')) ?></p>
            <a class="text-link" href="contact.php"><?= e(t('services.read_more')) ?></a>
        </section>
        <section id="residential-interiors">
            <h2><?= e(t('services.section.residential.title')) ?></h2>
            <p><?= e(t('services.section.residential.text')) ?></p>
            <a class="text-link" href="contact.php"><?= e(t('services.read_more')) ?></a>
        </section>
        <section id="custom-kitchens">
            <h2><?= e(t('services.section.kitchens.title')) ?></h2>
            <p><?= e(t('services.section.kitchens.text')) ?></p>
        </section>
        <section id="commercial-interiors">
            <h2><?= e(t('services.section.commercial.title')) ?></h2>
            <p><?= e(t('services.section.commercial.text')) ?></p>
        </section>
    </div>
</section>

<section class="process section-wrap">
    <h2><?= e(t('services.process_title')) ?></h2>
    <div class="process-grid">
        <article>
            <span>I.</span>
            <h3><?= e(t('services.process.schematic.title')) ?></h3>
            <p><?= e(t('services.process.schematic.text')) ?></p>
        </article>
        <article>
            <span>II.</span>
            <h3><?= e(t('services.process.selections.title')) ?></h3>
            <p><?= e(t('services.process.selections.text')) ?></p>
        </article>
        <article>
            <span>III.</span>
            <h3><?= e(t('services.process.procurement.title')) ?></h3>
            <p><?= e(t('services.process.procurement.text')) ?></p>
        </article>
        <article>
            <span>IV.</span>
            <h3><?= e(t('services.process.installation.title')) ?></h3>
            <p><?= e(t('services.process.installation.text')) ?></p>
        </article>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

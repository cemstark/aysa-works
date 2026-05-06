<?php
require_once __DIR__ . '/data.php';
$pageTitle = t('page.home.title');
$pageDescription = t('page.home.description');
$bodyClass = 'home-page';
require __DIR__ . '/partials/header.php';
$featuredProjects = array_values(array_filter($projects, fn ($project) => $project['featured']));
?>

<section class="hero hero-fullscreen" aria-label="<?= e(t('home.hero_aria')) ?>">
    <div class="hero-title">
        <p class="eyebrow"><?= e(t('home.hero_eyebrow')) ?></p>
        <h1><?= e(t('home.hero_title')) ?></h1>
    </div>
    <a class="hero-scroll" href="#home-intro" aria-label="<?= e(t('home.hero_scroll_aria')) ?>"></a>
</section>

<section class="intro section-wrap" id="home-intro">
    <div></div>
    <div class="intro-copy">
        <p><?= e(t('home.intro_text')) ?></p>
        <a class="text-link" href="projects.php"><?= e(t('home.intro_link')) ?></a>
    </div>
</section>

<section class="lookbooks section-wrap" aria-labelledby="lookbooks-title">
    <figure>
        <img src="images/mutfak1.jpeg" alt="<?= e(t('home.lookbook_alt')) ?>">
    </figure>
    <div>
        <h2 id="lookbooks-title"><?= e(t('home.lookbooks_title')) ?></h2>
        <div class="lookbook-grid">
            <?php foreach ($lookbooks as $lookbook): ?>
                <a href="projects.php"><?= e(tr($lookbook)) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="split-links section-wrap">
    <a class="statement-card" href="studio.php">
        <span><?= e(t('home.split.approach.title')) ?></span>
        <p><?= e(t('home.split.approach.text')) ?></p>
    </a>
    <a class="statement-card" href="projects.php">
        <span><?= e(t('home.split.work.title')) ?></span>
        <p><?= e(t('home.split.work.text')) ?></p>
    </a>
</section>

<section class="guide section-wrap">
    <figure>
        <img src="images/merdiven1.jpeg" alt="<?= e(t('home.guide_alt')) ?>">
    </figure>
    <div class="guide-copy">
        <h2><?= e(t('home.guide_title')) ?></h2>
        <p><?= e(t('home.guide_text')) ?></p>
        <form action="contact.php" method="get" class="inline-form">
            <label for="guide-email"><?= e(t('home.guide_email_label')) ?></label>
            <div>
                <input id="guide-email" name="email" type="email" placeholder="<?= e(t('home.guide_email_placeholder')) ?>">
                <button type="submit"><?= e(t('home.guide_submit')) ?></button>
            </div>
        </form>
    </div>
</section>

<section class="services-preview section-wrap" aria-labelledby="services-title">
    <div class="section-kicker"><?= e(t('home.services_kicker')) ?></div>
    <div>
        <h2 id="services-title"><?= e(t('home.services_title')) ?></h2>
        <div class="service-list">
            <?php foreach ($services as $service): ?>
                <a href="<?= e($service['link']) ?>">
                    <h3><?= e(tr($service['title'])) ?></h3>
                    <p><?= e(tr($service['text'])) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="featured section-wrap" aria-labelledby="featured-title">
    <h2 id="featured-title"><?= e(t('home.featured_title')) ?></h2>
    <div class="project-row">
        <?php foreach ($featuredProjects as $project): ?>
            <a class="project-card" href="project.php?slug=<?= e($project['slug']) ?>">
                <img src="<?= e($project['image']) ?>" alt="<?= e(tr($project['title'])) ?>">
                <span><?= e(tr($project['category'])) ?></span>
                <h3><?= e(tr($project['title'])) ?></h3>
                <p><?= e(tr($project['location'])) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

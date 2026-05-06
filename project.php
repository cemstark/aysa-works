<?php
require_once __DIR__ . '/data.php';
$slug = $_GET['slug'] ?? '';
$project = project_by_slug($projects, $slug) ?? $projects[0];
$pageTitle = tr($project['title']) . ' | Aysa Works';
$pageDescription = tr($project['summary']);
require __DIR__ . '/partials/header.php';
$related = array_values(array_filter($projects, fn ($item) => $item['slug'] !== $project['slug']));
?>

<article class="project-detail">
    <section class="project-hero section-wrap">
        <div>
            <p class="eyebrow"><?= e(tr($project['category'])) ?></p>
            <h1><?= e(tr($project['title'])) ?></h1>
            <p><?= e(tr($project['location'])) ?></p>
        </div>
        <figure>
            <img src="<?= e($project['image']) ?>" alt="<?= e(tr($project['title'])) ?>">
        </figure>
    </section>

    <section class="project-story section-wrap">
        <div class="section-kicker"><?= e(t('project.notes_kicker')) ?></div>
        <div>
            <p class="lead"><?= e(tr($project['summary'])) ?></p>
            <?php foreach ($project['details'] as $detail): ?>
                <p><?= e(tr($detail)) ?></p>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="gallery-strip section-wrap" aria-label="<?= e(t('project.gallery_aria')) ?>">
        <?php foreach (array_slice($projects, 0, 6) as $item): ?>
            <img src="<?= e($item['image']) ?>" alt="<?= e(tr($item['title'])) ?>">
        <?php endforeach; ?>
    </section>

    <section class="next-projects section-wrap">
        <h2><?= e(t('project.more_title')) ?></h2>
        <div class="project-row">
            <?php foreach (array_slice($related, 0, 3) as $item): ?>
                <a class="project-card" href="project.php?slug=<?= e($item['slug']) ?>">
                    <img src="<?= e($item['image']) ?>" alt="<?= e(tr($item['title'])) ?>">
                    <span><?= e(tr($item['category'])) ?></span>
                    <h3><?= e(tr($item['title'])) ?></h3>
                    <p><?= e(tr($item['location'])) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</article>

<?php require __DIR__ . '/partials/footer.php'; ?>

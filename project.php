<?php
require_once __DIR__ . '/data.php';
$slug = $_GET['slug'] ?? '';
$project = project_by_slug($projects, $slug) ?? $projects[0];
$pageTitle = $project['title'] . ' | Aysa Works';
$pageDescription = $project['summary'];
require __DIR__ . '/partials/header.php';
$related = array_values(array_filter($projects, fn ($item) => $item['slug'] !== $project['slug']));
?>

<article class="project-detail">
    <section class="project-hero section-wrap">
        <div>
            <p class="eyebrow"><?= e($project['category']) ?></p>
            <h1><?= e($project['title']) ?></h1>
            <p><?= e($project['location']) ?></p>
        </div>
        <figure>
            <img src="<?= e($project['image']) ?>" alt="<?= e($project['title']) ?>">
        </figure>
    </section>

    <section class="project-story section-wrap">
        <div class="section-kicker">Project Notes</div>
        <div>
            <p class="lead"><?= e($project['summary']) ?></p>
            <?php foreach ($project['details'] as $detail): ?>
                <p><?= e($detail) ?></p>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="gallery-strip section-wrap" aria-label="Project image references">
        <?php foreach (array_slice($projects, 0, 6) as $item): ?>
            <img src="<?= e($item['image']) ?>" alt="<?= e($item['title']) ?>">
        <?php endforeach; ?>
    </section>

    <section class="next-projects section-wrap">
        <h2>More Projects</h2>
        <div class="project-row">
            <?php foreach (array_slice($related, 0, 3) as $item): ?>
                <a class="project-card" href="project.php?slug=<?= e($item['slug']) ?>">
                    <img src="<?= e($item['image']) ?>" alt="<?= e($item['title']) ?>">
                    <span><?= e($item['category']) ?></span>
                    <h3><?= e($item['title']) ?></h3>
                    <p><?= e($item['location']) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</article>

<?php require __DIR__ . '/partials/footer.php'; ?>

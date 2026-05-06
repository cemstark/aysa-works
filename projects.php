<?php
require_once __DIR__ . '/data.php';
$pageTitle = t('page.projects.title');
$pageDescription = t('page.projects.description');
require __DIR__ . '/partials/header.php';
$groups = [];
foreach ($projects as $project) {
    $groups[$project['category_slug']]['category'] = $project['category'];
    $groups[$project['category_slug']]['items'][] = $project;
}
?>

<section class="page-hero section-wrap">
    <p class="eyebrow"><?= e(t('projects.eyebrow')) ?></p>
    <h1><?= e(t('projects.title')) ?></h1>
</section>

<section class="project-index section-wrap">
    <?php foreach ($groups as $slug => $group): ?>
        <article class="project-category" id="<?= e($slug) ?>">
            <div class="category-heading">
                <h2><?= e(tr($group['category'])) ?></h2>
                <p><?= e(t('projects.featured_label')) ?></p>
            </div>
            <div class="category-image">
                <img src="<?= e($group['items'][0]['image']) ?>" alt="<?= e(tr($group['category'])) ?>">
            </div>
            <div class="project-list">
                <?php foreach ($group['items'] as $project): ?>
                    <a href="project.php?slug=<?= e($project['slug']) ?>">
                        <span><?= e(tr($project['title'])) ?></span>
                        <em><?= e(tr($project['location'])) ?></em>
                    </a>
                <?php endforeach; ?>
            </div>
        </article>
    <?php endforeach; ?>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

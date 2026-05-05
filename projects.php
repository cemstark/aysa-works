<?php
$pageTitle = 'Projects | Aysa Works';
$pageDescription = 'Selected Aysa Works residential architecture, interiors, decor, and custom built-in projects.';
require __DIR__ . '/partials/header.php';
$groups = [];
foreach ($projects as $project) {
    $groups[$project['category']][] = $project;
}
?>

<section class="page-hero section-wrap">
    <p class="eyebrow">Projects</p>
    <h1>Residential architecture, interiors, decor, furniture, and objects.</h1>
</section>

<section class="project-index section-wrap">
    <?php foreach ($groups as $category => $items): ?>
        <article class="project-category" id="<?= e(strtolower(str_replace([' & ', ' '], ['-', '-'], $category))) ?>">
            <div class="category-heading">
                <h2><?= e($category) ?></h2>
                <p>Featured</p>
            </div>
            <div class="category-image">
                <img src="<?= e($items[0]['image']) ?>" alt="<?= e($category) ?>">
            </div>
            <div class="project-list">
                <?php foreach ($items as $project): ?>
                    <a href="project.php?slug=<?= e($project['slug']) ?>">
                        <span><?= e($project['title']) ?></span>
                        <em><?= e($project['location']) ?></em>
                    </a>
                <?php endforeach; ?>
            </div>
        </article>
    <?php endforeach; ?>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

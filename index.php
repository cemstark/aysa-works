<?php
$pageTitle = 'Aysa Works | Architecture & Interiors';
$pageDescription = 'Warm, detailed interiors and renovation-focused architecture portfolio.';
$bodyClass = 'home-page';
require __DIR__ . '/partials/header.php';
$featuredProjects = array_values(array_filter($projects, fn ($project) => $project['featured']));
?>

<section class="hero hero-fullscreen" aria-label="Aysa Works opening image">
    <img src="images/oturmaodasi.jpeg" alt="Warm living room interior by Aysa Works">
    <div class="hero-title">
        <p class="eyebrow">Aysa Works Architecture & Interiors</p>
        <h1>Warm, well-crafted spaces shaped through natural materials and thoughtful details.</h1>
    </div>
    <a class="hero-scroll" href="#home-intro" aria-label="Scroll to studio introduction"></a>
</section>

<section class="intro section-wrap" id="home-intro">
    <div></div>
    <div class="intro-copy">
        <p>We create residential interiors, renovation concepts, custom kitchens, and built-in storage systems with a quiet, useful, and material-led approach.</p>
        <a class="text-link" href="projects.php">See our portfolio</a>
    </div>
</section>

<section class="lookbooks section-wrap" aria-labelledby="lookbooks-title">
    <figure>
        <img src="images/mutfak1.jpeg" alt="Custom kitchen lookbook preview">
    </figure>
    <div>
        <h2 id="lookbooks-title">Lookbooks</h2>
        <div class="lookbook-grid">
            <?php foreach ($lookbooks as $lookbook): ?>
                <a href="projects.php"><?= e($lookbook) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="split-links section-wrap">
    <a class="statement-card" href="studio.php">
        <span>Design Approach</span>
        <p>Collaboration, functionality, and long-lasting material decisions guide each project.</p>
    </a>
    <a class="statement-card" href="projects.php">
        <span>Recent Work</span>
        <p>Browse selected interiors, custom kitchens, storage pieces, and residential details.</p>
    </a>
</section>

<section class="guide section-wrap">
    <figure>
        <img src="images/merdiven1.jpeg" alt="Architectural stair and transition detail">
    </figure>
    <div class="guide-copy">
        <h2>Request a Design & Renovation Guide</h2>
        <p>There is a lot to consider at the beginning of a renovation. Send your email and we will follow up with a simple project-start checklist.</p>
        <form action="contact.php" method="get" class="inline-form">
            <label for="guide-email">Email Address</label>
            <div>
                <input id="guide-email" name="email" type="email" placeholder="name@example.com">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</section>

<section class="services-preview section-wrap" aria-labelledby="services-title">
    <div class="section-kicker">Studio Services</div>
    <div>
        <h2 id="services-title">We specialize in renovation-led interiors and detailed residential spaces.</h2>
        <div class="service-list">
            <?php foreach ($services as $service): ?>
                <a href="<?= e($service['link']) ?>">
                    <h3><?= e($service['title']) ?></h3>
                    <p><?= e($service['text']) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="featured section-wrap" aria-labelledby="featured-title">
    <h2 id="featured-title">Featured Projects</h2>
    <div class="project-row">
        <?php foreach ($featuredProjects as $project): ?>
            <a class="project-card" href="project.php?slug=<?= e($project['slug']) ?>">
                <img src="<?= e($project['image']) ?>" alt="<?= e($project['title']) ?>">
                <span><?= e($project['category']) ?></span>
                <h3><?= e($project['title']) ?></h3>
                <p><?= e($project['location']) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

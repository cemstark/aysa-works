<?php
require_once __DIR__ . '/data.php';
$pageTitle = t('page.contact.title');
$pageDescription = t('page.contact.description');
require __DIR__ . '/partials/header.php';
$prefillEmail = $_GET['email'] ?? '';
?>

<section class="contact-page section-wrap">
    <div>
        <p class="eyebrow"><?= e(t('contact.eyebrow')) ?></p>
        <h1><?= e(t('contact.title')) ?></h1>
        <p class="lead"><?= t('contact.lead') ?></p>
        <address class="contact-details">
            <?= e(tr($site['address'])) ?><br>
            <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a><br>
            <a href="tel:<?= e(str_replace(' ', '', $site['phone'])) ?>"><?= e($site['phone']) ?></a>
        </address>
    </div>
    <form class="contact-form" action="mailto:<?= e($site['email']) ?>" method="post" enctype="text/plain">
        <label>
            <?= e(t('contact.form.name')) ?>
            <input name="name" type="text" required>
        </label>
        <label>
            <?= e(t('contact.form.email')) ?>
            <input name="email" type="email" value="<?= e($prefillEmail) ?>" required>
        </label>
        <label>
            <?= e(t('contact.form.project_type')) ?>
            <select name="project_type">
                <option><?= e(t('contact.form.option.residential')) ?></option>
                <option><?= e(t('contact.form.option.renovation')) ?></option>
                <option><?= e(t('contact.form.option.kitchen')) ?></option>
                <option><?= e(t('contact.form.option.commercial')) ?></option>
            </select>
        </label>
        <label>
            <?= e(t('contact.form.message')) ?>
            <textarea name="message" rows="7" required></textarea>
        </label>
        <button type="submit"><?= e(t('contact.form.submit')) ?></button>
    </form>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

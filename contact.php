<?php
$pageTitle = 'Contact | Aysa Works';
$pageDescription = 'Contact Aysa Works for architecture and interiors project inquiries.';
require __DIR__ . '/partials/header.php';
$prefillEmail = $_GET['email'] ?? '';
?>

<section class="contact-page section-wrap">
    <div>
        <p class="eyebrow">General Contact</p>
        <h1>Tell us about the space you are working on.</h1>
        <p class="lead">Use this form as a starting point. Replace the placeholder contact details in <code>data.php</code> when the final email, phone, and address are ready.</p>
        <address class="contact-details">
            <?= e($site['address']) ?><br>
            <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a><br>
            <a href="tel:<?= e(str_replace(' ', '', $site['phone'])) ?>"><?= e($site['phone']) ?></a>
        </address>
    </div>
    <form class="contact-form" action="mailto:<?= e($site['email']) ?>" method="post" enctype="text/plain">
        <label>
            Name
            <input name="name" type="text" required>
        </label>
        <label>
            Email
            <input name="email" type="email" value="<?= e($prefillEmail) ?>" required>
        </label>
        <label>
            Project Type
            <select name="project_type">
                <option>Residential Interior</option>
                <option>Renovation</option>
                <option>Custom Kitchen / Built-in</option>
                <option>Commercial Interior</option>
            </select>
        </label>
        <label>
            Message
            <textarea name="message" rows="7" required></textarea>
        </label>
        <button type="submit">Submit</button>
    </form>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

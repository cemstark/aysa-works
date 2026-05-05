    </main>
    <footer class="site-footer">
        <div>
            <a class="footer-brand" href="index.php"><?= e($site['name']) ?></a>
            <p><?= e($site['tagline']) ?></p>
        </div>
        <address>
            <?= e($site['address']) ?><br>
            <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a><br>
            <a href="tel:<?= e(str_replace(' ', '', $site['phone'])) ?>"><?= e($site['phone']) ?></a>
        </address>
        <nav>
            <?php foreach ($nav as $href => $label): ?>
                <a href="<?= e($href) ?>"><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
    </footer>
    <script src="assets/js/main.js"></script>
</body>
</html>

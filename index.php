<?php
// ============================================================
// Boutique Kenza — index.php
// Main entry point — assembles all pages into a single SPA
// ============================================================

require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/functions.php';

// Convert products to JSON for JavaScript
$productsJson = productsToJson($products);
?>
<?php include __DIR__ . '/includes/header.php'; ?>
<?php include __DIR__ . '/includes/nav.php'; ?>

<!-- ============================================================
     PAGES — each .page div is shown/hidden by JS goToPage()
     ============================================================ -->

<?php include __DIR__ . '/pages/home.php'; ?>
<?php include __DIR__ . '/pages/collections.php'; ?>
<?php include __DIR__ . '/pages/new_sales.php'; ?>
<?php include __DIR__ . '/pages/checkout.php'; ?>
<?php include __DIR__ . '/pages/tracking.php'; ?>
<?php include __DIR__ . '/pages/auth.php'; ?>

<!-- ============================================================
     PHP → JS: Inject server-side data into JavaScript
     ============================================================ -->
<script>
// Products data from PHP (server-rendered, no AJAX needed)
window.PHP_PRODUCTS = <?= $productsJson ?>;
</script>

<!-- Scripts -->
<script src="assets/js/images.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

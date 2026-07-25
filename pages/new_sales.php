<?php // pages/new.php — New arrivals
$newProducts = array_filter($products, fn($p) => ($p['badge'] ?? '') === 'new');
?>
<!-- =================== NEW ARRIVALS PAGE =================== -->
<div class="page" id="page-new">
  <section>
    <div class="checkout-header">
      <span class="page-title-en">New Arrivals</span>
      <h1 class="page-title-ar">الجديد</h1>
    </div>
    <div style="padding: 60px;">
      <div class="section-header fade-in">
        <span class="section-eyebrow">Nouveautés <?= SITE_YEAR ?></span>
        <h2 class="section-title">آخر الوصولات</h2>
        <div class="section-line"></div>
      </div>
      <div class="products-grid" id="productsGridNew">
        <?php foreach (array_values($newProducts) as $i => $p): ?>
          <?= renderProductCard($p, $i) ?>
        <?php endforeach; ?>
        <?php if (empty($newProducts)): ?>
          <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--text-muted);">
            لا توجد وصولات جديدة حالياً
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
<!-- end new page -->

<?php // pages/sales.php — Sales / promotions
$saleProducts = array_filter($products, fn($p) => ($p['badge'] ?? '') === 'sale');
?>
<!-- =================== SALES PAGE =================== -->
<div class="page" id="page-sales">
  <section>
    <div class="checkout-header" style="background: linear-gradient(135deg, #C0392B, #E74C3C);">
      <span class="page-title-en">Special Offers</span>
      <h1 class="page-title-ar">العروض الخاصة 🏷️</h1>
    </div>
    <div style="padding: 60px;">
      <div class="section-header fade-in">
        <span class="section-eyebrow">Promotions spéciales</span>
        <h2 class="section-title">تخفيضات حصرية</h2>
        <div class="section-line"></div>
      </div>
      <p style="text-align:center;color:var(--text-muted);margin-bottom:40px;font-size:0.95rem;">
        تمتعي بتخفيضات تصل إلى ٥٠٪ على منتجات مختارة — لفترة محدودة!
      </p>
      <div class="products-grid" id="productsGridSales">
        <?php foreach (array_values($saleProducts) as $i => $p): ?>
          <?= renderProductCard($p, $i) ?>
        <?php endforeach; ?>
        <?php if (empty($saleProducts)): ?>
          <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--text-muted);">
            لا توجد عروض متاحة حالياً
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
<!-- end sales page -->

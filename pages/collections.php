<?php // pages/collections.php ?>

<!-- =================== COLLECTIONS PAGE =================== -->
<div class="page" id="page-collections">
  <section>
    <div class="checkout-header">
      <span class="page-title-en">Our Collections</span>
      <h1 class="page-title-ar">مجموعاتنا</h1>
    </div>

    <div style="padding: 60px;">
      <div class="section-header fade-in">
        <span class="section-eyebrow">Toutes les catégories</span>
        <h2 class="section-title">تصفحي الفئات</h2>
        <div class="section-line"></div>
      </div>

      <div class="categories-grid" style="margin-bottom: 60px;">
        <?php foreach ($categories as $i => $cat): ?>
          <?= renderCategoryCard($cat, $i) ?>
        <?php endforeach; ?>
      </div>

      <div class="section-header fade-in">
        <span class="section-eyebrow">Tous les produits</span>
        <h2 class="section-title">جميع المنتجات</h2>
        <div class="section-line"></div>
      </div>

      <div class="filter-tabs">
        <button class="filter-tab active" onclick="filterProducts('all', this, 'collectionsGrid')">الكل</button>
        <button class="filter-tab" onclick="filterProducts('dresses', this, 'collectionsGrid')">فساتين</button>
        <button class="filter-tab" onclick="filterProducts('abayas', this, 'collectionsGrid')">عبايات</button>
        <button class="filter-tab" onclick="filterProducts('blouses', this, 'collectionsGrid')">ملابس كلاسيكية</button>
        <button class="filter-tab" onclick="filterProducts('accessories', this, 'collectionsGrid')">إكسسوارات</button>
      </div>

      <div class="products-grid" id="collectionsGrid">
        <?php foreach ($products as $i => $p): ?>
          <?= renderProductCard($p, $i) ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>
<!-- end collections page -->

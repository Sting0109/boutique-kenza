<?php
// pages/home.php — Home page content
?>

<!-- =================== HOME PAGE =================== -->
<div class="page active" id="page-home">

  <!-- HERO -->
  <section class="hero">
    <div class="hero-bg" id="heroBg"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <p class="hero-eyebrow" id="heroEyebrow">Collection Printemps — ربيع <?= SITE_YEAR ?></p>
      <h1 class="hero-title" id="heroTitle">
        أناقة تليق<br>
        بـ<em>جمالك</em>
      </h1>
      <p class="hero-subtitle" id="heroSubtitle">
        اكتشفي تشكيلة بوتيك كنزة من الأزياء العصرية المتواضعة،<br>المصممة بأسلوب راقٍ يناسب المرأة الجزائرية الواثقة بنفسها.
      </p>
      <div class="hero-ctas">
        <button class="btn-primary" id="btnShopNow" data-i18n="btn.shop"
          onclick="document.getElementById('productsGrid').scrollIntoView({behavior:'smooth'})">
          تسوقي الآن
        </button>
        <button class="btn-outline" id="btnDiscover" data-i18n="btn.discover">اكتشفي المجموعة</button>
      </div>
    </div>
    <div class="hero-stats">
      <div class="hero-stat">
        <span class="hero-stat-num">+15٬000</span>
        <span class="hero-stat-label">زبونة راضية</span>
      </div>
      <div class="hero-stat">
        <span class="hero-stat-num">58</span>
        <span class="hero-stat-label">ولاية — livraison</span>
      </div>
      <div class="hero-stat">
        <span class="hero-stat-num">+200</span>
        <span class="hero-stat-label">موديل متاح</span>
      </div>
      <div class="hero-stat">
        <span class="hero-stat-num">4.9 ★</span>
        <span class="hero-stat-label">تقييم العملاء</span>
      </div>
    </div>
  </section>

  <!-- MARQUEE -->
  <div class="marquee-strip">
    <div class="marquee-track">
      <span>توصيل لجميع ولايات الجزائر</span><span class="marquee-dot">✦</span>
      <span>LIVRAISON PARTOUT EN ALGÉRIE</span><span class="marquee-dot">✦</span>
      <span>جودة عالية — أسعار مناسبة</span><span class="marquee-dot">✦</span>
      <span>QUALITÉ PREMIUM — PRIX DOUX</span><span class="marquee-dot">✦</span>
      <span>مجموعة ربيع <?= SITE_YEAR ?> متوفرة الآن</span><span class="marquee-dot">✦</span>
      <span>NOUVELLE COLLECTION DISPONIBLE</span><span class="marquee-dot">✦</span>
      <!-- duplicate for seamless loop -->
      <span>توصيل لجميع ولايات الجزائر</span><span class="marquee-dot">✦</span>
      <span>LIVRAISON PARTOUT EN ALGÉRIE</span><span class="marquee-dot">✦</span>
      <span>جودة عالية — أسعار مناسبة</span><span class="marquee-dot">✦</span>
      <span>QUALITÉ PREMIUM — PRIX DOUX</span><span class="marquee-dot">✦</span>
      <span>مجموعة ربيع <?= SITE_YEAR ?> متوفرة الآن</span><span class="marquee-dot">✦</span>
      <span>NOUVELLE COLLECTION DISPONIBLE</span><span class="marquee-dot">✦</span>
    </div>
  </div>

  <!-- TRUST STRIP -->
  <div class="trust-strip">
    <div class="trust-item">
      <span class="trust-icon">🚚</span>
      <div class="trust-text"><h4>توصيل سريع</h4><p>لجميع ولايات الجزائر</p></div>
    </div>
    <div class="trust-item">
      <span class="trust-icon">🔄</span>
      <div class="trust-text"><h4>إرجاع مجاني</h4><p>خلال ٧ أيام من الاستلام</p></div>
    </div>
    <div class="trust-item">
      <span class="trust-icon">✅</span>
      <div class="trust-text"><h4>جودة مضمونة</h4><p>خامات عالية المستوى</p></div>
    </div>
    <div class="trust-item">
      <span class="trust-icon">🔒</span>
      <div class="trust-text"><h4>دفع آمن</h4><p>الدفع عند الاستلام</p></div>
    </div>
  </div>

  <!-- CATEGORIES -->
  <section>
    <div class="section-header fade-in">
      <span class="section-eyebrow">Nos Catégories</span>
      <h2 class="section-title">تصفحي حسب الفئة</h2>
      <div class="section-line"></div>
    </div>
    <div class="categories-grid">
      <?php foreach ($categories as $i => $cat): ?>
        <?= renderCategoryCard($cat, $i) ?>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- PRODUCTS -->
  <section>
    <div class="section-header fade-in">
      <span class="section-eyebrow">Nos Produits</span>
      <h2 class="section-title">المجموعة الجديدة</h2>
      <div class="section-line"></div>
    </div>

    <!-- Filter Tabs -->
    <div class="filter-tabs">
      <button class="filter-tab active" onclick="filterProducts('all', this)">الكل</button>
      <button class="filter-tab" onclick="filterProducts('dresses', this)">فساتين</button>
      <button class="filter-tab" onclick="filterProducts('abayas', this)">عبايات</button>
      <button class="filter-tab" onclick="filterProducts('blouses', this)">ملابس كلاسيكية</button>
      <button class="filter-tab" onclick="filterProducts('accessories', this)">إكسسوارات</button>
    </div>

    <div class="products-grid" id="productsGrid">
      <?php foreach ($products as $i => $p): ?>
        <?= renderProductCard($p, $i) ?>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- PROMO BANNER -->
  <section class="promo-section">
    <div class="promo-bg"></div>
    <div class="promo-overlay"></div>
    <div class="promo-content">
      <span class="promo-tag">عرض محدود</span>
      <h2 class="promo-title">تخفيضات<br><span>نهاية الموسم</span></h2>
      <p class="promo-desc">اكتشفي تخفيضات تصل إلى ٥٠٪ على المجموعة الشتوية. عرض حصري لفترة محدودة.</p>
      <div class="countdown">
        <div class="countdown-item">
          <span class="countdown-num" id="cdDays">00</span>
          <span class="countdown-label">يوم</span>
        </div>
        <span class="countdown-sep">:</span>
        <div class="countdown-item">
          <span class="countdown-num" id="cdHours">00</span>
          <span class="countdown-label">ساعة</span>
        </div>
        <span class="countdown-sep">:</span>
        <div class="countdown-item">
          <span class="countdown-num" id="cdMins">00</span>
          <span class="countdown-label">دقيقة</span>
        </div>
        <span class="countdown-sep">:</span>
        <div class="countdown-item">
          <span class="countdown-num" id="cdSecs">00</span>
          <span class="countdown-label">ثانية</span>
        </div>
      </div>
      <button class="btn-primary" onclick="goToPage('sales')">تسوقي بسعر مخفوض</button>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section class="testimonials-bg">
    <div class="section-header fade-in">
      <span class="section-eyebrow">Avis Clients</span>
      <h2 class="section-title">ماذا تقول زبوناتنا</h2>
      <div class="section-line"></div>
    </div>
    <div class="testimonials-grid">
      <?php foreach ($testimonials as $t): ?>
        <?= renderTestimonialCard($t) ?>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- INSTAGRAM SECTION -->
  <section class="instagram-section">
    <div class="section-header fade-in">
      <span class="section-eyebrow">@boutique.kenza</span>
      <h2 class="section-title">تابعينا على إنستغرام</h2>
      <div class="section-line"></div>
    </div>
    <div class="instagram-grid">
      <?php
      $instaImgs = [
        'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=300&q=80',
        'https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=300&q=80',
        'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=300&q=80',
        'https://images.unsplash.com/photo-1551232864-3f0890e580d9?w=300&q=80',
        'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=300&q=80',
        'https://images.unsplash.com/photo-1614251055880-ee96e4803393?w=300&q=80',
      ];
      foreach ($instaImgs as $img): ?>
        <div class="insta-item">
          <img src="<?= $img ?>" alt="Instagram" loading="lazy">
          <div class="insta-overlay"><span class="insta-icon">📷</span></div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php include __DIR__ . '/../includes/footer_inner.php'; ?>

</div><!-- end home page -->

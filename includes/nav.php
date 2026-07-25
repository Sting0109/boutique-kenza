<!-- PRODUCT LIGHTBOX -->
<div class="lightbox" id="productLightbox" onclick="closeLightbox(event)">
  <div class="lightbox-modal" id="lightboxModal">
    <button class="lightbox-close" onclick="document.getElementById('productLightbox').classList.remove('open')">✕</button>
    <img class="lightbox-img" id="lightboxImg" src="" alt="">
    <div class="lightbox-info">
      <span class="lightbox-eyebrow" id="lightboxCategory">فساتين</span>
      <h2 class="lightbox-name" id="lightboxName">اسم المنتج</h2>
      <div class="lightbox-stars" id="lightboxStars">★★★★★</div>
      <div class="lightbox-price">
        <span class="lightbox-price-main" id="lightboxPrice">0 د.ج</span>
        <span class="lightbox-price-old" id="lightboxOldPrice"></span>
      </div>
      <p class="lightbox-desc">قطعة فاخرة مصممة بعناية لتناسب ذوق المرأة العصرية. خامات عالية الجودة، قصة أنيقة ومريحة.</p>
      <div style="margin-bottom:10px;font-size:0.78rem;font-weight:600;letter-spacing:1px;color:var(--text-muted);">المقاس</div>
      <div class="lightbox-sizes">
        <button class="size-btn selected">S</button>
        <button class="size-btn">M</button>
        <button class="size-btn">L</button>
        <button class="size-btn">XL</button>
      </div>
      <div class="lightbox-actions">
        <button class="lightbox-add-btn" id="lightboxAddBtn" onclick="addFromLightbox()">أضيفي للسلة 🛒</button>
      </div>
    </div>
  </div>
</div>

<!-- SUCCESS OVERLAY -->
<div class="success-overlay" id="successOverlay">
  <div class="success-modal">
    <div class="success-icon">✓</div>
    <h2 class="success-title">تم تأكيد طلبك!</h2>
    <p class="success-msg">شكراً لثقتك في بوتيك كنزة. سيتم التواصل معك قريباً لتأكيد موعد التوصيل.</p>
    <div class="success-order" id="successOrderId">رقم الطلب: #BK-<?= SITE_YEAR ?>-<?= rand(1000, 9999) ?></div>
    <button class="btn-primary" style="margin:0 auto;display:block;" onclick="closeSuccess()">متابعة التسوق</button>
  </div>
</div>

<!-- CART OVERLAY + SIDEBAR -->
<div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>
<div class="cart-sidebar" id="cartSidebar">
  <div class="cart-header">
    <span class="cart-title">🛒 سلة المشتريات</span>
    <button class="cart-close" onclick="toggleCart()">✕</button>
  </div>
  <div class="cart-items" id="cartItems">
    <div class="cart-empty">
      <span class="cart-empty-icon">🛍️</span>
      <p>سلة التسوق فارغة</p>
      <p style="font-size:0.78rem;margin-top:6px;color:var(--text-muted)">أضيفي قطعاً رائعة لمجموعتك</p>
    </div>
  </div>
  <div class="cart-footer">
    <div class="cart-total-row">
      <span class="cart-total-label">الإجمالي</span>
      <span class="cart-total-amount" id="cartTotal">0 د.ج</span>
    </div>
    <button class="cart-checkout-btn" onclick="goToPage('checkout'); toggleCart();">تأكيد الطلب ←</button>
  </div>
</div>

<!-- NAVIGATION -->
<nav class="nav" id="mainNav">
  <a class="nav-logo" onclick="goToPage('home')">Boutique <span>Kenza</span></a>
  <ul class="nav-links">
    <li><a data-i18n="nav.home" onclick="goToPage('home')">الرئيسية</a></li>
    <li><a data-i18n="nav.collections" onclick="goToPage('collections')">المجموعات</a></li>
    <li><a data-i18n="nav.new" onclick="goToPage('new')">الجديد</a></li>
    <li><a data-i18n="nav.sales" onclick="goToPage('sales')">العروض</a></li>
    <li><a data-i18n="nav.tracking" onclick="goToPage('tracking')">تتبع الطلب</a></li>
  </ul>
  <div class="nav-actions">
    <button class="lang-toggle" id="langBtn" onclick="toggleLang()">FR</button>
    <div class="dark-toggle" id="darkToggle" onclick="toggleDark()" title="الوضع الليلي"></div>
    <button class="nav-btn" onclick="goToPage('login')">👤</button>
    <button class="nav-btn" onclick="toggleCart()">
      🛒
      <span class="cart-badge" id="cartBadge">0</span>
    </button>
    <button class="hamburger" id="hamburger" onclick="toggleMobileMenu()" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
  <a data-i18n="nav.home" onclick="goToPage('home');closeMobileMenu()">🏠 الرئيسية</a>
  <a data-i18n="nav.collections" onclick="goToPage('collections');closeMobileMenu()">👗 المجموعات</a>
  <a data-i18n="nav.new" onclick="goToPage('new');closeMobileMenu()">✨ الجديد</a>
  <a data-i18n="nav.sales" onclick="goToPage('sales');closeMobileMenu()">🏷️ العروض</a>
  <a data-i18n="nav.tracking" onclick="goToPage('tracking');closeMobileMenu()">📦 تتبع الطلب</a>
  <a data-i18n="nav.login" onclick="goToPage('login');closeMobileMenu()">👤 تسجيل الدخول</a>
</div>

// ==============================
  // DATA — injected from PHP (window.PHP_PRODUCTS)
  // Falls back to IMAGES.products if PHP data unavailable
  // ==============================
  const products = (typeof window.PHP_PRODUCTS !== 'undefined' && window.PHP_PRODUCTS.length)
    ? window.PHP_PRODUCTS
    : (typeof IMAGES !== 'undefined' ? IMAGES.products : []);

  // Apply images.js to static HTML elements
  document.addEventListener('DOMContentLoaded', () => {
    // Hero background
    const heroBg = document.getElementById('heroBg');
    if (heroBg) heroBg.style.backgroundImage = `url('${IMAGES.hero}')`;

    // Category images
    const catImgs = document.querySelectorAll('.category-card img');
    const catKeys = Object.values(IMAGES.categories);
    catImgs.forEach((img, i) => { if (catKeys[i]) img.src = catKeys[i]; });

    // Instagram grid
    const instaImgs = document.querySelectorAll('.insta-item img');
    instaImgs.forEach((img, i) => { if (IMAGES.instagram[i]) img.src = IMAGES.instagram[i]; });

    // Testimonial avatars
    const avatarMap = Object.values(IMAGES.avatars);
    document.querySelectorAll('.author-avatar').forEach((img, i) => { if (avatarMap[i]) img.src = avatarMap[i]; });

    // Promo banner
    const promoBg = document.querySelector('.promo-bg');
    if (promoBg) promoBg.style.backgroundImage = `url('${IMAGES.promoBanner}')`;

    // Auth page images
    const authImgs = document.querySelectorAll('.auth-visual img');
    if (authImgs[0]) authImgs[0].src = IMAGES.authLogin;
    if (authImgs[1]) authImgs[1].src = IMAGES.authRegister;
  });

  let cart = [];
  let wishlist = new Set();
  let lang = 'ar';
  let lightboxProductId = null;

  // ==============================
  // RENDER PRODUCTS
  // ==============================
  // renderProducts(filteredList, gridId) -> renders into given grid id (default 'productsGrid')
  function renderProducts(filtered, gridId) {
    const list = filtered || products;
    const gid = gridId || 'productsGrid';
    const grid = document.getElementById(gid);
    if (!grid) return;
    if (list.length === 0) {
      grid.innerHTML = `<div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--text-muted);">لا توجد منتجات في هذه الفئة حالياً</div>`;
      return;
    }
    const delays = ['stagger-1','stagger-2','stagger-3','stagger-4','stagger-5','stagger-6','stagger-1','stagger-2'];
    grid.innerHTML = list.map((p, i) => {
      const stars = '★'.repeat(p.stars) + '☆'.repeat(5 - p.stars);
      const badgeHtml = p.badge
        ? `<span class="product-badge badge-${p.badge}">${p.badge === 'new' ? 'جديد' : 'تخفيض'}</span>`
        : '';
      const oldPriceHtml = p.oldPrice
        ? `<span class="price-old">${p.oldPrice.toLocaleString()} د.ج</span>
           <span class="price-badge">-${Math.round((1 - p.price/p.oldPrice)*100)}٪</span>`
        : '';
      return `
        <div class="product-card fade-in ${delays[i % delays.length]}" onclick="openLightbox(${p.id})">
          <div class="product-image-wrap">
            <img src="${p.img}" alt="${p.name}" loading="lazy">
            ${badgeHtml}
            <button class="wishlist-btn ${wishlist.has(p.id) ? 'active' : ''}" id="wish-${p.id}"
              onclick="event.stopPropagation();toggleWishlist(${p.id})">♡</button>
            <button class="product-quick-add" onclick="event.stopPropagation();addToCart(${p.id})">أضيفي للسلة</button>
          </div>
          <div class="product-info">
            <div class="product-name">${p.name}</div>
            <div class="product-stars">${stars}</div>
            <div class="product-price">
              <span class="price-current">${p.price.toLocaleString()} د.ج</span>
              ${oldPriceHtml}
            </div>
          </div>
        </div>`;
    }).join('');
    observeFadeIns();
  }

  // ==============================
  // FILTER PRODUCTS
  // ==============================
  function filterProducts(category, btn) {
    document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
    if (btn) btn.classList.add('active');
    const filtered = category === 'all' ? products : products.filter(p => p.category === category);
    renderProducts(filtered);
  }

  // ==============================
  // LIGHTBOX
  // ==============================
  function openLightbox(id) {
    const p = products.find(x => x.id === id);
    if (!p) return;
    lightboxProductId = id;
    document.getElementById('lightboxImg').src = p.img;
    document.getElementById('lightboxName').textContent = p.name;
    document.getElementById('lightboxStars').textContent = '★'.repeat(p.stars) + '☆'.repeat(5 - p.stars);
    document.getElementById('lightboxPrice').textContent = p.price.toLocaleString() + ' د.ج';
    const oldEl = document.getElementById('lightboxOldPrice');
    oldEl.textContent = p.oldPrice ? p.oldPrice.toLocaleString() + ' د.ج' : '';
    const cats = { dresses: 'فساتين', abayas: 'عبايات', blouses: 'ملابس كلاسيكية', accessories: 'إكسسوارات' };
    document.getElementById('lightboxCategory').textContent = cats[p.category] || 'منتجات';
    // Size selection
    document.querySelectorAll('.size-btn').forEach(btn => {
      btn.classList.remove('selected');
      btn.onclick = () => {
        document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');
      };
    });
    document.querySelector('.size-btn').classList.add('selected');
    document.getElementById('productLightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox(e) {
    if (e.target === document.getElementById('productLightbox')) {
      document.getElementById('productLightbox').classList.remove('open');
      document.body.style.overflow = '';
    }
  }

  function addFromLightbox() {
    if (lightboxProductId) {
      addToCart(lightboxProductId);
      document.getElementById('productLightbox').classList.remove('open');
      document.body.style.overflow = '';
    }
  }

  // ==============================
  // CART
  // ==============================
  function addToCart(id) {
    const product = products.find(p => p.id === id);
    const existing = cart.find(i => i.id === id);
    if (existing) existing.qty++;
    else cart.push({ ...product, qty: 1 });
    updateCartUI();
    showToast(`تمت إضافة "${product.name}" إلى السلة 🛒`);
  }

  function updateCartUI() {
    const badge = document.getElementById('cartBadge');
    const total = cart.reduce((s, i) => s + i.price * i.qty, 0);
    badge.textContent = cart.reduce((s, i) => s + i.qty, 0);
    document.getElementById('cartTotal').textContent = total.toLocaleString() + ' د.ج';
    const container = document.getElementById('cartItems');
    if (cart.length === 0) {
      container.innerHTML = `<div class="cart-empty"><span class="cart-empty-icon">🛍️</span><p>سلة التسوق فارغة</p><p style="font-size:0.78rem;margin-top:6px;color:var(--text-muted)">أضيفي قطعاً رائعة لمجموعتك</p></div>`;
    } else {
      container.innerHTML = cart.map(item => `
        <div class="cart-item">
          <img class="cart-item-img" src="${item.img}" alt="${item.name}">
          <div class="cart-item-details">
            <div class="cart-item-name">${item.name}</div>
            <div class="cart-item-price">${(item.price * item.qty).toLocaleString()} د.ج</div>
            <div style="font-size:0.75rem;color:var(--text-muted);">الكمية: ${item.qty}</div>
            <button class="cart-item-remove" onclick="removeFromCart(${item.id})">× إزالة</button>
          </div>
        </div>`).join('');
    }
  }

  function removeFromCart(id) {
    cart = cart.filter(i => i.id !== id);
    updateCartUI();
    showToast('تم الحذف من السلة');
  }

  function toggleCart() {
    document.getElementById('cartSidebar').classList.toggle('open');
    document.getElementById('cartOverlay').classList.toggle('open');
  }

  // ==============================
  // WISHLIST
  // ==============================
  function toggleWishlist(id) {
    if (wishlist.has(id)) {
      wishlist.delete(id);
      showToast('تم الحذف من المفضلة');
    } else {
      wishlist.add(id);
      showToast('تمت الإضافة إلى المفضلة ❤️');
    }
    const btn = document.getElementById('wish-' + id);
    if (btn) btn.classList.toggle('active', wishlist.has(id));
  }

  // ==============================
  // TOAST
  // ==============================
  function showToast(msg) {
    const c = document.getElementById('toastContainer');
    const t = document.createElement('div');
    t.className = 'toast';
    t.textContent = msg;
    c.appendChild(t);
    setTimeout(() => t.remove(), 3000);
  }

  // ==============================
  // PAGE NAVIGATION
  // ==============================
  function goToPage(name) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    document.getElementById('page-' + name).classList.add('active');
    window.scrollTo(0, 0);
    if (name === 'tracking') setTimeout(animateTracking, 300);
    // Render special pages
    if (name === 'new') {
      const newItems = products.filter(p => p.badge === 'new');
      renderProducts(newItems, 'productsGridNew');
    }
    if (name === 'sales') {
      const saleItems = products.filter(p => p.badge === 'sale' || p.oldPrice);
      renderProducts(saleItems, 'productsGridSales');
    }
  }

  // ==============================
  // MOBILE MENU
  // ==============================
  function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const ham = document.getElementById('hamburger');
    menu.classList.toggle('open');
    ham.classList.toggle('open');
  }
  function closeMobileMenu() {
    document.getElementById('mobileMenu').classList.remove('open');
    document.getElementById('hamburger').classList.remove('open');
  }

  // ==============================
  // CHECKOUT
  // ==============================
  function confirmOrder() {
    const name = document.getElementById('co-name').value.trim();
    const phone = document.getElementById('co-phone').value.trim();
    const wilaya = document.getElementById('co-wilaya').value;
    const addr = document.getElementById('co-address').value.trim();
    if (!name || !phone || !wilaya || !addr) {
      showToast('⚠️ يرجى ملء جميع الحقول المطلوبة');
      return;
    }
    const orderId = '#BK-2026-' + Math.floor(1000 + Math.random() * 9000);
    document.getElementById('successOrderId').textContent = 'رقم الطلب: ' + orderId;
    document.getElementById('successOverlay').classList.add('show');
  }

  function closeSuccess() {
    document.getElementById('successOverlay').classList.remove('show');
    goToPage('home');
    cart = [];
    updateCartUI();
  }

  // ==============================
  // TRACKING
  // ==============================
  function trackOrder() {
    const val = document.getElementById('trackInput').value.trim();
    if (!val) { showToast('أدخلي رقم الطلب أولاً'); return; }
    const result = document.getElementById('trackingResult');
    result.classList.remove('show');
    document.getElementById('trackOrderId').textContent = 'الطلب #' + val;
    setTimeout(() => { result.classList.add('show'); animateTracking(); }, 400);
  }

  function animateTracking() {
    const fill = document.getElementById('progressFill');
    if (fill) { fill.style.width = '0'; setTimeout(() => { fill.style.width = '66%'; }, 300); }
  }

  // ==============================
  // LANGUAGE TOGGLE
  // ==============================
  // Minimal i18n dictionary keyed by data-i18n keys.
  const I18N = {
    ar: {
      'nav.home': 'الرئيسية',
      'nav.collections': 'المجموعات',
      'nav.new': 'الجديد',
      'nav.sales': 'العروض',
      'nav.tracking': 'تتبع الطلب',
      'nav.login': 'تسجيل الدخول',
      'btn.shop': 'تسوقي الآن',
      'btn.discover': 'اكتشفي المجموعة',
      'btn.shopNowPromo': 'تسوقي الآن',
      'products.eyebrow': 'New Arrivals',
      'products.title': 'الوصول الجديد',
      'filter.all': 'الكل',
      'filter.dresses': 'فساتين',
      'filter.abayas': 'عبايات',
      'filter.blouses': 'ملابس كلاسيكية',
      'filter.bags': 'حقائب',
      'filter.accessories': 'إكسسوارات',
      'promo.tag': 'عرض محدود المدة',
      'promo.title': 'تخفيض <span>٤٠٪</span> على الفساتين',
      'insta.eyebrow': '@boutique.kenza',
      'insta.title': 'تابعينا على إنستغرام',
      'footer.shop': 'المتجر',
      'footer.help': 'المساعدة',
      'footer.news': 'النشرة البريدية',
      'footer.emailPlaceholder': 'بريدك الإلكتروني',
      'footer.subscribe': 'اشتركي',
      'checkout.en': 'Confirmer la commande',
      'checkout.ar': 'تأكيد الطلب',
      'checkout.confirm': 'تأكيد الطلب ✓',
      'tracking.en': 'Track your order',
      'tracking.ar': 'تتبع طلبك',
      'auth.welcome': 'مرحباً بعودتك ✨',
      'auth.loginTitle': 'تسجيل الدخول',
      'auth.loginBtn': 'دخول ←',
      'auth.registerBtn': 'إنشاء الحساب ←'
    },
    fr: {
      'nav.home': 'Accueil',
      'nav.collections': 'Collections',
      'nav.new': 'Nouveautés',
      'nav.sales': 'Promos',
      'nav.tracking': 'Suivi',
      'nav.login': 'Connexion',
      'btn.shop': 'Shop now',
      'btn.discover': 'Découvrir',
      'btn.shopNowPromo': 'Shop now',
      'products.eyebrow': 'Nouveautés',
      'products.title': 'Nouveautés',
      'filter.all': 'Tous',
      'filter.dresses': 'Robe',
      'filter.abayas': 'Abayas',
      'filter.blouses': 'Classiques',
      'filter.bags': 'Sacs',
      'filter.accessories': 'Accessoires',
      'promo.tag': 'Offre limitée',
      'promo.title': '-40% sur les robes',
      'insta.eyebrow': '@boutique.kenza',
      'insta.title': 'Suivez-nous sur Instagram',
      'footer.shop': 'Boutique',
      'footer.help': 'Aide',
      'footer.news': "Newsletter",
      'footer.emailPlaceholder': 'Votre email',
      'footer.subscribe': "S'abonner",
      'checkout.en': 'Confirmer la commande',
      'checkout.ar': 'Confirmer la commande',
      'checkout.confirm': 'Confirmer ✓',
      'tracking.en': 'Track your order',
      'tracking.ar': 'Suivi de commande',
      'auth.welcome': 'Bienvenue ✨',
      'auth.loginTitle': 'Connexion',
      'auth.loginBtn': 'Se connecter ←',
      'auth.registerBtn': "Créer le compte ←"
    }
  };

  function applyI18n(targetLang) {
    // set document language and direction
    document.documentElement.lang = targetLang === 'fr' ? 'fr' : 'ar';
    document.documentElement.dir = targetLang === 'fr' ? 'ltr' : 'rtl';
    // apply mapped texts
    document.querySelectorAll('[data-i18n]').forEach(el => {
      const key = el.getAttribute('data-i18n');
      if (I18N[targetLang] && I18N[targetLang][key]) el.textContent = I18N[targetLang][key];
    });
    // for HTML content keys
    document.querySelectorAll('[data-i18n-html]').forEach(el => {
      const key = el.getAttribute('data-i18n-html');
      if (I18N[targetLang] && I18N[targetLang][key]) el.innerHTML = I18N[targetLang][key];
    });
    // placeholders
    document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
      const key = el.getAttribute('data-i18n-placeholder');
      if (I18N[targetLang] && I18N[targetLang][key]) el.setAttribute('placeholder', I18N[targetLang][key]);
    });
    // update specific hero subtitle (kept previously by id)
    if (targetLang === 'fr') {
      document.getElementById('heroSubtitle').innerHTML = 'Découvrez la collection Boutique Kenza,<br>une mode moderne et élégante conçue pour la femme algérienne.';
      document.getElementById('langBtn').textContent = 'AR';
    } else {
      document.getElementById('heroSubtitle').innerHTML = 'اكتشفي تشكيلة بوتيك كنزة من الأزياء العصرية المتواضعة،<br>المصممة بأسلوب راقٍ يناسب المرأة الجزائرية الواثقة بنفسها.';
      document.getElementById('langBtn').textContent = 'FR';
    }
  }

  function toggleLang() {
    lang = lang === 'ar' ? 'fr' : 'ar';
    applyI18n(lang);
    showToast(lang === 'fr' ? 'Langue changée en Français' : 'تم التغيير إلى العربية');
  }
  // initialize labels according to default lang
  document.addEventListener('DOMContentLoaded', () => applyI18n(lang));

  // ==============================
  // DARK MODE
  // ==============================
  function toggleDark() {
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    document.documentElement.setAttribute('data-theme', isDark ? '' : 'dark');
    showToast(isDark ? '☀️ الوضع النهاري' : '🌙 الوضع الليلي');
  }

  // ==============================
  // COUNTDOWN
  // ==============================
  (function startCountdown() {
    let t = 2 * 86400 + 14 * 3600 + 38 * 60;
    function tick() {
      const d = Math.floor(t / 86400), h = Math.floor((t % 86400) / 3600);
      const m = Math.floor((t % 3600) / 60), s = t % 60;
      const fmt = n => String(n).padStart(2, '0');
      ['cdDays','cdHours','cdMins','cdSecs'].forEach((id, i) => {
        const el = document.getElementById(id);
        if (el) el.textContent = fmt([d,h,m,s][i]);
      });
      if (t > 0) t--;
    }
    tick(); setInterval(tick, 1000);
  })();

  // ==============================
  // SCROLL ANIMATIONS
  // ==============================
  function observeFadeIns() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } });
    }, { threshold: 0.1 });
    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
  }

  // ==============================
  // NAV SCROLL + BACK TO TOP
  // ==============================
  window.addEventListener('scroll', () => {
    const nav = document.getElementById('mainNav');
    const btt = document.getElementById('backToTop');
    if (window.scrollY > 60) {
      nav.style.boxShadow = '0 4px 20px rgba(44,36,32,0.1)';
    } else {
      nav.style.boxShadow = 'none';
    }
    if (btt) btt.classList.toggle('visible', window.scrollY > 400);
  });

  // ==============================
  // INIT
  // ==============================
  renderProducts();
  observeFadeIns();
  updateCartUI();

  // Demo cart items
  setTimeout(() => {
    cart.push({ ...products[0], qty: 1 });
    cart.push({ ...products[1], qty: 1 });
    updateCartUI();
  }, 800);
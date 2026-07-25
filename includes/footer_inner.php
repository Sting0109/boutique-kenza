<?php
// includes/footer_inner.php — Shared footer HTML used inside page divs
?>
<footer>
  <div class="footer-grid">
    <div class="footer-col">
      <div class="footer-brand-name">Boutique <span>Kenza</span></div>
      <p class="footer-desc">بوتيك كنزة — وجهتك الأولى للأزياء النسائية الراقية في الجزائر. أناقة حقيقية بأسعار تناسبك.</p>
      <div class="footer-socials">
        <a class="social-btn" href="#" aria-label="Facebook">f</a>
        <a class="social-btn" href="#" aria-label="Instagram">📷</a>
        <a class="social-btn" href="#" aria-label="TikTok">♪</a>
        <a class="social-btn" href="tel:<?= CONTACT_PHONE ?>" aria-label="Phone">📞</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>تسوقي</h4>
      <ul>
        <li><a onclick="goToPage('new')">الجديد</a></li>
        <li><a onclick="goToPage('collections')">المجموعات</a></li>
        <li><a onclick="goToPage('sales')">العروض</a></li>
        <li><a onclick="goToPage('home')">الرئيسية</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>مساعدة</h4>
      <ul>
        <li><a onclick="goToPage('tracking')">تتبع الطلب</a></li>
        <li><a href="#">سياسة الإرجاع</a></li>
        <li><a href="#">أسئلة شائعة</a></li>
        <li><a href="tel:<?= CONTACT_PHONE ?>">اتصلي بنا</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>النشرة البريدية</h4>
      <p class="footer-desc" style="margin-bottom:16px;">اشتركي للحصول على آخر العروض والمجموعات.</p>
      <div class="footer-newsletter">
        <input type="email" placeholder="بريدك الإلكتروني">
        <button onclick="showToast('تم الاشتراك بنجاح! 🎉')">اشتركي</button>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© <?= SITE_YEAR ?> <?= SITE_NAME ?> · صُنع بـ❤️ في الجزائر</span>
    <span>الدفع عند الاستلام · توصيل لجميع الولايات</span>
  </div>
</footer>

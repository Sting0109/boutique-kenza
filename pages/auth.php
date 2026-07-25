<?php // pages/auth.php — Login + Register ?>

<!-- =================== LOGIN PAGE =================== -->
<div class="page" id="page-login">
  <div class="auth-page">
    <div class="auth-visual">
      <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=900&q=80" alt="Fashion">
      <div class="auth-visual-overlay"></div>
      <div class="auth-visual-text">
        <h3>أناقتك، هويتك</h3>
        <p>BOUTIQUE KENZA · EST. 2020</p>
      </div>
    </div>
    <div class="auth-form-wrap">
      <div class="auth-form">
        <div class="auth-logo">Boutique <span>Kenza</span></div>
        <p class="auth-subtitle">مرحباً بعودتك ✨</p>
        <h2 class="auth-title">تسجيل الدخول</h2>

        <div class="form-group">
          <label class="form-label">البريد الإلكتروني أو الهاتف</label>
          <input type="text" class="form-input" placeholder="example@email.com أو 07xxxxxxxx">
        </div>

        <div class="form-group">
          <label class="form-label">كلمة المرور</label>
          <input type="password" class="form-input" placeholder="••••••••">
        </div>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;font-size:0.82rem;">
          <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
            <input type="checkbox" style="accent-color:var(--gold);">
            <span style="color:var(--text-muted);">تذكريني</span>
          </label>
          <a class="auth-link" href="#">نسيتِ كلمة المرور؟</a>
        </div>

        <button class="submit-btn"
          onclick="showToast('مرحباً بك في بوتيك كنزة! 👑')">
          دخول ←
        </button>

        <div class="auth-divider">أو</div>

        <p style="text-align:center;font-size:0.85rem;color:var(--text-muted);">
          ليس لديكِ حساب؟
          <a class="auth-link" onclick="goToPage('register')">إنشاء حساب جديد</a>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- =================== REGISTER PAGE =================== -->
<div class="page" id="page-register">
  <div class="auth-page">
    <div class="auth-visual">
      <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=900&q=80" alt="Fashion">
      <div class="auth-visual-overlay"></div>
      <div class="auth-visual-text">
        <h3>انضمي إلى عائلة كنزة</h3>
        <p>+15,000 زبونة راضية في الجزائر</p>
      </div>
    </div>
    <div class="auth-form-wrap">
      <div class="auth-form">
        <div class="auth-logo">Boutique <span>Kenza</span></div>
        <p class="auth-subtitle">انضمي إلى عائلة بوتيك كنزة ✨</p>
        <h2 class="auth-title">إنشاء حساب</h2>

        <div class="form-group">
          <label class="form-label">الاسم الكامل</label>
          <input type="text" class="form-input" placeholder="اسمك الكامل">
        </div>

        <div class="form-group">
          <label class="form-label">رقم الهاتف</label>
          <input type="tel" class="form-input" placeholder="07xxxxxxxx أو 05xxxxxxxx">
        </div>

        <div class="form-group">
          <label class="form-label">كلمة المرور</label>
          <input type="password" class="form-input" placeholder="8 أحرف على الأقل">
        </div>

        <div class="form-group">
          <label class="form-label">تأكيد كلمة المرور</label>
          <input type="password" class="form-input" placeholder="أعيدي إدخال كلمة المرور">
        </div>

        <label style="display:flex;align-items:flex-start;gap:8px;cursor:pointer;margin-bottom:24px;font-size:0.82rem;color:var(--text-muted);">
          <input type="checkbox" style="accent-color:var(--gold);margin-top:3px;">
          <span>أوافق على <a class="auth-link" href="#">شروط الاستخدام</a> وسياسة الخصوصية</span>
        </label>

        <button class="submit-btn"
          onclick="showToast('تم إنشاء حسابك بنجاح! 🎉'); goToPage('home');">
          إنشاء الحساب ←
        </button>

        <div class="auth-divider">أو</div>

        <p style="text-align:center;font-size:0.85rem;color:var(--text-muted);">
          لديكِ حساب؟
          <a class="auth-link" onclick="goToPage('login')">تسجيل الدخول</a>
        </p>
      </div>
    </div>
  </div>
</div>

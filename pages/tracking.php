<?php // pages/tracking.php ?>

<!-- =================== TRACKING PAGE =================== -->
<div class="page" id="page-tracking">
  <div class="tracking-page">
    <div class="checkout-header">
      <span class="page-title-en">Track your order</span>
      <h1 class="page-title-ar">تتبع طلبك</h1>
    </div>

    <div class="tracking-search-section">
      <p style="color:rgba(254,252,248,0.65);font-size:0.9rem;letter-spacing:1px;">
        أدخلي رقم طلبك لمعرفة حالة شحنتك
      </p>
      <div class="tracking-input-wrap">
        <button class="tracking-btn" onclick="trackOrder()">تتبع</button>
        <input type="text" class="tracking-input" id="trackInput"
          placeholder="مثال: BK-<?= SITE_YEAR ?>-7843" value="BK-<?= SITE_YEAR ?>-7843">
      </div>
    </div>

    <div class="tracking-result" id="trackingResult">
      <div class="tracking-card">
        <div class="tracking-order-id" id="trackOrderId">الطلب #BK-<?= SITE_YEAR ?>-7843</div>
        <div class="tracking-order-meta">تاريخ الطلب: ٢٨ أبريل <?= SITE_YEAR ?> · سارة بن علي · قسنطينة</div>

        <div class="tracking-progress">
          <div class="progress-bar-bg"></div>
          <div class="progress-bar-fill" id="progressFill"></div>
          <div class="tracking-steps">
            <div class="tracking-step done" id="step1">
              <div class="step-circle">⏳</div>
              <div class="step-label">قيد المعالجة</div>
              <div class="step-time">٢٨ أبر</div>
            </div>
            <div class="tracking-step done" id="step2">
              <div class="step-circle">📦</div>
              <div class="step-label">تم التأكيد</div>
              <div class="step-time">٢٨ أبر</div>
            </div>
            <div class="tracking-step active" id="step3">
              <div class="step-circle">🚚</div>
              <div class="step-label">في التوصيل</div>
              <div class="step-time">قيد التوصيل</div>
            </div>
            <div class="tracking-step" id="step4">
              <div class="step-circle">✅</div>
              <div class="step-label">تم التسليم</div>
              <div class="step-time">متوقع ٢ ماي</div>
            </div>
          </div>
        </div>

        <div style="padding:20px;background:var(--nude);border-right:3px solid var(--gold);">
          <p style="font-size:0.85rem;color:var(--text-main);font-weight:600;">🚚 الشحنة في الطريق إليك!</p>
          <p style="font-size:0.8rem;color:var(--text-muted);margin-top:6px;">
            شركة التوصيل: Yalidine Express · رقم التتبع: YLX-88421-DZ
          </p>
        </div>

        <!-- Timeline -->
        <div style="margin-top:28px;">
          <h4 style="font-size:0.82rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--text-muted);margin-bottom:18px;">
            سجل الأحداث
          </h4>
          <div style="display:flex;flex-direction:column;gap:0;">
            <?php
            $events = [
                ['label' => 'الطرد في مستودع التوزيع – قسنطينة', 'time' => '٣٠ أبريل · ٠٨:٤٢', 'color' => 'var(--gold)'],
                ['label' => 'غادر مستودع الجزائر الرئيسي',       'time' => '٢٩ أبريل · ١٤:١٠', 'color' => 'var(--gold-light)'],
                ['label' => 'تم تأكيد الطلب ومعالجته',            'time' => '٢٨ أبريل · ١١:٢٢', 'color' => 'var(--beige)'],
            ];
            foreach ($events as $ev): ?>
              <div style="display:flex;gap:16px;padding:12px 0;border-bottom:1px solid var(--nude);">
                <div style="width:8px;height:8px;border-radius:50%;background:<?= $ev['color'] ?>;margin-top:5px;flex-shrink:0;"></div>
                <div>
                  <div style="font-size:0.85rem;font-weight:600;color:var(--charcoal);"><?= $ev['label'] ?></div>
                  <div style="font-size:0.75rem;color:var(--text-muted);"><?= $ev['time'] ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <div style="text-align:center;padding:40px;color:var(--text-muted);font-size:0.85rem;">
      <p>هل تحتاجين مساعدة؟
        <a style="color:var(--gold);font-weight:600;" href="tel:<?= CONTACT_PHONE ?>">اتصلي بنا</a>
        أو
        <a style="color:var(--gold);font-weight:600;" href="#">راسلينا</a>
      </p>
    </div>

    <footer style="background:var(--warm-black);padding:24px 60px;text-align:center;color:rgba(254,252,248,0.4);font-size:0.78rem;">
      © <?= SITE_YEAR ?> <?= SITE_NAME ?> · صُنع بـ❤️ في الجزائر
    </footer>
  </div>
</div>
<!-- end tracking page -->

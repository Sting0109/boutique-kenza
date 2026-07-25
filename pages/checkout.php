<?php // pages/checkout.php ?>

<!-- =================== CHECKOUT PAGE =================== -->
<div class="page" id="page-checkout">
  <div class="checkout-page">
    <div class="checkout-header">
      <span class="page-title-en">Checkout</span>
      <h1 class="page-title-ar">إتمام الطلب</h1>
    </div>

    <div class="checkout-body">
      <!-- LEFT: Form -->
      <div>
        <div class="form-card">
          <h3 class="form-section-title">معلومات التوصيل</h3>

          <div class="form-group">
            <label class="form-label">الاسم الكامل</label>
            <input type="text" class="form-input" id="checkoutName" placeholder="اسمك الكامل">
          </div>

          <div class="form-group">
            <label class="form-label">رقم الهاتف</label>
            <input type="tel" class="form-input" id="checkoutPhone" placeholder="07xxxxxxxx أو 05xxxxxxxx">
          </div>

          <div class="form-group">
            <label class="form-label">الولاية</label>
            <select class="form-input" id="checkoutWilaya">
              <option value="">اختاري الولاية</option>
              <?php foreach ($wilayas as $w): ?>
                <option value="<?= htmlspecialchars($w) ?>"><?= htmlspecialchars($w) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label">العنوان التفصيلي</label>
            <input type="text" class="form-input" id="checkoutAddress" placeholder="الشارع، الحي، رقم البناية...">
          </div>

          <div class="form-group">
            <label class="form-label">ملاحظات (اختياري)</label>
            <input type="text" class="form-input" id="checkoutNotes" placeholder="أي تعليمات خاصة للتوصيل...">
          </div>
        </div>

        <div class="form-card" style="margin-top: 24px;">
          <h3 class="form-section-title">طريقة الدفع</h3>
          <label style="display:flex;align-items:center;gap:12px;padding:16px;background:var(--nude);border-radius:2px;cursor:pointer;">
            <input type="radio" name="payment" value="cod" checked style="accent-color:var(--gold);">
            <div>
              <div style="font-weight:700;color:var(--charcoal);">💵 الدفع عند الاستلام</div>
              <div style="font-size:0.8rem;color:var(--text-muted);margin-top:2px;">ادفعي عند وصول طلبك</div>
            </div>
          </label>
        </div>
      </div>

      <!-- RIGHT: Order Summary -->
      <div class="order-summary-card">
        <div class="summary-title">ملخص الطلب</div>
        <div id="summaryItems">
          <!-- Populated by JS -->
        </div>
        <div class="summary-totals">
          <div class="summary-row">
            <span>المجموع الجزئي</span>
            <span id="summarySubtotal">0 د.ج</span>
          </div>
          <div class="summary-row">
            <span>رسوم التوصيل</span>
            <span style="color:#4CAF50;">مجاني</span>
          </div>
          <div class="summary-row total">
            <span>الإجمالي</span>
            <span id="summaryTotal">0 د.ج</span>
          </div>
        </div>
        <button class="submit-btn" onclick="submitOrder()">تأكيد الطلب ✓</button>
      </div>
    </div>
  </div>
</div>
<!-- end checkout page -->

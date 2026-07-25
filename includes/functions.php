<?php
// ============================================================
// Boutique Kenza — Helper Functions
// ============================================================

/**
 * Render a product card (HTML)
 */
function renderProductCard(array $p, int $index = 0): string {
    $delays = ['stagger-1','stagger-2','stagger-3','stagger-4','stagger-5','stagger-6'];
    $delay  = $delays[$index % count($delays)];

    $stars      = str_repeat('★', $p['stars']) . str_repeat('☆', 5 - $p['stars']);
    $badgeHtml  = '';
    if (!empty($p['badge'])) {
        $label     = $p['badge'] === 'new' ? 'جديد' : 'تخفيض';
        $badgeHtml = '<span class="product-badge badge-' . $p['badge'] . '">' . $label . '</span>';
    }

    $oldPriceHtml = '';
    if (!empty($p['oldPrice'])) {
        $pct          = round((1 - $p['price'] / $p['oldPrice']) * 100);
        $oldPriceHtml = '<span class="price-old">' . number_format($p['oldPrice']) . ' د.ج</span>'
                      . '<span class="price-badge">-' . $pct . '٪</span>';
    }

    $id = (int)$p['id'];
    return <<<HTML
    <div class="product-card fade-in {$delay}" onclick="openLightbox({$id})">
      <div class="product-image-wrap">
        <img src="{$p['img']}" alt="{$p['name']}" loading="lazy">
        {$badgeHtml}
        <button class="wishlist-btn" id="wish-{$id}"
          onclick="event.stopPropagation();toggleWishlist({$id})">♡</button>
        <button class="product-quick-add" onclick="event.stopPropagation();addToCart({$id})">أضيفي للسلة</button>
      </div>
      <div class="product-info">
        <div class="product-name">{$p['name']}</div>
        <div class="product-stars">{$stars}</div>
        <div class="product-price">
          <span class="price-current">{$p['price']} د.ج</span>
          {$oldPriceHtml}
        </div>
      </div>
    </div>
    HTML;
}

/**
 * Render a category card
 */
function renderCategoryCard(array $cat, int $index = 0): string {
    $delays = ['stagger-1','stagger-2','stagger-3','stagger-4'];
    $delay  = $delays[$index % count($delays)];
    return <<<HTML
    <div class="category-card fade-in {$delay}" onclick="filterProducts('{$cat['key']}', null); document.getElementById('productsGrid').scrollIntoView({behavior:'smooth'})">
      <img src="{$cat['img']}" alt="{$cat['label']}" loading="lazy">
      <div class="category-overlay"></div>
      <div class="category-info">
        <span class="category-name">{$cat['label']}</span>
      </div>
      <div class="category-arrow">→</div>
    </div>
    HTML;
}

/**
 * Render a testimonial card
 */
function renderTestimonialCard(array $t): string {
    $stars = str_repeat('★', $t['stars']);
    return <<<HTML
    <div class="testimonial-card">
      <div class="testimonial-stars">{$stars}</div>
      <p class="testimonial-text">{$t['text']}</p>
      <div class="testimonial-author">
        <img class="author-avatar" src="{$t['avatar']}" alt="{$t['name']}">
        <div>
          <div class="author-name">{$t['name']}</div>
          <div class="author-location">{$t['location']}</div>
        </div>
      </div>
    </div>
    HTML;
}

/**
 * Export products as JSON for JS consumption
 */
function productsToJson(array $products): string {
    $items = array_map(function($p) {
        return [
            'id'       => (int)$p['id'],
            'name'     => $p['name'],
            'category' => $p['category'],
            'price'    => (int)$p['price'],
            'oldPrice' => isset($p['oldPrice']) ? (int)$p['oldPrice'] : null,
            'stars'    => (int)$p['stars'],
            'badge'    => $p['badge'] ?? null,
            'img'      => $p['img'],
        ];
    }, $products);
    return json_encode($items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

/**
 * Generate a random order ID
 */
function generateOrderId(): string {
    return 'BK-' . date('Y') . '-' . rand(1000, 9999);
}

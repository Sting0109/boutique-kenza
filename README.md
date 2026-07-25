# Boutique Kenza — PHP Project

A luxury fashion e-commerce site for an Algerian boutique, built as a PHP SPA (Single Page Application).

---

## Project Structure

```
boutique-kenza/
├── index.php                  ← Main entry point (assembles all pages)
├── .htaccess                  ← Apache rewrite + caching rules
│
├── includes/
│   ├── data.php               ← Products, categories, testimonials, wilayas
│   ├── functions.php          ← PHP helper functions (render cards, JSON export)
│   ├── header.php             ← HTML <head> + opening <body> tags
│   ├── nav.php                ← Navigation, cart sidebar, lightbox, overlays
│   ├── footer.php             ← Shared footer HTML
│   └── footer_inner.php       ← Footer used inside page <div>s
│
├── pages/
│   ├── home.php               ← Home page (hero, categories, products, testimonials)
│   ├── collections.php        ← All collections with category filters
│   ├── new_sales.php          ← New arrivals + Sales/promotions pages
│   ├── checkout.php           ← Checkout form with wilaya dropdown
│   ├── tracking.php           ← Order tracking page
│   └── auth.php               ← Login + Register pages
│
└── assets/
    ├── css/
    │   └── style.css          ← All styles
    ├── js/
    │   ├── images.js          ← Image URLs / base64 data (edit to swap photos)
    │   └── app.js             ← All JavaScript (cart, filters, lightbox, etc.)
    └── images/
        └── hero.jpg           ← Hero image (your upload)
```

---

## How to Run

### With PHP built-in server (development)
```bash
cd boutique-kenza
php -S localhost:8000
```
Then open: http://localhost:8000

### With Apache/Nginx (production)
- Copy the `boutique-kenza/` folder to your web root (e.g. `/var/www/html/`)
- Ensure `mod_rewrite` is enabled (Apache)
- Point your vhost to the project root

### Requirements
- PHP 8.0+
- Apache with mod_rewrite **or** Nginx with try_files
- No database required (data is in `includes/data.php`)

---

## Customization

### Add / Edit Products
Edit `includes/data.php` — add entries to the `$products` array:
```php
[
    'id'       => 9,
    'name'     => 'فستان جديد',
    'category' => 'dresses',   // dresses | abayas | blouses | accessories
    'price'    => 12000,
    'oldPrice' => null,         // or a number for sale price
    'stars'    => 5,
    'badge'    => 'new',        // 'new' | 'sale' | null
    'img'      => 'assets/images/my-product.jpg',
],
```

### Change Hero Image
Replace `assets/images/hero.jpg` with your photo, or update `assets/js/images.js`:
```js
hero: 'assets/images/your-new-hero.jpg',
```

### Change Contact Phone
Edit `CONTACT_PHONE` in `includes/data.php`.

---

## Features
- 🛒 Cart sidebar with add/remove/qty
- 🔍 Product lightbox (quick view)
- 🏷️ Filter by category
- 📦 Order tracking page
- 🌙 Dark mode toggle
- 🌐 Arabic/French language toggle
- 📱 Fully responsive (mobile-first)
- ⏱️ Countdown timer on promo banner
- ✅ Checkout form with all 58 Algerian wilayas

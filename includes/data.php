<?php
// ============================================================
// Boutique Kenza — Data Layer
// Edit products, categories, and site config here
// ============================================================

define('SITE_NAME', 'Boutique Kenza');
define('SITE_TAGLINE', 'بوتيك كنزة');
define('SITE_YEAR', '2026');
define('CONTACT_PHONE', '+213555000000');

// ------------------------------------------------------------
// Products
// ------------------------------------------------------------
$products = [
    [
        'id'        => 1,
        'name'      => 'فستان ربيعي أنيق',
        'category'  => 'dresses',
        'price'     => 8900,
        'oldPrice'  => 12000,
        'stars'     => 5,
        'badge'     => 'sale',
        'img'       => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
    ],
    [
        'id'        => 2,
        'name'      => 'عباءة فاخرة مطرزة',
        'category'  => 'abayas',
        'price'     => 14500,
        'oldPrice'  => null,
        'stars'     => 5,
        'badge'     => 'new',
        'img'       => 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=600&q=80',
    ],
    [
        'id'        => 3,
        'name'      => 'بلوزة كلاسيكية',
        'category'  => 'blouses',
        'price'     => 4200,
        'oldPrice'  => null,
        'stars'     => 4,
        'badge'     => null,
        'img'       => 'https://images.unsplash.com/photo-1551232864-3f0890e580d9?w=600&q=80',
    ],
    [
        'id'        => 4,
        'name'      => 'إكسسوار ذهبي راقي',
        'category'  => 'accessories',
        'price'     => 2800,
        'oldPrice'  => 3500,
        'stars'     => 4,
        'badge'     => 'sale',
        'img'       => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=600&q=80',
    ],
    [
        'id'        => 5,
        'name'      => 'فستان سهرة راقٍ',
        'category'  => 'dresses',
        'price'     => 19800,
        'oldPrice'  => null,
        'stars'     => 5,
        'badge'     => 'new',
        'img'       => 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=600&q=80',
    ],
    [
        'id'        => 6,
        'name'      => 'عباءة عصرية بسيطة',
        'category'  => 'abayas',
        'price'     => 9500,
        'oldPrice'  => null,
        'stars'     => 4,
        'badge'     => null,
        'img'       => 'https://images.unsplash.com/photo-1614251055880-ee96e4803393?w=600&q=80',
    ],
    [
        'id'        => 7,
        'name'      => 'تنورة ميدي أنيقة',
        'category'  => 'blouses',
        'price'     => 5600,
        'oldPrice'  => 7000,
        'stars'     => 4,
        'badge'     => 'sale',
        'img'       => 'https://images.unsplash.com/photo-1594938298603-c8148c4b4a8d?w=600&q=80',
    ],
    [
        'id'        => 8,
        'name'      => 'حقيبة يد فاخرة',
        'category'  => 'accessories',
        'price'     => 7200,
        'oldPrice'  => null,
        'stars'     => 5,
        'badge'     => 'new',
        'img'       => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&q=80',
    ],
];

// ------------------------------------------------------------
// Categories
// ------------------------------------------------------------
$categories = [
    [
        'key'   => 'dresses',
        'label' => 'فساتين',
        'img'   => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
    ],
    [
        'key'   => 'abayas',
        'label' => 'عبايات',
        'img'   => 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=600&q=80',
    ],
    [
        'key'   => 'blouses',
        'label' => 'ملابس كلاسيكية',
        'img'   => 'https://images.unsplash.com/photo-1551232864-3f0890e580d9?w=600&q=80',
    ],
    [
        'key'   => 'accessories',
        'label' => 'إكسسوارات',
        'img'   => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=600&q=80',
    ],
];

// ------------------------------------------------------------
// Testimonials
// ------------------------------------------------------------
$testimonials = [
    [
        'text'     => 'جودة رائعة وتوصيل سريع! اشتريت فستان سهرة لحفل زفاف وكان خياليًا. أنصح كل بنات الجزائر بالتسوق من بوتيك كنزة.',
        'name'     => 'سارة بن علي',
        'location' => 'قسنطينة',
        'stars'    => 5,
        'avatar'   => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80',
    ],
    [
        'text'     => 'أفضل بوتيك أونلاين في الجزائر! الأسعار معقولة جدًا والقطع أجمل من الصور. سأعود للطلب مجددًا بكل تأكيد.',
        'name'     => 'أميرة خالد',
        'location' => 'وهران',
        'stars'    => 5,
        'avatar'   => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&q=80',
    ],
    [
        'text'     => 'خدمة الزبائن ممتازة وردوا علي بسرعة. الطرد وصل محكم التغليف والفستان كان بالضبط ما طلبته. شكرًا كنزة!',
        'name'     => 'نور الهدى',
        'location' => 'الجزائر العاصمة',
        'stars'    => 5,
        'avatar'   => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=100&q=80',
    ],
];

// ------------------------------------------------------------
// Algerian Wilayas (for checkout form)
// ------------------------------------------------------------
$wilayas = [
    'أدرار', 'الشلف', 'الأغواط', 'أم البواقي', 'باتنة', 'بجاية', 'بسكرة', 'بشار',
    'البليدة', 'البويرة', 'تمنراست', 'تبسة', 'تلمسان', 'تيارت', 'تيزي وزو',
    'الجزائر', 'الجلفة', 'جيجل', 'سطيف', 'سعيدة', 'سكيكدة', 'سيدي بلعباس',
    'عنابة', 'قالمة', 'قسنطينة', 'المدية', 'مستغانم', 'المسيلة', 'معسكر',
    'ورقلة', 'وهران', 'البيض', 'إليزي', 'برج بوعريريج', 'بومرداس', 'الطارف',
    'تيندوف', 'تيسمسيلت', 'الوادي', 'خنشلة', 'سوق أهراس', 'تيبازة', 'ميلة',
    'عين الدفلى', 'النعامة', 'عين تموشنت', 'غرداية', 'غليزان', 'المغير', 'المنيعة',
    'أولاد جلال', 'برج باجي مختار', 'بني عباس', 'تيميمون', 'توقرت', 'جانت', 'عين صالح',
    'عين قزام',
];

<?php

const SUPPORTED_LANGS = ['tr', 'en'];
const DEFAULT_LANG = 'tr';
const LANG_COOKIE = 'aysa_lang';

function current_lang(): string
{
    static $lang = null;
    if ($lang !== null) {
        return $lang;
    }
    $candidate = $_GET['lang'] ?? $_COOKIE[LANG_COOKIE] ?? DEFAULT_LANG;
    if (!in_array($candidate, SUPPORTED_LANGS, true)) {
        $candidate = DEFAULT_LANG;
    }
    if (isset($_GET['lang']) && in_array($_GET['lang'], SUPPORTED_LANGS, true) && !headers_sent()) {
        setcookie(LANG_COOKIE, $candidate, [
            'expires' => time() + 60 * 60 * 24 * 365,
            'path' => '/',
            'samesite' => 'Lax',
        ]);
    }
    $lang = $candidate;
    return $lang;
}

function lang_url(string $targetLang): string
{
    $script = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
    $params = $_GET;
    $params['lang'] = $targetLang;
    return $script . '?' . http_build_query($params);
}

function tr(array $bundle): string
{
    $lang = current_lang();
    return $bundle[$lang] ?? $bundle[DEFAULT_LANG] ?? reset($bundle);
}

function t(string $key): string
{
    global $strings;
    if (!isset($strings[$key])) {
        return $key;
    }
    return tr($strings[$key]);
}

function current_page(): string
{
    return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
}

function project_by_slug(array $projects, string $slug): ?array
{
    foreach ($projects as $project) {
        if ($project['slug'] === $slug) {
            return $project;
        }
    }
    return null;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$site = [
    'name' => 'Aysa Works',
    'tagline' => [
        'tr' => 'Mimarlık ve İç Mekân',
        'en' => 'Architecture & Interiors',
    ],
    'email' => 'hello@aysaworks.com',
    'phone' => '+90 000 000 00 00',
    'address' => [
        'tr' => 'İstanbul, Türkiye',
        'en' => 'Istanbul, Türkiye',
    ],
    'instagram' => '#',
];

$nav = [
    'projects.php' => ['tr' => 'Projeler', 'en' => 'Projects'],
    'studio.php' => ['tr' => 'Stüdyo', 'en' => 'Studio'],
    'services.php' => ['tr' => 'Hizmetler', 'en' => 'Services'],
    'contact.php' => ['tr' => 'İletişim', 'en' => 'Contact'],
];

$lookbooks = [
    ['tr' => 'Klasik Evler', 'en' => 'Classic Homes'],
    ['tr' => 'Daire Renovasyonları', 'en' => 'Apartment Renovations'],
    ['tr' => 'İç Mekân ve Dekor', 'en' => 'Interiors & Decor'],
    ['tr' => 'İnce Detaylar', 'en' => 'Thoughtful Details'],
    ['tr' => 'Özel Mutfaklar', 'en' => 'Custom Kitchens'],
    ['tr' => 'Gömme Depolama', 'en' => 'Built-in Storage'],
    ['tr' => 'Önce / Sonra', 'en' => 'Before / After'],
    ['tr' => 'Malzeme Paletleri', 'en' => 'Material Palettes'],
];

$projects = [
    [
        'slug' => 'warm-living-room',
        'title' => ['tr' => 'Sıcak Oturma Odası', 'en' => 'Warm Living Room'],
        'location' => ['tr' => 'Konut İç Mekânı', 'en' => 'Residential Interior'],
        'category' => ['tr' => 'İç Mekân ve Dekor', 'en' => 'Interiors & Decor'],
        'category_slug' => 'interiors-decor',
        'image' => 'images/oturmaodasi.webp',
        'featured' => true,
        'summary' => [
            'tr' => 'Sıcak tonlar, rahat sirkülasyon ve sade detaylarla katmanlı bir oturma alanı.',
            'en' => 'A layered living space shaped around warm tones, comfortable circulation, and quiet detailing.',
        ],
        'details' => [
            [
                'tr' => 'Bol gün ışığına açılan yumuşak oturma planı ve sakin bir malzeme dili.',
                'en' => 'Soft seating plan with generous daylight and a calm material language.',
            ],
            [
                'tr' => 'Dengeli depolama ve sergi anları, mekânı yoğunlaştırmadan işlevsel kılar.',
                'en' => 'Balanced storage and display moments keep the room practical without feeling dense.',
            ],
        ],
    ],
    [
        'slug' => 'custom-kitchen-one',
        'title' => ['tr' => 'Özel Mutfak I', 'en' => 'Custom Kitchen I'],
        'location' => ['tr' => 'Mutfak Renovasyonu', 'en' => 'Kitchen Renovation'],
        'category' => ['tr' => 'Konut Mimarlığı', 'en' => 'Residential Architecture'],
        'category_slug' => 'residential-architecture',
        'image' => 'images/mutfak1.webp',
        'featured' => true,
        'summary' => [
            'tr' => 'Dayanıklı yüzeylere, orana ve günlük kullanıma odaklı kompakt bir mutfak çalışması.',
            'en' => 'A compact kitchen study focused on durable surfaces, proportion, and daily use.',
        ],
        'details' => [
            [
                'tr' => 'Dolap oranları sade tutuldu; malzeme ve ışık ön plana çıktı.',
                'en' => 'Cabinet proportions are kept simple so material and light become the main focus.',
            ],
            [
                'tr' => 'Proje ileride images/mutfak1.webp dosyası değiştirilerek güncellenebilir.',
                'en' => 'The project can be updated later by replacing images/mutfak1.webp.',
            ],
        ],
    ],
    [
        'slug' => 'custom-kitchen-two',
        'title' => ['tr' => 'Özel Mutfak II', 'en' => 'Custom Kitchen II'],
        'location' => ['tr' => 'Mutfak Detayı', 'en' => 'Kitchen Detail'],
        'category' => ['tr' => 'Konut Mimarlığı', 'en' => 'Residential Architecture'],
        'category_slug' => 'residential-architecture',
        'image' => 'images/mutfak2.webp',
        'featured' => false,
        'summary' => [
            'tr' => 'Daha güçlü bir mobilya ve yüzey vurgusuyla dikey bir mutfak kompozisyonu.',
            'en' => 'A vertical kitchen composition with a stronger millwork and finish emphasis.',
        ],
        'details' => [
            [
                'tr' => 'Yüksek dolaplar ve dar görsel ritim, rafine bir servis bölgesi yaratır.',
                'en' => 'Tall cabinetry and narrow visual rhythm create a refined service zone.',
            ],
            [
                'tr' => 'Bu projeyi yakın plan dolap veya ankastre entegrasyon görselleri için kullanın.',
                'en' => 'Use this project for close-up cabinetry or appliance integration images.',
            ],
        ],
    ],
    [
        'slug' => 'kitchen-material-study',
        'title' => ['tr' => 'Mutfak Malzeme Çalışması', 'en' => 'Kitchen Material Study'],
        'location' => ['tr' => 'Yüzey ve Donanım Çalışması', 'en' => 'Finish & Fixture Study'],
        'category' => ['tr' => 'İnce Detaylar', 'en' => 'Thoughtful Details'],
        'category_slug' => 'thoughtful-details',
        'image' => 'images/mutfak3.webp',
        'featured' => false,
        'summary' => [
            'tr' => 'Yüzey, donanım ve aydınlatma kararları için malzeme öncelikli bir mutfak çerçevesi.',
            'en' => 'A material-forward kitchen frame for surface, hardware, and lighting decisions.',
        ],
        'details' => [
            [
                'tr' => 'İleride malzeme notları için esnek bir vaka çalışması alanı olarak tasarlandı.',
                'en' => 'Designed as a flexible case-study slot for future material notes.',
            ],
            [
                'tr' => 'Daha güçlü bir detay fotoğrafı bulunduğunda images/mutfak3.webp dosyasını değiştirin.',
                'en' => 'Replace images/mutfak3.webp if a stronger detail photograph becomes available.',
            ],
        ],
    ],
    [
        'slug' => 'stair-and-transition',
        'title' => ['tr' => 'Merdiven ve Geçiş', 'en' => 'Stair & Transition'],
        'location' => ['tr' => 'Sirkülasyon Detayı', 'en' => 'Circulation Detail'],
        'category' => ['tr' => 'İnce Detaylar', 'en' => 'Thoughtful Details'],
        'category_slug' => 'thoughtful-details',
        'image' => 'images/merdiven1.webp',
        'featured' => true,
        'summary' => [
            'tr' => 'Merdiven, duvar düzlemleri ve gün ışığının mimari ifadeyi taşıdığı bir geçiş alanı.',
            'en' => 'A transition space where stairs, wall planes, and daylight carry the architectural expression.',
        ],
        'details' => [
            [
                'tr' => 'Sirkülasyon, atıl bir alan değil; tasarımın bir parçası olarak ele alındı.',
                'en' => 'Circulation is treated as a design moment rather than leftover space.',
            ],
            [
                'tr' => 'Bu sayfaya ileride önce/sonra süreç görselleri eklenebilir.',
                'en' => 'This page can later include before/after process images.',
            ],
        ],
    ],
    [
        'slug' => 'dressing-room',
        'title' => ['tr' => 'Giyinme Odası', 'en' => 'Dressing Room'],
        'location' => ['tr' => 'Gömme Depolama', 'en' => 'Built-in Storage'],
        'category' => ['tr' => 'Mobilya ve Objeler', 'en' => 'Furniture & Objects'],
        'category_slug' => 'furniture-objects',
        'image' => 'images/giyinmeodasi.webp',
        'featured' => false,
        'summary' => [
            'tr' => 'Entegre dolap çözümleri ve günlük düzenlemeye odaklı, depolama öncelikli bir iç mekân.',
            'en' => 'A storage-focused interior with integrated cabinetry and everyday organization.',
        ],
        'details' => [
            [
                'tr' => 'Gömme öğeler mimarinin parçası olarak tasarlandı.',
                'en' => 'Built-in elements are treated as part of the architecture.',
            ],
            [
                'tr' => 'İleride çekmece, kapak ve donanım detay çekimleri eklenebilir.',
                'en' => 'Future updates can include drawer, door, and hardware detail shots.',
            ],
        ],
    ],
    [
        'slug' => 'quiet-bedroom',
        'title' => ['tr' => 'Sakin Yatak Odası', 'en' => 'Quiet Bedroom'],
        'location' => ['tr' => 'Yatak Odası İç Mekânı', 'en' => 'Bedroom Interior'],
        'category' => ['tr' => 'İç Mekân ve Dekor', 'en' => 'Interiors & Decor'],
        'category_slug' => 'interiors-decor',
        'image' => 'images/yatakodasi.webp',
        'featured' => false,
        'summary' => [
            'tr' => 'Doku, dinlenme ve ölçülü kontrast üzerine kurulu sakin bir yatak odası kompozisyonu.',
            'en' => 'A calm bedroom composition built around texture, rest, and controlled contrast.',
        ],
        'details' => [
            [
                'tr' => 'Tekstil ve oran ön planda olsun diye palet bilinçli olarak sade tutuldu.',
                'en' => 'The palette is intentionally restrained so textiles and proportion do the work.',
            ],
            [
                'tr' => 'Bu proje alanını yatak odası styling veya tüm oda fotoğrafları için kullanın.',
                'en' => 'Use this project slot for bedroom styling or full-room photography.',
            ],
        ],
    ],
];

$services = [
    [
        'title' => ['tr' => 'Mimari Tasarım', 'en' => 'Architectural Design'],
        'text' => [
            'tr' => 'Konut ve butik ticari alanlar için renovasyon, plan geliştirme, detay tasarımı, ruhsat koordinasyonu ve uygulama süreci desteği.',
            'en' => 'Renovation, plan development, detail design, permitting coordination, and construction phase support for residential and boutique commercial spaces.',
        ],
        'link' => 'services.php#architectural-design',
    ],
    [
        'title' => ['tr' => 'Konut İç Mekânı ve Dekor', 'en' => 'Residential Interiors & Decor'],
        'text' => [
            'tr' => 'Mobilya, aydınlatma, halı, perde, dekoratif objeler, malzeme yönlendirmesi, satın alma desteği ve nihai stillendirme.',
            'en' => 'Furniture, lighting, rugs, window treatments, decorative objects, material direction, procurement guidance, and final styling.',
        ],
        'link' => 'services.php#residential-interiors',
    ],
    [
        'title' => ['tr' => 'Özel Mutfaklar ve Gömme Mobilya', 'en' => 'Custom Kitchens & Built-ins'],
        'text' => [
            'tr' => 'Dolap, depolama, mutfak planlaması, giyinme odaları, gömme oturma birimleri ve detaylı mobilya paketleri.',
            'en' => 'Cabinetry, storage, kitchen planning, dressing rooms, built-in benches, and detailed millwork packages.',
        ],
        'link' => 'services.php#custom-kitchens',
    ],
    [
        'title' => ['tr' => 'Ticari İç Mekânlar', 'en' => 'Commercial Interiors'],
        'text' => [
            'tr' => 'Perakende, ofis, ağırlama ve müşteriye dönük mekânlar için mekân planlaması ve iç mimari tasarımı.',
            'en' => 'Space planning and interior design for retail, office, hospitality, and client-facing environments.',
        ],
        'link' => 'services.php#commercial-interiors',
    ],
];

$strings = [
    // Header
    'meta.description.default' => [
        'tr' => 'Aysa Works mimarlık ve iç mekân portföyü.',
        'en' => 'Aysa Works architecture and interiors portfolio.',
    ],
    'header.brand_aria' => [
        'tr' => '%s ana sayfası',
        'en' => '%s home page',
    ],
    'header.menu_button' => [
        'tr' => 'Menü',
        'en' => 'Menu',
    ],
    'header.nav_aria' => [
        'tr' => 'Ana navigasyon',
        'en' => 'Main navigation',
    ],
    'header.lang_aria' => [
        'tr' => 'Dil seçimi',
        'en' => 'Language selection',
    ],
    'nav.projects.residential' => [
        'tr' => 'Konut Mimarlığı',
        'en' => 'Residential Architecture',
    ],
    'nav.projects.interiors' => [
        'tr' => 'İç Mekân ve Dekor',
        'en' => 'Interiors & Decor',
    ],
    'nav.projects.details' => [
        'tr' => 'İnce Detaylar',
        'en' => 'Thoughtful Details',
    ],
    'nav.projects.furniture' => [
        'tr' => 'Mobilya ve Objeler',
        'en' => 'Furniture & Objects',
    ],
    'nav.studio.approach' => [
        'tr' => 'Tasarım Yaklaşımı',
        'en' => 'Design Approach',
    ],
    'nav.studio.services' => [
        'tr' => 'Hizmetler',
        'en' => 'Services',
    ],
    'nav.studio.functionality' => [
        'tr' => 'İşlevsellik',
        'en' => 'Functionality',
    ],
    'nav.contact.general' => [
        'tr' => 'Genel İletişim',
        'en' => 'General Contact',
    ],
    'nav.contact.inquiries' => [
        'tr' => 'Proje Soruları',
        'en' => 'Project Inquiries',
    ],

    // Page titles
    'page.home.title' => [
        'tr' => 'Aysa Works | Mimarlık ve İç Mekân',
        'en' => 'Aysa Works | Architecture & Interiors',
    ],
    'page.home.description' => [
        'tr' => 'Sıcak, detaylı iç mekânlar ve renovasyon odaklı mimarlık portföyü.',
        'en' => 'Warm, detailed interiors and renovation-focused architecture portfolio.',
    ],
    'page.projects.title' => [
        'tr' => 'Projeler | Aysa Works',
        'en' => 'Projects | Aysa Works',
    ],
    'page.projects.description' => [
        'tr' => 'Aysa Works seçilmiş konut mimarlığı, iç mekân, dekor ve özel gömme mobilya projeleri.',
        'en' => 'Selected Aysa Works residential architecture, interiors, decor, and custom built-in projects.',
    ],
    'page.services.title' => [
        'tr' => 'Hizmetler | Aysa Works',
        'en' => 'Services | Aysa Works',
    ],
    'page.services.description' => [
        'tr' => 'Mimarlık, iç mekân, özel mutfaklar, gömme mobilya ve ticari iç mekân hizmetleri.',
        'en' => 'Architecture, interiors, custom kitchens, built-ins, and commercial interior services.',
    ],
    'page.studio.title' => [
        'tr' => 'Stüdyo | Aysa Works',
        'en' => 'Studio | Aysa Works',
    ],
    'page.studio.description' => [
        'tr' => 'Aysa Works tasarım yaklaşımı: işbirliği, işlevsellik ve kalıcı malzemeler.',
        'en' => 'Aysa Works design approach: collaboration, functionality, and enduring materials.',
    ],
    'page.contact.title' => [
        'tr' => 'İletişim | Aysa Works',
        'en' => 'Contact | Aysa Works',
    ],
    'page.contact.description' => [
        'tr' => 'Mimarlık ve iç mekân projeleri için Aysa Works ile iletişime geçin.',
        'en' => 'Contact Aysa Works for architecture and interiors project inquiries.',
    ],

    // Home page
    'home.hero_aria' => [
        'tr' => 'Aysa Works açılış görseli',
        'en' => 'Aysa Works opening image',
    ],
    'home.hero_alt' => [
        'tr' => 'Aysa Works tarafından tasarlanan sıcak oturma odası iç mekânı',
        'en' => 'Warm living room interior by Aysa Works',
    ],
    'home.hero_eyebrow' => [
        'tr' => 'Aysa Works Mimarlık ve İç Mekân',
        'en' => 'Aysa Works Architecture & Interiors',
    ],
    'home.hero_title' => [
        'tr' => 'Doğal malzemeler ve özenli detaylarla biçimlenen sıcak, iyi işlenmiş mekânlar.',
        'en' => 'Warm, well-crafted spaces shaped through natural materials and thoughtful details.',
    ],
    'home.hero_scroll_aria' => [
        'tr' => 'Stüdyo tanıtımına kaydır',
        'en' => 'Scroll to studio introduction',
    ],
    'home.intro_text' => [
        'tr' => 'Sade, işlevsel ve malzeme öncelikli bir yaklaşımla konut iç mekânları, renovasyon konseptleri, özel mutfaklar ve gömme depolama sistemleri tasarlıyoruz.',
        'en' => 'We create residential interiors, renovation concepts, custom kitchens, and built-in storage systems with a quiet, useful, and material-led approach.',
    ],
    'home.intro_link' => [
        'tr' => 'Portföyümüzü incele',
        'en' => 'See our portfolio',
    ],
    'home.lookbooks_title' => [
        'tr' => 'Lookbook',
        'en' => 'Lookbooks',
    ],
    'home.lookbook_alt' => [
        'tr' => 'Özel mutfak lookbook önizlemesi',
        'en' => 'Custom kitchen lookbook preview',
    ],
    'home.split.approach.title' => [
        'tr' => 'Tasarım Yaklaşımı',
        'en' => 'Design Approach',
    ],
    'home.split.approach.text' => [
        'tr' => 'Her projeye işbirliği, işlevsellik ve uzun ömürlü malzeme kararları yön verir.',
        'en' => 'Collaboration, functionality, and long-lasting material decisions guide each project.',
    ],
    'home.split.work.title' => [
        'tr' => 'Güncel İşler',
        'en' => 'Recent Work',
    ],
    'home.split.work.text' => [
        'tr' => 'Seçilmiş iç mekânları, özel mutfakları, depolama parçalarını ve konut detaylarını inceleyin.',
        'en' => 'Browse selected interiors, custom kitchens, storage pieces, and residential details.',
    ],
    'home.guide_alt' => [
        'tr' => 'Mimari merdiven ve geçiş detayı',
        'en' => 'Architectural stair and transition detail',
    ],
    'home.guide_title' => [
        'tr' => 'Tasarım ve Renovasyon Rehberi İste',
        'en' => 'Request a Design & Renovation Guide',
    ],
    'home.guide_text' => [
        'tr' => 'Bir renovasyonun başında değerlendirilecek pek çok konu vardır. E-postanızı bırakın, size sade bir proje başlangıç kontrol listesi gönderelim.',
        'en' => 'There is a lot to consider at the beginning of a renovation. Send your email and we will follow up with a simple project-start checklist.',
    ],
    'home.guide_email_label' => [
        'tr' => 'E-posta Adresi',
        'en' => 'Email Address',
    ],
    'home.guide_email_placeholder' => [
        'tr' => 'isim@ornek.com',
        'en' => 'name@example.com',
    ],
    'home.guide_submit' => [
        'tr' => 'Gönder',
        'en' => 'Submit',
    ],
    'home.services_kicker' => [
        'tr' => 'Stüdyo Hizmetleri',
        'en' => 'Studio Services',
    ],
    'home.services_title' => [
        'tr' => 'Renovasyon odaklı iç mekânlar ve detaylı konut alanlarında uzmanız.',
        'en' => 'We specialize in renovation-led interiors and detailed residential spaces.',
    ],
    'home.featured_title' => [
        'tr' => 'Öne Çıkan Projeler',
        'en' => 'Featured Projects',
    ],

    // Projects page
    'projects.eyebrow' => [
        'tr' => 'Projeler',
        'en' => 'Projects',
    ],
    'projects.title' => [
        'tr' => 'Konut mimarlığı, iç mekân, dekor, mobilya ve objeler.',
        'en' => 'Residential architecture, interiors, decor, furniture, and objects.',
    ],
    'projects.featured_label' => [
        'tr' => 'Öne Çıkan',
        'en' => 'Featured',
    ],

    // Project detail
    'project.notes_kicker' => [
        'tr' => 'Proje Notları',
        'en' => 'Project Notes',
    ],
    'project.gallery_aria' => [
        'tr' => 'Proje görsel referansları',
        'en' => 'Project image references',
    ],
    'project.more_title' => [
        'tr' => 'Diğer Projeler',
        'en' => 'More Projects',
    ],

    // Services page
    'services.eyebrow' => [
        'tr' => 'Sunulan Hizmetler',
        'en' => 'Services Offered',
    ],
    'services.title' => [
        'tr' => 'Özenli planlama ve dayanıklı detay gerektiren mekânlar için iç mimari ve renovasyon hizmetleri.',
        'en' => 'Interior and renovation services for spaces that need careful planning and durable detail.',
    ],
    'services.kitchen_alt' => [
        'tr' => 'Dikey mutfak ve dolap detayı',
        'en' => 'Vertical kitchen and cabinetry detail',
    ],
    'services.section.architectural.title' => [
        'tr' => 'Mimari Tasarım',
        'en' => 'Architectural Design',
    ],
    'services.section.architectural.text' => [
        'tr' => 'Konut iç mekânları ve küçük ölçekli mimari için kapsamlı renovasyonlar, plan çalışmaları, tasarım geliştirme, yüzey yönlendirmesi ve şantiye koordinasyonu.',
        'en' => 'Major renovations, layout studies, design development, finish direction, and site coordination for residential interiors and small-scale architecture.',
    ],
    'services.section.residential.title' => [
        'tr' => 'Konut İç Mekânı ve Dekor',
        'en' => 'Residential Interiors & Decor',
    ],
    'services.section.residential.text' => [
        'tr' => 'Bütünlüklü bir iç mekân dili gerektiren odalar için mobilya, halı, aydınlatma, perde, dekoratif objeler, tekstil, stillendirme ve satın alma desteği.',
        'en' => 'Furniture, rugs, lighting, window treatments, decorative objects, linens, styling, and procurement support for rooms that need a complete interior language.',
    ],
    'services.section.kitchens.title' => [
        'tr' => 'Özel Mutfaklar ve Gömme Mobilya',
        'en' => 'Custom Kitchens & Built-ins',
    ],
    'services.section.kitchens.text' => [
        'tr' => 'Mutfak planlaması, gardıroplar, giyinme odaları, depolama duvarları, mobilya işçiliği ve mimarinin parçası olarak tasarlanan gömme mobilya.',
        'en' => 'Kitchen planning, wardrobes, dressing rooms, storage walls, millwork, and built-in furniture designed as part of the architecture.',
    ],
    'services.section.commercial.title' => [
        'tr' => 'Ticari İç Mekânlar',
        'en' => 'Commercial Interiors',
    ],
    'services.section.commercial.text' => [
        'tr' => 'Butik perakende, ofis, ağırlama ve müşteriye dönük iç mekânlar için mekân planlaması ve malzeme yönlendirmesi.',
        'en' => 'Space planning and material direction for boutique retail, office, hospitality, and client-facing interiors.',
    ],
    'services.read_more' => [
        'tr' => 'Devamını oku',
        'en' => 'Read more',
    ],
    'services.process_title' => [
        'tr' => 'Süreç',
        'en' => 'Process',
    ],
    'services.process.schematic.title' => [
        'tr' => 'Şematik Aşama',
        'en' => 'Schematic Phase',
    ],
    'services.process.schematic.text' => [
        'tr' => 'Brifi, ilham görsellerini, ölçülü planları ve hedeflenen mobilya veya depolama yerleşimini birlikte değerlendiririz.',
        'en' => 'We review the brief, inspiration images, measured plans, and the intended furniture or storage layout.',
    ],
    'services.process.selections.title' => [
        'tr' => 'Seçim Aşaması',
        'en' => 'Selections Phase',
    ],
    'services.process.selections.text' => [
        'tr' => 'Malzeme, mobilya, donanım, aydınlatma ve gömme detaylar tutarlı bir paket olarak rafine edilir.',
        'en' => 'Materials, furniture, hardware, lighting, and built-in details are refined into a coherent package.',
    ],
    'services.process.procurement.title' => [
        'tr' => 'Tedarik Aşaması',
        'en' => 'Procurement Phase',
    ],
    'services.process.procurement.text' => [
        'tr' => 'Onaylanan ürünler ve özel parçalar tedarikçiler, ustalar ve uygulayıcılarla birlikte organize edilir.',
        'en' => 'Approved items and custom pieces are organized with vendors, makers, and contractors.',
    ],
    'services.process.installation.title' => [
        'tr' => 'Uygulama Aşaması',
        'en' => 'Installation Phase',
    ],
    'services.process.installation.text' => [
        'tr' => 'Son yerleşim, stillendirme ve eksik kalan detaylar tamamlanır; her ayrıntı yerine oturur.',
        'en' => 'Final placement, styling, and loose ends are resolved so every detail feels accounted for.',
    ],

    // Studio page
    'studio.opening_alt' => [
        'tr' => 'Sakin yatak odası iç mekânı',
        'en' => 'Quiet bedroom interior',
    ],
    'studio.opening_text' => [
        'tr' => 'Aysa Works üç temel kavram etrafında kuruldu:',
        'en' => 'Aysa Works was founded around three fundamental concepts:',
    ],
    'studio.opening_title' => [
        'tr' => 'İşbirliği, işlevsellik ve sürdürülebilirlik.',
        'en' => 'Collaboration, functionality, and sustainability.',
    ],
    'studio.collab_title' => [
        'tr' => 'İşbirliği',
        'en' => 'Collaboration',
    ],
    'studio.collab.clients.title' => [
        'tr' => 'Müşterilerle',
        'en' => 'With clients',
    ],
    'studio.collab.clients.text' => [
        'tr' => 'İç mekân çalışması kişiseldir. Mekânın nasıl hissettirmesi gerektiği, neyi içermesi gerektiği ve günlük rutinleri nasıl kolaylaştırabileceği ile başlarız.',
        'en' => 'Interior work is personal. We begin with how the space needs to feel, what it needs to hold, and how daily routines can become easier.',
    ],
    'studio.collab.studio.title' => [
        'tr' => 'Stüdyo içinde',
        'en' => 'Within the studio',
    ],
    'studio.collab.studio.text' => [
        'tr' => 'Plan, malzeme, aydınlatma, mobilya ve depolama birlikte geliştirilir; oda parçalardan oluşmuş gibi değil, bütün hissettirir.',
        'en' => 'Plans, materials, lighting, furniture, and storage are developed together so the final room feels complete rather than assembled in parts.',
    ],
    'studio.collab.builders.title' => [
        'tr' => 'Uygulayıcı ve ustalarla',
        'en' => 'With builders and makers',
    ],
    'studio.collab.builders.text' => [
        'tr' => 'Detayları üretim için yeterince net, şantiye koordinasyonunda iyileştirmeye açık olacak şekilde tutarız.',
        'en' => 'We keep details clear enough for production and flexible enough to improve during site coordination.',
    ],
    'studio.functionality_title' => [
        'tr' => 'İşlevsellik',
        'en' => 'Functionality',
    ],
    'studio.functionality_alt' => [
        'tr' => 'Gömme giyinme odası depolaması',
        'en' => 'Built-in dressing room storage',
    ],
    'studio.functionality.durable.title' => [
        'tr' => 'Dayanıklı, kolay temizlenir, düzenli',
        'en' => 'Durable, cleanable, organized',
    ],
    'studio.functionality.durable.text' => [
        'tr' => 'Sakin bir iç mekân; gerçek kullanımı taşıyabilen depolama, sirkülasyon ve malzemelere bağlıdır. Odaları önce yaşamayı kolaylaştıracak şekilde tasarlarız.',
        'en' => 'A calm interior depends on storage, circulation, and materials that can support real use. We design rooms to be easy to live in first.',
    ],
    'studio.functionality.flex.title' => [
        'tr' => 'Esnek',
        'en' => 'Flexible',
    ],
    'studio.functionality.flex.text' => [
        'tr' => 'Evler zamanla değişir. En iyi yerleşimler, gelecekteki rutinlere, değişen mobilyalara ve farklı yaşam biçimlerine yer bırakır.',
        'en' => 'Homes change over time. The best layouts leave space for future routines, changing furniture, and different ways of living.',
    ],
    'studio.sustainability_title' => [
        'tr' => 'Sürdürülebilirlik',
        'en' => 'Sustainability',
    ],
    'studio.sustainability.materials.title' => [
        'tr' => 'Doğal malzemeler ve daha az değişim',
        'en' => 'Natural materials and fewer replacements',
    ],
    'studio.sustainability.materials.text' => [
        'tr' => 'Ahşap, taş, kireç badana, tekstil ve metal; ince dekoratif katmanlardan daha onurlu yaşlanır. Mekânların daha uzun süre kalması için malzemede ölçülü davranırız.',
        'en' => 'Wood, stone, limewash, textiles, and metal age with more dignity than thin decorative layers. We use material restraint to make spaces last longer.',
    ],
    'studio.sustainability.waste.title' => [
        'tr' => 'Daha az israf',
        'en' => 'Less waste',
    ],
    'studio.sustainability.waste.text' => [
        'tr' => 'İyi detaylandırma yeniden işi azaltır. İşlevsel depolama, sağlam yüzeyler ve uyarlanabilir yerleşimler projenin yıllar içinde anlamlı kalmasına yardımcı olur.',
        'en' => 'Good detailing reduces rework. Useful storage, robust surfaces, and adaptable layouts help a project stay relevant for years.',
    ],

    // Contact page
    'contact.eyebrow' => [
        'tr' => 'Genel İletişim',
        'en' => 'General Contact',
    ],
    'contact.title' => [
        'tr' => 'Üzerinde çalıştığınız mekândan bahsedin.',
        'en' => 'Tell us about the space you are working on.',
    ],
    'contact.lead' => [
        'tr' => 'Bu formu bir başlangıç noktası olarak kullanın. Nihai e-posta, telefon ve adres hazır olduğunda <code>data.php</code> içindeki yer tutucu iletişim bilgilerini güncelleyin.',
        'en' => 'Use this form as a starting point. Replace the placeholder contact details in <code>data.php</code> when the final email, phone, and address are ready.',
    ],
    'contact.form.name' => [
        'tr' => 'Ad Soyad',
        'en' => 'Name',
    ],
    'contact.form.email' => [
        'tr' => 'E-posta',
        'en' => 'Email',
    ],
    'contact.form.project_type' => [
        'tr' => 'Proje Türü',
        'en' => 'Project Type',
    ],
    'contact.form.option.residential' => [
        'tr' => 'Konut İç Mekânı',
        'en' => 'Residential Interior',
    ],
    'contact.form.option.renovation' => [
        'tr' => 'Renovasyon',
        'en' => 'Renovation',
    ],
    'contact.form.option.kitchen' => [
        'tr' => 'Özel Mutfak / Gömme Mobilya',
        'en' => 'Custom Kitchen / Built-in',
    ],
    'contact.form.option.commercial' => [
        'tr' => 'Ticari İç Mekân',
        'en' => 'Commercial Interior',
    ],
    'contact.form.message' => [
        'tr' => 'Mesaj',
        'en' => 'Message',
    ],
    'contact.form.submit' => [
        'tr' => 'Gönder',
        'en' => 'Submit',
    ],
];

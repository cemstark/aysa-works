<?php
$site = [
    'name' => 'Aysa Works',
    'tagline' => 'Architecture & Interiors',
    'email' => 'hello@aysaworks.com',
    'phone' => '+90 000 000 00 00',
    'address' => 'Istanbul, Turkiye',
    'instagram' => '#',
];

$nav = [
    'projects.php' => 'Projects',
    'studio.php' => 'Studio',
    'services.php' => 'Services',
    'contact.php' => 'Contact',
];

$lookbooks = [
    'Classic Homes',
    'Apartment Renovations',
    'Interiors & Decor',
    'Thoughtful Details',
    'Custom Kitchens',
    'Built-in Storage',
    'Before / After',
    'Material Palettes',
];

$projects = [
    [
        'slug' => 'warm-living-room',
        'title' => 'Warm Living Room',
        'location' => 'Residential Interior',
        'category' => 'Interiors & Decor',
        'image' => 'images/oturmaodasi.jpeg',
        'featured' => true,
        'summary' => 'A layered living space shaped around warm tones, comfortable circulation, and quiet detailing.',
        'details' => [
            'Soft seating plan with generous daylight and a calm material language.',
            'Balanced storage and display moments keep the room practical without feeling dense.',
        ],
    ],
    [
        'slug' => 'custom-kitchen-one',
        'title' => 'Custom Kitchen I',
        'location' => 'Kitchen Renovation',
        'category' => 'Residential Architecture',
        'image' => 'images/mutfak1.jpeg',
        'featured' => true,
        'summary' => 'A compact kitchen study focused on durable surfaces, proportion, and daily use.',
        'details' => [
            'Cabinet proportions are kept simple so material and light become the main focus.',
            'The project can be updated later by replacing images/mutfak1.jpeg.',
        ],
    ],
    [
        'slug' => 'custom-kitchen-two',
        'title' => 'Custom Kitchen II',
        'location' => 'Kitchen Detail',
        'category' => 'Residential Architecture',
        'image' => 'images/mutfak2.jpeg',
        'featured' => false,
        'summary' => 'A vertical kitchen composition with a stronger millwork and finish emphasis.',
        'details' => [
            'Tall cabinetry and narrow visual rhythm create a refined service zone.',
            'Use this project for close-up cabinetry or appliance integration images.',
        ],
    ],
    [
        'slug' => 'kitchen-material-study',
        'title' => 'Kitchen Material Study',
        'location' => 'Finish & Fixture Study',
        'category' => 'Thoughtful Details',
        'image' => 'images/mutfak3.jpeg',
        'featured' => false,
        'summary' => 'A material-forward kitchen frame for surface, hardware, and lighting decisions.',
        'details' => [
            'Designed as a flexible case-study slot for future material notes.',
            'Replace images/mutfak3.jpeg if a stronger detail photograph becomes available.',
        ],
    ],
    [
        'slug' => 'stair-and-transition',
        'title' => 'Stair & Transition',
        'location' => 'Circulation Detail',
        'category' => 'Thoughtful Details',
        'image' => 'images/merdiven1.jpeg',
        'featured' => true,
        'summary' => 'A transition space where stairs, wall planes, and daylight carry the architectural expression.',
        'details' => [
            'Circulation is treated as a design moment rather than leftover space.',
            'This page can later include before/after process images.',
        ],
    ],
    [
        'slug' => 'dressing-room',
        'title' => 'Dressing Room',
        'location' => 'Built-in Storage',
        'category' => 'Furniture & Objects',
        'image' => 'images/giyinmeodasi.jpeg',
        'featured' => false,
        'summary' => 'A storage-focused interior with integrated cabinetry and everyday organization.',
        'details' => [
            'Built-in elements are treated as part of the architecture.',
            'Future updates can include drawer, door, and hardware detail shots.',
        ],
    ],
    [
        'slug' => 'quiet-bedroom',
        'title' => 'Quiet Bedroom',
        'location' => 'Bedroom Interior',
        'category' => 'Interiors & Decor',
        'image' => 'images/yatakodasi.jpeg',
        'featured' => false,
        'summary' => 'A calm bedroom composition built around texture, rest, and controlled contrast.',
        'details' => [
            'The palette is intentionally restrained so textiles and proportion do the work.',
            'Use this project slot for bedroom styling or full-room photography.',
        ],
    ],
];

$services = [
    [
        'title' => 'Architectural Design',
        'text' => 'Renovation, plan development, detail design, permitting coordination, and construction phase support for residential and boutique commercial spaces.',
        'link' => 'services.php#architectural-design',
    ],
    [
        'title' => 'Residential Interiors & Decor',
        'text' => 'Furniture, lighting, rugs, window treatments, decorative objects, material direction, procurement guidance, and final styling.',
        'link' => 'services.php#residential-interiors',
    ],
    [
        'title' => 'Custom Kitchens & Built-ins',
        'text' => 'Cabinetry, storage, kitchen planning, dressing rooms, built-in benches, and detailed millwork packages.',
        'link' => 'services.php#custom-kitchens',
    ],
    [
        'title' => 'Commercial Interiors',
        'text' => 'Space planning and interior design for retail, office, hospitality, and client-facing environments.',
        'link' => 'services.php#commercial-interiors',
    ],
];

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

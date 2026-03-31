<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        .clip-path-slant {
            clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #09090b;
        }

        ::-webkit-scrollbar-thumb {
            background: #3f3f46;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #52525b;
        }

        .wpcf7 form .wpcf7-response-output {
            background-color: #18181b;
            border: 1px solid #27272a;
            color: #fff;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0.125rem;
            font-size: 0.875rem;
        }

        .wpcf7 label {
            display: block;
            font-size: 0.875rem;
            font-weight: 700;
            color: #a1a1aa;
            margin-bottom: 0.5rem;
        }

        .wpcf7 input[type="text"],
        .wpcf7 input[type="email"],
        .wpcf7 input[type="tel"],
        .wpcf7 textarea {
            width: 100%;
            background-color: #09090b;
            border: 1px solid #27272a;
            padding: 1rem;
            color: white;
            transition: all 0.2s;
        }

        .wpcf7 input[type="text"]:focus,
        .wpcf7 input[type="email"]:focus,
        .wpcf7 input[type="tel"]:focus,
        .wpcf7 textarea:focus {
            border-color: #22c55e;
            outline: none;
        }

        .wpcf7 input[type="submit"] {
            width: 100%;
            background-color: #22c55e;
            color: black;
            font-weight: 900;
            letter-spacing: 0.05em;
            padding: 1.25rem;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s;
        }

        .wpcf7 input[type="submit"]:hover {
            background-color: #4ade80;
        }

        .wpcf7-not-valid-tip {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        }

        .wpcf7-spinner {
            margin: 1rem auto 0;
        }

        .vk-mobile-nav-menu-btn,
        .vk-mobile-nav,
        .lightning-mobile-menu,
        #header-top,
        .site-header {
            display: none !important;
        }
    </style>
</head>

<?php
// カスタマイザー値を取得
$site_name = woods_get('site_name', 'WOODS MOTORSPORTS LAND');
$site_subtitle = woods_get('site_subtitle', '下市');
$hero_heading = woods_get('hero_heading', "大自然を\n駆け抜けろ");
$hero_desc = woods_get('hero_description', "奈良県吉野郡の本格オフロードコース。\nMX・エンデューロ・トレイルまで、全てのライダーが楽しめるフィールド。");

$course_desc = woods_get('course_description', '');
$feature1_title = woods_get('feature1_title', 'MXコース');
$feature1_text = woods_get('feature1_text', '本格モトクロスコース完備。ジャンプ・ウォッシュボードなど多彩なセクション。');
$feature2_title = woods_get('feature2_title', 'XCコース');
$feature2_text = woods_get('feature2_text', '山林を活かしたクロスカントリーコース。自然の地形を楽しむトレイルライド。');
$feature3_title = woods_get('feature3_title', 'レンタルバイク');
$feature3_text = woods_get('feature3_text', 'SUR-RON電動バイクをレンタル可能。手ぶらで気軽にオフロード体験。');
$course_logo = woods_get('course_logo', get_stylesheet_directory_uri() . '/assets/images/woods-logo.png');

$price_day = woods_get('price_day', '3,000円');
$price_half = woods_get('price_half', '2,000円');
$price_rental = woods_get('price_rental', '5,000円〜');
$price_note = woods_get('price_note', '※料金は変更になる場合があります。詳しくはお問い合わせください。');

$postal_code = woods_get('postal_code', '〒638-0045');
$address = woods_get('address', '奈良県吉野郡下市町新住239');
$tel = woods_get('tel', '0747-52-3744');
$hours = woods_get('hours', '9:00 - 17:00');
$holidays = woods_get('holidays', '不定休（天候により閉鎖の場合あり）');
$map_url = woods_get('google_map_url', '');

$twitter_url = woods_get('twitter_url', 'https://x.com/Woodshirappy');
$twitter_id = woods_get('twitter_id', '@Woodshirappy');
$facebook_url = woods_get('facebook_url', 'https://www.facebook.com/hiratamotors/');
$facebook_name = woods_get('facebook_name', 'ウッズモータースポーツランド下市');
$instagram_url = woods_get('instagram_url', 'https://www.instagram.com/husqvarna_hirappy/');

$surron_shop_url = woods_get('surron_shop_url', 'https://hirata-auto.com/');
$contact_shortcode = woods_get('contact_form_shortcode', '[contact-form-7 id="xxx" title="ウッズ問い合わせ"]');

$hero1 = woods_get('hero_image_1', get_stylesheet_directory_uri() . '/assets/images/hero-1.jpg');
$hero2 = woods_get('hero_image_2', get_stylesheet_directory_uri() . '/assets/images/hero-2.jpg');
$hero3 = woods_get('hero_image_3', get_stylesheet_directory_uri() . '/assets/images/hero-3.jpg');

$hero_lines = explode("\n", $hero_heading);
$hero_desc_html = nl2br(esc_html($hero_desc));
$course_desc_html = nl2br(esc_html($course_desc));

$menu_items = [
    'COURSE' => 'コース紹介',
    'PRICING' => '料金',
    'FACILITY' => '施設情報',
    'ACCESS' => 'アクセス',
    'CONTACT' => 'お問い合わせ',
];
?>

<body class="min-h-screen bg-zinc-950 text-white font-sans selection:bg-green-500 selection:text-black">

    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-2xl font-bold tracking-tighter italic flex items-center gap-2">
                <span class="text-green-400">
                    <i data-lucide="trees" class="w-7 h-7"></i>
                </span>
                <?php echo esc_html($site_name); ?>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
                <?php foreach ($menu_items as $key => $label):
                    $target = strtolower($key); ?>
                    <button onclick="scrollToSection('<?php echo $target; ?>')"
                        class="hover:text-green-400 transition-colors relative group">
                        <?php echo esc_html($label); ?>
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all group-hover:w-full"></span>
                    </button>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($surron_shop_url); ?>"
                    class="hover:text-green-400 transition-colors relative group">
                    SUR-RONショップ
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all group-hover:w-full"></span>
                </a>
            </div>

            <button id="mobile-menu-btn" class="md:hidden text-white">
                <i data-lucide="menu" id="menu-icon"></i>
            </button>
        </div>

        <div id="mobile-menu"
            class="hidden md:hidden absolute top-full left-0 w-full bg-zinc-900 border-b border-zinc-800 py-4 flex flex-col items-center gap-4">
            <?php foreach ($menu_items as $key => $label):
                $target = strtolower($key); ?>
                <button onclick="scrollToSection('<?php echo $target; ?>')"
                    class="text-lg font-medium hover:text-green-400">
                    <?php echo esc_html($label); ?>
                </button>
            <?php endforeach; ?>
            <a href="<?php echo esc_url($surron_shop_url); ?>"
                class="text-lg font-medium hover:text-green-400">
                SUR-RONショップ
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-zinc-950 z-10"></div>

        <div class="absolute inset-0 z-0" id="hero-slideshow">
            <img src="<?php echo esc_url($hero1); ?>" alt="Hero Background 1"
                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100" />
            <img src="<?php echo esc_url($hero2); ?>" alt="Hero Background 2"
                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0" />
            <img src="<?php echo esc_url($hero3); ?>" alt="Hero Background 3"
                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0" />
        </div>

        <div class="relative z-20 container mx-auto px-6 text-center md:text-left">
            <h2 class="text-green-400 font-bold tracking-widest mb-4">
                <?php echo esc_html($site_name); ?> <?php echo esc_html($site_subtitle); ?>
            </h2>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter mb-6 leading-tight">
                <?php echo esc_html($hero_lines[0]); ?> <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-600"><?php echo esc_html(isset($hero_lines[1]) ? $hero_lines[1] : ''); ?></span>
            </h1>
            <p class="text-zinc-400 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                <?php echo $hero_desc_html; ?>
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <button onclick="scrollToSection('course')"
                    class="bg-green-500 text-black px-8 py-4 font-bold hover:bg-green-400 transition-colors flex items-center justify-center gap-2 clip-path-slant">
                    コース詳細 <i data-lucide="chevron-right"></i>
                </button>
                <button onclick="scrollToSection('pricing')"
                    class="border border-white/30 hover:border-white hover:bg-white/10 text-white px-8 py-4 font-bold transition-all flex items-center justify-center gap-2">
                    料金を見る
                </button>
            </div>
        </div>
    </header>

    <!-- Course Section -->
    <section id="course" class="py-24 bg-zinc-950 relative">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div>
                        <h3 class="text-green-400 font-bold tracking-widest mb-2">COURSE</h3>
                        <h2 class="text-4xl font-bold mb-6">コース紹介</h2>
                    </div>
                    <p class="text-zinc-400 leading-relaxed">
                        <?php echo $course_desc_html; ?>
                    </p>

                    <div class="grid gap-6">
                        <div class="bg-zinc-900 p-6 border-l-4 border-green-500 flex items-start gap-4">
                            <i data-lucide="flag" class="text-green-500 mt-1 flex-shrink-0 h-8 w-8"></i>
                            <div>
                                <h4 class="font-bold text-lg mb-2"><?php echo esc_html($feature1_title); ?></h4>
                                <p class="text-sm text-zinc-500"><?php echo esc_html($feature1_text); ?></p>
                            </div>
                        </div>
                        <div class="bg-zinc-900 p-6 border-l-4 border-emerald-600 flex items-start gap-4">
                            <i data-lucide="mountain" class="text-emerald-600 mt-1 flex-shrink-0 h-8 w-8"></i>
                            <div>
                                <h4 class="font-bold text-lg mb-2"><?php echo esc_html($feature2_title); ?></h4>
                                <p class="text-sm text-zinc-500"><?php echo esc_html($feature2_text); ?></p>
                            </div>
                        </div>
                        <div class="bg-zinc-900 p-6 border-l-4 border-teal-500 flex items-start gap-4">
                            <i data-lucide="zap" class="text-teal-500 mt-1 flex-shrink-0 h-8 w-8"></i>
                            <div>
                                <h4 class="font-bold text-lg mb-2"><?php echo esc_html($feature3_title); ?></h4>
                                <p class="text-sm text-zinc-500"><?php echo esc_html($feature3_text); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex items-center justify-center p-8">
                    <img src="<?php echo esc_url($course_logo); ?>"
                        alt="Woods Motorsports Land Logo"
                        class="w-full h-auto max-w-md hover:scale-105 transition-transform duration-500 relative z-10" />
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-24 bg-zinc-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-green-400 font-bold tracking-widest mb-2">PRICING</h3>
                <h2 class="text-4xl font-bold">利用料金</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="bg-zinc-950 border border-zinc-800 p-8 text-center hover:border-green-500 transition-colors group">
                    <i data-lucide="sun" class="text-zinc-500 group-hover:text-green-400 transition-colors mx-auto mb-4 h-10 w-10"></i>
                    <h4 class="text-sm text-zinc-500 font-bold tracking-wider mb-2">1日走行</h4>
                    <p class="text-4xl font-black text-white mb-2"><?php echo esc_html($price_day); ?></p>
                    <p class="text-zinc-600 text-sm">終日フリー走行</p>
                </div>
                <div class="bg-zinc-950 border border-zinc-800 p-8 text-center hover:border-green-500 transition-colors group">
                    <i data-lucide="clock" class="text-zinc-500 group-hover:text-green-400 transition-colors mx-auto mb-4 h-10 w-10"></i>
                    <h4 class="text-sm text-zinc-500 font-bold tracking-wider mb-2">半日走行</h4>
                    <p class="text-4xl font-black text-white mb-2"><?php echo esc_html($price_half); ?></p>
                    <p class="text-zinc-600 text-sm">午前 or 午後</p>
                </div>
                <div class="bg-zinc-950 border border-green-500/50 p-8 text-center hover:border-green-400 transition-colors group relative">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-green-500 text-black text-xs font-bold px-3 py-1">POPULAR</div>
                    <i data-lucide="zap" class="text-green-400 mx-auto mb-4 h-10 w-10"></i>
                    <h4 class="text-sm text-zinc-500 font-bold tracking-wider mb-2">レンタルバイク</h4>
                    <p class="text-4xl font-black text-white mb-2"><?php echo esc_html($price_rental); ?></p>
                    <p class="text-zinc-600 text-sm">SUR-RON電動バイク</p>
                </div>
            </div>
            <p class="text-center text-zinc-600 text-sm mt-8"><?php echo esc_html($price_note); ?></p>
        </div>
    </section>

    <!-- SNS Section -->
    <section id="sns" class="py-24 bg-zinc-950 border-b border-zinc-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-green-400 font-bold tracking-widest mb-2">SOCIAL</h3>
                <h2 class="text-4xl font-bold">SNS ACCOUNTS</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <a href="<?php echo esc_url($twitter_url); ?>" target="_blank" class="group block">
                    <div class="bg-zinc-900 p-8 rounded-sm border border-zinc-800 hover:border-zinc-600 transition-all hover:bg-zinc-800 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center border border-zinc-700 group-hover:border-white transition-colors">
                                <i data-lucide="twitter" class="text-white w-8 h-8"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-1">X (Twitter)</h4>
                                <p class="text-zinc-500 group-hover:text-zinc-300 transition-colors"><?php echo esc_html($twitter_id); ?></p>
                            </div>
                        </div>
                        <i data-lucide="external-link" class="text-zinc-600 group-hover:text-white transition-colors"></i>
                    </div>
                </a>

                <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" class="group block">
                    <div class="bg-zinc-900 p-8 rounded-sm border border-zinc-800 hover:border-zinc-600 transition-all hover:bg-zinc-800 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 bg-blue-900 rounded-full flex items-center justify-center border border-zinc-700 group-hover:border-white transition-colors">
                                <i data-lucide="facebook" class="text-white w-8 h-8"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-1">Facebook</h4>
                                <p class="text-zinc-500 group-hover:text-zinc-300 transition-colors"><?php echo esc_html($facebook_name); ?></p>
                            </div>
                        </div>
                        <i data-lucide="external-link" class="text-zinc-600 group-hover:text-white transition-colors"></i>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Facility Info & Access Section -->
    <section id="facility" class="py-24 bg-zinc-950">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-5 gap-12">
                <div class="lg:col-span-2 space-y-8">
                    <div id="access">
                        <h3 class="text-green-400 font-bold tracking-widest mb-2">FACILITY & ACCESS</h3>
                        <h2 class="text-4xl font-bold mb-2">施設情報</h2>
                        <p class="text-zinc-400 text-sm mb-6">ウッズモータースポーツランド下市</p>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <i data-lucide="map-pin" class="text-zinc-500 mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-bold text-white">ADDRESS</p>
                                <p class="text-zinc-400"><?php echo esc_html($postal_code); ?><br /><?php echo esc_html($address); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <i data-lucide="phone" class="text-zinc-500 mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-bold text-white">TEL</p>
                                <p class="text-zinc-400"><?php echo esc_html($tel); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <i data-lucide="clock" class="text-zinc-500 mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-bold text-white">OPENING HOURS</p>
                                <p class="text-zinc-400"><?php echo esc_html($hours); ?></p>
                                <p class="text-zinc-500 text-sm"><?php echo esc_html($holidays); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Link to SUR-RON Shop -->
                    <a href="<?php echo esc_url($surron_shop_url); ?>"
                        class="inline-flex items-center gap-2 bg-zinc-900 border border-zinc-700 hover:border-green-500 text-white font-bold py-3 px-6 transition-all group">
                        <i data-lucide="zap" class="text-green-400 w-5 h-5"></i>
                        SUR-RONショップ ヒラタ自動車
                        <i data-lucide="chevron-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <div class="lg:col-span-3">
                    <div class="w-full h-full min-h-[400px] bg-zinc-900 rounded-sm relative flex items-center justify-center overflow-hidden group">
                        <iframe
                            src="<?php echo esc_url($map_url); ?>"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            class="absolute inset-0 grayscale contrast-125 opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-500"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-zinc-900">
        <div class="container mx-auto px-6 max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h3 class="text-green-400 font-bold tracking-widest mb-2">CONTACT US</h3>
                <h2 class="text-4xl font-bold mb-4">お問い合わせ</h2>
                <p class="text-zinc-400">
                    コースの状態、イベント情報、レンタルのご予約など、<br class="hidden md:block" />お気軽にお問い合わせください。<br />
                    <span class="text-green-400 font-bold block mt-2 text-xl">TEL: <?php echo esc_html($tel); ?></span>
                </p>
            </div>

            <div class="mt-8">
                <?php echo do_shortcode($contact_shortcode); ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-12 border-t border-zinc-900">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-xl font-bold italic tracking-tighter text-white flex items-center gap-2">
                <i data-lucide="trees" class="text-green-400 w-5 h-5"></i>
                <?php echo esc_html($site_name); ?>
            </div>
            <div class="flex gap-6">
                <a href="<?php echo esc_url($twitter_url); ?>" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="twitter"></i></a>
                <a href="<?php echo esc_url($facebook_url); ?>" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="facebook"></i></a>
                <a href="<?php echo esc_url($instagram_url); ?>" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="instagram"></i></a>
            </div>
            <p class="text-zinc-600 text-sm">&copy; <?php echo date('Y'); ?> Woods Motorsports Land. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        let isMenuOpen = false;

        mobileMenuBtn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                mobileMenu.classList.remove('hidden');
                menuIcon.setAttribute('data-lucide', 'x');
            } else {
                mobileMenu.classList.add('hidden');
                menuIcon.setAttribute('data-lucide', 'menu');
            }
            lucide.createIcons();
        });

        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-zinc-950/90', 'backdrop-blur-md', 'py-4', 'border-b', 'border-zinc-800');
                navbar.classList.remove('bg-transparent', 'py-6');
            } else {
                navbar.classList.remove('bg-zinc-950/90', 'backdrop-blur-md', 'py-4', 'border-b', 'border-zinc-800');
                navbar.classList.add('bg-transparent', 'py-6');
            }
        });

        function scrollToSection(id) {
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                isMenuOpen = false;
                menuIcon.setAttribute('data-lucide', 'menu');
                lucide.createIcons();
            }
            const element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }

        const slideshowContainer = document.getElementById('hero-slideshow');
        if (slideshowContainer) {
            const slides = slideshowContainer.querySelectorAll('img');
            let currentSlide = 0;
            setInterval(() => {
                slides[currentSlide].classList.remove('opacity-100');
                slides[currentSlide].classList.add('opacity-0');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.remove('opacity-0');
                slides[currentSlide].classList.add('opacity-100');
            }, 5000);
        }
    </script>
    <?php wp_footer(); ?>
</body>

</html>

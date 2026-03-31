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

        /* Custom Scrollbar */
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

        /* Contact Form 7 Styling */
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
            border-color: #facc15;
            outline: none;
        }

        .wpcf7 input[type="submit"] {
            width: 100%;
            background-color: #facc15;
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
            background-color: #fde047;
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

        /* Hide Lightning Theme Default Mobile Elements */
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
$shop_name = surron_get('shop_name', 'ヒラタ自動車');
$shop_subtitle = surron_get('shop_subtitle', 'AUTHORIZED SUR-RON DEALER');
$hero_heading = surron_get('hero_heading', "サーロン\n正規ディーラー");
$hero_desc = surron_get('hero_description', "奈良県吉野郡のサーロン正規取扱店 ヒラタ自動車。\n次世代の走りを楽しむための、最高のガレージへようこそ。");
$representative = surron_get('representative', '代表 平田 武博');

$postal_code = surron_get('postal_code', '〒638-0045');
$address = surron_get('address', '奈良県吉野郡下市町新住239');
$tel = surron_get('tel', '0747-52-3744');
$fax = surron_get('fax', '0747-52-1813');
$hours = surron_get('hours', '9:00 - 18:00');
$holidays = surron_get('holidays', '第２･４土曜及び日曜日・祝日、年末年始、お盆');
$map_url = surron_get('google_map_url', '');

$about_text = surron_get('about_text', '');
$feature1_title = surron_get('feature1_title', '自社コース保有');
$feature1_text = surron_get('feature1_text', 'ウッズモータースポーツランド下市で、いつでも本格的な走行が可能。');
$feature2_title = surron_get('feature2_title', 'SUR-RON正規店');
$feature2_text = surron_get('feature2_text', '販売からメンテナンス、カスタムまでトータルサポート。');
$about_logo = surron_get('about_logo', get_stylesheet_directory_uri() . '/assets/images/about-logo.png');

$twitter_url = surron_get('twitter_url', 'https://x.com/Woodshirappy');
$twitter_id = surron_get('twitter_id', '@Woodshirappy');
$facebook_url = surron_get('facebook_url', 'https://www.facebook.com/hiratamotors/');
$facebook_name = surron_get('facebook_name', 'ヒラタ自動車');
$instagram_url = surron_get('instagram_url', 'https://www.instagram.com/husqvarna_hirappy/');
$facebook_embed = surron_get('facebook_embed', '');

$used_cars_url = surron_get('used_cars_url', 'https://www.hirata-motors.com/cars.html');
$rental_url = surron_get('rental_url', 'https://www.hirata-motors.com/sale.html');
$woods_url = surron_get('woods_url', 'https://hirata-auto.com/woods/');
$contact_shortcode = surron_get('contact_form_shortcode', '[contact-form-7 id="f441385" title="サーロン問い合わせ"]');

$hero1 = surron_get('hero_image_1', get_stylesheet_directory_uri() . '/assets/images/hero-1.jpg');
$hero2 = surron_get('hero_image_2', get_stylesheet_directory_uri() . '/assets/images/hero-2.jpg');
$hero3 = surron_get('hero_image_3', get_stylesheet_directory_uri() . '/assets/images/hero-3.jpg');

$hero_lines = explode("\n", $hero_heading);
$hero_desc_html = nl2br(esc_html($hero_desc));
$about_html = nl2br(esc_html($about_text));

$menu_items = [
    'ABOUT' => 'ショップ紹介',
    'RENTAL' => 'レンタル・コース',
    'USED CARS' => '中古車',
    'SHOP INFO' => '店舗情報',
    'ACCESS' => 'アクセス',
    'CONTACT' => 'お問い合わせ'
];
?>

<body class="min-h-screen bg-zinc-950 text-white font-sans selection:bg-yellow-500 selection:text-black">

    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-2xl font-bold tracking-tighter italic flex items-center gap-2">
                <span class="text-yellow-400">⚡</span>
                <?php echo esc_html($shop_name); ?>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
                <?php foreach ($menu_items as $key => $label):
                    if ($key === 'USED CARS'): ?>
                        <a href="<?php echo esc_url($used_cars_url); ?>" target="_blank"
                            class="hover:text-yellow-400 transition-colors relative group">
                            <?php echo esc_html($label); ?>
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full"></span>
                        </a>
                    <?php else:
                        $target = strtolower(str_replace(' ', '', $key));
                        if ($target == 'rental') $target = 'services'; ?>
                        <button onclick="scrollToSection('<?php echo $target; ?>')"
                            class="hover:text-yellow-400 transition-colors relative group">
                            <?php echo esc_html($label); ?>
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full"></span>
                        </button>
                    <?php endif;
                endforeach; ?>
            </div>

            <button id="mobile-menu-btn" class="md:hidden text-white">
                <i data-lucide="menu" id="menu-icon"></i>
            </button>
        </div>

        <div id="mobile-menu"
            class="hidden md:hidden absolute top-full left-0 w-full bg-zinc-900 border-b border-zinc-800 py-4 flex flex-col items-center gap-4 animate-in slide-in-from-top-5">
            <?php foreach ($menu_items as $key => $label):
                if ($key === 'USED CARS'): ?>
                    <a href="<?php echo esc_url($used_cars_url); ?>" target="_blank"
                        class="text-lg font-medium hover:text-yellow-400">
                        <?php echo esc_html($label); ?>
                    </a>
                <?php else:
                    $target = strtolower(str_replace(' ', '', $key));
                    if ($target == 'rental') $target = 'services'; ?>
                    <button onclick="scrollToSection('<?php echo $target; ?>')"
                        class="text-lg font-medium hover:text-yellow-400">
                        <?php echo esc_html($label); ?>
                    </button>
                <?php endif;
            endforeach; ?>
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
            <h2 class="text-yellow-400 font-bold tracking-widest mb-4 animate-in slide-in-from-bottom-4 fade-in duration-700">
                <?php echo esc_html($shop_subtitle); ?></h2>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter mb-6 leading-tight">
                <?php echo esc_html($hero_lines[0]); ?> <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-zinc-500"><?php echo esc_html(isset($hero_lines[1]) ? $hero_lines[1] : ''); ?></span>
            </h1>
            <p class="text-zinc-400 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                <?php echo $hero_desc_html; ?>
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <button onclick="scrollToSection('services')"
                    class="bg-yellow-400 text-black px-8 py-4 font-bold hover:bg-yellow-300 transition-colors flex items-center justify-center gap-2 clip-path-slant">
                    レンタル・コース詳細 <i data-lucide="chevron-right"></i>
                </button>
                <button onclick="scrollToSection('access')"
                    class="border border-white/30 hover:border-white hover:bg-white/10 text-white px-8 py-4 font-bold transition-all flex items-center justify-center gap-2">
                    店舗アクセス
                </button>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-24 bg-zinc-950 relative">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div>
                        <h3 class="text-yellow-400 font-bold tracking-widest mb-2">ABOUT US</h3>
                        <h2 class="text-4xl font-bold mb-6">ショップ紹介</h2>
                    </div>
                    <p class="text-zinc-400 leading-relaxed">
                        <?php echo $about_html; ?>
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-zinc-900 p-6 border-l-4 border-yellow-400">
                            <i data-lucide="mountain-snow" class="text-zinc-500 mb-4 h-8 w-8"></i>
                            <h4 class="font-bold text-lg mb-2"><?php echo esc_html($feature1_title); ?></h4>
                            <p class="text-sm text-zinc-500"><?php echo esc_html($feature1_text); ?></p>
                        </div>
                        <div class="bg-zinc-900 p-6 border-l-4 border-blue-500">
                            <i data-lucide="zap" class="text-zinc-500 mb-4 h-8 w-8"></i>
                            <h4 class="font-bold text-lg mb-2"><?php echo esc_html($feature2_title); ?></h4>
                            <p class="text-sm text-zinc-500"><?php echo esc_html($feature2_text); ?></p>
                        </div>
                    </div>
                </div>
                <div class="relative flex items-center justify-center p-8">
                    <img src="<?php echo esc_url($about_logo); ?>"
                        alt="SUR-RON Logo"
                        class="w-full h-auto max-w-md hover:scale-105 transition-transform duration-500 relative z-10" />
                </div>
            </div>
        </div>
    </section>

    <!-- Services / Rental Section -->
    <section id="services" class="py-24 bg-zinc-900">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h3 class="text-yellow-400 font-bold tracking-widest mb-2">EXPERIENCE</h3>
                    <h2 class="text-4xl font-bold">レンタル & コース</h2>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <a href="<?php echo esc_url($rental_url); ?>"
                    class="group relative overflow-hidden h-80 cursor-pointer text-center block" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rental-bikes.jpg"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-blue-900/60 group-hover:bg-blue-900/40 transition-colors flex flex-col justify-center items-center text-center p-6">
                        <h3 class="text-3xl font-black italic mb-2 text-white">RENTAL BIKES</h3>
                        <p class="text-blue-300 font-bold tracking-wider mb-6">手ぶらで楽しむモトクロス</p>
                        <span class="bg-white text-black px-6 py-2 font-bold text-sm transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">レンタルバイク詳細へ</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($woods_url); ?>" target="_blank" class="group relative overflow-hidden h-80 cursor-pointer block">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/woods-motorland.jpg"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-black/60 group-hover:bg-black/40 transition-colors flex flex-col justify-center items-center text-center p-6">
                        <h3 class="text-3xl font-black italic mb-2 text-white">WOODS MOTORLAND</h3>
                        <p class="text-yellow-400 font-bold tracking-wider mb-6">自社オフロードコース</p>
                        <span class="bg-white text-black px-6 py-2 font-bold text-sm transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">コース詳細を見る</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- SNS Section -->
    <section id="sns" class="py-24 bg-zinc-950 border-b border-zinc-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-yellow-400 font-bold tracking-widest mb-2">SOCIAL</h3>
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

            <?php if ($facebook_embed): ?>
            <div class="mt-12 flex justify-center">
                <div class="w-full max-w-[500px] overflow-hidden bg-white rounded-lg">
                    <iframe
                        src="<?php echo esc_url($facebook_embed); ?>"
                        width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Shop Info & Access Section -->
    <section id="shopinfo" class="py-24 bg-zinc-950">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-5 gap-12">
                <div class="lg:col-span-2 space-y-8">
                    <div id="access">
                        <h3 class="text-yellow-400 font-bold tracking-widest mb-2">SHOP INFO & ACCESS</h3>
                        <h2 class="text-4xl font-bold mb-2">サーロンショップ<br /><?php echo esc_html($shop_name); ?></h2>
                        <p class="text-zinc-400 text-sm mb-6"><?php echo esc_html($representative); ?></p>
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
                                <p class="font-bold text-white">TEL / FAX</p>
                                <p class="text-zinc-400">TEL: <?php echo esc_html($tel); ?> <br /> FAX: <?php echo esc_html($fax); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <i data-lucide="clock" class="text-zinc-500 mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-bold text-white">OPENING HOURS</p>
                                <p class="text-zinc-400"><?php echo esc_html($hours); ?></p>
                                <p class="text-zinc-500 text-sm">定休日: <?php echo esc_html($holidays); ?></p>
                            </div>
                        </div>
                    </div>
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
                <h3 class="text-yellow-400 font-bold tracking-widest mb-2">CONTACT US</h3>
                <h2 class="text-4xl font-bold mb-4">お問い合わせ</h2>
                <p class="text-zinc-400">
                    在庫状況、試乗のご予約、メンテナンスのご相談など、<br class="hidden md:block" />お気軽にお問い合わせください。<br />
                    <span class="text-yellow-400 font-bold block mt-2 text-xl">TEL: <?php echo esc_html($tel); ?></span>
                </p>
            </div>

            <div class="mt-8">
                <?php echo do_shortcode($contact_shortcode); ?>
            </div>

            <div class="mt-12 text-center">
                <?php
                $reservation_query = new WP_Query(['post_type' => 'page', 'title' => '仮予約', 'posts_per_page' => 1]);
                $reservation_link = $reservation_query->have_posts() ? get_permalink($reservation_query->posts[0]->ID) : home_url('/reservation');
                wp_reset_postdata();
                ?>
                <a href="<?php echo $reservation_link; ?>"
                    class="inline-flex items-center justify-center bg-zinc-900 border-2 border-yellow-400 text-yellow-400 font-bold py-4 px-12 text-lg hover:bg-yellow-400 hover:text-black transition-all duration-300 rounded-sm group">
                    仮予約フォームへ <i data-lucide="chevron-right"
                        class="ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
                <p class="text-zinc-500 text-sm mt-4">※購入検討中の方はこちらから</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-12 border-t border-zinc-900">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-xl font-bold italic tracking-tighter text-white"><?php echo esc_html($shop_name); ?></div>
            <div class="flex gap-6">
                <a href="<?php echo esc_url($twitter_url); ?>" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors flex items-center gap-1"><i data-lucide="twitter"></i></a>
                <a href="<?php echo esc_url($facebook_url); ?>" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="facebook"></i></a>
                <a href="<?php echo esc_url($instagram_url); ?>" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="instagram"></i></a>
            </div>
            <p class="text-zinc-600 text-sm">&copy; <?php echo date('Y'); ?> Hirata Auto. All rights reserved.</p>
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

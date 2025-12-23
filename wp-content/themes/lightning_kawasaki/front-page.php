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

<body class="min-h-screen bg-zinc-950 text-white font-sans selection:bg-yellow-500 selection:text-black">

    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold tracking-tighter italic flex items-center gap-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/kawasaki-logo.jpg"
                    alt="Kawasaki Logo" class="h-10 w-auto rounded-full">
                ヒラタ自動車
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
                <?php
                $menu_items = [
                    'ABOUT' => 'ショップ紹介',
                    'RENTAL' => 'レンタル・コース',
                    'USED CARS' => '中古車',
                    'SHOP INFO' => '店舗情報',
                    'ACCESS' => 'アクセス',
                    'CONTACT' => 'お問い合わせ'
                ];
                foreach ($menu_items as $key => $label):
                    if ($key === 'USED CARS'): ?>
                        <a href="https://www.hirata-motors.com/cars.html" target="_blank"
                            class="hover:text-yellow-400 transition-colors relative group">
                            <?php echo $label; ?>
                            <span
                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full"></span>
                        </a>
                    <?php else:
                        $target = strtolower(str_replace(' ', '', $key));
                        if ($target == 'rental')
                            $target = 'services'; // rental is inside services
                        ?>
                        <button onclick="scrollToSection('<?php echo $target; ?>')"
                            class="hover:text-yellow-400 transition-colors relative group">
                            <?php echo $label; ?>
                            <span
                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full"></span>
                        </button>
                    <?php endif;
                endforeach; ?>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-white">
                <i data-lucide="menu" id="menu-icon"></i>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu"
            class="hidden md:hidden absolute top-full left-0 w-full bg-zinc-900 border-b border-zinc-800 py-4 flex flex-col items-center gap-4 animate-in slide-in-from-top-5">
            <?php foreach ($menu_items as $key => $label):
                if ($key === 'USED CARS'): ?>
                    <a href="https://www.hirata-motors.com/cars.html" target="_blank"
                        class="text-lg font-medium hover:text-yellow-400">
                        <?php echo $label; ?>
                    </a>
                <?php else:
                    $target = strtolower(str_replace(' ', '', $key));
                    if ($target == 'rental')
                        $target = 'services';
                    ?>
                    <button onclick="scrollToSection('<?php echo $target; ?>')"
                        class="text-lg font-medium hover:text-yellow-400">
                        <?php echo $label; ?>
                    </button>
                <?php endif;
            endforeach; ?>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-zinc-950 z-10"></div>

        <!-- Background Slideshow -->
        <!-- Background Image -->
        <div class="absolute inset-0 z-0" id="hero-image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-kawasaki-new.png"
                alt="Kawasaki Hero Background" class="absolute inset-0 w-full h-full object-cover" />
        </div>

        <div class="relative z-20 container mx-auto px-6 text-center md:text-left">
            <h2
                class="text-yellow-400 font-bold tracking-widest mb-4 animate-in slide-in-from-bottom-4 fade-in duration-700">
                AUTHORIZED KAWASAKI OFFROAD ENTRY SHOP</h2>
            <h1 class="text-3xl md:text-5xl lg:text-7xl font-black tracking-tighter mb-6 leading-tight">
                カワサキ <br />
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-white to-zinc-500 inline-block">オフロードエントリーショップ</span>
            </h1>
            <p class="text-zinc-400 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                奈良県吉野郡のカワサキオフロードエントリーショップ ヒラタ自動車。<br class="hidden md:block" />
                次世代の走りを楽しむための、最高のガレージへようこそ。
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

    <!-- 4 Points Section -->
    <section id="points" class="py-24 bg-zinc-900 border-b border-zinc-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-black mb-4">
                    オフロードエントリーショップ <br class="md:hidden" />
                    <span class="text-green-500 text-5xl md:text-6xl italic">4</span>つのPoint
                </h2>
                <div class="w-24 h-1 bg-green-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Point 1 -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-shrink-0">
                        <div
                            class="text-green-500 font-bold italic text-xl border-b-2 border-green-500 inline-block pb-1 mb-2">
                            Point 1</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-3 text-white">オフロードの魅力発信</h3>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            オフロードといえば、未舗装のコースを駆け抜け土や泥を巻き上げ高いジャンプを繰り広げるモトクロスから、自然の地形を生かし比較的長いコースを耐久にて走破するエンデューロなど様々なコンテンツがあります。オフロードエントリーショップでは、その豊富な知識と経験により幅広いお客様へ“非日常を味わえる”オフロードの魅力を発信していきます。
                        </p>
                    </div>
                </div>

                <!-- Point 2 -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-shrink-0">
                        <div
                            class="text-green-500 font-bold italic text-xl border-b-2 border-green-500 inline-block pb-1 mb-2">
                            Point 2</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-3 text-white">これからオフロードをはじめる<br>お客様のご相談窓口</h3>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            「オフロードには興味はある、でもどこで走れるの？いきなりコースに行くのは不安。どうやってバイクを運ぶの？走行前後のメンテナンスや保管はどうしたらいいの？」デビューに疑問や不安を抱えている方。まずは、カワサキのオフロードエントリーショップへお気軽にご相談ください。スタッフが一つひとつの疑問にお答えいたします。
                        </p>
                    </div>
                </div>

                <!-- Point 3 -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-shrink-0">
                        <div
                            class="text-green-500 font-bold italic text-xl border-b-2 border-green-500 inline-block pb-1 mb-2">
                            Point 3</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-3 text-white">ステップアップしたい<br>お客様へのアドバイスやサポート</h3>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            「モトクロスやエンデューロには慣れてきたけど、タイムを上げるにはどうしたらよいか？自分好みのカスタムをしたい！」など、ご要望をお聞きし最適なご提案やアドバイスをさせていただきます。
                        </p>
                    </div>
                </div>

                <!-- Point 4 -->
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-shrink-0">
                        <div
                            class="text-green-500 font-bold italic text-xl border-b-2 border-green-500 inline-block pb-1 mb-2">
                            Point 4</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-3 text-white">オフロードモデルを使って楽しめる<br>イベントの開催や参加可能レースのご案内</h3>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            オフロードエントリーショップ主催のエントリー者向けスクールや走行会の実施、「Kawasaki Team Green
                            Program」などを用いて各地域で開催されるレースへのエントリーをサポートいたします。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        カワサキショップヒラタ自動車は奈良県吉野郡下市町にあるカワサキオフロードエントリーショップで
                        オフロードコース「ウッズモータースポーツランド下市」を自社で保有している珍しいディーラーです。<br><br>
                        カワサキのモーターサイクルを通じて、走る楽しさと感動をお届けします。
                        初心者からベテランまで、あらゆるライダーの期待に応えるサービスとサポートを提供いたします。<br><br>
                        ウッズ下市には本格MX＆XCコースも備えておりますのでお気軽に試乗もしていただけます。
                        レースイベント＆試乗会も開催いたしますので、皆様と楽しみながら成長していきたいと思っております。
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-zinc-900 p-6 border-l-4 border-yellow-400">
                            <i data-lucide="mountain-snow" class="text-zinc-500 mb-4 h-8 w-8"></i>
                            <h4 class="font-bold text-lg mb-2">自社コース保有</h4>
                            <p class="text-sm text-zinc-500">ウッズモータースポーツランド下市で、いつでも本格的な走行が可能。</p>
                        </div>
                        <div class="bg-zinc-900 p-6 border-l-4 border-blue-500">
                            <i data-lucide="zap" class="text-zinc-500 mb-4 h-8 w-8"></i>
                            <h4 class="font-bold text-lg mb-2">KAWASAKIオフロードエントリーショップ</h4>
                            <p class="text-sm text-zinc-500">販売からメンテナンス、カスタムまでトータルサポート。</p>
                        </div>
                    </div>
                </div>
                <div class="relative flex items-center justify-center p-8">
                    <!-- Note: Ideally this logo should be replaced with Kawasaki logo -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-kawasaki-new.png"
                        alt="KAWASAKI Logo"
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
                <!-- Rental Bikes -->
                <a href="https://www.hirata-motors.com/sale.html"
                    class="group relative overflow-hidden h-80 cursor-pointer text-center block" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rental-bikes.jpg"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <div
                        class="absolute inset-0 bg-blue-900/60 group-hover:bg-blue-900/40 transition-colors flex flex-col justify-center items-center text-center p-6">
                        <h3 class="text-3xl font-black italic mb-2 text-white">RENTAL BIKES</h3>
                        <p class="text-blue-300 font-bold tracking-wider mb-6">手ぶらで楽しむモトクロス</p>
                        <span
                            class="bg-white text-black px-6 py-2 font-bold text-sm transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">レンタルバイク詳細へ</span>
                    </div>
                </a>
                <!-- Woods Motorland -->
                <a href="https://hirata-auto.com/woods/" target="_blank"
                    class="group relative overflow-hidden h-80 cursor-pointer block">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/woods-motorland.jpg"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <div
                        class="absolute inset-0 bg-black/60 group-hover:bg-black/40 transition-colors flex flex-col justify-center items-center text-center p-6">
                        <h3 class="text-3xl font-black italic mb-2 text-white">WOODS MOTORLAND</h3>
                        <p class="text-yellow-400 font-bold tracking-wider mb-6">自社オフロードコース</p>
                        <span
                            class="bg-white text-black px-6 py-2 font-bold text-sm transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">コース詳細を見る</span>
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
                <!-- X (Twitter) -->
                <a href="https://x.com/Woodshirappy" target="_blank" class="group block">
                    <div
                        class="bg-zinc-900 p-8 rounded-sm border border-zinc-800 hover:border-zinc-600 transition-all hover:bg-zinc-800 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 bg-black rounded-full flex items-center justify-center border border-zinc-700 group-hover:border-white transition-colors">
                                <i data-lucide="twitter" class="text-white w-8 h-8"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-1">X (Twitter)</h4>
                                <p class="text-zinc-500 group-hover:text-zinc-300 transition-colors">@Woodshirappy</p>
                            </div>
                        </div>
                        <i data-lucide="external-link"
                            class="text-zinc-600 group-hover:text-white transition-colors"></i>
                    </div>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/hiratamotors/" target="_blank" class="group block">
                    <div
                        class="bg-zinc-900 p-8 rounded-sm border border-zinc-800 hover:border-zinc-600 transition-all hover:bg-zinc-800 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 bg-blue-900 rounded-full flex items-center justify-center border border-zinc-700 group-hover:border-white transition-colors">
                                <i data-lucide="facebook" class="text-white w-8 h-8"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-1">Facebook</h4>
                                <p class="text-zinc-500 group-hover:text-zinc-300 transition-colors">ヒラタ自動車</p>
                            </div>
                        </div>
                        <i data-lucide="external-link"
                            class="text-zinc-600 group-hover:text-white transition-colors"></i>
                    </div>
                </a>
            </div>

            <!-- Facebook Timeline -->
            <div class="mt-12 flex justify-center">
                <div class="w-full max-w-[500px] overflow-hidden bg-white rounded-lg">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhiratamotors%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Info & Access Section -->
    <section id="shopinfo" class="py-24 bg-zinc-950">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-5 gap-12">
                <div class="lg:col-span-2 space-y-8">
                    <div id="access">
                        <h3 class="text-yellow-400 font-bold tracking-widest mb-2">SHOP INFO & ACCESS</h3>
                        <h2 class="text-4xl font-bold mb-2">カワサキショップ<br />ヒラタ自動車</h2>
                        <p class="text-zinc-400 text-sm mb-6">代表 平田 武博</p>
                    </div>
                    <!-- Details -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <i data-lucide="map-pin" class="text-zinc-500 mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-bold text-white">ADDRESS</p>
                                <p class="text-zinc-400">〒638-0045<br />奈良県吉野郡下市町新住239</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <i data-lucide="phone" class="text-zinc-500 mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-bold text-white">TEL / FAX</p>
                                <p class="text-zinc-400">TEL: 0747-52-3744 <br /> FAX: 0747-52-1813</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <i data-lucide="clock" class="text-zinc-500 mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-bold text-white">OPENING HOURS</p>
                                <p class="text-zinc-400">9:00 - 18:00</p>
                                <p class="text-zinc-500 text-sm">定休日: 第２･４土曜及び日曜日・祝日、年末年始、お盆</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <div
                        class="w-full h-full min-h-[400px] bg-zinc-900 rounded-sm relative flex items-center justify-center overflow-hidden group">
                        <!-- Google Map -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3290.793838848486!2d135.7955562!3d34.4093889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6006c8b9b9b9b9b9%3A0x1234567890abcdef!2z44CSNjM4LTAwNDUg5aWI6Imv55yM5ZCJ6YeO6YOh5LiL5biC55S65paw5L2PMjM5!5e0!3m2!1sja!2sjp!4v1600000000000!5m2!1sja!2sjp"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            class="absolute inset-0 grayscale contrast-125 opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-500"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-zinc-900">
        <div class="container mx-auto px-6 max-w-4xl max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h3 class="text-yellow-400 font-bold tracking-widest mb-2">CONTACT US</h3>
                <h2 class="text-4xl font-bold mb-4">お問い合わせ</h2>
                <p class="text-zinc-400">
                    在庫状況、試乗のご予約、メンテナンスのご相談など、<br class="hidden md:block" />お気軽にお問い合わせください。<br />
                    <span class="text-yellow-400 font-bold block mt-2 text-xl">TEL: 0747-52-3744</span>
                </p>
            </div>

            <div class="mt-8">
                <!-- Using same contact form for now, user can update ID if needed -->
                <?php echo do_shortcode('[contact-form-7 id="f245f89" title="カワサキ問い合わせ"]'); ?>

            </div>

            <div class="mt-12 text-center">
                <?php
                $reservation_page = get_page_by_title('仮予約');
                $reservation_link = $reservation_page ? get_permalink($reservation_page->ID) : home_url('/reservation');
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
            <div class="text-xl font-bold italic tracking-tighter text-white">ヒラタ自動車</div>
            <div class="flex gap-6">
                <!-- X is usually Twitter icon in Lucide still, or generic -->
                <a href="https://x.com/Woodshirappy" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors flex items-center gap-1"><i
                        data-lucide="twitter"></i></a>
                <a href="https://www.facebook.com/hiratamotors/" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="facebook"></i></a>
                <a href="https://www.instagram.com/husqvarna_hirappy/" target="_blank"
                    class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="instagram"></i></a>
            </div>
            <p class="text-zinc-600 text-sm">&copy; <?php echo date('Y'); ?> Hirata Auto. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Vanilla JS Implementation of React logic

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        let isMenuOpen = false;

        // React's setIsMobileMenuOpen(!isMobileMenuOpen) equivalent
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

        // Scroll Detection
        // React's useEffect with window.scrollY > 50 equivalent
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

        // Smooth Scroll
        function scrollToSection(id) {
            // Close menu if open
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


    </script>
    <?php wp_footer(); ?>
</body>

</html>
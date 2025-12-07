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

        /* Additional custom scrollbar styling if desired */
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
    </style>
</head>

<body class="min-h-screen bg-zinc-950 text-white font-sans selection:bg-yellow-500 selection:text-black">

    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold tracking-tighter italic flex items-center gap-2">
                <span class="text-yellow-400">⚡</span>
                HIRATA AUTO
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
                <?php
                $menu_items = ['ABOUT', 'MODELS', 'SERVICES', 'ACCESS', 'CONTACT'];
                foreach ($menu_items as $item): ?>
                    <button onclick="scrollToSection('<?php echo strtolower($item); ?>')"
                        class="hover:text-yellow-400 transition-colors relative group">
                        <?php echo $item; ?>
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full"></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-white">
                <i data-lucide="menu" id="menu-icon"></i>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu"
            class="hidden md:hidden absolute top-full left-0 w-full bg-zinc-900 border-b border-zinc-800 py-4 flex flex-col items-center gap-4 animate-in slide-in-from-top-5">
            <?php foreach ($menu_items as $item): ?>
                <button onclick="scrollToSection('<?php echo strtolower($item); ?>')"
                    class="text-lg font-medium hover:text-yellow-400">
                    <?php echo $item; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-zinc-950 z-10"></div>

        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?q=80&w=2070&auto=format&fit=crop"
                alt="Dirt Bike"
                class="w-full h-full object-cover opacity-60 grayscale hover:grayscale-0 transition-all duration-[2000ms]" />
        </div>

        <div class="relative z-20 container mx-auto px-6 text-center md:text-left">
            <h2
                class="text-yellow-400 font-bold tracking-widest mb-4 animate-in slide-in-from-bottom-4 fade-in duration-700">
                AUTHORIZED SUR-RON DEALER</h2>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter mb-6 leading-tight">
                UNLEASH <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-zinc-500">ELECTRIC
                    POWER.</span>
            </h1>
            <p class="text-zinc-400 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                奈良県吉野郡のサーロン正規取扱店 ヒラタ自動車。<br class="hidden md:block" />
                次世代の走りを楽しむための、最高のガレージへようこそ。
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <button onclick="scrollToSection('models')"
                    class="bg-yellow-400 text-black px-8 py-4 font-bold hover:bg-yellow-300 transition-colors flex items-center justify-center gap-2 clip-path-slant">
                    モデルを見る <i data-lucide="chevron-right"></i>
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
                        <h2 class="text-4xl font-bold mb-6">地域密着の<br />カー＆バイクライフサポート</h2>
                    </div>
                    <p class="text-zinc-400 leading-relaxed">
                        当店はSUR-RON（サーロン）の正規販売店として、電動バイクの販売からメンテナンス、カスタムまで幅広く対応しております。
                        静かでパワフル、そして環境に優しい次世代のモトクロス体験を、奈良の豊かな自然の中でお楽しみください。
                        もちろん、一般自動車の整備・販売も行っています。
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-zinc-900 p-6 border-l-4 border-yellow-400">
                            <i data-lucide="wrench" class="text-zinc-500 mb-4 h-8 w-8"></i>
                            <h4 class="font-bold text-lg mb-2">確かな整備力</h4>
                            <p class="text-sm text-zinc-500">長年の経験に基づいた、安心・安全なメンテナンス。</p>
                        </div>
                        <div class="bg-zinc-900 p-6 border-l-4 border-blue-500">
                            <i data-lucide="map-pin" class="text-zinc-500 mb-4 h-8 w-8"></i>
                            <h4 class="font-bold text-lg mb-2">最適な環境</h4>
                            <p class="text-sm text-zinc-500">試乗や走行会も楽しめる周辺環境とネットワーク。</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-4 border-2 border-yellow-400/20 translate-x-4 translate-y-4"></div>
                    <img src="https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?q=80&w=1780&auto=format&fit=crop"
                        alt="Mechanic working"
                        class="w-full h-auto grayscale hover:grayscale-0 transition-all duration-500 relative z-10 shadow-2xl" />
                </div>
            </div>
        </div>
    </section>

    <!-- Sections placeholder for brevity in this task, implementing key structure -->
    <!-- Models / Services -->
    <section id="models" class="py-24 bg-zinc-900">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h3 class="text-yellow-400 font-bold tracking-widest mb-2">EXPERIENCE</h3>
                    <h2 class="text-4xl font-bold">もっとバイクを楽しむ</h2>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Woods Motorland -->
                <div class="group relative overflow-hidden h-80 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2070&auto=format&fit=crop"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <div
                        class="absolute inset-0 bg-black/60 group-hover:bg-black/40 transition-colors flex flex-col justify-center items-center text-center p-6">
                        <h3 class="text-3xl font-black italic mb-2 text-white">WOODS MOTORLAND</h3>
                        <p class="text-yellow-400 font-bold tracking-wider mb-6">SHIMOICHI</p>
                        <span
                            class="bg-white text-black px-6 py-2 font-bold text-sm transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">コース詳細を見る</span>
                    </div>
                </div>
                <!-- Rental Bikes -->
                <div class="group relative overflow-hidden h-80 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1621360841011-cb6ae76b1f23?q=80&w=2070&auto=format&fit=crop"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <div
                        class="absolute inset-0 bg-blue-900/60 group-hover:bg-blue-900/40 transition-colors flex flex-col justify-center items-center text-center p-6">
                        <h3 class="text-3xl font-black italic mb-2 text-white">RENTAL BIKES</h3>
                        <p class="text-blue-300 font-bold tracking-wider mb-6">手ぶらで楽しむモトクロス</p>
                        <span
                            class="bg-white text-black px-6 py-2 font-bold text-sm transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">平日限定・レンタル詳細</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services / Placeholder to keep scrolling working -->
    <div id="services"></div>

    <!-- Access -->
    <section id="access" class="py-24 bg-zinc-950">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-5 gap-12">
                <div class="lg:col-span-2 space-y-8">
                    <div>
                        <h3 class="text-yellow-400 font-bold tracking-widest mb-2">SHOP INFO</h3>
                        <h2 class="text-4xl font-bold mb-6">サーロンショップ<br />ヒラタ自動車</h2>
                    </div>
                    <!-- Details -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <i data-lucide="map-pin" class="text-zinc-500 mt-1"></i>
                            <div>
                                <p class="font-bold text-white">ADDRESS</p>
                                <p class="text-zinc-400">〒638-0000<br />奈良県吉野郡下市町... (住所)</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <i data-lucide="phone" class="text-zinc-500 mt-1"></i>
                            <div>
                                <p class="font-bold text-white">TEL / FAX</p>
                                <p class="text-zinc-400">0747-xx-xxxx</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <div
                        class="w-full h-full min-h-[400px] bg-zinc-900 rounded-sm relative flex items-center justify-center">
                        <span class="text-zinc-600 font-bold flex flex-col items-center">
                            <i data-lucide="map-pin" class="mb-2 h-12 w-12"></i>
                            Google Map Loaded Here
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-24 bg-zinc-900">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h3 class="text-yellow-400 font-bold tracking-widest mb-2">CONTACT US</h3>
            <h2 class="text-4xl font-bold mb-4">お問い合わせ</h2>
            <form class="space-y-6 text-left mt-8">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-zinc-400">お名前</label>
                        <input type="text"
                            class="w-full bg-zinc-950 border border-zinc-800 p-4 text-white focus:border-yellow-400 focus:outline-none"
                            placeholder="山田 太郎" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-zinc-400">メールアドレス</label>
                        <input type="email"
                            class="w-full bg-zinc-950 border border-zinc-800 p-4 text-white focus:border-yellow-400 focus:outline-none"
                            placeholder="example@email.com" />
                    </div>
                </div>
                <button type="button"
                    class="w-full bg-yellow-400 text-black font-black tracking-wider py-5 hover:bg-yellow-300 transition-colors uppercase">送信する</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-12 border-t border-zinc-900">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-xl font-bold italic tracking-tighter text-white">HIRATA AUTO</div>
            <div class="flex gap-6">
                <a href="#" class="text-zinc-500 hover:text-white"><i data-lucide="twitter"></i></a>
                <a href="#" class="text-zinc-500 hover:text-white"><i data-lucide="instagram"></i></a>
                <a href="#" class="text-zinc-500 hover:text-white"><i data-lucide="facebook"></i></a>
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

        mobileMenuBtn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            mobileMenu.classList.toggle('hidden');

            // Update Icon
            if (isMenuOpen) {
                menuIcon.setAttribute('data-lucide', 'x');
            } else {
                menuIcon.setAttribute('data-lucide', 'menu');
            }
            lucide.createIcons();
        });

        // Scroll Detection
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
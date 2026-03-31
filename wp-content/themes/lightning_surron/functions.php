<?php
add_action('wp_enqueue_scripts', 'lightning_surron_scripts');
function lightning_surron_scripts()
{
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false);
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest', array(), null, false);
    wp_add_inline_script('lucide-icons', 'window.addEventListener("DOMContentLoaded", () => lucide.createIcons());');
    wp_add_inline_script('tailwindcss', "
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: { sans: ['Inter', 'sans-serif'] },
            colors: {
              zinc: { 950: '#09090b', 900: '#18181b', 800: '#27272a', 500: '#71717a', 400: '#a1a1aa', 300: '#d4d4d8' }
            }
          }
        }
      }
    ");
}

// ==============================================
// カスタマイザー設定
// ==============================================
add_action('customize_register', 'surron_customize_register');
function surron_customize_register($wp_customize)
{
    // --- 基本情報セクション ---
    $wp_customize->add_section('surron_basic', [
        'title' => 'サイト基本情報',
        'priority' => 30,
    ]);

    $basic_fields = [
        'shop_name' => ['ショップ名', 'ヒラタ自動車'],
        'shop_subtitle' => ['サブタイトル', 'AUTHORIZED SUR-RON DEALER'],
        'hero_heading' => ['ヒーロー見出し', "サーロン\n正規ディーラー"],
        'hero_description' => ['ヒーロー説明文', "奈良県吉野郡のサーロン正規取扱店 ヒラタ自動車。\n次世代の走りを楽しむための、最高のガレージへようこそ。"],
        'representative' => ['代表者名', '代表 平田 武博'],
    ];
    foreach ($basic_fields as $id => $info) {
        $wp_customize->add_setting("surron_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("surron_{$id}", [
            'label' => $info[0],
            'section' => 'surron_basic',
            'type' => strpos($info[1], "\n") !== false ? 'textarea' : 'text',
        ]);
    }

    // --- 店舗情報セクション ---
    $wp_customize->add_section('surron_shop_info', [
        'title' => '店舗情報',
        'priority' => 35,
    ]);

    $shop_fields = [
        'postal_code' => ['郵便番号', '〒638-0045'],
        'address' => ['住所', '奈良県吉野郡下市町新住239'],
        'tel' => ['電話番号', '0747-52-3744'],
        'fax' => ['FAX番号', '0747-52-1813'],
        'hours' => ['営業時間', '9:00 - 18:00'],
        'holidays' => ['定休日', '第２･４土曜及び日曜日・祝日、年末年始、お盆'],
        'google_map_url' => ['Google Map埋め込みURL', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3290.793838848486!2d135.7955562!3d34.4093889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6006c8b9b9b9b9b9%3A0x1234567890abcdef!2z44CSNjM4LTAwNDUg5aWI6Imv55yM5ZCJ6YeO6YOh5LiL5biC55S65paw5L2PMjM5!5e0!3m2!1sja!2sjp!4v1600000000000!5m2!1sja!2sjp'],
    ];
    foreach ($shop_fields as $id => $info) {
        $wp_customize->add_setting("surron_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("surron_{$id}", [
            'label' => $info[0],
            'section' => 'surron_shop_info',
            'type' => $id === 'google_map_url' ? 'textarea' : 'text',
        ]);
    }

    // --- ABOUT セクション ---
    $wp_customize->add_section('surron_about', [
        'title' => 'ABOUTセクション',
        'priority' => 40,
    ]);

    $wp_customize->add_setting('surron_about_text', [
        'default' => "サーロンショップヒラタ自動車は奈良県吉野郡下市町にあるサーロン正規ディーラーで\nオフロードコース「ウッズモータースポーツランド下市」を自社で保有している珍しいディーラーです。\n\nSUR-RON社は電動モトクロッサーに特化して研究～開発～生産～実走評価～改良を繰り返しながら取り組んできた\nまさに異色のエキスパート集団です。\n\nウッズ下市には本格MX＆XCコースも備えておりますのでお気軽に試乗もしていただけます。\nレースイベント＆試乗会も開催いたしますので、皆様と楽しみながら成長していきたいと思っております。",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('surron_about_text', [
        'label' => 'ABOUT説明文',
        'section' => 'surron_about',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('surron_feature1_title', ['default' => '自社コース保有', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('surron_feature1_title', ['label' => '特徴1 タイトル', 'section' => 'surron_about', 'type' => 'text']);
    $wp_customize->add_setting('surron_feature1_text', ['default' => 'ウッズモータースポーツランド下市で、いつでも本格的な走行が可能。', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('surron_feature1_text', ['label' => '特徴1 説明', 'section' => 'surron_about', 'type' => 'text']);
    $wp_customize->add_setting('surron_feature2_title', ['default' => 'SUR-RON正規店', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('surron_feature2_title', ['label' => '特徴2 タイトル', 'section' => 'surron_about', 'type' => 'text']);
    $wp_customize->add_setting('surron_feature2_text', ['default' => '販売からメンテナンス、カスタムまでトータルサポート。', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('surron_feature2_text', ['label' => '特徴2 説明', 'section' => 'surron_about', 'type' => 'text']);

    // --- SNSリンク セクション ---
    $wp_customize->add_section('surron_sns', [
        'title' => 'SNSリンク',
        'priority' => 45,
    ]);

    $sns_fields = [
        'twitter_url' => ['X (Twitter) URL', 'https://x.com/Woodshirappy'],
        'twitter_id' => ['X (Twitter) ID表示', '@Woodshirappy'],
        'facebook_url' => ['Facebook URL', 'https://www.facebook.com/hiratamotors/'],
        'facebook_name' => ['Facebook 表示名', 'ヒラタ自動車'],
        'instagram_url' => ['Instagram URL', 'https://www.instagram.com/husqvarna_hirappy/'],
        'facebook_embed' => ['Facebook埋め込みURL', 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhiratamotors%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId'],
    ];
    foreach ($sns_fields as $id => $info) {
        $wp_customize->add_setting("surron_{$id}", ['default' => $info[1], 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("surron_{$id}", [
            'label' => $info[0],
            'section' => 'surron_sns',
            'type' => ($id === 'facebook_embed') ? 'textarea' : 'text',
        ]);
    }
    // ID/名前はURL sanitizeではなくtext
    foreach (['twitter_id', 'facebook_name'] as $id) {
        $wp_customize->get_setting("surron_{$id}")->sanitize_callback = 'sanitize_text_field';
    }

    // --- リンク先 セクション ---
    $wp_customize->add_section('surron_links', [
        'title' => '外部リンク',
        'priority' => 50,
    ]);

    $link_fields = [
        'used_cars_url' => ['中古車ページURL', 'https://www.hirata-motors.com/cars.html'],
        'rental_url' => ['レンタルバイクURL', 'https://www.hirata-motors.com/sale.html'],
        'woods_url' => ['ウッズモーターランドURL', 'https://hirata-auto.com/woods/'],
        'contact_form_shortcode' => ['問い合わせフォーム ショートコード', '[contact-form-7 id="f441385" title="サーロン問い合わせ"]'],
    ];
    foreach ($link_fields as $id => $info) {
        $sanitize = ($id === 'contact_form_shortcode') ? 'sanitize_text_field' : 'esc_url_raw';
        $wp_customize->add_setting("surron_{$id}", ['default' => $info[1], 'sanitize_callback' => $sanitize]);
        $wp_customize->add_control("surron_{$id}", [
            'label' => $info[0],
            'section' => 'surron_links',
            'type' => 'text',
        ]);
    }

    // --- ヒーロー画像 ---
    $wp_customize->add_section('surron_hero_images', [
        'title' => 'ヒーロー画像',
        'priority' => 32,
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("surron_hero_image_{$i}", ['default' => get_stylesheet_directory_uri() . "/assets/images/hero-{$i}.jpg", 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "surron_hero_image_{$i}", [
            'label' => "ヒーロー画像 {$i}",
            'section' => 'surron_hero_images',
        ]));
    }

    // --- ABOUTロゴ画像 ---
    $wp_customize->add_setting('surron_about_logo', ['default' => get_stylesheet_directory_uri() . '/assets/images/about-logo.png', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'surron_about_logo', [
        'label' => 'ABOUTセクション ロゴ画像',
        'section' => 'surron_about',
    ]));
}

// カスタマイザー値取得ヘルパー
function surron_get($key, $default = '')
{
    return get_theme_mod("surron_{$key}", $default);
}

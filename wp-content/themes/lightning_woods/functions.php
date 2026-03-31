<?php
add_action('wp_enqueue_scripts', 'lightning_woods_scripts');
function lightning_woods_scripts()
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
              zinc: { 950: '#09090b', 900: '#18181b', 800: '#27272a', 500: '#71717a', 400: '#a1a1aa', 300: '#d4d4d8' },
              forest: { 400: '#4ade80', 500: '#22c55e', 600: '#16a34a', 700: '#15803d' }
            }
          }
        }
      }
    ");
}

// ==============================================
// カスタマイザー設定
// ==============================================
add_action('customize_register', 'woods_customize_register');
function woods_customize_register($wp_customize)
{
    // --- 基本情報セクション ---
    $wp_customize->add_section('woods_basic', [
        'title' => 'サイト基本情報',
        'priority' => 30,
    ]);

    $basic_fields = [
        'site_name' => ['サイト名', 'WOODS MOTORSPORTS LAND'],
        'site_subtitle' => ['サブタイトル', '下市'],
        'hero_heading' => ['ヒーロー見出し', "大自然を\n駆け抜けろ"],
        'hero_description' => ['ヒーロー説明文', "奈良県吉野郡の本格オフロードコース。\nMX・エンデューロ・トレイルまで、全てのライダーが楽しめるフィールド。"],
    ];
    foreach ($basic_fields as $id => $info) {
        $wp_customize->add_setting("woods_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("woods_{$id}", [
            'label' => $info[0],
            'section' => 'woods_basic',
            'type' => strpos($info[1], "\n") !== false ? 'textarea' : 'text',
        ]);
    }

    // --- コース情報セクション ---
    $wp_customize->add_section('woods_course', [
        'title' => 'コース情報',
        'priority' => 35,
    ]);

    $wp_customize->add_setting('woods_course_description', [
        'default' => "ウッズモータースポーツランド下市は、奈良県吉野郡の山間に広がる本格オフロードコースです。\n\nモトクロス（MX）コースとクロスカントリー（XC）コースを完備。\n初心者から上級者まで、レベルに合わせた走行が楽しめます。\n\nSUR-RON電動バイクのレンタルも常時ご用意しておりますので、手ぶらでの体験走行も可能です。",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('woods_course_description', [
        'label' => 'コース紹介文',
        'section' => 'woods_course',
        'type' => 'textarea',
    ]);

    $course_features = [
        'feature1_title' => ['コース特徴1 タイトル', 'MXコース'],
        'feature1_text' => ['コース特徴1 説明', '本格モトクロスコース完備。ジャンプ・ウォッシュボードなど多彩なセクション。'],
        'feature2_title' => ['コース特徴2 タイトル', 'XCコース'],
        'feature2_text' => ['コース特徴2 説明', '山林を活かしたクロスカントリーコース。自然の地形を楽しむトレイルライド。'],
        'feature3_title' => ['コース特徴3 タイトル', 'レンタルバイク'],
        'feature3_text' => ['コース特徴3 説明', 'SUR-RON電動バイクをレンタル可能。手ぶらで気軽にオフロード体験。'],
    ];
    foreach ($course_features as $id => $info) {
        $wp_customize->add_setting("woods_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("woods_{$id}", [
            'label' => $info[0],
            'section' => 'woods_course',
            'type' => 'text',
        ]);
    }

    // --- 料金セクション ---
    $wp_customize->add_section('woods_pricing', [
        'title' => '料金情報',
        'priority' => 38,
    ]);

    $pricing_fields = [
        'price_day' => ['1日走行料金', '3,000円'],
        'price_half' => ['半日走行料金', '2,000円'],
        'price_rental' => ['レンタルバイク料金', '5,000円〜'],
        'price_note' => ['料金備考', '※料金は変更になる場合があります。詳しくはお問い合わせください。'],
    ];
    foreach ($pricing_fields as $id => $info) {
        $wp_customize->add_setting("woods_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("woods_{$id}", [
            'label' => $info[0],
            'section' => 'woods_pricing',
            'type' => 'text',
        ]);
    }

    // --- 施設情報セクション ---
    $wp_customize->add_section('woods_facility', [
        'title' => '施設情報',
        'priority' => 40,
    ]);

    $facility_fields = [
        'postal_code' => ['郵便番号', '〒638-0045'],
        'address' => ['住所', '奈良県吉野郡下市町新住239'],
        'tel' => ['電話番号', '0747-52-3744'],
        'hours' => ['営業時間', '9:00 - 17:00'],
        'holidays' => ['定休日', '不定休（天候により閉鎖の場合あり）'],
        'google_map_url' => ['Google Map埋め込みURL', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3290.793838848486!2d135.7955562!3d34.4093889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6006c8b9b9b9b9b9%3A0x1234567890abcdef!2z44CSNjM4LTAwNDUg5aWI6Imv55yM5ZCJ6YeO6YOh5LiL5biC55S65paw5L2PMjM5!5e0!3m2!1sja!2sjp!4v1600000000000!5m2!1sja!2sjp'],
    ];
    foreach ($facility_fields as $id => $info) {
        $wp_customize->add_setting("woods_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("woods_{$id}", [
            'label' => $info[0],
            'section' => 'woods_facility',
            'type' => $id === 'google_map_url' ? 'textarea' : 'text',
        ]);
    }

    // --- SNSリンク セクション ---
    $wp_customize->add_section('woods_sns', [
        'title' => 'SNSリンク',
        'priority' => 45,
    ]);

    $sns_fields = [
        'twitter_url' => ['X (Twitter) URL', 'https://x.com/Woodshirappy'],
        'twitter_id' => ['X (Twitter) ID表示', '@Woodshirappy'],
        'facebook_url' => ['Facebook URL', 'https://www.facebook.com/hiratamotors/'],
        'facebook_name' => ['Facebook 表示名', 'ウッズモータースポーツランド下市'],
        'instagram_url' => ['Instagram URL', 'https://www.instagram.com/husqvarna_hirappy/'],
    ];
    foreach ($sns_fields as $id => $info) {
        $wp_customize->add_setting("woods_{$id}", ['default' => $info[1], 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("woods_{$id}", [
            'label' => $info[0],
            'section' => 'woods_sns',
            'type' => 'text',
        ]);
    }
    foreach (['twitter_id', 'facebook_name'] as $id) {
        $wp_customize->get_setting("woods_{$id}")->sanitize_callback = 'sanitize_text_field';
    }

    // --- 外部リンク セクション ---
    $wp_customize->add_section('woods_links', [
        'title' => '外部リンク',
        'priority' => 50,
    ]);

    $link_fields = [
        'surron_shop_url' => ['サーロンショップURL', 'https://hirata-auto.com/'],
        'contact_form_shortcode' => ['問い合わせフォーム ショートコード', '[contact-form-7 id="xxx" title="ウッズ問い合わせ"]'],
    ];
    foreach ($link_fields as $id => $info) {
        $sanitize = ($id === 'contact_form_shortcode') ? 'sanitize_text_field' : 'esc_url_raw';
        $wp_customize->add_setting("woods_{$id}", ['default' => $info[1], 'sanitize_callback' => $sanitize]);
        $wp_customize->add_control("woods_{$id}", [
            'label' => $info[0],
            'section' => 'woods_links',
            'type' => 'text',
        ]);
    }

    // --- ヒーロー画像 ---
    $wp_customize->add_section('woods_hero_images', [
        'title' => 'ヒーロー画像',
        'priority' => 32,
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("woods_hero_image_{$i}", ['default' => get_stylesheet_directory_uri() . "/assets/images/hero-{$i}.jpg", 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "woods_hero_image_{$i}", [
            'label' => "ヒーロー画像 {$i}",
            'section' => 'woods_hero_images',
        ]));
    }

    // --- コースロゴ画像 ---
    $wp_customize->add_setting('woods_course_logo', ['default' => get_stylesheet_directory_uri() . '/assets/images/woods-logo.png', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'woods_course_logo', [
        'label' => 'コースロゴ画像',
        'section' => 'woods_basic',
    ]));
}

// カスタマイザー値取得ヘルパー
function woods_get($key, $default = '')
{
    return get_theme_mod("woods_{$key}", $default);
}

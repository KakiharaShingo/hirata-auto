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
add_action('customize_register', 'kawasaki_customize_register');
function kawasaki_customize_register($wp_customize)
{
    // --- 基本情報セクション ---
    $wp_customize->add_section('kawasaki_basic', [
        'title' => 'サイト基本情報',
        'priority' => 30,
    ]);

    $basic_fields = [
        'shop_name' => ['ショップ名', 'ヒラタ自動車'],
        'shop_subtitle' => ['サブタイトル', 'AUTHORIZED KAWASAKI OFFROAD ENTRY SHOP'],
        'hero_heading' => ['ヒーロー見出し', "カワサキ\nオフロードエントリーショップ"],
        'hero_description' => ['ヒーロー説明文', "奈良県吉野郡のカワサキオフロードエントリーショップ ヒラタ自動車。\n次世代の走りを楽しむための、最高のガレージへようこそ。"],
        'representative' => ['代表者名', '代表 平田 武博'],
    ];
    foreach ($basic_fields as $id => $info) {
        $wp_customize->add_setting("kawasaki_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("kawasaki_{$id}", [
            'label' => $info[0],
            'section' => 'kawasaki_basic',
            'type' => strpos($info[1], "\n") !== false ? 'textarea' : 'text',
        ]);
    }

    // --- ヒーロー画像 ---
    $wp_customize->add_section('kawasaki_hero_images', [
        'title' => 'ヒーロー画像',
        'priority' => 32,
    ]);

    $wp_customize->add_setting('kawasaki_hero_image', ['default' => get_stylesheet_directory_uri() . '/assets/images/hero-kawasaki-new.png', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kawasaki_hero_image', [
        'label' => 'ヒーロー画像',
        'section' => 'kawasaki_hero_images',
    ]));

    // --- 店舗情報セクション ---
    $wp_customize->add_section('kawasaki_shop_info', [
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
        $wp_customize->add_setting("kawasaki_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("kawasaki_{$id}", [
            'label' => $info[0],
            'section' => 'kawasaki_shop_info',
            'type' => $id === 'google_map_url' ? 'textarea' : 'text',
        ]);
    }

    // --- ABOUT セクション ---
    $wp_customize->add_section('kawasaki_about', [
        'title' => 'ABOUTセクション',
        'priority' => 40,
    ]);

    $wp_customize->add_setting('kawasaki_about_text', [
        'default' => "カワサキショップヒラタ自動車は奈良県吉野郡下市町にあるカワサキオフロードエントリーショップで\nオフロードコース「ウッズモータースポーツランド下市」を自社で保有している珍しいディーラーです。\n\nカワサキのモーターサイクルを通じて、走る楽しさと感動をお届けします。\n初心者からベテランまで、あらゆるライダーの期待に応えるサービスとサポートを提供いたします。\n\nウッズ下市には本格MX＆XCコースも備えておりますのでお気軽に試乗もしていただけます。\nレースイベント＆試乗会も開催いたしますので、皆様と楽しみながら成長していきたいと思っております。",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('kawasaki_about_text', [
        'label' => 'ABOUT説明文',
        'section' => 'kawasaki_about',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('kawasaki_feature1_title', ['default' => '自社コース保有', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('kawasaki_feature1_title', ['label' => '特徴1 タイトル', 'section' => 'kawasaki_about', 'type' => 'text']);
    $wp_customize->add_setting('kawasaki_feature1_text', ['default' => 'ウッズモータースポーツランド下市で、いつでも本格的な走行が可能。', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('kawasaki_feature1_text', ['label' => '特徴1 説明', 'section' => 'kawasaki_about', 'type' => 'text']);
    $wp_customize->add_setting('kawasaki_feature2_title', ['default' => 'KAWASAKIオフロードエントリーショップ', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('kawasaki_feature2_title', ['label' => '特徴2 タイトル', 'section' => 'kawasaki_about', 'type' => 'text']);
    $wp_customize->add_setting('kawasaki_feature2_text', ['default' => '販売からメンテナンス、カスタムまでトータルサポート。', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('kawasaki_feature2_text', ['label' => '特徴2 説明', 'section' => 'kawasaki_about', 'type' => 'text']);

    $wp_customize->add_setting('kawasaki_about_logo', ['default' => get_stylesheet_directory_uri() . '/assets/images/about-kawasaki-new.png', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kawasaki_about_logo', [
        'label' => 'ABOUTセクション ロゴ画像',
        'section' => 'kawasaki_about',
    ]));

    // --- 4つのPoint セクション ---
    $wp_customize->add_section('kawasaki_points', [
        'title' => '4つのPoint',
        'priority' => 38,
    ]);

    $points_defaults = [
        1 => ['オフロードの魅力発信', 'オフロードといえば、未舗装のコースを駆け抜け土や泥を巻き上げ高いジャンプを繰り広げるモトクロスから、自然の地形を生かし比較的長いコースを耐久にて走破するエンデューロなど様々なコンテンツがあります。オフロードエントリーショップでは、その豊富な知識と経験により幅広いお客様へ"非日常を味わえる"オフロードの魅力を発信していきます。'],
        2 => ["これからオフロードをはじめる\nお客様のご相談窓口", '「オフロードには興味はある、でもどこで走れるの？いきなりコースに行くのは不安。どうやってバイクを運ぶの？走行前後のメンテナンスや保管はどうしたらいいの？」デビューに疑問や不安を抱えている方。まずは、カワサキのオフロードエントリーショップへお気軽にご相談ください。スタッフが一つひとつの疑問にお答えいたします。'],
        3 => ["ステップアップしたい\nお客様へのアドバイスやサポート", '「モトクロスやエンデューロには慣れてきたけど、タイムを上げるにはどうしたらよいか？自分好みのカスタムをしたい！」など、ご要望をお聞きし最適なご提案やアドバイスをさせていただきます。'],
        4 => ["オフロードモデルを使って楽しめる\nイベントの開催や参加可能レースのご案内", 'オフロードエントリーショップ主催のエントリー者向けスクールや走行会の実施、「Kawasaki Team Green Program」などを用いて各地域で開催されるレースへのエントリーをサポートいたします。'],
    ];
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("kawasaki_point{$i}_title", ['default' => $points_defaults[$i][0], 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("kawasaki_point{$i}_title", ['label' => "Point {$i} タイトル", 'section' => 'kawasaki_points', 'type' => 'textarea']);
        $wp_customize->add_setting("kawasaki_point{$i}_text", ['default' => $points_defaults[$i][1], 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("kawasaki_point{$i}_text", ['label' => "Point {$i} 説明文", 'section' => 'kawasaki_points', 'type' => 'textarea']);
    }

    // --- SNSリンク セクション ---
    $wp_customize->add_section('kawasaki_sns', [
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
        $wp_customize->add_setting("kawasaki_{$id}", ['default' => $info[1], 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("kawasaki_{$id}", [
            'label' => $info[0],
            'section' => 'kawasaki_sns',
            'type' => ($id === 'facebook_embed') ? 'textarea' : 'text',
        ]);
    }
    foreach (['twitter_id', 'facebook_name'] as $id) {
        $wp_customize->get_setting("kawasaki_{$id}")->sanitize_callback = 'sanitize_text_field';
    }

    // --- リンク先 セクション ---
    $wp_customize->add_section('kawasaki_links', [
        'title' => '外部リンク',
        'priority' => 50,
    ]);

    $link_fields = [
        'used_cars_url' => ['中古車ページURL', 'https://www.hirata-motors.com/cars.html'],
        'rental_url' => ['レンタルバイクURL', 'https://www.hirata-motors.com/sale.html'],
        'woods_url' => ['ウッズモーターランドURL', 'https://hirata-auto.com/woods/'],
        'contact_form_shortcode' => ['問い合わせフォーム ショートコード', '[contact-form-7 id="f245f89" title="カワサキ問い合わせ"]'],
    ];
    foreach ($link_fields as $id => $info) {
        $sanitize = ($id === 'contact_form_shortcode') ? 'sanitize_text_field' : 'esc_url_raw';
        $wp_customize->add_setting("kawasaki_{$id}", ['default' => $info[1], 'sanitize_callback' => $sanitize]);
        $wp_customize->add_control("kawasaki_{$id}", [
            'label' => $info[0],
            'section' => 'kawasaki_links',
            'type' => 'text',
        ]);
    }
}

// カスタマイザー値取得ヘルパー
function kawasaki_get($key, $default = '')
{
    return get_theme_mod("kawasaki_{$key}", $default);
}

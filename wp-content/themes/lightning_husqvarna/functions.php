<?php

// ==============================================
// カスタムCSS（現行motoページのカスタマイザーCSS再現）
// ==============================================
add_action('wp_head', 'husqvarna_custom_css', 99);
function husqvarna_custom_css()
{
    echo '<style id="husqvarna-custom-css" type="text/css">';
    echo '
/* === 現行motoページ カスタムCSS完全再現 === */
body {
    max-width: 900px;
    margin: 0 auto;
}
/* reCAPTCHAバッジ非表示 */
.grecaptcha-badge { visibility: hidden; }
/* モバイルのみ追加メニュー表示 */
@media (min-width:992px) {
    .menu_plus { display:none; }
}
.menu_plus ul {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    margin: 0;
    list-style: none;
    padding: 0 0 1em 0;
}
.menu_plus ul li {
    margin: 0;
    padding: 3px;
    border: 1px solid #002550;
    border-radius: 5px;
}
/* fbとtwのタイトル文字 */
h5 {
    padding-top: 10px;
    margin-bottom: 0;
    color: #002550;
    border-bottom: 1px solid #002550;
}
/* モデル紹介ボタン上余白 */
.wp-block-coblocks-service .wp-block-button {
    margin-top: 0;
}
/* 特選中古車レイアウト */
.alignwide {
    margin-left: 0;
    margin-right: 0;
}
.bg-cover {
    background-repeat: no-repeat;
    background-size: 100% auto;
}
.is-style-stacked .wp-block-coblocks-posts__image {
    width: 100%;
    margin-bottom: 0px;
}
.wp-block-coblocks-posts__item {
    margin-bottom: 0px;
    padding-bottom: 0;
}
/* 紹介文のレイアウト調整 */
.intro {
    font-size: 90%;
    margin: 0 auto;
    width: 85%;
    padding-bottom: 2em;
}
@media (max-width: 767px) {
    .intro {
        font-size: 90%;
        margin: 0 auto;
        width: 100%;
        padding-bottom: 1em;
    }
}
/* モデル紹介の文字サイズ */
.models > .wp-block-coblocks-service > .wp-block-coblocks-service__content > h3 {
    font-size: 120%;
}
/* お問い合わせエリアの色 */
.alert-success {
    background-color: #e7eef6;
    color: #002550;
    border-color: #e7eef6;
}
/* フッター余白調整 */
.footerWidget {
    padding-top: 0;
}
/* リンクホバー時半透明 */
a:hover {
    opacity: 0.7;
}
/* copyright非表示 */
.copySection {
    display: none;
}
/* 見出しデザイン */
h3 {
    margin: 1.5em 0 0.6em;
    border-bottom: 1px solid #002550;
    color: #002550;
}
/* ヘッダー下、フッター上余白調整 */
.siteContent {
    padding: 1rem 0 2rem;
}
@media (min-width:992px) {
    .sideSection-col-two {
        width: calc(100% - 66.66667% - 0rem);
        float: right;
    }
    .siteHeader .container {
        padding-bottom: 0px;
    }
}
/* バナー下余白調整 */
.banners {
    margin-bottom: 1em;
}
/* お問い合わせフォーム行の高さ */
textarea.form-control {
    height: 10em;
}
/* モバイル時の画像回り込み解除 */
@media (max-width: 767px) {
    .alignleft, img.alignleft {
        float: none;
        display: block;
        margin: auto;
    }
    .alignright, img.alignright {
        float: none;
        display: block;
        margin: auto;
    }
}
/* タブレット時画像に重なるの調整 */
.alert {
    position: static;
}
/* ナビを中央寄せ */
@media (min-width:1200px) {
    .gMenu_outer {
        float: none;
        text-align: center;
        margin: 0 auto;
    }
}
/* モバイルナビアイコン */
.vk-mobile-nav-menu-btn {
    border-color: #333;
    background: var(--vk-mobile-nav-menu-btn-bg-src) center 50% no-repeat rgba(255,255,255,1);
    margin-top: 5px;
}
/* モバイルナビ文字色と中央寄せ */
.vk-mobile-nav nav>ul li a {
    color: #002550;
    text-align: center;
}
/* ロゴのサイズ調整 */
.siteHeader_logo img {
    float: left;
    width: 900px;
    max-height: none;
}
@media (min-width:992px) {
    .siteHeader_logo img {
        max-height: none;
    }
}
@media (min-width:576px) {
    .container .siteHeader_logo {
        width: 100%;
        padding-right: 0px;
        padding-left: 0px;
        margin-right: auto;
        margin-left: auto;
    }
}
@media (max-width:991.98px) {
    .siteHeader_logo {
        padding: 0;
    }
}
@media (max-width:576px) {
    .siteHeader > .container {
        padding-right: 0px;
        padding-left: 0px;
    }
}
/* フッターお問い合わせ調整 */
.sideSection-col-two .veu_contact .contact_txt,
.siteFooter .veu_contact .contact_txt {
    margin-bottom: 0;
}
.sideSection-col-two .veu_contact .contact_bt,
.siteFooter .veu_contact .contact_bt {
    margin-top: .5rem;
}
/* wp-block-button のキーカラー */
.wp-block-button__link {
    background-color: #002550;
    border-radius: 9999px;
}
.wp-block-button__link:hover {
    background-color: #003570;
    opacity: 0.9;
}
/* CoBlocks service block */
.wp-block-coblocks-services .has-columns {
    display: flex;
    flex-wrap: wrap;
    gap: 1em;
}
.wp-block-coblocks-service {
    flex: 1;
    min-width: 200px;
}
.wp-block-coblocks-service__figure img {
    width: 100%;
    height: auto;
}
/* フッターバナー */
.veu_banner img {
    width: 100%;
    height: auto;
    margin-bottom: 10px;
}
/* フッターSNS */
.zoom-social-icons-list {
    display: flex;
    justify-content: center;
    gap: 10px;
    list-style: none;
    padding: 0;
    margin: 10px 0;
}
.zoom-social_icons-list-span {
    display: inline-block;
    border-radius: 50%;
    color: #fff;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
}
/* フッターコンタクトセクション */
.veu_contact {
    text-align: center;
    padding: 1em 0;
}
.contact_txt_catch {
    display: block;
    margin-bottom: 5px;
}
.contact_txt_tel {
    display: block;
    font-size: 1.5em;
    font-weight: bold;
    color: #002550;
}
.contact_txt_time {
    display: block;
    font-size: 0.85em;
    color: #666;
}
/* フッターカスタムcopyright */
.footer-copyright {
    width: 100%;
    text-align: center;
    font-size: 80%;
    padding: 1em 0;
}
/* Facebook埋め込み中央寄せ */
.fb-page, .fb-page iframe, .fb-page span {
    margin: 0 auto !important;
    display: block !important;
}
/* ナビのcurrent-menu-itemアンダーライン消し（ホバー時はアニメーション表示） */
.gMenu > li.current-menu-item:before,
.gMenu > li.current_page_item:before {
    width: 0 !important;
}
.gMenu > li.current-menu-item:hover:before,
.gMenu > li.current_page_item:hover:before {
    width: 100% !important;
}
/* SNSリンクカード */
.husq-sns-card:hover {
    background: #f5f5f5 !important;
    opacity: 1 !important;
}
@media (max-width: 767px) {
    .husq-sns-cards {
        flex-direction: column !important;
    }
}
';
    echo '</style>';
}

// ==============================================
// Lightning キーカラー設定
// ==============================================
add_filter('option_lightning_theme_options', 'husqvarna_override_theme_options');
function husqvarna_override_theme_options($options)
{
    if (!is_array($options)) {
        $options = [];
    }
    $options['color_key'] = '#002550';
    $options['color_key_dark'] = '#002550';
    return $options;
}

// ==============================================
// テーマ有効化時の自動セットアップ
// ==============================================
add_action('after_switch_theme', 'husqvarna_theme_activation');
function husqvarna_theme_activation()
{
    // ナビゲーションメニュー自動作成
    $menu_name = 'ハスクバーナメニュー';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        if (!is_wp_error($menu_id)) {
            // フロントページ取得
            $front_page_id = get_option('page_on_front');

            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => 'トップ',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
            ]);
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => '仮予約',
                'menu-item-url' => home_url('/仮予約/'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
            ]);
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => '特選中古車',
                'menu-item-url' => 'https://www.hirata-motors.com/cars.html',
                'menu-item-target' => '_blank',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
            ]);
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => '公式ショップ',
                'menu-item-url' => 'https://hirata-auto.stores.jp',
                'menu-item-target' => '_blank',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
            ]);
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => 'ショップ案内',
                'menu-item-url' => 'https://dekiteru.net/cms/em_top.php?id=17874',
                'menu-item-target' => '_blank',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
            ]);
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => 'アクセス',
                'menu-item-url' => home_url('/#access'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
            ]);
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => 'お問い合わせ',
                'menu-item-url' => home_url('/#contact'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
            ]);

            // メニューロケーションに割り当て（Lightning標準の3か所）
            $locations = get_theme_mod('nav_menu_locations', []);
            $locations['Header'] = $menu_id;
            $locations['Footer'] = $menu_id;
            $locations['vk-mobile-nav'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }

    // Lightning テーマオプション（ロゴ・キーカラー）
    $opts = get_option('lightning_theme_options', []);
    if (!is_array($opts)) $opts = [];
    $logo_url = husqvarna_get('header_logo', 'https://hirata-auto.com/husqvarna/wp-content/uploads/sites/3/2021/02/%E3%83%8F%E3%82%B9%E3%82%AF%E3%83%8F%E3%82%99%E3%83%BC%E3%83%8A%E3%83%98%E3%83%83%E3%82%BF%E3%82%99%E3%83%BC.jpg');
    $opts['head_logo'] = $logo_url;
    $opts['color_key'] = '#002550';
    $opts['color_key_dark'] = '#002550';
    update_option('lightning_theme_options', $opts);

    // サイトタイトル
    update_option('blogname', 'ハスクバーナショップヒラタ自動車');

    // フロントページ設定
    update_option('show_on_front', 'page');
    $front = get_page_by_path('top');
    if (!$front) {
        $front = get_page_by_title('トップ');
    }
    if (!$front) {
        $front_id = wp_insert_post([
            'post_title' => 'トップ',
            'post_name' => 'top',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ]);
        update_option('page_on_front', $front_id);
    } else {
        update_option('page_on_front', $front->ID);
    }
}

// ==============================================
// カスタマイザー設定
// ==============================================
add_action('customize_register', 'husqvarna_customize_register');
function husqvarna_customize_register($wp_customize)
{
    // --- 基本情報 ---
    $wp_customize->add_section('husqvarna_basic', [
        'title' => 'ハスクバーナ 基本情報',
        'priority' => 30,
    ]);

    $fields = [
        'intro_text' => ['紹介文', "ハスクバーナショップヒラタ自動車は奈良県吉野郡下市町にあるハスクバーナ正規ディーラーで、オフロードコース「ウッズモータースポーツランド下市」を自社で保有している珍しいディーラーです。ハスクバーナは100年以上の歴史がある上質かつスタイリッシュ、高性能なオフロードバイクメーカーです。\nウッズ下市には本格MX＆XCコースも備えておりますのでお気軽に試乗もしていただけます。\nレースイベント＆試乗会も開催いたしますので、皆様と楽しみながら成長していきたいと思っております。", 'textarea'],
        'shop_name' => ['店舗名', 'ハスクバーナモーターサイクルズ　ヒラタ自動車', 'text'],
        'representative' => ['代表者名', '代表 平田 武博', 'text'],
        'postal_code' => ['郵便番号', '〒638-0045', 'text'],
        'address' => ['住所', '奈良県吉野郡下市町新住239', 'text'],
        'tel' => ['電話番号', '0747-52-3744', 'text'],
        'fax' => ['FAX番号', '0747-52-1813', 'text'],
        'hours' => ['営業時間', '9：00－18：00', 'text'],
        'holidays' => ['定休日', '第２･４土曜及び日曜日・祝日、年末年始、お盆', 'text'],
    ];
    foreach ($fields as $id => $info) {
        $wp_customize->add_setting("husqvarna_{$id}", ['default' => $info[1], 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("husqvarna_{$id}", [
            'label' => $info[0],
            'section' => 'husqvarna_basic',
            'type' => $info[2],
        ]);
    }

    // --- 画像 ---
    $wp_customize->add_section('husqvarna_images', [
        'title' => 'ハスクバーナ 画像',
        'priority' => 31,
    ]);

    $images = [
        'header_logo' => ['ヘッダーロゴ画像', 'https://hirata-auto.com/husqvarna/wp-content/uploads/sites/3/2021/02/%E3%83%8F%E3%82%B9%E3%82%AF%E3%83%8F%E3%82%99%E3%83%BC%E3%83%8A%E3%83%98%E3%83%83%E3%82%BF%E3%82%99%E3%83%BC.jpg'],
        'banner_dealer' => ['ディーラーバナー画像', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2024/08/HQV_banner_Dealer_Sep24_628x1200-1-1024x536.jpg'],
        'banner_woods' => ['ウッズバナー画像', 'https://hirata-auto.com/husqvarna/wp-content/uploads/sites/3/2021/04/wood-wide-banner-.jpg'],
        'banner_rental' => ['レンタルバイクバナー画像', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2025/01/レンタルバイクバナー-1024x267.jpg'],
        'shop_exterior' => ['店舗外観画像', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2023/10/新店舗外観-300x225.jpg'],
        'footer_woods' => ['フッター ウッズバナー', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2021/04/wood-wide-banner-.jpg'],
        'footer_hirata' => ['フッター ヒラタバナー', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2021/02/hirata-header.jpg'],
    ];
    foreach ($images as $id => $info) {
        $wp_customize->add_setting("husqvarna_{$id}", ['default' => $info[1], 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "husqvarna_{$id}", [
            'label' => $info[0],
            'section' => 'husqvarna_images',
        ]));
    }

    // --- モデル紹介 ---
    $wp_customize->add_section('husqvarna_models', [
        'title' => 'ハスクバーナ モデル紹介',
        'priority' => 32,
    ]);

    // モデル1
    $wp_customize->add_setting('husqvarna_model1_image', ['default' => 'https://hirata-auto.com/husqvarna/wp-content/uploads/sites/3/2022/11/104378_TE-150-2023-scaled.jpg', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'husqvarna_model1_image', ['label' => 'モデル1 画像', 'section' => 'husqvarna_models']));
    $wp_customize->add_setting('husqvarna_model1_title', ['default' => 'TE 150・250・300', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('husqvarna_model1_title', ['label' => 'モデル1 タイトル', 'section' => 'husqvarna_models', 'type' => 'text']);
    $wp_customize->add_setting('husqvarna_model1_catch', ['default' => 'エンデューロの革新', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('husqvarna_model1_catch', ['label' => 'モデル1 キャッチ', 'section' => 'husqvarna_models', 'type' => 'text']);
    $wp_customize->add_setting('husqvarna_model1_desc', ['default' => '2ストインジェクション', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('husqvarna_model1_desc', ['label' => 'モデル1 説明', 'section' => 'husqvarna_models', 'type' => 'text']);
    $wp_customize->add_setting('husqvarna_model1_url', ['default' => 'https://www.husqvarna-motorcycles.com/ja-jp/models/enduro/2-stroke/te-250-2023.html', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('husqvarna_model1_url', ['label' => 'モデル1 リンクURL', 'section' => 'husqvarna_models', 'type' => 'text']);

    // モデル2（キャンペーン）
    $wp_customize->add_setting('husqvarna_model2_image', ['default' => 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2024/08/HQV_banner_Dealer_Sep24_628x1200-1.jpg', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'husqvarna_model2_image', ['label' => 'モデル2 画像', 'section' => 'husqvarna_models']));
    $wp_customize->add_setting('husqvarna_model2_title', ['default' => 'ディーラーオリジナルキャンペーン開催中', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('husqvarna_model2_title', ['label' => 'モデル2 タイトル', 'section' => 'husqvarna_models', 'type' => 'text']);
    $wp_customize->add_setting('husqvarna_model2_desc', ['default' => '２３モデル以前のストリートモデルが超お買い得', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('husqvarna_model2_desc', ['label' => 'モデル2 説明', 'section' => 'husqvarna_models', 'type' => 'text']);

    // --- 外部リンク ---
    $wp_customize->add_section('husqvarna_links', [
        'title' => 'ハスクバーナ リンク',
        'priority' => 33,
    ]);

    $links = [
        'woods_url' => ['ウッズモーターランドURL', 'https://hirata-auto.com/woods/'],
        'rental_url' => ['レンタルバイクURL', 'https://www.hirata-motors.com/sale.html'],
        'hirata_url' => ['ヒラタ自動車URL', '/'],
        'webshop_url' => ['公式ショップURL', 'https://hirata-auto.stores.jp'],
        'facebook_page' => ['Facebookページ URL', 'https://www.facebook.com/HusqvarnaNara'],
        'twitter_url' => ['Twitter URL', 'https://twitter.com/Woodshirappy'],
        'instagram_url' => ['Instagram URL', 'https://www.instagram.com/husqvarna_hirappy/'],
        'contact_form_shortcode' => ['問い合わせフォーム ショートコード', '[contact-form-7 id="169" title="コンタクトフォーム"]'],
    ];
    foreach ($links as $id => $info) {
        $sanitize = ($id === 'contact_form_shortcode') ? 'sanitize_text_field' : 'esc_url_raw';
        $wp_customize->add_setting("husqvarna_{$id}", ['default' => $info[1], 'sanitize_callback' => $sanitize]);
        $wp_customize->add_control("husqvarna_{$id}", [
            'label' => $info[0],
            'section' => 'husqvarna_links',
            'type' => 'text',
        ]);
    }
}

// ==============================================
// ヘッダーロゴをカスタマイザー画像で上書き
// ==============================================
add_filter('get_custom_logo', 'husqvarna_custom_logo');
function husqvarna_custom_logo($html)
{
    $logo_url = husqvarna_get('header_logo', '');
    if ($logo_url) {
        return '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link" rel="home">'
            . '<img src="' . esc_url($logo_url) . '" class="custom-logo" alt="' . esc_attr(get_bloginfo('name')) . '" />'
            . '</a>';
    }
    return $html;
}

// custom_logo が未設定でもロゴHTML出力されるようにする
add_filter('theme_mod_custom_logo', 'husqvarna_force_logo');
function husqvarna_force_logo($value)
{
    if (!$value && husqvarna_get('header_logo', '')) {
        return -1; // 非ゼロ値を返すことでhas_custom_logo()をtrueにする
    }
    return $value;
}

// カスタマイザー値取得ヘルパー
function husqvarna_get($key, $default = '')
{
    return get_theme_mod("husqvarna_{$key}", $default);
}

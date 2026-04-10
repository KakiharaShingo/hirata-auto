<?php
/**
 * ハスクバーナショップ ヒラタ自動車 トップページ
 * 現行 https://hirata-auto.com/moto/ と同一デザイン
 */

// カスタマイザー値取得
$intro = husqvarna_get('intro_text', "ハスクバーナショップヒラタ自動車は奈良県吉野郡下市町にあるハスクバーナ正規ディーラーで、オフロードコース「ウッズモータースポーツランド下市」を自社で保有している珍しいディーラーです。ハスクバーナは100年以上の歴史がある上質かつスタイリッシュ、高性能なオフロードバイクメーカーです。\nウッズ下市には本格MX＆XCコースも備えておりますのでお気軽に試乗もしていただけます。\nレースイベント＆試乗会も開催いたしますので、皆様と楽しみながら成長していきたいと思っております。");
$shop_name = husqvarna_get('shop_name', 'ハスクバーナモーターサイクルズ　ヒラタ自動車');
$representative = husqvarna_get('representative', '代表 平田 武博');
$postal = husqvarna_get('postal_code', '〒638-0045');
$address = husqvarna_get('address', '奈良県吉野郡下市町新住239');
$tel = husqvarna_get('tel', '0747-52-3744');
$fax = husqvarna_get('fax', '0747-52-1813');
$hours = husqvarna_get('hours', '9：00－18：00');
$holidays = husqvarna_get('holidays', '第２･４土曜及び日曜日・祝日、年末年始、お盆');

$header_logo = husqvarna_get('header_logo', 'https://hirata-auto.com/husqvarna/wp-content/uploads/sites/3/2021/02/%E3%83%8F%E3%82%B9%E3%82%AF%E3%83%8F%E3%82%99%E3%83%BC%E3%83%8A%E3%83%98%E3%83%83%E3%82%BF%E3%82%99%E3%83%BC.jpg');
$banner_dealer = husqvarna_get('banner_dealer', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2024/08/HQV_banner_Dealer_Sep24_628x1200-1-1024x536.jpg');
$banner_woods = husqvarna_get('banner_woods', 'https://hirata-auto.com/husqvarna/wp-content/uploads/sites/3/2021/04/wood-wide-banner-.jpg');
$banner_rental = husqvarna_get('banner_rental', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2025/01/レンタルバイクバナー-1024x267.jpg');
$shop_exterior = husqvarna_get('shop_exterior', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2023/10/新店舗外観-300x225.jpg');
$footer_woods = husqvarna_get('footer_woods', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2021/04/wood-wide-banner-.jpg');
$footer_hirata = husqvarna_get('footer_hirata', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2021/02/hirata-header.jpg');

$model1_image = husqvarna_get('model1_image', 'https://hirata-auto.com/husqvarna/wp-content/uploads/sites/3/2022/11/104378_TE-150-2023-scaled.jpg');
$model1_title = husqvarna_get('model1_title', 'TE 150・250・300');
$model1_catch = husqvarna_get('model1_catch', 'エンデューロの革新');
$model1_desc = husqvarna_get('model1_desc', '2ストインジェクション');
$model1_url = husqvarna_get('model1_url', 'https://www.husqvarna-motorcycles.com/ja-jp/models/enduro/2-stroke/te-250-2023.html');

$model2_image = husqvarna_get('model2_image', 'https://hirata-auto.com/moto/wp-content/uploads/sites/3/2024/08/HQV_banner_Dealer_Sep24_628x1200-1.jpg');
$model2_title = husqvarna_get('model2_title', 'ディーラーオリジナルキャンペーン開催中');
$model2_desc = husqvarna_get('model2_desc', '２３モデル以前のストリートモデルが超お買い得');

$woods_url = husqvarna_get('woods_url', 'https://hirata-auto.com/woods/');
$rental_url = husqvarna_get('rental_url', 'https://www.hirata-motors.com/sale.html');
$hirata_url = husqvarna_get('hirata_url', '/');
$facebook_page = husqvarna_get('facebook_page', 'https://www.facebook.com/HusqvarnaNara');
$twitter_url = husqvarna_get('twitter_url', 'https://twitter.com/Woodshirappy');
$instagram_url = husqvarna_get('instagram_url', 'https://www.instagram.com/husqvarna_hirappy/');
$cf7_shortcode = husqvarna_get('contact_form_shortcode', '[contact-form-7 id="169" title="コンタクトフォーム"]');

$intro_html = nl2br(esc_html($intro));

get_header(); ?>

<div class="section siteContent">
<div class="container">
<div class="row">

<div class="col mainSection mainSection-col-one">

<article class="page type-page status-publish hentry">
<div class="entry-body">

<!-- モバイル追加メニュー -->
<div class="menu_plus">
<ul class="menu_plusul">
<li><a href="<?php echo esc_url(home_url('/仮予約/')); ?>"><strong class="gMenu_name">仮予約</strong></a></li>
<li><a href="<?php echo esc_url(home_url('/特選used/')); ?>"><strong class="gMenu_name">特選USED</strong></a></li>
<li><a target="_blank" href="https://hirata-auto.stores.jp" rel="noopener"><strong class="gMenu_name">公式ショップ</strong></a></li>
</ul>
</div>

<!-- 紹介文 -->
<p class="intro"><?php echo $intro_html; ?></p>

<p></p>

<!-- SNS リンクカード -->
<div class="husq-sns-cards" style="display:flex; gap:12px; margin:1.5em 0;">
<a href="<?php echo esc_url(str_replace('twitter.com', 'x.com', $twitter_url)); ?>" target="_blank" rel="noopener" class="husq-sns-card" style="flex:1; display:flex; align-items:center; padding:16px 20px; border:1px solid #ddd; border-radius:6px; text-decoration:none; color:inherit; transition:background 0.2s;">
    <span style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; background:#000; border-radius:50%; margin-right:16px; flex-shrink:0;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
    </span>
    <span>
        <strong style="display:block; font-size:1.1em;">X (Twitter)</strong>
        <span style="color:#888; font-size:0.9em;">@Woodshirappy</span>
    </span>
</a>
<a href="<?php echo esc_url($facebook_page); ?>" target="_blank" rel="noopener" class="husq-sns-card" style="flex:1; display:flex; align-items:center; padding:16px 20px; border:1px solid #ddd; border-radius:6px; text-decoration:none; color:inherit; transition:background 0.2s;">
    <span style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; background:#1877F2; border-radius:50%; margin-right:16px; flex-shrink:0;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
    </span>
    <span>
        <strong style="display:block; font-size:1.1em;">Facebook</strong>
        <span style="color:#888; font-size:0.9em;">ハスクバーナショップ ヒラタ自動車</span>
    </span>
</a>
</div>

<!-- Facebook埋め込み -->
<div style="margin:1em 0; text-align:center;">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v9.0"></script>
<div class="fb-page" data-href="<?php echo esc_url($facebook_page); ?>" data-tabs="timeline" data-width="750" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
<blockquote cite="<?php echo esc_url($facebook_page); ?>" class="fb-xfbml-parse-ignore">
<a href="<?php echo esc_url($facebook_page); ?>">ハスクバーナショップ ヒラタ自動車</a>
</blockquote>
</div>
</div>

<!-- ディーラーバナー -->
<figure class="wp-block-image size-large">
<img decoding="async" width="1024" height="536" src="<?php echo esc_url($banner_dealer); ?>" alt="ハスクバーナバナー" />
</figure>

<p></p>

<!-- ウッズバナー -->
<figure class="wp-block-image size-large">
<a href="<?php echo esc_url($woods_url); ?>">
<img decoding="async" width="900" height="250" src="<?php echo esc_url($banner_woods); ?>" alt="ウッズモータースポーツランド" />
</a>
</figure>

<!-- レンタルバイクバナー -->
<figure class="wp-block-image size-large vk_block-margin-md--margin-top">
<a href="<?php echo esc_url($rental_url); ?>" target="_blank" rel="noreferrer noopener">
<img decoding="async" width="1024" height="267" src="<?php echo esc_url($banner_rental); ?>" alt="レンタルバイク" />
</a>
</figure>

<!-- モデル紹介 -->
<h3 class="wp-block-heading is-style-vk-heading-default vk_block-margin-md--margin-top">モデル紹介</h3>

<div class="wp-block-coblocks-services models"><div class="models has-columns has-2-columns has-responsive-columns has-medium-gutter">

<?php if ($model1_title): ?>
<div class="wp-block-coblocks-service">
<?php if ($model1_image): ?>
<figure class="wp-block-coblocks-service__figure"><img decoding="async" src="<?php echo esc_url($model1_image); ?>" alt="<?php echo esc_attr($model1_title); ?>"/></figure>
<?php endif; ?>
<div class="wp-block-coblocks-service__content">
<h3 class="wp-block-heading is-style-vk-heading-default"><?php echo esc_html($model1_title); ?></h3>
<p><?php echo esc_html($model1_catch); ?></p>
<p><?php echo esc_html($model1_desc); ?></p>
<?php if ($model1_url): ?>
<div class="wp-block-buttons is-horizontal is-layout-flex wp-block-buttons-is-layout-flex">
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url($model1_url); ?>" target="_blank" rel="noreferrer noopener">詳細はこちら</a></div>
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>

<?php if ($model2_title): ?>
<div class="wp-block-coblocks-service">
<?php if ($model2_image): ?>
<figure class="wp-block-coblocks-service__figure"><img decoding="async" src="<?php echo esc_url($model2_image); ?>" alt="<?php echo esc_attr($model2_title); ?>"/></figure>
<?php endif; ?>
<div class="wp-block-coblocks-service__content">
<h3 class="wp-block-heading has-text-align-none"><?php echo esc_html($model2_title); ?></h3>
<p class="has-text-align-none"><?php echo esc_html($model2_desc); ?></p>
</div>
</div>
<?php endif; ?>

</div></div>

<!-- ショップ案内 -->
<h3 class="wp-block-heading is-style-vk-heading-default" id="about">ショップ案内</h3>

<p><strong><?php echo esc_html($shop_name); ?><img loading="lazy" decoding="async" class="alignright" src="<?php echo esc_url($shop_exterior); ?>" alt="店舗外観" width="236" height="177" /><br /></strong><a href="<?php echo esc_url($hirata_url); ?>">ヒラタ自動車ウェブサイトはこちら</a><br /><?php echo esc_html($representative); ?><br /><?php echo esc_html($postal); ?> <?php echo esc_html($address); ?> <br />TEL:<a href="tel:<?php echo preg_replace('/[^0-9]/', '', $tel); ?>"><?php echo esc_html($tel); ?></a><br />FAX:<?php echo esc_html($fax); ?></p>

<div class="wp-block-vk-blocks-alert vk_alert alert alert-success"><div class="vk_alert_content">
<p>お気軽にお問い合わせください。<br>TEL:<strong><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $tel); ?>"><?php echo esc_html($tel); ?></a></strong><br><a href="#contact">お問い合わせフォームはこちら</a><br>営業時間: <?php echo esc_html($hours); ?><br>定休日:<?php echo esc_html($holidays); ?></p>
</div></div>

<!-- アクセス -->
<h3 class="wp-block-heading is-style-vk-heading-default" id="access">アクセス</h3>

<p><?php echo esc_html($postal); ?> <?php echo esc_html($address); ?> （ヒラタ自動車）</p>

<div style="min-height:400px" class="wp-block-coblocks-map">
<iframe title="Google マップ" frameborder="0" style="width:100%;min-height:400px" src="https://www.google.com/maps?q=34.3800997,135.7816745&z=17&output=embed&hl=ja" allowfullscreen loading="lazy"></iframe>
</div>

<!-- お問い合わせ -->
<h3 class="wp-block-heading is-style-vk-heading-default" id="contact">お問い合わせ</h3>

<?php echo do_shortcode($cf7_shortcode); ?>

<p class="recaptcha_policy" style="font-size:12px">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Terms of Service</a> apply.</p>

</div>
</article>

</div><!-- /.mainSection -->

</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.siteContent -->

<?php
// フッター前にカスタムウィジェットエリアを出力
?>
<footer class="section siteFooter">
    <div class="container sectionBox footerWidget">
        <div class="row">
            <div class="col-md-12">

                <!-- SNSアイコン -->
                <div style="text-align:center; margin:10px 0;">
                    <a href="<?php echo esc_url($facebook_page); ?>/" target="_blank" title="Facebook" style="display:inline-block; margin:0 5px;">
                        <span style="display:inline-block; background-color:#1877F2; color:#fff; border-radius:50%; width:34px; height:34px; line-height:34px; text-align:center; font-size:14px;">f</span>
                    </a>
                    <a href="<?php echo esc_url(str_replace('twitter.com', 'x.com', $twitter_url)); ?>" target="_blank" title="X" style="display:inline-block; margin:0 5px;">
                        <span style="display:inline-block; background-color:#000; color:#fff; border-radius:50%; width:34px; height:34px; line-height:34px; text-align:center; font-size:14px;">X</span>
                    </a>
                    <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" title="Instagram" style="display:inline-block; margin:0 5px;">
                        <span style="display:inline-block; background-color:#e4405f; color:#fff; border-radius:50%; width:34px; height:34px; line-height:34px; text-align:center; font-size:14px;">i</span>
                    </a>
                </div>

                <!-- お問い合わせセクション -->
                <section class="veu_contact veu_contentAddSection vk_contact veu_card veu_contact-layout-horizontal">
                    <div class="contact_frame veu_card_inner" style="text-align:center; padding:1em 0;">
                        <p class="contact_txt">
                            <span class="contact_txt_catch">お気軽にお問い合わせください。</span>
                            <span class="contact_txt_tel veu_color_txt_key"><i class="contact_txt_tel_icon"></i><?php echo esc_html($tel); ?></span>
                            <span class="contact_txt_time">受付時間 <?php echo esc_html($hours); ?> [ <?php echo esc_html($holidays); ?>除く ]</span>
                        </p>
                        <a href="#contact" class="btn btn-primary btn-lg contact_bt">
                            <span class="contact_bt_txt">お問い合わせ</span>
                        </a>
                    </div>
                </section>

                <!-- フッターバナー -->
                <a href="<?php echo esc_url($woods_url); ?>" class="veu_banner" target="_blank">
                    <img src="<?php echo esc_url($footer_woods); ?>" alt="ウッズモータースポーツランド下市" />
                </a>
                <a href="<?php echo esc_url($hirata_url); ?>" class="veu_banner" target="_blank">
                    <img src="<?php echo esc_url($footer_hirata); ?>" alt="ヒラタ自動車" />
                </a>

                <!-- Copyright -->
                <div class="footer-copyright">
                    Copyright &copy; ヒラタ自動車 All Rights Reserved.
                </div>

            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

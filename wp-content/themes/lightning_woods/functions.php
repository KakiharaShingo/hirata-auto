<?php

/*-------------------------------------------*/
/*  テーマ有効化時に元テーマのカスタマイザー設定をコピー
/*-------------------------------------------*/
add_action( 'after_switch_theme', 'woods_copy_parent_theme_mods' );
function woods_copy_parent_theme_mods() {
    // Lightning親テーマ → Lightning Child の順で探す
    $source_mods = get_option( 'theme_mods_lightning' );
    if ( ! $source_mods ) {
        $source_mods = get_option( 'theme_mods_lightning_child' );
    }
    if ( $source_mods ) {
        update_option( 'theme_mods_lightning_woods', $source_mods );
    }
}

// プラグイン自動更新通知メール停止
add_filter( 'auto_plugin_update_send_email', '__return_false' );

/*-------------------------------------------*/
/*  カスタム投稿タイプ「イベント情報」を追加
/*-------------------------------------------*/
// add_action( 'init', 'add_post_type_event', 0 );
// function add_post_type_event() {
//     register_post_type( 'event', /* カスタム投稿タイプのスラッグ */
//         array(
//             'labels' => array(
//                 'name' => 'イベント情報',
//                 'singular_name' => 'イベント情報'
//             ),
//         'public' => true,
//         'menu_position' =>5,
//         'has_archive' => true,
//         'supports' => array('title','editor','excerpt','thumbnail','author')
//         )
//     );
// }

/*-------------------------------------------*/
/*  カスタム分類「イベント情報カテゴリー」を追加
/*-------------------------------------------*/
// add_action( 'init', 'add_custom_taxonomy_event', 0 );
// function add_custom_taxonomy_event() {
//     register_taxonomy(
//         'event-cat', /* カテゴリーの識別子 */
//         'event', /* 対象の投稿タイプ */
//         array(
//             'hierarchical' => true,
//             'update_count_callback' => '_update_post_term_count',
//             'label' => 'イベントカテゴリー',
//             'singular_label' => 'イベント情報カテゴリー',
//             'public' => true,
//             'show_ui' => true,
//         )
//     );
// }

/********* 備考1 **********
Lightningはカスタム投稿タイプを追加すると、
作成したカスタム投稿タイプのサイドバー用のウィジェットエリアが自動的に追加されます。
プラグイン VK All in One Expansion Unit のウィジェット機能が有効化してあると、
VK_カテゴリー/カスタム分類ウィジェット が使えるので、このウィジェットで、
今回作成した投稿タイプ用のカスタム分類を設定したり、
VK_アーカイブウィジェット で、今回作成したカスタム投稿タイプを指定する事もできます。

/********* 備考2 **********
カスタム投稿タイプのループ部分やサイドバーをカスタマイズしたい場合は、
下記の命名ルールでファイルを作成してアップしてください。
module_loop_★ポストタイプ名★.php
*/

/*-------------------------------------------*/
/*  フッターのウィジェットエリアの数を増やす
/*-------------------------------------------*/
// add_filter('lightning_footer_widget_area_count','lightning_footer_widget_area_count_custom');
// function lightning_footer_widget_area_count_custom($footer_widget_area_count){
//     $footer_widget_area_count = 4; // ← 1~4の半角数字で設定してください。
//     return $footer_widget_area_count;
// }

/*-------------------------------------------*/
/*  <head>タグ内に自分の追加したいタグを追加する
/*-------------------------------------------*/
function add_wp_head_custom(){ ?>
<!-- head内に書きたいコード -->
<?php }
// add_action( 'wp_head', 'add_wp_head_custom',1);

function add_wp_footer_custom(){ ?>
<!-- footerに書きたいコード -->
<?php }
// add_action( 'wp_footer', 'add_wp_footer_custom', 1 );

/*-------------------------------------------*/
/*  レンタルバイクページ: バイクリストをリンクに差し替え（オプション以降は残す）
/*-------------------------------------------*/
add_filter( 'the_content', 'woods_replace_rental_bikelist' );
function woods_replace_rental_bikelist( $content ) {
    if ( ! is_page( 16 ) && ! is_page( 'レンタルバイク' ) ) {
        return $content;
    }

    // 「バイクリスト」と「オプション」の位置を探す
    $start_marker = 'バイクリスト';
    $end_marker = 'オプション';

    $start_pos = mb_strpos( $content, $start_marker );
    if ( $start_pos === false ) {
        return $content;
    }

    // バイクリスト見出しの開始タグ位置
    $before_part = mb_substr( $content, 0, $start_pos );
    $start_tag_pos = mb_strrpos( $before_part, '<h' );
    if ( $start_tag_pos !== false ) {
        $before_part = mb_substr( $content, 0, $start_tag_pos );
    }

    // オプション見出しの開始タグ位置（ここから後ろは残す）
    $end_pos = mb_strpos( $content, $end_marker, $start_pos );
    $after_part = '';
    if ( $end_pos !== false ) {
        $tmp = mb_substr( $content, 0, $end_pos );
        $end_tag_pos = mb_strrpos( $tmp, '<h' );
        if ( $end_tag_pos !== false ) {
            $after_part = mb_substr( $content, $end_tag_pos );
        }
    }

    $replacement = '
<h3>バイクリスト</h3>

<h4>50cc</h4>
<p>●特徴：オートマチック/自動変速<br>
●対象：5～8歳<br>
●料金：半日（約2時間） <strong><span style="color:#7a2b24">5,500</span></strong>円<br>
　　　　終日（約4時間） <strong><span style="color:#7a2b24">8,000</span></strong>円<br>
※保険料は含まれておりません。</p>

<h4>70cc</h4>
<p>●特徴：3速オートマチック<br>
●対象：9～12歳<br>
●料金：半日（約2時間） <strong><span style="color:#7a2b24">6,500</span></strong>円<br>
　　　　終日（約4時間） <strong><span style="color:#7a2b24">9,500</span></strong>円<br>
※保険料は含まれておりません。</p>

<h4>80/100cc</h4>
<p>●特徴：クラッチ付き/5速ミッション<br>
●対象：13歳～大人<br>
●料金：半日（約2時間） <strong><span style="color:#7a2b24">7,500</span></strong>円<br>
　　　　終日（約4時間） <strong><span style="color:#7a2b24">11,000</span></strong>円<br>
※保険料は含まれておりません。</p>

<p>※その他の排気量・料金についてはお問い合わせください。</p>
<p style="margin: 2em 0;">
    <a href="https://www.hirata-motors.com/sale.html" target="_blank" rel="noopener noreferrer"
       style="display: inline-block; background: #8b4513; color: #fff; padding: 15px 40px; text-decoration: none; font-weight: bold; font-size: 1.1em;">
        バイクリストを見る &raquo;
    </a>
</p>
<div class="alert alert-danger"><p>レンタル料には、バイク、燃料、走行料が含まれております。但し、<a href="/woods/保険/">保険料</a>は含まれておりませんのでご注意ください。</p></div>';

    return $before_part . $replacement . $after_part;
}

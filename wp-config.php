<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //

if (getenv('IS_DOCKER')) {
  // Docker環境用の設定
  define('DB_NAME', 'local_wp_db');
  define('DB_USER', 'wp_user');
  define('DB_PASSWORD', 'wp_password');
  define('DB_HOST', 'db');

  // サイトURLをローカルに向ける
  define('WP_HOME', 'http://localhost:8000');
  define('WP_SITEURL', 'http://localhost:8000');
} else {
  // 本番環境用の設定 (元の設定)
  /** WordPress のためのデータベース名 */
  define('DB_NAME', 'LAA1256459-hirata');

  /** MySQL データベースのユーザー名 */
  define('DB_USER', 'LAA1256459');

  /** MySQL データベースのパスワード */
  define('DB_PASSWORD', 'HirataWoods239');

  /** MySQL のホスト名 */
  define('DB_HOST', 'mysql148.phy.lolipop.lan');
}

/** データベースのテーブルを作成する際のデータベースの文字セット */
// define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
// define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'sV7mf!WuYbC~YM~0b":"}DSKMx+}Ip3Y#pPN&)kskQs`N*vRekteE.?)%yHUoss=');
define('SECURE_AUTH_KEY', 'KPe.]T:`!":;v_OUh{lr3Ek1X^8:PR6qv4J8Vgh?#7~#,NV%F#*RdFLZrH:WvWVD');
define('LOGGED_IN_KEY', 'z#S$8,8yV7AWI[ZyFYAS:^D/k[,vXiVx0YIyrYi~*{RyIkM-4F/k"HQZBf^V>#c4');
define('NONCE_KEY', 'g>[rdfE8J&R`L"6w(}T_kP8:U_X:^p(w_o?n3kW?mb,L=/Ez%gP[#ob50/P1BY(.');
define('AUTH_SALT', '{r?Cbp%x6U]h#l2.no+[jE[>.1yqih)aK0pC/{YL]wdp?)5%<$e+pgK4vl*f{J8B');
define('SECURE_AUTH_SALT', 'G2rzMT;.UO<.wIiRIJqUbu*dF(hA+rdsWQjh19C},.-:w8;hYv^6t?SVFD8jd7YY');
define('LOGGED_IN_SALT', 'n*iQ%nHZ-D1qGU_;u?R$?&H@ku|f`l`i2MM)<[=EI^{yWwK~<_H2PRl=e4<X|@.m');
define('NONCE_SALT', 't7hQbaWjL>G7ZdWcbk<&$Aa!,^NwbiJ@iDTZ1s8jh53;RBB`fNPR+yZnBCs|z}ga');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp20210126114107_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
if (getenv('IS_DOCKER')) {
  define('DOMAIN_CURRENT_SITE', 'localhost:8000');
} else {
  define('DOMAIN_CURRENT_SITE', 'hirata-auto.com');
}
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
//Disable File Edits
define('DISALLOW_FILE_EDIT', true);
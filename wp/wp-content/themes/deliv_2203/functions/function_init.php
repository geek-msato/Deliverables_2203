<?php
// アイキャッチ有効化
add_theme_support('post-thumbnails');


// デフォルトで生成される画像を無効化
function remove_image_sizes($sizes)
{
  unset($sizes['thumbnail']);
  unset($sizes['medium']);
  unset($sizes['large']);
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_image_sizes');


// 管理画面サイドバーの不要な項目を非表示
function remove_menus()
{
  // remove_menu_page( 'index.php' );                  // ダッシュボード
  remove_menu_page('edit.php');                   // 投稿
  // remove_menu_page( 'upload.php' );                 // メディア
  // remove_menu_page( 'edit.php?post_type=page' );    // 固定ページ
  remove_menu_page('edit-comments.php');          // コメント
  // remove_menu_page( 'themes.php' );                 // 外観
  // remove_menu_page( 'plugins.php' );                // プラグイン
  // remove_menu_page( 'users.php' );                  // ユーザー
  // remove_menu_page( 'tools.php' );                  // ツール
  // remove_menu_page( 'options-general.php' );        // 設定
}
add_action('admin_menu', 'remove_menus');


// メニューの移動（メディア）
function customize_menus()
{
  global $menu;
  $menu[19] = $menu[10];
  unset($menu[10]);
}
add_action('admin_menu', 'customize_menus');


// 自動保存を無効
function autosave_off()
{
  wp_deregister_script('autosave');
}
add_action('wp_print_scripts', 'autosave_off');


// 管理画面にassets読み込み
function my_admin_assets()
{
  wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/assets/admin/css/admin.css');
  wp_enqueue_script('my_admin_script', get_template_directory_uri() . '/assets/admin/js/admin.js', '', '', true);
}
add_action('admin_enqueue_scripts', 'my_admin_assets');


// プレビュー機能調整
add_filter('wp_insert_post_data', function ($data) {
  if (isset($_GET['meta-box-loader'])) {
    unset($data["post_modified"]);
    unset($data["post_modified_gmt"]);
  }
  return $data;
});

// 自動整形無効
remove_filter('the_content', 'wpautop');

?>

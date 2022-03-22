<?php
// global $wp_rewrite;
// $wp_rewrite->flush_rules();

// 自動補完無効化
function disable_redirect_canonical( $redirect_url ) {
  if( is_404() ) {
    return false;
  }
  return $redirect_url;
}
// add_filter( 'redirect_canonical', 'disable_redirect_canonical' );

// リライト設定
function urlRewrite(){
  // ニュース
  add_rewrite_rule('news/article-([0-9]+)/?$', 'index.php?post_type=news&p=$matches[1]', 'top');
  add_rewrite_rule('news/cat_news/([^/]+)/page/([0-9]+)/?$', 'index.php?cat_news=$matches[1]', 'top');
}
add_action( 'init', 'urlRewrite' );

function rewrite_term_links($termlink, $term, $taxonomy) {
  if ($taxonomy === 'cat_news') {
    return ($taxonomy === 'cat_news' ? home_url('/news/cat_news/'. $term->slug) : $termlink);
  }
}
add_filter( 'term_link', 'rewrite_term_links', 10, 3 );

?>

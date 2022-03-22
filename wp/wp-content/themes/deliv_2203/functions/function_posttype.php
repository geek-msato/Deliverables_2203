<?php

// カスタム投稿タイプ
function create_post_type() {
	// カスタム投稿：ニュース
	register_post_type('news',
		array(
			'labels' => array(
				'name' => 'ニュース',
				'singular_name' => 'ニュース',
				'add_new_item' => 'ニュースを追加',
				'edit_item' => 'ニュースを編集'
			),
			'public' => true,
			'show_ui' => true,
			'menu_position' => 5,
			'has_archive' => true,
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'revisions'
			),
			'show_in_rest' => true,
			'rewrite' => true,
		)
	);

	// カスタムタクソノミー：ニュースのカテゴリー
	register_taxonomy(
		'cat_news',
		'news',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'ニュースのカテゴリー',
			'singular_label' => 'ニュースのカテゴリー',
			'show_in_rest' => true,
			'public' => true,
			'show_ui' => true,
		)
	);

	// カスタム投稿：採用情報
	register_post_type('recruit',
		array(
			'labels' => array(
				'name' => '採用情報',
				'singular_name' => '採用情報',
				'add_new_item' => '採用情報を追加',
				'edit_item' => '採用情報を編集'
			),
			'public' => true,
			'show_ui' => true,
			'menu_position' => 5,
			'has_archive' => true,
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'revisions'
			),
			'show_in_rest' => true,
			'rewrite' => true,
		)
	);

	// カスタムタクソノミー：採用情報のカテゴリー
	register_taxonomy(
		'cat_recruit',
		'recruit',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => '採用情報のカテゴリー',
			'singular_label' => '採用情報のカテゴリー',
			'show_in_rest' => true,
			'public' => true,
			'show_ui' => true,
		)
	);
}
add_action('init', 'create_post_type');

?>

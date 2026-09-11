<?php

/**
 * TinyMCE
 */

// 画像編集の際に勝手にwidth/heightが入るので削除
function my_tinymce_remove_width_attribute($options) {
	if ($options['tinymce']) {
		wp_enqueue_script(
			'tinymce_remove_width_attribute',
			get_template_directory_uri() . '/dist/js/wp-admin-remove_width_attribute.js',
			['jquery'],
			'1.0.0',
			true
		);
	}
}
add_action('wp_enqueue_editor', 'my_tinymce_remove_width_attribute', 10, 1);

/**
 * Gutenberg
 */

// 特定の投稿タイプ、特定の固定ページでグーテンベルグを非表示
 function disable_block_editor( $use_block_editor, $post_type ) {
   // if( $post_type === 'page' ) {
	 //   remove_post_type_support( 'page', 'editor' );
	 //   return false;
	 // }

   if( $post_type === 'program' ) {
	   remove_post_type_support( 'page', 'editor' );
	   return false;
	 }

   return $use_block_editor;
 }
 add_filter( 'use_block_editor_for_post_type', 'disable_block_editor', 10, 2 );

 // 特定の固定ページテンプレートでグーテンベルグを非表示
 function disable_editor_for_specific_template() {
	 $post_id = 0;
	 if (isset($_GET['post'])) {
		 $post_id = (int) $_GET['post'];
	 } elseif (isset($_POST['post_ID'])) {
		 $post_id = (int) $_POST['post_ID'];
	 }
	 if (!$post_id) {
		 return;
	 }
	 if (get_post_type($post_id) !== 'page') {
		 return;
	 }

	 $template_slug = get_page_template_slug($post_id);

	 // front-page.php が明示的にテンプレートとして選択されている場合
	 $is_front_template = ($template_slug === 'front-page.php');

	 // 表示設定で「フロントページ」として指定されている固定ページの場合
	 $is_static_front_page = (
		 get_option('show_on_front') === 'page' &&
		 (int) get_option('page_on_front') === $post_id
	 );

	 $target_slugs = array('page-content.php');

	 if (
		 in_array($template_slug, $target_slugs, true) ||
		 $is_front_template ||
		 $is_static_front_page
	 ) {
		 remove_post_type_support('page', 'editor');
	 }
 }
 add_action('admin_init', 'disable_editor_for_specific_template');



/**
 * iframe
 */

// iframeを使えるようにする
function acf_add_allowed_iframe_tag($tags, $context) {
	if ($context === 'acf') {
		$tags['iframe'] = [
			'src' => true,
			'height' => true,
			'width' => true,
			'frameborder' => true,
			'allowfullscreen' => true,
		];
	}

	return $tags;
}
add_filter('wp_kses_allowed_html', 'acf_add_allowed_iframe_tag', 10, 2);
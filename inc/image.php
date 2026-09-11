<?php

/**
 * Remove P Tag
 */

//画像を挿入する際、P タグで囲まないようにする
function filter_ptags_on_images($content) {
	return preg_replace(
		'/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU',
		'\1\2\3',
		$content
	);
}
add_filter('the_content', 'filter_ptags_on_images');

/**
 * Remove Width Height
 */

// 画像挿入時にwidthとheightを削除する
function remove_width_attribute($html) {
	return preg_replace('/(width|height)="\d*"\s/', '', $html);
}

add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);

/**
 * Catch Image
 */

// 投稿の中から画像を抜粋
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  if (preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){
	  $first_img = $matches [1] [0];
  }else{
	  $first_img = get_stylesheet_directory_uri().'/images/common/no-photo.png';
  }
return $first_img;
}


/**
 * Catch Thumbnail
 */

// $get_size: 取得する画像のサイズ
// $altimg_id: 代替画像のID。（画像はあらかじめメディアライブラリからアップロードしておく）
//             nullの場合、投稿内に画像が無ければ何も出力しない
function catch_thumbnail_image($get_size = 'large', $altimg_id = null) {
  global $post;
  $image = '';
  $image_get = preg_match_all( '/<img.+class=[\'"].*wp-image-([0-9]+).*[\'"].*>/i', $post->post_content, $matches );
  $image_id = $matches[1][0];
  if( !$image_id && $altimg_id ){
	  $image_id = $altimg_id;
  }
  $image = wp_get_attachment_image( $image_id, $get_size, false, array(
	  // 'class' => 'thumbnail-image',
	  'srcset' => wp_get_attachment_image_srcset( $image_id, $get_size ),
	  'sizes' => wp_get_attachment_image_sizes( $image_id, $get_size )
  ) );
  if( empty($image) ) {
	  $image = '<img src="'.get_stylesheet_directory_uri().'/images/common/now-printing.png">';
  }
  return $image;
}
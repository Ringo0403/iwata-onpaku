<?php

/**
 * Admin Footer
 */

 // 管理画面のフッター変更
 function custom_admin_footer() {
	 echo ' お困りの際は<a href="http://www.cabby.jp" title="Net City Cabby" target="_blank">Net City Cabby</a>まで。・・・・Powered By Net City Cabby .';
 }
 add_filter('admin_footer_text', 'custom_admin_footer');

/**
 * Admin Bar
 */

// 管理バーのサイトリンクを別ウインドウで
  function site_target_blank( $wp_admin_bar ) {
	  $wp_admin_bar->add_menu( array(
		  'id'    => 'site-name',
		  'meta'   => array(
			  'target' => '_blank',
		  ),
	  ) );
  }
  add_action( 'admin_bar_menu', 'site_target_blank', 100 );

  // サイトを表示をツールバーから消す
  function remove_bar_menus( $wp_admin_bar ) {
	  $wp_admin_bar->remove_menu( 'view-site' );    // サイト名 -> サイトを表示
  }
  add_action('admin_bar_menu', 'remove_bar_menus', 201);

/**
 * Placeholder
 */

// タイトル欄のプレースホルダーを変更
 function my_custom_post_placeholder($title, $post) {
   if ('post' == $post->post_type) {
	 $title = 'お知らせのタイトルを入力';
   }
   return $title;
 }
 add_filter('enter_title_here', 'my_custom_post_placeholder', 10, 2);
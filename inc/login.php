<?php

/**
 * Login Logo
 */

// ログイン画面のロゴのリンク先を変更
function custom_login_logo_url() {
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'custom_login_logo_url');

// ロゴのtitle属性を変更
function custom_login_logo_title() {
	return get_bloginfo('name');
}
add_filter('login_headertitle', 'custom_login_logo_title');

// ログイン画面の背景色、フォームパネル等 CSS設定変更
function custom_login_style() {
	wp_enqueue_style(
		'custom-login',
		get_stylesheet_directory_uri() . '/dist/css/foundation/login.css'
	);
}
add_action('login_enqueue_scripts', 'custom_login_style');
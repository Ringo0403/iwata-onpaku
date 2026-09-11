<?php

/**
* Theme Support
*/

// titleタグ出力
add_theme_support('title-tag');

// アイキャッチ設定
add_theme_support('post-thumbnails');

/**
 * Navigation Menu
 */

// カスタムメニュー設定
register_nav_menus(array(
	'gnav' => 'メインナビ',
	'sp' => 'SPナビ',
));

/**
 * Cache Busting
 */

// css等の修正後に反映しないを防ぐ
function file_date($filename) {
	if (!file_exists($filename)) {
		return null;
	}
	return date('YmdHis', filemtime($filename));
}
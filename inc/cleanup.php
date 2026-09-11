<?php

/**
 * Head Cleanup
 */

// Windows Live Writerを使ってないので<head>内からリンクパスを削除
remove_action('wp_head', 'wlwmanifest_link');
// WordPress のバージョンはセキュリティー的に伏せた方が良いので削除
remove_action('wp_head', 'wp_generator');
// メインRSSフィードの削除
remove_action('wp_head', 'feed_links', 2);
// カテゴリーやコメント用RSSを削除
remove_action('wp_head', 'feed_links_extra', 3);
// RSDリンク
remove_action('wp_head', 'rsd_link');
// WordPressが自動出力する 短縮URL（Shortlink） の <link> タグを削除
remove_action('wp_head', 'wp_shortlink_wp_head');

/**
 * Emoji
 */

// window._wpemojiSettingsを消す
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
// 管理画面でも消す
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
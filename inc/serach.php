<?php

// 検索結果を本年度の投稿のみに絞る
function limit_search_to_current_year($query) {
	if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
		$current_year = date('Y'); // 本年度を取得
		$query->set('year', $current_year);
	}
}
add_action('pre_get_posts', 'limit_search_to_current_year');


// 検索にカスタムフィールドを含ませる
// 検索で全カスタムフィールドも対象にする
function custom_search_join( $join ) {
	global $wpdb;
	if ( is_search() ) {
		$join .= " LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id) ";
	}
	return $join;
}
add_filter( 'posts_join', 'custom_search_join' );

function custom_search_where( $where ) {
	global $wpdb;
	if ( is_search() ) {
		// タイトル検索部分に meta_value を追加
		$where = preg_replace(
			"/\(\s*$wpdb->posts.post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(".$wpdb->posts.".post_title LIKE $1)
			 OR (".$wpdb->posts.".post_content LIKE $1)
			 OR (".$wpdb->postmeta.".meta_value LIKE $1)",
			$where
		);
	}
	return $where;
}
add_filter( 'posts_where', 'custom_search_where' );

// 重複投稿を避けるため DISTINCT を追加
function custom_search_distinct( $distinct ) {
	if ( is_search() ) {
		return "DISTINCT";
	}
	return $distinct;
}
add_filter( 'posts_distinct', 'custom_search_distinct' );
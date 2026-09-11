<?php

/**
 * Menu Class
 */

function my_css_attributes_filter($var) {
	return is_array($var)
		? array_intersect($var, [
			'current-menu-item',
			'current-menu-parent',
			'current-page-ancestor',
			'current_page_item',
			'current-cat',
			'cat-item',
			'current_page_parent',
			'current',
			'current-page-parent',
			'archive',
			'single-post',
			'panelactive',
			'active',
			'openbtn',
			'icon-conditions',
			'icon-book',
			'icon-faq',
			'icon-report',
			'icon-minor',
			'icon-insta',
			'has-child',
		])
		: '';
}

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100);
add_filter('page_css_class', 'my_css_attributes_filter', 100);

/**
 * Category Class
 */

// wp_list_categoriesのclassにスラッグを含める方法 -------- > 改 daya-filter
 function add_cat_slug_class( $output, $args ) {
	 $regex = '/<li class="cat-item cat-item-([\d]+)[^"]*">/';
	 $taxonomy = isset( $args['taxonomy'] ) && taxonomy_exists( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';

	 preg_match_all( $regex, $output, $m );

	 if ( ! empty( $m[1] ) ) {
		 $replace = array();
		 foreach ( $m[1] as $term_id ) {
			 $term = get_term( $term_id, $taxonomy );
			 if ( $term && ! is_wp_error( $term ) ) {
				 $replace['/<li class="cat-item cat-item-' . $term_id . '("| )/'] = '<li data-filter=".' . esc_attr( $term->slug ) . '" class="filter cat-item cat-item-' . $term_id . ' cat-item-' . esc_attr( $term->slug ) . '$1';
			 }
		 }
		 $output = preg_replace( array_keys( $replace ), $replace, $output );
	 }
	 return $output;
 }
 add_filter( 'wp_list_categories', 'add_cat_slug_class', 10, 2 );

/**
 * Archive Class
 */
// 日付アーカイブのリストにclassを付ける
function my_archives_link($link_html) {
	if (preg_match_all('@' . preg_quote($_SERVER['REQUEST_URI']) . '@', $link_html)) {
		$link_html = str_replace('<li>', '<li class="current">', $link_html);
	}

	return $link_html;
}
add_filter('get_archives_link', 'my_archives_link');
<?php

/**
 * Title Separator
 */

 // titleタグの分割文字の出力
 function wp_document_title_separator($separator) {
	 return '| ';
 }
 add_filter('document_title_separator', 'wp_document_title_separator');

 /**
  * Auto Slug
  */

 // 自分でスラッグを英数字に変更したら何もしない。
 // 日本語などマルチバイトの場合は、{投稿タイプ}-{記事ID}に強制的に変更。
 // 記事投稿時に何もしなければ、投稿スラッグはpost-123のように記事IDに変更され、自分でスラッグを変更した場合はそのまま。
 // 過去記事については、記事を編集しない限りスラッグは変更されない。
 function auto_post_slug($slug, $post_ID, $post_status, $post_type) {
	 if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
		 $slug = utf8_uri_encode($post_type) . '-' . $post_ID;
	 }

	 return $slug;
 }
 add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);

 /**
  * Excerpt
  */

 //抜粋の代替え
 function new_excerpt_more($more) {
	 return ' ...';
 }
 add_filter('excerpt_more', 'new_excerpt_more');

 //抜粋の文字数
 function new_excerpt_mblength($length) {
	 return 80;
 }
 add_filter('excerpt_mblength', 'new_excerpt_mblength');

 /**
  * Conditional
  */

 //トップページにだけ表示したくない
 function is_not_home() {
	 return !is_front_page();
 }

 /**
  * 投稿日から7日間だけNEWマークを表示する関数
  */
 function add_new_mark_by_date() {
   // 表示期間を7日間に設定
   $days = 7;
   $today = date_i18n('U');
   $entry = get_the_time('U');
   $elapsed = date('U', ($today - $entry)) / 86400;

   // 7日以内の場合にマークを出力
   if ( $elapsed < $days ) {
	 echo '<span class="new">NEW</span>';
   }
 }


 // 年度別ページの作成
 // 年度別ページのリライトルー
 // 年度別ページ用リライトルール
 // 年度別ページ用リライトルール
 add_action('init', function() {
	 add_rewrite_rule(
		 'programs/year/([0-9]{4})/page/([0-9]+)/?$',
		 'index.php?pagename=program-year&program_year=$matches[1]&paged=$matches[2]',
		 'top'
	 );
	 add_rewrite_rule(
		 'programs/year/([0-9]{4})/?$',
		 'index.php?pagename=program-year&program_year=$matches[1]',
		 'top'
	 );
 });


 // program_year というクエリ変数を追加
 add_filter('query_vars', function($vars) {
	 $vars[] = 'program_year';
	 return $vars;
 });
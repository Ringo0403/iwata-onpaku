<?php

/**
 * パンくずリスト
 */

// パンくずリスト
function breadcrumb(){

	global $wp_query, $post;
		$str = "";
		$str.='<ul>'."\n";

			$str.='<li><a href="' . home_url('/') .'"><i class="fas fa-home"></i></a></li>'."\n";
			/* 検索結果ページ */
			if( is_search() ){

				$total_results = $wp_query->found_posts;
				$current_year = date('Y'); // 本年度を取得

				$str .= '<li>「'. get_search_query() .'」で検索した結果（' . $current_year . '年度のみ）、'. $total_results .'件見つかりました。</li>'."\n";

				wp_reset_postdata();
			}

			/* タグページ */
			elseif( is_tag() ){

				$str.='<li><a href="'. home_url('/') . 'news">新着一覧</a></li>'."\n";

				$str.='<li>タグ : '.single_tag_title( '' , false ) . '</li>'."\n";

			}

			/* 404 Not Found ページ */
			elseif( is_404() ){

				$str.='<li>404 Not found</li>'."\n";

			}

			/* 時系列アーカイブページ */
			elseif( is_date() ){

				$str.='<li><a href="' . home_url('/') .'news">新着一覧</a></li>'."\n";

				/* 日付別アーカイブページ */
				if( is_day() ){

					$str.='<li><a href="' . get_year_link(get_query_var('year')) .'">' . get_query_var('year') . '年</a></li>'."\n";

					$str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')) .'">'. get_query_var('monthnum') .'月</a></li>'."\n";

					$str.='<li>' . get_query_var('day') . '日</li>'."\n";

				}

				/* 月別アーカイブページ */
				elseif( is_month() ){

					$str.='<li><a href="' . get_year_link(get_query_var('year')) .'">' . get_query_var('year') .'年</a></li>'."\n";

					$str.='<li>' .  get_query_var('monthnum') .'月</li>'."\n";

				}

				/* 年別アーカイブページ */
				elseif( is_year() ){

					$str.='<li>' . get_query_var('year') . '年</li>'."\n";

				}

			}

			/* 新着一覧のカテゴリーページ */
			elseif( is_category() ){

				$total_results = $wp_query->found_posts;

				$str.='<li><a href="' . home_url('/') .'news">新着一覧</a></li>'."\n";

				$cat = get_queried_object();

				if($cat -> parent != 0){

					$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));

					foreach($ancestors as $ancestor){

						$str.='<li><a href="' . get_category_link($ancestor) .'">' . get_cat_name($ancestor) .'</a></li>'."\n";

					}

				}

				$str.='<li>' . $cat -> cat_name .'（' . $total_results .'件見つかりました）</li>'."\n";

				wp_reset_postdata();

			}

			/* 投稿者ページ */
			elseif( is_author() ){

				$str.='<li><a href="' . home_url('/') . 'news">新着一覧</a></li>'."\n";

				$str.='<li>投稿者 : ' .  get_the_author_meta('display_name', get_query_var('author')) . '</li>'."\n";

			}

			/* 新着一覧のメインページ */
			elseif( is_home() ){

				$str.='<li>新着一覧</li>';

			}

			/* 固定ページ */
			elseif( is_page() ){

				if($post -> post_parent != 0 ){

					$ancestors = array_reverse( $post-> ancestors );

					foreach($ancestors as $ancestor){

						$str .='<li><a href="' . get_permalink($ancestor) .'">'. get_the_title($ancestor) . '</a></li>'."\n";

					}

				}

				$str.='<li>' . $post -> post_title . '</li>'."\n";

			}

			/* 新着一覧の個別ページ */
			elseif( is_singular('post') ){

				$str.='<li><a href="' . home_url('/') . 'news">新着一覧</a></li>'."\n";
				$categories = get_the_category($post->ID);

				$cat = $categories[0];

				if($cat -> parent != 0){

					$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));

					foreach($ancestors as $ancestor){

						$str.='<li><a href="' . get_category_link($ancestor) . '">' . get_cat_name($ancestor) .'</a></li>'."\n";
					}

				}

				$str.='<li><a href="' . get_category_link($cat -> cat_ID) .'">' . $cat-> cat_name .'</a></li>'."\n";
				$str.='<li>' . $post -> post_title . '</li>'."\n";

			}

			/* プログラム：アーカイブページ */
			elseif( is_post_type_archive('program') ){
				$str.="<li>プログラム</li>"."\n";
			}

			/* プログラム：シングルページ */
			elseif( is_singular( 'program') ){
				$str.='<li><a href="' . home_url('/') .'programs/">プログラム</a></li>'."\n";
				$terms = get_the_terms( $post->ID, 'cate_prg' );
					if ( $terms ){
						$term = array_shift($terms);
						$str.='<li><a href="' . get_term_link( $term, 'cate_prg' ) . '">' . $term -> name .'</a></li>'."\n";
					}
				$str.= '<li>'. single_post_title( '' , false ).'</li>'."\n";
			}

			/* プログラム：タクソノミーページ */
			elseif( is_tax( 'cate_prg') ){
				$str.='<li><a href="' . home_url('/') .'programs/">プログラム</a></li>'."\n";
				$str.='<li>' . single_cat_title( '' , false ) . '</li>'."\n";

			}

			/* プログラム：タクソノミーページ */
			elseif( is_tax( 'key_prg') ){
				$str.='<li><a href="' . home_url('/') .'programs/">プログラム</a></li>'."\n";
				$str.='<li>' . single_cat_title( '' , false ) . '</li>'."\n";

			}

			/* その他のページ */
			else{
				$str.='<li>' . wp_title('', true) .'</li>'."\n";
			}
		$str.='</ul>'."\n";

	echo $str;

}
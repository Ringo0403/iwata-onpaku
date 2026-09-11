<?php
/*
 * 検索結果
*/
?>

<?php get_header(); /* header */ ?>

<section class="container p-prg-single">
	<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	// 今年度の開始と終了（年度は4月始まり）
	$year  = date('Y');
	$month = date('n');
	if ($month >= 4) {
		$start_date = "$year-04-01";
		$end_date   = ($year + 1) . "-03-31";
	} else {
		$start_date = ($year - 1) . "-04-01";
		$end_date   = "$year-03-31";
	}

	// 検索ワード
	$search_query_text = get_search_query();

	// タクソノミー絞り込み（カスタム投稿 program 用）
	$tax_query = array();
	$cate_prg = get_query_var('cate_prg');
	if ( $cate_prg ) {
		$tax_query[] = array(
			'taxonomy' => 'cate_prg',
			'field'    => 'slug',
			'terms'    => array($cate_prg),
			'operator' => 'IN',
		);
	}

	// WP_Query の作成
	$args = array(
		'post_type'      => array('program','post','page'), // 固定ページも対象
		's'              => $search_query_text,
		'posts_per_page' => 10,
		'paged'          => $paged,
		'date_query'     => array(
			array(
				'after'     => $start_date,
				'before'    => $end_date,
				'inclusive' => true,
			),
		),
	);

	// tax_query が空でなければ追加
	if ( !empty($tax_query) ) {
		$args['tax_query'] = $tax_query;
	}

	$search_query = new WP_Query($args);
	?>

	<h2 class="u-h2--primary">Search<span>「<?php echo esc_html(get_search_query()); ?>」の検索結果：<?php echo $search_query->found_posts; ?></h2>



	 <?php if ( $search_query->have_posts() ) : ?>
		 <ul class="p-result">
		 <?php while ( $search_query->have_posts() ) : $search_query->the_post(); ?>
			 <li class="p-result__pbox">

				 <h3 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php if ( 'post' === get_post_type() ) : ?>
					<p><time><?php the_time( get_option( 'date_format' ) ); ?></time></p>
				<?php endif; ?>

				 <?php
				 if ( has_excerpt() ) {
					 echo '<p>' . get_the_excerpt() . '</p>';
				 } else {
					 the_content();
				 }
				 ?>
				 <?php if ( $doc = get_field('doc') ) : ?>
					<p>
						<?php
						$doc = strip_tags($doc);
						if ( mb_strlen($doc) > 100 ) {
							echo mb_substr($doc, 0, 100).'…';
						} else {
							echo $doc;
						}
						?>
					</p>
				 <?php endif; ?>

				 <!-- ACF Repeater: faq の表示 -->
				 <?php if( have_rows('faq') ): ?>
				 <?php while( have_rows('faq') ): the_row();
					 $q = get_sub_field('q');
					 $a = get_sub_field('a');

					 // 100文字以上なら省略
					 $a_display = strip_tags($a);
					 if( mb_strlen($a_display) > 100 ) {
						 $a_display = mb_substr($a_display, 0, 100) . '…';
					 }
				 ?>

				  <p>
				  <strong>Q: <?php echo esc_html($q); ?></strong><br>
				  A: <?php echo esc_html($a_display); ?>
				   </p>
				   <?php endwhile; ?>
				   <?php endif; ?>
				   <!-- // END ACF Repeater: faq の表示 -->
			 </li>
		 <?php endwhile; ?>
		 </ul>
		 <?php
			 // ページャーは wp_reset_postdata() の前に！
			 if ( function_exists("pagenation_func") && $search_query->max_num_pages > 1 ) {
				 pagenation_func(
					 3,
					 "pagenation",
					 "<i class='fa-solid fa-circle-chevron-left fa-fw fa-lg'></i>",
					 "<i class='fa-solid fa-circle-chevron-right'></i>",
					 $search_query // ← 必ず渡す
				 );
			 }
			 ?>

		 <?php else: ?>
			 <p>該当する記事がございません。</p>
		 <?php endif; ?>

		 <?php wp_reset_postdata(); ?>
	</section>

<?php get_footer(); /* footer */ ?>
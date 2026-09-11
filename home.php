<?php
/*
 * information
*/
?>

<?php get_header(); // header ?>

<section class="container p-prg-single">
	<h2 class="u-h2--primary">news<span>新着一覧</span></h2>

	<ul class="p-info-list">
	<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 10,  // 1ページに10件
		'paged'          => $paged,
	);

	$custom_query = new WP_Query($args);

	if ($custom_query->have_posts()):
		while ($custom_query->have_posts()): $custom_query->the_post(); ?>
			<li>
				<div class="p-info-list__thumb">
					<img src="<?php echo catch_that_image(); ?>" >
				</div>
				<div class="p-info-list__date">
					<p><span><?php the_category('/'); ?></span><?php the_time('Y年m月d日'); ?></p>
				</div>
				<div class="p-info-list__title">
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				</div>
			</li>
		<?php endwhile;
	else: ?>
		<li><h5>まだ投稿がありません。</h5></li>
	<?php endif; ?>
	</ul>

	<?php
	// ページャーを表示する場合、max_num_pages をチェックして不要なリンクを表示させない
	if ( function_exists("pagenation_func") && $custom_query->max_num_pages > 1 ) {
		pagenation_func(
			3,
			"pagenation",
			"<i class='fa-solid fa-circle-chevron-left fa-fw fa-lg'></i>",
			"<i class='fa-solid fa-circle-chevron-right'></i>"
		);
	}
	wp_reset_postdata();
	?>

</section>

<?php get_footer(); // Footer ?>
<?php
/*
 * archive プログラム一覧 年別（本年除外）
*/
?>

<?php get_header(); ?>

<section class="container">
	<h2 class="u-h2--primary">program<span>過去のいわたおんぱく</span></h2>

	<?php
	// 今日の年計算（1月〜12月基準）
	$current_year = (int) date('Y');

	// URLから選択されている年を取得（int型にキャストして比較精度を上げる）
	$selected_year = get_query_var('program_year') ? (int) get_query_var('program_year') : null;

	global $wpdb;
	// 投稿から取得できる年一覧（1月〜12月基準）
	$years = $wpdb->get_col("
		SELECT DISTINCT
			YEAR(post_date) AS fy
		FROM {$wpdb->posts}
		WHERE post_type = 'program' AND post_status = 'publish'
		ORDER BY fy DESC
	");

	// 本年を除外
	$years = array_filter($years, fn($y) => $y < $current_year);

	if (!empty($years)): ?>
		<div class="p-cate-area u-mb--6">
			<ul class="p-nendo">
				<?php foreach ($years as $y): ?>
					<?php $y = (int)$y; // 比較用にキャスト ?>
					<li>
						<a href="<?php echo esc_url(home_url("/programs/year/{$y}/")); ?>"
						   <?php if ($selected_year === $y) echo 'class="current"'; ?>>
							<?php echo esc_html($y); ?>年
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php
	// ページネーション用
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$per_page = wp_is_mobile() ? 5 : 12;

	// 本年除外 & 選択年の投稿を取得
	$date_query = [
		[
			'before'    => "{$current_year}-01-01",
			'inclusive' => false
		]
	];

	if ($selected_year) {
		$date_query[] = [
			'after'     => "{$selected_year}-01-01",
			'before'    => "{$selected_year}-12-31",
			'inclusive' => true
		];
	}

	$args = [
		'post_type'      => 'program',
		'posts_per_page' => $per_page,
		'paged'          => $paged,
		'meta_key'       => 'num',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
		'date_query'     => [
			'relation' => 'AND',
		] + $date_query
	];

	$query = new WP_Query($args);
	?>

	<ul class="p-prglist">
		<?php if ($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
			<li>
				<figure>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php $image = get_field('image'); ?>
						<?php if (!empty($image)) : ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>" />
						<?php else : ?>
							<img src="<?php echo esc_url(get_template_directory_uri() . '/images/common/now-printing.png'); ?>" alt="<?php the_title(); ?>" />
						<?php endif; ?>
					</a>
				</figure>
				<div class="p-prglist__title">
					<h3 class="p-prglist__number-title">
						<span>program</span><?php echo esc_html(get_field('num')); ?>
					</h3>
					<h4>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h4>
				</div>
				<div class="p-prglist__date">
					<h5><?php echo wp_kses_post(get_field('date')); ?></h5>
				</div>
				<div class="p-prglist_desc">
					<p><?php echo mb_substr(get_post_meta(get_the_ID(), 'doc', true), 0, 100) . '...'; ?></p>
				</div>
			</li>
		<?php endwhile; else: ?>
			<p class="u-align__left">※まだ登録がありません。</p>
		<?php endif; ?>
	</ul>

	<?php
	if(function_exists("pagenation_func")){
		pagenation_func(3, "pagenation", "<i class='fa-solid fa-circle-chevron-left fa-fw fa-lg'></i>", "<i class='fa-solid fa-circle-chevron-right'></i>", $query);
	}
	wp_reset_postdata();
	?>
</section>

<?php get_footer(); ?>
<?php
/*
 * taxonomy カテゴリ
*/
?>


<?php get_header(); // header ?>

<section class="container">
	<h2 class="u-h2--primary">program<span><?php single_term_title(); ?></span></h2>
	<div class="p-cate-area u-mb--6">
		<div>
			<ul class="p-cate-list">
				<li class="p-cate-list__cate1"><a href="<?php echo home_url();?>/cate_prg/cat_special/">Iwata ON-Paku Special<br><span>いわたおんぱくスペシャル</span></a></li>
				<li class="p-cate-list__cate2"><a href="<?php echo home_url(); ?>/cate_prg/cat_adv/">ちょっとアドベンチャー<br><span>アクティビティ＆自然体験</span></a></li>
				<li class="p-cate-list__cate3"><a href="<?php echo home_url(); ?>/cate_prg/cat_history/">いわたの歴史を紐解くプログラム<br><span>道・伝統・廃寺・集落・祭り</span></a></li>
				<li class="p-cate-list__cate4"><a href="<?php echo home_url(); ?>/cate_prg/cat_art/">ミュージアム・セレクション２選＆創作ラボ<br><span>～アート＆クラフト</span></a></li>
			</ul>
		</div>
		<div>
			<ul class="p-cate-list">
				<li class="p-cate-list__cate5"><a href="<?php echo home_url(); ?>/cate_prg/cat_sports/"><span>みんな集まれ！</span><br>スポーツ＆体験型交流プログラム</a></li>
				<li class="p-cate-list__cate6"><a href="<?php echo home_url(); ?>/cate_prg/cat_exp/"><span>心地よい自分に出会う！</span><br>ウェルビーイング＆ウェルネス体験</a></li>
				<li class="p-cate-list__cate7"><a href="<?php echo home_url(); ?>/cate_prg/cat_seminar/">学び・活用・育てるセミナー</a></li>
				<li class="p-cate-list__cate8"><a href="<?php echo home_url(); ?>/cate_prg/cat_eat/"><span>お客様と共有する食の悦びと文化</span><br>地元レストラン＆カフェの挑戦</a></li>
			</ul>
		</div>
	</div>

<?php
	$current_year = date('Y'); // 今年の西暦
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	if ( wp_is_mobile() ) :
		global $wp_query;
		$args = array_merge(
			$wp_query->query,
			array(
				'posts_per_page' => 5,
				'paged'          => $paged,
				'meta_key'       => 'num',
				'orderby'        => 'meta_value_num',
				'order'          => 'ASC',
				'date_query'     => array(
					array(
						'year' => $current_year, // 投稿年で絞り込み
					),
				),
			)
		);
		query_posts( $args );
	else :
		global $wp_query;
		$args = array_merge(
			$wp_query->query,
			array(
				'posts_per_page' => 12,
				'paged'          => $paged,
				'meta_key'       => 'num',
				'orderby'        => 'meta_value_num',
				'order'          => 'ASC',
				'date_query'     => array(
					array(
						'year' => $current_year, // 投稿年で絞り込み
					),
				),
			)
		);
		query_posts( $args );
	endif;
	?>



	<ul class="p-prglist">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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
					<h3 class="p-prglist__number-title"><span>program</span><?php echo esc_html(get_field('num')); ?></h3>
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				</div>
				<div class="p-prglist__date">
					<h5><?php echo wp_kses_post(get_field('date')); ?></h5>
				</div>
				<div class="p-prglist_desc">
					<p><?php echo mb_substr( get_post_meta( get_the_ID(), 'doc', true ), 0, 100 ) . '...'; ?></p>
				</div>
			</li>
		<?php endwhile; ?>
	<?php else : ?>
		<p class="u-align__left">※まだ登録がありません。</p>
	<?php endif; ?>
	</ul>

	<?php wp_reset_postdata(); ?>



<?php if(function_exists("pagenation_func")){pagenation_func(3,"pagenation","<i class='fa-solid fa-circle-chevron-left fa-fw fa-lg'></i>","<i class='fa-solid fa-circle-chevron-right'></i>");} ?>
</section>


<?php get_footer(); ?>
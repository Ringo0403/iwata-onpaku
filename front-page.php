<?php
/*
 * トップページ
*/
?>

<?php get_header(); // header ?>
<?php if(get_field('check') == true): // check ?>
<!-- 告知 -->
<div class="container u-mb--5">
	<div class="p-kokuchi-box">
		<h4><?php echo esc_html( get_field('kokuchi_title') ); ?></h4>
		<p><?php echo wp_kses_post( get_field('kokuchi_doc') ); ?></p>
	</div>
</div>
<!-- // END 告知 -->
<?php endif; ?>

<?php if(get_field('check_2') == true): // check ?>
<!-- banner -->
<?php
$banner = get_field('banner');

if (
	$banner &&
	! empty( $banner['image'] ) &&
	! empty( $banner['image_sp'] ) &&
	! empty( $banner['banner_link'] )
) :
?>
<div class="container p-banner u-mb--5">

	<a href="<?php echo esc_url( $banner['banner_link'] ); ?>">

		<img src="<?php echo esc_url( $banner['image']['url'] ); ?>" alt="<?php echo esc_attr( $banner['image']['alt'] ); ?>" class="u-only--tab" />

		<img src="<?php echo esc_url( $banner['image_sp']['url'] ); ?>" alt="<?php echo esc_attr( $banner['image_sp']['alt'] ); ?>" class="u-only--sp-tab" />

	</a>

</div>
<?php endif; ?>
<!-- // END banner -->
<?php endif; // check ?>


<!-- ピックアップイベント -->
<section>
	<div class="container u-mb--0">
		<h2 class="u-h2--top">pick up<span>ピックアップイベント</span></h2>
	</div>
	<!-- スマホではdisplay: contentsとする -->
	<div class="container u-dcontnets">
		<div>
			<?php
				$featured_posts = get_field('featured_posts');
				if( $featured_posts ): ?>
			<ul class="u-slider--pu">
				<?php foreach( $featured_posts as $post ): setup_postdata($post); ?>
				<li>
					<figure>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php $image = get_field('image'); ?>
							<?php if ( !empty($image) ) : ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
							<?php else : ?>
							<img src="<?php echo esc_url(get_template_directory_uri() . '/images/common/now-printing.png'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
							<?php endif; ?>
						</a>
					</figure>
					<div class="p-prglist__title">
						<table>
							<tr>
								<th>
									<h3 class="p-prglist__number-title"><span>program</span><?php echo esc_html(get_field('num')); ?></h3>
								</th>
								<td>
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
								</td>
							</tr>
						</table>
					</div>
					<div class="p-prglist__date">
						<h5><?php echo wp_kses_post(get_field('date')); ?></h5>
					</div>
				</li>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php else : ?>
			<ul class="u-slider--pu">
				<li>登録がありません</li>
			</ul>
			<?php endif; ?>

		</div>
		<div class="c-btn-width">
			<a href="<?php echo home_url(); ?>/programs/" title="プログラム一覧を見る"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-prg-list.svg" alt="プログラム一覧を見る"></a>
		</div>
	</div>
	<!-- // END スマホではdisplay: contentsとする -->
</section>
<!-- // END ピックアップイベント -->

<!-- NEWS -->
<section>
	<div class="container u-mb--0">
		<h2 class="u-h2--top">news<span>お知らせ</span></h2>

		<ul class="p-info-list">

			<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 3
			);

			$news_query = new WP_Query($args);

			if($news_query->have_posts()):
				while($news_query->have_posts()):
				$news_query->the_post();
			?>

			<li>
				<div class="p-info-list__thumb">
					<img src="<?php echo catch_that_image(); ?>" alt="<?php the_title_attribute(); ?>" />
				</div>

				<div class="p-info-list__date">
					<p>
						<span><?php the_category('/'); ?></span>
						<?php the_time('Y.m.d'); ?>
					</p>
				</div>
				<div class="p-info-list__title">
					<a href="<?php the_permalink(); ?>" title="">
						<h5><?php the_title(); ?></h5>
					</a>
				</div>
			</li>

			<?php
				endwhile;
			else:
			?>

			<li>
				<div class="title">まだ投稿がありません。</div>
			</li>

			<?php endif; wp_reset_postdata(); ?>

		</ul>

		<div class="c-btn-width">
			<a href="<?php echo home_url('/news/'); ?>" title="お知らせ一覧を見る">
				<img src="<?php bloginfo('template_url'); ?>/images/common/btn-news-list.svg" alt="お知らせ一覧を見る">
			</a>
		</div>

	</div>
</section>
<!-- // END NEWS -->

<!-- カテゴリボタン -->
<div class="c-box-bg--gray u-mb--6">
	<section class="container">
		<h2 class="u-h2--top">category<span>カテゴリー</span></h2>
		<p><?php echo wp_kses_post( get_field('cate_lead') ); ?></p>
		<!-- categoryボタン -->
		<ul class="c-category-grid">
			<li class="itme1">
				<a href="<?php echo home_url();?>/cate_prg/cat_special/" title="いわたおんぱくスペシャル">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-special-pc.svg" alt="いわたおんぱくスペシャル" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-special-sp.svg" alt="いわたおんぱくスペシャル" class="u-only--sp-tab">
				</a>
			</li>
			<li class="item2">
				<a href="<?php echo home_url(); ?>/cate_prg/cat_adv/" title="ちょっとアドベンチャー">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-adv-pc.svg" alt="ちょっとアドベンチャー" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-adv-sp.svg" alt="ちょっとアドベンチャー" class="u-only--sp-tab">
				</a>
			</li>
			<li class="item3">
				<a href="<?php echo home_url(); ?>/cate_prg/cat_history/" title="いわたの歴史を紐解く体験">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-his-pc.svg" alt="いわたの歴史を紐解く体験" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-his-sp.svg" alt="いわたの歴史を紐解く体験" class="u-only--sp-tab">
				</a>
			</li>
			<li class="item4">
				<a href="<?php echo home_url(); ?>/cate_prg/cat_exp/" title="ウェルビーイング&セルフケア体験">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-well-pc.svg" alt="ウェルビーイング&セルフケア体験" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-well-sp.svg" alt="ウェルビーイング&セルフケア体験" class="u-only--sp-tab">
				</a>
			</li>
			<li class="item5">
				<a href="<?php echo home_url(); ?>/cate_prg/cat_eat/" title="食と農の体験プログラム">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-agriculture-pc.svg" alt="食と農の体験プログラム" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-agriculture-sp.svg" alt="食と農の体験プログラム" class="u-only--sp-tab">
				</a>
			</li>
			<li class="item6">
				<a href="<?php echo home_url(); ?>/cate_prg/cat_sports/" title="スポーツ体験&体験型交流会">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-sports-pc.svg" alt="スポーツ体験&体験型交流会" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-sports-sp.svg" alt="スポーツ体験&体験型交流会" class="u-only--sp-tab">
				</a>
			</li>
			<li class="item7">
				<a href="<?php echo home_url(); ?>/cate_prg/cat_art/" title="発見と創造の体験">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-art-pc.svg" alt="発見と創造の体験" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-art-sp.svg" alt="発見と創造の体験" class="u-only--sp-tab">
				</a>
			</li>
			<li class="item8">
				<a href="<?php echo home_url(); ?>/cate_prg/cat_seminar/" title="暮らし・学びのセミナー">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-seminar-pc.svg" alt="暮らし・学びのセミナー" class="u-only--tab">
					<img src="<?php echo get_template_directory_uri(); ?>/images/top/btn-seminar-sp.svg" alt="暮らし・学びのセミナー" class="u-only--sp-tab">
				</a>
			</li>
		</ul>
		<!-- // END categoryボタン -->
	</section>
</div>
<!-- // END テゴリボタン -->

<!-- insta -->
<section class="container u-mb--6">
	<h2 class="u-h2--top">instagram<span>インスタグラム</span></h2>
	<div class="embedsocial-hashtag" data-ref="bbaa00e2cddb74e69dab09216a273ab0e3d4e113"><a class="feed-powered-by-es feed-powered-by-es-slider-img" href="https://embedsocial.jp/" target="_blank" title="EmbedSocialによるウィジェット"><img src="https://embedsocial.com/cdn/images/embedsocial-icon.png" alt="EmbedSocial"> Instagram widget </a></div>
	<script>
		(function(d, s, id) {
			var js;
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "https://embedsocial.com/cdn/ht.js";
			d.getElementsByTagName("head")[0].appendChild(js);
		}(document, "script", "EmbedSocialHashtagScript"));
	</script>

	<div class="c-btn-width">
		<a href="https://www.instagram.com/iwata_onpaku/" title="インスタグラムを見る" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-insta.svg" alt="インスタグラムを見る"></a>
	</div>
</section>
<!-- // END insta -->

<?php get_footer(); // Footer ?>
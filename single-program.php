<?php
/*
 * single プログラム
*/
?>

<?php get_header(); // header ?>

<section class="container p-prg-single">
	<h3 class="u-number-title"><span>program</span><?php echo esc_html( get_field('num') ); ?></h3>
	<div class="p-categoryname">
		<?php
		$terms = get_the_terms($post->ID, 'cate_prg');
		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a> ';
			}
		}
		?>
	</div>

	<article class="u-mb--6">
		<h2 class="u-prg-title"><?php the_title(); ?></h2>
		<!-- 日付 -->
		<div class="p-datebox">
			<div class="p-datebox__date">
				<p><?php echo wp_kses_post( get_field('date') ); ?></p>
			</div>
			<?php if(get_field('url_aki')): ?>
			<div class="p-datebox__link">
				<p><a href="<?php echo esc_attr( get_field('url_aki') ); ?>" target="_blank">希望の空席確認・予約をする</a></p>
			</div>
			<?php endif; ?>
		</div>
		<!-- // END 日付 -->

		<div class="p-prg-img">
			<?php
			$image = get_field('image');
			if( !empty( $image ) ):
				$caption = $image['caption'];
				 ?>
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>" />
					<?php if( $caption ): ?>
					<p><?php echo esc_html($caption); ?></p>
					<?php endif; ?>
				<?php else: ?>
				<img src="<?php bloginfo('template_url'); ?>/images/common/now-printing.png" alt="<?php the_title(); ?>" />

			<?php endif; ?>
		</div>

		<div class="c-grid c-gap40-56">
			<div class="u-span-7 p-prg-sub-title">
				<h3><?php echo esc_html( get_field('title') ); ?></h3>
				<p><?php echo wp_kses_post( get_field('doc') ); ?></p>

				<?php if( have_rows('file_dl') ): ?>
				<!-- PDF -->
				<ul class="p-file-dl">
					<?php while( have_rows('file_dl') ): the_row();
					$file = get_sub_field('file');
					$file_name = get_sub_field('file_name');
					?>
						<li><a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $file_name; ?></a></li>
						<?php endwhile; ?>
				</ul>
				<!-- // END PDF -->
				<?php endif; ?>
			</div>
			<div class="u-span-5 p-prg-sub-img">
				<?php
				$sub_img = get_field('sub_img');
				if( !empty( $sub_img ) ): ?>
					<img src="<?php echo esc_url($sub_img['url']); ?>" alt="<?php echo esc_attr($sub_img['alt']); ?>" />
					<?php else: ?>
					<img src="<?php bloginfo('template_url'); ?>/images/common/now-printing.png" alt="<?php the_title(); ?>" />
				<?php endif; ?>
			</div>
		</div>
	</article>

	<article class="u-mb--6">
		<h3 class="u-h3-white">実施条件</h3>
		<div class="p-editor--nborder">
			<?php echo wp_kses_post( get_field('doc_2') ); ?>
		</div>
	</article>

	<article class="u-mb--6">
		<h3 class="u-h3-white">開催場所・集合場所</h3>
		<div class="c-grid c-gap40-56">
			<div class="u-span-6">
				<div class="gmap">
					<?php echo get_field('gmap'); ?>
				</div>
			</div>
			<div class="u-span-6">
				<p><?php echo wp_kses_post( get_field('doc_3') ); ?></p>
			</div>
		</div>
	</article>
<?php if( have_rows('reserve_dates') ): ?>
<article class="u-mb--6">
	<?php else: ?>
<article class="u-mb--6 u-pb--5">
<?php endif; ?>
	<h3 class="u-h3-white">お申し込み・問い合わせ先</h3>
	<table class="c-table--dotted">
		<tr>
			<th>申込先</th>
			<td><?php echo wp_kses_post( get_field('td_1') ); ?></td>
		</tr>
		<?php if(get_field('link_url')): ?>
		<tr>
			<th>申込先URL</th>
			<td><a href="<?php echo esc_attr( get_field('link_url') ); ?>" target="_blank"><?php echo esc_attr( get_field('link_url') ); ?></a></td>
		</tr>
		<?php endif; ?>
		<tr>
			<th>お問い合わせ先</th>
			<td><?php echo wp_kses_post( get_field('td_2') ); ?></td>
		</tr>
		<tr>
			<th>主催・担当</th>
			<td><?php echo wp_kses_post( get_field('td_3') ); ?></td>
		</tr>
	</table>
	<?php if( have_rows('reserve_dates') ): ?>
	<div class="p-select-area">
	  <div>
		<label for="date-select">開催日時</label>
		<div class="selectbox">
		  <select name="kaisaibi" id="date-select">
			<option value="">選択して下さい</option>

			  <?php while( have_rows('reserve_dates') ): the_row();
				$date_text = get_sub_field('date_text');
				$time = get_sub_field('time');
				$reserve_url = get_sub_field('reserve_url');
			  ?>
				<option value="<?php echo esc_url($reserve_url); ?>">
				  <?php echo esc_html($date_text); ?><?php if($time): ?> - <?php echo esc_html($time); ?><?php endif; ?>
				</option>
			  <?php endwhile; ?>
		  </select>
		</div>
	  </div>
	  <div>
		<div class="c-btn-width">
		  <a href="#" id="reserve-button" title="選択日時で参加予約をする">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/btn-yoyaku.svg" alt="選択日時で参加予約をする">
		  </a>
		</div>
	  </div>
	</div>
	<?php endif; ?>
</article>
</section>

<?php if(get_field('url_aki')): ?>
<!-- 空席確認・予約する -->
<div class="c-icon-float">
	<a href="<?php echo esc_attr( get_field('url_aki') ); ?>" target="_blank" title="空席確認・予約する">
	<img src="<?php bloginfo('template_url'); ?>/images/common/icon-yoyaku.svg" alt="空席確認・予約する" class="u-mt--1">
	</a>
</div>
<!-- // END 空席確認・予約する -->
<?php endif; ?>

<?php get_footer(); // Footer ?>
<?php
/*
 * いわたおんぱくとは？
*/
?>

<section class="container">
	<h3 class="h3-center-keycolor"><?php echo esc_html(get_field('title_1')); ?></h3>
	<div class="p-concept-bg">
		<h4 class="u-h4-center--blue"><?php echo esc_html(get_field('title_2')); ?></h4>
		<p class="u-align-sp-only u-mb--0"><?php echo wp_kses_post(get_field('doc_1')); ?></p>
		<p class="u-align-sp-only u-br-none"<?php echo wp_kses_post(get_field('doc_2')); ?></p>
	</div>
	<?php if( have_rows('concept') ): ?>
		<?php
			$loopcounter = 0; // 空文字ではなく0からスタート
		?>
		<?php while( have_rows('concept') ): the_row(); $loopcounter++;
		$image = get_sub_field('image');
		$title = get_sub_field('title');
		$catch = get_sub_field('catch');
		$doc = get_sub_field('doc');
		?>
	<article class="p-concept-box">
		<h2 class="concept-title blue"><?php echo sprintf("%02d", $loopcounter); ?><br><?php echo $title; ?></h2>
		<?php if( !empty( $image ) ): ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
		<div class="text-box">
			<h3 class="h3_highlight"><?php echo $catch; ?></h3>
			<p><?php echo $doc; ?></p>
		</div>
	</article>
	<?php endwhile; ?>
	<?php endif; ?>
</section>
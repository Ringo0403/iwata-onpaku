<?php
/*
 * hero
*/
?>

<?php if(is_page('top')): ?>
<!-- hero -->
<div class="p-hero">
	<div class="u-only--tab">
		<?php
		$hero_pc = get_field('hero_pc');
		if( !empty( $hero_pc ) ): ?>
		<img src="<?php echo esc_url($hero_pc['url']); ?>" alt="<?php echo esc_attr($hero_pc['alt']); ?>">
		<?php endif; ?>
	</div>
	<div class="u-only--sp-tab container">
		<?php
		$hero_sp = get_field('hero_sp');
		if( !empty( $hero_sp ) ): ?>
		<img src="<?php echo esc_url($hero_sp['url']); ?>" alt="<?php echo esc_attr($hero_sp['alt']); ?>">
		<?php endif; ?>
	</div>

	<?php
	$images = get_field('loop_slides');
	if( $images ): ?>
	<!-- loop slide -->
	<div class="l-roopslide-wrap">
		<div class="swiper loopswiper">
			<div class="swiper-wrapper">
				<?php foreach( $images as $image ): ?>
				<div class="swiper-slide">
					<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- // END loop slide -->
	<?php endif; ?>
</div>
<!-- // END hero -->
<?php endif; ?>

<?php if(!is_page('top')): ?>
<!-- パンくず -->
<div class="pankuzu container">
	<?php breadcrumb(); /* パンくずリスト */ ?>
</div>
<!-- // END パンくず -->
<?php endif; ?>
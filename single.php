<?php
/*
 * single
*/
?>

<?php get_header(); // header ?>

<section class="container p-prg-single">
	<h2 class="u-h2--primary">news<span>新着一覧</span></h2>
	<!-- editor -->
	<article class="p-editor">
		<p class="p-editor__date"><span><?php the_category('/'); ?></span><?php the_time( 'Y.m.d' ); ?></p>
		<h3 class="p-editor__title"><?php the_title(); ?></h3>

		<?php if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>

	</article>
	<!-- // END editor -->
	<div class="u-align--center">
		<div class="c-btn__back">
			<a href="<?php echo home_url(); ?>/news/">一覧ページへ</a>
		</div>
	</div>
</section>

<?php get_footer(); // Footer ?>
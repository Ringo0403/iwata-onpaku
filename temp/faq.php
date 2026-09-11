<?php
/*
 * よくある質問
*/
?>

<section class="container p-prg-single">
	<h2 class="u-h2--primary">faq<span>よくある質問</span></h2>

	<!-- アコーディオン -->
	<dl class="p-accordion">
	<?php if( have_rows('faq') ): ?>
		<?php while( have_rows('faq') ): the_row();
		$q = get_sub_field('q');
		$a = get_sub_field('a');
		?>
	  <div class="p-accordion__item">
		<dt class="p-accordion__title js-accordion-trigger">
		  <span class="p-accordion__text"><?php echo $q; ?></span>
		</dt>
		<dd class="p-accordion__content"><span><?php echo $a; ?></span></dd>
	  </div>
	  <?php endwhile; ?>
	  <?php endif; ?>
	</dl>

	<!-- // END アコーディオン -->
</section>
<?php
/*
 * 404Error
*/
?>

<?php get_header(); /* header */ ?>

<section class="container u-mb--6">
	<h2 class="u-h2--primary">404 Not found.<span>お探しのページが見つかりません</span></h2>
	<article>
		<p>あなたがアクセスしようとしたページが見つかりませんでした。<br>ご覧になっていたページからのリンクが無効になっているか、削除されてしまったのかもしれません。</p>
		<p class="mb-5">We are sorry, the object you requested was not found on this server.<br> We recommend that see Site Map or enter Keywords into the search box.</p>
		<hr class="u-mb--3">
		<div class="c-btn--primary"><a href="<?php echo home_url(); ?>" title="TOP PAGE">TOP PAGE</a></div>
	</article>
</section>

<?php get_footer(); /* footer */ ?>
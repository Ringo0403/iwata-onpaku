<?php
/*
 * 共通フッター
*/
?>

		</main>
		<!-- // END main -->
	</div>
	<!-- // layout wraapper -->

	<!-- footer -->
	<div id="footer-area" class="footer">
		<footer>
			<div class="f-logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/common/logo.svg" alt="<?php bloginfo( 'name' ); ?>"></a>

			<ul>
				<li>[ 主催 ] <?php echo esc_html(get_field('shusai','option')); ?></li>
				<li>[ 共催 ] <?php echo esc_html(get_field('kyosai','option')); ?></li>
				<li>[ 事務局 ]<br><?php echo esc_html(get_field('jimukyoku','option')); ?> <?php echo esc_html(get_field('jimukyoku_addr','option')); ?><br>TEL・FAX <?php echo esc_html(get_field('jimukyoku_tel','option')); ?> / <a href="mailto:<?php echo esc_html(get_field('jimukyoku_mail','option')); ?>"><?php echo esc_html(get_field('jimukyoku_mail','option')); ?></a></li>
				<li>[ 運営委託 ] <?php echo esc_html(get_field('itaku','option')); ?></li>
				<li><i class="fa-solid fa-lock fa-fw"></i> <a href="<?php echo esc_html(get_field('pp','option')); ?>" target="_blank">プライバシーポリシー</a></li>
			</ul>


			</div>
			<div class="f-nav1">
				<ul>
					<li><a href="<?php echo home_url(); ?>/about/" title="おんぱくとは">おんぱくとは</a></li>
					<li><a href="<?php echo home_url(); ?>/programs/" title="プログラム">プログラム</a></li>
					<?php
					$file_1 = get_field('file_1',16);
					if( $file_1 ): ?>
					<li><a href="<?php echo $file_1['url']; ?>" title="パンフレットダウンロード" target="_blank">パンフレットダウンロード</a></li>
					<?php endif; ?>
					<li><a href="<?php echo home_url(); ?>/join/" titile="プログラムに参加するには">	プログラムに参加するには</a></li>
				</ul>
			</div>
			<div class="f-nav2">
				<ul>
					<li><a href="<?php echo home_url(); ?>/implementation_conditions/" title="実施条件">実施条件</a></li>
					<li><a href="<?php echo home_url(); ?>/faq/" title="よくある質問">よくある質問</a></li>
					<li><a href="<?php echo home_url(); ?>/news/" titile="お知らせ">	お知らせ</a></li>
				</ul>
			</div>
			<div class="f-login">
				<ul>
					<li><a href="<?php echo esc_attr( get_field('entry_url','option') ); ?>" title="会員登録"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-regist-footer.svg" alt="会員登録"></a></li>
					<li><a href="<?php echo esc_attr( get_field('login_url','option') ); ?>" title="ログイン"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-login-footer.svg" alt="ログイン"></a></li>
				</ul>
			</div>
		</footer>

		<div class="copy">©Iwata ONpaku</div>
	</div>
	<!--  // END footer -->

	<div class="p-tategaki">
		<p><?php bloginfo( 'description' ); ?></p>
	</div>



	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="<?php bloginfo('template_url'); ?>/dist/js/menu.js"></script>
	<!-- slick -->
	<script src="<?php bloginfo('template_url'); ?>/dist/js/slick.min.js"></script>
	<!-- swiper -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<script src="<?php bloginfo('template_url'); ?>/dist/js/slide.js"></script>

	<script src="<?php bloginfo('template_url'); ?>/dist/js/init.js" defer></script>

	<!-- accordion -->
	<script src="<?php bloginfo('template_url'); ?>/dist/js/accordion_init.js"></script>


	<?php wp_footer(); ?>
</body>

</html>
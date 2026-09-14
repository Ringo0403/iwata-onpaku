<?php
/*
 * header
*/
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no, address=no">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="36x36" href="<?php bloginfo('template_url'); ?>/images/favicon/android-icon-36x36.png">
	<link rel="icon" type="image/png" sizes="48x48" href="<?php bloginfo('template_url'); ?>/images/favicon/android-icon-48x48.png">
	<link rel="icon" type="image/png" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/favicon/android-icon-72x72.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/images/favicon/android-icon-96x96.png">
	<link rel="icon" type="image/png" sizes="144x144" href="<?php bloginfo('template_url'); ?>/images/favicon/android-icon-144x144.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php bloginfo('template_url'); ?>/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon-16x16.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicon//favicon.ico" />
	<link rel="manifest" href="<?php bloginfo('template_url'); ?>/images/favicon/manifest.json">

	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css">
	<!-- reset.css ress -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/css/ress.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/css/styles.css?<?php echo file_date(get_template_directory() . '/dist/css/styles.css'); ?>">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/css/all.min.css">

	<!-- slick -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/css/slick-theme.css">

	<!-- swiper -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

	<!-- adobe fonts -->
	<script>
	  (function(d) {
		var config = {
		  kitId: 'vrf2sqn',
		  scriptTimeout: 3000,
		  async: true
		},
		h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- layout wraapper -->
	<div class="c-layout">
		<!--header & nav -->
		<div class="header">
			<!-- header wrap -->
			<div class="l-header-wrap">
				<header class="container">
					<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?> <?php bloginfo( 'name' ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/common/logo.svg" alt="<?php bloginfo( 'description' ); ?> <?php bloginfo( 'name' ); ?>"></a></h1>
					<!-- nav -->
					<nav class="u-only--pc">
						<ul class="l-btn-nav">
							<li><a href="<?php echo esc_attr( get_field('entry_url','option') ); ?>" title="会員登録" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-regist.png" alt="会員登録"></a></li>
							<li><a href="<?php echo esc_attr( get_field('login_url','option') ); ?>" title="ログイン" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-login.png" alt="ログイン"></a></li>
						</ul>

						<!-- main nav -->
						<ul class="l-main-nav">
							<?php wp_nav_menu(array('theme_location' => 'gnav','container' => false ,'items_wrap' => '%3$s' )); ?>

							<?php
							$yoyaku_file = get_field('yoyaku_file','option');
							if( $yoyaku_file ): ?>
							<li>
								<a href="<?php echo $yoyaku_file['url']; ?>" target="_blank">プログラムの予約方法</a>
							</li>
							<?php endif; ?>
						</ul>
						<!-- // END main nav -->

						<ul class="l-sub-nav">
							<li class="icon-conditions"><a href="<?php echo home_url(); ?>/implementation_conditions/">プログラム実施条件</a></li>

							<?php
							$file_2 = get_field('doui','option');
							if( $file_2 ): ?>
								<li class="icon-minor"><a href="<?php echo $file_2['url']; ?>" target="_blank">親権者同意書(未成年の方)</a></li>
							<?php endif; ?>

							<?php
							$file_1 = get_field('file_1',16);
							if( $file_1 ): ?>
							<li class="icon-book"><a href="<?php echo $file_1['url']; ?>" target="_blank">パンフレット</a></li>
							<?php endif; ?>
							<li class="icon-faq"><a href="<?php echo home_url(); ?>/faq/">よくある質問</a></li>
							<li class="icon-report"><a href="<?php echo home_url(); ?>/programs/year/<?php echo date('Y', strtotime('-1 year')); ?>/">過去のいわたおんぱく</a></li>
						</ul>

						<!-- 検索フォーム -->
						<?php get_search_form(); ?>
						<!-- // END 検索フォーム -->
					</nav>

					<!-- モバイルメニュー -->
					<div class="openbtn">
						<img src="<?php bloginfo('template_url'); ?>/images/common/open-btn.svg" alt="menu">
						<span></span>
						<span></span>
					</div>
					<nav class="u-only--sp" id="g-nav">
						<div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?> <?php bloginfo( 'name' ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/common/logo.svg" alt="<?php bloginfo( 'description' ); ?> <?php bloginfo( 'name' ); ?>"></a></h1>
							<ul class="l-btn-nav--sp">
								<li><a href="<?php echo esc_attr( get_field('entry_url','option') ); ?>" title="会員登録" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-regist.png" alt="会員登録"></a></li>
								<li><a href="<?php echo esc_attr( get_field('login_url','option') ); ?>" title="ログイン" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-login.png" alt="ログイン"></a></li>
							</ul>
							<!-- 2026.09.14編集 -->
							<!-- main nav -->
							<ul class="l-main-nav--sp">
								<?php wp_nav_menu(array('theme_location' => 'sp','container' => false ,'items_wrap' => '%3$s' )); ?>

								<?php
								$yoyaku_file = get_field('yoyaku_file','option');
								if( $yoyaku_file ): ?>
								<li>
									<a href="<?php echo $yoyaku_file['url']; ?>" target="_blank">プログラムの予約方法</a>
								</li>
								<?php endif; ?>
							</ul>
							<!-- // END main nav -->

							<ul class="l-sub-nav--sp">
								<li class="icon-conditions"><a href="<?php echo home_url(); ?>/implementation_conditions/">プログラム実施条件</a></li>

								<?php
								$file_2 = get_field('doui','option');
								if( $file_2 ): ?>
									<li class="icon-minor"><a href="<?php echo $file_2['url']; ?>" target="_blank">親権者同意書(未成年の方)</a></li>
								<?php endif; ?>

								<?php
								$file_1 = get_field('file_1',16);
								if( $file_1 ): ?>
								<li class="icon-book"><a href="<?php echo $file_1['url']; ?>" target="_blank">パンフレット</a></li>
								<?php endif; ?>
								<li class="icon-faq"><a href="<?php echo home_url(); ?>/faq/">よくある質問</a></li>
								<li class="icon-report"><a href="<?php echo home_url(); ?>/programs/year/<?php echo date('Y', strtotime('-1 year')); ?>/">過去のいわたおんぱく</a></li>
							</ul>
							<div class="l-banner--sp">
								<a href="<?php echo home_url(); ?>/partner/" title="プログラムパートナー"><img src="<?php bloginfo('template_url'); ?>/images/common/banner-partner.png" alt="プログラムパートナー"></a>
							</div>
						</div>
					</nav>
					<!-- // END モバイルメニュー -->
					<!-- // END nav -->

					<div class="l-banner">
						<a href="<?php echo home_url(); ?>/partner/" title="プログラムパートナー"><img src="<?php bloginfo('template_url'); ?>/images/common/banner-partner.png" alt="プログラムパートナー"></a>
					</div>
				</header>
			</div>
			<!-- // END header wrap -->
		</div>
		<!--// END header & nav -->
		<!-- main -->
		<main class="main">
			<?php get_template_part( 'temp/hero' ); ?>

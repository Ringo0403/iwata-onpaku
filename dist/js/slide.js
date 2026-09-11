// // heroスライド

$(function () {
	const $slider = $('.u-slider--pu');
	const slideCount = $slider.find('li').length;

	function slickControl() {
		const windowWidth = window.innerWidth;
		const isSlicked = $slider.hasClass('slick-initialized');

		// 表示判定のしきい値
		let limit = 3; // PC
		if (windowWidth <= 768) limit = 0; // スマホは常にスライド（0枚より多ければ）
		else if (windowWidth <= 1279) limit = 2; // タブレット

		// 【判定】現在の枚数が、その画面幅の表示数制限を超えているか
		if (slideCount > limit) {
			// スライドが必要な場合
			if (!isSlicked) {
				$slider.slick({
					autoplay: true,
					autoplaySpeed: 4000,
					arrows: false,
					dots: true,
					slidesToShow: 3,
					pauseOnFocus: false,
					pauseOnHover: true,
					responsive: [
						{
							breakpoint: 1279,
							settings: { slidesToShow: 2 }
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
								centerMode: true,
								centerPadding: '40px',
							}
						}
					]
				});
			}
		} else {
			// スライドが不要な場合（PCで枚数が少ない時など）
			if (isSlicked) {
				$slider.slick('unslick');
			}
		}
	}

	// 初回実行とリサイズ実行
	slickControl();
	$(window).on('resize', function () {
		slickControl();
	});

	// 高さ揃え（既存のものを維持）
	$(window).on('load resize', function () {
		const h4s = $('.u-slider--pu h4');
		const h5s = $('.u-slider--pu h5');
		let maxH4 = 0, maxH5 = 0;
		h4s.each(function () {
			$(this).css('height', 'auto');
			if ($(this).outerHeight() > maxH4) maxH4 = $(this).outerHeight();
		});
		h5s.each(function () {
			$(this).css('height', 'auto');
			if ($(this).outerHeight() > maxH5) maxH5 = $(this).outerHeight();
		});
		h4s.height(maxH4);
		h5s.height(maxH5);
	});
});

// トップ ループスライド
const loopSwiper = new Swiper(".loopswiper", {
  loop: true,
  slidesPerView: 3, // SPでは少なめに設定
  spaceBetween: 10, // スライド間の余白
  speed: 6000,
  allowTouchMove: false,
  autoplay: {
	delay: 0,
	disableOnInteraction: false, // ユーザー操作後も止めない
  },
  breakpoints: {
	// 768px以上（PC）の設定
	768: {
	  slidesPerView: 6,
	}
  }
});
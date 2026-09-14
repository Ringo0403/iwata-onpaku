// ハンバーガーメニュー

// 2026-09-14 修正: メニューを閉じる共通処理（.openbtnがPC幅でdisplay:noneになった後も呼べるよう関数化）
function closeNav() {
	$(".openbtn").removeClass('active');
	$("#g-nav").removeClass('panelactive');
}

$(".openbtn").click(function() { //ボタンがクリックされたら
	$(this).toggleClass('active'); //ボタン自身に activeクラスを付与し
	$("#g-nav").toggleClass('panelactive'); //ナビゲーションにpanelactiveクラスを付与
});

$("#g-nav a").click(function(e) {
	// .has-child > a のクリックだった場合は、閉じる処理をスキップ
	if ($(this).parent().hasClass('has-child')) {
		// 下層メニュー展開用クリックのため、ここでは何もしない
		return;
	}

	// 通常リンクなら nav を閉じる
	// 2026-09-14 修正: 直書きの removeClass 2行を closeNav() 呼び出しに置き換え
	closeNav();
});

//ドロップダウンの設定を関数でまとめる
// 2026-09-14 修正: ブレークポイントを 992px → 1024px に変更（.openbtn の表示切替 _nav.scss の @include lg = 1024px と揃える）
function mediaQueriesWin() {
	var width = $(window).width();
	if (width <= 1024) { //横幅が1024px以下の場合 $(".has-child>a").off('click');	//has-childクラスがついたaタグのonイベントを複数登録を避ける為offにして一旦初期状態へ
		// 2026-09-14 修正: リサイズで複数回on登録されないよう off().on() に変更
		$(".has-child>a").off('click').on('click', function() { //has-childクラスがついたaタグをクリックしたら
			var parentElem = $(this).parent(); // aタグから見た親要素のliを取得し
			$(parentElem).toggleClass('active-menu'); //矢印方向を変えるためのクラス名を付与して
			$(parentElem).children('ul').stop().slideToggle(500); //liの子要素のスライドを開閉させる※数字が大きくなるほどゆっくり開く
			return false; //リンクの無効化
		});
	} else { //横幅が1024px超の場合
		$(".has-child>a").off('click'); //has-childクラスがついたaタグのonイベントをoff(無効)にし
		$(".has-child").removeClass('active-menu'); //activeクラスを削除
		$('.has-child').children('ul').css("display", ""); //スライドトグルで動作したdisplayも無効化にする

		// 2026-09-14 修正: PC幅では.openbtnがdisplay:noneになり閉じる手段が無くなるため、
		// メニューを開いたままリサイズされた場合は強制的に閉じてbodyのスクロールロックを解除する
		// （スマホ表示で開閉後にPC幅へ広げるとスクロール不可になる不具合の対策）
		closeNav();
	}
}

// ページがリサイズされたら動かしたい場合の記述
$(window).resize(function() {
	mediaQueriesWin(); /* ドロップダウンの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function() {
	mediaQueriesWin(); /* ドロップダウンの関数を呼ぶ*/
});
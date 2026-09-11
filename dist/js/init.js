// imgタグで右クリックを禁止
 document.addEventListener('contextmenu', function(e) {
	if (e.target.tagName.toLowerCase() === 'img') {
	  e.preventDefault(); // 画像上での右クリックを無効化
	}
  });

// ドラッグ開始を禁止
	document.addEventListener('dragstart', function(e) {
	  if (e.target.tagName.toLowerCase() === 'img') {
		e.preventDefault();
	  }
	});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  footerFixed.js
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
new function() {

	var footerId = "footer-area";
	//メイン
	function footerFixed() {
		//ドキュメントの高さ
		var dh = document.getElementsByTagName("body")[0].clientHeight;
		//フッターのtopからの位置
		document.getElementById(footerId).style.top = "0px";
		var ft = document.getElementById(footerId).offsetTop;
		//フッターの高さ
		var fh = document.getElementById(footerId).offsetHeight;
		//ウィンドウの高さ
		if (window.innerHeight) {
			var wh = window.innerHeight;
		} else if (document.documentElement && document.documentElement.clientHeight != 0) {
			var wh = document.documentElement.clientHeight;
		}
		if (ft + fh < wh) {
			document.getElementById(footerId).style.position = "relative";
			// document.getElementById(footerId).style.top = (wh - fh - ft - 1) + "px";
			document.getElementById(footerId).style.top = (wh - fh - ft) + "px";
		}
	}

	//文字サイズ
	function checkFontSize(func) {

		//判定要素の追加	
		var e = document.createElement("div");
		var s = document.createTextNode("S");
		e.appendChild(s);
		e.style.visibility = "hidden"
		e.style.position = "absolute"
		e.style.top = "0"
		document.body.appendChild(e);
		var defHeight = e.offsetHeight;

		//判定関数
		function checkBoxSize() {
			if (defHeight != e.offsetHeight) {
				func();
				defHeight = e.offsetHeight;
			}
		}
		setInterval(checkBoxSize, 1000)
	}

	//イベントリスナー
	function addEvent(elm, listener, fn) {
		try {
			elm.addEventListener(listener, fn, false);
		} catch (e) {
			elm.attachEvent("on" + listener, fn);
		}
	}

	addEvent(window, "load", footerFixed);
	addEvent(window, "load", function() {
		checkFontSize(footerFixed);
	});
	addEvent(window, "resize", footerFixed);

}


// フォームの確認チェック 
jQuery(function() {
	/* ページ読み込み時のボタン制御処理 */
	if (jQuery('input[id="agree-1"]:checked').val()) {
		jQuery('[name="submitConfirm"]').prop("disabled", false);
	} else {
		jQuery('[name="submitConfirm"]').prop("disabled", true);
	}

	/* 同意のチェックボックスをクリックした際のボタン制御処理 */
	jQuery('[id="agree-1"]').click(function() {
		if (jQuery('input[id="agree-1"]:checked').val()) {
			jQuery('[name="submitConfirm"]').prop("disabled", false);
		} else {
			jQuery('[name="submitConfirm"]').prop("disabled", true);
		}
	});

	/**
	 * 確認画面用（確認画面のボタンは常に押せる状態にしておく）
	 */
	if (location.pathname === '/entry-confirm/') {
		jQuery('[name="submitButton"]').prop("disabled", false);
	}
});


// 自動的に各行に <span class="highlight"> を付けた状態で出力させる
// h2.concept-title
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('h2.concept-title').forEach(h2 => {
	// <br> で分割（<br>, <br/>, <br /> に対応）
	const parts = h2.innerHTML.split(/<br\s*\/?>/i);

	if (parts.length >= 2) {
	  const firstLine = parts[0]; // 数字など（最初の行）
	  const highlightedParts = parts
		.slice(1) // 2個目以降
		.map(line => `<span class="highlight">${line.trim()}</span>`) // 各行を highlight で囲む
		.join(''); // br を挟まず連結

	  h2.innerHTML = `${firstLine}<br>${highlightedParts}`;
	}
  });
});

// h3.h3_hightlight
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('h3.h3_highlight').forEach(h3 => {
	const parts = h3.innerHTML.split(/<br\s*\/?>/);
	h3.innerHTML = parts.map(line => `<span class="highlight">${line.trim()}</span>`).join('<br>');
  });
});

// 日付選択セレクトボックス
document.getElementById("reserve-button").addEventListener("click", function(e) {
	e.preventDefault();

	const select = document.getElementById("date-select");
	const selectedValue = select.value;

	if (selectedValue) {
	  window.open(selectedValue, '_blank'); // ★ 別タブで開く
	} else {
	  alert("開催日時を選択してください。");
	}
  });


// スマホ件数制御 JS
// document.addEventListener('DOMContentLoaded', function() {
	// const items = document.querySelectorAll('.p-prglist li');
	// if(window.innerWidth <= 768){
	// 	items.forEach((el, i) => {
	// 		if(i >= 1) el.style.display = 'none'; // スマホは5件まで
	// 	});
	// }
// });

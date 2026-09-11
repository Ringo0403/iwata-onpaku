//モーダル表示

jQuery(function($){
  // ▼ modaal設定
  $(".modal-open").modaal({
	overlay_close: true,
	before_open: function() {
	  $('html').css('overflow-y', 'hidden');
	},
	after_close: function() {
	  $('html').css('overflow-y', 'scroll');
	}
  });

  // 背景クリックで閉じる
  window.onclick = function(event) {
	if (event.target == modal) {
	  modal.style.display = "none";
	}
  };
});


<?php
/*
 * 検索フォーム
*/
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form-3">
	<label>
		<input name="s" id="s" type="text" value="<?php echo get_search_query(); ?>" placeholder="キーワードを入力">
	</label>
	<button type="submit" aria-label="検索"></button>
</form>


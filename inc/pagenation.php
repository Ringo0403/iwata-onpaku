<?php

/**
 * ページャー
 */

// ページャー
function pagenation_func($r, $id, $p, $n, $query = null)
{
	if (!$query) {
		global $wp_query;
		$query = $wp_query;
	}

	$pd = get_query_var('paged') ? get_query_var('paged') : 1;
	$ps = $query->max_num_pages;
	if (!$ps) { $ps = 1; }
	$l = ($r*2)+1;
	if(!$id){$id="pagenation";}
	if(!$p){$p="<";}
	if(!$n){$n=">";}

	$r_l=$r_r=$r;
	if($pd<=$r){$r_r=$l-$pd;}
	if($pd>=$ps-$r){$r_l=$l-$ps+$pd-1;}
	$a1="\t<li><a class=\"";
	$a2="</a></li>\n";
	$s1="\t<li><span class=\"";
	$s2="</span></li>\n";

	if(1!=$ps){
		echo "\n<div id=\"".$id."\">\n";
		echo "\t<ul id=\"pagenation-list\">\n";
		if($pd>1){echo $a1."prev\" href=\"".get_pagenum_link($pd-1)."\">".$p.$a2;}
		$o=$pd-$r_l;
		if ($o>1){echo $a1."num\" href=\"".get_pagenum_link(1)."\">1".$a2;}
		if ($o>2){echo $s1."omit\">...".$s2;}
		for($i=1; $i<=$ps; $i++){
			if(1!=$ps &&(!($i>=$pd+$r_r+1||$i<=$pd-$r_l-1)||$ps<=$l )){
				if($pd==$i){echo $s1."current\">".$i."".$s2;}
				else{echo $a1."num\" href=\"".get_pagenum_link($i)."\">".$i."".$a2;}
			}
		}

		$o=$pd+$r_r+1;
		if($ps<$o){$o=$ps+1;}
		if($o<$ps){echo $s1."omit\">...".$s2;}
		if($o<=$ps){echo $a1."num\" href=\"".get_pagenum_link($ps)."\">".($i-1).$a2;}
		if($pd<$ps){echo $a1."next\"  href=\"".get_pagenum_link($pd+1)."\">".$n.$a2;}
		echo "\t</ul>\n</div>\n";
	}
}
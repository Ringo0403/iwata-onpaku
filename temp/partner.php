<?php
/*
 * プログラムパートナー
*/
?>

<section class="container">
	<h2 class="u-h2--primary">partners<span>プログラム・パートナー一覧</span></h2>

	<?php
	  // 今年度の開始日・終了日を算出
	  $today = current_time('Y-m-d');
	  $year  = date('Y', strtotime($today));
	  $month = date('n', strtotime($today));
	  $fiscal_year = ( $month < 4 ) ? $year - 1 : $year;
	  $fiscal_start = $fiscal_year . '-04-01';
	  $fiscal_end   = ($fiscal_year + 1) . '-03-31';

	  // 全カテゴリ取得（空カテゴリも含む）
	  $catargs = array(
		'taxonomy'   => 'cate_prg',
		'hide_empty' => false
	  );
	  $catlists = get_categories( $catargs );

	  foreach ( $catlists as $cat ) :

		// 親カテゴリ（年度名）はスキップ
		if ( $cat->parent == 0 ) {
		  // 独立カテゴリ（親を持たない）ならそのまま表示OK
		  $children = get_terms( array(
			'taxonomy'   => 'cate_prg',
			'hide_empty' => false,
			'parent'     => $cat->term_id
		  ) );
		  if ( ! empty( $children ) ) {
			continue; // 子を持つ親カテゴリならスキップ
		  }
		}
		?>

	<!-- 繰り返し ターム別ブロック -->
	<article class="p-list-partners">
		<h4 class="h4-barret-disc"><?php echo $cat->name; ?></h4>

		<?php
		  // 投稿取得（年度ベースで絞り込み）
		  $args = array(
			'numberposts'   => -1,
			'post_type'     => 'program',
			'meta_key'      => 'num',
			'orderby'       => 'meta_value_num',
			'order'         => 'ASC',
			'tax_query'     => array(
			  array(
				'taxonomy' => 'cate_prg',
				'field'    => 'slug',
				'terms'    => $cat->slug,
			  ),
			),
			'date_query' => array(
			  array(
				'after'     => $fiscal_start,
				'before'    => $fiscal_end,
				'inclusive' => true,
			  ),
			),
		  );
		  $my_posts = get_posts( $args );

		  if ( $my_posts ) :
			foreach ( $my_posts as $post ) :
			  setup_postdata( $post );
			  ?>
			<!-- 繰り返しテーブル -->
			<table class="c-table--blue">
				<tr>
					<th>カテゴリー</th>
					<td><?php echo $cat->name; ?></td>
				</tr>
				<tr>
					<th>プログラムNo.</th>
					<td><?php echo esc_html( get_field('num') ); ?></td>
				</tr>
				<tr>
					<th>プログラム名</th>
					<td><?php the_title(); ?></td>
				</tr>
				<tr>
					<th>主催・担当</th>
					<td><?php echo wp_kses_post( get_field('td_3') ); ?></td>
				</tr>
				<tr>
					<th>お問い合わせ先</th>
					<td><?php echo wp_kses_post( get_field('td_2') ); ?></td>
				</tr>
			</table>
			<!-- // END 繰り返しテーブル -->
				<?php
				  endforeach;
				  wp_reset_postdata();
				else :
				  // 投稿がなかった場合
				  echo '<p class="u-ml--3">プログラムの登録がありません。</p>';
				endif;
				?>
	</article>
	<?php endforeach; ?>
</section>
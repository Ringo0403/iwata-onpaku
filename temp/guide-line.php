<?php
/*
 * いわたおんぱくプログラム実施条件
*/
?>

<section class="container">
	<h2 class="u-h2--primary u-mb--40">Guidelines<span>いわたおんぱくプログラム実施条件</span></h2>
	<p class="u-mb--4"><?php echo wp_kses_post( get_field('lead') ); ?></p>
	<ul class="p-btn-link">
		<?php
		$file_1 = get_field('file_1');
		if( $file_1 ): ?>
		<li><a href="<?php echo $file_1['url']; ?>" target="_blank" title="パンフレットをダウンロード"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-pamphlet-dl.png" alt="パンフレットをダウンロード"></a></li>
		<?php endif; ?>
		<?php
		$file_2 = get_field('file_2');
		if( $file_2 ): ?>
		<li><a href="<?php echo $file_2['url']; ?>" target="_blank" title="おんぱくプログラム実施条件書（全文）"><img src="<?php bloginfo('template_url'); ?>/images/common/btn-prg-jyouken.png" alt="おんぱくプログラム実施条件書（全文）"></a></li>
		<?php endif; ?>
	</ul>

	<?php if( have_rows('notice') ): ?>
	<div class="p-notice-block">
		<h2 class="u-h2--primary"><span>注意事項とお願い</span></h2>
		<?php while( have_rows('notice') ): the_row();
		$title = get_sub_field('title');
		$doc = get_sub_field('doc');
		?>
		<h3 class="u-h3-white"><?php echo $title; ?></h3>
		<p><?php echo $doc; ?></p>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>

	<div class="c-box-bg--gray-w100">
		<h3 class="u-h3--borderbottom">目次</h3>
		<ol class="p-index-list">
			<li><a href="#anker1">いわた温故知新博覧会（いわたおんぱく）について</a></li>
			<li><a href="#anker2">プログラムが旅行契約を伴う「旅行商品」の場合</a></li>
			<li><a href="#anker3">プログラムへの参加申し込み</a></li>
			<li><a href="#anker4">プログラムへのお申込み条件・参加条件</a></li>
			<li><a href="#anker5">団体・グループを構成する代表者からのお申込み</a></li>
			<li><a href="#anker6">プログラム参加代金</a></li>
			<li><a href="#anker7">プログラムの内容変更および参加代金の額の変更</a></li>
			<li><a href="#anker8">プログラム実施前におけるプログラムの中止</a></li>
			<li><a href="#anker9">お客様によるキャンセル・取消料・払い戻し</a></li>
			<li><a href="#anker10">プログラム・パートナーの解除権</a></li>
			<li><a href="#anker11">主催者およびプログラム・パートナーの責任</a></li>
			<li><a href="#anker12">お客様の責任</a></li>
			<li><a href="#anker13">個人情報の取扱い</a></li>
		</ol>
	</div>

	<div class="p-guideline-box">
		<article id="anker1" class="scroll-offset">
			<h3 class="u-h3-white--num">いわた温故知新博覧会（いわたおんぱく）について</h3>
			<ol class="p-num">
				<?php if( have_rows('list_1') ): ?>
					<?php while( have_rows('list_1') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker2" class="scroll-offset">
			<h3 class="u-h3-white--num">プログラムが旅行契約を伴う「旅行商品」の場合</h3>
			<p><?php echo wp_kses_post(get_field('doc_1')); ?></p>
		</article>

		<article id="anker3" class="scroll-offset">
			<h3 class="u-h3-white--num">プログラムへの参加申し込み</h3>
			<ol class="p-num">
				<?php if( have_rows('list_2') ): ?>
					<?php while( have_rows('list_2') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker4" class="scroll-offset">
			<h3 class="u-h3-white--num">プログラムへのお申込み条件・参加条件</h3>
			<ol class="p-num">
				<?php if( have_rows('list_3') ): ?>
					<?php while( have_rows('list_3') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker5" class="scroll-offset">
			<h3 class="u-h3-white--num">団体・グループを構成する代表者からのお申込み</h3>
			<ol class="p-num">
				<?php if( have_rows('list_4') ): ?>
					<?php while( have_rows('list_4') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker6" class="scroll-offset">
			<h3 class="u-h3-white--num">プログラム参加代金</h3>
			<ol class="p-num">
				<?php if( have_rows('list_5') ): ?>
					<?php while( have_rows('list_5') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker7" class="scroll-offset">
			<h3 class="u-h3-white--num">プログラムの内容変更および参加代金の額の変更</h3>
			<ol class="p-num">
				<?php if( have_rows('list_6') ): ?>
					<?php while( have_rows('list_6') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker8" class="scroll-offset">
			<h3 class="u-h3-white--num">プログラム実施前におけるプログラムの中止</h3>
			<p>以下に該当する場合は、プログラム・パートナーはプログラムの実施を中止いたします。</p>
			<ol class="p-num">
				<?php if( have_rows('list_7') ): ?>
					<?php while( have_rows('list_7') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker9" class="scroll-offset">
			<h3 class="u-h3-white--num">お客様によるキャンセル・取消料・払い戻し</h3>
			<ol class="p-num">
				<li>おんぱくプログラム実施前/お客様による取消・払い戻し

					<ul class="p-list-iroha">
						<li><?php echo wp_kses_post(get_field('list')); ?>
						<?php
						$cancel = get_field('cancel');
						?>
						<table class="c-table-jyouken">
							<caption>（表１）おんぱくプログラム標準モデル取消料 ／お一人様</caption>
						  <tbody>
							<tr>
							  <th colspan="2" scope="col">プログラムの取消し・減員の期日</th>
							  <th scope="col">取消料</th>
							</tr>
							<tr>
							  <td rowspan="3">プログラム
								  実施日の</td>
							  <td>４日前にあたる日まで</td>
							  <td><?php echo $cancel['td_1']; ?></td>
							</tr>
							<tr>
							  <td>３日前にあたる日の取消</td>
							  <td><?php echo $cancel['td_2']; ?></td>
							</tr>
							<tr>
							  <td>２日前にあたる日以降～当日</td>
							  <td rowspan="2"><?php echo $cancel['td_3']; ?></td>
							</tr>
							<tr>
							  <td colspan="2">プログラム開始後、又は無連絡不参加</td>
							</tr>
						  </tbody>
						</table>
						<?php if($cancel['notice']): ?>
						<p class="p-notice">注）<?php echo $cancel['notice']; ?></p>
						<?php endif; ?>
						</li>
						<?php if( have_rows('list_8') ): ?>
							<?php while( have_rows('list_8') ): the_row();
							$doc = get_sub_field('doc');
							?>
						<li><?Php echo $doc; ?></li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</li>
				<li>プログラム開始後/お客様による解除・払い戻し

					<?php if( have_rows('list_9') ): ?>
					<ul class="p-list-iroha">
						<?php while( have_rows('list_9') ): the_row();
						$doc = get_sub_field('doc');
						?>
					<li><?Php echo $doc; ?></li>
					<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</li>
			</ol>
		</article>

		<article id="anker10" class="scroll-offset">
			<h3 class="u-h3-white--num">プログラム・パートナーの解除権</h3>
			<ol class="p-num">
				<li>プログラム開始前の解除権

					<ul class="p-list-iroha">
						<?php if( have_rows('list_10') ): ?>
						<?php while( have_rows('list_10') ): the_row();
						$doc = get_sub_field('doc');
						?>
						<li><?Php echo $doc; ?>

							<?php if( have_rows('list_11') ): ?>
							<ul class="p-list-alpha">
									<?php while( have_rows('list_11') ): the_row();
									$doc = get_sub_field('doc');
									?>
								<li><?Php echo $doc; ?></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</li>
				<li>プログラム開始後の解除権
					<?php if( have_rows('list_12') ): ?>
					<ul class="p-list-iroha">
						<?php while( have_rows('list_12') ): the_row();
						$doc = get_sub_field('doc');
						?>
						<li><?php echo $doc; ?>
							<?php if( have_rows('list_13') ): ?>
							<ul class="p-list-alpha">
								<?php while( have_rows('list_13') ): the_row();
								$doc = get_sub_field('doc');
								?>
								<li><?php echo $doc; ?></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</li>
			</ol>
		</article>

		<article id="anker11" class="scroll-offset">
			<h3 class="u-h3-white--num">主催者およびプログラム・パートナーの責任</h3>
			<ol class="p-num">
				<?php if( have_rows('list_14') ): ?>
					<?php while( have_rows('list_14') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker12" class="scroll-offset">
			<h3 class="u-h3-white--num">お客様の責任</h3>
			<ol class="p-num">
				<?php if( have_rows('list_15') ): ?>
					<?php while( have_rows('list_15') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>

		<article id="anker13" class="scroll-offset">
			<h3 class="u-h3-white--num">個人情報の取扱い</h3>
			<ol class="p-num">
				<?php if( have_rows('list_16') ): ?>
					<?php while( have_rows('list_16') ): the_row();
					$doc = get_sub_field('doc');
					?>
				<li><?Php echo $doc; ?></li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ol>
		</article>
	</div>
</section>
<?php
/*
 * プログラムに参加するには
*/
?>

<section class="container">
	<h2 class="u-h2--primary u-mb--120">steps to join<span>プログラムに参加するには</span></h2>
	<div class="c-box-bg--gray p-join-box">
		<div class="u-align--center p-minus">
			<h3 class="u-h3-fukidasi">いわたおんぱくのプログラム参加には〔事前のお申込み〕が必要です</h3>
		</div>
		<p class="u-align-sp-only">プログラムへの参加申込方法はプログラムによって異なります。<br>各プログラムの指定する方法でお申込みください</p>

		<div class="c-box-base-color u-mb--3">
			<dl class="p-uketsuke">
				<dt>おんぱく 申込受付開始</dt>
				<?php
				$entry = get_field('entry'); ?>
				<dd><?php echo $entry['date']; ?><?php echo $entry['time']; ?></dd>
			</dl>
		</div>
		<?php if($entry['date']): ?>
		<p class="u-notice u-mb--5">注）<?php echo $entry['notice']; ?></p>
		<?php endif; ?>
		<div class="c-box-base-color u-mb--6">
			<h3 class="u-h3--borderbottom">おんぱくプログラムは｢いわたおんぱく公式サイト」から!</h3>
			<?php if( have_rows('list') ): ?>
			<ul class="u-list--blueDisc">
				<?php while( have_rows('list') ): the_row();
				$title = get_sub_field('title');
				$doc = get_sub_field('doc');
				?>
				<li><span><?php echo $title; ?></span><?php echo $doc; ?></li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</div>

		<h3 class="u-h3-w-border">磐田市観光協会のＳＮＳで情報発信！</h3>
		<?php
		$sns = get_field('sns'); ?>
		<div class="c-grid--3 u-mb--6">
			<div class="item1">
				<ul class="u-link-list">
					<?php if($sns['insta_1']): ?>
					<li><a href="<?php echo $sns['insta_1']; ?>" target="_blank">いわたおんぱくインスタグラム</a></li>
					<?php endif; ?>
					<?php if($sns['insta_2']): ?>
					<li><a href="<?php echo $sns['insta_2']; ?>" target="_blank">磐田市観光協会インスタグラム</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="item2">
				<ul class="u-link-list">
					<?php if($sns['hp']): ?>
					<li><a href="<?php echo $sns['hp']; ?>" target="_blank">磐田市観光協会ホームページ</a></li>
					<?php endif; ?>
					<?php if($sns['insta_3']): ?>
					<li><a href="<?php echo $sns['insta_3']; ?>" target="_blank">地域おこし協力隊インスタグラム</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="item3">
				<ul class="u-link-list">
					<?php if($sns['jp']): ?>
					<li><a href="<?php echo $sns['jp']; ?>" target="_blank">クールジャパンビデオ</a><span><?php echo $sns['jp_doc']; ?></span></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>

		<div class="c-box-base-color u-mb--6">
			<h3 class="u-h3--borderbottom">＜用語の説明＞プログラム内で使用する用語について</h3>
			<?php
			$word = get_field('word'); ?>
			<table class="c-table--dotted u-mb--0">
				<tr>
					<th><span>プログラム</span></th>
					<td><?php echo $word['td_1']; ?></td>
				</tr>
				<tr>
					<th><span>プログラム・パートナー</span></th>
					<td><?php echo $word['td_2']; ?></td>
				</tr>
				<tr>
					<th><span>最少催行人員</span></th>
					<td><?php echo $word['td_3']; ?></td>
				</tr>
				<tr>
					<th><span>標準モデル取消規定</span></th>
					<td><?php echo $word['td_4']; ?></td>
				</tr>
				<tr>
					<th><span>キャンセル料：設定無し</span></th>
					<td><?php echo $word['td_5']; ?></td>
				</tr>
				<tr>
					<th><span>旅行商品</span></th>
					<td><?php echo $word['td_6']; ?></td>
				</tr>
			</table>
		</div>

		<div class="c-grid c-gap32-48 u-add--w-border">
			<div class="u-span-3">
				<?php
				$image = get_field('image');
				if( !empty( $image ) ): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  class="c-img--center u-w-80" />
				<?php endif; ?>
			</div>
			<div class="u-span-9">
				<h4>磐田ここからラボとは？</h4>
				<p class="u-mb--0"><?php echo wp_kses_post(get_field('doc')); ?></p>
			</div>
		</div>
	</div>
</section>
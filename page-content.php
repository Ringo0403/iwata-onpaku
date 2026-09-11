<?php
/*
Template Name: pageコンテンツ
*/
?>

<?php get_header(); /* header */ ?>

<?php if(is_page('faq')): // FAQ ?>
	<?php get_template_part( 'temp/faq' ); ?>
<?php endif; // FAQ ?>

<?php if(is_page('about')): // いわたおんぱくとは ?>
	<?php get_template_part( 'temp/about' ); ?>
<?php endif; // いわたおんぱくとは ?>

<?php if(is_page('implementation_conditions')): // いわたおんぱくプログラム実施条件 ?>
	<?php get_template_part( 'temp/guide-line' ); ?>
<?php endif; // いわたおんぱくプログラム実施条件 ?>

<?php if(is_page('join')): // プログラムに参加するには ?>
	<?php get_template_part( 'temp/join' ); ?>
<?php endif; // プログラムに参加するには ?>

<?php if(is_page('partner')): // パートナー一覧 ?>
	<?php get_template_part( 'temp/partner' ); ?>
<?php endif; // パートナー一覧 ?>


<?php get_footer(); /* footer */ ?>
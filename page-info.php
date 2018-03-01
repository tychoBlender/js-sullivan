<?php 
/* Template Name: About/Contact Page
 *
 */
 ?>
<?php get_header(); ?>

<div class="bio section" style="background-image:url(<?php the_field("bg_img")?>)">
	<a href="<?php bloginfo('url'); ?>" style="display:table-cell"><div class="logo"></div></a>
	<div id="contactPage" class="centered">
		<h2 id="headline"><?php the_field('heading'); ?></h2>		
	</div>
	<div class="scrollPrompt"style="position:absolute; bottom:5%;left:0;right:0; margin:auto;color:#fff;z-index:100;">SCROLL</div>	
</div>

<div class="lowerBlack">
	<?php if(get_field('single_info_column')):?>
	<div class="info solo NeuzeitGro-Reg"><?php the_field('info_1'); ?></div>	
	<?php else:?>
	<div class="info NeuzeitGro-Reg"><?php the_field('info_1'); ?></div>	
	<div class="info NeuzeitGro-Reg"><?php the_field('info_2'); ?></div>
	<?php endif;?>
	<div id="mobileLegal">
		<section class="lowerLegal">
		<div class="legal">		
			<div class="copy">
				<small>&copy;<?php echo date("Y"); ?> <?php the_field('theme_footer_text', 'option'); ?></small>		
			</div>		
		</section>
	</div>
</div>
<?php get_footer(); ?>
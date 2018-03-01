
<?php wp_footer(); ?>
<?php the_field('theme_google_analytics', 'option'); ?>
</div>
<?php 
	if(!is_page('home') && !is_page('developments')){
?>
<section class="lowerLegal footer">
<div class="legal" style="position:relative;text-align: left;padding:2.5%;width:95%;bottom:auto;left:auto;right:auto;">		
<div class="copy"style=""><small>&copy;<?php echo date("Y"); ?> <?php the_field('theme_footer_text', 'option'); ?></small>
</div>
</div>
</section>
<?php 
	}
?>
</body>
</html>
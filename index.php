<?php get_header(); ?>

<div id="fullpage" class="home">
<style>
<?php
if(have_rows('feat_prop')):
    $p = 2; 
    while ( have_rows('feat_prop') ) : the_row(); ?>
    #s-<?php echo $p; ?>{background-image: url(<?php the_sub_field("home_image_landscape"); ?>);background-position: <?php the_sub_field("home_image_positioning_horizontal"); ?> <?php the_sub_field("home_image_positioning_vertical"); ?>;}    
<?php $p++;
    endwhile;
endif;
?>
@media screen and (max-width:960px){ 
<?php
if(have_rows('feat_prop')):
    $l = 2; 
    while ( have_rows('feat_prop') ) : the_row(); ?>
    #s-<?php echo $l; ?>{background-image: url(<?php the_sub_field("home_image_portrait"); ?>);}
<?php
	$l++;endwhile;
endif;
if(have_rows('intro_slides_mobile')):
	while ( have_rows('intro_slides_mobile') ) : the_row();     			
?>
<?php
	$heroImages = get_sub_field('bg_img_mobile');	
	if($heroImages):
	$j = 1;
	foreach( $heroImages as $image ):	
?>
	.heroBG-<?php echo $j; ?>{background-image: url(<?php echo $image["url"];?>)!important;}
<?php
	$j++;endforeach;endif;endwhile;endif; 
?>
}
</style>

<div id="hero" class="home section" data-anchor="slide1">	
<div class="logo"></div>

<div class="fadein">
<?php 
if(have_rows('intro_slides')):    

?>
<?php
	 		
    while ( have_rows('intro_slides') ) : the_row();     			
?>			
	
<?php	
	$heroImages = get_sub_field('bg_img');	
	if($heroImages):
	$j = 1;
	foreach( $heroImages as $image ):		
?>	
<div class="heroBG-<?php echo $j;?>" style="background-image:url('<?php echo $image["url"]; ?>');background-size:cover;background-position:center center"></div>
<?php	
	$j++;
	endforeach; 
	
	endif; 
?>

<?php

	endwhile;
?>	
<?php	
endif; 
?>	
</div>


<?php ?>
<div id="headline" class="centered"><h2><?php the_field('centered_text')?></h2></div>
<div class="scrollPrompt" style="">SCROLL</div>	


<footer id="heroFooter">
<div class="bottom v__line">
	<div class="bottom v__lineBG"></div>
</div>	
<small>See More</small>
</footer>

</div>

<?php
if( have_rows('feat_prop') ):
?>

<?php
    $s = 2;
    
    while ( have_rows('feat_prop') ) : the_row();
        echo ' <div id="s-'.$s.'" class="section" data-anchor="slide'.$s.'">';
        echo "\n";
        
        echo '<div class="centered">';
        echo "\n";			
		$post_obj =  get_sub_field_object('home_development_link');
?>		
		<h2><?php echo $post_obj['value']->post_title; ?></h2>	
		<a href="<?php echo get_permalink( $post_obj['value']->ID ); ?>">
		<div class="svg-wrapper">
		<div class="text">VIEW</div>
		<svg height="55" width="283" xmlns="http://www.w3.org/2000/svg">
		<polyline class="left" points="141.7,1.5 1.7,1.5 1.7,53.5 141.7,53.5"></polyline>
		<polyline class="right" points="141.1,53.5 281.1,53.5 281.1,1.5 141.1,1.5"></polyline>
		</svg>
		</div>
		</a>

<?php 
        echo '  </div>';
?>       
		<footer>
		<div class="bottom v__line">
			<div class="bottom v__lineBG"></div>
		</div>	
		<small>See More</small>
		</footer>				 
<?php         
        echo '  </div>';
   
        echo "\n";
		wp_reset_postdata(); 
        $s++;
    endwhile;
endif;
?>

<?php get_footer(); ?>
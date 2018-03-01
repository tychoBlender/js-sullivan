<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<a href="<?php bloginfo('url'); ?>/developments">
<div class="left centered">
<div class="h__line"></div>
<small>All</small>
</div>
</a>

<style>
<?php
// check if the flexible content field has rows of data
if( have_rows('property_development_desktop') ):
// loop through the rows of data
while ( have_rows('property_development_desktop') ) :$i++;the_row();
if( get_row_layout() == 'full_width_image' ):
?>#s<?php echo $i ?>{background-image:url(<?php echo the_sub_field('img'); ?>);}	        
<?php
	elseif( get_row_layout() == 'half_width_image' ): 
?>
#s<?php echo $i ?>A.tall{background-image:url(<?php echo the_sub_field('image-left'); ?>);}
#s<?php echo $i ?>B.tall{background-image:url(<?php echo the_sub_field('image-right'); ?>);}
<?php
endif;endwhile;else:
// no layouts found
endif;
?>
@media screen and (max-width: 960px) { 
<?php
if( have_rows('property_development_mobile') ):
$heroBG = get_field('landing_page_image_mobile');    
?>		
#hero{background-image:url(<?php echo $heroBG; ?>)!important;}	
<?php
// loop through the rows of data
while ( have_rows('property_development_mobile') ): $k++;the_row();
if( get_row_layout() == 'full_width_image' ):?>
#s<?php echo $k?>{background-image:url(<?php echo the_sub_field('img'); ?>)!important;}
<?php
elseif( get_row_layout() == 'half_width_image' ): 
?>
#s<?php echo $k ?>A.tall{background-image:url(<?php echo the_sub_field('image-left'); ?>)!important;}
#s<?php echo $k ?>B.tall{background-image:url(<?php echo the_sub_field('image-right'); ?>)!important;}
<?php
endif;endwhile;else:
// no layouts found
endif;	
?>
}
</style>


<div id="fullpage">
    <div id="hero" class="section" style="background-image:url(<?php the_field('landing_page_image'); ?>)">
        <a href="<?php bloginfo('url'); ?>"><div class="logo"></div></a>
        <div class="centered">
            <h2><?php the_title(); ?></h2><p><?php the_field('detail'); ?></p>
        </div>
        <footer>
	        <small>next</small>
            <div class="bottom v__line">
                <div class="bottom v__lineBG"></div>
            </div>	
        </footer>
    </div>

<?php   
    if( have_rows('property_development_desktop') ):	    
	    $i = 0;
	    $last = count( get_field('property_development_desktop') );
        while ( have_rows('property_development_desktop') ) : $i++; the_row();    	            	        	
            if( get_row_layout() == 'full_width_image' ):
	            if($i == $last){
    	            echo '<div id="s'.$i.'" class="landscape FlexEmbed FlexEmbed--2by1 section" style="overflow:visible;background-image:url(\'';
					the_sub_field('img');
					echo '\');">';
				}else{
					echo '<div id="s'.$i.'" class="landscape FlexEmbed FlexEmbed--2by1 section" style="overflow:visible;background-image:url(\'';
					the_sub_field('img');
					echo '\')">';
				}      
	        endif; 
?>
<?php 		if($i == $last): ?>				
				<div class="singleLegal"><section class="lowerLegal">
				<div class="legal">		
					<div class="copy" style="width:80%;display:inline-block;"><small>&copy;<?php echo date("Y"); ?> <?php the_field('theme_footer_text', 'option'); ?></small></div>
				</div>
				</section>
				</div>
<?php 		endif; ?>			

	        <header>
	            <div class="top v__line"></div>
	            <small>Previous</small>
	        </header>   
<?php 		if($i < $last): ?>
	        <footer class="<?php echo $i ?>">
	            <small>next</small>
	            <div class="bottom v__line">
	                <div class="bottom v__lineBG"></div>
	            </div>	
	        </footer>  
	        
<?php 					
			endif; 
			
			echo '<div class="futureTitle"><h2>';
			echo the_sub_field('title');
			echo '</h2></div>';
?>						
			</div>
<?php 


	   endwhile;
    endif;
?>    
	<div class="section fp-auto-height">
		<div class="legal" style="position:relative;">		
			<div class="copy"><small>&copy; <?php echo date("Y"); ?> <?php the_field('theme_footer_text', 'option'); ?></small></div>
		</div>
	</div>
<?php endwhile; else : ?>
<?php endif; ?> 

<div id="mobile-nav-overlay">
	<a href="<?php bloginfo('url'); ?>"><div class="logo"></div></a>
	<div class="listWrap">
		<div class="devList">
		<h3>Developments</h3>
		<ul class="recent table">											
			
			<?php 
			//staging cat=1
			$temp = $wp_query; 
			$wp_query = null; 
			$wp_query = new WP_Query(); 
			$wp_query->query('post_type=property_development&category_name=recent&showposts=-1&orderby=menu_order&order=ASC'); 
			while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>	
			<a href="<?php the_permalink(); ?>">
				<li class="overlay"><?php the_title(); ?> »</li>
			</a>					
			<?php endwhile; ?>	
			<?php wp_reset_query(); ?>								
		</ul>
		</div>				
	</div>
</div>

<section class="lowerLegal">
<div class="legal">		
	<div class="copy"><small>&copy;<?php echo date("Y"); ?> <?php the_field('theme_footer_text', 'option'); ?></small></div>
</div>
</section>

</div>

<?php get_footer(); ?>
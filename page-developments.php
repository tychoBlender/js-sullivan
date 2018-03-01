<?php get_header(); ?>

<section id="container-properties">
    <?php 
		$temp = $wp_query; 
		$wp_query = null; 
		$wp_query = new WP_Query(); 
		$wp_query->query('nopaging=true&post_type=property_development&orderby=menu_order&order=ASC'); 
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
	?>
	<?php if (in_category('1') || in_category('3') ){ ?>
    <div class="half-sdg <?php if (!in_category('1')){ ?>darken<?php } ?>">
	    
	    <?php if (in_category('1')){ ?>
        <a href="<?php the_permalink(); ?>">
	    <?php } ?>
	    
	    <?php if (in_category('1')){ ?> 
	    	<div class="svg-wrapper">
	    <?php }else{ ?>
		    <div class="svg-wrapper coming-soon">	    
	    <?php }?>
        
            <svg height="55" width="283" xmlns="http://www.w3.org/2000/svg">
                <polyline class="left" points="141.7,1.5 1.7,1.5 1.7,53.5 141.7,53.5" />
                <polyline class="right" points="141.1,53.5 281.1,53.5 281.1,1.5 141.1,1.5" />                
                <div class="text">
	                <?php if (in_category('3')){ ?>
						Coming Soon<br><br>
					<?php } ?>
	                <?php the_title(); ?>
	            </div>
            </svg>
            
        </div>
        <div class="half-sdg-fader"></div>
        <img src="<?php the_field('landing_page_image'); ?>" />
        <?php if (in_category('1')){ ?>
        </a>
	    <?php } ?>
    </div>
    <?php } ?>
    <?php endwhile; ?>
    
</section>

<section id="js-map">     
    <nav id="js-map-nav">
        <ul>
            <li class="header recent">Recent Developments</li>
            <?php 
                $temp = $wp_query; 
                $wp_query = null; 
                $wp_query = new WP_Query(); 
                $wp_query->query('post_type=map_pin&showposts=-1&orderby=menu_order&order=ASC'); 
                $building_address = get_sub_field('building_address');
                while ($wp_query->have_posts()) : $wp_query->the_post(); 
            ?>
            <?php if (in_category('recent')){ ?>
            <li class="nav"><a href="#"><?php the_title(); ?></a></li>
            <?php } ?>
            <?php endwhile; ?>
            
            <li class="header future">Future Developments</li>
            <?php rewind_posts(); ?>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php if ( in_category('future') ) { ?>
            <li class="nav"><a href="#"><?php the_title(); ?></a></li>
            <?php } ?>
            <?php endwhile; ?>
            
            <li class="header archived">Archived Developments</li>
            <?php rewind_posts(); ?>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php if ( in_category('archived') ) { ?>
            <li class="nav"><a href="#"><?php the_title(); ?></a></li>
            <?php } ?>
            <?php endwhile; ?>
        </ul>
    </nav>
    
    <a id="map-icon-tooltip"></a>
    <a id="map-icon-tooltip-line"></a>
    
    <?php rewind_posts(); ?>
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <div class="map-icon<?php if (in_category('1')){ echo ' recent'; } else if (in_category('2')){ echo ' archived'; } else if (in_category('3')){ echo ' future'; }  ?>" style="top:<?php the_field('latitude'); ?>%; left:<?php the_field('longitude'); ?>%;" data-project="<?php the_title(); ?>" data-project-link="<?php the_field('pp_url'); ?>"></div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
    <?php if(is_user_logged_in()): ?>
    <img id="js-map-img-grid" src="http://dev.allisinc.com/js-sullivan/wp-content/themes/js-sullivan-v1/img/JS-Sullivan_165738769-grid-cropped.svg" style="position: absolute; z-index: 5;">
    <?php endif; ?>
    <img id="js-map-img" src="<?php bloginfo('template_directory'); ?>/img/JS-Sullivan_165738769-holders.svg" />
</section> 
<div id="developmentLegal">
	<section class="lowerLegal">
		<div class="legal">		
			<div class="copy"><small>&copy;<?php echo date("Y"); ?> <?php the_field('theme_footer_text', 'option'); ?></small></div>
		</div>
	</section>
</div>
<div id="mobile-nav-overlay">
	<a href="<?php bloginfo('url'); ?>"><div class="logo"></div></a>
	<div class="listWrap">
		<div class="devList">
		<h3>Developments</h3>
		<ul class="recent table">	
			<?php 
			//prod cat = 4
			//stage cat= 1
			$temp = $wp_query; 
			$wp_query = null; 
			$wp_query = new WP_Query(); 
			$wp_query->query('category_name=recent&post_type=property_development&showposts=-1&orderby=menu_order&order=ASC'); 
			while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>
			<a href="<?php the_permalink(); ?>"><li class="overlay"><?php the_title(); ?> »</li></a>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

			<a href="<?php echo home_url( '/' ); ?>future-developments/">
			<li class="overlay">Future Developments »</li>
			</a>	
		</ul>
		</div>
		
<!--
		<div class="devList">
		<h3>Future Developments</h3>
		<ul class="table future">
			<?php 			
			$temp = $wp_query; 
			$wp_query = null; 
			$wp_query = new WP_Query(); 
			$wp_query->query('category_name=future&post_type=property_development&showposts=-1&orderby=menu_order&order=ASC'); 
			while ($wp_query->have_posts()) : $wp_query->the_post(); 
				$futureFeature = get_field('future_featured');
				if($futureFeature):
			?>				
				<a href="<?php the_permalink(); ?>"><li class="overlay"><?php the_title(); ?> »</li></a>
			<?php 
				else:
			?>
				<li class="overlay"><?php the_title(); ?></li>
			<?php endif;endwhile; ?>
			<?php wp_reset_query(); ?>			
		</ul>
		</div>
-->
		
	</div>
	<section class="lowerLegal">
	<div class="legal">		
	<div class="copy"><small>&copy;<?php echo date("Y"); ?> <?php the_field('theme_footer_text', 'option'); ?></small></div></div>
	</section>
</div>

<?php get_footer(); ?>
<!doctype html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8" />	
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>

<!-- Favicons -->
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url')?>/img/favicon/favicon-144x144.ico">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url')?>/img/favicon/favicon-32x32.ico" sizes="16x16">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url')?>/img/favicon/favicon-32x32.ico" sizes="32x32">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url')?>/img/favicon/favicon-96x96.ico" sizes="96x96">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_url')?>/img/favicon/favicon-144x144.ico">

<!-- Meta -->    
<meta property="og:site_name" value="<?php the_field('theme_meta_site_name', 'option'); ?>"/>
<meta property="og:type" value="<?php the_field('theme_meta_type', 'option'); ?>"/>
<meta property="og:title" content="<?php the_field('theme_meta_title', 'option'); ?>" />
<meta property="og:url" content="<?php the_field('theme_meta_url', 'option'); ?>" />
<meta property="og:image" content="<?php the_field('theme_meta_image', 'option'); ?>" />
<meta property="og:description" content="<?php the_field('theme_meta_description', 'option'); ?>" />

<!-- Styles -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />	

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>
var propertyList = new Array,
featTitles = new Array,
featURL    = new Array,
featThumbs = new Array
<?php
if( have_rows('menu_property', 'option') ):
while ( have_rows('menu_property', 'option') ) : the_row();
$post_obj =  get_sub_field_object('single_prop_link'); ?>
featTitles.push("<?php echo $post_obj['value']->post_title; ?>");
featURL.push("<?php echo get_permalink( $post_obj['value']->ID ); ?>");
<?php         
wp_reset_postdata(); 
?>
featThumbs.push("<?php echo the_sub_field('single_thumb'); ?>");	
<?php
endwhile;
endif;
?>	
</script>

<div class="propertyMenu">
	<div class="swiper-container">
    <div class="swiper-wrapper">
	<?php 
	if( have_rows('menu_property', 'option') ):
	while ( have_rows('menu_property', 'option') ) : the_row();
		$post_obj =  get_sub_field_object('single_prop_link'); ?>
		<div class="swiper-slide centered " style="background-image: url('<?php echo the_sub_field('single_thumb'); ?>');">
		<a href="<?php echo get_permalink( $post_obj['value']->ID ); ?>"><div class="NeuzeitGro-Bol centered"><?php echo $post_obj['value']->post_title; ?></div></a>
		</div>
	<?php         
		wp_reset_postdata(); 
		endwhile;
	endif;
	?>
	</div>
	<div class="swiper-pagination"></div>
</div>



</div>


<div id="mobileMenu">
<a href="<?php bloginfo('url'); ?>" style="display:table-cell"><div class="logo"></div></a>

<div class="listWrap">
<h3>Developments</h3>
<ul class="table">				
	<?php 
		//staging cat=1
		$temp = $wp_query; 
		$wp_query = null; 
		$wp_query = new WP_Query(); 
		$wp_query->query('cat=1&post_type=property_development&showposts=-1&orderby=menu_order&order=ASC'); 
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
	?>	
	<a href="<?php the_permalink(); ?>">
		<li class="overlay"><?php the_title(); ?> »</li>
	</a>		
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	
	<a class="<?php if(is_page('developments')){ ?>tablet<?php } ?>" href="<?php echo home_url( '/' ); ?>future-developments/">
		<li class="overlay">Future Developments »</li>
	</a>	
</ul>
<br>
<br>		
<br>
<ul class="table">								
	<a href="<?php echo home_url( '/' ); ?>about/" rel="bookmark" title="About JS-Sullivan">
		<li class="overlay">About »</li>
	</a>	
	<a href="<?php echo home_url( '/' ); ?>contact/" rel="bookmark" title="Contact JS-Sullivan">
		<li class="overlay">Contact »</li>
	</a>	
</ul>
</div>
	
</div>

<?php if(is_single()){ ?>
<div id="mobileInfo">View Info</div>
<?php } ?>

<nav>	
<div id="innerWrap">	
	<div class="tr">
		<div id="menu">
			<div id="nav-icon4"><span></span><span></span><span></span></div>
		</div>			
		<a href="<?php bloginfo('url'); ?>/developments/" style="display:table-cell"><div id="grid" class="td<?php if(is_page('developments')){ echo ' nav-active'; } ?>">               
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-42 -5 14 10" style="enable-background:new -42 -5 14 10;" xml:space="preserve">
                <rect x="-42" y="-5" class="st0" width="6.5" height="4.4"></rect>
                <rect x="-34.3" y="-5" class="st0" width="6.3" height="4.4"></rect>
                <rect x="-42" y="0.6" class="st0" width="6.5" height="4.4"></rect>
                <rect x="-34.3" y="0.6" class="st0" width="6.3" height="4.4"></rect>
            </svg>
        </div></a>
		<a href="<?php echo home_url( '/' ); ?>contact/" style="display:table-cell"><div id="contact" class="td">Contact</div></a>
		<a href="<?php echo home_url( '/' ); ?>about/" style="display:table-cell"><div id="about" class="td">About</div></a>
		<div id="topLogo" class="td"><a href="<?php echo home_url( '/' ); ?>" style="display:table-cell"><div class="logo"></div></a></div>   
	</div>    	
</div>
</nav>
<div class="animsition">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php if (is_front_page() ) {
    bloginfo('name');
	} elseif ( is_category() ) {
		single_cat_title(); echo ' - ' ; bloginfo('name');
	} elseif (is_single() ) {
		single_post_title();
	} elseif (is_page() ) {
		single_post_title(); echo ' - '; bloginfo('name');
	} elseif (is_archive() ) {
		single_month_title(); echo ' - '; bloginfo('name');
	} else {
		wp_title('',true);
	} ?></title>
		
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico"/>		
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/style.css" />

<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6.css" />
<![endif]-->

<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" />
<![endif]-->

<?php

	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script('jquery');
	
	wp_head();
?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script type="text/javascript"> 

    jQuery(document).ready(function() { 
        jQuery('input[id="s"]').focus(function() {  
               jQuery("#search").addClass('focus');
        });
        
        jQuery('input[id="s"]').blur(function() {  
               jQuery("#search").removeClass('focus');
        });


        jQuery('#gallery div.active').fadeIn(1000);
        setInterval( 'slideSwitch()', 8000 );
    });

    function slideSwitch() {
    	var $active = jQuery('#gallery div.active');
    	var $next = $active.next().length ? $active.next() : jQuery('#gallery div:first');
    	$active.fadeOut(4000, function() {$active.removeClass('active')});
    	$next.fadeIn(4000, function() {$next.addClass('active')});
   	}
 
</script>
<?php 
    $options = get_option('optimizare_options'); 
    echo($options['analytics_code']); 
?>

</head>

<body <?php body_class(); ?>>

	<!--wrapper-->
	<div id="wrapper">
	
		<!--header-->
		<div id="header">
		
			<div id="logo">

				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>">
				<img src="<?php bloginfo('template_url'); ?>/images/dc-logo.png" alt="<?php bloginfo('title'); ?> - <?php bloginfo('description'); ?>" title="<?php bloginfo('title'); ?> - <?php bloginfo('description'); ?>"/>
				</a>
				
			</div><!--logo end-->
			
			
			</div><!-- header end-->
		
		<!--menu-->
			
            <div id="menubar">
				<?php
					wp_nav_menu(array('container' => 'div',
									  'container_class' => 'menu',
									  'menu_class' => 'nav',
									  'fallback_cb' => 'optimizare_page_menu'
									  ));
				?>
		<div class="clear"></div>	
            </div>
	
		<div class="clear"></div>
  
		<!--menu end-->

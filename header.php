<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	
	<!-- Title -->
	<title>
		<?php 
		global $page, $paged;    
		wp_title( '|', true, 'right' ); 
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";    
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'education' ), max( $paged, $page ) );?>
	</title> 
  
	<!-- Font -->
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  
	<!-- WordPress Pingback -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /> 
	
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	
	<!-- Profile -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<!-- CSS Style -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<!-- IE Conditional -->
	<!--[if gte IE 7]> <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" /> <![endif]-->
	<!--[if lt IE 9]> <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.5.3.min.js"></script> <![endif]-->
  
	<!-- Flex Slider -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css" media="screen" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>
	<!-- Hook up the FlexSlider -->
	<script type="text/javascript"> $(window).load(function() { $('.flexslider').flexslider(); }); </script>
	
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class('education'); ?> itemscope itemtype="http://schema.org/WebPage">

  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="<?php echo 'http://browsehappy.com/'; ?>">Upgrade to a different browser</a> or <a href="<?php echo 'http://www.google.com/chromeframe/?redirect=true'; ?>">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<!-- Logos & Searchbox -->
	<div class="container headerarea">
		<div class="row ">
			<div class="column-half ">
				<header>
					<hgroup id="logo">
                    <?php if (get_header_image() != '') :?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
						</a>
                    <?php endif;?>    
						<h1 id="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
						<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>
				</header>
			</div>
			<div class="column-half nomargin">
				<div id="searchbox">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php if (is_home() || is_archive() ) : ?>
	<?php get_template_part( 'include/slider', '' ); ?>
	<?php endif ?>
	<!-- Top Menu -->
	<div class="container topmenuarea">
		<div class="rowheader">
			<div class="column-full">
				<header>
					<nav id="topmenu" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav>
				</header>
			</div>
		</div>
	</div>

	

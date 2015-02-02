<!doctype html>

<html <?php language_attributes(); ?> data-safeMod="false" data-autoHideScrollbar="true" data-safeModPageInAnimation="fadeIn" data-inAnimation="fadeInUp" data-outAnimation="fadeOutDownBig" data-cover-h1-tune=".85" data-cover-h2-tune="2.3" data-cover-h3-tune=".6" data-cover-h3-span-tune=".8">

<head>
    <meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
	
    <!--[if lte IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
    <![endif]-->
	
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}
	?>
	
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>
	<section class="main">
		<div id="rm-container" class="rm-container rm-closed">
			<header id="header">
				<!-- NAV MENU -->
				<nav>
					<ul>
						<li><a href='#/home'></a></li>
						<li><a href='#/resume'></a></li>
						<li><a href='#/portfolio'></a></li>
						<li><a href='#/contact'></a></li>
					</ul>
				</nav>
				<!-- end NAV MENU -->
			</header>
			<!-- end #header -->
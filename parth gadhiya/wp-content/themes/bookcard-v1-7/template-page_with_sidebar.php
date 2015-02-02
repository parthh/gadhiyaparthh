<?php
/*
Template Name: Page with Sidebar
*/
?>

<!doctype html>

<html <?php language_attributes(); ?>>

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
	
    <script>
    	jQuery(document).ready(function($)
		{
			$( '.portfolio-single' ).fitVids();
		});
    </script>
</head>

<body <?php body_class( 'p-single' ); ?>>
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				?>
					<div id="post-<?php the_ID(); ?>" <?php post_class( 'container portfolio-single clearfix' ); ?>>
						<div class="row">
							<!-- TITLE -->
							<div class="span12 portfolio-field portfolio-title">
								<h2><?php the_title(); ?></h2>
							</div>
							<!-- end TITLE -->
							
							<div class="span8">
								<div class="row">
									<!-- page content -->
									<div class="span8 clearfix" style="padding-top: 1em;">
										<?php
											the_content();
											
											wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bookcard' ), 'after' => '</div>' ) );
										?>
									</div>
									<!-- end page content -->
									
									<!-- comments -->
									<div class="span8" style="padding-bottom: 2em;">
										<?php
											comments_template( "", true );
										?>
									</div>
									<!-- end comments -->
								</div>
								<!-- end row -->
							</div>
							<!-- end span8 -->
							
							<!-- page sidebar -->
							<?php
								get_sidebar();
							?>
							<!-- end page sidebar -->
						</div>
						<!-- end .row -->
					</div>
					<!-- end .container .portfolio-single -->
				<?php
			endwhile;
		endif;
		wp_reset_query();
	?>
	
	<?php
		wp_footer();
	?>
</body>
</html>
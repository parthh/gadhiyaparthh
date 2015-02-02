<?php
/*
Template Name: Blog
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

	<div class="container portfolio-single">
		<div class="row">
			<!-- TITLE -->
			<div class="span8 portfolio-field portfolio-title">
				<h2><?php echo __( 'BLOG', 'bookcard' ); ?></h2>
			</div>
			<!-- end TITLE -->
			
			<!-- Page-NAV -->
			<div class="span4 portfolio-field portfolio-nav">
				<a class="icon button back" href="<?php echo get_home_url(); ?>"><?php echo __( 'home', 'bookcard' ); ?></a>
			</div>
			<!-- end Page-NAV -->
			
			<?php
				$args_post = array( 'post_type' => 'post', 'posts_per_page' => -1 );
				$loop_post = new WP_Query( $args_post );
				
				if ( $loop_post->have_posts() ) :
					while ( $loop_post->have_posts() ) : $loop_post->the_post();
						?>
							<!-- article -->
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'span12 portfolio-field clearfix' ); ?>>
							
								<h3><?php the_title(); ?></h3>
								
								<div class="clearfix">
									<?php
										the_excerpt();
									?>
								</div>
								
								<?php
									wp_link_pages( array( 'before' => '<div class="page-links clearfix">' . __( 'Pages:', 'bookcard' ), 'after' => '</div>' ) );
								?>
							</div>
							<!-- end article -->
						<?php
					endwhile;
				endif;
				wp_reset_query();
			?>
			
			<!-- PORTFOLIO-NAV BOTTOM - column 12/12 -->
			<div class="span12 portfolio-field portfolio-nav bottom">
				<a class="icon button back" href="<?php echo get_home_url(); ?>"><?php echo __( 'home', 'bookcard' ); ?></a>
			</div>
			<!-- end PORTFOLIO-NAV BOTTOM - column 12/12 -->
		</div>
		<!-- end .row -->
	</div>
	<!-- end .container .portfolio-single -->

	<?php
		wp_footer();
	?>
</body>
</html>
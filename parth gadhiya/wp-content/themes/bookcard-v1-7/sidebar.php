<?php
	if ( get_post_type() == 'page' )
	{
		?>
			<div class="span4" style="padding-top: 1em;">
				<?php
					$my_sidebar = get_option( $post->ID . 'my_sidebar', 'page_sidebar' );
					
					if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $my_sidebar ) ) :
					endif;
				?>
			</div>
		<?php
	}
	else
	{
		?>
			<div class="span4" style="padding-top: 1em;">
				<?php
					if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'blog_sidebar' ) ) :
					endif;
				?>
			</div>
		<?php
	}
	// end if
?>
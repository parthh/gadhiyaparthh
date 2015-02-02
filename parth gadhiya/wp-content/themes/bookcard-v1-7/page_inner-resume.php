<!-- RESUME PAGE -->
<div id="resume" class="rm-back page">
	<div class="antiscroll-wrap">
		<div class="antiscroll-inner">
			<div class="content">
				<?php
					$resume_page = stripcslashes( get_option( 'resume_page', "" ) );
					
					if ( $resume_page != "" )
					{
						$args_resume_page = 'pagename=' . $resume_page;
						$loop_resume_page = new WP_Query( $args_resume_page );
						
						if ( $loop_resume_page->have_posts() ) :
							while ( $loop_resume_page->have_posts() ) : $loop_resume_page->the_post();
							
								?>
									<h2 class="inner-page-title"><span><?php the_title(); ?></span></h2>
								<?php
								
								the_content();
								
								wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bookcard' ), 'after' => '</div>' ) );
							
							endwhile;
						endif;
						wp_reset_query();
					}
					// end if
				?>
			</div>
			<!-- end .content -->
		</div>
		<!-- end .antiscroll-inner -->
	</div>
	<!-- end .antiscroll-wrap -->
	
	<div class="rm-overlay"></div>
</div>
<!-- end RESUME PAGE -->
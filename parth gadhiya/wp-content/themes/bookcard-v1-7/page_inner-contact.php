<!-- CONTACT PAGE -->
<div id="contact" class="rm-back page">
	<div class="antiscroll-wrap">
		<div class="antiscroll-inner">
			<div class="content">
				<?php
					$contact_page = stripcslashes( get_option( 'contact_page', "" ) );
					
					if ( $contact_page != "" )
					{
						$args_contact_page = 'pagename=' . $contact_page;
						$loop_contact_page = new WP_Query( $args_contact_page );
						
						if ( $loop_contact_page->have_posts() ) :
							while ( $loop_contact_page->have_posts() ) : $loop_contact_page->the_post();
							
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
	
	<!-- close link -->
	<a class="rm-close"><span></span></a>
	<!-- end close link -->
</div>
<!-- end CONTACT PAGE -->
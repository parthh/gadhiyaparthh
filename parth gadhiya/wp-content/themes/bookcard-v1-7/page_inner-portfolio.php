<!-- PORTFOLIO PAGE -->
<div id="portfolio" class="portfolio page rm-middle">
	<div class="rm-inner">
		<div class="antiscroll-wrap">
			<div class="antiscroll-inner">
				<div class="content">
					<?php
						$pf_page_title = get_option( 'pf_page_title', "PORTFOLIO" );
					?>
					<h2 class="inner-page-title"><span><?php echo $pf_page_title; ?></span></h2>
					
					<?php
						$pf_content_editor = get_option( 'pf_content_editor', 'Bottom' );
						
						if ( $pf_content_editor == 'Top' )
						{
							?>
								<!-- page content -->
								<div>
									<?php
										$pf_page = stripcslashes( get_option( 'pf_page', "" ) );
										
										if ( $pf_page != "" )
										{
											$args_contact_page = 'pagename=' . $pf_page;
											$loop_contact_page = new WP_Query( $args_contact_page );
											
											if ( $loop_contact_page->have_posts() ) :
												while ( $loop_contact_page->have_posts() ) : $loop_contact_page->the_post();
													
													the_content();
													
													wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bookcard' ), 'after' => '</div>' ) );
													
												endwhile;
											endif;
											wp_reset_query();
										}
										// end if
									?>
								</div>
								<!-- end page content -->
							<?php
						}
						// end if
					?>
					
					<ul id="filters">
						<?php
							$pf_terms = get_categories( 'type=portfolio&taxonomy=department' );
							
							if ( count( $pf_terms ) >= 2 )
							{
								?>
									<li class="current">
										<a href="#" data-filter="*"><?php echo __( 'ALL', 'bookcard' ); ?></a>
									</li>
								<?php
							}
							
							foreach ( $pf_terms as $pf_term ) :
								?>
									<li>
										<a href="#" data-filter=".<?php echo $pf_term->slug; ?>"><?php echo $pf_term->name; ?></a>
									</li>
								<?php
							endforeach;
						?>
					</ul>
					<!-- end .filters -->
					
					<div class="portfolio-items">
						<?php
							$args_portfolio = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
							$loop_portfolio = new WP_Query( $args_portfolio );
							
							if ( $loop_portfolio->have_posts() ) :
								while ( $loop_portfolio->have_posts() ) : $loop_portfolio->the_post();
									
									$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
									
									if ( $pf_type == 'Standard' )
									{
										get_template_part( 'pf', 'standard' );
									}
									elseif ( $pf_type == 'Lightbox Featured Image' )
									{
										get_template_part( 'pf', 'featured' );
									}
									elseif ( $pf_type == 'Lightbox Gallery' )
									{
										get_template_part( 'pf', 'gallery' );
									}
									elseif ( $pf_type == 'Lightbox Video' )
									{
										get_template_part( 'pf', 'video' );
									}
									elseif ( $pf_type == 'Lightbox Audio' )
									{
										get_template_part( 'pf', 'audio' );
									}
									elseif ( $pf_type == 'Direct URL' )
									{
										get_template_part( 'pf', 'url' );
									}
									
								endwhile;
							endif;
							wp_reset_query();
						?>
					</div>
					<!-- end .portfolio-items -->
					
					<?php
						if ( $pf_content_editor == 'Bottom' )
						{
							?>
								<!-- page content -->
								<div>
									<?php
										$pf_page = stripcslashes( get_option( 'pf_page', "" ) );
										
										if ( $pf_page != "" )
										{
											$args_contact_page = 'pagename=' . $pf_page;
											$loop_contact_page = new WP_Query( $args_contact_page );
											
											if ( $loop_contact_page->have_posts() ) :
												while ( $loop_contact_page->have_posts() ) : $loop_contact_page->the_post();
													
													the_content();
													
													wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bookcard' ), 'after' => '</div>' ) );
													
												endwhile;
											endif;
											wp_reset_query();
										}
										// end if
									?>
								</div>
								<!-- end page content -->
							<?php
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
	<!-- end .rm-inner -->
</div>
<!-- end PORTFOLIO PAGE -->
<!-- ABOUT PAGE -->
<div id="home" class="rm-front page">
	<div class="antiscroll-wrap">
		<div class="antiscroll-inner">
			<!-- COVER IMAGE -->
			<div class="cover">
				<div class="cover-image-holder">
					<?php
						$front_cover_image = get_option( 'front_cover_image', "" );
						$your_name = stripcslashes( get_option( 'your_name', "" ) );
					?>
					<img alt="<?php echo $your_name; ?>" src="<?php echo $front_cover_image; ?>">
				</div>
				<!-- end .cover-image-holder -->
				
				<!-- title -->
				<h1><?php echo $your_name; ?></h1>
				<!-- end title -->
				
				<!-- slogan -->
				<?php
					$your_slogan = stripcslashes( get_option( 'your_slogan', "" ) );
				?>
				<h2><?php echo $your_slogan; ?></h2>
				<!-- end slogan -->
				
				
				<!-- extra titles -->
				<?php
					$front_cover_page = stripcslashes( get_option( 'front_cover_page', "" ) );
					
					if ( $front_cover_page != "" )
					{
						$args_front_cover_page = 'pagename=' . $front_cover_page;
						$loop_front_cover_page = new WP_Query( $args_front_cover_page );
						
						if ( $loop_front_cover_page->have_posts() ) :
							while ( $loop_front_cover_page->have_posts() ) : $loop_front_cover_page->the_post();
							
								the_content();
								
								wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bookcard' ), 'after' => '</div>' ) );
							
							endwhile;
						endif;
						wp_reset_query();
					}
					// end if
				?>
				<!-- end extra titles -->
				
				
				<!-- open link -->
				<?php
					$resume_page = stripcslashes( get_option( 'resume_page', "" ) );
				?>
				<a class="rm-button-open ribbon" href="#/<?php echo $resume_page; ?>">
					<span class="ribbon-stitches-top"></span>
					<strong class="ribbon-content"><?php echo __( 'OPEN', 'bookcard' ) ?></strong>
					<span class="ribbon-stitches-bottom"></span>
				</a>
				<!-- end open link -->
				
				<!-- widget: twitter -->
				<?php
					$twitter_username = get_option( 'twitter_username', "" );
					
					if ( $twitter_username == "" )
					{
						?>
							<aside class="widget widget-twitter">
								<div id="twitter-list">
									<ul id="twitter_update_list">
<li><p class="tweet">Feel Free to add me in your Linkedin Connection</p><p class="tweet"><a href="http://ca.linkedin.com/pub/parthh-gadhiya" data-expanded-url="ca.linkedin.com/pub/parthh-gadhiya/" target="_blank" data-scribe="element:url"><span>parth gadhiya</span></a> </p></li></ul>
								</div>
								
			
							</aside>
						<?php
					}
					// end if
				?>
				<!-- end widget: twitter -->
			</div>
			<!-- end COVER IMAGE -->
		</div>
		<!-- end .antiscroll-inner -->
	</div>
	<!-- end .antiscroll-wrap -->
</div>
<!-- end ABOUT PAGE -->
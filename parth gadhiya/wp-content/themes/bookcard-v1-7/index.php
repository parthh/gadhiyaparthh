<?php
	get_header();
?>

		<div class="rm-wrapper">
			<div class="rm-cover">
				<?php
					get_template_part( 'page_inner', 'front_cover' );
				?>
				
				<?php
					get_template_part( 'page_inner', 'resume' );
				?>
			</div>
			<!-- end .rm-cover -->
			
			<?php
				get_template_part( 'page_inner', 'portfolio' );
			?>
			
			<!-- RIGHT SIDE -->
			<div class="rm-right">
				<?php
					get_template_part( 'page_inner', 'back_cover' );
				?>
				
				<?php
					get_template_part( 'page_inner', 'contact' );
				?>
			</div>
			<!-- end RIGHT SIDE -->
		</div>
		<!-- end .rm-wrapper -->
	</div>
	<!-- end #rm-container -->
</section>
<!-- end .main -->

<?php
	get_footer();
?>
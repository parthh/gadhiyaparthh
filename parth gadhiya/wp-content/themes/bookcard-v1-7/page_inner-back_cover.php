<div class="rm-front">
	<!-- BACK COVER IMAGE -->
	<div class="cover">
		<div class="cover-image-holder">
			<?php
				$back_cover_image = get_option( 'back_cover_image', "" );
				$your_name = stripcslashes( get_option( 'your_name', "" ) );
			?>
			<img alt="<?php echo $your_name; ?>" src="<?php echo $back_cover_image; ?>">
		</div>
		<!-- end cover-image-holder -->
	</div>
	<!-- end BACK COVER IMAGE -->
</div>
<!-- end .rm-front -->
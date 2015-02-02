<form role="search" id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
	<div>
		<label class="screen-reader-text" for="s" style="display: none;"><?php echo __( 'Search for:', 'bookcard' ); ?></label>
		<input type="text" id="s" name="s" placeholder="<?php echo __( 'Search...', 'bookcard' ); ?>" value="<?php the_search_query(); ?>">
		<input type="submit" id="searchsubmit" style="display: none;" value="<?php echo __( 'Search', 'bookcard' ); ?>">
	</div>
</form>
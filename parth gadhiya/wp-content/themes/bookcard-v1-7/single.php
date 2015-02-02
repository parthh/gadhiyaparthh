<?php
	if ( get_post_type() == 'post' )
	{
		get_template_part( 'post', 'single' );
	}
	elseif ( get_post_type() == 'portfolio' )
	{
		get_template_part( 'single', 'portfolio' );
	}
?>
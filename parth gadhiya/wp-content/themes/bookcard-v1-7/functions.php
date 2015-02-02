<?php

/* ====================================================================================================================================================== */

	function my_enqueue()
	{
		// Register style
		wp_register_style( 'lato', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' );
		wp_register_style( 'alfa-slab-one-nixie-one-raleway', 'http://fonts.googleapis.com/css?family=Alfa+Slab+One|Nixie+One|Raleway:200,800' );
		wp_register_style( 'tulpen-one-sacramento', 'http://fonts.googleapis.com/css?family=Tulpen+One|Sacramento' );
		wp_register_style( 'print', get_template_directory_uri() . '/css/print.css', null, null, 'print' );
		wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
		wp_register_style( 'book', get_template_directory_uri() . '/css/book.css' );
		wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
		wp_register_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox-1.3.4.css' );
		wp_register_style( 'main', get_template_directory_uri() . '/css/main.css' );
		wp_register_style( 'wp-fix', get_template_directory_uri() . '/css/wp-fix.css' );
		
		// Enqueue style
		wp_enqueue_style( 'lato' );
		wp_enqueue_style( 'alfa-slab-one-nixie-one-raleway' );
		wp_enqueue_style( 'tulpen-one-sacramento' );
		wp_enqueue_style( 'print' );
		wp_enqueue_style( 'normalize' );
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'animate' );
		wp_enqueue_style( 'book' );
		wp_enqueue_style( 'font-awesome' );
		wp_enqueue_style( 'fancybox' );
		wp_enqueue_style( 'main' );
		wp_enqueue_style( 'wp-fix' );
		
		
		// Register script
		wp_register_script( 'address', get_template_directory_uri() . '/js/jquery.address-1.5.min.js', null, null, true );
		wp_register_script( 'antiscroll', get_template_directory_uri() . '/js/antiscroll.js', null, null, true );
		wp_register_script( 'fittext', get_template_directory_uri() . '/js/jquery.fittext.js', null, null, true );
		wp_register_script( 'imagesloaded', get_template_directory_uri() . '/js/jquery.imagesloaded.min.js', null, null, true );
		wp_register_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', null, null, true );
		wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', null, null, true );
		wp_register_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', null, null, true );
		wp_register_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.pack.js', null, null, true );
		wp_register_script( 'send-mail', get_template_directory_uri() . '/js/send-mail.js', null, null, true );
		wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', null, null, true );
		wp_register_script( 'wp-fix', get_template_directory_uri() . '/js/wp-fix.js', null, null, true );
		
		// Enqueue script
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'address' );
		wp_enqueue_script( 'antiscroll' );
		wp_enqueue_script( 'fittext' );
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'fitvids' );
		wp_enqueue_script( 'validate' );
		wp_enqueue_script( 'fancybox' );
		wp_enqueue_script( 'send-mail' );
		if ( is_single() == false ) { wp_enqueue_script( 'main' ); }
		wp_enqueue_script( 'wp-fix' );
	}
	// end my_enqueue

/* ====================================================================================================================================================== */

	function my_theme_setup()
	{
		add_action( 'wp_enqueue_scripts', 'my_enqueue' );
	
		$lang_dir = get_template_directory() . '/languages';
	
		load_theme_textdomain( 'bookcard', $lang_dir ); 

		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		
		if ( is_readable( $locale_file ) )
		{
			require_once( $locale_file );
		}
	}
	// end my_theme_setup
	
	add_action( 'after_setup_theme', 'my_theme_setup' );

/* ====================================================================================================================================================== */

	function theme_skin_css()
	{
		$cover_style = get_option( 'cover_style', 'standart' );
		$base_style = get_option( 'base_style', 'clean' );
		$paper_background = get_option( 'paper_background', 'cream-dust' );
		$body_background = get_option( 'body_background', 'wood' );
		
?>

<link rel="stylesheet" type="text/css" class="cover-skin" href="<?php echo get_template_directory_uri(); ?>/css/skins/cover/<?php echo $cover_style; ?>.css">
<link rel="stylesheet" type="text/css" class="base-skin" href="<?php echo get_template_directory_uri(); ?>/css/skins/base/<?php echo $base_style; ?>.css">
<link rel="stylesheet" type="text/css" class="paper-bg-skin" href="<?php echo get_template_directory_uri(); ?>/css/skins/paper-bg/<?php echo $paper_background; ?>.css">
<link rel="stylesheet" type="text/css" class="body-bg-skin" href="<?php echo get_template_directory_uri(); ?>/css/skins/body-bg/<?php echo $body_background; ?>.css">

<?php
	}
	// end theme_skin_css
	
	add_action( 'wp_head', 'theme_skin_css' );

/* ====================================================================================================================================================== */

	function theme_style_css()
	{
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>">

<?php
	}
	// end theme_style_css
	
	add_action( 'wp_head', 'theme_style_css' );

/* ====================================================================================================================================================== */

	function theme_favicons()
	{
		$favicon = get_option( 'favicon', "" );
		
		if ( $favicon != "" )
		{
			echo '<link rel="shortcut icon" href="' . $favicon . '">' . "\n";
		}
		
		
		$apple_touch_icon = get_option( 'apple_touch_icon', "" );
		
		if ( $apple_touch_icon != "" )
		{
			$apple_touch_icon_no_ext = substr( $apple_touch_icon, 0, -4 );
			
			echo '<link rel="apple-touch-icon-precomposed" href="' . $apple_touch_icon_no_ext . '-57x57.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $apple_touch_icon_no_ext . '-72x72.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $apple_touch_icon_no_ext . '-114x114.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $apple_touch_icon_no_ext . '-144x144.png' . '">' . "\n";
		}
		// end if
	}
	// end theme_favicons
	
	add_action( 'wp_head', 'theme_favicons' );

/* ====================================================================================================================================================== */

	function my_wp_title( $title, $sep )
	{
		global $paged, $page;

		if ( is_feed() )
		{
			return $title;
		}

		$title .= get_bloginfo( 'name' );
		
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) )
		{
			$title = "$title $sep $site_description";
		}
		
		if ( $paged >= 2 || $page >= 2 )
		{
			$title = "$title $sep " . sprintf( __( 'Page %s', 'bookcard' ), max( $paged, $page ) );
		}
		
		return $title;
	}
	// end my_wp_title
	
	add_filter( 'wp_title', 'my_wp_title', 10, 2 );

/* ====================================================================================================================================================== */

	if ( function_exists( 'register_nav_menus' ) )
	{
		register_nav_menus( array(  'top_menu' => __( 'Navigation Menu', 'bookcard' ) ) );
	}
	// end register_nav_menus
	
	
	function wp_page_menu2( $args = array() )
	{
		$defaults = array(  'sort_column' => 'menu_order, post_title',
							'menu_class' => 'menu',
							'echo' => true,
							'link_before' => "",
							'link_after' => "" );
							
		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'wp_page_menu_args', $args );
		
		$menu = "";

		$list_args = $args;
		
		// Show Home in the menu
		if ( ! empty( $args['show_home'] ) )
		{
			if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			{
				$text = __( 'Home', 'bookcard' );
			}
			else
			{
				$text = $args['show_home'];
			}
			
			$class = "";
			
			if ( is_front_page() && !is_paged() )
			{
				$class = 'class="current_page_item"';
			}
			
			$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr( $text ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
			
			// If the front page is a page, add it to the exclude list
			if ( get_option( 'show_on_front' ) == 'page' )
			{
				if ( ! empty( $list_args['exclude'] ) )
				{
					$list_args['exclude'] .= ',';
				}
				else
				{
					$list_args['exclude'] = "";
				}
				
				$list_args['exclude'] .= get_option('page_on_front');
			}
			// end if
		}
		// end if
		
		$list_args['echo'] = false;
		$list_args['title_li'] = "";
		$menu .= str_replace( array( "\r", "\n", "\t" ), "", wp_list_pages( $list_args ) );
		
		if ( $menu )
		{
			$menu = '<ul class="menu-default">' . $menu . '</ul>';
		}
		
		$menu = $menu . "\n";
		$menu = apply_filters( 'wp_page_menu', $menu, $args );
		
		if ( $args['echo'] )
		{
			echo $menu;
		}
		else
		{
			return $menu;
		}
		// end if
	}
	//end wp_page_menu2

/* ====================================================================================================================================================== */

	if ( function_exists( 'add_theme_support' ) )
	{
		add_theme_support( 'post-thumbnails', array( 'portfolio' ) );
		add_theme_support( 'automatic-feed-links' );
	}
	// end add_theme_support

/* ====================================================================================================================================================== */

	if ( function_exists( 'add_image_size' ) )
	{
		add_image_size( 'featured_image', 150 );
		
		add_image_size( 'portfolio_image_1x', 400 );
		add_image_size( 'portfolio_image_2x', 800 );
		
		add_image_size( 'apple_touch_icon_57', 57, 57, true );
		add_image_size( 'apple_touch_icon_72', 72, 72, true );
		add_image_size( 'apple_touch_icon_114', 114, 114, true );
		add_image_size( 'apple_touch_icon_144', 144, 144, true );
	}
	// end add_image_size

/* ====================================================================================================================================================== */

	if ( ! isset( $content_width ) )
	{
		$content_width = 560;
	}
	// end content_width

/* ====================================================================================================================================================== */

	add_editor_style( 'custom-editor-style.css' );

/* ====================================================================================================================================================== */

	if ( function_exists( 'register_sidebar' ) )
	{
		register_sidebar( array('name' => __( 'Blog Sidebar', 'bookcard' ),
								'id' => 'blog_sidebar',
								'before_widget' => '<aside id="%1$s" class="widget %2$s" style="padding-bottom: 1em;">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
		register_sidebar( array('name' => __( 'Page Sidebar', 'bookcard' ),
								'id' => 'page_sidebar',
								'before_widget' => '<aside id="%1$s" class="widget %2$s" style="padding-bottom: 1em;">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		$sidebars_with_commas = get_option( 'sidebars_with_commas' );

		if ( $sidebars_with_commas != "" )
		{
			$sidebars = preg_split("/[\s]*[,][\s]*/", $sidebars_with_commas);

			foreach ( $sidebars as $sidebar_name )
			{
				register_sidebar(array( 'name' => $sidebar_name,
										'id' => $sidebar_name,
										'before_widget' => '<aside id="%1$s" class="widget %2$s" style="padding-bottom: 1em;">',
										'after_widget' => '</aside>',
										'before_title' => '<h3 class="widget-title">',
										'after_title' => '</h3>' ) );
			}
			// end foreach
		}
		// end if
	}
	// end register_sidebar

/* ====================================================================================================================================================== */

	function my_meta_box_sidebar()
	{
		global $post, $post_ID;
		
		?>
			<div class="admin-inside-box">
				<input type="hidden" name="my_meta_box_sidebar_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
				<h4>Select Sidebar</h4>
				<p>
					<?php
						$my_sidebar = get_option( $post->ID . 'my_sidebar', 'page_sidebar' );
					?>
					<select id="my_sidebar" name="my_sidebar" class="widefat">
						<option <?php if ( $my_sidebar == 'page_sidebar' ) { echo 'selected="selected"'; } ?> value="page_sidebar"><?php echo __( 'Page Sidebar', 'bookcard' ); ?></option>
						<option <?php if ( $my_sidebar == 'blog_sidebar' ) { echo 'selected="selected"'; } ?> value="blog_sidebar"><?php echo __( 'Blog Sidebar', 'bookcard' ); ?></option>
						
						<?php
							$sidebars_with_commas = get_option( 'sidebars_with_commas' );
							
							if ( $sidebars_with_commas != "" )
							{
								$sidebars = preg_split( "/[\s]*[,][\s]*/", $sidebars_with_commas );

								foreach ( $sidebars as $sidebar_name )
								{
									$selected = "";
									
									if ( $my_sidebar == $sidebar_name )
									{
										$selected = 'selected="selected"';
									}
									
									echo '<option ' . $selected . ' value="' . $sidebar_name . '">' . $sidebar_name . '</option>';
								}
								// end foreach
							}
							// end if
						?>
					</select>
				</p>
				<p class="howto">
					- Page with Sidebar template must be selected.<br><br>- To create a new sidebar go to:<br>Theme Options > Sidebar.
				</p>
			</div>
		<?php
	}
	// end my_meta_box_sidebar
	
	function my_add_meta_box_sidebar()
	{
		add_meta_box( 'my_meta_box_sidebar_page', __( 'Sidebar', 'bookcard' ), 'my_meta_box_sidebar', 'page', 'side', 'low' );
	}
	
	add_action( 'admin_init', 'my_add_meta_box_sidebar' );
	
	
	function my_save_meta_box_sidebar( $post_id )
	{
		global $post, $post_ID;
		
		if ( ! wp_verify_nonce( isset( $_POST['my_meta_box_sidebar_nonce'] ), basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'page' )
		{
			if ( !current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( !current_user_can( 'edit_post', $post_id ) )
			
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'page' )
		{
			update_option( $post->ID . 'my_sidebar', $_POST['my_sidebar'] );
		}
	}
	// end my_save_meta_box_sidebar
	
	add_action( 'save_post', 'my_save_meta_box_sidebar' );

/* ====================================================================================================================================================== */

	if ( ! function_exists( 'my_theme_comments' ) ) :
	
		/*
		 * Template for comments and pingbacks.
		 *
		 * To override this walker in a child theme without modifying the comments template
		 * simply create your own my_theme_comments(), and that function will be used instead.
		 *
		 * Used as a callback by wp_list_comments() for displaying the comments.
		 */
		 
		function my_theme_comments( $comment, $args, $depth )
		{
			$GLOBALS['comment'] = $comment;
			
			switch ( $comment->comment_type ) :
			
				case 'pingback' :
				
				case 'trackback' :
				
					// Display trackbacks differently than normal comments.
					?>
						<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
							<p>
								<?php
									_e( 'Pingback:', 'bookcard' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'bookcard' ), '<span class="edit-link">', '</span>' );
								?>
							</p>
					<?php
				break;
				
				default :
				
					// Proceed with normal comments.
					global $post;
					
					?>
					
					<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
						<article id="comment-<?php comment_ID(); ?>" class="comment">
							<header class="comment-meta comment-author vcard">
								<?php
									echo get_avatar( $comment, 75 );
									
									printf( '<cite class="fn">%1$s %2$s</cite>',
											get_comment_author_link(),
											// If current post author is also comment author, make it known visually.
											( $comment->user_id === $post->post_author ) ? '<span></span>' : "" );
									
									printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
											esc_url( get_comment_link( $comment->comment_ID ) ),
											get_comment_time( 'c' ),
											/* translators: 1: date, 2: time */
											sprintf( __( '%1$s at %2$s', 'bookcard' ), get_comment_date(), get_comment_time() ) );
								?>
							</header>
							<!-- end .comment-meta -->
							
							<?php
								if ( '0' == $comment->comment_approved ) :
									?>
										<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bookcard' ); ?></p>
									<?php
								endif;
							?>
							
							<section class="comment-content comment">
								<?php
									comment_text();
								?>
								
								<?php
									edit_comment_link( __( 'Edit', 'bookcard' ), '<p class="edit-link">', '</p>' );
								?>
							</section>
							<!-- end .comment-content -->
							
							<div class="reply">
								<?php
									comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'bookcard' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
								?>
							</div>
							<!-- end .reply -->
						</article>
						<!-- end #comment-## -->
					<?php
				break;
				
			endswitch;
			// end comment_type check
		}
		// end my_theme_comments

	endif;

/* ====================================================================================================================================================== */

	function create_post_type_portfolio()
	{
		$labels = array('name' => __( 'Portfolio', 'bookcard' ),
						'singular_name' => __( 'Portfolio Item', 'bookcard' ),
						'add_new' => __( 'Add New', 'bookcard' ),
						'add_new_item' => __( 'Add New', 'bookcard' ),
						'edit_item' => __( 'Edit', 'bookcard' ),
						'new_item' => __( 'New', 'bookcard' ),
						'all_items' => __( 'All', 'bookcard' ),
						'view_item' => __( 'View', 'bookcard' ),
						'search_items' => __( 'Search', 'bookcard' ),
						'not_found' =>  __( 'No Items found', 'bookcard' ),
						'not_found_in_trash' => __( 'No Items found in Trash', 'bookcard' ),
						'parent_item_colon' => '',
						'menu_name' => 'Portfolio' );
		
		$args = array(  'labels' => $labels,
						'public' => true,
						'exclude_from_search' => false,
						'publicly_queryable' => true,
						'show_ui' => true,
						'query_var' => true,
						'show_in_nav_menus' => true,
						'capability_type' => 'post',
						'hierarchical' => false,
						'menu_position' => 5,
						'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
						'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ));
					
		register_post_type( 'portfolio' , $args );
	}
	// end create_post_type_portfolio
	
	add_action( 'init', 'create_post_type_portfolio' );
	
	
	function portfolio_updated_messages( $messages )
	{
		global $post, $post_ID;
		
		$messages['portfolio'] = array( 0 => "", // Unused. Messages start at index 1.
										1 => sprintf( __( '<strong>Updated.</strong> <a target="_blank" href="%s">View</a>', 'bookcard' ), esc_url( get_permalink( $post_ID) ) ),
										2 => __( 'Custom field updated.', 'bookcard' ),
										3 => __( 'Custom field deleted.', 'bookcard' ),
										4 => __( 'Updated.', 'bookcard' ),
										// translators: %s: date and time of the revision
										5 => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'bookcard' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
										6 => sprintf( __( '<strong>Published.</strong> <a target="_blank" href="%s">View</a>', 'bookcard' ), esc_url( get_permalink( $post_ID) ) ),
										7 => __( 'Saved.', 'bookcard' ),
										8 => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview</a>', 'bookcard' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
										9 => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'bookcard' ),
										// translators: Publish box date format, see http://php.net/date
										date_i18n( __( 'M j, Y @ G:i', 'bookcard' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
										10 => sprintf( __( '<strong>Item draft updated.</strong> <a target="_blank" href="%s">Preview</a>', 'bookcard' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID) ) ) ) );
	
		return $messages;
	}
	// end portfolio_updated_messages
	
	add_filter( 'post_updated_messages', 'portfolio_updated_messages' );
	
	
	function portfolio_columns( $pf_columns )
	{
		$pf_columns = array('cb' => '<input type="checkbox">',
							'title' => __( 'Title', 'bookcard' ),
							'pf_featured_image' => __( 'Featured Image', 'bookcard' ),
							'departments' => __( 'Departments', 'bookcard' ),
							'pf_short_description' => __( 'Short Description', 'bookcard' ),
							'portfolio_type' => __( 'Type', 'bookcard' ),
							'date' => __( 'Date', 'bookcard' ) );
		
		return $pf_columns;
	}
	// end portfolio_columns
	
	add_filter( 'manage_edit-portfolio_columns', 'portfolio_columns' );
	
	
	function portfolio_custom_columns( $pf_column )
	{
		global $post, $post_ID;
		
		switch ( $pf_column )
		{
			case 'pf_featured_image':
			
				if ( has_post_thumbnail() )
				{
					the_post_thumbnail( 'featured_image' );
				}
				
			break;
			
			case 'departments':
			
				$taxon = 'department';
				$terms_list = get_the_terms( $post_ID, $taxon );
				
				if ( ! empty( $terms_list ) )
				{
					$out = array();
					
					foreach ( $terms_list as $term_list )
					{
						$out[] = '<a href="edit.php?post_type=portfolio&department=' .$term_list->slug .'">' .$term_list->name .' </a>';
					}
					
					echo join( ', ', $out );
				}
				
			break;
			
			case 'pf_short_description':
			
				$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description', "" ) );
				
				echo $pf_short_description;
				
			break;
			
			case 'portfolio_type':
			
				$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
				
				echo $pf_type;
				
			break;
		}
		// end switch
	}
	// end portfolio_custom_columns
	
	add_action( 'manage_posts_custom_column',  'portfolio_custom_columns' );
	
	
	function portfolio_taxonomy()
	{
		$labels_dep = array('name' => __( 'Departments', 'bookcard' ),
							'singular_name' => __( 'Department', 'bookcard' ),
							'search_items' =>  __( 'Search', 'bookcard' ),
							'all_items' => __( 'All', 'bookcard' ),
							'parent_item' => __( 'Parent Department', 'bookcard' ),
							'parent_item_colon' => __( 'Parent Department:', 'bookcard' ),
							'edit_item' => __( 'Edit', 'bookcard' ),
							'update_item' => __( 'Update', 'bookcard' ),
							'add_new_item' => __( 'Add New', 'bookcard' ),
							'new_item_name' => __( 'New Department Name', 'bookcard' ),
							'menu_name' => __( 'Departments', 'bookcard' ) );

		register_taxonomy(  'department',
							array( 'portfolio' ),
							array( 'hierarchical' => true,
							'labels' => $labels_dep,
							'show_ui' => true,
							'public' => true,
							'query_var' => true,
							'rewrite' => array( 'slug' => 'department' ) ) );
	}
	// end portfolio_taxonomy
	
	add_action( 'init', 'portfolio_taxonomy' );
	
	
	function only_show_departments()
	{
		global $typenow;
		
		if ( $typenow == 'portfolio' )
		{
			$filters = array( 'department' );
			
			foreach ( $filters as $tax_slug )
			{
				$tax_obj = get_taxonomy( $tax_slug );
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms( $tax_slug );
			
				echo '<select name="' .$tax_slug .'" id="' .$tax_slug .'" class="postform">';
				echo '<option value="">' . __( 'Show All', 'bookcard' ) . ' ' .$tax_name .'</option>';
				
				foreach ( $terms as $term )
				{
					echo '<option value='. $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				
				echo '</select>';
			}
			// end foreach
		}
		// end if
	}
	// end only_show_departments

	add_action( 'restrict_manage_posts', 'only_show_departments' );
	
	
	function portfolio_metabox()
	{
		global $post, $post_ID;
		
		?>
			<p>
				<input type="hidden" name="portfolio_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
			</p>
			<h4><?php echo __( 'Type', 'bookcard' ); ?></h4>
			<p class="pf-type-wrap">
				<?php
					$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
				?>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Standard' ) { echo 'checked="checked"'; } ?> value="Standard"> <?php echo __( 'Standard', 'bookcard' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Featured Image' ) { echo 'checked="checked"'; } ?> value="Lightbox Featured Image"> <?php echo __( 'Lightbox Featured Image', 'bookcard' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Gallery' ) { echo 'checked="checked"'; } ?> value="Lightbox Gallery"> <?php echo __( 'Lightbox Gallery', 'bookcard' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Video' ) { echo 'checked="checked"'; } ?> value="Lightbox Video"> <?php echo __( 'Lightbox Video', 'bookcard' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Audio' ) { echo 'checked="checked"'; } ?> value="Lightbox Audio"> <?php echo __( 'Lightbox Audio', 'bookcard' ); ?>
				</label>
				<br>
				<label style="display: inline-block;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Direct URL' ) { echo 'checked="checked"'; } ?> class="pf-type-direct-url" value="Direct URL"> <?php echo __( 'Direct URL', 'bookcard' ); ?>
				</label>
			</p>
			<p class="direct-url-wrap" style="<?php if ( $pf_type == 'Direct URL' ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
				<?php
					$pf_direct_url = stripcslashes( get_option( $post->ID . 'pf_direct_url' ) );
					$pf_link_new_tab = get_option( $post->ID . 'pf_link_new_tab', true );
				?>
				<label for="pf_direct_url"><?php echo __( 'Direct URL:', 'bookcard' ); ?></label>
				<input type="text" id="pf_direct_url" name="pf_direct_url" class="widefat code2" placeholder="Link Url" value="<?php echo $pf_direct_url; ?>">
				<label style="display: inline-block; margin-top: 5px;"><input type="checkbox" id="pf_link_new_tab" name="pf_link_new_tab" <?php if ( $pf_link_new_tab ) { echo 'checked="checked"'; } ?>> <?php echo __( 'Open link in new tab', 'bookcard' ); ?></label>
			</p>
			
			<script>
				jQuery(document).ready( function( $ )
				{
					jQuery( '.pf-type-wrap label' ).click(function()
					{
						if ( jQuery( this ).find( 'input' ).hasClass( 'pf-type-direct-url' ) )
						{
							jQuery( '.direct-url-wrap' ).show();
						}
						else
						{
							jQuery( '.direct-url-wrap' ).hide();
						}
					});
				});
			</script>
			
			<hr>
			<h4><?php echo __( 'Thumbnail Size', 'bookcard' ); ?></h4>
			<p>
				<?php
					$pf_thumb_size = get_option( $post->ID . 'pf_thumb_size', 'x1' );
				?>
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="pf_thumb_size" <?php if ( $pf_thumb_size == 'x1' ) { echo 'checked="checked"'; } ?> value="x1"> <?php echo __( '1x', 'bookcard' ); ?></label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="pf_thumb_size" <?php if ( $pf_thumb_size == 'x2' ) { echo 'checked="checked"'; } ?> value="x2"> <?php echo __( '2x', 'bookcard' ); ?></label>
			</p>
			<hr>
			<h4><?php echo __( 'Short Description', 'bookcard' ); ?></h4>
			<p>
				<?php
					$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description' ) );
				?>
				<textarea id="pf_short_description" name="pf_short_description" rows="4" cols="46" class="widefat"><?php echo $pf_short_description; ?></textarea>
			</p>
		<?php
	}
	// end portfolio_metabox
	
	
	function add_portfolio_metabox()
	{
		add_meta_box( 'portfolio_metabox', __( 'Details', 'bookcard' ), 'portfolio_metabox', 'portfolio', 'side', 'low' );
	}
	// end add_portfolio_metabox
	
	add_action( 'admin_init', 'add_portfolio_metabox' );
	
	
	function save_portfolio_details( $post_id )
	{
		global $post, $post_ID;
	
		if ( ! wp_verify_nonce( isset( $_POST['portfolio_nonce'] ), basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'portfolio' )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		if ( $_POST['post_type'] == 'portfolio' )
		{
			update_option( $post->ID . 'pf_type', $_POST['pf_type'] );
			update_option( $post->ID . 'pf_direct_url', $_POST['pf_direct_url'] );
			update_option( $post->ID . 'pf_link_new_tab', $_POST['pf_link_new_tab'] );
			update_option( $post->ID . 'pf_thumb_size', $_POST['pf_thumb_size'] );
			update_option( $post->ID . 'pf_short_description', $_POST['pf_short_description'] );
		}
		// end if
	}
	// end save_portfolio_details
	
	add_action( 'save_post', 'save_portfolio_details' );

/* ====================================================================================================================================================== */

	function custom_excerpt_length( $length )
	{
		return 200;
	}
	
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	
	function new_excerpt_more( $more )
	{
		return ' ... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">Read More</a>';
	}
	
	add_filter( 'excerpt_more', 'new_excerpt_more' );

/* ====================================================================================================================================================== */

	$theme_seo_fields = stripcslashes( get_option( 'theme_seo_fields', 'No' ) );
	
	
	function my_meta_box_seo()
	{
		global $post, $post_ID;
		
		?>
			<div class="admin-inside-box">
				<input type="hidden" name="my_meta_box_seo_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
				
				<p>
					<label for="my_seo_description"><?php echo __( 'Description', 'bookcard' ); ?></label>
					
					<?php
						$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description' ) );
					?>
					
					<textarea id="my_seo_description" name="my_seo_description" rows="4" cols="46" class="widefat"><?php echo $my_seo_description; ?></textarea>
				</p>
				
				<p>
					<label for="my_seo_keywords"><?php echo __( 'Keywords', 'bookcard' ); ?></label>
					
					<?php
						$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords' ) );
					?>
					
					<textarea id="my_seo_keywords" name="my_seo_keywords" rows="4" cols="46" class="widefat"><?php echo $my_seo_keywords; ?></textarea>
				</p>
				
				<p class="howto"><?php echo __( 'Separate keywords with commas', 'bookcard' ); ?></p>
			</div>
			<!-- end .admin-inside-box -->
		<?php
	}
	// end my_meta_box_seo
	
	
	function my_add_meta_box_seo()
	{
		add_meta_box( 'my_meta_box_seo_post', __( 'SEO', 'bookcard' ), 'my_meta_box_seo', 'post', 'side', 'low' );
		add_meta_box( 'my_meta_box_seo_page', __( 'SEO', 'bookcard' ), 'my_meta_box_seo', 'page', 'side', 'low' );
		
		$args = array( '_builtin' => false );
		$post_types = get_post_types( $args ); 
		
		foreach ( $post_types as $post_type )
		{
			add_meta_box( 'my_meta_box_seo_' . $post_type, __( 'SEO', 'bookcard' ), 'my_meta_box_seo', $post_type, 'side', 'low' );
		}
	}
	// end my_add_meta_box_seo
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'admin_init', 'my_add_meta_box_seo' );
	}
	
	
	function my_save_meta_box_seo( $post_id )
	{
		global $post, $post_ID;
		
		if ( ! wp_verify_nonce( isset( $_POST['my_meta_box_seo_nonce'] ), basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		update_option( $post->ID . 'my_seo_description', $_POST['my_seo_description'] );
		update_option( $post->ID . 'my_seo_keywords', $_POST['my_seo_keywords'] );
	}
	// end my_save_meta_box_seo
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'save_post', 'my_save_meta_box_seo' );
	}
	
	
	function my_seo_wp_head()
	{
		global $post, $post_ID;
		
		
		if ( is_singular() )
		{
			$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description', "" ) );
			$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords', "" ) );
			
			
			if ( $my_seo_description != "" )
			{
				echo '<meta name="description" content="' . $my_seo_description . '">' . "\n";
			}
			
			if ( $my_seo_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $my_seo_keywords . '">' . "\n";
			}
		}
		else
		{
			$site_description = stripcslashes( get_option( 'site_description', "" ) );
			$site_keywords = stripcslashes( get_option( 'site_keywords', "" ) );
			
			
			if ( $site_description != "" )
			{
				echo '<meta name="description" content="' . $site_description . '">' . "\n";
			}
			
			if ( $site_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $site_keywords . '">' . "\n";
			}
		}
		// end if
	}
	// end my_seo_wp_head
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'wp_head', 'my_seo_wp_head' );
	}

/* ====================================================================================================================================================== */

	add_filter( 'the_excerpt', 'do_shortcode' );
	add_filter( 'widget_text', 'do_shortcode' );

/* ====================================================================================================================================================== */

	function row( $atts, $content = "" )
	{
		$row =  '<div class="row">' . do_shortcode( $content ) . '</div>';
		
		return $row;
	}
	// end row

	add_shortcode( 'row', 'row' );

/* ====================================================================================================================================================== */

	function column( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'width' => "",
										'offset' => "" ), $atts ) );
									
		$column =  '<div class="span' . $width . ' offset' . $offset . '">' . do_shortcode( $content ) . '</div>';
		
		return $column;
	}
	// end column

	add_shortcode( 'column', 'column' );

/* ====================================================================================================================================================== */

	function cover_caption( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		$cover_caption = '<h3><span>' . $title . '</span> ' . do_shortcode( $content ) . '</h3>';
		
		return $cover_caption;
	}
	// end cover_caption
	
	add_shortcode( 'cover_caption', 'cover_caption' );

/* ====================================================================================================================================================== */

	function section_caption( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		$section_caption = '<h3><span>' . $title . '</span></h3>';
		
		return $section_caption;
	}
	// end section_caption
	
	add_shortcode( 'section_caption', 'section_caption' );

/* ====================================================================================================================================================== */

	function social_icons( $atts, $content = "" )
	{
		$social_icons = '<ul class="social">' . do_shortcode( $content ) . '</ul>';
		
		return $social_icons;
	}
	// end social_icons
	
	add_shortcode( 'social_icons', 'social_icons' );

/* ====================================================================================================================================================== */

	function social_icon( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "",
										'title' => "",
										'url' => "" ), $atts ) );
		
		$social_icon = '<li><a class="' . $type . '" target="_blank" title="' . $title . '" href="' . $url . '"></a></li>';
		
		return $social_icon;
	}
	// end social_icon
	
	add_shortcode( 'social_icon', 'social_icon' );

/* ====================================================================================================================================================== */

	function map( $atts, $content = "" )
	{
		$map = '<div class="map">' . do_shortcode( $content ) . '</div>';
		
		return $map;
	}
	// end map
	
	add_shortcode( 'map', 'map' );

/* ====================================================================================================================================================== */

	function contact_form_wrap( $atts, $content = "" )
	{
		$contact_form_wrap = '<div class="contact-form">' . do_shortcode( $content ) . '</div>';
		
		return $contact_form_wrap;
	}
	// end contact_form_wrap
	
	add_shortcode( 'contact_form_wrap', 'contact_form_wrap' );

/* ====================================================================================================================================================== */

	function letter_wrap( $atts, $content = "" )
	{
		$letter_wrap = '<div class="letter cf">' . do_shortcode( $content ) . '</div>';
		
		return $letter_wrap;
	}
	// end letter_wrap
	
	add_shortcode( 'letter_wrap', 'letter_wrap' );

/* ====================================================================================================================================================== */

	function letter_info( $atts, $content = "" )
	{
		$letter_info = '<div class="letter-info">' . do_shortcode( $content ) . '</div>';
		
		return $letter_info;
	}
	// end letter_info
	
	add_shortcode( 'letter_info', 'letter_info' );

/* ====================================================================================================================================================== */

	function stamp( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'alt' => "",
										'url' => "" ), $atts ) );
		
		$stamp = '<div class="stamp"><img alt="' . $alt . '" src="' . $url . '"></div>';
		
		return $stamp;
	}
	// end stamp
	
	add_shortcode( 'stamp', 'stamp' );

/* ====================================================================================================================================================== */

	function contact_form( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'to' => "" ), $atts ) );
		
		$contact_form = '<form id="contact-form" method="post" action="' . get_template_directory_uri() . '/send-mail.php">';
		$contact_form .= '<input type="hidden" id="to" name="to" value="' . $to . '">';
		$contact_form .= '<p>';
		$contact_form .= '<label for="name">' . __( 'Name', 'bookcard' ) . '</label>';
		$contact_form .= '<input type="text" id="name" name="name" class="required">';
		$contact_form .= '</p>';
		$contact_form .= '<p>';
		$contact_form .= '<label for="email">' . __( 'Email', 'bookcard' ) . '</label>';
		$contact_form .= '<input type="text" id="email" name="email" class="required email">';
		$contact_form .= '</p>';
		$contact_form .= '<p>';
		$contact_form .= '<label for="subject">' . __( 'Subject', 'bookcard' ) . '</label>';
		$contact_form .= '<input type="text" id="subject" name="subject" class="required">';
		$contact_form .= '</p>';
		$contact_form .= '<p>';
		$contact_form .= '<label for="message">' . __( 'Message', 'bookcard' ) . '</label>';
		$contact_form .= '<textarea id="message" name="message" class="required"></textarea>';
		$contact_form .= '</p>';
		$contact_form .= '<p>';
		$contact_form .= '<img class="ajax-loader" alt="' . __( 'Sending ...', 'bookcard' ) . '" src="' . get_template_directory_uri() . '/images/bckg/loader_light.gif">';
		$contact_form .= '<input type="submit" class="btn submit" value="' . __( 'SEND', 'bookcard' ) . '">';
		$contact_form .= '</p>';
		$contact_form .= '</form>';
		
		return $contact_form;
	}
	// end contact_form
	
	add_shortcode( 'contact_form', 'contact_form' );

/* ====================================================================================================================================================== */

	function label( $atts, $content = "" )
	{
		$label = '<span class="label">' . do_shortcode( $content ) . '</span>';
		
		return $label;
	}
	// end label
	
	add_shortcode( 'label', 'label' );

/* ====================================================================================================================================================== */

	function history_group( $atts, $content = "" )
	{
		$history_group = '<div class="history-group">' . do_shortcode( $content ) . '</div>';
		
		return $history_group;
	}
	// end history_group
	
	add_shortcode( 'history_group', 'history_group' );

/* ====================================================================================================================================================== */

	function history_unit( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'date' => "" ), $atts ) );
		
		$history_unit = '<div class="history-unit"><h4 class="work-time">' . $date . '</h4><div class="work-desc">' . do_shortcode( $content ) . '</div></div>';
		
		return $history_unit;
	}
	// end history_unit
	
	add_shortcode( 'history_unit', 'history_unit' );

/* ====================================================================================================================================================== */

	function button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'align_center' => "",
										'new_tab' => "",
										'text' => "",
										'url' => "" ), $atts ) );
										
		if ( $new_tab == 'yes' )
		{
			$new_tab_out = 'target="_blank"';
		}
		else
		{
			$new_tab_out = "";
		}
		
		if ( $align_center == 'yes' )
		{
			$button = '<div class="launch"><a class="btn" ' . $new_tab_out . ' href="' . $url . '">' . $text . '</a></div>';
		}
		else
		{
			$button = '<a class="btn" ' . $new_tab_out . ' href="' . $url . '">' . $text . '</a>';
		}
		
		return $button;
	}
	// end button
	
	add_shortcode( 'button', 'button' );

/* ====================================================================================================================================================== */

	function skill_group( $atts, $content = "" )
	{
		$skill_group = '<div class="skill-group">' . do_shortcode( $content ) . '</div>';
		
		return $skill_group;
	}
	// end skill_group
	
	add_shortcode( 'skill_group', 'skill_group' );

/* ====================================================================================================================================================== */

	function skill_unit( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'percent' => "" ), $atts ) );
		
		$skill_unit = '<div class="skill-unit"><h4>' . do_shortcode( $content ) . '</h4><div class="bar" data-percent="' . $percent . '"><div class="progress"></div></div></div>';
		
		return $skill_unit;
	}
	// end skill_unit
	
	add_shortcode( 'skill_unit', 'skill_unit' );

/* ====================================================================================================================================================== */

	function testimonial_group( $atts, $content = "" )
	{
		$testimonial_group = '<div class="testo-group">' . do_shortcode( $content ) . '</div>';
		
		return $testimonial_group;
	}
	// end testimonial_group
	
	add_shortcode( 'testimonial_group', 'testimonial_group' );

/* ====================================================================================================================================================== */

	function testimonial( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'image_url' => "",
										'image_alt' => "",
										'name' => "",
										'position' => "" ), $atts ) );
		
		$testimonial = '<div class="testo"><img alt="' . $image_alt . '" src="' . $image_url . '"><div class="text"><h4>' . $name . ' <span>' . $position . '</span></h4><p>' . do_shortcode( $content ) . '</p></div></div>';
		
		return $testimonial;
	}
	// end testimonial
	
	add_shortcode( 'testimonial', 'testimonial' );

/* ====================================================================================================================================================== */

	function service_group( $atts, $content = "" )
	{
		$service_group = '<div class="service-group">' . do_shortcode( $content ) . '</div>';
		
		return $service_group;
	}
	// end service_group
	
	add_shortcode( 'service_group', 'service_group' );

/* ====================================================================================================================================================== */

	function service( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'icon' => "",
										'title' => "" ), $atts ) );
		
		$service = '<div class="service">';
		$service .= '<i class="' . $icon . '"></i>';
		$service .= '<h4>' . $title . '</h4>';
		$service .= '<p>' . do_shortcode( $content ) . '</p>';
		$service .= '</div>';
		
		return $service;
	}
	// end service
	
	add_shortcode( 'service', 'service' );

/* ====================================================================================================================================================== */

	function portfolio_field( $atts, $content = "" )
	{	
		$portfolio_field = '<div class="portfolio-field">' . do_shortcode( $content ) . '</div>';
		
		return $portfolio_field;
	}
	// end portfolio_field
	
	add_shortcode( 'portfolio_field', 'portfolio_field' );

/* ====================================================================================================================================================== */

	function tags( $atts, $content = "" )
	{	
		$tags = '<ul class="tags">' . do_shortcode( $content ) . '</ul>';
		
		return $tags;
	}
	// end tags
	
	add_shortcode( 'tags', 'tags' );

/* ====================================================================================================================================================== */

	function tag( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "" ), $atts ) );
		
		$tag = '<li><a>' . $text . '</a></li>';
		
		return $tag;
	}
	// end tag
	
	add_shortcode( 'tag', 'tag' );

/* ====================================================================================================================================================== */

	function image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'width' => "",
										'height' => "",
										'alt' => "",
										'title' => "",
										'src' => "" ), $atts ) );
		
		$image = '<img width="' . $width . '" height="' . $height . '" alt="' . $alt . '" title="' . $title . '" src="' . $src . '">';
		
		return $image;
	}
	// end image
	
	add_shortcode( 'image', 'image' );

/* ====================================================================================================================================================== */

	function divider( $atts, $content = "" )
	{	
		$divider = '<hr>';
		
		return $divider;
	}
	// end divider
	
	add_shortcode( 'divider', 'divider' );

/* ====================================================================================================================================================== */

	function pf_lightbox_video( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'url' => "" ), $atts ) );
		
		if ( is_single() )
		{
			$pf_lightbox_video = '<div class="portfolio-field span12"><iframe width="500" height="281" src="' . $url . '"></iframe></div>';
		}
		else
		{
			$pf_lightbox_video = '<a class="lightbox iframe" data-lightbox-gallery="fancybox-item-' . get_the_ID() . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		return $pf_lightbox_video;
	}
	// end pf_lightbox_video
	
	add_shortcode( 'pf_lightbox_video', 'pf_lightbox_video' );

/* ====================================================================================================================================================== */

	function pf_lightbox_audio( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'url' => "" ), $atts ) );
										
		if ( is_single() )
		{
			$pf_lightbox_audio = '<div class="portfolio-field span12"><iframe style="width: 100%;" src="' . $url . '"></iframe></div>';
		}
		else
		{
			$pf_lightbox_audio = '<a class="lightbox iframe" data-lightbox-gallery="fancybox-item-' . get_the_ID() . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		return $pf_lightbox_audio;
	}
	// end pf_lightbox_audio
	
	add_shortcode( 'pf_lightbox_audio', 'pf_lightbox_audio' );

/* ====================================================================================================================================================== */

	function pf_lightbox_image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'first_image' => 'no',
										'title' => "",
										'url' => "" ), $atts ) );
										
		if ( $first_image == 'yes' )
		{
			$first_image_out = "";
		}
		else
		{
			$first_image_out = 'hidden';
		}
		
		if ( is_single() )
		{
			$pf_lightbox_image = '<div class="portfolio-field span12" style="text-align: center;"><img alt="' . $title . '" src="' . $url . '"></div>';
		}
		else
		{
			$pf_lightbox_image = '<a class="lightbox ' . $first_image_out . '" data-lightbox-gallery="fancybox-item-' . get_the_ID() . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		return $pf_lightbox_image;
	}
	// end pf_lightbox_image
	
	add_shortcode( 'pf_lightbox_image', 'pf_lightbox_image' );

/* ====================================================================================================================================================== */

	function about_text( $atts, $content = "" )
	{	
		$about_text = '<h4 class="about-text">' . do_shortcode( $content ) . '</h4>';
		
		return $about_text;
	}
	// end about_text
	
	add_shortcode( 'about_text', 'about_text' );

/* ====================================================================================================================================================== */

	// Actual processing of the shortcode happens here
	function my_run_shortcode( $content )
	{
		global $shortcode_tags;
		
		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();
		
		add_shortcode( 'row', 'row' );
		add_shortcode( 'column', 'column' );
		add_shortcode( 'cover_caption', 'cover_caption' );
		add_shortcode( 'section_caption', 'section_caption' );
		add_shortcode( 'social_icons', 'social_icons' );
		add_shortcode( 'social_icon', 'social_icon' );
		add_shortcode( 'map', 'map' );
		add_shortcode( 'contact_form_wrap', 'contact_form_wrap' );
		add_shortcode( 'letter_wrap', 'letter_wrap' );
		add_shortcode( 'letter_info', 'letter_info' );
		add_shortcode( 'stamp', 'stamp' );
		add_shortcode( 'contact_form', 'contact_form' );
		add_shortcode( 'label', 'label' );
		add_shortcode( 'history_group', 'history_group' );
		add_shortcode( 'history_unit', 'history_unit' );
		add_shortcode( 'button', 'button' );
		add_shortcode( 'skill_group', 'skill_group' );
		add_shortcode( 'skill_unit', 'skill_unit' );
		add_shortcode( 'testimonial_group', 'testimonial_group' );
		add_shortcode( 'testimonial', 'testimonial' );
		add_shortcode( 'service_group', 'service_group' );
		add_shortcode( 'service', 'service' );
		add_shortcode( 'portfolio_field', 'portfolio_field' );
		add_shortcode( 'tags', 'tags' );
		add_shortcode( 'tag', 'tag' );
		add_shortcode( 'image', 'image' );
		add_shortcode( 'divider', 'divider' );
		add_shortcode( 'pf_lightbox_video', 'pf_lightbox_video' );
		add_shortcode( 'pf_lightbox_audio', 'pf_lightbox_audio' );
		add_shortcode( 'pf_lightbox_image', 'pf_lightbox_image' );
		add_shortcode( 'about_text', 'about_text' );
		
		// Do the shortcode ( only the one above is registered )
		$content = do_shortcode( $content );
		
		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;
		
		return $content;
	}
	// end my_run_shortcode
	
	add_filter( 'the_content', 'my_run_shortcode', 7 );

/* ====================================================================================================================================================== */

	function theme_login_enqueue()
	{
		// Enqueue script
		wp_enqueue_script( 'jquery' );
	}
	// end theme_login_enqueue
	
	add_action( 'login_enqueue_scripts', 'theme_login_enqueue' );
	
	
	function theme_login_head()
	{
		$logo_login_hide = get_option( 'logo_login_hide', false );
		$logo_login = get_option( 'logo_login', "" );
		
		if ( $logo_login_hide )
		{
			echo '<style type="text/css"> h1 { display: none; } </style>';
		}
		else
		{
			if ( $logo_login != "" )
			{
				echo '<style type="text/css"> h1 a { cursor: default; background-image: url("' . $logo_login . '") !important; }</style>';
				
				echo '<script>
						jQuery(document).ready( function( $ )
						{
							jQuery( "h1 a" ).removeAttr( "title" );
							jQuery( "h1 a" ).removeAttr( "href" );
						});
					</script>';
			}
			// end if
		}
		// end if
		
		
		$favicon = get_option( 'favicon', "" );
		
		if ( $favicon != "" )
		{
			echo '<link rel="shortcut icon" href="' . $favicon . '">' . "\n";
		}
		
		
		$apple_touch_icon = get_option( 'apple_touch_icon', "" );
		
		if ( $apple_touch_icon != "" )
		{
			$apple_touch_icon_no_ext = substr( $apple_touch_icon, 0, -4 );
			
			echo '<link rel="apple-touch-icon-precomposed" href="' . $apple_touch_icon_no_ext . '-57x57.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $apple_touch_icon_no_ext . '-72x72.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $apple_touch_icon_no_ext . '-114x114.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $apple_touch_icon_no_ext . '-144x144.png' . '">' . "\n";
		}
		// end if
	}
	// end theme_login_head
	
	add_action( 'login_head', 'theme_login_head' );

/* ====================================================================================================================================================== */

	function theme_admin_head()
	{
		$favicon = get_option( 'favicon', "" );
		
		if ( $favicon != "" )
		{
			echo '<link rel="shortcut icon" href="' . $favicon . '">' . "\n";
		}
		
		
		$apple_touch_icon = get_option( 'apple_touch_icon', "" );
		
		if ( $apple_touch_icon != "" )
		{
			$apple_touch_icon_no_ext = substr( $apple_touch_icon, 0, -4 );
			
			echo '<link rel="apple-touch-icon-precomposed" href="' . $apple_touch_icon_no_ext . '-57x57.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $apple_touch_icon_no_ext . '-72x72.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $apple_touch_icon_no_ext . '-114x114.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $apple_touch_icon_no_ext . '-144x144.png' . '">' . "\n";
		}
		// end if
	}
	// end theme_admin_head
	
	add_action( 'admin_head', 'theme_admin_head' );

/* ====================================================================================================================================================== */

	function theme_admin_enqueue()
	{
		// Register style
		wp_register_style( 'adminstyle', get_template_directory_uri() . '/admin/adminstyle.css' );
		wp_register_style( 'colorpicker', get_template_directory_uri() . '/admin/colorpicker/colorpicker.css' );
		
		// Enqueue style
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_style( 'adminstyle' );
		wp_enqueue_style( 'colorpicker' );
		
		
		// Enqueue script
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
	}
	// end theme_admin_enqueue
	
	add_action( 'admin_enqueue_scripts', 'theme_admin_enqueue' );

/* ====================================================================================================================================================== */

	if ( is_admin() )
	{
		include_once 'theme-options.php';
	}

/* ====================================================================================================================================================== */

	include_once 'shortcode-generator.php';

/* ====================================================================================================================================================== */

	function my_customize_register( $wp_customize )
	{
		$wp_customize->add_section( 'section_fonts' , array(	'title' => __( 'Fonts', 'bookcard' ),
																'priority' => 30 ) );
																
																
		include_once 'fonts.php';
		
		
		$wp_customize->add_setting( 'setting_text_logo_font', array(	'default' => 'Alfa Slab One',
																		'transport' => 'refresh' ) );
																		
		$wp_customize->add_control( 'control_text_logo_font', array(	'label' => 'Text Logo Font',
																		'section' => 'section_fonts',
																		'settings' => 'setting_text_logo_font',
																		'type' => 'select',
																		'choices' => $all_fonts ) );
																		
																		
		$wp_customize->add_setting( 'setting_text_slogan_font', array(	'default' => 'Nixie One',
																		'transport' => 'refresh' ) );
																	
		$wp_customize->add_control( 'control_heading_font', array(	'label' => 'Text Slogan Font',
																	'section' => 'section_fonts',
																	'settings' => 'setting_text_slogan_font',
																	'type' => 'select',
																	'choices' => $all_fonts ) );
																	
																	
		$wp_customize->add_setting( 'setting_page_title_font', array(	'default' => 'Arvo',
																		'transport' => 'refresh' ) );
																
		$wp_customize->add_control( 'control_menu_font', array(	'label' => 'Page Title Font',
																'section' => 'section_fonts',
																'settings' => 'setting_page_title_font',
																'type' => 'select',
																'choices' => $all_fonts ) );
																	
																	
		$wp_customize->add_setting( 'setting_content_font', array(	'default' => 'Lato',
																	'transport' => 'refresh' ) );
																
		$wp_customize->add_control( 'control_content_font', array(	'label' => 'Content Font',
																	'section' => 'section_fonts',
																	'settings' => 'setting_content_font',
																	'type' => 'select',
																	'choices' => $all_fonts ) );
	
		
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		
		$wp_customize->get_setting( 'setting_text_logo_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_text_slogan_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_page_title_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_content_font' )->transport = 'postMessage';
	}
	// end my_customize_register
	
	add_action( 'customize_register', 'my_customize_register' );
	
	
	function my_customize_css()
	{
		?>
		
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo get_theme_mod( 'setting_text_logo_font', 'Alfa Slab One' ); ?>">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo get_theme_mod( 'setting_text_slogan_font', 'Nixie One' ); ?>">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo get_theme_mod( 'setting_page_title_font', 'Arvo' ); ?>">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo get_theme_mod( 'setting_content_font', 'Lato' ); ?>">

<style type="text/css">
	.cover h1 { font-family: "<?php echo get_theme_mod( 'setting_text_logo_font', 'Alfa Slab One' ); ?>", Georgia, serif; }
	
	.cover h2 { font-family: "<?php echo get_theme_mod( 'setting_text_slogan_font', 'Nixie One' ); ?>", Georgia, serif; }
	
	h2.inner-page-title { font-family: "<?php echo get_theme_mod( 'setting_page_title_font', 'Arvo' ); ?>", Georgia, serif; }
	
	body { font-family: "<?php echo get_theme_mod( 'setting_content_font', 'Lato' ); ?>", Georgia, serif; }
</style>

		<?php
	}
	// end my_customize_css
	
	add_action( 'wp_head', 'my_customize_css' );
	
	
	function my_customize_preview_js()
	{
		wp_enqueue_script( 'my-customizer', get_template_directory_uri() . '/js/wp-theme-customizer.js', array( 'customize-preview' ), '1.0', true );
	}
	
	add_action( 'customize_preview_init', 'my_customize_preview_js' );

/* ====================================================================================================================================================== */

	function options_wp_head()
	{
		$custom_css = stripcslashes( get_option( 'custom_css', "" ) );
		
		if ( $custom_css != "" )
		{
			echo '<style type="text/css">' . "\n";
			
				echo $custom_css;
			
			echo "\n" . '</style>' . "\n";
		}
		// end if
		
		
		$external_css = stripcslashes( get_option( 'external_css', "" ) );
		echo $external_css;
		
		
		$tracking_code_head = stripcslashes( get_option( 'tracking_code_head', "" ) );
		echo $tracking_code_head;
	}
	// end options_wp_head
	
	add_action( 'wp_head', 'options_wp_head' );

/* ====================================================================================================================================================== */

	function options_wp_footer()
	{
		$tracking_code = stripcslashes( get_option( 'tracking_code', "" ) );
		echo $tracking_code;
	}
	// end options_wp_footer
	
	add_action( 'wp_footer', 'options_wp_footer' );

/* ====================================================================================================================================================== */

?>
<?php include('images/social.png'); ?>
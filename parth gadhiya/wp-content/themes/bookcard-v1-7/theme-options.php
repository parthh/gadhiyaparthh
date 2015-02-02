<?php

/* ====================================================================================================================================================== */

	function create_tabs( $current = 'general' )
	{
		$tabs = array(  'general' => 'General',
						'style' => 'Style',
						'pages' => 'Pages',
						'blog' => 'Blog',
						'sidebar' => 'Sidebar',
						'seo' => 'SEO' );
						
		?>
			<h2 class="nav-tab-wrapper">
				<div id="icon-themes" class="icon32"></div>
				
				<div><h2>Theme Options</h2></div>
				
				<?php
					foreach ( $tabs as $tab => $name )
					{
						$class = ( $tab == $current ) ? ' nav-tab-active' : "";
						
						echo "<a class='nav-tab$class' href='?page=theme-options&tab=$tab'>$name</a>";
					}
				?>
			</h2>
		<?php
	}
	// end create_tabs

/* ====================================================================================================================================================== */

	function theme_options_page()
	{
		global $pagenow;
		
		?>
			<div class="wrap wrap2">
				<script src="<?php echo get_template_directory_uri(); ?>/admin/colorpicker/colorpicker.js"></script>
				
				<div class="status"><img height="16" width="16" alt="..." src="<?php echo get_template_directory_uri(); ?>/admin/ajax-loader.gif"><strong></strong></div>
				
				<script>
					jQuery(document).ready( function( $ )
					{
					// -------------------------------------------------------------------------
					
						var uploadID = '',
							uploadImg = '';

						jQuery( '.upload-button' ).click(function()
						{
							uploadID = jQuery(this).prev( 'input' );
							uploadImg = jQuery(this).next( 'img' );
							formfield = jQuery( '.upload' ).attr( 'name' );
							tb_show( "", 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
							return false;
						});
						
						window.send_to_editor = function( html )
						{
							imgurl = jQuery( 'img', html ).attr( 'src' );
							uploadID.val( imgurl );
							uploadImg.attr('src', imgurl);
							tb_remove();
						}
					
					// -------------------------------------------------------------------------
					
						$( ".alert-success p" ).click(function()
						{
							$(this).fadeOut( "slow", function()
							{
								$( ".alert-success" ).slideUp( "slow" );
							});
						});
					
					// -------------------------------------------------------------------------
						
						$( '.color-selector' ).each( function()
						{
							var cp = $( this );
							
							cp.ColorPicker(
							{
								color: '#ffffff',
								
								onBeforeShow: function ()
								{
									var myColor = $( this ).next( 'input' ).val();
									
									if ( myColor != "" )
									{
										$(this).ColorPickerSetColor( myColor );
										// cp.find( 'div' ).css( 'backgroundColor', '#' + myColor );
									}
								},
								onChange: function ( hsb, hex, rgb )
								{
									cp.find( 'div' ).css( 'backgroundColor', '#' + hex );
									cp.next( 'input' ).val( hex );
								},
								onSubmit: function( hsb, hex, rgb, el )
								{
									$( el ).val( hex );
									$( el ).ColorPickerHide();
								}
							});
						});
						
						
						$( '.color' ).change( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
						
						
						$( '.color' ).keypress( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
					
					// -------------------------------------------------------------------------
					
						$( 'form.ajax-form' ).submit(function()
						{
							$.ajax(
							{
								data : $(this).serialize(),
								type: "POST",
								beforeSend: function()
								{
									$('.status img').show();
									$('.status strong').html('Saving...');
									$('.status').fadeIn();
								},
								success: function(data)
								{
									$('.status img').hide();
									$('.status strong').html('Done.');
									$('.status').delay(1000).fadeOut();
								}
							});
							
							return false;
						});
					
					// -------------------------------------------------------------------------

						
					
					// -------------------------------------------------------------------------
					
						/*
						
						var calcHeight = function()
						{
							$( "#preview-frame" ).height($(window).height() - 100);
						}

						$(document).ready(function()
						{
							calcHeight();
						});

						$(window).resize(function()
						{
							calcHeight();
							
						}).load(function()
						{
							calcHeight();
						});
						
						*/
					
					// -------------------------------------------------------------------------
					});
				</script>
				
				<?php
					
					if ( isset( $_GET['tab'] ) )
					{
						create_tabs( $_GET['tab'] );
					}	
					else
					{
						create_tabs( 'general' );
					}
					
				?>

				<div id="poststuff">
					<?php
					
						// theme options page
						if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
						{
							// tab from url
							if ( isset( $_GET['tab'] ) )
							{
								$tab = $_GET['tab'];
							}
							else
							{
								$tab = 'general'; 
							}
							
							
							switch ( $tab )
							{
								case 'general' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form method="post" class="ajax-form" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>Your Name</h4>
																
																<?php
																	$your_name = stripcslashes( get_option( 'your_name', "" ) );
																?>
																<textarea id="your_name" name="your_name" rows="1" cols="50"><?php echo $your_name; ?></textarea>
															</td>
															
															<td class="option-right">
																Site title.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Your Slogan</h4>
																
																<?php
																	$your_slogan = stripcslashes( get_option( 'your_slogan', "" ) );
																?>
																<textarea id="your_slogan" name="your_slogan" rows="1" cols="50"><?php echo $your_slogan; ?></textarea>
															</td>
															
															<td class="option-right">
																Tagline.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Front Cover Image</h4>
																
																<?php
																	$front_cover_image = get_option( 'front_cover_image', "" );
																?>
																<input type="text" id="front_cover_image" name="front_cover_image" class="upload code2" style="width: 100%;" value="<?php echo $front_cover_image; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $front_cover_image; ?>">
															</td>
															
															<td class="option-right">
																Upload an image or specify an image address of your online image.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Back Cover Image</h4>
																
																<?php
																	$back_cover_image = get_option( 'back_cover_image', "" );
																?>
																<input type="text" id="back_cover_image" name="back_cover_image" class="upload code2" style="width: 100%;" value="<?php echo $back_cover_image; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $back_cover_image; ?>">
															</td>
															
															<td class="option-right">
																Upload an image or specify an image address of your online image.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Login Logo</h4>
																
																<?php
																	$logo_login = get_option( 'logo_login', "" );
																?>
																<input type="text" id="logo_login" name="logo_login" class="upload code2" style="width: 100%;" value="<?php echo $logo_login; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $logo_login; ?>">
															</td>
															
															<td class="option-right">
																For WordPress login screen.<br>Recommended (274x63)px and PNG format.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<?php
																	$logo_login_hide = get_option( 'logo_login_hide', false );
																?>
																<label><input type="checkbox" id="logo_login_hide" name="logo_login_hide" <?php if ( $logo_login_hide ) { echo 'checked="checked"'; } ?>> Disable default WordPress login logo</label>
															</td>
															
															<td class="option-right">
																Hide login logo.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Favicon</h4>
																
																<?php
																	$favicon = get_option( 'favicon', "" );
																?>
																<input type="text" id="favicon" name="favicon" class="upload code2" style="width: 100%;" value="<?php echo $favicon; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 16px;" align="right" alt="" src="<?php echo $favicon; ?>">
															</td>
															
															<td class="option-right">
																(16x16)px ICO, PNG or GIF formats.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Apple Touch Icon</h4>
																
																<?php
																	$apple_touch_icon = get_option( 'apple_touch_icon', "" );
																?>
																<input type="text" id="apple_touch_icon" name="apple_touch_icon" class="upload code2" style="width: 100%;" value="<?php echo $apple_touch_icon; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $apple_touch_icon; ?>">
															</td>
															
															<td class="option-right">
																Minimum (145x145)px PNG image that will represent your website's favicon for Apple devices such as the iPod Touch, iPhone and iPad, as well as some Android devices.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Twitter Username</h4>
																
																<?php
																	$twitter_username = get_option( 'twitter_username', "" );
																?>
																<input type="text" id="twitter_username" name="twitter_username" class="upload code2" style="width: 100%;" value="<?php echo $twitter_username; ?>">
															</td>
															
															<td class="option-right">
																Your Twitter username.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								
								break;
									
								case 'style' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>Fonts</h4>
																<?php
																	echo '<a href="' . admin_url( 'customize.php' ) . '">Customize</a>';
																?>
															</td>
															<td class="option-right">
																Select fonts from live theme customizer.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Cover Style</h4>
																
																<?php
																	$cover_style = get_option( 'cover_style', 'standart' );
																?>
																<select id="cover_style" name="cover_style" style="width: 100%;">
																	<option <?php if ( $cover_style == 'standart' ) { echo 'selected="selected"'; } ?>>standart</option>
																	<option <?php if ( $cover_style == 'deep' ) { echo 'selected="selected"'; } ?>>deep</option>
																	<option <?php if ( $cover_style == 'fancy' ) { echo 'selected="selected"'; } ?>>fancy</option>
																	<option <?php if ( $cover_style == 'fire' ) { echo 'selected="selected"'; } ?>>fire</option>
																	<option <?php if ( $cover_style == 'future' ) { echo 'selected="selected"'; } ?>>future</option>
																	<option <?php if ( $cover_style == 'modern' ) { echo 'selected="selected"'; } ?>>modern</option>
																	<option <?php if ( $cover_style == 'neon' ) { echo 'selected="selected"'; } ?>>neon</option>
																	<option <?php if ( $cover_style == 'retro' ) { echo 'selected="selected"'; } ?>>retro</option>
																</select>
															</td>
															
															<td class="option-right">
																Select cover style.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Base Style</h4>
																
																<?php
																	$base_style = get_option( 'base_style', 'clean' );
																?>
																<select id="base_style" name="base_style" style="width: 100%;">
																	<option <?php if ( $base_style == 'clean' ) { echo 'selected="selected"'; } ?>>clean</option>
																	<option <?php if ( $base_style == 'modern' ) { echo 'selected="selected"'; } ?>>modern</option>
																	<option <?php if ( $base_style == 'retro' ) { echo 'selected="selected"'; } ?>>retro</option>
																	<option <?php if ( $base_style == 'retro3d' ) { echo 'selected="selected"'; } ?>>retro3d</option>
																</select>
															</td>
															
															<td class="option-right">
																Select base style.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Paper Background</h4>
																
																<?php
																	$paper_background = get_option( 'paper_background', 'cream-dust' );
																?>
																<select id="paper_background" name="paper_background" style="width: 100%;">
																	<option <?php if ( $paper_background == 'cream-dust' ) { echo 'selected="selected"'; } ?>>cream-dust</option>
																	<option <?php if ( $paper_background == 'blizzard' ) { echo 'selected="selected"'; } ?>>blizzard</option>
																	<option <?php if ( $paper_background == 'grid' ) { echo 'selected="selected"'; } ?>>grid</option>
																	<option <?php if ( $paper_background == 'groovepaper' ) { echo 'selected="selected"'; } ?>>groovepaper</option>
																	<option <?php if ( $paper_background == 'hand-made-paper' ) { echo 'selected="selected"'; } ?>>hand-made-paper</option>
																	<option <?php if ( $paper_background == 'light-paper-fibers' ) { echo 'selected="selected"'; } ?>>light-paper-fibers</option>
																	<option <?php if ( $paper_background == 'lined-paper' ) { echo 'selected="selected"'; } ?>>lined-paper</option>
																	<option <?php if ( $paper_background == 'paper' ) { echo 'selected="selected"'; } ?>>paper</option>
																	<option <?php if ( $paper_background == 'project-paper' ) { echo 'selected="selected"'; } ?>>project-paper</option>
																	<option <?php if ( $paper_background == 'rice-paper' ) { echo 'selected="selected"'; } ?>>rice-paper</option>
																</select>
															</td>
															
															<td class="option-right">
																Select paper background.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Body Background</h4>
																
																<?php
																	$body_background = get_option( 'body_background', 'wood' );
																?>
																<select id="body_background" name="body_background" style="width: 100%;">
																	<option <?php if ( $body_background == 'wood' ) { echo 'selected="selected"'; } ?>>wood</option>
																	<option <?php if ( $body_background == 'bricks' ) { echo 'selected="selected"'; } ?>>bricks</option>
																	<option <?php if ( $body_background == 'bricks-2' ) { echo 'selected="selected"'; } ?>>bricks-2</option>
																	<option <?php if ( $body_background == 'bricks-3' ) { echo 'selected="selected"'; } ?>>bricks-3</option>
																	<option <?php if ( $body_background == 'bricks-4' ) { echo 'selected="selected"'; } ?>>bricks-4</option>
																	<option <?php if ( $body_background == 'bricks-light' ) { echo 'selected="selected"'; } ?>>bricks-light</option>
																	<option <?php if ( $body_background == 'carbon' ) { echo 'selected="selected"'; } ?>>carbon</option>
																	<option <?php if ( $body_background == 'clouds' ) { echo 'selected="selected"'; } ?>>clouds</option>
																	<option <?php if ( $body_background == 'clouds-2' ) { echo 'selected="selected"'; } ?>>clouds-2</option>
																	<option <?php if ( $body_background == 'concrete' ) { echo 'selected="selected"'; } ?>>concrete</option>
																	<option <?php if ( $body_background == 'concrete-2' ) { echo 'selected="selected"'; } ?>>concrete-2</option>
																	<option <?php if ( $body_background == 'ground' ) { echo 'selected="selected"'; } ?>>ground</option>
																	<option <?php if ( $body_background == 'grunge-wall' ) { echo 'selected="selected"'; } ?>>grunge-wall</option>
																	<option <?php if ( $body_background == 'grunge-wall-dark' ) { echo 'selected="selected"'; } ?>>grunge-wall-dark</option>
																	<option <?php if ( $body_background == 'leather' ) { echo 'selected="selected"'; } ?>>leather</option>
																	<option <?php if ( $body_background == 'linen' ) { echo 'selected="selected"'; } ?>>linen</option>
																	<option <?php if ( $body_background == 'metal-holes' ) { echo 'selected="selected"'; } ?>>metal-holes</option>
																	<option <?php if ( $body_background == 'mosaic' ) { echo 'selected="selected"'; } ?>>mosaic</option>
																	<option <?php if ( $body_background == 'noisy-net' ) { echo 'selected="selected"'; } ?>>noisy-net</option>
																	<option <?php if ( $body_background == 'shattered' ) { echo 'selected="selected"'; } ?>>shattered</option>
																	<option <?php if ( $body_background == 'stone' ) { echo 'selected="selected"'; } ?>>stone</option>
																	<option <?php if ( $body_background == 'stone-blocks' ) { echo 'selected="selected"'; } ?>>stone-blocks</option>
																	<option <?php if ( $body_background == 'tiles' ) { echo 'selected="selected"'; } ?>>tiles</option>
																	<option <?php if ( $body_background == 'watercolor' ) { echo 'selected="selected"'; } ?>>watercolor</option>
																	<option <?php if ( $body_background == 'wood-2' ) { echo 'selected="selected"'; } ?>>wood-2</option>
																	<option <?php if ( $body_background == 'wood-3' ) { echo 'selected="selected"'; } ?>>wood-3</option>
																	<option <?php if ( $body_background == 'wood-4' ) { echo 'selected="selected"'; } ?>>wood-4</option>
																	<option <?php if ( $body_background == 'woven' ) { echo 'selected="selected"'; } ?>>woven</option>
																</select>
															</td>
															
															<td class="option-right">
																Select body background.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Custom CSS</h4>
																<?php
																	$custom_css = stripcslashes( get_option( 'custom_css', "" ) );
																?>
																<textarea id="custom_css" name="custom_css" class="code2" rows="8" cols="50"><?php echo $custom_css; ?></textarea>
															</td>
															<td class="option-right">
																Quickly add custom css.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>External CSS/JS</h4>
																<?php
																	$external_css = stripcslashes( get_option( 'external_css', "" ) );
																?>
																<textarea id="external_css" name="external_css" class="code2" rows="8" cols="50"><?php echo $external_css; ?></textarea>
															</td>
															<td class="option-right">
																Add your custom external (.css) or (.js) file.
																<br>
																<br>
																Sample (.css):
																<br>
																<span class="code2">&lt;link rel="stylesheet" type="text/css" href="yourstyle.css"&gt;</span>
																<br>
																<br>
																Sample (.js):
																<br>
																<span class="code2">&lt;script src="yourscript.js"&gt;&lt;/script&gt;</span>
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
									
								break;
								
								case 'seo' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>Theme SEO Fields</h4>
																<?php
																	$theme_seo_fields = stripcslashes( get_option( 'theme_seo_fields', 'No' ) );
																?>
																<select id="theme_seo_fields" name="theme_seo_fields" style="width: 100%;">
																	<option <?php if ( $theme_seo_fields == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $theme_seo_fields == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															<td class="option-right">
																Enable or disable built-in seo fields.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Description</h4>
																<?php
																	$site_description = stripcslashes( get_option( 'site_description', "" ) );
																?>
																<textarea id="site_description" name="site_description" style="outline: none; width: 100%;" rows="3" cols="50"><?php echo $site_description; ?></textarea>
															</td>
															<td class="option-right">
																Used in front page.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Keywords</h4>
																<?php
																	$site_keywords = stripcslashes( get_option( 'site_keywords', "" ) );
																?>
																<textarea id="site_keywords" name="site_keywords" style="outline: none; width: 100%;" rows="3" cols="50"><?php echo $site_keywords; ?></textarea>
															</td>
															<td class="option-right">
																Separate keywords with commas.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Tracking Code (/head)</h4>
																<?php
																	$tracking_code_head = stripcslashes( get_option( 'tracking_code_head' ) );
																?>
																<textarea id="tracking_code_head" name="tracking_code_head" class="code2" rows="8" cols="50"><?php echo $tracking_code_head; ?></textarea>
															</td>
															<td class="option-right">
																Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Tracking Code (/body)</h4>
																<?php
																	$tracking_code = stripcslashes( get_option( 'tracking_code' ) );
																?>
																<textarea id="tracking_code" name="tracking_code" class="code2" rows="8" cols="50"><?php echo $tracking_code; ?></textarea>
															</td>
															<td class="option-right">
																Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'pages' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Front Cover Page</h4>
																
																<?php
																	$front_cover_page = stripcslashes( get_option( 'front_cover_page', "" ) );
																?>
																<select id="front_cover_page" name="front_cover_page" style="width: 100%;">
																	<option></option>
																	
																	<?php
																		$pages = get_pages();
																		
																		foreach ( $pages as $page )
																		{
																			if ( $page->post_name == $front_cover_page )
																			{
																				$option = '<option value="' . $page->post_name . '" selected="selected">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			else
																			{
																				$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			// end if
																		}
																		// end foreach
																	?>
																</select>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Resume Page</h4>
																
																<?php
																	$resume_page = stripcslashes( get_option( 'resume_page', "" ) );
																?>
																<select id="resume_page" name="resume_page" style="width: 100%;">
																	<option></option>
																	
																	<?php
																		$pages = get_pages();
																		
																		foreach ( $pages as $page )
																		{
																			if ( $page->post_name == $resume_page )
																			{
																				$option = '<option value="' . $page->post_name . '" selected="selected">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			else
																			{
																				$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			// end if
																		}
																		// end foreach
																	?>
																</select>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Contact Page</h4>
																
																<?php
																	$contact_page = stripcslashes( get_option( 'contact_page', "" ) );
																?>
																<select id="contact_page" name="contact_page" style="width: 100%;">
																	<option></option>
																	
																	<?php
																		$pages = get_pages();
																		
																		foreach ( $pages as $page )
																		{
																			if ( $page->post_name == $contact_page )
																			{
																				$option = '<option value="' . $page->post_name . '" selected="selected">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			else
																			{
																				$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			// end if
																		}
																		// end foreach
																	?>
																</select>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Portfolio Page Title</h4>
																
																<?php
																	$pf_page_title = get_option( 'pf_page_title', "PORTFOLIO" );
																?>
																<input type="text" id="pf_page_title" name="pf_page_title" style="width: 100%;" value="<?php echo $pf_page_title; ?>">
															</td>
															
															<td class="option-right">
																Your portfolio page title.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Portfolio Page</h4>
																
																<?php
																	$pf_page = stripcslashes( get_option( 'pf_page', "" ) );
																?>
																<select id="pf_page" name="pf_page" style="width: 100%;">
																	<option></option>
																	
																	<?php
																		$pages = get_pages();
																		
																		foreach ( $pages as $page )
																		{
																			if ( $page->post_name == $pf_page )
																			{
																				$option = '<option value="' . $page->post_name . '" selected="selected">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			else
																			{
																				$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
																				
																				echo $option;
																			}
																			// end if
																		}
																		// end foreach
																	?>
																</select>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Portfolio Page Content Editor</h4>
																
																<?php
																	$pf_content_editor = get_option( 'pf_content_editor', 'Bottom' );
																?>
																<select id="pf_content_editor" name="pf_content_editor" style="width: 100%;">
																	<option <?php if ( $pf_content_editor == 'Top' ) { echo 'selected="selected"'; } ?>>Top</option>
																	<option <?php if ( $pf_content_editor == 'Bottom' ) { echo 'selected="selected"'; } ?>>Bottom</option>
																</select>
															</td>
															
															<td class="option-right">
																Above / below location.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'blog' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>Post Sidebar</h4>
																
																<?php
																	$post_sidebar = get_option( 'post_sidebar', 'Yes' );
																?>
																<select id="post_sidebar" name="post_sidebar" style="width: 100%;">
																	<option <?php if ( $post_sidebar == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $post_sidebar == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable or disable.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'sidebar' :
								
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										$no_sidebar_name = get_option( 'no_sidebar_name' );
										
										if ( $no_sidebar_name == "" )
										{
											echo '<div class="alert-success" title="Click to close"><p><strong>Enter a text for new sidebar name.</strong></p></div>';
										}
										else
										{
											echo '<div class="alert-success" title="Click to close"><p><strong>Created.</strong></p></div>';
										}
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form method="post" action="<?php admin_url( 'admin.php?page=theme-settings' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>New Sidebar</h4>
																<input type="text" id="new_sidebar_name" name="new_sidebar_name" required="required" style="width: 100%;" value="">
															</td>
															<td class="option-right">
																Enter a text for a new sidebar name.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Create">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																Create new sidebar.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Sidebars</h4>
																<select id="sidebars" name="sidebars" style="width: 100%;" size="10">
																	<?php
																		$sidebars_with_commas = get_option( 'sidebars_with_commas' );
																	
																		$sidebars = preg_split("/[\s]*[,][\s]*/", $sidebars_with_commas);

																		foreach ( $sidebars as $sidebar_name )
																		{
																			echo '<option>' . $sidebar_name . '</option>';
																		}
																	?>
																</select>
															</td>
															<td class="option-right">
																New sidebar name must be different from created sidebar names.
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
							}
							// end tab content
						}
						// end settings page
					?>
				</div>
				<!-- end #poststuff -->
			</div>
			<!-- end .wrap2 -->
		<?php
	}
	// end theme_options_page
	
/* ====================================================================================================================================================== */
	
	function save_settings()
	{
		global $pagenow;
		
		if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
		{
			if ( isset ( $_GET['tab'] ) )
			{
				$tab = $_GET['tab'];
			}
			else
			{
				$tab = 'general';
			}
			
			
			switch ( $tab )
			{
				case 'general' :
					
					update_option( 'your_name', $_POST['your_name'] );
					update_option( 'your_slogan', $_POST['your_slogan'] );
					update_option( 'front_cover_image', $_POST['front_cover_image'] );
					update_option( 'back_cover_image', $_POST['back_cover_image'] );
					update_option( 'logo_login', $_POST['logo_login'] );
					update_option( 'logo_login_hide', $_POST['logo_login_hide'] );
					update_option( 'favicon', $_POST['favicon'] );
					update_option( 'apple_touch_icon', $_POST['apple_touch_icon'] );
					update_option( 'twitter_username', $_POST['twitter_username'] );
					
				break;
				
				case 'pages' :
					
					update_option( 'front_cover_page', esc_attr( $_POST['front_cover_page'] ) );
					update_option( 'resume_page', esc_attr( $_POST['resume_page'] ) );
					update_option( 'contact_page', esc_attr( $_POST['contact_page'] ) );
					update_option( 'pf_page_title', $_POST['pf_page_title'] );
					update_option( 'pf_page', esc_attr( $_POST['pf_page'] ) );
					update_option( 'pf_content_editor', $_POST['pf_content_editor'] );
					
				break;
				
				case 'blog' :
					
					update_option( 'post_sidebar', $_POST['post_sidebar'] );
					
				break;
				
				case 'style' :
					
					update_option( 'cover_style', $_POST['cover_style'] );
					update_option( 'base_style', $_POST['base_style'] );
					update_option( 'paper_background', $_POST['paper_background'] );
					update_option( 'body_background', $_POST['body_background'] );
					update_option( 'custom_css', $_POST['custom_css'] );
					update_option( 'external_css', $_POST['external_css'] );
					
				break;
				
				case 'seo' :
					
					update_option( 'theme_seo_fields', $_POST['theme_seo_fields'] );
					update_option( 'site_description', $_POST['site_description'] );
					update_option( 'site_keywords', $_POST['site_keywords'] );
					update_option( 'tracking_code_head', $_POST['tracking_code_head'] );
					update_option( 'tracking_code', $_POST['tracking_code'] );
					
				break;
				
				case 'sidebar' :
				
					update_option( 'no_sidebar_name', esc_attr( $_POST['new_sidebar_name'] ) );
					
					if ( esc_attr( $_POST['new_sidebar_name'] ) != "" )
					{
						if ( get_option( 'sidebars_with_commas' ) == "" )
						{
							update_option( 'sidebars_with_commas', esc_attr( $_POST['new_sidebar_name'] ) );
						}
						else
						{
							update_option( 'sidebars_with_commas', get_option( 'sidebars_with_commas' ) . ',' . esc_attr( $_POST['new_sidebar_name'] ) );
						}
					}
				
				break;
			}
			// end switch
		}
		// end if
	}
	// end save_settings

/* ====================================================================================================================================================== */

	function load_settings_page()
	{
		if ( isset( $_POST["settings-submit"] ) == 'Y' )
		{
			check_admin_referer( "settings-page" );
			
			save_settings();
			
			$url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
			
			wp_redirect( admin_url( 'themes.php?page=theme-options&' . $url_parameters ) );
			
			exit;
		}
	}
	// end load_settings_page

/* ====================================================================================================================================================== */

	function my_theme_menu()
	{
		$settings_page = add_theme_page('Theme Options',
										'Theme Options',
										'edit_theme_options',
										'theme-options',
										'theme_options_page' );
		
		add_action( "load-{$settings_page}", 'load_settings_page' );
	}
	
	add_action( 'admin_menu', 'my_theme_menu' );

/* ====================================================================================================================================================== */

?>
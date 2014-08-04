<?php
if ( ! isset( $content_width ) )
	$content_width = 620;

/** Tell WordPress to run optimizare_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'optimizare_setup' );

if ( ! function_exists( 'optimizare_setup' ) ):

function optimizare_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// This theme allows users to set a custom background
	add_custom_background();
	
	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/logo.png' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to optimizare_header_image_width and optimizare_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'optimizare_header_image_width', 208 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'optimizare_header_image_height', 49 ) );
	
	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyten_admin_header_style(), below.
	add_custom_image_header( '', 'optimizare_admin_header_style' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'optimizare', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'optimizare' ),
	) );

}
endif;

if ( ! function_exists( 'optimizare_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in optimizare_setup().
 */
function optimizare_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

function optimizare_page_menu($args){
  $menu = '';
  $args['echo'] = false;
  $args['title_li'] = '';

  // If the front page is a page, add it to the exclude list
  if (get_option('show_on_front') == 'page') $args['exclude'] = get_option('page_on_front');

  $content = str_replace(array("\r", "\n", "\t"), '', wp_list_pages($args));
 
  if($content):
    if($args['container']) $menu = '<'.$args['container'].' class="'.$args['container_class'].'">';
    $menu .= '<ul class="'.$args['menu_class'].'">';

    // add 'home' menu item
    $menu .= '<li class="home '.((is_front_page() && !is_paged()) ? 'current-menu-item' : null).'"><a href="'.home_url('/').'" title="'.__("Home Page").'">'.$args['link_before'].__("Home").$args['link_after'].'</a></li>';
	
	$menu .= $content;
	
	$menu .= '</ul>';
    if($args['container']) $menu .= '</'.$args['container'].'>';
    //$menu = apply_filters('wp_page_menu', $menu, $args);
  endif;

  echo $menu;
}


if ( ! function_exists( 'optimizare_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own optimizare_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function optimizare_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s', 'optimizare' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s', 'optimizare' ), get_comment_date()); ?></a><?php edit_comment_link( __( '(Edit)', 'optimizare' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'optimizare' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'optimizare'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override optimizare_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 */
function optimizare_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'optimizare' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'optimizare' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'optimizare' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'optimizare' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'optimizare' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'optimizare' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'optimizare' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'optimizare' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'optimizare' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'optimizare' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'optimizare' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'optimizare' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running optimizare_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'optimizare_widgets_init' );

/* Optimizare Options */
class optimizareOptions {
	function getOptions() {
		$options = get_option('optimizare_options');
		if (!is_array($options)) {
			$options['footer_text'] = '';
			$options['twitter_url'] = '';
			$options['analytics_code'] = '';			
			update_option('optimizare_options', $options);
		}
		return $options;
	}
	function init() {
		if(isset($_POST['classic_save'])) {
			$options = optimizareOptions::getOptions();
			$options['footer_text'] = stripslashes($_POST['footer_text']);
			$options['twitter_url'] = stripslashes($_POST['twitter_url']);
			$options['analytics_code'] = stripslashes($_POST['analytics_code']);			

			update_option('optimizare_options', $options);
		} else {
			optimizareOptions::getOptions();
		}
		add_theme_page("Optimizare Options", "Optimizare Options", 'edit_themes', basename(__FILE__), array('optimizareOptions', 'display'));
	}
	function display() {
		$options = optimizareOptions::getOptions();
?>
<form action="#" method="post" enctype="multipart/form-data" name="classic_form" id="classic_form">
	<div class="wrap">
		<h2><?php _e('Optimizare Options', 'classic'); ?></h2>
		<!-- Footer Text -->
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('<span style="font-weight:bold;">Footer Copyright Text</span>', 'classic'); ?>
						<br/>
						
					</th>
					<td>
						<!-- Footer Text -->
						<label>
							<textarea name="footer_text" cols="10" rows="10" id="footer_text" style="width:400px;height:25px;font-size:12px;" class="code"><?php echo($options['footer_text']); ?></textarea>
						</label>
						<br/>
						<small style="font-weight:normal;"><?php _e('Enter your company name here.', 'classic'); ?></small>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- twitter Url -->
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('<span style="font-weight:bold;">Twitter URL</span>', 'classic'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(HTML enabled)', 'classic') ?></small>
					</th>
					<td>
						<!-- twitter Url -->
						<label>
							<textarea name="twitter_url" cols="10" rows="10" id="twitter_url" style="width:400px;height:25px;font-size:12px;" class="code"><?php echo($options['twitter_url']); ?></textarea>
						</label>
						<br/>
						<small style="font-weight:normal;"><?php _e('Put your full twitter address here.(with http:// , leave it blank for display none.)', 'classic'); ?></small>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Google Analytics Code -->
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('<span style="font-weight:bold;">Google Analytics Code</span>', 'classic'); ?>
						<br/>
						
					</th>
					<td>
						<!-- Google Analytics Code -->
						<label>
							<textarea name="analytics_code" cols="15" rows="30" id="analytics_code" style="width:400px;height:125px;font-size:12px;" class="code"><?php echo($options['analytics_code']); ?></textarea>
						</label>
						<br/>
						<small style="font-weight:normal;"><?php _e('You can paste your Google Analytics or other tracking code in this box.', 'classic'); ?></small>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Submit -->
		<p class="submit">
			<input type="submit" name="classic_save" value="<?php _e('Update Options &raquo;', 'classic'); ?>" />
		</p>
	</div>
</form>

<?php
	}
}
add_action('admin_menu', array('optimizareOptions', 'init')); //End: Optimizare Option

?>

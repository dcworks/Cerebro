<?php
/*
 * @package WordPress
 * @subpackage CEREBRO
 * @since CEREBRO 1.0
 */
?>
<?php
// ###################### THEME CONSTRUCTION FUNCTIONS ###################### //

// Initialize theme setup
function cb_theme_setup(){
	cb_register_scripts();			// Registers javascript to the wp_head(); function
	cb_clean_headtag();				// Cleans the <head> tag
	
	cb_add_navmenu_support();		// Adds wp custom navigation menu support
	cb_add_sidebar_support();		// Adds wp custom sidebar support
	cb_add_thumbnail_support();		// Adds wp custom post_thumbnail support
	cb_add_background_support();	// Adds wp custom background support
	cb_add_editor_style();			// Adds wp editor style for tinyMCE
	
}

// Include widget functions
include(TEMPLATEPATH."/includes/theme-widgets.php");
// Include content formatting functions
include(TEMPLATEPATH."/includes/theme-formatting.php");
// Include settings page
include(TEMPLATEPATH."/includes/theme-settings.php");
// 
include(TEMPLATEPATH."/includes/theme-functions.php");


function bite_me(){
	echo "Daan, Bite me!";
}


// Register and enqueue javascript libraries
function cb_register_scripts(){
	if(!is_admin()){		
		// Deregister scripts 
		wp_deregister_script(array('easyslider','execute'));
		
		// Register scripts
		wp_register_script('easyslider', get_bloginfo('template_directory') . '/js/easyslider.js', array('jquery'),'1.7');
		wp_register_script('execute', get_bloginfo('template_directory') . '/js/execute.js', array('jquery','easyslider'));
		
		// NOTE : The order in which scripts are enqueued is crucial.
		wp_enqueue_script('jquery');
		wp_enqueue_script('easyslider');
		wp_enqueue_script('execute');
	}
}

// Clean Header
function cb_clean_headtag(){
	remove_action('wp_head', 'rsd_link');						// Remove Really Simple Discovery
	remove_action('wp_head', 'wlwmanifest_link');				// Remove Windows Live Writer
	remove_action('wp_head', 'quoter_head');					// Remove Quoter plugin
	remove_action('wp_head', 'wp_forecast_css');				// Remove wp-forecast plugin
	remove_action( 'wp_head', 'index_rel_link' ); 				// Remove Index link
	add_filter('the_generator','cb_remove_the_generator');		// Remove Wordpress generator tag
}
function cb_remove_the_generator(){
	return ' ';
}

// Add custom menu support
function cb_add_navmenu_support(){
	if (function_exists('register_nav_menus')){
		register_nav_menus(array('primary-menu' => __( 'Primary menu', 'rw-default' )));
	}
}

// Add sidebar support
function cb_add_sidebar_support(){ 
	if (function_exists('register_sidebar')){
		// Default sidebar
		register_sidebar(array(
			'name' => 'sidebar',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<div class="section_head"><h3 class="section_title">',
			'after_title' => '</h3></div>',
		));
		
		register_sidebar(array(
			'name' => 'article',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<div class="section_head"><h3 class="section_title">',
			'after_title' => '</h3></div>',
		));
		
		register_sidebar(array(
			'name' => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="section_head"><h3 class="section_title">',
			'after_title' => '</h3></div>',
		));
	}
}

//	Add thumbnail support
function cb_add_thumbnail_support(){
	if (function_exists('add_theme_support')){
		add_theme_support('post-thumbnails');
		add_image_size('main-featured', 700, 420, true);
	}
}

//	Add background support
function cb_add_background_support(){
	if (function_exists('add_custom_background')){
		add_custom_background();
	}
}

// Add editor style
function cb_add_editor_style(){
	if (function_exists('add_editor_style')){
		add_editor_style();	
	}
}

// Extend authors contact methods
function cb_add_contactmethods( $contactmethods ) {
    $contactmethods['twitter'] = 'Twitter';		// Adds twitter field get_the_author_meta('twitter',$user->ID);
    $contactmethods['facebook'] = 'Facebook';	// Adds facebook field get_the_author_meta('facebook',$user->ID);
    return $contactmethods;
}
add_filter('user_contactmethods','cb_add_contactmethods',10,1);

// CUSTOM ADMIN FOOTER
function custom_footer()
{
    echo 'Powered by <a href="http://wordpress.org/" target="_blank">Wordpress</a> | Designed & Coded by <a href="http://www.dcworks.nl/" target="_blank">DC</a>';
}
add_filter('admin_footer_text', 'custom_footer');

// ###################### CALLBACK ###################### //

// Initialize Setup
cb_theme_setup();

// ###################### GET OPTION FUNCTIONS ###################### //

// Get options from database
function cb_get_option($key) {
	global $settings;
	$option = get_option($settings);
	if(isset($option[$key])) return $option[$key];
	else return FALSE;
}

?>
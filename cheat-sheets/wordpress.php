<?php


/**
 * CHange the login logo url to match the home url
 *
 * @return void
 */
function my_login_logo_url() {
	return get_home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );


/**
 * Remove shake on Login screen
 *
 * @return void
 */
function my_login_head() {
	remove_action( 'login_head', 'wp_shake_js', 12 );
}
add_action( 'login_head', 'my_login_head' );




// Disable the Plugin and Theme Editor
define( 'DISALLOW_FILE_EDIT', true );

// Disable Plugin and Theme Update and Installation
define( 'DISALLOW_FILE_MODS', true );

// Disable All Automatic Updates
define( 'AUTOMATIC_UPDATER_DISABLED', true );





function custom_remove_menus() {
    remove_meta_box('add-post_tag', 'nav-menus', 'side');
    remove_meta_box('add-post_format', 'nav-menus', 'side');
}
add_action('admin_head-nav-menus.php', 'custom_remove_menus');


// Disbale Yoast automatic redirects
add_filter('wpseo_premium_post_redirect_slug_change', '__return_true' );
add_filter('wpseo_premium_term_redirect_slug_change', '__return_true' );




add_action( 'admin_bar_menu', 'remove_wp_admin_bar_items', 999 );
function remove_wp_admin_bar_items( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-content' );
    $wp_admin_bar->remove_node( 'customize' );
}











// Disbale language switcher css
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);





// remove annoying stuff from wp admin bar
function remove_annoying_crap( $wp_admin_bar ) {

    $wp_admin_bar->remove_node( 'customize' );
    $wp_admin_bar->remove_node( 'my-account' );

}
add_action( 'admin_bar_menu', 'remove_annoying_crap', 999 );






// Add excerpts to pages
add_action( 'init', 'shakti_add_excerpts_to_pages' );
function shakti_add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}



// Disable the visual editor for all
add_filter( 'user_can_richedit' , '__return_false', 50 );




// Lower the Yoast meta box priority
add_filter( 'wpseo_metabox_prio', 'lower_wpseo_priority' );
function lower_wpseo_priority( $html ) {
    return 'low';
}





# Turn debugging on
define('WP_DEBUG', true);

## Disable Editing in Dashboard
define( 'DISALLOW_FILE_EDIT', true);
define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', false );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'DISALLOW_FILE_EDIT', true );
define( 'FORCE_SSL_ADMIN', true );

// what rules should there be in autogen of wp-config? any of these necess?
define('AUTOSAVE_INTERVAL', 160); //seconds
define('WP_HOME', 'http://example.com');
define('WP_POST_REVISIONS', 0); //up to 3 versions
define('WP_ALLOW_MULTISITE', true);
define('NOBLOGREDIRECT', 'http://example.com'); // instead of 404 ?
define('WP_MEMORY_LIMIT', '128M');
define('WP_MEMORY_MAX_LIMIT', '512M');
define('DISALLOW_FILE_MODS', true);
define('SAVEQUERIES', true);
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content');
define('WP_CONTENT_URL', 'http://example.com/content');
define('WP_PLUGIN_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content/wp-content/plugins');
define('WP_PLUGIN_URL', 'http://example.com/content/wp-content/plugins');
define('PLUGINDIR', $_SERVER['DOCUMENT_ROOT'] . '/content/wp-content/plugins');
define('WP_CONTENT_URL', 'http://static.example.com');
define('COOKIE_DOMAIN', 'http://example.com');


// Set up automatic updates:
define( 'WP_AUTO_UPDATE_CORE', true );
add_filter( 'auto_update_plugin', '__return_true' );


// Disable WP revisions
define('AUTOSAVE_INTERVAL', 300 ); // seconds
define('WP_POST_REVISIONS', false );


// Media - set default image link location to 'None'
update_option('image_default_link_type','none');


// Always Show Kitchen Sink in WYSIWYG Editor
function unhide_kitchensink( $args ) {
	$args['wordpress_adv_hidden'] = false; return $args;
}
add_filter( 'tiny_mce_before_init', 'unhide_kitchensink' );














// WORDPRESS - FILE PERMISSIONS
// Note: WP Engine has a handy little button in the admin section to do this automatically.  This only necessary on self-hosted environments or as part of a deployment script.

// Permissions for a standard WordPress server configuration
// Some web servers are strict. Setting your wp-config.php to 660 might stop your website from working - In this case, just leave it as 664.
// Note: sudo might not be necessary (or permitted) as it depends on the server configuration.

// sudo find . -type f -exec chmod 664 {} +
// sudo find . -type d -exec chmod 775 {} +
// sudo chmod 660 wp-config.php


// Permissions for a shared server configuration or SuEXEC configuration
// Some web servers are strict. Setting your wp-config.php to 660 might stop your website from working - In this case, just leave it as 640; if that still doesn’t work, then use 644.
// Note: sudo might not be necessary (or permitted) as it depends on the server configuration.

// sudo find . -type f -exec chmod 644 {} +
// sudo find . -type d -exec chmod 755 {} +
// sudo chmod 600 wp-config.php




// // USEFUL DATABASE COMMANDS

// // Delete Revisions
// DELETE FROM wp_posts WHERE post_type = "revision";
// DELETE a,b,c FROM wp_posts a LEFT JOIN wp_term_relationships b ON (a.ID = b.object_id)
// LEFT JOIN wp_postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision'

// // Delete Pingbacks
// DELETE FROM wp_comments WHERE comment_type = 'pingback';

// // Delete spam comments
// DELETE from wp_comments WHERE comment_approved = '0'

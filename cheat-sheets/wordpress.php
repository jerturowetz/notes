<?php
/**
 * Cheat sheet : Wordpress
 *
 */

## WP_CLI stuff
# you can use useful wp functions like
$assoc_args = wp_parse_args( $dunno, array(
	'foo' => true,
	'bar' => 'baz',
));

# it helps to add --verbose or --quiet or both as flags to your custom functions
$verbose = isset( $assoc_args['verbose'] );
if ( $verbose ) {
	WP_CLI::log( 'Thank you for reading me!' );
}

# little known constant that tells WP we're dong data stuff, useful in wp-cli commands
#v prevents some post-import pings and extraneous checks
if ( ! defined( 'WP_IMPORTING' ) ) {
	define( 'WP_IMPORTING', true );
}


 if ( !function_exists( 'cmb2_get_gravity_forms' ) ) :
function cmb2_get_gravity_forms() {

  // Initate an empty array
  $forms = array();

  $gravity_forms = GFAPI::get_forms();
  if ( $gravity_forms ) : foreach ( $gravity_forms as $gravity_form ) :

    // Output
    $forms[ $gravity_form['id'] ] = $gravity_form['title'] ;

  endforeach; endif;

  // OUTPUT
  asort( $forms );
  $output = $forms;
  return $output;

}
endif;




WP engine server rule
We're using this on standardnet to redirect non-logged-in users to the login page if they're trying to access an image

set $is_image 0;
if ( $uri ~* "^/wp-content/uploads/.+" ) {
  set $is_image 1;
}

set $logged_in 0;
if ( $http_cookie ~* "wordpress_logged_in" ) {
  set $logged_in 1;
}

set $got_both_cookie_vars "$is_image:$logged_in";
if ( $got_both_cookie_vars = "1:0" ) {
  rewrite ^/(.*) https://secure.standardpro.com/wp-login.php?redirect_to=https://secure.standardpro.com/$1&reauth=1;
}




## Disable Editing in Dashboard
define('DISALLOW_FILE_EDIT', true);



define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', false );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'DISALLOW_FILE_EDIT', true );
define( 'FORCE_SSL_ADMIN', true );


function get_tax_terms_list_for_select( $taxonomy = null ) {

    $this_id = isset( $_GET['post'] ) ? $_GET['post'] : null;
    $taxonomy = get_post_meta( $this_id, 'sp_docs_taxonomy', true );

    if ( $this_id && $taxonomy ) {

        $args = array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            );

        $terms = get_terms( $args );

    }

    if ( isset( $terms ) ) {

        $term_list = array();

        foreach ( $terms as $term ) {

            $complexTermName = '';
            $parentID = $term->parent;

            while ( $parentID != 0 ) :

                $termParent = get_term_by( 'id', $parentID, $taxonomy );

                $complexTermName = $termParent->name . ' - ' . $complexTermName;
                $parentID = $termParent->parent;

            endwhile;

            $complexTermName .= $term->name;
            $term_list[ $term->term_id ] = $complexTermName ;
            }

        asort($term_list);
        return $term_list;

    }

}




// Turn off editor on specific page templates
function remove_editor_on_specified_templates() {

    if (isset($_GET['post'])) :

        $id = $_GET['post'];
        $current_template = get_post_meta($id, '_wp_page_template', true);

        $templates = array(
          'templates/e-catalogue.php',
          'templates/products.php',
          'templates/solutions.php',
          'templates/home.php',
          'templates/about-exec-team.php',
          'templates/docs.php',
          );

        if ( $templates ): foreach ( $templates as $template ) :

          if( $current_template == $template ){
              remove_post_type_support( 'page', 'editor' );
          }

        endforeach; endif;

    endif;

}
add_action('init', 'remove_editor_on_specified_templates');






// Get pages for meta
function cmb2_get_pages() {

  $post_type = 'page';

  $args = array(
    'posts_per_page'   => -1,
    'orderby'          => 'name',
    'post_type'        => $post_type,
    'post_status'      => 'publish',
    'suppress_filters' => 0,
  );
  $pages = get_posts( $args );

  // Initate an empty array
  $output = array();
  if ( ! empty( $pages ) ) : foreach ( $pages as $page ) :

    // Output
    $output[ $page->ID ] = $page->post_title ;

  endforeach; endif;
  wp_reset_postdata();

  asort( $output );
  return $output;

}





function is_admin_menu_item( $handle ){
  if( !is_admin() || (defined('DOING_AJAX') && DOING_AJAX) )
    return false;
  global $menu;
  $check_menu = $menu;
  if( empty( $check_menu ) )
    return false;
  foreach( $check_menu as $k => $item ) :
      if( $handle == $item[0] )
        return true;
  endforeach;
  return false;
}







/* Print handles of loaded styles */
function rf_inspect_styles() {
    global $wp_styles ;
    foreach( $wp_styles ->queue as $handle ) :
        echo $handle . ' | ';
    endforeach;
}
//add_action( 'wp_print_scripts', 'rf_inspect_styles' );



/* Print handles of loaded scripts */
function rf_inspect_scripts() {
    global $wp_scripts ;
    foreach( $wp_scripts ->queue as $handle ) :
        echo $handle . ' | ';
    endforeach;
}
//add_action( 'wp_print_scripts', 'rf_inspect_scripts' );




// fix youtube embed
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;
function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}






function custom_remove_menus() {
    remove_meta_box('add-post_tag', 'nav-menus', 'side');
    remove_meta_box('add-post_format', 'nav-menus', 'side');
}
add_action('admin_head-nav-menus.php', 'custom_remove_menus');




// Disbale automatic redirects
add_filter('wpseo_premium_post_redirect_slug_change', '__return_true' );
add_filter('wpseo_premium_term_redirect_slug_change', '__return_true' );

function lower_wpseo_priority( $html ) {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'lower_wpseo_priority' );




// change login logo url
function my_login_logo_url() {
    return 'http://standardpro.com';
    }
add_filter( 'login_headerurl', 'my_login_logo_url' );


// disable shake on login screen
function my_login_head() {
  remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'my_login_head');





// I have no idea why but I changed the login text here
function login_function() {
    add_filter( 'gettext', 'username_change', 20, 3 );
    function username_change( $translated_text, $text, $domain )
    {
        if ($text === 'Username or Email Address')
        {
            $translated_text = 'Username';
        }
        return $translated_text;
    }
}
add_action( 'login_head', 'login_function' );





// Disbale language switcher css
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);






function get_admin_menu_item( $handle ){

  if( !is_admin() || (defined('DOING_AJAX') && DOING_AJAX) )
    return false;

  global $menu;
  $check_menu = $menu;

  if( empty( $check_menu ) )
    return false;

  foreach( $check_menu as $k => $item ) :

      if( $handle == $item[0] )
        return $item[2];

  endforeach;

  return false;

}



<?php
/*
Plugin Name: Disable the Visual Editor
Description: This disables the visual editor on all WYSIWYG boxes - doesn't always play nice with themes / plugins
Author: Jeremy Turowetz
Version: 1.0
Author URI: http://jeremy.turowetz.com/
License: GPLv3 or later
*/

defined('ABSPATH') or die("No script kiddies please!");

// Disable the visual editor for all
add_filter( 'user_can_richedit' , '__return_false', 50 );





<?php
/*
Plugin Name: Taxonomy Helpers
Description: Adds <code>get_top_level_terms( $tax, $term_slug )</code>, <code>term_has_parent( $tax, $term_slug )</code> & <code>term_has_children( $tax, $term_slug )</code> - the first returns an array of matches, the rest return bool.  Use <code>get_query_var( 'taxonomy' )</code> & <code>get_query_var( 'term' )</code> for the vars - or just leave them blank!
Author: Jeremy Turowetz
Version: 1.0
Author URI: http://jeremy.turowetz.com/
License: GPLv3 or later
*/

defined('ABSPATH') or die("No script kiddies please!");



/*
 * Fetches top level terms for the defined taxonomy
 */
function get_top_level_terms( $tax = '', $term_slug = '' ){

  // If vars aren't defined, get the tax & term for the current screen
  if ( ! $tax ) {
    $tax = get_query_var( 'taxonomy' );
  }
  if ( ! $term_slug ) {
    $term_slug = get_query_var( 'term' );
  }

  // get all top terms for current tax & init an empty array for storage of matches
  $topTerms = get_terms( $tax , array('hide_empty' => false, 'parent' => 0) );
  $termini = array();

  if ( $topTerms ) : foreach ( $topTerms as $typeTerm ) :
    $termini[] =  $typeTerm->term_id;
  endforeach; endif;

  // return term ID & corresponding top terms
  return in_array( $term_slug->term_id, $termini);

}



/*
 * Checks if current term has a parent
 */
function term_has_parent( $tax = '', $term_slug = '' ) {

  // If vars aren't defined, get the tax & term for the current screen
  if ( ! $tax ) {
    $tax = get_query_var( 'taxonomy' );
  }
  if ( ! $term_slug ) {
    $term_slug = get_query_var( 'term' );
  }

  $term = get_term_by( 'slug', $term_slug, $tax ); // get current term slug
  $parent = get_term( $term->parent, $tax ); // get parent term

  if ( $parent->term_id!="" ) {

    return true;

  } else {

    return false;

  }

}



/*
 * Checks if current term has children
 */
function term_has_children( $taxonomy = '', $term_slug = '' ) {

  // If vars aren't defined, get the tax & term for the current screen
  if ( !$taxonomy ) {
    $taxonomy = get_query_var( 'taxonomy' );
  }
  if ( !$term_slug ) {
    $term_slug = get_query_var( 'term' );
  }

  $term = get_term_by( 'slug', $term_slug, $taxonomy ); // get current term
  $children = get_term_children( $term->term_id, $taxonomy ); // get children

  if ( sizeof( $children ) > 0 ) {

    return true;

  } elseif ( sizeof( $children ) == 0 ) {

    return false;

  } elseif ( sizeof( $children ) > 0 ) {

    return true;

  }

}



<?php

if( !function_exists( 'get_excerpt' ) ) {

  function get_excerpt( $blogpost, $count ){

    $permalink = get_permalink($blogpost->ID);

    if ( !empty($blogpost->post_excerpt) ) {
      $excerpt_content = $blogpost->post_excerpt;
    } else {
      $excerpt_content = $blogpost->post_content;
    }

    $text = euged_strip_shortcodes( $excerpt_content );
    $text = strip_tags($text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = substr($text, 0, $count);
    $text = $text . '... <span class="read-more"><a href="' . $permalink . '">' . __('[Read More]', 'vsfservices') . '</a></span>' ;
    $text = apply_filters('the_content', $text );
    return $text;

  }
}




// this will clean up strings real real nice
function stringcleaner($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}






// Hide editor on specific pages.
if( !function_exists( 'vsf_hide_editor' ) ) :
add_action( 'admin_init', 'vsf_hide_editor' );
function vsf_hide_editor() {

  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);

  // Hide the editor on a page with a specific page template
  if($template_file == 'template-services.php') { // the filename of the page template
    remove_post_type_support('page', 'editor');
  }

}
endif;




<?php

// Gets pages
if ( !function_exists( 'cmb2_get_pages' ) ) :
function cmb2_get_pages() {

  $post_type = 'page';

  $args = array(
    'posts_per_page'   => -1,
    'orderby'          => 'name',
    'post_type'        => $post_type,
    'post_status'      => 'publish',
    'suppress_filters' => 0,
  );
  $pages = get_posts( $args );

  // Initate an empty array
  $output = array();
  if ( ! empty( $pages ) ) : foreach ( $pages as $page ) :

    // Output
    $output[ $page->ID ] = $page->post_title ;

  endforeach; endif;
  wp_reset_postdata();

  asort( $output );
  return $output;

}
endif;






<?php

// Turn off editor on specific page templates
function remove_editor_on_specified_templates() {

    if ( isset( $_GET['post'] ) ) :

        $id = $_GET['post'];
        $current_template = get_post_meta($id, '_wp_page_template', true);

        $templates = array(
          'templates/page-faqs.php',
          'templates/page-kitchen-sink.php'
          );

        if ( $templates ): foreach ( $templates as $template ) :

          if( $current_template == $template ){
              remove_post_type_support( 'page', 'editor' );
          }

        endforeach; endif;

    endif;

}
add_action('init', 'remove_editor_on_specified_templates');









<?php

add_filter( 'cmb2_render_hours', 'cmb2_render_hours_field_callback', 10, 5 );
function cmb2_render_hours_field_callback( $field, $value, $object_id, $object_type, $field_type ) {

    // make sure we specify each part of the value we need.
    $value = wp_parse_args( $value, array(
        'opening_time' => '',
        'closing_time' => '',
    ) );

    ?>
    <label for="<?php echo $field_type->_id( '_opening_time' ); ?>">Opens at:</label>
    <?php echo $field_type->input( array(
        'class' => 'cmb_text_time',
        'name'  => $field_type->_name( '[opening_time]' ),
        'id'    => $field_type->_id( '_opening_time' ),
        'value' => $value['opening_time'],
        'type'  => 'time',
        'desc'  => '',
    ) ); ?>
    &nbsp;
    <label for="<?php echo $field_type->_id( '_closing_time' ); ?>'">Closes at:</label>
    <?php echo $field_type->input( array(
        'class' => 'cmb_text_time',
        'name'  => $field_type->_name( '[closing_time]' ),
        'id'    => $field_type->_id( '_closing_time' ),
        'value' => $value['closing_time'],
        'type'  => 'time',
        'desc'  => '',
    ) ); ?>
    <br class="clear">
    <?php
    echo $field_type->_desc( true );

}






function jer_get_theme_version() {

  global $wp_scripts;
  $theme_data = wp_get_theme();
  $theme_version = $theme_data->get( 'Version' );

  return $theme_version;

}






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




// Filter archives titles to remove "Archives"
function shakti_archive_titles( $title ) {
    if ( is_post_type_archive('shakti_training') ) {
        $title = __('Training','shakti');

    } elseif ( is_post_type_archive('shakti_events') ) {
        $title = __('Schedule','shakti');

    }
    return $title;
}
 add_filter( 'get_the_archive_title', 'shakti_archive_titles' );


function shakti_querypages_with_template( $templateFile = null ) {

  $args = array(
      'post_type'         => 'page',
      'fields'            => 'ids',
      'nopaging'          => true,
      'meta_key'          => '_wp_page_template',
      'meta_value'        => $templateFile,
      'suppress_filters'  => false
  );

  $pages_with_this_template = get_posts( $args );

  return $pages_with_this_template;

}

// gets the id of an archive template asociated page
function shakti_get_page_id_for_template( $template = null ) {

  if ( isset( $template ) ) {

    if ( locate_template('templates/page-' . $template . '.php') != '' ) {
      $template = 'templates/page-' . $template . '.php';

    } else {
      $template = null;

    }

  }

  if ( !$template ) {

    if ( is_post_type_archive('shakti_training') || is_post_type_archive('shakti_events') ) {

      $template = is_post_type_archive('shakti_training') ? 'templates/page-training.php' : 'templates/page-schedule.php';

    } else {

      return false;


    }

  }

  if ( $template ) {

    $pages_with_this_template = shakti_querypages_with_template( $template );
    $template_page_id = array_values($pages_with_this_template)[0];
    return $template_page_id;

  } else {

    return false;

  }

}


// Lower the Yoast meta box priority
add_filter( 'wpseo_metabox_prio', 'lower_wpseo_priority' );
function lower_wpseo_priority( $html ) {
    return 'low';
}




// on
add_action('save_post_shakti_events','replace_event_excerpt_on_save');
function replace_event_excerpt_on_save( $post_id ) {

    // If this is just a revision, get out
    if ( wp_is_post_revision( $post_id ) )
        return;

    // if there's no shakti_event_course, get out
    if ( !isset( $_POST['shakti_event_course'] ) )
        return;

    // if shakti_event_course is empty, get out
    if ( $_POST['shakti_event_course'] == null )
        return;

    // unhook this function so it doesn't loop infinitely
    remove_action( 'save_post_shakti_events', 'replace_event_excerpt_on_save' );

    $course_id = $_POST['shakti_event_course'];
    $fished_excerpt = get_the_excerpt( $course_id );

    wp_update_post( array( 'ID' => $post_id, 'post_excerpt' => $fished_excerpt ) );

    // re-hook this function
    add_action( 'save_post_shakti_events', 'replace_event_excerpt_on_save' );

}





/**
 * Determines if a post, identified by the specified ID, exist
 * within the WordPress database.
 *
 * Note that this function uses the 'acme_' prefix to serve as an
 * example for how to use the function within a theme. If this were
 * to be within a class, then the prefix would not be necessary.
 *
 * @param    int    $id    The ID of the post to check
 * @return   bool          True if the post exists; otherwise, false.
 * @since    1.0.0
 */
function acme_post_exists( $id ) {
    return is_string( get_post_status( $id ) );
}


// this is only used to disable the featured image
function event_has_related_course() {

    if ( ( is_singular( 'shakti_events' ) || ( 'shakti_events' === get_post_type() ) ) && !is_post_type_archive( 'shakti_events' ) ) {

        $related_course_id =  get_post_meta( get_the_ID(), 'shakti_event_course', true );

        if ( !empty( $related_course_id ) && acme_post_exists( $related_course_id ) ) {
          return true;

        } else {

          return false;

        }

    } else {

      return false;

    }

}




add_action( 'admin_bar_menu', 'remove_wp_admin_bar_items', 999 );
function remove_wp_admin_bar_items( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-content' );
    $wp_admin_bar->remove_node( 'customize' );
}



    # Turn debugging on
    define('WP_DEBUG', true);


?? what rules should there be in autogen of wp-config? any of these necess?
define (‘AUTOSAVE_INTERVAL’, 160); //seconds
define(‘WP_HOME’, ‘http://example.com’);
define (‘WP_POST_REVISIONS’, 0); //up to 3 versions
define(‘WP_ALLOW_MULTISITE’, true);
define(‘NOBLOGREDIRECT’, ‘http://example.com’); // instead of 404 ?
define(‘WP_MEMORY_LIMIT’, ‘128M’)
define(‘WP_MEMORY_MAX_LIMIT’, ‘512M’)
define(‘DISALLOW_FILE_MODS’, true);
define(‘SAVEQUERIES’, true);

Debugging? section?
About about on prod ? should i disable updates?

define(‘WP_CONTENT_DIR’, $_SERVER[‘DOCUMENT_ROOT’] . ‘/content’);
define(‘WP_CONTENT_URL’, ‘http://example.com/content’);

define(‘WP_PLUGIN_DIR’, $_SERVER[‘DOCUMENT_ROOT’] . ‘/content/wp-content/plugins’);
define(‘WP_PLUGIN_URL’, ‘http://example.com/content/wp-content/plugins’);
define(‘PLUGINDIR’, $_SERVER[‘DOCUMENT_ROOT’] . ‘/content/wp-content/plugins’);

define(‘WP_CONTENT_URL’, ‘http://static.example.com’);
define(‘COOKIE_DOMAIN’, ‘http://example.com’);




WORDPRESS - USEFUL CUSTOMIZATIONS

Set up automatic updates:
define( 'WP_AUTO_UPDATE_CORE', true );
add_filter( 'auto_update_plugin', '__return_true' );

All WPQuery arguments
http://www.billerickson.net/code/wp_query-arguments/



Disable the visual editor for all
Note: where do I add the following?

add_filter( 'user_can_richedit' , '__return_false', 50 );


Disable WP revisions
Add the following to wp-config:

define('AUTOSAVE_INTERVAL', 300 ); // seconds
define('WP_POST_REVISIONS', false );

Run the following MySQL query:

DELETE FROM wp_posts WHERE post_type = "revision";


WORDPRESS - USEFUL DATABASE COMMANDS

Delete Post Revisions and their Meta Data

DELETE a,b,c FROM wp_posts a LEFT JOIN wp_term_relationships b ON (a.ID = b.object_id)
LEFT JOIN wp_postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision'


Delete All Pingbacks

DELETE FROM wp_comments WHERE comment_type = 'pingback';


Delete All Spam Comments

DELETE from wp_comments WHERE comment_approved = '0'



WORDPRESS - FILE PERMISSIONS
Note: WP Engine has a handy little button in the admin section to do this automatically.  This only necessary on self-hosted environments or as part of a deployment script.

Permissions for a standard WordPress server configuration
Some web servers are strict. Setting your wp-config.php to 660 might stop your website from working - In this case, just leave it as 664.
Note: sudo might not be necessary (or permitted) as it depends on the server configuration.

sudo find . -type f -exec chmod 664 {} +
sudo find . -type d -exec chmod 775 {} +
sudo chmod 660 wp-config.php


Permissions for a shared server configuration or SuEXEC configuration
Some web servers are strict. Setting your wp-config.php to 660 might stop your website from working - In this case, just leave it as 640; if that still doesn’t work, then use 644.
Note: sudo might not be necessary (or permitted) as it depends on the server configuration.

sudo find . -type f -exec chmod 644 {} +
sudo find . -type d -exec chmod 755 {} +
sudo chmod 600 wp-config.php


WORDPRESS - IDENTIFYING ENQUEUED SCRIPTS
The following will print out a list of the scripts or styles to the top of your page.  Put the appropriate code in your functions.php file

Print handles of loaded styles

function wpa54064_inspect_styles() {
    global $wp_styles ;
    foreach( $wp_styles ->queue as $handle ) :
        echo $handle . ' | ';
    endforeach;
}
add_action( 'wp_print_scripts', 'wpa54064_inspect_styles' );


Print handles of loaded scripts

function wpa54064_inspect_scripts() {
    global $wp_scripts ;
    foreach( $wp_scripts ->queue as $handle ) :
        echo $handle . ' | ';
    endforeach;
}
add_action( 'wp_print_scripts', 'wpa54064_inspect_scripts' );


/** * Media - set default image link location to 'None' */ update_option('image_default_link_type','none'); /** * Always Show Kitchen Sink in WYSIWYG Editor */ function unhide_kitchensink( $args ) { $args['wordpress_adv_hidden'] = false; return $args; } add_filter( 'tiny_mce_before_init', 'unhide_kitchensink' );


define( 'WP_ALLOW_REPAIR', true );
www.example.com/wp-admin/maint/repair.php





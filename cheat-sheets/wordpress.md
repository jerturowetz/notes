# Cheat sheet : WordPress

Please note, this file is not for snippets or code examples, see gists or my other themes for those

## Properly using jQuery

While backbone & underscore are always available, you'll need to hook for jQUery. This can be done using an anonymous function:

    (function( $ ) {

        // Expressions indented

        function doSomething() {
            // Expressions indented
        }

    })( jQuery );

## Setting file permissions

WP Engine and other managed hosts have handy little buttons in the admin control panel to reset permissions. Running the scripts below are only necessary on self-hosted environments or as part of a deployment script.

Additionally, `sudo` might not be necessary _(or permitted)_ - it depends on the server configuration.

### Permissions for a standard WordPress server configuration

Some web servers are strict. Setting your wp-config.php to 660 might stop your website from working - In this case, just leave it as 664.

    sudo find . -type f -exec chmod 664 {} +
    sudo find . -type d -exec chmod 775 {} +
    sudo chmod 660 wp-config.php

### Permissions for a shared server configuration or SuEXEC configuration

Some web servers are strict. Setting your wp-config.php to 660 might stop your website from working - In this case, just leave it as 640; if that still doesn’t work, then use 644.

    sudo find . -type f -exec chmod 644 {} +
    sudo find . -type d -exec chmod 755 {} +
    sudo chmod 600 wp-config.php

## Useful DB commands

    // Delete Revisions
    DELETE FROM wp_posts WHERE post_type = "revision";
    DELETE a,b,c FROM wp_posts a LEFT JOIN wp_term_relationships b ON (a.ID = b.object_id)
    LEFT JOIN wp_postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision'

    // Delete Pingbacks
    DELETE FROM wp_comments WHERE comment_type = 'pingback';

    // Delete spam comments
    DELETE from wp_comments WHERE comment_approved = '0'

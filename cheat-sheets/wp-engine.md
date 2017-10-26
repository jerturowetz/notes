# Cheat sheet : WP Engine

## git servers

    git@git.wpengine.com:staging/install-name.git
    git@git.wpengine.com:production/install-name.git

## Remote database connections

### Get your ip added to the exception list

In order to connect to your installs' database server remotely, your ip must first be manually added to the white list where the install lives. To do this you'll need to message WP Engine support (via chat is easiest).

Please note that on accounts with multiple installs its possible for them to exist on different servers. in such cases your ip needs to be added to multiple whitelists. Sometimes the WP Engine support rep assisting you might miss this detail and only add you as an exception to one server.

Heres a template for making a request to a WP Engine support rep


For each install, you will use INSTALL.wpengine.com for host
port 3306
And the wp-config.php file for each will have the usernames and passwords.

For secure connection, you can use
INSTALL.db.wpengine.net for host
Port: 13306




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

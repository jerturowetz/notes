# Cheat sheet : WP Engine

## git deploy servers

    git@git.wpengine.com:staging/install-name.git
    git@git.wpengine.com:production/install-name.git

## Remote database connections

### Get your ip added to the exception list

In order to connect to your installs' database server remotely, your ip must first be manually added to the white list where the install lives. To do this you'll need to message WP Engine support (via chat is easiest).

Please note that on accounts with multiple installs its possible for them to exist on different servers. in such cases your ip needs to be added to multiple whitelists. Sometimes the WP Engine support rep assisting you might miss this detail and only add you as an exception to one server.

## Connection details

- host: INSTALL.wpengine.com
- port: 3306
- user: _see wp-config.php_
- pass: _see wp-config.php_

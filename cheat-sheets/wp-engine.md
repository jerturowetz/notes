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

## Software versions

- PHP 5.5.9-1ubuntu4.24 (5.6)
- PHP 7.0
- nginx/1.11.3 >> Apache/2.4.7
- mysql Ver 14.14 Distrib 5.6.39-83.1, for debian-linux-gnu (x86_64) using readline 6.3
- Varnish: varnishd (varnish-3.0.7 revision f544cd8

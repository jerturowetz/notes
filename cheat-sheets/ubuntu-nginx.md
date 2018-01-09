# Cheat-sheet : NGINX on Ubuntu

## Add php support

### php-fpm

NGINX doesnt natively support php, so you'll need to add the php-fpm wrapper as well as change some config settings

First add php-fpm (and php-mysql while you're at it)

    sudo apt-get install php-fpm php-mysql

Make `php-fpm` a bit more secure

    sudo nano /etc/php/7.0/fpm/php.ini

Find the following, uncomment and set it to `0`

    cgi.fix_pathinfo=0

Restart php-fpm

    sudo systemctl restart php7.0-fpm

### Configure nginx to use index.php before index.html

The default server block is at `/etc/nginx/sites-available/default`

Edit this file and add `index.php` after `index` but before anything else on that line.

Also uncomment the following:

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }

### Test your Nginx config

    sudo nginx -t                   # tests the current config
    sudo systemctl reload nginx     # reloads nginx

# Cheat sheet : Ubuntu server setup

- [Initial Server Setup with Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04)
- [How To Install Linux, Nginx, MySQL, PHP (LEMP stack) in Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-in-ubuntu-16-04)
- [How To Install Linux, Apache, MySQL, PHP (LAMP) stack on Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04)

## User functions

    adduser USERNAME                # add user
    usermod -aG sudo USERNAME       # Adds sudo permissions
    deluser --remove-home USERNAME  # remove home folder

## Add Digital Ocean monitoring

switch to `root` and run:

    curl -sSL https://agent.digitalocean.com/install.sh | sh

## Set up a firewall - see other sheet

## Reboot machine

    sudo shutdown -r now

## Install mysql

    sudo apt-get install mysql-server
    mysql_secure_installation # dont use the VALIDATE PASSWORD PLUGIN

## Install php && PHP modules

    sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql php-xml php-mbstring

    apt-cache search php- | less # pipe list of available php modules
    apt-cache show php-cli # see module details
    sudo apt-get install php-cli

## Installing composer

Update apt-get & install some deps used in satis and other things

    sudo apt-get update
    sudo apt-get install php-xml php-mbstring zip unzip

Install composer re official docs

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

You can now run composer it by typing `php composer.phar`. To make composer globally available, move it to bin. Might as well rename it while you're at it.

    sudo mv composer.phar /usr/local/bin/composer

now just type `composer`

## Let's Encrypt

Add the certbot repo, update and install

    sudo add-apt-repository ppa:certbot/certbot
    sudo apt-get update
    sudo apt-get install python-certbot-apache

run certbot for your domain and any subdomains

    sudo certbot --apache -d example.com -d www.example.com

You can verify ssl at [ssllabs.com](https://www.ssllabs.com/ssltest/analyze.html?d=example.com&latest)

Certificates need to be renewed every 90 days or so, add the following chron job with `sudo crontab -e` to automate the renewal

    15 3 * * * /usr/bin/certbot renew --quiet

## SSH

you might also want to set up an ssh key for the server-user here so that it can access things like github or whetever

maybe one for root and one for your user

cron might use the root key when running jobs - i have no idea





## NGINX Installation: Adding php support

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




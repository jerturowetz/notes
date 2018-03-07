# Cheat sheet : Ubuntu - Extra install steps

## Extra Installation steps

I normally follow the following guides when manually setting up new machines:

- [Initial Server Setup with Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04)
- [How To Install Linux, Nginx, MySQL, PHP (LEMP stack) in Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-in-ubuntu-16-04)
- [How To Set Up Nginx Server Blocks (Virtual Hosts) on Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-virtual-hosts-on-ubuntu-16-04)
- [LEMP Tutorials](https://www.digitalocean.com/community/tags/lemp?type=tutorials)

These guides cover most things which I wont go over here; however, there are a couple of extra steps I normally need to take outlined below.

### Add Digital Ocean monitoring

switch to `root` and run:

    curl -sSL https://agent.digitalocean.com/install.sh | sh

### Generate an ssh key for the machine

Generate an ssh key for root and add it to bitbucket & github so the machine can haz access of necessary. I have no idea which key crhon uses when running jobs so whatever, figure it out.

### Install php && PHP modules

Assuming you've already installed php, php-mysql & php-fpm, here are the other php modules i like to install:

    sudo apt-get install php-cli libapache2-mod-php php-mcrypt php-xml php-mbstring
    # NOTE: One of these packages puts an apache index file in `/var/www/html` making it look like nginx is busted.
    # Simply delete the file, no need to freak out.

For the record, here are some cool helpers for getting available module info

    apt-cache search php- | less # pipe list of available php modules
    apt-cache show php-cli # see module details

### Install composer

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

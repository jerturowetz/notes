# Cheat-sheet : NGINX

## Useful commands

    sudo nginx -t                   # test nginx config
    sudo systemctl reload nginx     # reload nginx

Check that there's only one default server:

    grep -R default_server /etc/nginx/sites-enabled/

## Server blocks

Setup your server file in `/etc/nginx/sites-available/` and then symlink in `sites-enabled`:

    sudo ln -s /etc/nginx/sites-available/dev.bkdsn.com /etc/nginx/sites-enabled/

Make sure you've set the correct permissions on your folders:

    sudo chown -R $USER:$USER /var/www/dev.bkdsn.com
    sudo chmod -R 755 /var/www

## Useful tutorials

- [Pitfalls](http://wiki.nginx.org/Pitfalls)
- [QuickStart](http://wiki.nginx.org/QuickStart)
- [Configuration](http://wiki.nginx.org/Configuration)

## Purge and start from scratch

    sudo apt-get purge nginx-common     # purge nginx
    sudo apt-get install nginx          # install nginx from scratch
    # nginx depends on nginx-common, removing nginx-common will also remove nginx.

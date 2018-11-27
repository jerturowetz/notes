# Cheat sheet : Ubuntu

## General commands

    adduser USERNAME                # add user
    usermod -aG sudo USERNAME       # Adds sudo permissions
    deluser --remove-home USERNAME  # remove home folder
    sudo shutdown -r now            # reboot the machine
    apt-cache search php- | less    # pipe list of available php modules
    apt-cache show php-cli          # see module details

    sudo -uUSERNAME some command    # run commands as a different user

    sudo systemctl restart sshd     # restart sshd after config changes

### UFW (Ubuntu Firewall)

[UFW Essentials: Common Firewall Rules and Commands](https://www.digitalocean.com/community/tutorials/ufw-essentials-common-firewall-rules-and-commands)

    sudo ufw app list               # should see OpenSSH
    sudo ufw allow OpenSSH          # allow OpenSSH through the firewall
    sudo ufw delete allow OpenSSH   # delete the allowing of OpenSSH through the firewall
    sudo ufw enable                 # turn the firewall On
    sudo ufw status                 # Check firewall status

Here's an example of how to add all https rules and then remove the non ssl ones:

    sudo ufw allow 'Nginx Full'             # Adds Full Nginx protocol
    sudo ufw delete allow 'Nginx Full'      # removes Full Nginx protocol

### Certbot

Installing certbot for Nginx:

    sudo add-apt-repository ppa:certbot/certbot
    sudo apt-get update
    sudo apt-get install python-certbot-nginx

Make sure that the domain is listed in the appropriate `nginx/sites-available` config file as certbot will go through those configs to verify

    sudo certbot --nginx -d client.bkdsn.com

You can verify your ssl at [ssllabs.com](https://www.ssllabs.com/ssltest/analyze.html?d=example.com&latest)

Certificates need to be renewed every 90 days or so. We used to need to add something to crontab, but `python-certbot-nginx` does this for us automagically. Test it with the following:

    sudo certbot renew --dry-run

## Add a deployment user

- [Add a deployment user](https://serversforhackers.com/c/ssh-for-easier-deployment)

They got this wrong: `usermod -G -a www-data satis`

it should be: `usermod -a -G www-data satis`

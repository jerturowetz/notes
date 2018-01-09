# Cheat-sheet : UFW (Ubuntu Firewall)

[UFW Essentials: Common Firewall Rules and Commands](https://www.digitalocean.com/community/tutorials/ufw-essentials-common-firewall-rules-and-commands)

    sudo ufw app list           # should see OpenSSH
    sudo ufw allow OpenSSH      # allow OpenSSH through the firewall
    sudo ufw enable             # turn the firewall On
    sudo ufw status             # Check firewall status
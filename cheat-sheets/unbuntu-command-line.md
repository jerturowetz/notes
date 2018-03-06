# Cheat sheet : Ubuntu command line

Copy all _contents_ from one folder to another
the `-a` option preserves permissions and recursive stuff

    cp -a /source/. /dest/

Get ip address

    ip addr show eth0 | grep inet | awk '{ print $2; }' | sed 's/\/.*$//'

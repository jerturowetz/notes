
rsync -az --force --delete --progress --exclude-from=rsync_exclude.txt -e "ssh -p22" ./ username@server:/var/www/website-name

-avn wouold be dry run

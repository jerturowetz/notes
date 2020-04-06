#!/bin/bash

plugins=(
'advanced-custom-fields-pro'
'advanced-db-cleaner'
'enhanced-media-library-pro'
'events-calendar-pro'
'mc4wp-premium'
'related-posts-for-wp-premium'
'sitepress-multilingual-cms'
'wordpress-seo-premium'
)

# for plugin in "${plugins[@]}"
# do
#     git clone "https://git.fury.io/unitoinc/$plugin.git" "$plugin"
#     cd "$plugin" || exit;
#     sed -i 's/@unito-wordpress-plugins/wordpress-plugins/g' composer.json
#     rm -rf .git
#     git init
#     cd ..
# done

# for plugin in "${plugins[@]}"
# do
#     cd "$plugin" || exit;
#     recent_tag=$(git describe --tags)
#     git tag --delete "$recent_tag"
#     sed -i 's/"name": "wordpress-plugins/"name": "unito-wordpress-plugins/g' composer.json
#     git add composer.json
#     git commit --amend --no-edit
#     git tag "$recent_tag"
#     cd ..
# done

for plugin in "${plugins[@]}"
do
    cd "$plugin" || exit;
    git remote remove fury
    git remote add fury "https://jerturowetz@git.fury.io/unitoinc/$plugin.git"
    git push --tags fury master
    cd ..
done

exit 0

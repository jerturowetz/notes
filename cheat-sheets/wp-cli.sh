# Disable all comments/pings in WordPress with WP-CLI
wp post list --format=ids | xargs wp post update --comment_status=closed
wp post list --format=ids | xargs wp post update --ping_status=closed

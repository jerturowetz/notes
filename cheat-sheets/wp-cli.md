# WP-CLI

Get posts by content:
`wp post list --s="trans.gif"`

Select all posts that contain a certain block type
`wp db query 'select id, guid from tbl_posts where post_content like "%acf/cta%" AND post_status!="inherit"'`

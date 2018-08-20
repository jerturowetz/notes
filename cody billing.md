# SCC billing

Please note this invoice includes the SCC site migration as well as the search console maintenance which emerged after the move.

Please also note that the setup of the CC site, git repo workflow, and consulting have been provided pro-bono because we like.

## Digital Ocean stack maintenance & prep for migration

- 0.5hrs Resource access, cpanel access, SSH setup
- 3hrs figure out server structure & folder structure for individual installs
- 1hrs Purchase & install SSL (one-off on DO)
- 3hrs Review existing cpanel URL structure, .htaccess and funky redirects
- 3hrs Export & record site URLs & run simple curl test on DO hosted installs to confirm

Section total: **10.5hrs**

## Pre-migration steps

### Install cleanup

- 2hrs Isolate site instance, trial and error folder removal
- 0.5hrs Trial and error plugin removal and updates for PHP7 (verify with curl & wraith regression)
- 2hrs Theme updates for PHP7 (verify with curl & wraith regression)
- 0.5hrs Search theme, wp-content and plugins for hardcoded URL or content instances and replace
- 3hrs Build asset map for uploads & prune unused (zips.... so many zips...)

Section total: **8hrs**

### Database cleanup

- 1hr Run migrations & clean DB test (drop plugin tables, comments)
- 0.25hrs Drop tables on live install
- 3hrs Search & replace testing, identify failures (old, old theme related maybe?) -> build workflow
- 0.5hrs test clean orphaned postdata (worked!) & run on live db

Section total: **4.75hrs**

### WP Engine install setup

- 0.5hrs SSH Keys, deploy hooks
- 3hrs Setup git repo workflow & build toolset
- 1hrs Run test migration... fix emerged plugin & theme errors
- 2.5hrs Test wp-cli deploy tasks (search-replace, activate, etc. & fix emerged plugin & theme errors
- 0.5hrs Run additional deploy tasks (uploads prune, plugin drop, DB query optimization)

Section total: **7.5hrs**

### Search console setup

- 1hrs Verify all SCC & CC domains
- 0.5hrs Set everyone up with search console on all domains
- N/A Verify analytics access
- N/A Set up new domain in analytics
- N/A Review the viability of 301 wildcard redirect from old domain >> new domain

Section total: **1.5hrs**

## Migration

- 0.5hrs Run migration tool & sit back (thank heavens for WP Engine)
- 0.5hrs Run planned asset verification
- N/A point domain
- N/A SSL setup
- N/A Run planned search & replace & DB cleanup
- N/A Flush permalinks

Section total: **1hrs**

## Search console maintenance

- N/A Verify sitemaps
- N/A Use Bing & Google site move tools to advise the search engines of your move so they might update their indexes
- N/A Curl test & http redirect tests
- N/A Fix primary index issues
- 4hrs Search console 404 error research (later stage item)

Section total: **4hrs**

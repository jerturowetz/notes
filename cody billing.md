# SCC billing

## D.O. hosting stack maintenance and prep

- Verify resource access
- Get direction & isolate individual site instances
- Create asset map
- Asset export and analysis
- Create DB map
- DB export, cleaning and testing
- Build local mirror and clean errors
- Purchase & install SSL (on DO)
- Test db replicate and URL replace
- Search through wp-content for hardcoded instances of the url (stylesheets, js, json)
- Review htaccess for funky redirects

## Search Console Setup

- Set up old & new domains in Google search console (invite)
- Verify analytics access
- Set up new domain in analytics
- With access to the domain hosts, review the viability of 301 wildcard redirect from old domain >> new domain
- Search console 404 error corrections

## WP Engine aetup

- Dev site spin up & migration test
- PHP & plugin errors
- wp-cli automation for db rename tasks

Run DB ename and cear queries
test dropping tables for obviously out of date plugins & apply
test killing garbage post meta & apply


## WP Engine migration








DB ceaning
image cleaning
asset migration
local theme testing

## Database migration steps

- Advise Cody & Corey to lay off
- Drop db `codycais_sccsite_2017`
- Create db `codycais_sccsite_2017`
- Copy from `codycais_sccsite_2` to `codycais_sccsite_2017`

run db meta cleanup
db pkufin cleanup and integrity
search and replace tasks in msids and permalubks
oage compariso 




### WP-CONFIG

Edit wp-config and replace siteurl & homeurl
Edit wp-config and replace DB line to reference new db

### Final steps

- Flush permalinks
- Use the Bing & Google site move tools to advise the search engines of your move so they might update their indexes
- Use a redirect tool to check the redirects health

## Search console maintenance

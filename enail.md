i can inagine a fee scenarios where twxt replacemnt in a url can cause trouble 

(vanity subdomains, habdling naked snd www domains, anything with slashes)

but the item that would make it impossible to manage via a master is that theres no way for thr deploy to know if branch subdomains exist

dns needs to be with netlify, and thr deploy script neess to be told this (to be safe) so that theres never an accidental deploy for somebranch.mydomain.com if netlify isnt handling dns

so presently the script lioks like 

if some explicitly set var re we use netlify dns
if context is branch depkoy
domain = finnicky sed script multiline bonsense 
# do url replacement here

vs sonethibg like 

if context is branch deploy
if deploy url
use deploy url
else
use branch url

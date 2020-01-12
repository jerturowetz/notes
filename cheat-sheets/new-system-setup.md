# Cheat sheet: new system setup

- https://www.youtube.com/watch?v=6gQtcoLaMI0
- https://www.youtube.com/watch?v=d-1jx5hXtyg
- https://www.youtube.com/watch?v=mWHiP9K8fQ0

## Audio settings

Be sure whatever internal audio devices are set to the same quality as pro audio software (44,1/24 quality is fine)

## Set permissions on hosts file

On some systems, only admin accounts have permission to write to hosts by default - be sure to add permission for your user so that things like host updaters and editors can make changes without needing to run them as admin

## choco

choco install `
cmder `
openssh `
git `
googlechrome `
vscode `
-y

choco install 7zip
choco install adobereader
choco install flashplayerplugin
choco install adobeair
choco install adobe-creative-cloud
choco install awscli
choco install beyondcompare
choco install robo3t
choco install postman

## Via installers

Start by installing some type of package manager (homebrew, chocolatey) and install s much stuff from there as possible

Ignore anything unsupported or where OS ships with a reasonable alternative

- insomnia
- Bulk Rename Utility
- Ccleaner
- Chrome
- cmder
- composer
- ConEmu
- Docker
- Dropbox
- ffmpeg
- Filezilla
- Firefox Developer Edition
- Git
  - Turn off explorer integration
  - use from Windows command prompt
  - checkout as-is commit unix
  - symlinks on
- imagemagick
- Java
- jq
- make
- MegaSync
- MS Office
- nvm & nodeJS
- ohmyzsh
- php
- PO Edit
- Postman
- pyenv & python 2 & 3
  - make sure to use x64 versions for both
  - adding both to path
  - don't install in `\program files\`
- Quicktime
- rvm & ruby
- Screaming Frog SEO spider
- Shopify theme kit
- Slack
- tig
- VLC
- VLC
- VS Code
- Xenu Link Sleuth
- xnview
- xpdf
- Yarn
- zsh

### Review for windows

- [SVG explorer extension](https://github.com/maphew/svg-explorer-extension)

### NOt windows


## Various extras & config tweaks

    git config --global user.name "Jeremy Turowetz"
    git config --global user.email "j.turowetz@gmail.com"
    git config --global push.followTags true
    complete -C aws_completer aws
    gem install sassc jekyll bundler jekyll-paginate-v2 jekyll-feed jekyll-gist rouge wdm compass

## Solve folder issues of windows popping up

Run `regedit` and find the following key:

    HKEY_CURRENT_USER\SOFTWARE\Microsoft\Windows\CurrentVersion\Explorer\Modules\NavPane

Right click and delete the whole folder

## Windows 10 Pro - reset the start menu

Erase the following reg key:

    HKEY_CURRENT_USER\Software\Microsoft\Windows\CurrentVersion\CloudStore\Store\Cache\DefaultAccount

## Change the annoying MS Office `Custom Office Templates` folder location

- create a folder like `%AppData%\Microsoft\Templates`
- Open _each_ MS office application and go to _File >> Options >> Save_
- Set `Default personal templates location` to that folder

*Note* You might also want to go to `Save` options and set the default save path to desktop

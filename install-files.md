# Install files reference list

Below are notes regarding my setup of fresh Windows 10 systems for development.

## Audio device settings

Be sure whatever internal audio device is set to 48/24 quality

## Intel Iris 640: increase video memory size

Please note this will eat up system RAM for other stuff

- Navigate to `Computer\HKEY_LOCAL_MACHINE\SOFTWARE\Intel\`
- Right click and create a new key called `GMM`
- in `Computer\HKEY_LOCAL_MACHINE\SOFTWARE\Intel\GMM\` create a QWORD
- name it `dedicatedsegmentsize`
- set it to `512` or `1024`

## Disable Cortana on Windows 10 Pro

- Launch the group policy editor gpedit.msc
- Navigate to _Computer Configuration > Administrative Templates > Windows Components > Search_
- Locate the `Allow Cortana` setting & disable
- Log out & Log back in

## Set permissions on hosts file

only system and admin have permission to write to hosts by deafault - be sure to add permission for your user so that things like host updaters and editors can make changes to it without needing to run them as admin

## Via installers

- 4k video downloader
- 7zip
- Adobe Acrobat Pro
- Adobe Acrobat Reader
- Adobe CC
- AWS Cli
- Beyond Compare
- Bulk Rename Utility
- Ccleaner
- Composer
- ConEmu
- Dropbox
- Filezilla
- Git
  - Turn off explorer integration
  - use from Windows command prompt
  - checkout as-is commit unix
  - symlinks on
- Google Chrome
- Handbrake
- HeidiSQL
- Mozilla Firefox Developer Edition
- MS Office
- MS Visual Studio Code
- NodeJS
- Oracle VirtualBox
- PO Edit
- Python 2 or 3
- Quicktime
- Ruby
- Safari
- SkyFonts (need to install google fonts manually)
- Skype
- Slack desktop
- Stardock Fences
- Steam
- MP3 Tag
- TeamViewer
- Twitter
- uTorrent
- Vagrant
- VLC
- Yarn
- ffmpeg (add to /c/Program Files/ffmpeg/ to work with bash aliases)
- lame x64
- LaunchBox & RetroArch (_Do not_ use the installer version)

## PHP

Grab the latest version of php from the [php website](http://windows.php.net/download/) (e.g. VC14 x64). Make sure to get a _Thread Safe_ version if you want to run apache.

Unzip it to c:\php or whatever & add it to the Windows path.

Rename `php.ini-development` to just `php.ini`

### php.ini

For some more basic functionality, uncomment / set the following lines in `php.ini`

- `extension_dir = "ext"`
- `extension=php_ldap.dll`
- `extension=php_mbstring.dll`
- `extension=php_openssl.dll`
- `date.timezone = UTC`

### xdebug

Use the wizard at [xdebug.org](https://xdebug.org) to find the version you need and edit `php.ini` accordingly.

**Note:** sometimes the instructions are a little off. Be sure to test once configured.

## dotfiles

### First time setup

    cd ~
    git init --bare $HOME/.dotfiles
    alias dot='/mingw64/bin/git --git-dir=$HOME/.dotfiles/ --work-tree=$HOME'
    dot config --local status.showUntrackedFiles no
    echo ".dotfiles" >> .gitignore
    dot add .gitignore
    dot commit -m "initial commit"
    dot remote add origin git@github.com:jerturowetz/.dotfiles.git
    dot push origin --set-upstream origin master
    dot push origin

### Setting up other systems

    cd ~
    git clone --bare git@github.com:jerturowetz/.dotfiles.git $HOME/.dotfiles
    alias dot='/mingw64/bin/git --git-dir=$HOME/.dotfiles/ --work-tree=$HOME'
    dot checkout
    dot config --local status.showUntrackedFiles no

## Other command line tools

    complete -C aws_completer aws # Add AWS CLI code completion

    npm install -g bower gulp-cli grunt-cli eslint-cli stylelint-cli

    vagrant plugin install vagrant-hostsupdater vagrant-triggers vagrant-aws vagrant-host-shell vagrant-winnfsd

    gem install sass --no-user-install
    gem install jekyll bundler jekyll-paginate-v2 jekyll-feed jekyll-gist rouge wdm

### Maybe also some composer extensions

    composer global require phpunit/phpunit
    composer global require phpunit/dbunit
    composer global require phing/phing
    composer global require phpdocumentor/phpdocumentor
    composer global require sebastian/phpcpd
    composer global require phploc/phploc
    composer global require phpmd/phpmd
    composer global require squizlabs/php_codesniffer

## Stuff to sync

- HeidiSQL
- Verify windows identity
- VS Code settings

## Disable OneDrive the right way

Don't uninstall the Windows 10 OneDrive application. If you already did be sure to reinstall in but dont sign in.

Don't confuse the Microsoft OneDrive Windows component with the OneDrive store app. The app should be removed and has no affect on file managed and windows system intagration.

Run `gpedit.msc` & look under _Computer Configuration > Administrative Templates > Windows Components > OneDrive_

Set both _Prevent the usage of OneDrive for File Storage_ items to _enabled_

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

## Docker & Hyper-V

If you install Docker & activate Hyper-V all kinds of fun stuff might happen: one of these items is the installation of multiple switches. This should help describe how to manage that:

[Docker for Windows (on Hyper-V): Fix the Network Communication issue](http://peterjohnlightfoot.com/docker-for-windows-on-hyper-v-fix-the-network-communication-issue/)

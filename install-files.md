# Install files reference list

Below are notes regarding my setup of fresh Windows 10 systems for development.

## Audio device settings

Be sure whatever internal audio device is set to 48/24 quality

## Set permissions on hosts file

only system and admin have permission to write to hosts by deafault - be sure to add permission for your user so that things like host updaters and editors can make changes to it without needing to run them as admin

## Via installers

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
- Mozilla Firefox Developer Edition
- MS Office
- MS Visual Studio Code
- NodeJS
- Oracle VirtualBox
- PO Edit
- Python 2 & 3
  - make sure to use x64 versions for both
  - adding both to path
  - don't install in `\program files\`
- Quicktime
- Ruby
- Safari
- Slack desktop
- Stardock Fences
- Docker
- RDP
- VLC
- Yarn
- ffmpeg (add to /c/Program Files/ffmpeg/ to work with bash aliases)
- lame x64

## WebP codecs etc

- [WEBM DirectShow Filters](https://www.webmproject.org/tools/)
- [webp codec](https://developers.google.com/speed/webp/download)

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

    npm install -g gulp-cli grunt-cli eslint-cli stylelint-cli

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

## Install ImageMagick & rmagick

Only do this _after_ installing ruby & jekyll (as I imagine you're gonna want rmagick for jekyll)

### ImageMagick install steps

- Install an [older .dll version of ImageMagick](http://ftp.icm.edu.pl/packages/ImageMagick/binaries/ImageMagick-6.9.6-0-Q16-HDRI-x64-dll.exe). There's also a copy in my `Install Files` folder.
- The version of Imagemagick should match the system version of ruby (x86, x64)
- The install path should be a folder without spaces (e.g. `c:\imagemagick`)
- Do not install as admin
- Choose the options for:
  - _Add application directory to system path_
  - _Install development headers and libraries for C and C++_
  - _Install ImageMagickObject OLE Control for VBscript, Visual Basic and WSH_

### Rmagick install steps

In a Windows comand prompt (not admin), type the following (assuming `c:\imagemagick` is your install path):

    gem install rmagick --platform=ruby -- --with-opt-lib="c:/imagemagick/lib" --with-opt-include="c:/imagemagick/include"

### Rmagick path issues

Copy all `CORE_*` files from the imagemagick install folder to the `ruby\bin` folder.

## Stuff to sync

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

### Adding more to git bash

## Xpdf

[Xpdf](http://www.xpdfreader.com/index.html) is a handy utility for manipulating PDF files. 

- Download the [windows version "Xpdf tools"](http://www.xpdfreader.com/download.html).
- Extract zip.
- Copy the contents of `xpdf-tools-win-4.00\bin64\` into your `Git\mingw64\bin\`.
- Check the [docs](http://www.xpdfreader.com/support.html) to get started with tools such as `pdftotext` and `pdftopng`.

## make

- Go to [ezwinports](https://sourceforge.net/projects/ezwinports/files/).
- Download `make-4.1-2-without-guile-w32-bin.zip` (get the version without guile).
- Extract zip.
- Copy the contents to your `Git\mingw64\` merging the folders, but do NOT overwrite/replace any existing files. 




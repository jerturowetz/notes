# Cheat sheet: new system setup

## Audio settings

Be sure whatever internal audio devices are set to the same quality as pro audio software (44,1/24 quality is fine)

## Set permissions on hosts file

On some systems, only admin accounts have permission to write to hosts by default - be sure to add permission for your user so that things like host updaters and editors can make changes without needing to run them as admin

## Install stuff

### Windows

Run this in PS `iex ((New-Object System.Net.WebClient).DownloadString('https://git.io/debloat'))`

Start with [this](https://www.youtube.com/watch?v=mWHiP9K8fQ0), then install drivers & chocolatey

    choco install `
    cmder `
    openssh `
    git `
    jre8 `
    adobeair `
    curl `
    quicktime `
    ruby `
    spotify `
    steam `
    qbittorrent `
    erlang `
    googlechrome `
    vscode `
    7zip `
    adobereader `
    flashplayerplugin `
    adobeair `
    awscli `
    beyondcompare `
    robo3t `
    postman `
    insomnia-rest-api-client `
    ccleaner `
    composer `
    php `
    docker `
    dropbox `
    ffmpeg `
    winscp `
    imagemagick `
    jq `
    make `
    megasync `
    pyenv-win `
    nvm `
    php `
    quicktime `
    ruby `
    slack `
    yarn `
    vlc `
    xnview `
    svg-explorer-extension `
    bulkrenameutility `
    -y

Not available via choco:

- Adobe CC
- screaming frog
- MS Office
- Xenu (possibly available on mac via wine)

### MacOS

- ohmyzsh
- zsh
- tig


awscli
composer
jq
neovim
nvm
openssl
pyenv





## Variou#s extras & config tweaks

    git config --global user.name "Jeremy Turowetz"
    git config --global user.email "j.turowetz@gmail.com"
    git config --global push.followTags true
    git config --global pager.branch false
    complete -C aws_completer aws
    gem install sassc jekyll bundler jekyll-paginate-v2 jekyll-feed jekyll-gist rouge wdm compass
    pyenv install 3.8.0
    pyenv install 2.7.15

## Change the annoying MS Office `Custom Office Templates` folder location

- create a folder like `%AppData%\Microsoft\Templates`
- Open _each_ MS office application and go to _File >> Options >> Save_
- Set `Default personal templates location` to that folder

*Note* You might also want to go to `Save` options and set the default save path to desktop

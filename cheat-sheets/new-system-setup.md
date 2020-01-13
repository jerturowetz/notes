# Cheat sheet: new system setup

## Audio settings

Be sure whatever internal audio devices are set to the same quality as pro audio software (44,1/24 quality is fine)

## Set permissions on hosts file

On some systems, only admin accounts have permission to write to hosts by default - be sure to add permission for your user so that things like host updaters and editors can make changes without needing to run them as admin

## Install stuff

### Windows

Start with [this](https://www.youtube.com/watch?v=mWHiP9K8fQ0), then install drivers & chocolatey

    choco install `
    cmder `
    openssh `
    git `
    googlechrome `
    vscode `
    7zip `
    adobereader `
    flashplayerplugin `
    adobeair `
    adobe-creative-cloud `
    awscli `
    beyondcompare `
    robo3t `
    postman `
    insomnia-rest-api-client `
    bulkrenameutility `
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
    -y

Not available via choco:

- [SVG explorer extension](https://github.com/maphew/svg-explorer-extension)
- screaming frog
- MS Office
- Xenu

### MacOS

- ohmyzsh
- zsh
- tig

## Variou#s extras & config tweaks

    git config --global user.name "Jeremy Turowetz"
    git config --global user.email "j.turowetz@gmail.com"
    git config --global push.followTags true
    complete -C aws_completer aws
    gem install sassc jekyll bundler jekyll-paginate-v2 jekyll-feed jekyll-gist rouge wdm compass

## Change the annoying MS Office `Custom Office Templates` folder location

- create a folder like `%AppData%\Microsoft\Templates`
- Open _each_ MS office application and go to _File >> Options >> Save_
- Set `Default personal templates location` to that folder

*Note* You might also want to go to `Save` options and set the default save path to desktop

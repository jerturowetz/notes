# Cheat sheet: Docker

[Docker compose file reference](https://docs.docker.com/compose/compose-file/#args)

## To fix Hyper-V not releasing memory on windows

Turn off docker then run the following in an elevated powershell:

    Optimize-VHD -Path "C:\Users\All Users\DockerDesktop\vm-data\DockerDesktop.vhdx" -Mode Full
    Optimize-VHD -Path "C:\ProgramData\DockerDesktop\vm-data\DockerDesktop.vhdx" -Mode Full
    Optimize-VHD -Path "C:\`$windows.~bt\NewOS\Users\All Users\DockerDesktop\vm-data\DockerDesktop.vhdx" -Mode Full

## Make sure then enviroment var on widows is set to convert paths

This is supposed to be enabled by default (on windows installs obvs). It is sometimes not set properly after updates and must be set manually in your shell `export COMPOSE_CONVERT_WINDOWS_PATHS=1`

## Resolve conflicts created by windows shells (eg git's shell) "fixing" paths

Adding `MSYS_NO_PATHCONV=1` to the beginning of your script will stop the shell from converting:

    `MSYS_NO_PATHCONV=1 docker run -P -v `pwd`:/wraithy -w='/wraithy' bbcnews/wraith capture config.yaml`

## An image optimization machine

    docker run --rm -ti -v //c/Users/jturo/sites/cult-gallery/:/images/ colthreepv/docker-image_optim image_optim -r .

# Cheat sheet : Docker

## useful commands

    docker run hello-world      # Run and build a test image
    docker images               # shows images existing on host system
    docker ps                   # show active containers
    docker ps -a                # show all containers

    docker run -i -t imagename somethingtoinstallorrun

what are -i and -t flags for docker command

## messing with docker hub thingy

index.docker.io

docker pull imagename
docker push imagename

## Saving images

    docker diff ID              # see diffs on container vs original state
    docker commit ID NAME       # commit the container as a new image _(convention for name is username/name_

## `docker-machine`

On older systems, docker can't run natively; instead, installing docker-toolkit sets a virtualbox achine to run docker engine. You can access this (and other, remote mdocker-machines) with the `docker-machine` command

    docker-machine ls                       # list local machines
    docker-machine start my-docker-machine  # start machine
    docker-machine stop my-docker-machine   # stop machine
    docker-machine rm my-docker-machine     # remove machine




## List Docker CLI commands
docker
docker container --help

## Display Docker version and info
docker --version
docker version
docker info

## Execute Docker image
docker run hello-world

## List Docker images
docker image ls

## List Docker containers (running, all, all in quiet mode)
docker container ls
docker container ls --all
docker container ls -aq

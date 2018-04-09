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
docker image ls --all
docker image rm NAME1 NAME2

## List Docker containers (running, all, all in quiet mode)
docker container ls
docker container ls --all
docker container ls -aq


run dteached
docker run -d


docker login

docker build - builds an image

if using docker toolbox, a lot of tutorials which use localhost localhosthost needs to be replaced with the docker-machine ip which can be found by using the followig command:
docker-machine ip


docker run --detach --publish 80:80 --name webserver nginx



docker container rm NAME1 NAME2

from inside a machine:
hostname








docker build -t friendlyhello .  # Create image using this directory's Dockerfile
docker run -p 4000:80 friendlyhello  # Run "friendlyname" mapping port 4000 to 80
docker run -d -p 4000:80 friendlyhello         # Same thing, but in detached mode
docker container ls                                # List all running containers
docker container ls -a             # List all containers, even those not running
docker container stop <hash>           # Gracefully stop the specified container
docker container kill <hash>         # Force shutdown of the specified container
docker container rm <hash>        # Remove specified container from this machine
docker container rm $(docker container ls -a -q)         # Remove all containers
docker image ls -a                             # List all images on this machine
docker image rm <image id>            # Remove specified image from this machine
docker image rm $(docker image ls -a -q)   # Remove all images from this machine
docker login             # Log in this CLI session using your Docker credentials
docker tag <image> username/repository:tag  # Tag <image> for upload to registry
docker push username/repository:tag            # Upload tagged image to registry
docker run username/repository:tag                   # Run image from a registry

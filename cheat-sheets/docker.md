# Cheat sheet : Docker

## useful commands

    docker images               # shows images existing on host system
    docker ps                   # show active containers
    docker ps -a                # show all containers

    docker run hello-world      # Run and build a test image

## `docker-machine`

On older systems, docker can't run natively; instead, installing docker-toolkit sets a virtualbox achine to run docker engine. You can access this (and other, remote mdocker-machines) with the `docker-machine` command

    docker-machine ls                       # list local machines
    docker-machine start my-docker-machine  # start machine
    docker-machine stop my-docker-machine   # stop machine
    docker-machine rm my-docker-machine     # remove machine

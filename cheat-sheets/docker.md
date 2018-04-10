# Cheat sheet : Docker

## useful commands

    docker run hello-world      # Run and build a test image
    docker images               # shows images existing on host system
    docker ps                   # show active containers
    docker ps -a                # show all containers

    docker --version
    docker version
    docker info

    docker run -d       # run detached

    docker run -i -t imagename somethingtoinstallorrun
    # what are -i and -t flags for docker command

## Simple examples

    docker run --detach --publish 80:80 --name webserver nginx
    docker run -p 4000:80 friendlyhello  # Run "friendlyname" mapping port 4000 to 80
    docker run -d -p 4000:80 friendlyhello         # Same thing, but in detached mode

## Docker images

    docker build                                # builds an image from a Dockerfile
    docker build -t friendlyhello .             # Create image using this directory's Dockerfile
    docker image ls                             # List images
    docker image ls -a                          # List all images on this machine
    docker image rm <image id>                  # Remove specified image from this machine
    docker image rm $(docker image ls -a -q)    # Remove all images from this machine

## Docker containers (running, all, all in quiet mode)

    docker container ls                                 # List all running containers
    docker container ls -a                              # List all containers, even those not running
    docker container ls -q                              # list only ids (useful for grep stuff)
    docker container ls -aq                             # list ALL ids
    docker container stop <hash>                        # Gracefully stop the specified container
    docker container kill <hash>                        # Force shutdown of the specified container
    docker container rm <hash>                          # Remove specified container from this machine
    docker container rm $(docker container ls -a -q)    # Remove all containers

## Saving images

    docker diff ID              # see diffs on container vs original state
    docker commit ID NAME       # commit the container as a new image _(convention for name is username/name_

## Docker hub

    docker login                                    # Log in this CLI session using your Docker credentials
    docker tag <image> username/repository:tag      # Tag <image> for upload to registry
    docker push username/repository:tag             # Upload tagged image to registry
    docker run username/repository:tag              # Run image from a registry

## Services & swarms

Running a bunch of containers in unison is considered a _service_

This is where the infamous `docker-compose.yml` comes in to play

    docker swarm init
    docker stack deploy -c docker-compose.yml SERVICENAME

    docker service ls           # see running services

A single container running in a service is called a _task_ (why its not still called a _container_ ... i guess makes sense). Tasks are given unique IDs and numerically incremented names, up to the number of replicas you defined in `docker-compose.yml`

    docker container ls                         # tasks will show up when listing containers, though they will not be sorted by service; also, IDs here are different from below
    docker service ps getstartedlab_web         # see all tasks related to the named service

**Note:** Service IDs are different than container IDs - this might be important when I'm breaking everything

### Scaling the app

Want to scale the app? Docker can perform an in-place update, no need to tear the stack down first or kill any containers. Just make a change to `docker-compose.yml` (or, i guess you could use a new yml file even) and re run `docker stack deploy`:

    docker stack deploy -c docker-compose.yml getstartedlab

### Tearing it down

    docker stack rm getstartedlab
    docker swarm leave --force


Coop De Service Musicaux Le St-Phonic

I'm still not getting the difference between a stack and swarm but maybe a swarm is like an image and a stack is like a container (a stack is a running swarm?)

## `docker-machine`

On older systems, docker can't run natively; instead, installing docker-toolkit sets a virtualbox achine to run docker engine. You can access this (and other, remote mdocker-machines) with the `docker-machine` command

    docker-machine ls                       # list local machines
    docker-machine start my-docker-machine  # start machine
    docker-machine stop my-docker-machine   # stop machine
    docker-machine rm my-docker-machine     # remove machine

if using docker toolbox, a lot of tutorials which use localhost localhosthost needs to be replaced with the docker-machine ip which can be found by using the followig command:

    docker-machine ip

for example, running `docker swarm` will error out on systems running docker toolbox and will say something like "this machine has too many ips, specify one"

    docker swarm init --advertise-addr 192.168.99.100                   # manually, use whatever the ip is
    docker swarm init --advertise-addr $(docker-machine ip default)     # automatically, which is nice (tho i hope this works in scripts)

Someting else that might bite you in the ass is when guides tell you to use `http://localhost`. On machines running docker toolbox, make sure to use the VMs ip

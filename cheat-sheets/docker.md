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

## Services

Running a bunch of containers in unison is considered a _service_

This is where the infamous `docker-compose.yml` comes in to play

    docker swarm init
    docker stack deploy -c docker-compose.yml SERVICENAME

A single container running in a service is called a _task_ (why its not still called a _container_ ... i guess makes sense). Tasks are given unique IDs and numerically incremented names, up to the number of replicas you defined in `docker-compose.yml`

    docker service ls                           # see running services

    docker service ps SERVICENAME               # see all tasks related to the named service
    docker service ps -q SERVICENAME            # same as above but just the ids
    docker container ls                         # while tasks will show up when listing containers, they will not be sorted by service; also, IDs here are container ids... not service task IDs which are different

**Note:** Service IDs are different than container IDs - this might be important when I'm breaking everything

### Scaling the app

Want to scale the app? Docker can perform an in-place update, no need to tear the stack down first or kill any containers. Just make a change to `docker-compose.yml` (or, i guess you could use a new yml file even) and re run `docker stack deploy`:

    docker stack deploy -c docker-compose.yml getstartedlab

### Tearing it down

    docker stack rm getstartedlab       # get rid of the service stack we built
    docker swarm leave --force          # more on swarms below

I'm still not getting the difference between a stack and swarm but maybe a swarm is like an image and a stack is like a container (a stack is a running swarm?)

## `docker-machine`

On older systems, docker can't run natively; instead, installing docker-toolkit sets a virtualbox machine to run docker engine. You can access this machine, create new machine and access local and remote docker-machines with the `docker-machine` command

    docker-machine ls                                           # list local machines
    docker-machine create --driver virtualbox MACHINENAME       # create a new machine using the virtualbox driver and call it MACHINENAME
    docker-machine start MACHINENAME                            # start machine
    docker-machine stop MACHINENAME                             # stop machine
    docker-machine rm MACHINENAME                               # remove machine

If you reset the host you might need to restart machines

### Managing machines

    docker-machine ip MACHINENAME       # Get machine ip, if MACHINENAME is not specificed the default machine ip is returned
    docker-machine ssh MACHINENAME      # You guessed it!

You can ssh in to the machine, init it as a swarm manager with a single command like the following:

    docker-machine ssh myvm1 "docker swarm init --advertise-addr $(docker-machine ip myvm1)"

You can copy files over to an accessible machine with scp

    docker-machine scp <file> <machine>:~

### Defining a machine environment

In order to not always need to define a machine, especially when needing to ssh in to swarms below, you can just define a docker environment and then use commands as if you were in the machine

This means you can use local files to do stuff on remote or virtual machines which avoids us needing to copy anything over

    docker-machine env <machine>        # sets the docker-machine environment to the named machine
    eval $(docker-machine env -u)       # unsets the above

### Things that can bite you in the ass (especially if you're running Docker Toolbox on Windows...)

- When guides tell you to use `http://localhost` - on machines running docker toolbox, make sure to use the VM ip instead
- `docker-machine create` can return errors because `docker-start.sh` sets environment variables, simply reboot and create machines before running `docker-start.sh`
- Running `docker swarm` will error out on systems running docker toolbox and will say something like "this machine has too many ips, specify one"

## Swarms

    docker swarm init --advertise-addr 192.168.99.100                   # manually, use whatever the ip is
    docker swarm init --advertise-addr $(docker-machine ip default)     # automatically, which is nice (tho i hope this works in scripts)

Always run docker swarm init and docker swarm join with port 2377 (the swarm management port), or no port at all and let it take the default.

The machine IP addresses returned by docker-machine ls include port 2376, which is the Docker daemon port. Do not use this port or you may experience errors.

    docker-machine ssh myvm2 "docker swarm join \
    --token SWMTKN-1-02aw03yqeifmrq095muvctm63r6hmftpinp9gku9p9758c9y9g-bagpsq8r14vxivisyxq8rwr7p \
    192.168.99.100:2377"

Run `docker node ls` on the manager to view nodes in the swarm

    docker node ls

### Swarm teardown

Service stacks should be removed first with

    docker stack rm getstartedlab

And then followed with a teardown of the actual swarm on a machine by machine basis

    docker-machine ssh myvm2 "docker swarm leave"
    docker-machine ssh myvm3 "docker swarm leave"
    docker-machine ssh myvm1 "docker swarm leave --force"

### 

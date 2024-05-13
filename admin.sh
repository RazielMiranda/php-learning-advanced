#!/usr/bin/env bash
# Usage: admin.sh up|down|shell
echo "Usage: admin.sh up|down|build|ls|shell"
# Get the running container name (if any)
export CONTAINER=`docker container ls |grep php-objects-free-1`
CONTAINER=`parse_docker_container_ls.sh $CONTAINER`
echo $CONTAINER
if [[ "$1" = "up" || "$1" = "start" ]]; then
    docker run -d -p 8888:80 -v `pwd`:/home/tutorial php-objects-free
elif [[ "$1" = "down" || "$1" = "stop" ]]; then
    docker container stop $CONTAINER
elif [[ "$1" = "build" ]]; then
    docker build -t php-objects-free-1 ./docker
elif [[ "$1" = "ls" ]]; then
    docker container ls
elif [[ "$1" = "shell" ]]; then
    docker exec -it $CONTAINER /bin/bash
fi

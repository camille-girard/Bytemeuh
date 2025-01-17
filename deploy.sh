#!/bin/bash

echo '--deploying project--'

echo 'removing old container...'
docker stop $(docker ps -aqf "name=projet-wp-esgi-wordpress")
docker rm $(docker ps -aqf "name=projet-wp-esgi-wordpress")
docker image rm projet-wp-esgi-wordpress

echo 're-build new container...'
docker compose build --no-cache --pull
docker compose up -d

echo 'waiting 5seconds...' 
sleep 5

echo 'getting ssl...'
docker exec $(docker ps -aqf "name=projet-wp-esgi-wordpress") ssl.sh

echo "

--LOGS--
You can exit log when process print done by pressing CTRL+C

"
docker container logs --follow $(docker ps -aqf "name=projet-wp-esgi-wordpress")




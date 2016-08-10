#!/bin/bash
NOW=$(date +"%m-%d-%Y_%H-%M-%S")
FILE="$MYSQL_DATABASE-.$NOW.sql"
echo "Backing up file, please wait..."
docker-compose up -d
docker exec newborn-db sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" --databases $MYSQL_DATABASE' > "./docker/mysql/backup/$FILE"
echo "Backing up data to ./docker/mysql/backup/$FILE file, complate."

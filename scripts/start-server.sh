#!/bin/bash

PROGDIR=$( dirname $0 )
cd "${PROGDIR}/.."
docker run -d --rm  -p "127.0.0.1:8080:80/tcp" -v "$(pwd)/src/php:/var/www/html" --name cscd488 cscd488

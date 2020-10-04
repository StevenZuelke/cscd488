[Back to README.md](README.md)

# Build Environment

## Requirements:
- docker
- a unix-like environment (OSX, Linux, etc.)

## One-Time Setup:
Run ```scripts/make-build-env.sh```. This will generate a lot of output and take a minute or so to complete. The result will be a local docker image called 'cscd488'.

You should only need to rerun this script when changes have been made to how the docker container works.

## Running the server:
Run ```scripts/start-server.sh```. This will start the docker container, which you may now access as: [http://localhost:8080](http://localhost:8080/)

The files in ```src/php``` are bind-mounted to the docker container as ```/var/www/html```, and you may edit them while the server is running; the changes will take effect immediately upon reloading the page.

To stop the server, use ```scripts/stop-server.sh```.
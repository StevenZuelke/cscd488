#!/bin/bash

PROGDIR=$(dirname $0)
docker build $PROGDIR/../build-env -t cscd488


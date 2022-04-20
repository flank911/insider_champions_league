#!/bin/bash

set -xe

# shellcheck disable=SC2046
export $(grep -Ev '^#' .env | xargs)

if [[ $APP_DEBUG == "true" ]] ; then
  php-fpm -d zend_extension=xdebug.so
else
  php-fpm
fi;

#!/bin/bash
#
# Assuming you have the latest version Docker installed, this script will
# fully create or update your development environment.
#
set -e

if [ "$1" == 9 ]; then
  echo "Deploying to Drupal 9"
else
  echo "Deploying to Drupal 8"
fi

echo ''
echo 'About to try to get the latest version of'
echo 'https://hub.docker.com/r/dcycle/drupal/ from the Docker hub. This image'
echo 'is updated automatically every Wednesday with the latest version of'
echo 'Drupal and Drush. If the image has changed since the latest deployment,'
echo 'the environment will be completely rebuilt based on this image.'
if [ "$1" == 9 ]; then
  docker pull dcycle/drupal:9
else
  docker pull dcycle/drupal:8drush
fi

echo ''
echo '-----'
echo 'About to start persistent (-d) containers based on the images defined'
echo 'in ./Dockerfile and ./docker-compose.yml. We are also telling'
echo 'docker-compose to rebuild the images if they are out of date.'
if [ "$1" == 9 ]; then
  docker-compose -f docker-compose.yml -f docker-compose.drupal9.yml up -d --build
else
  docker-compose up -d --build
fi

echo ''
echo '-----'
echo 'Running the deploy script on the running containers. This installs'
echo 'Drupal if it is not yet installed.'
docker-compose exec drupal /docker-resources/scripts/deploy-on-container.sh

echo ''
echo '-----'
echo ''
echo 'If all went well you can now access your site at:'
./scripts/uli.sh
echo '-----'
echo ''

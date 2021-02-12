#!/bin/bash
#
# Run tests on Circle CI.
#
set -e

echo ""
echo " => Running fast tests"
echo ""
./scripts/test.sh
echo ""
echo " => Making sure we have Drupal-9-incompatible code"
echo ""
./scripts/php-drupal9.sh
echo ""
echo " => Deploying Drupal 8"
echo ""
./scripts/deploy.sh
echo ""
echo " => Destroying Drupal 8"
echo ""
docker-compose down -v
echo ""
echo " => Deploying Drupal 9"
echo ""
./scripts/deploy.sh 9
echo ""
echo " => Destroying Drupal 9"
echo ""
docker-compose down -v
echo ""
echo " => All tests OK!"
echo ""

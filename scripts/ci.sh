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
echo " => Making sure we have no Drupal-9-incompatible code"
echo ""
./scripts/php-drupal9.sh
echo ""
echo " => Deploying Drupal 8"
echo ""
./scripts/deploy.sh
echo ""
echo " => Running unit tests on Drupal 8"
echo ""
./scripts/php-unit-drupal.sh
echo ""
echo " => Running some tests on the running Drupal 8 environment"
echo ""
./scripts/test-running-environment.sh
echo ""
echo " => Destroying Drupal 8"
echo ""
docker-compose down -v
echo ""
echo " => Deploying Drupal 9"
echo ""
./scripts/deploy.sh 9
echo ""
echo " => Running unit tests on Drupal 9"
echo ""
./scripts/php-unit-drupal.sh
echo ""
echo " => Running some tests on the running Drupal 8 environment"
echo ""
./scripts/test-running-environment.sh
echo ""
echo " => Destroying Drupal 9"
echo ""
docker-compose down -v
echo ""
echo " => All tests OK!"
echo ""

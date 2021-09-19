#!/bin/bash
#
# Run some checks on a running environment
#
set -e

echo " => Displaying status report for info"
docker-compose exec drupal /bin/bash -c "drush core:requirements"
echo " => Making sure we have no errors such as 'Class not found'"
docker-compose exec -T drupal /bin/bash -c '! (drush core:requirements 2>&1 | grep "Error: Class")'

echo " => Done running self-tests."
echo " =>"

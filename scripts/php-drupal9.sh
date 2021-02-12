#!/bin/bash
#
# Be ready for Drupal 9.
#
set -e

echo "=> Identify deprecated code so we're ready for Drupal 9"
docker run --rm -v "$(pwd)":/var/www/html/modules/drupal_inquicker dcycle/drupal-check:1 drupal_inquicker

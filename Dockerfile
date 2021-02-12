FROM dcycle/drupal:8drush

# Make sure opcache is disabled during development so that our changes
# to PHP are reflected immediately.
RUN echo 'opcache.enable=0' >> /usr/local/etc/php/php.ini && \
  echo 'memory_limit = 512M' >> /usr/local/etc/php/php.ini

# Download contrib modules
RUN COMPOSER_MEMORY_LIMIT=-1 && composer require \
  drupal/devel \
  drupal/devel_php

RUN cp /var/www/html/sites/default/default.settings.php /var/www/html/sites/default/settings.php
RUN echo "include '/docker-resources/settings/local-settings.php';" >> /var/www/html/sites/default/settings.php

EXPOSE 80

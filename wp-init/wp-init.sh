#!/bin/bash
set -eu
if [ -d "/var/www/html/wp-content/uploads" ]; then chown -R www-data:www-data /var/www/html/wp-content/uploads; fi
# TODO check restore/site folder here and copy wp-content and .htaccess to the correct location in the Docker container.
# TODO Also, make sure the theme folder is deleted (or at least skip it when copying).

sleep 10
php /wp-init/wp-init.php
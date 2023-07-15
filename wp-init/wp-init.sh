#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
echo "Script directory: $DIR"
wp core install --path="/var/www/html" --url="http://localhost:8000" --title="WP Starter" --admin_user=user --admin_password=pass --admin_email=info@ducode.org;
wp theme activate wp-starter;
wp rewrite structure '/%postname%/';
wp plugin activate wp-starter-plugin;
#wp post generate --count=20
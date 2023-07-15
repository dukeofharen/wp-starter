<?php
echo shell_exec('wp core install --path="/var/www/html" --url="http://localhost:8000" --title="WP Starter" --admin_user=user --admin_password=pass --admin_email=info@ducode.org');
echo shell_exec("wp theme activate wp-starter");
echo shell_exec("wp rewrite structure '/%postname%/'");
echo shell_exec("wp plugin activate wp-starter-plugin");
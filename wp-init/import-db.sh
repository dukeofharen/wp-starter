#!/bin/bash
set -eu
echo "Running DB import"
sleep 10
RESTORE_PATH="/etc/wp-starter/restore/dump.sql"
if [ -f "$RESTORE_PATH" ]; then
  echo "Path $RESTORE_PATH found. Now running MySQL import..."
  mysql -h mysql --port 3306 -u root -p$MYSQL_ROOT_PASSWORD --database $MYSQL_DATABASE < $RESTORE_PATH
fi
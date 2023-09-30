#!/bin/bash
set -eu
echo "Running DB import"
sleep 10
RESTORE_PATH="/etc/wp-starter/restore/dump.sql"
CHECK_FILE="/etc/clidata/sql_dump_imported"
if [ -f "$CHECK_FILE" ]; then
  echo "File $RESTORE_PATH already imported."
  exit 0
fi

if [ -f "$RESTORE_PATH" ]; then
  echo "Path $RESTORE_PATH found. Now running MySQL import..."
  mysql -h mariadb --port 3306 -u root -p$MYSQL_ROOT_PASSWORD --database $MYSQL_DATABASE < $RESTORE_PATH
  touch $CHECK_FILE
fi
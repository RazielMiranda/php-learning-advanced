#!/bin/bash
export VER=82
ln -s /home/tutorial /var/www/html/tutorial
chgrp -R nobody /home/tutorial/data
chmod -R 775 /home/tutorial/data
# Start the first process
/usr/sbin/php-fpm$VER
status=$?
if [ $status -ne 0 ]; then
  echo "Failed to start php-fpm: $status"
  exit $status
fi
echo "Started php-fpm succesfully"
# Start the second process
/usr/sbin/nginx
status=$?
if [ $status -ne 0 ]; then
  echo "Failed to start nginx: $status"
  exit $status
fi
echo "Started nginx succesfully"
while sleep 60; do
  ps |grep php-fpm$VER |grep -v grep
  PROCESS_1_STATUS=$?
  ps |grep nginx |grep -v grep
  PROCESS_2_STATUS=$?
  # If the greps above find anything, they exit with 0 status
  # If they are not both 0, then something is wrong
  if [ -f $PROCESS_1_STATUS -o -f $PROCESS_2_STATUS ]; then
    echo "One of the processes has already exited."
    exit 1
  fi
done

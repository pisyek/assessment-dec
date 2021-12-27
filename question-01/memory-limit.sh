#!/bin/bash

MEMORY_LIMIT=$1
PHP_PATH=$2
MAX_CHILD=$3
PHP_FPM_CONF_FILE_PATH=$4

# write new config file to the conf path
echo "memory_limit=${MEMORY_LIMIT}MB" > $PHP_PATH/100-memory-limit.ini

# create new conf file and update php-fpm max child number
cp $PHP_FPM_CONF_FILE_PATH/www.conf $PHP_FPM_CONF_FILE_PATH/wwww.conf
sed -i "s/pm.max_children = 5/pm.max_children = $MAX_CHILD/g" $PHP_FPM_CONF_FILE_PATH/wwww.conf

# restart php
/etc/init.d/php7.4-fpm restart

echo "Memory limit updated."
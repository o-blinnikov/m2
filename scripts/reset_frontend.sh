#!/bin/sh

PATH=/usr/local/sbin:/Applications/MAMP/bin/php/php5.6.30/bin:/usr/sbin:/usr/bin:/sbin:/bin:
SCRIPTPATH=$(dirname "$0")

website_dir="${SCRIPTPATH}/.."

rm -rf ${website_dir}/pub/static/frontend/Magento/luma/*
rm -rf ${website_dir}/var/view_preprocessed/css/frontend/Magento/luma*

php -dmemory_limit=6G ${website_dir}/bin/magento setup:static-content:deploy en_US --area frontend --exclude-theme Magento/blank


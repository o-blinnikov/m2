#!/bin/sh

PATH=/usr/local/sbin:/Applications/MAMP/bin/php/php5.6.30/bin:/usr/sbin:/usr/bin:/sbin:/bin:
SCRIPTPATH=$(dirname "$0")

website_dir="${SCRIPTPATH}/.."

chown -R web9:client1 ${website_dir}
chmod -R 0775 ${website_dir}
chmod +x ${website_dir}/bin/magento

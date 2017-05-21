#!/bin/sh

PATH=/usr/local/sbin:/Applications/MAMP/bin/php/php5.6.30/bin:/usr/sbin:/usr/bin:/sbin:/bin:
SCRIPTPATH=$(dirname "$0")

website_dir="${SCRIPTPATH}/.."

rm -rfd ${website_dir}/var/cache
rm -rfd ${website_dir}/var/di
rm -rfd ${website_dir}/var/generation
rm -rfd ${website_dir}/var/page_cache


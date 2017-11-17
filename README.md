## Chronolabs Cooperative presents

# GeoSpatial + Locational Places Services API 3.0.8

### Author: Simon Antony Roberts <wishcraft@users.sourceforge.net>

#### Demo: http://places.snails.email or http://places.xortify.com

This API is a Geospatial service provided by PHP7.0 - it utilises file caches as well as a mysqli database interface to provide and provision both locality keys as well as country and continent keys.

# SEO Friendly URL - Apache Module Rewrite

This goes in your API_ROOT_PATH/.htaccess file

    RewriteEngine On
    RewriteRule ^v([0-9]{1,2})/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&radius=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(nearby|exactly)/([0-9\.\-]+)/([0-9\.\-]+)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&latitude=$3&longitude=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(list|maps|details)/([a-zA-Z0-9\ \(\)\-\,]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/([0-9a-z\-\,\ ]+)/(.*?)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&address=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/([0-9a-z\-\,\ ]+)/(.*?)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&address=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/(.*?)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&address=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(venues)/([0-9a-z\-\,\ ]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&place=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(venues)/([0-9a-z\-\,\ ]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&place=$4&output=$5 [L,NC,QSA]
   
# Installing API

Copy the contents of this distribution to your visually routable path via http(s) etc. Then poll the path required and run the install;

it requires apache2, nixi, iis etc and best with php5+;
   
# Cronjobs/Scheduled Tasks

There is a couple of cronjobs to be set they are the following after running: $ crontab -e

    */15 * * * * /usr/bin/php -q /var/www/places.snails.email/crons/align-postcode-states.php
    */25 * * * * /usr/bin/php -q /var/www/places.snails.email/crons/mining-localities.php
    */15 */6 * * * /usr/bin/php -q /var/www/places.snails.email/crons/updating-details.php
    
# Whats new in version 3.x.x

There reason there has recently been a main revision number upgrade, is all the hash/checksum item keys, that is the hashing information for reference items has been made congruent across all the places api so they are the same between operator not unilaterial different with each service often for the same item key!

## Upgrading from version 2.x to 3.x

Simply unzip the package or pull the resource and replace the files with the archive or github resource files, then execute outside it cache time the file ./verify.php to upgrade you can do this by browsing the site a couple of time refreshing till there is a long pause while verify validates the database or you can execute it at the shell bash as follows:

    $ /usr/bin/php -q /var/www/places.snails.email/verify.php

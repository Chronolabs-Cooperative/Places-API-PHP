# Chronolabs Cooperative ~ GeoSpatial Places Lookups API 

## Author: Simon Antony Roberts <wishcraft@users.sourceforge.net>

This API is a Geospatial service provided by PHP7.0 - it utilises file caches as well as a mysqli database interface to provide and provision both locality keys as well as country and continent keys.

# SEO Friendly URL - Apache Module Rewrite

This goes in your API_ROOT_PATH/.htaccess file

    RewriteEngine On
    RewriteRule ^v([0-9]{1,2})/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&radius=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(nearby|exactly)/([0-9\.\-]+)/([0-9\.\-]+)/([0-9]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&latitude=$3&longitude=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(list|maps|details)/([a-zA-Z0-9\ \(\)\-\,]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/(.*?)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&address=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/([0-9a-z\-\,\ ]+)/(.*?)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&address=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/([0-9a-z\-\,\ ]+)/(.*?)/([0-9]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&address=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(venues)/([0-9a-z\-\,\ ]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&place=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(venues)/([0-9a-z\-\,\ ]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&place=$4&radius=$5&output=$6 [L,NC,QSA]
    
# Importing Database & Configuring

There is two options to making a database for places, the following option is for manually importing and creating the database, the other option is to make a database set the details with the blank database in class/debauchosity.php then run sql/import.php and it will generate the database from the dump of SQL Files...

Run the following command replacing 'username' with the username with root access and 'password' with the password for it.. as well as unzip the geospatial.sql.7z in the sql/ sub-folder of the project

    $ mysql -uroot -ppassword
    
    mysql> create database `geospatial`;
    mysql> use `geospatial`;
    mysql> source /var/www/places.xortify.com/sql/*.sql;
    mysql> exit;


Now either create a username that is system specific or use your root access and configure class/debauchosity.php with the username and password information for the geospatial database

Once you have imported the SQL file then verify the database once by at the bash shell running the following this may take awhile in the intial execution of index.php:~

    $ /usr/bin/php -q /var/www/places.xortify.com/index.php

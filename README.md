# Chronolabs Cooperative ~ GeoSpatial Places Lookups API 

## Author: Simon Antony Roberts <wishcraft@users.sourceforge.net>

This API is a Geospatial service provided by PHP7.0 - it utilises file caches as well as a mysqli database interface to provide and provision both locality keys as well as country and continent keys.

# SEO Friendly URL - Apache Module Rewrite

This goes in your API_ROOT_PATH/.htaccess file

    RewriteEngine On
    RewriteRule ^v([0-9]{1,2})/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&radius=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(nearby|exactly)/([0-9\.\-]+)/([0-9\.\-]+)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&latitude=$3&longitude=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(list|maps|details)/([a-zA-Z0-9\ \(\)\-\,\:]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/(.*?)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&address=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/([0-9a-z\-\,\ \\/]+)/(.*?)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&address=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(address)/([0-9a-z\-\,\ \\/]+)/(.*?)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&address=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(venues)/([0-9a-z\-\,\ \\/]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&place=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(venues)/([0-9a-z\-\,\ \\/]+)/([0-9a-zA-Z\ \(\)\-\,\:]+)/([0-9\.]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&type=$3&place=$4&radius=$5&output=$6 [L,NC,QSA]
    
# Importing Database & Configuring

Creating and importing the database is quite easy, first you need to create an empty database and complete the fields for Database one in class/debauchosity.php for the database name, password, host name etc. 

You now need to import the SQL templates for the database there is a script in sql/import.php to do this which is done simply by going to your shell bash and executing the following:

    $ php -q /var/www/places.xortify.com/sql/import.php

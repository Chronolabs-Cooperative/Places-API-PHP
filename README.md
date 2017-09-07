# Chronolabs Cooperative ~ GeoSpatial Places Lookups API 

## Author: Simon Antony Roberts <wishcraft@users.sourceforge.net>

This API is a Geospatial service provided by PHP7.0 - it utilises file caches as well as a mysqli database interface to provide and provision both locality keys as well as country and continent keys.

# SEO Friendly URL - Apache Module Rewrite

This goes in your API_ROOT_PATH/.htaccess file

    RewriteEngine On
    RewriteRule ^v([0-9]{1,2})/([a-zA-Z]+)/([0-9a-zA-Z]+)/([0-9]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&radius=$4&output=$5 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/([a-zA-Z]+)/([0-9a-zA-Z]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(nearby)/([0-9\.\-]+)/([0-9\.\-]+)/([0-9]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&latitude=$3&longitude=$4&radius=$5&output=$6 [L,NC,QSA]
    RewriteRule ^v([0-9]{1,2})/(list)/([a-zA-Z]+)/(raw|html|serial|json|xml).api ./index.php?version=$1&country=$2&place=$3&output=$4 [L,NC,QSA]
    
# Importing Database & Configuring

Run the following command replacing 'username' with the username with root access and 'password' with the password for it.. as well as unzip the geospatial.sql.7z in the sql/ sub-folder of the project

    $ mysql -uusername -ppassword
    
    mysql> create database `geospatial`;
    mysql> use `geospatial`;
    mysql> source /var/www/places.xortify.com/sql/geospatial.sql;
    mysql> exit;


Now either create a username that is system specific or use your root access and configure class/debauchosity.php with the username and password information for the geospatial database

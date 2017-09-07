<?php
/**
 * Chronolabs REST Geospatial Plaves Services API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit <?php echo $place['iso2']; ?>thors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://snails.email
 * @license         GNU GPL 3 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         api
 * @since           2.0.1
 * @<?php echo $place['iso2']; ?>thor          Simon Roberts <wishcraft@users.sourceforge.net>
 * @subpackage		places
 * @description		Geospatial Plaves Services API
 * @see			    http://internetfounder.wordpress.com
 * @see			    http://sourceoforge.net/projects/chronolabsapis
 * @see			    https://github.com/Chronolabs-Cooperative/Places-API-PHP
 */


	
	global $domain, $protocol, $business, $entity, $contact, $referee, $peerings, $source;
	
	$key = randomPlacesKey();
	$distance = mt_rand(6,24);
	$local = randomGeoLocation();
	$place = randomGeoPlace();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta property="og:title" content="Geographical Places API Services"/>
<meta property="og:type" content="api"/>
<meta property="og:image" content="https://icons.snails.email/trusting/apple-touch-icon-114x114.png"/>
<meta property="og:url" content="<?php echo (isset($_SERVER["HTTPS"])?"https://":"http://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; ?>" />
<meta property="og:site_name" content="<?php echo $business; ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="rating" content="general" />
<meta http-equiv="<?php echo $place['iso2']; ?>thor" content="wishcraft@users.sourceforge.net" />
<meta http-equiv="copyright" content="<?php echo $business; ?> &copy; <?php echo date("Y"); ?>" />
<meta http-equiv="generator" content="Chronolabs Cooperative (<?php echo $place['iso3']; ?>)" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Geographical Places API Services || <?php echo $business; ?></title>
<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
<script type="text/javascript">
  addthis.layers({
	'theme' : 'transparent',
	'share' : {
	  'position' : 'right',
	  'numPreferredServices' : 6
	}, 
	'follow' : {
	  'services' : [
		{'service': 'facebook', 'id': 'Chronolabs'},
		{'service': 'twitter', 'id': 'JohnRingwould'},
		{'service': 'twitter', 'id': 'ChronolabsCoop'},
		{'service': 'twitter', 'id': 'Cipherhouse'},
		{'service': 'twitter', 'id': 'OpenRend'},
	  ]
	},  
	'whatsnext' : {},  
	'recommended' : {
	  'title': 'Recommended for you:'
	} 
  });
</script>
<!-- AddThis Smart Layers END -->
<link rel="stylesheet" href="<?php echo $source; ?>/style.css" type="text/css" />
<link rel="stylesheet" href="https://css.xortify.com/3/gradientee/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="https://css.xortify.com/3/shadowing/styleheet.css" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
</head>

<body>
<div class="main">
    <h1>Geographical Places API Services -- <?php echo $business; ?></h1>
    <p>This is an API Service for conducting a locational search for a place. It provides the longitude, latitude and altitude of place being searched for and provides responses when access the API inclusing JSON, XML, Serialisation, HTML and RAW outputs.</p>
    <p>You can access the API currently without a key or system it is an open api and was written in response to the many API Services that charge ridiculous amounts for querying such a simple base. The following instructions are how to access the api I hope you enjoy this api as I have writting it!.</p>
    <h2>Examples of Calls (Using JSON)</h2>
    <p>There is a couple of calls to the API which I will explain.</p>
    <blockquote>
    			For example if you want a list of the countries you call the following (this is in JSON you can see the API Help for further formats) :: <a href="<?php echo $source; ?>v2/list/list/json.api" target="_blank"><?php echo $source; ?>v2/list/list/json.api</a> SSL on this API is available if you aren't already using it; <a href="https://places.snails.email/v2/list/list/json.api" target="_blank">https://places.snails.email/v2/list/list/json.api</a> to return a random number of areas from a country you would do the following for a single random area from <?php echo $place['country']; ?> :: <a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/random/json.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/random/json.api</a> or if you want to return 10 random areas from <?php echo $place['country']; ?> <a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/random/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/random/<?php echo $distance; ?>/json.api</a>.<br/><br/>
    			Of course there is a random return from any country with any random selected location of that country is down like so :: <a href="<?php echo $source; ?>v2/random/random/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/random/random/<?php echo $distance; ?>/json.api</a> this is for 10 random locations in a country or for a single return from a country of any random is as follows :: <a href="<?php echo $source; ?>v2/random/random/json.api" target="_blank"><?php echo $source; ?>v2/random/random/json.api</a>.<br/><br/>
    			Each place and country is provided a unique MD5 Key for the record and placement, you can reverse lookup this if you wish we're for any place key, that is a locality not a country you can also specify a radius based in kilometres that returns all the nearby items of it and distance from that key. If you we're going to reverse look up a place key the call would be like so :: <a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/json.api</a>.<br/><br/>
    			If for example you wanted to reverse lookup a key and also return the nearest items within a 15Km radius the call would be like so :: <a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/15/json.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/15/json.api</a>. The maximum radius for a search is 145 kilometres!<br/><br/>
    			You can also look up the nearby location to just raw information as in Latitude & Longitude, just say you wanted to look up the location of (<?php echo $local['latitude'] . ', ' . $local['longitude']; ?>) and the near by locations within 15Km's your call would be :: <a href="<?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/15/json.api" target="_blank"><?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/15/json.api</a>. <em>Of course as in mapping standards latitude precedes longitude in the URL Call!</em>
    </blockquote>
    <h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2>API Services' Peers</h2>
    <p>This is the services the key is dupicated on when lodged for a multiple recover points and options!</p>
    <blockquote>
    	<ol>
    		<?php foreach($peerings as $domain => $peer) { 
    				if (!strpos($domain, $source)) {
    					?>				<li><a href="mailto:<?php echo $peer['contact']; ?>" target="_blank"><?php echo $peer['business']; ?></a> ~~ <a href="<?php echo $peer['protocol'] . $peer['domain']; ?>" target="_blank"><?php echo $peer['protocol'] . $peer['domain']; ?></a><?php if ($peer['ping']>1.0001) { ?> --- <em>ping <?php echo $peer['ping']; ?>ms</em><?php } else { ?> -- Unabled to Ping! <?php } ?></li>
    					
			<?php }	}?>
    	</ol>
    </blockquote>
    <h2>RAW Document Output</h2>
    <p>This is done with the <em>raw.api</em> extension at the end of the url, you replace the example address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/raw.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900">This is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
		<font color="#009900">With ISO2, this is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/raw.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900">With ISO3, this is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Mapping Location Lookup</strong> for a places within the location of (<?php echo $local['latitude'] . ', ' . $local['longitude']; ?>) and at a distance from that geo-cordinates within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/raw.api</a></strong></em>
        <font color="#009900"><strong>Reverse Key Lookup for a Map Overlay</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/maps/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/maps/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/health/restaurant/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'government' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/raw.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/raw.api</a></strong></em><br /><br />
                
    </blockquote>
    <h2>HTML Document Output</h2>
    <p>This is done with the <em>html.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/html.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/html.api</a></strong></em><br /><br />
        <font color="#009900">This is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />
		<font color="#009900">With ISO2, this is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/html.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/html.api</a></strong></em><br /><br />
        <font color="#009900">With ISO3, this is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />    
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />    
        <font color="#009900"><strong>Mapping Location Lookup</strong> for a places within the location of (<?php echo $local['latitude'] . ', ' . $local['longitude']; ?>) and at a distance from that geo-cordinates within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br/><br/>
        <font color="#009900"><strong>Reverse Key Lookup for a Map Overlay</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/maps/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/maps/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/health/restaurant/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'government' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/html.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/html.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/html.api</a></strong></em><br /><br />
               
    </blockquote>
    <h2>Serialisation Document Output</h2>
    <p>This is done with the <em>serial.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/serial.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900">This is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />        
		<font color="#009900">With ISO2, this is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/serial.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900">With ISO3, this is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />    
        <font color="#009900"><strong>Mapping Location Lookup</strong> for a places within the location of (<?php echo $local['latitude'] . ', ' . $local['longitude']; ?>) and at a distance from that geo-cordinates within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br/><br/>
    	<font color="#009900"><strong>Reverse Key Lookup for a Map Overlay</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/maps/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/maps/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/health/restaurant/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'government' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/serial.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/serial.api</a></strong></em><br /><br />
        
    </blockquote>
    <h2>JSON Document Output</h2>
    <p>This is done with the <em>json.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/json.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/json.api</a></strong></em><br /><br />
        <font color="#009900">This is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />        
		<font color="#009900">With ISO2, this is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/json.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/json.api</a></strong></em><br /><br />
        <font color="#009900">With ISO3, this is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />            
        <font color="#009900"><strong>Mapping Location Lookup</strong> for a places within the location of (<?php echo $local['latitude'] . ', ' . $local['longitude']; ?>) and at a distance from that geo-cordinates within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br/><br/>
        <font color="#009900"><strong>Reverse Key Lookup for a Map Overlay</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/maps/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/maps/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/health/restaurant/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'government' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/json.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/json.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/json.api</a></strong></em><br /><br />
        
    </blockquote>
    <h2>XML Document Output</h2>
    <p>This is done with the <em>xml.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/xml.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900">This is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['country']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />        
		<font color="#009900">With ISO2, this is for a place of <em>'<?php echo $place['country']; ?>/<?php echo $place['region']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/xml.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso2']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900">With ISO3, this is for 10 places contain the region name of <em>'<?php echo $place['region']; ?>'</em> in <em>'<?php echo $place['country']; ?>'</em></font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/<?php echo $place['iso3']; ?>/<?php echo substr($place['region'], 0, strlen($place['region']) - mt_rand(0, strlen($place['region']) - 4)); ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/key/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />    
        <font color="#009900"><strong>Mapping Location Lookup</strong> for a places within the location of (<?php echo $local['latitude'] . ', ' . $local['longitude']; ?>) and at a distance from that geo-cordinates within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/nearby/<?php echo $local['latitude']; ?>/<?php echo $local['longitude']; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br/><br/>
        <font color="#009900"><strong>Reverse Key Lookup for a Map Overlay</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/maps/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/maps/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup</strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/all/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/restaurant/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/health/restaurant/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'health' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/health/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'government' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/government/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'restaurant' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/transport/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for country or place, this is for 1 result contain either the result type of country or place</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/xml.api</a></strong></em><br /><br />
        <font color="#009900"><strong>Reverse Key Lookup for 'police' venues </strong> for a place with returning in this example of the nearby places and distance from that key within <?php echo $distance; ?>Km's in this example</font><br/>
        <em><strong><a href="<?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api" target="_blank"><?php echo $source; ?>v2/venues/police/<?php echo $key; ?>/<?php echo $distance; ?>/xml.api</a></strong></em><br /><br />
    
    </blockquote>
    <?php if (file_exists(API_FILE_IO_FOOTER)) {
    	readfile(API_FILE_IO_FOOTER);
    }?>	
    <?php if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) { ?>
    <h2>Limits</h2>
    <p>There is a limit of <?php echo MAXIMUM_QUERIES; ?> queries per hour. You can add yourself to the whitelist by using the following form API <a href="http://whitelist.<?php echo domain; ?>/">Whitelisting form (whitelist.<?php echo domain; ?>)</a>. This is only so this service isn't abused!!</p>
    <?php } ?>
    <h2>The author</h2>
    <p>This was developed by Simon Roberts in 2013 and is part of the Chronolabs System and api's.<br/><br/>This is open source which you can download from <a href="https://sourceforge.net/projects/chronolabsapis/">https://sourceforge.net/projects/chronolabsapis/</a> contact the scribe  <a href="mailto:wishcraft@users.sourceforge.net">wishcraft@users.sourceforge.net</a></p></body>
</div>
</html>
<?php 

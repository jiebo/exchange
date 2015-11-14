<?php

include_once '../../../wp-config.php';

// Connect to MySQL Server
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

// Select Database
mysql_select_db(DB_NAME) or die(mysql_error());

// Retrieve City Name/Days/Nights/Currency via postid
$q = strval($_GET['Name']);
$query_city  = "SELECT A.meta_value FROM wp_postmeta A WHERE A.post_id = ";
$query_city .= $q;
$query_city .= " AND A.meta_key = 'Marker Coordinates';";
$city_resource    = mysql_query( $query_city ) or die (mysql_error());
$city_meta        = mysql_fetch_row($city_resource, 0);

$complete_string = $city_meta[0];
$complete_array  = explode("\n", $complete_string);
$return_string = "[";
foreach($complete_array as $coordinate) {
    $obj = explode(":", $coordinate);
    
    $return_string .= '["';
    $return_string .= trim($obj[0], " \t\n\r\0\x0B");
    $return_string .= '", ';
    $return_string .= strval($obj[1]);
    $return_string .= "],";
}
$return_string = rtrim($return_string, ',');
$return_string .= "]";

echo $return_string;

?>
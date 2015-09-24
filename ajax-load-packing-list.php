<?php

include_once '../../../wp-config.php';

// Connect to MySQL Server
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

// Select Database
mysql_select_db(DB_NAME) or die(mysql_error());

// Retrieve Packing List for data manipulation
$query_packinglist = "SELECT a.post_content FROM wp_posts a WHERE a.post_type = 'page' AND a.post_title = 'Packing List'";
$packinglist_resource = mysql_query($query_packinglist) or die (mysql_error());
$packinglist_string = mysql_fetch_row($packinglist_resource, 0);

// Convert String into 1 level array
$packinglist_array = array_slice(explode("~", $packinglist_string[post_content]), 1);

// Convert array into JSON
$JSONstring = "{ ";
foreach($packinglist_array as $category) {
    // Need to explode it again to remove the category header
    $category_array = explode("^", $category);
    $categoryheader = $category_array[0];
    $JSONstring .= '"' . $categoryheader . '":[';
    $category_array = array_slice($category_array, 1);
    
    // Create an item array
    $item_array = array();
    foreach($category_array as $item) {
        $JSONstring .= '"' . $item . '",' ;
    }
    $JSONstring = rtrim($JSONstring, ",");
    $JSONstring .= '],';
}
$JSONstring = rtrim($JSONstring, ",");
$JSONstring .= '}';
$JSONstring = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $JSONstring);

echo json_encode($JSONstring, JSON_UNESCAPED_UNICODE);
echo json_last_error_msg();

?>
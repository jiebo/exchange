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

// Retrieve Packing Category
$q = $_GET['Category'];

// Get relevant Category records here
foreach($packinglist_array as $category ) {
    // Need to explode again to get category header
    $category_array = explode("^", $category);
    $categoryheader = trim($category_array[0], " \t\n\r\0\x0B");
    $categoryheader = substr($categoryheader, 1);
    if($categoryheader === $q) {
        foreach($category_array as $record) {
            $records[] = $record;
        }
        break;
    }
}

if($records != null) {
    // Build String here
    $records = array_slice($records, 1);

    $display_string  = "";
    $display_string .= "<tr id=\"".$categoryheader."\" class=\"category-added\">";
    $display_string .= "<td style=\"line-height: 200%;\"><span class=\"rotate-text\">". $categoryheader ."</span></td>";
    $display_string .= "<td style=\"overflow-y: hidden;\">";
    $display_string .= "<ul class=\"dual-col\">";
    foreach($records as $record) {
        $display_string .= "<li>" . $record . "</li>";
    }
    $display_string .= "</ul>";
    $display_string .= "</td>";
    $display_string .= "</tr>";

    echo $display_string;
} else {
    echo "";
}


?>
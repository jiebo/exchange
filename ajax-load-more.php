<?php

include_once '../../../wp-config.php';

// Connect to MySQL Server
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

// Select Database
mysql_select_db(DB_NAME) or die(mysql_error());

// Build Query to find category = 'secondary'
$query  = "SELECT DISTINCT wp_posts.ID, wp_posts.post_title, wp_postmeta.meta_value ";
$query .= "FROM wp_posts ";
$query .= "JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id ";
$query .= "JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id ";
$query .= "JOIN wp_term_taxonomy ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id ";
$query .= "JOIN wp_terms ON wp_term_taxonomy.term_id = wp_terms.term_id ";
$query .= "WHERE wp_terms.name = 'secondary' AND wp_posts.post_type = 'post' ";
$query .= "AND wp_postmeta.meta_key = 'Thumbnail'";
$query .= "ORDER BY wp_posts.post_title ASC;";

// Execute Query
$query_result = mysql_query($query) or die(mysql_error());

// Build Result String
$display_string = "";
$result_array;
while($row = mysql_fetch_array($query_result)) {
    if(empty($result_array[$row[ID]])) {
        $result_array[$row[ID]] = $row;
    } else {
        if(rand()%2 === 0) {
            $result_array[$row[ID]] = $row;
        }
    }
}
foreach ($result_array as $result) {
    $display_string .= " <div class=\"col-xs-E-6 col-xs-12 col-sm-6 col-md-4 col-lg-4\">";
    $display_string .= " <div class=\"overlay-container\"> ";
    $display_string .= " <a href=\"index.php?p=$result[ID]\" class=\"thumbnail\"> ";
    $display_string .= " <img class=\"img-responsive grayscale\" src=\"$result[meta_value]\"> ";
    $display_string .= " <div class=\" overlay\"> ";
    $display_string .= " <h3><span class=\"backdrop\">$result[post_title]</span></h3> ";
    $display_string .= " </div> ";
    $display_string .= " </a> ";
    $display_string .= " </div> ";
    $display_string .= " </div> ";
}
echo $display_string;

?>
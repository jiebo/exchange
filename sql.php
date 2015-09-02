<?php


function get_expense_city_list() {

    // Connect to MySQL Server
    mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

    // Select Database
    mysql_select_db(DB_NAME) or die(mysql_error());
    
    $city_array = array();
    
    $query  = "SELECT A.city_name FROM config_city A ORDER BY A.city_name ASC; ";
    $query_result = mysql_query($query) or die (mysql_error());
    while ($row = mysql_fetch_array($query_result)) {
        $city_array[] = $row['city_name'];
    }
    
    return $city_array;
}

?>
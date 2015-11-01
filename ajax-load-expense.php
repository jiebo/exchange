<?php

include_once '../../../wp-config.php';

// Connect to MySQL Server
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

// Select Database
mysql_select_db(DB_NAME) or die(mysql_error());

// Retrieve City Name/Days/Nights/Currency via postid
$q = strval($_GET['q']);
$query_city  = "SELECT A.city_name, A.days, A.nights, A.currency FROM config_city A WHERE A.city_name = '";
$query_city .= $q;
$query_city .= "';";
$city_resource    = mysql_query( $query_city ) or die (mysql_error());
$city_meta        = mysql_fetch_row($city_resource, 0);

// Get latest exchange rates
$currency_data = @file_get_contents(
    'https://openexchangerates.org/api/latest.json?app_id=3e821a92a4f14e03b09de0e579a89fdf'
    );
$currency_json = json_decode( $currency_data );
if($currency_json == null) {
    $city_meta['currency'] = "SGD";
    $currency_rate = 1.0;
} else {
    $SGD           = $currency_json->rates->SGD;
    $base_currency = $currency_json->rates->$city_meta['currency'];
    $currency_rate = $base_currency/$SGD;
}


// Compute Average Meal
$query_string  = "SELECT ROUND(AVG(A.ex_amount), 2)";
$query_string .= "FROM wp_expense A ";
$query_string .= "WHERE A.ex_city = '";
$query_string .= $city_meta['city_name'];
$query_string .= "' ";
$query_string .= "AND A.ex_city_category = 'Restaurant';";
$query_resource= mysql_query( $query_string ) or die (mysql_error());
$avg_meal_cost = mysql_result( $query_resource, 0 ) * $currency_rate;
$avg_meal_cost = number_format( $avg_meal_cost, 2, '.', '');

// Compute Daily Public Transport
$query_string  = "SELECT SUM(A.ex_amount)";
$query_string .= "FROM wp_expense A ";
$query_string .= "WHERE A.ex_city = '";
$query_string .= $city_meta['city_name'];
$query_string .= "' ";
$query_string .= "AND A.ex_city_category = 'Transport';";
$query_resource= mysql_query( $query_string ) or die (mysql_error());
$daily_trnsport= mysql_result( $query_resource, 0 ) * $currency_rate / $city_meta['days'];
$daily_trnsport= number_format( $daily_trnsport, 2, '.', '');

// Compute Accommodation / night
$query_string  = "SELECT SUM(A.ex_amount)";
$query_string .= "FROM wp_expense A ";
$query_string .= "WHERE A.ex_city = '";
$query_string .= $city_meta['city_name'];
$query_string .= "' ";
$query_string .= "AND A.ex_city_category = 'Accommodation';";
$query_resource= mysql_query( $query_string ) or die (mysql_error());
$accommodation = mysql_result( $query_resource, 0 ) * $currency_rate / $city_meta['nights'];
$accommodation = number_format( $accommodation, 2, '.', '');

// Compute Estimated Local Currency / day
$query_string  = "SELECT SUM(A.ex_amount)";
$query_string .= "FROM wp_expense A ";
$query_string .= "WHERE A.ex_city = '";
$query_string .= $city_meta['city_name'];
$query_string .= "' ";
$query_string .= "AND A.ex_payment_mode = 'Cash';";
$query_resource= mysql_query( $query_string ) or die (mysql_error());
$est_currency  = mysql_result( $query_resource, 0 );
$est_currency  = (float) $est_currency * $currency_rate / $city_meta['days'];



// Build Result String
$display_string = "";
$display_string .= " <h3>$city_meta[city_name]</h3>";
$display_string .= " <form class=\"form-horizontal col-lg-6 col-lg-offset-1 col-md-8 col-sm-8\" style=\"font-size: 18px;\">"; 
$display_string .= " <div class=\"form-group\">";
$display_string .= " <label class=\"col-sm-6 control-label\">Average Meal</label> ";
$display_string .= " <div class=\"col-sm-6 col-xs-12\"> ";
$display_string .= " <p class=\"form-control-static\">".$avg_meal_cost. " " . $city_meta['currency']."</p> ";
$display_string .= " </div> ";
$display_string .= " </div>  ";
$display_string .= " <div class=\"form-group\">";
$display_string .= " <label class=\"col-sm-6 control-label\">Public Transportation</label> ";
$display_string .= " <div class=\"col-sm-6 col-xs-12\"> ";
if($daily_trnsport > 0.01) {
    $display_string .= " <p class=\"form-control-static\">" . $daily_trnsport . " " . $city_meta['currency'] . " / day</p> ";
} else {
    $display_string .= " <p class=\"form-control-static\">N.A.</p> ";
}
$display_string .= " </div> ";
$display_string .= " </div>  ";
$display_string .= " <div class=\"form-group\">";
$display_string .= " <label class=\"col-sm-6 control-label\">Accommodation</label> ";
$display_string .= " <div class=\"col-sm-6 col-xs-12\"> ";
$display_string .= " <p class=\"form-control-static\">" . $accommodation . " " . $city_meta['currency']. " </p> ";
$display_string .= " </div> ";
$display_string .= " </div>  ";
$display_string .= " <div class=\"form-group\">";
$display_string .= " <label class=\"col-sm-6 control-label\">Est. Local Currency required</label> ";
$display_string .= " <div class=\"col-sm-6 col-xs-12\"> ";
$display_string .= " <p class=\"form-control-static\">".number_format($est_currency, 2, '.', '')." ".$city_meta['currency']." / day</p> ";
$display_string .= " </div> ";
$display_string .= " </div>  ";
echo $display_string;

?>
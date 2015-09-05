<?php

include_once '../../../wp-config.php';

// Connect to MySQL Server
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

// Select Database
mysql_select_db(DB_NAME) or die(mysql_error());

// Initialise variables for all Exchange Expense Categories
$food_key           = "Food";
$preDeparture_key   = "Pre-Departure";
$accommodation_key  = "Accommodation";
$leisure_key        = "Leisure";
$transport_key      = "Transport";
$survival_key       = "Survival";
$wants_key          = "Jie Bo";
$flights_key        = "Flights";

// Initialise generic query
$sum_query = "SELECT SUM(A.ex_amount) FROM exchangedb.wp_expense A WHERE A.ex_exchange_category = '";
$array_query = "SELECT A.ex_name, A.ex_amount FROM exchangedb.wp_expense A WHERE A.ex_exchange_category = '";

// Compute total expentiture by category
$query_string   = $sum_query . $food_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$food_amount    = mysql_result ( $query_resource, 0 );

$query_string   = $sum_query . $preDeparture_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$preDeparture_amount    = mysql_result ( $query_resource, 0 );

$query_string   = $sum_query . $accommodation_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$accommodation_amount    = mysql_result ( $query_resource, 0 );

$query_string   = $sum_query . $leisure_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$leisure_amount    = mysql_result ( $query_resource, 0 );

$query_string   = $sum_query . $transport_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$transport_amount    = mysql_result ( $query_resource, 0 );

$query_string   = $sum_query . $survival_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$survival_amount    = mysql_result ( $query_resource, 0 );

$query_string   = $sum_query . $wants_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$wants_amount    = mysql_result ( $query_resource, 0 );

$query_string   = $sum_query . $flights_key . "';";
$query_resource = mysql_query( $query_string ) or die (mysql_error());
$flights_amount    = mysql_result ( $query_resource, 0 );

$total_amount   = $food_amount + $preDeparture_amount + $accommodation_amount + $leisure_amount + $transport_amount + $survival_amount + $wants_amount + $flights_amount;
$total_amount   = number_format($total_amount, 2, ".", ",");

?>

$(function () {

    // Highcharts Options
    Highcharts.setOptions({
        lang: {
            drillUpText: '\u25c1 Back'
        }
    });
    
    // Create the chart
    $('#chart').highcharts({
        chart: {
            backgroundColor: null,
            type: 'pie'
        },
        title: {
            text: 'Total Spending: S$ <?php echo $total_amount; ?>'
        },
        subtitle: {
            text: '',
            color: '#FFFFFF'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: S$ {point.y}',
                    color: '#FFFFFF'
                },
                showInLegend: false
            }
        },

        tooltip: {
            enabled: false,
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} SGD</b><br/>'
        },
        series: [{
            name: "Exchange Expense",
            colorByPoint: true,
            data: [{
            name: "Pre-Departure",
                y: parseInt(<?php echo $preDeparture_amount; ?>),
                drilldown: "Pre-Departure",
                dataLabels : {
                    color: '#FFFFFF'
                }
            }, {
                name: "Food",
                y: parseInt(<?php echo $food_amount; ?>),
                drilldown: null
            }, {
                name: "Flights",
                y: parseInt(<?php echo $flights_amount; ?>),
                drilldown: null
            }, {
                name: "Transport",
                y: parseInt(<?php echo $transport_amount; ?>),
                drilldown: null
            }, {
                name: "Leisure",
                y: parseInt(<?php echo $leisure_amount; ?>),
                drilldown: null
            }, {
                name: "Accommodation",
                y: parseInt(<?php echo $accommodation_amount; ?>),
                drilldown: null
            }, {
                name: "Wants",
                y: parseInt(<?php echo $wants_amount; ?>),
                drilldown: null
            }, {
                name: "Survival",
                y: parseInt(<?php echo $survival_amount; ?>),
                drilldown: "Survival"
            }]
        }],
        drilldown: {
            drillUpButton: {
                position: {
                    x: 0,
                    y: 0
                }
            },
            series: [{
                name: "Pre-Departure",
                id: "Pre-Departure",
                data: [
                <?php
                
                $arr_string = $array_query . $preDeparture_key . "' ORDER BY A.ex_amount DESC;";
                $arr_resource = mysql_query ( $arr_string ) or die (mysql_error());
                while ( $row = mysql_fetch_assoc ($arr_resource) ) {

                ?>
                    ["<?php echo $row['ex_name']; ?>", parseFloat(<?php echo $row['ex_amount']; ?>)],
                <?php
                }
                ?>
                ]
            }, {
                name: "Survival",
                id: "Survival",
                data: [
                <?php
                    $survival_arr_string = $array_query . $survival_key . "' ORDER BY A.ex_amount ASC;";
                    $survival_resource   = mysql_query ( $survival_arr_string ) or die( mysql_error() );
                    while ( $row = mysql_fetch_assoc ( $survival_resource) ) {
                    ?>
                
                    ["<?php echo $row['ex_name']; ?>", parseFloat(<?php echo $row['ex_amount']; ?>)],
                
                <?php 
                    }
                ?>
                ]
            }]
        }
    });
});

<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage exchange
 * @since exchange 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="An exchange guide that houses my Europe 2015 experience">
        <meta name="author" content="Ti Jie Bo">
	<?php 
        if(is_single()) {
            echo '<title>'.get_the_title(get_the_ID()).' - Europe 2015</title>';
        } else {
            echo '<title>Europe 2015</title>';
        }
        
        ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.png">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
        
        <!-- Bootstrap Core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="<?php bloginfo('template_directory'); ?>/css/stylish-portfolio.css" rel="stylesheet">
        <link href="<?php bloginfo('template_directory'); ?>/css/custom.css" rel="stylesheet">
        
        <?php 
        if(is_home()) : ?>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/owl-carousel/owl.theme.css">
        <?php endif; ?>
        
        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

       
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->    
        
	<?php //wp_head(); ?>
    </head>

    <body>


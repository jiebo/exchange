<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <body>
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
        <meta name="description" content="An exchange guide that houses my Stockholm Exchange experience">
        <meta name="author" content="Ti Jie Bo">
	<?php 
        if(!is_home() && !is_404()) {
            echo '<title>'.get_the_title(get_the_ID()).' - Europe 2015</title>';
        } else {
            echo '<title>Europe 2015</title>';
        }
        ?>
        
        <!-- Facebook Open Graph Meta -->
        <meta property="og:url" content="<?php echo get_permalink(); ?>" />
        <meta property="og:site_name" content="EU-SEP" />
        <meta property="fb:app_id" content="181914305480369" />
        <?php if(!(is_single() || is_page())) : ?>
        <meta property="og:title"              content="A comprehensive guide to exchange in Europe" />
        <meta property="og:description"        content="This website houses my entire exchange experience in Stockholm. It includes important pre-departure info to city guides, as well as an expense estimator for the cost conscious student." />
        <meta property="og:image"              content="<?php bloginfo('template_directory'); ?>/img/screenshot.png" />
        <?php else : ?>
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="Guide to <?php echo get_the_title(); ?>" />
        <meta property="og:description"        content="<?php echo get_post_meta(get_the_ID(), 'Subheading', TRUE) ?>" />
            <?php if(is_single()) : ?>
            <meta property="og:image"          content="<?php echo get_post_meta(get_the_ID(), 'Thumbnail', TRUE) ?>" />
            <?php else : ?>
            <meta property="og:image"          content="<?php bloginfo('template_directory'); ?>/img/screenshot.png" />
            <?php endif; ?>
        <?php endif; ?>
        
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.png">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
        
        <!-- Bootstrap Core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php bloginfo('template_directory'); ?>/css/stylish-portfolio.css" rel="stylesheet">
        
        <?php 
        if(is_single() || is_home()) : ?>
            <link href="<?php bloginfo('template_directory'); ?>/css/custom.css" rel="stylesheet">
        <?php endif; ?>
        
        <?php
        if(is_page()) : ?>
            <link href="<?php bloginfo('template_directory'); ?>/css/article.css" rel="stylesheet">
            <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <?php endif; ?>
        
        <?php 
        if(is_home()) : ?>
            <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/owl-carousel/owl.carousel.css">
            <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/owl-carousel/owl.theme.css">
        <?php endif; ?>
        
        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->    
        
	<?php //wp_head(); ?>
    </head>

<body>
</script>
        <!-- Social Media Sidebar -->
        <div class="social-media-sidebar hidden-xs hidden-sm">
            <ul>
                <li><a href="https://www.facebook.com/dialog/feed?app_id=181914305480369&display=popup&link=http%3A%2F%2Feu-sep.com&redirect_uri=http%3A%2F%2Feu-sep.com" target="_blank" class="facebook-share"><span style="color: #FFF; font-weight: bold;">Share</span> <i class="fa fa-facebook text-primary"></i></a></li>
                <li><a href="#"><span style="color: #FFF; font-weight: bold;">Tweet</span> <i class="fa fa-twitter text-primary"></i></a></li>
            </ul>
        </div>
        <style>
            .social-media-sidebar {
                position: fixed;
                top: 50%;
                left: 0%;
                z-index: 9999;
                visibility: hidden;
            }
            .social-media-sidebar ul {
                transform: translate(-242px, 0);
            }
            .social-media-sidebar a:hover {
                text-decoration: none;
            }
            .social-media-sidebar ul li {
                color: #FFF;
                display: block;
                width: 250px;
                background: rgba(0,0,0,0.36);
                text-align: right;
                padding: 10px;
                margin: 5px;
                font-size: 1.25em;
                -webkit-border-radius: 0 30px 30px 0;
                -moz-border-radius: 0 30px 30px 0;
                border-radius: 0 30px 30px 0;
                -webkit-transition: -webkit-transform 0.5s ease-in; /* Changed here */ 
                   -moz-transition: -moz-transform 0.3s ease-in;
                     -o-transition: -o-transform 0.5s ease-in;
                        transition: transform 0.3s ease-in;
            }
            .social-media-sidebar ul li:hover,
            .social-media-sidebar ul li:focus {
                -webkit-transform: translate(60px, 0);
                   -moz-transform: translate(60px, 0);
                    -ms-transform: translate(60px, 0);
                     -o-transform: translate(60px, 0);
                        transform: translate(60px, 0);
                -webkit-transition: -webkit-transform 0.3s ease-in; /* Changed here */ 
                   -moz-transition: -moz-transform 0.3s ease-in;
                     -o-transition: -o-transform 0.3s ease-in;
                        transition: transform 0.3s ease-in;
            }
            .social-media-sidebar ul li i {
                margin-left: 10px; /* Margin between <i> and <span> */
                width: 2em;        /* Size of the white circle of i */
                height: 2em;       /* Size of the white circle of i */   
                padding: 0.5em;
                font-size: 1em;
                background: #FFF;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                border-radius: 50%;
            }
        </style>
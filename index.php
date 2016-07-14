<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage exchange
 * @since exchange 1.0
 */

get_header(); ?>

    <!-- Navigation -->        
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="icon icon-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="icon icon-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click(); >Europe Exchange</a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#predeparture" onclick=$("#menu-close").click(); >Pre-departure</a>
            </li>
            <li>
                <a href="#travel" onclick=$("#menu-close").click(); >City Guides</a>
            </li>
            <li>
                <a href="#expense" onclick=$("#menu-close").click(); >Expense Guide</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click(); >Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Europe Exchange</h1>
            <div class="blockquotes">
                <h3><em>“Traveling – it leaves you speechless, then turns you into a storyteller.”</em></h3>
            </div>
            <style>.blockquotes{padding:10px 20px;margin:0 0 20px;font-size:17.5px}</style>
            <a href="#travel" class="btn btn-dark btn-lg">Start Traveling</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>An ultimate travel guide that chronicles my entire exchange experience in Stockholm!</h2>
                    <p class="lead">This site will house pre-departure info to city guides, as well as an expense estimator for the entire student exchange.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pre-departure -->
    <section id="predeparture" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Pre-departure Info</h2>
                    <hr class="small">
                    <div class="row">
                        <?php 
                        
                        // Get Exchange Articles here
                        $page_selection_array = array(
                            'sort_column' => 'menu_order',
                            'sort_order'   => 'ASC'
                        );
                        $pages_array = get_pages($page_selection_array);
                        foreach( $pages_array as $page ) {
                            $page_icon = get_post_meta($page -> ID, "Thumbnail", true);
                            $page_subheading = get_post_meta($page -> ID, "Subheading", true);
                            
                        ?>
                        <div class="col-xs-E-6 col-xs-12 col-md-3 col-sm-4">
                            <a href="<?php echo get_page_link($page -> ID); ?>" class="service-item">
                                <span class="icon-stack icon-4x">
                                    <i class="icon icon-circle icon-stack-2x"></i>
                                    <i class="icon icon-<?php echo $page_icon; ?> icon-stack-1x text-primary"></i>
                                </span>
                                <h4><strong><?php echo $page -> post_title; ; ?></strong></h4>
                                <p><?php echo $page_subheading; ?></p>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel -->
    <section id="travel" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 centered text-center">
                    <h2>City Guide</h2>
                    <hr class="small" style="padding-bottom: 15px;">
                    <div class="row">
                        <?php 
                            /* Get all Primary post IDs */
                            $post_selection_array = array(
                                'posts_per_page'    => -1,
                                'fields'            => 'ids',
                                'category_name'     => 'Primary',
                                'orderby'           => 'title',
                                'order'             => 'ASC'
                            );
                            
                            $posts_array = get_posts( $post_selection_array );  
                            $thumbnail_key = "Thumbnail";
                            
                            foreach ($posts_array as $postid) {
                               
                                // This doesn't work for ajax-load-more
                                $thumbnail_array = get_post_meta($postid, $thumbnail_key);
                                $thumbnail_url = $thumbnail_array[rand(0, count($thumbnail_array)-1)];
                        ?>
                        <div class="col-xs-E-6 col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="overlay-container">
                                <a href="<?php echo get_post_permalink( $postid ); ?>" class="thumbnail">
                                    <img class="grayscale img-responsive" src="<?php echo $thumbnail_url;?>" alt="<?php echo $postid; ?>">
                                    <div class="overlay">
                                        <h3><span class="backdrop"><?php echo get_the_title( $postid ); ?></span></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                        <div id="ajax-city-display"></div>
                    </div>
                    <a id="ajax-button" class="btn btn-dark">View More Items</a>
                    <span id="ajax-load-sm" class="icon icon-refresh icon-spin icon-4x"></span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Expense Guide -->
    <aside class="call-to-action bg-primary" style="position: relative;" id="expense">
        <div class="loading-div" id="ajax-loading"><div class="align-center"><i class="icon icon-refresh icon-spin icon-5x"></i></div></div>
        <div class="container">
            <div class="col-lg-12 text-center centered">
                <h2>Expenses</h2>
                <hr class="small">
                <style>#ajax-expense-display h3 a{color:#fff}#ajax-expense-display h3 a:hover{text-decoration:none;font-style:italic}</style>
                <div id="ajax-expense-display">
                    <h3>City</h3>
                    <form class="form-horizontal col-lg-6 col-lg-offset-1 col-md-8 col-sm-8" style="font-size: 18px;"> 
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Average Meal</label>
                            <div class="col-sm-6 col-xs-12">
                                <p class="form-control-static"></p>
                            </div>
                        </div>        
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Transportation / Day</label>
                            <div class="col-sm-6 col-xs-12">
                                <p class="form-control-static"></p>
                            </div>
                        </div>                     
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Accommodation / Night</label>
                            <div class="col-sm-6 col-xs-12">
                                <p class="form-control-static"></p>
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Est. Local Currency required</label>
                            <div class="col-sm-6 col-xs-12">
                                <p class="form-control-static"></p>
                            </div>
                        </div>  
                    </form>  
                </div>
                <div class="row" style="margin-bottom:30px;">
                    <form class="form-horizontal col-lg-10 col-md-11 col-sm-11 col-xs-11">
                        <?php
                        include 'sql.php';
                        $city_array = get_expense_city_list();
                        ?>
                        <div class="btn-group pull-right dropup">     <!-- Button dropdown for Select City -->
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">City Selector &nbsp; <span class="caret"></span>                        </button>
                            <ul class="dropdown-menu scrollable-menu">
                            <?php foreach ( $city_array as $city ) { ?>
                                <li><a href="javascript:void(0);" onclick="ajaxLoadCityExpense('<?php echo $city; ?>');"><?php echo $city; ?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </form>  
                </div>
        <?php /*
        <div class="this-div-is-for-the-carousel hidden-xs"  id="chart-div">
            <h3>Exchange</h3>
            <div id="chart" style="height: 40%;" class="align-chart"></div>
        </div> 
        */?>               
            </div>
        </div>
    </aside>
    <?php get_footer(); ?>


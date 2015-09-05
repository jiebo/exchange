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
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Europe 2015</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#predeparture" onclick = $("#menu-close").click(); >Pre-departure</a>
            </li>
            <li>
                <a href="#travel" onclick = $("#menu-close").click(); >City Guides</a>
            </li>
            <li>
                <a href="#expense" onclick = $("#menu-close").click(); >Expense Guide</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center" style="">
            <h1>Europe 2015</h1>
            <h3>1 Exchange, 9 Countries, 15 Cities</h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Find Out More</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>An ultimate travel guide that chronicles my entire (almost) exchange experience in Stockholm!</h2>
                    <p class="lead">This site will house pre-departure info to city guides, as well as an expense estimator for each city and the entire student exchange.</p>
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
                        <div class="col-md-6 col-sm-6">		<!--	Country selection	-->
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flag fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Country Selection</strong>
                                </h4>
                                <p>Some factors to consider when choosing a school</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">		<!--	SEP Application	-->
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>SEP Application</strong>
                                </h4>
                                <p>Feel free to make use of my application form</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">		<!--	Pertinent Info	-->
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-list-alt fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Pertinent Info</strong>
                                </h4>
                                <p>Checklist of the things to do before flying</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">		<!--	Packing List	-->
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-suitcase fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Packing List</strong>
                                </h4>
                                <p>My packing list and some things to take note of</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
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
                    <hr class="small">
                    <div class="row">
                        <?php /* Get all posts */ ?>
                        <?php
                            
                            $post_selection_array = array(
                                'posts_per_page'    => -1,
                                'fields'            => 'ids',
                                'category_name'     => 'Primary',
                                'orderby'           => 'title',
                                'order'             => 'ASC'
                            );
                            
                            $posts_array = get_posts( $post_selection_array );   // Query all post IDs
                            $thumbnail_key = "Thumbnail";
                            
                            foreach ($posts_array as $postid) {
                               
                        ?>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class=" overlay-container">
                                    <a href="<?php echo get_post_permalink( $postid ); ?>" class="thumbnail">
                                        <img class="img-responsive grayscale" src="<?php echo get_post_meta($postid, $thumbnail_key, true);?>" alt="<?php echo $postid; ?>">
                                        <div class=" overlay">
                                            <h3 class=""><span class="backdrop"><?php echo get_the_title( $postid ); ?></span></h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        <div id="ajax-city-display"></div>
                    </div>
                    <!-- /.row (nested) -->
                    <form>
                        <a id="ajax-button" class="btn btn-dark" onmouseup="ajaxLoadMore(); return false;">View More Items</a>
                    </form>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    
    <!-- Expense Guide -->
    <aside class="call-to-action bg-primary" style="position: relative;" id="expense">
        <div class="loading-div" id="ajax-loading"><div class="align-center"><i class="fa fa-refresh fa-spin fa-5x"></i></div></div>
        <div class="container ">
            <div class="col-lg-12 text-center centered">
                <h2>Expenses</h2>
                <hr class="small">
                <div id="swipe-div" class="owl-carousel">
                    <div class="this-div-is-for-the-carousel row">
                        <div class="" id="ajax-expense-display">
                            <h3>City</h3>
                            <form class="form-horizontal col-lg-6 col-lg-offset-1 col-md-8 col-sm-8" style="font-size: 18px;"> 
                                <div class="form-group">        <!-- Form group for AVG MEAL    -->
                                    <label class="col-sm-6 control-label">Average Meal</label>
                                    <div class="col-sm-6">
                                        <p class="form-control-static"></p>
                                    </div>
                                </div>        
                                <div class="form-group">        <!-- Form group for TRANSPORT   -->
                                    <label class="col-sm-6 control-label">Transportation / Day</label>
                                    <div class="col-sm-6">
                                        <p class="form-control-static"></p>
                                    </div>
                                </div>                     
                                <div class="form-group">        <!-- Form group for ACCOMMODATION -->
                                    <label class="col-sm-6 control-label">Accommodation / Night</label>
                                    <div class="col-sm-6">
                                        <p class="form-control-static"></p>
                                    </div>
                                </div>                       
                                <div class="form-group">        <!-- Form group for CURRENCY    -->
                                    <label class="col-sm-6 control-label">Est. Local Currency required</label>
                                    <div class="col-sm-6">
                                        <p class="form-control-static"></p>
                                    </div>
                                </div>  
                                <div id="ajax-expense-default"></div>
                            </form>  
                        </div>
                        <div class="row">
                            <form class="form-horizontal col-lg-10 col-md-11 col-sm-11 col-xs-11">
                                <?php
                                        include 'sql.php';
                                        $city_array = get_expense_city_list();
                                        
                                ?>
                                <div class="btn-group pull-right dropup">     <!-- Button dropdown for Select City -->
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">City Selector &nbsp; <span class="caret"></span>                        </button>
                                    <ul class="dropdown-menu scrollable-menu">
                                        
                                    <?php
                                    
                                        foreach ( $city_array as $city ) {

                                    ?>
                                        <li><a href="javascript:void(0);" onclick="ajaxLoadCityExpense('<?php echo $city; ?>');"><?php echo $city; ?></a></li>

                                    <?php
                                        }
                                    ?>
                                        
                                    </ul>
                                </div>
                            </form>  
                        </div>
                    </div>
                    <div class="this-div-is-for-the-carousel"  id="chart-div">
                        <h3>Exchange</h3>
                        <div id="chart" style="height: 40%;" class="align-chart"></div>
                    </div> 
                </div>
                                          
            </div>
        </div>
    </aside>

    <!-- Map 
    <section id="map" class="map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
        <br />
        <small>
            <a href="#"></a>
        </small>
    </section>
    -->
    
    <!-- Contact -->
    <section id="contact" class="contact">
    
    </section>


<?php get_footer(); ?>


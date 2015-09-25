<?php
/**
 * Template Name: Article-Tabs
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
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
                <a href="<?php echo home_url(); ?>"  onclick = $("#menu-close").click(); >Europe 2015</a>
            </li>
            <li>
                <a href="<?php echo home_url(); ?>/#travel"  onclick = $("#menu-close").click(); >City Guides</a>
            </li>
            <li>
                <a href="<?php echo home_url(); ?>/#predeparture"  onclick = $("#menu-close").click(); >Exchange Info</a>
            </li>
            <?php
            
            // Get Exchange Articles here
            $page_selection_array = array(
                'sort_column' => 'menu_order',
                'sort_order'  => 'ASC'
            );
            $pages_array = get_pages($page_selection_array);
            foreach( $pages_array as $page ) {
            ?>
            <li>
                <a href="<?php echo get_page_link($page -> ID); ?>" onclick= $("#menu-close").click(); ><i class="fa fa-<?php echo get_post_meta($page -> ID, "Thumbnail", true) ?>"></i>&nbsp;&nbsp;<?php echo $page -> post_title; ?></a>
            </li>    
            <?php    
            }
            ?>
        </ul>
    </nav>
    
    <?php
    // Get all variables
    
    $pageid = get_the_ID(); 
    $page = get_post($pageid);
    $page_title = $page -> post_title;
    $page_lastupdate = $page -> post_date_gmt;
    $page_content = $page -> post_content;
    $page_intro = get_post_meta($pageid, "Introduction", true);
    $page_icon  = get_post_meta($pageid, "Thumbnail", true);

    
    ?>
    
    <div class="container" style="padding-top: 100px;" >
        <article class="row">
            <div class="col-lg-8 centered">
                <h1 class="post-title"><i class="fa fa-<?php echo $page_icon ?> fa-1x"></i> <?php echo $page_title; ?> <i class="fa fa-<?php echo $page_icon ?> fa-1x"></i></h1>
                <hr class="star-primary" style="margin-top: 50px; margin-bottom: 50px;">
                
                <style>
                    .post-title {
                        text-transform: uppercase;
                        font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                        font-weight: 700;
                        text-align: center;
                        color: #2C3E50;
                    }
                    h1.post-title {
                        font-size: 3em;
                    }
                    h2.post-title {
                        font-size: 2.5em;
                    }
                </style>
                <p><?php echo $page_intro; ?></p>
                <form method="" onsubmit="return false;">
                    <div class="tabs">
                        <style>
                            .tabs {
                                font-size: 18px;
                            }
                            .tabs a {
                                text-decoration: none;
                            }
                            .tab-content {
                                padding: 10px;
                            }
                        </style>
                        <ul class="nav nav-tabs" role="tablist">	<!-- Tab Navigation -->
                            <li class="active"><a href="#essential" data-toggle="tab">Essential</a></li>
                            <li ><a href="#good-to-have" data-toggle="tab">Good to have</a></li>
                            <li ><a href="#depends" data-toggle="tab">Depends</a></li>
                            <li ><a href="#showall" data-toggle="tab">Show All</a></li>
                            <li class="pull-right" style="line-height: 225%;">
                                <style>
                                    /* Adjust the left/right padding of the fa icons in posts */
                                    .less-padding {
                                        padding: 6px 3px;
                                    }
                                </style>
                                <button class="btn btn-light less-padding">
                                    <span class="fa-stack">
                                        <i class="fa fa-eraser fa-stack-1x"></i>
                                    </span>
                                </button>
                                <button class="btn btn-light less-padding">
                                    <span class="fa-stack">
                                        <i class="fa fa-check fa-stack-1x"></i>
                                        <i class="fa fa-square-o fa-stack-2x"></i>
                                    </span>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content small row">	<!-- Tab Content -->
                            <div class="tab-pane active" id="essential">
                                <div class="col-md-4">
                                    <button class="btn btn-light btn-lg categoryToggle1" onclick="selectPackingCategory();"><i class="fa fa-square-o"></i> Clothing</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light btn-lg categoryToggle2" onclick="selectPackingCategory();"><i class="fa fa-square-o"></i> Footwear</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light btn-lg categoryToggle3" onclick="selectPackingCategory();"><i class="fa fa-square-o"></i> School</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light btn-lg categoryToggle4" onclick="selectPackingCategory();"><i class="fa fa-square-o"></i> Day-to-day</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light btn-lg categoryToggle5" onclick="selectPackingCategory();"><i class="fa fa-square-o"></i> Tech Accessories</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light btn-lg categoryToggle6" onclick="selectPackingCategory();"><i class="fa fa-square-o"></i> Health</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-light btn-lg categoryToggle7" onclick="selectPackingCategory();"><i class="fa fa-square-o"></i> Travel Essential</button>
                                </div>
                                <div class="tab-pane" id="good-to-have">

                                </div>
                                <div class="tab-pane" id="depends">

                                </div>
                                <div class="tab-pane" id="showall">

                                </div>
                            </div>
                        </div>
                        <div class="row table-responsive">
                            <style>
                            </style>
                            <table class="table-striped table-hover">
                                <tbody id="packing-list-container">
                                    <tr>
                                        <td><span class="rotate-text">Winter</span></td>
                                        <td>
                                            <ul class="dual-col">
                                                <li>Outer Jacket</li>
                                                <li>Inner Jacket (e.g., Uniqlo's down jacket)</li>
                                                <li>Heat Tech</li>
                                                <li>Leather Gloves</li>
                                                <li>Sports gloves</li>
                                                <li>Waterproof shoes with sufficient traction</li>
                                                <li>Beanie/Headwear</li>
                                                <li>Scarf (Heat Tech)</li>
                                                <li>Winter socks</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="rotate-text">Tech </span></td>
                                        <td>
                                            <ul class="dual-col">
                                                <li>Router (maybe)</li>
                                                <li>≥2 travel adaptors</li>
                                                <li>Earpiece</li>
                                                <li>USB cables</li>
                                                <li>Thumbdrive</li>
                                                <li>External harddisk</li>
                                                <li>Laptop</li>
                                                <li>Monitor?</li>
                                                <li>Extension cord</li>
                                                <li>Camera</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <button type="submit" class="btn btn-default pull-right row" onclick="ajax();"><i class="fa fa-download"></i> Export</button>
                </form>
            </div>
        </article>
    </div>
<?php get_footer(); ?>
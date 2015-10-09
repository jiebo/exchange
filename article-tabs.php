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

    // Get all category headers 
    $packinglist_array = array_slice(explode("~", $page_content), 1);
    foreach($packinglist_array as $category) {
        $category_array = explode("^", $category);
        $records[] = trim($category_array[0], " \t\n\r\0\x0B");
    }
    // Perform category sorting
    foreach($records as $record) {
        $all_records[] = substr($record, 1);
        if($record[0] === "E") {
            $essential_records[] = substr($record, 1);
        } else if($record[0] === "D") {
            $depends_records[] = substr($record, 1);
        } else if($record[0] === "G") {
            $good_to_have_records[] = substr($record, 1);
        } else;
    }
    ?>
    
    <div class="container" style="padding-top: 100px;" >
        <article class="row">
            <div class="col-lg-8 centered">
                <h1 class="post-title"><i class="fa fa-<?php echo $page_icon ?> fa-1x hidden-xs"></i> <?php echo $page_title; ?> <i class="fa fa-<?php echo $page_icon ?> fa-1x hidden-xs"></i></h1>
                <hr class="star-primary" style="margin: 50px auto;">
                
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
                </style>
                <p><?php echo $page_intro; ?></p>
                <form onsubmit="return false;">
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
                                <button class="btn btn-light less-padding uncheck-all">
                                    Uncheck All <i class="fa fa-square-o"></i>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content small row">	<!-- Tab Content -->
                            <div class="tab-pane active" id="essential">
                                <?php 
                                foreach($essential_records as $record) {
                                ?>
                                <div class="col-md-4 col-sm-4">
                                    <button class="btn btn-light btn-lg categoryToggle<?php echo $record; ?>" onclick="ajaxLoadPackingCategory('<?php echo $record; ?>');"><i class="fa fa-square-o"></i> <?php echo $record; ?></button>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane" id="good-to-have">
                                <?php 
                                foreach($good_to_have_records as $record) {
                                ?>
                                <div class="col-md-4 col-sm-4">
                                    <button class="btn btn-light btn-lg categoryToggle<?php echo $record; ?>" onclick="ajaxLoadPackingCategory('<?php echo $record; ?>');"><i class="fa fa-square-o"></i> <?php echo $record; ?></button>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="tab-pane" id="depends">
                                <?php 
                                foreach($depends_records as $record) {
                                ?>
                                <div class="col-md-4 col-sm-4">
                                    <button class="btn btn-light btn-lg categoryToggle<?php echo $record; ?>" onclick="ajaxLoadPackingCategory('<?php echo $record; ?>');"><i class="fa fa-square-o"></i> <?php echo $record; ?></button>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="tab-pane" id="showall">

                            </div>
                        </div>
                        <div class="row table-responsive" style="margin-top: 25px;">
                            <table class="table-striped table-hover" style="width: 100%;">
                                <style>
                                    .category-added td {
                                            line-height: 200%;
                                    }
                                </style>
                                <tbody id="packing-list-container"></tbody>
                            </table>
                        </div>
                        <button style="margin: 20px 5px; cursor: not-allowed;" type="submit" class="btn btn-default pull-right row disabled" onclick=""><i class="fa fa-download"></i> Export</button>
                    </div>
                </form>
            </div>
        </article>
        <hr>
    </div>
<?php get_footer(); ?>
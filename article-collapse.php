<?php
/**
 * Template Name: Article-Collapse
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
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="icon icon-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="icon icon-times"></i></a>
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
                <a href="<?php echo get_page_link($page -> ID); ?>" onclick= $("#menu-close").click(); ><i class="icon icon-<?php echo get_post_meta($page -> ID, "Thumbnail", true) ?>"></i>&nbsp;&nbsp;<?php echo $page -> post_title; ?></a>
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
    
    // Check if list is ordered or unordered
    $order = false;
    if(is_numeric($page_content[0])) {
        $order = true;
    }
    
    ?>
    
    <div class="container" style="padding-top: 100px;" >
        <article class="row">
            <div class="col-lg-8 centered">
                <h1 class="post-title"><i class="icon icon-<?php echo $page_icon ?> hidden-xs"></i> <?php echo $page_title; ?> <i class="icon icon-<?php echo $page_icon ?> hidden-xs"></i></h1>
                <hr class="star-primary" style="margin: 50px auto;">
                
                <style>.post-title{text-transform:uppercase;font-family:Source Sans Pro,"Helvetica Neue",Helvetica,Arial,sans-serif;font-weight:700;text-align:center;color:#2C3E50;font-size:3.5em}h1.post-title i{font-size:.9em}</style>
                <p><?php echo $page_intro; ?></p>
                <div class="table-responsive">
                    <table class="table table-striped">
                    <?php
                    // Retrieve page content here
                    $factors = array_slice(explode("~", $page_content), 1);
                    $count = 1;
                    foreach( $factors as $factor ) {
                        if($order) {
                            $factor = substr($factor, 0, -1);
                        }
                        $factorarr = explode("^", $factor);
                        $factor_header = $factorarr[0];

                        // if factor has empty set, don't print panel
                        if( count($factorarr) < 2 ) :
                    ?>
                        <tr>
                            <td><?php echo $factor_header; ?></td>
                        </tr>
                        <tr></tr>
                    <?php 
                    // if factor has valid panel, output
                    else : ?>
                        <tr id="toggle<?php echo $count; ?>" class="toggleRow" onclick="triggerToggle('<?php echo $count;?>');">
                        <?php 
                        // Is the list ordered or unordered?
                        if( $order ) : 
                        ?>
                        <td><?php echo $count.'. '.$factor_header;?><i style="line-height: 150%;" class="icon icon-caret-right pull-right rotate"></i></td>
                        <?php else : ?>
                        <td><?php echo $factor_header;?><i style="line-height: 150%;" class="icon icon-caret-right pull-right rotate"></i></td>
                        <?php endif; ?>
                        </tr>
                        <tr>
                            <td id="panel<?php echo $count;?>" class="collapse-panel">
                                <ul>
                                <?php foreach( array_slice($factorarr, 1) as $subfactor ) { ?>
                                    <li><?php echo $subfactor; ?></li>
                                <?php } ?>
                                </ul>
                            </td>
                        </tr>
                    <?php
                    endif;			
                    $count++;
                    }
                        ?>
                    </table>
                    <style>.collapse-panel{font-size:18px}.collapse-panel li{line-height:200%}.toggleRow:hover{cursor:pointer}</style>
                </div>
                <button id="show-all-button" class="btn btn-default pull-right toggle-btn"><i class="icon icon-eye"></i> Show All</button>
                <button id="hide-all-button" class="btn btn-default pull-right toggle-btn"><i class="icon icon-eye-slash"></i> Hide All</button>
            </div>
        </article>
        <hr>
    </div>
<?php get_footer(); ?>
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
				<div>
					<ul>	<!-- Tab Navigation -->
						<li class="active"><a href="#essential" data-toggle="tab">Essential</a><br>Must bring</li>
						<li class="active"><a href="#good-to-have" data-toggle="tab">Good to have</a><br>Bring if you find it sensible or if your host city is ridiculously expensive</li>
						<li class="active"><a href="#depends" data-toggle="tab">Depends</a><br>Important for <em>some</em> cities</li>
						<li class="active"><a href="#showall" data-toggle="tab">Show All</a></li>
					</ul>
					
					<div>	<!-- Tab Content -->
						<div class="tab-pane active" id="essential">
							<p><a onclick="#"><i class="fa fa-aquare-o"></i> Clothing</a></p>
							<p><a><i class="fa fa-aquare-o"></i> School</a></p>
						</div>
						<div class="tab-pane" id="good-to-have">
						
						</div>
						<div class="tab-pane" id="depends">
						
						</div>
						<div class="tab-pane" id="showall">
						
						</div>
					</div>
				</div>
                <button class="btn btn-default pull-right" onclick="#"><i class="fa fa-download"></i> Export</button>
            </div>
        </article>
    </div>
<?php get_footer(); ?>
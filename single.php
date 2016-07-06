<?php
/**
 * The template for displaying all single posts
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
            <a href="<?php echo home_url(); ?>/#travel"  onclick = $("#menu-close").click(); ><i class="icon icon-long-arrow-left"></i>&nbsp;&nbsp;Home</a>
        </li>
        <?php 
        $post_sel_array = array (
            'posts_per_page'    => -1,
            'fields'            => 'ids',
            'orderby'           => 'title',
            'order'             => 'ASC'
        );
        $posts_arr = get_posts( $post_sel_array );

        foreach( $posts_arr as $postid ) {
        ?>
            <li><a href="<?php echo get_post_permalink( $postid ); ?>" onclick = $("#menu-close").click(); ><?php echo get_the_title( $postid ); ?></a></li>
        <?php } ?>
    </ul>
</nav>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
        <?php /* Initialise post variables */ ?>
        <?php   
            $postid = get_the_ID(); 
            $post_content = get_post($postid) -> post_content;
            $thumbnail_key  = "Thumbnail";
            $subheading_key = "Subheading";
            $moneyscale_key = "Moneyscale";
            $food_key       = "Food";
            $accommodation_key = "Accommodation";
            $transport_key  = "Transport";
            $banner_key     = "Banner photo";
            $introduction   = "Introduction";   
            $VAT_key        = "VAT";
            $water_key      = "Water";
            $photo_location = "Photo location";

            // Save moneyscale value into variable $moneyscale
            $moneyscale = get_post_meta($postid, $moneyscale_key, true);

            // Save VAT values in variable $vat_values
            $vat_values = explode("|", get_post_meta($postid, $VAT_key, true));

            // Save potable boolean in variable $water_boo
            $water = get_post_meta($postid, $water_key, true);
            if($water == "false") {
                $water_boo = false;
            } else {
                $water_boo = true;
            }
        ?>

        <!-- Page Header -->
        <!-- Set background image on the line below. -->
        <header class="intro-header" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('<?php echo get_post_meta($postid, $banner_key, true);?>') no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover; position: relative;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="post-heading">
                            <h1 itemprop="name"><?php echo get_the_title( $postid ); ?></h1>
                            <?php 
                            $subheader = get_post_meta($postid, $subheading_key, true);
                            if(strcmp($subheader, "I amsterdam") == 0) : ?>
                            <h2 class="subheading" itemprop="headline"><span style="color: red;">I am</span>sterdam</h2>
                            <?php else : ?>
                            <h2 class="subheading" itemprop="headline"><?php echo get_post_meta($postid, $subheading_key, true) ; ?></h2>
                            <?php endif; ?>
                            <span class="meta">Last modified on <?php echo the_modified_date() ;?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-photo-location hidden-xs" itemprop="contentLocation">
                <p><em><strong><?php echo get_post_meta($postid, $photo_location, true) ; ?></strong></em></p>
            </div>
            <style>.post-photo-location{position:absolute;bottom:0;right:2.5%;color:#FFF}</style>
        </header>

        <!-- Post Content -->
        <article id="top" itemprop="articleBody">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 centered">
                        <span itemprop="description"><p class="first-character"><?php echo get_post_meta($postid, $introduction, true) ?></p></span>

                        <div>    <!-- Nav tabs -->
                            <ul class="nav nav-tabs small" role="tablist">
                                <li role="presentation" class="active"><a href="#activity" aria-controls="activity" role="tab" data-toggle="tab">Activity</a></li>
                                <li role="presentation"><a href="#food" aria-controls="food" role="tab" data-toggle="tab">Food</a></li>
                                <li role="presentation"><a href="#accommodation" aria-controls="accommodation" role="tab" data-toggle="tab">Accommodation</a></li>
                                <li role="presentation"><a href="#transport" aria-controls="transport" role="tab" data-toggle="tab">Transport</a></li>

                                <!-- All pull right elements are here -->
                                <li class="pull-right" style="line-height: 225%;">
                                <style>
/* Adjust the left/right padding of the fa icons in posts */
.less-padding{padding:6px 8px}
                                </style>
                                    <button class="btn btn-light less-padding btn-tooltip" data-toggle="tooltip" data-html="true" data-placement="top" title="<?php
                                    echo 'Min. Spending : ' . $vat_values[0];
                                    echo '</br>VAT Rate : ' . $vat_values[1];
                                    ?>"><i class="icon icon-shopping-cart icon-lg"></i></button>
                                    <button class="btn btn-light less-padding btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="<?php
                                        switch ($moneyscale) :
                                            case(1): 
                                                echo 'Cheaper than Singapore';
                                                break;
                                            case(2): 
                                                echo 'Similar to Singapore';
                                                break;
                                            case(3):
                                                echo 'Normal European city';
                                                break;
                                            case(4): 
                                                echo 'Wow, it\'s expensive';
                                                break;
                                        endswitch;
                                    ?>">
                                    <?php
                                        for ($i = 0; $i < $moneyscale; $i++) {
                                            echo '<i class="icon icon-usd"></i>';
                                        }
                                    ?>
                                    </button>
                                    <?php 
                                    if(!$water_boo) : ?>
                                    <button class="btn btn-light less-padding btn-tooltip" data-toggle="tooltip" data-placement="top" title="Tap water is not potable">
                                        <span class="icon-stack">
                                            <i class="icon icon-tint icon-stack-1x"></i>
                                            <i class="icon icon-ban icon-stack-2x text-danger"></i>
                                        </span>
                                    </button>    
                                    <?php else : ?>     
                                    <button class="btn btn-light less-padding btn-tooltip" data-toggle="tooltip" data-placement="top" title="Tap water is potable">
                                        <i class="icon icon-tint icon-lg"></i>
                                    </button>                       
                                    <?php endif; ?>
                                <button style="display: none;" id="map-trigger" class="btn btn-light less-padding btn-tooltip hidden-xs hidden-sm" data-toggle="modal" data-target="#map"><i class="icon icon-map-marker icon-lg"></i></button>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content small">

                                <!-- Activity Tab -->
                                <div role="tabpanel" class="tab-pane active" id="activity" itemprop="articleSection">
                                    <?php 
                                        // Initialise values
                                        $postarr = explode("|", $post_content);
                                        $numpostrow = count($postarr) / 4;
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border: 0;">
                                            <thead>
                                            <th>Name</th>
                                            <th>Tips</th>
                                            <th colspan="2">Cost</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            for($i=0; $i<$numpostrow; $i++) {   //Iterate through all Activities
                                                echo "<tr>";
                                                for($j=0; $j<2; $j++) {         // For loop dealing with Name and Tips column
                                                    if(determineRowSpanValueDriver($i*4+$j, $postarr, 4) >= 1) {       // Function that prints rowspan when necessary
                                                        echo '<td rowspan="'.determineRowSpanValueDriver($i*4+$j, $postarr, 4)."\">". $postarr[$i*4+$j] ."</td>";
                                                    }
                                                }

                                                // If statement to capture Cost and external link
                                                if(determineRowSpanValueDriver($i*4+2, $postarr, 4) >= 1) {

                                                    // Next two lines prints Cost
                                                    echo '<td style="border-right-style: none; " rowspan="'.determineRowSpanValueDriver($i*4+2, $postarr, 4)."\">";
                                                    echo $postarr[$i*4+2].'</td>';

                                                    // If statement used to determine if external link is required
                                                    echo "<td rowspan=\"".determineRowSpanValueDriver($i*4+$j, $postarr, 4)."\" style=\"border-left-style: none; \">";
                                                    if(!empty($postarr[$i*4+3])) {
                                                        echo "<a href=\"".$postarr[$i*4+3]."\" target=\"_blank\" >";
                                                        echo '<i class="icon icon-external-link pull-right" style="line-height: 150%;"></i></a>';
                                                    }
                                                    echo '</td>';
                                                }
                                                echo '</tr>';
                                            }

                                        ?>
                                        </tbody>
                                        </table>
                                    </div>

                                </div>

                                <!-- Food Tab -->
                                <div role="tabpanel" class="tab-pane" id="food" itemprop="articleSection">
                                    <?php 
                                        // Initialise values
                                        $foodstring = get_post_meta($postid, $food_key, true);

                                        $foodarr = explode("|", $foodstring);
                                        $numfoodrow = count($foodarr) / 4;
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th>Name</th>
                                                <th>Tips</th>
                                                <th colspan="2">Cost</th>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if(empty($foodarr)) {
                                                for($i=0; $i<$numfoodrow; $i++) {
                                                ?>
                                                <tr>
                                                <?php
                                                    for($j=0; $j<3; $j++) {
                                                ?>
                                                    <td><?php echo $foodarr[$i*4+$j];?></td>
                                                <?php
                                                    }
                                                ?>
                                                    <td>
                                                    <?php 
                                                    if(!empty($foodarr[$i*4+3]) && (strpos($foodarr[$i*4+3], 'tripadvisor') === false)) {
                                                        echo "<a href=\"". $foodarr[$i*4+3]."\" target=\"_blank\">";?>
                                                        <i class="icon icon-external-link pull-right" style="line-height: 150%"></i>
                                                        <?php echo "</a>";
                                                    }
                                                    ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            } else {
                                            ?>
                                            <tr>
                                                <td colspan="4" class="text-center"><em>Either nothing really worth raving about or I've forgotten where I had my meals and Google doesn't have it as well.</em></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Accommodation Tab -->
                                <div role="tabpanel" class="tab-pane" id="accommodation" itemprop="articleSection">
                                    <?php 
                                        $accommodationstring = get_post_meta($postid, $accommodation_key, true);

                                        $accommodationarr = explode("|", $accommodationstring);
                                        $numaccommodationrow = count($accommodationarr) / 3;
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th>Type</th>
                                                <th colspan="2">Location / Review</th>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            for($i=0; $i<$numaccommodationrow; $i++) {   //Iterate through all rows
                                                echo "<tr>";
                                                for($j=0; $j<2; $j++) {         // For loop dealing with Type and Location column
                                                    if(determineRowSpanValueDriver($i*3+$j, $accommodationarr, 3) >= 1) {       // Function that prints rowspan when necessary
                                                        echo '<td rowspan="'.determineRowSpanValueDriver($i*3+$j, $accommodationarr, 3)."\">". $accommodationarr[$i*3+$j] ."</td>";
                                                    }
                                                }

                                                // Don't need to check rowspan value. Only question is whether there's a link or not
                                                echo "<td>";
                                                if(!empty($accommodationarr[$i*3+2])) {
                                                    echo "<a href=\"".$accommodationarr[$i*3+2]."\" target=\"_blank\" >";
                                                    echo '<i class="icon icon-external-link pull-right" style="line-height: 150%;"></i></a>';
                                                }
                                                echo '</td>';
                                                echo '</tr>';
                                            }

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Transport Tab -->
                                <div role="tabpanel" class="tab-pane" id="transport" itemprop="articleSection">
                                    <?php 
                                        $transportstring = get_post_meta($postid, $transport_key, true);

                                        $transportarr = explode("|", $transportstring);
                                        $numtransportrow = count($transportarr) / 4;
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th>Commute</th>
                                                <th>Tips</th>
                                                <th colspan="2">Cost</th>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                for($i=0; $i<$numtransportrow; $i++) {   //Iterate through all rows
                                                    echo "<tr>";
                                                    for($j=0; $j<2; $j++) {         // For loop dealing with Name and Tips column
                                                        if(determineRowSpanValueDriver($i*4+$j, $transportarr, 4) >= 1) {       // Function that prints rowspan when necessary
                                                            echo '<td rowspan="'.determineRowSpanValueDriver($i*4+$j, $transportarr, 4)."\">". $transportarr[$i*4+$j] ."</td>";
                                                        }
                                                    }

                                                    // If statement to capture Cost and external link
                                                    if(determineRowSpanValueDriver($i*4+2, $transportarr, 4) >= 1) {

                                                        // Next two lines prints Cost
                                                        echo '<td rowspan="'.determineRowSpanValueDriver($i*4+2, $transportarr, 4)."\">";
                                                        echo $transportarr[$i*4+2].'</td>';

                                                        // If statement used to determine if external link is required
                                                        echo "<td rowspan=\"".determineRowSpanValueDriver($i*4+$j, $transportarr, 4)."\">";
                                                        if(!empty($transportarr[$i*4+3])) {
                                                            echo "<a href=\"".$transportarr[$i*4+3]."\" target=\"_blank\" >";
                                                            echo '<i class="icon icon-external-link pull-right" style="line-height: 150%;"></i></a>';
                                                        }
                                                        echo '</td>';
                                                    }
                                                    echo '</tr>';
                                                }

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </article>
        <hr>

        <meta itemprop="url" content="<?php echo get_permalink(); ?>" />
        <meta itemprop="image" content="<?php echo get_post_meta($postid, $banner_key, true); ?>" />
        <meta itemprop="datePublished" content="<?php echo the_modified_date("F j, Y") ?>" />

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="map">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo get_the_title(); ?></h4>
            </div>
            <div class="modal-body" style="width: 100%;">
                <div class="align-center"><i class="icon icon-refresh icon-spin icon-5x"></i></div>
                <div id="map-canvas" style="height: 500px; display: block;"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<?php
function determineRowSpanValueDriver($index, $arr, $num_column) {
    if(empty($arr[$index])) {
        return 0;
    }
    return determineRowSpanValue($index+$num_column, $arr, $num_column, 1);
}

function determineRowSpanValue($index, $arr, $num_column, $count) {
    if($index >= count($arr)) {
        return $count;
    }
    if(!empty($arr[$index])) {
        return $count;
    }
        
    return determineRowSpanValue($index+$num_column, $arr, $num_column, ++$count);
}

?>
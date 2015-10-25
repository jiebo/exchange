<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
    <div class="container">
        <div id="content" class="site-content align-center" role="main">
            <div class="col-sm-4 centered">
            <img src="<?php bloginfo('template_directory'); ?>/img/404.jpg" style="height: 400px; margin: 0 auto;" class="centered" />
            </div>
                <header class="page-header">
                    <h1 class="page-title">Are you sure you got the right place?</h1>
                </header>

                <div class="page-wrapper">
                    <div class="page-content">
                        <h2>What say we get you back before you get killed out there</h2>
                    </div><!-- .page-content -->
                </div><!-- .page-wrapper -->

        </div><!-- #content -->
    </div><!-- #primary -->
     
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    window.location.replace("<?php echo get_home_url(); ?>");
                }, 6000);
            })
        </script> 
    </body>
</html>
    
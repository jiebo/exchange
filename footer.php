<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 text-center">
                        <h4><strong>Ti Jie Bo</strong>
                        </h4>
                        <p>School of Computing<br>13 Computing Drive, 117417</p>
                        <br>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/jiebo.ti" target="_blank"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/pub/jie-bo-ti/66/657/a72" target="_blank"><i class="fa fa-linkedin fa-fw fa-3x"></i></a>
                            </li>
                            <li>
                                <a href="mailto:jiebo@u.nus.edu" target="_blank"><i class="fa fa-envelope fa-fw fa-3x"></i></a>
                            </li>
                        </ul>
                        <hr class="small">
                        <p class="text-muted">Copyright &copy; 2015</p>
                    </div>
                </div>
            </div>
        </footer>


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <?php if(is_home()) : ?>
        <!-- HighCharts component -->
        <script src="http://code.highcharts.com/highcharts.js" charset="utf-8"></script>
        <script src="http://code.highcharts.com/modules/drilldown.js"></script>
        
        <!-- Javascript for Owl Carousel -->
        <script src="<?php bloginfo('template_directory'); ?>/owl-carousel/owl.carousel.min.js"></script>
        
        <!-- Javascript file for Exchange Expense Chart -->
        <script src="<?php bloginfo('template_directory'); ?>/exchange-expense-chart.php" type="text/javascript"></script>
        <?php endif; ?>
        
        <!-- Custom Theme JavaScript -->
        <script>
        // Closes the sidebar menu
        $("#menu-close").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });

        // Opens the sidebar menu
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
        
        // Tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })
                
        
        // If statement that will only output pagescroll if in index page
        <?php
        if(is_home()) {
            echo "$(function() {\n";
            echo "\t    $('a[href*=#]:not([href=#])').click(function() {\n";
            echo        "\t\tif (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {\n";
            echo            "\t\t\tvar target = $(this.hash);\n";
            echo            "\t\t\ttarget = target.length ? target : $('[name=' + this.hash.slice(1) + ']');\n";
            echo            "\t\t\tif (target.length) {\n";
            echo                "\t\t\t\t$('html,body').animate({\n";
            echo                    "\t\t\t\t\tscrollTop: target.offset().top\n";
            echo                "\t\t\t\t}, 1000);\n";
            echo                "\t\t\t\treturn false;\n";
            echo            "\t\t\t}\n";
            echo        "\t\t}\n";
            echo    "\t});\n";
            echo "});";
            
        }
        ?>
        </script>
        
        <!-- All ajax scripts are here -->
        <script language="javascript" type="text/javascript">
          
        // On Document Ready, hide ajax loading div & load swipe action
        $(document).ready(
            function() {
                $("#swipe-div").owlCarousel({
                    items: 1,
                    itemsDesktop: [1199, 1],
                    itemsDesktopSmall: [979, 1],
                    itemsTablet: [768, 1],
                    itemsMobile: [479, 1],
                    dots: true
                });
                $("#ajax-loading").hide();
        });
            
        // Script for ajax loading of City Guide thumbnails
        function ajaxLoadMore() {
        try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
        } catch (e){
            // Internet Explorer Browsers
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        ajaxRequest.onreadystatechange = function () {
            if(ajaxRequest.readyState == 4) {
                var ajaxDisplay = document.getElementById('ajax-city-display');
                $("#ajax-button").fadeOut(300);
                $("#ajax-city-display").fadeOut('', function() {
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                    $("#ajax-city-display").fadeIn();
                })
            }
        }    
        ajaxRequest.open("GET", "<?php bloginfo('template_directory'); ?>/ajax-load-more.php", true);
        ajaxRequest.send(null);
        } ;       
        
        // Script for ajax loading of city expense
        function ajaxLoadCityExpense(cityName) {
        try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
        } catch (e){
            // Internet Explorer Browsers
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        ajaxRequest.onreadystatechange = function () {
        $("#ajax-loading").show();
        if(ajaxRequest.readyState == 4) {
                var ajaxDisplay = document.getElementById('ajax-expense-display');
                $("#ajax-expense-display").fadeOut(200, function() {
                    ajaxDisplay.innerHTML = ajaxRequest.responseText; 
                    $("#ajax-expense-display").fadeIn('slow');
    })
                
                $("#ajax-expense-default").hide();
                $("#ajax-loading").fadeOut('slow');
            }
        }    
        ajaxRequest.open("GET", "<?php bloginfo('template_directory'); ?>/ajax-load-expense.php?q="+cityName, true);
        ajaxRequest.send(null);
        } ;
        </script>
        
        
	<?php wp_footer(); ?>
</body>
</html>
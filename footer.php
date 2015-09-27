<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage exchange
 * @since exchange 1.0
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
        <script src="http://code.highcharts.com/modules/drilldown.js" defer></script>
        
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
        if(is_home()) :
        ?>
            $(function() {
                $('a[href*=#]:not([href=#])').click(function() {
                    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        if (target.length) {
                            $('html,body').animate({
                                scrollTop: target.offset().top
                            }, 1000);
                            return false;
                        }
                    }
                });
            });
            
        <?php
            endif;
        ?>
        </script>
        
        <!-- All ajax index.php scripts are here -->
        <?php 
        if(is_home()) : ?>
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
        <?php endif; ?>
        
        <!-- Scripts for pages -->
        <?php if(is_page()) : ?>
        <script>
        $(document).ready(function() {
            $(".collapse-panel").hide();
            $("#hide-all-button").hide();
            $("#panel1").slideDown('slow');
            $("#toggle1 i").toggleClass("fa-caret-right").toggleClass("fa-caret-down");
            var $essential_div = $("#essential").clone();
            var $depends_div = $("#depends").clone();
            var $good_to_have_div = $("#good-to-have").clone();
            $("#showall").html($essential_div).append($good_to_have_div).append($depends_div);
            ajaxLoadPackingCategory("Day-to-day");
        })
		
		
        // Scripts for article-collapse
        function triggerToggle(toggleIndex) {
            panelID = "#panel" + toggleIndex;
            $(panelID).toggle('fast');
            toggleID = "#toggle" + toggleIndex + " i";
            $(toggleID).toggleClass("fa-caret-right").toggleClass("fa-caret-down");
        }
        $("#show-all-button").click( function showAll() {
            $(".collapse-panel").show();
            $(".toggle-btn").toggle();
            var elements = document.getElementsByClassName("rotate");
            var i;
            for(i=0; i<elements.length; i++) {
                if(elements[i].classList.contains("fa-caret-right")) {
                    toggleID = "#toggle" + (i+1) + " i";
                    $(toggleID).toggleClass("fa-caret-right").toggleClass("fa-caret-down");
                }
            }
        })
        $("#hide-all-button").click( function hideAll() {
            $(".collapse-panel").hide();
            $(".toggle-btn").toggle();
            var elements = document.getElementsByClassName("rotate");
            var i;
            for(i=0; i<elements.length; i++) {
                if(elements[i].classList.contains("fa-caret-down")) {
                    toggleID = "#toggle" + (i+1) + " i";
                    $(toggleID).toggleClass("fa-caret-right").toggleClass("fa-caret-down");
                }
            }
        })
		
        // Scripts for article-tabs
        function ajaxLoadPackingCategory(categoryName) {
            var categoryElement = document.getElementById(categoryName);
            if(categoryElement !== null) {
                id = "#" + categoryName;
                $(id).remove();
                toggleCheckBox(categoryName);
                return;
            }
            $(document).ajaxStart(function() {
                $(document.body).css({'cursor': 'wait'})
                $("button").css({'cursor': 'wait'})
            });
            $(document).ajaxComplete(function() {
                $(document.body).css({'cursor': 'default'})
                $("button").css({'cursor': 'pointer'})
            });
            $.ajax({
                url: "<?php bloginfo('template_directory'); ?>/ajax-load-packing-list.php",
                type: "GET",
                data: { "Category": categoryName },
                dataType: "html"
            })
                    .done (function(html) {
                        $("#packing-list-container").hide();
                        $("#packing-list-container").prepend(html);
                        $("#packing-list-container").slideDown("slow");
                        toggleCheckBox(categoryName);
                    })
                    .fail (function() {
                        alert ("error");
                
                    })
        }
        function toggleCheckBox(id) {
            id= ".categoryToggle" + id + " i";
            $(id).toggleClass("fa-square-o");
            $(id).toggleClass("fa-check-square-o");
        }
        $(".uncheck-all").click(function() {
            var elements = document.getElementsByClassName("category-added");
            var i;
            for(i=0; i<elements.length; console.log(i), i++) {
                var id = elements[i].id;
                toggleCheckBox(id);
            }
            $(".category-added").remove();
        })
        </script>
        <?php endif; ?>
        
	<?php wp_footer(); ?>
</body>
</html>
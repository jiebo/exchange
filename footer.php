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
            <div class="container" id="contact">
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

        <!-- Bootstrap Core JavaScript -->
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
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
        
        <!-- JavaScript -->
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
            $('[data-toggle="tooltip"]').tooltip();
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
                            }, 750);
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
            $("#ajax-button").click(function() {
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
            }) ;       

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

                    $("#ajax-loading").fadeOut('slow');
                }
            }    
            ajaxRequest.open("GET", "<?php bloginfo('template_directory'); ?>/ajax-load-expense.php?q="+cityName, true);
            ajaxRequest.send(null);
            } ;
            </script>
        <?php endif; ?>
        
        <?php if(is_page() && is_page_template('article-collapse.php')): ?>
            <!-- Scripts for article-collapse -->
            <script>
            $(document).ready(function() {
                $(".collapse-panel").hide();
                $("#hide-all-button").hide();
                $("#panel1").slideDown('slow');
                $("#toggle1 i").toggleClass("fa-caret-right").toggleClass("fa-caret-down");
            })
            function triggerToggle(toggleIndex) {
                $("#panel" + toggleIndex).toggle('fast');
                $("#toggle" + toggleIndex + " i").toggleClass("fa-caret-right").toggleClass("fa-caret-down");
            }
            $("#show-all-button").click( function showAll() {
                $(".collapse-panel").show();
                $(".toggle-btn").toggle();
                var elements = document.getElementsByClassName("rotate");
                for(var i=0; i<elements.length; i++) {
                    if(elements[i].classList.contains("fa-caret-right")) {
                        $("#toggle" + (i+1) + " i").toggleClass("fa-caret-right").toggleClass("fa-caret-down");
                    }
                }
            })
            $("#hide-all-button").click( function hideAll() {
                $(".collapse-panel").hide();
                $(".toggle-btn").toggle();
                var elements = document.getElementsByClassName("rotate");
                for(var i=0; i<elements.length; i++) {
                    if(elements[i].classList.contains("fa-caret-down")) {
                        $("#toggle" + (i+1) + " i").toggleClass("fa-caret-right").toggleClass("fa-caret-down");
                    }
                }
            })
            </script>
        <?php endif; ?>
        
        <?php if(is_page() && is_page_template('article-tabs.php')): ?>
            <!-- Scripts for article-tabs -->
            <script>
            $(document).ready(function() {
                var $essential_div = $("#essential").clone();
                var $depends_div = $("#depends").clone();
                var $good_to_have_div = $("#good-to-have").clone();
                $("#showall").html($essential_div).append($good_to_have_div).append($depends_div);
                ajaxLoadPackingCategory("Day-to-day");
            })
            function ajaxLoadPackingCategory(categoryName) {
                var categoryElement = document.getElementById(categoryName);
                if(categoryElement !== null) {
                    $("#" + categoryName).remove();
                    toggleCheckBox(categoryName);
                    return;
                }
                $(document).ajaxStart(function() {
                    $(document.body).css({'cursor': 'wait'})
                    $(".nav-tabs button").css({'cursor': 'wait'})
                    $(".tab-content button").css({'cursor': 'wait'})
                });
                $.ajax({
                    url: "<?php bloginfo('template_directory'); ?>/ajax-load-packing-list.php",
                    type: "GET",
                    data: { "Category": categoryName },
                    dataType: "html"
                })
                        .done (function(html) {
                            $("#packing-list-container").prepend(html);
                            toggleCheckBox(categoryName);
                        })
                        .fail (function() {
                            alert ("error");

                        });
                $(document).ajaxComplete(function() {
                    $(document.body).css({'cursor': 'default'})
                    $(".nav-tabs button").css({'cursor': 'pointer'})
                    $(".tab-content button").css({'cursor': 'pointer'})
                });
            }
            function toggleCheckBox(id) {
                id= ".categoryToggle" + id + " i";
                $(id).toggleClass("fa-square-o");
                $(id).toggleClass("fa-check-square-o");
            }
            $(".uncheck-all").click(function() {
                var elements = document.getElementsByClassName("category-added");
                for(var i=0; i<elements.length; i++) {
                    toggleCheckBox(elements[i].id);
                }
                $(".category-added").remove();
            })

            </script>
        <?php endif; ?>
        
	<?php wp_footer(); ?>
</body>
</html>
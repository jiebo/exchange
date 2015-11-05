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
        <?php if(is_home()): ?>
        <footer>
            <div class="modal fade" id="contact-alert" data-backdrop="false">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p id="alert-message"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="contact">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-sm-10 centered col-xs-10">
                        <h2 class="text-center">Contact</h2>
                        <hr class="small">
                        <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                            <h3><strong>About Me</strong></h3>
                            <p style="line-height: 175%; padding-top: 1em;" class="text-muted">I am a Year 4 Computing student at NUS and I went for my Student Exchange in 2015 (Y3S2)
                                at Stockholm University.</p>
                            <p style="line-height: 175%;" class="text-muted">
                                So the whole point of creating this was to catalogue my memories so I wouldn't forget my experience and to 
                                <em>maybe</em> help whoever stumbled onto this place. </p>
                            <p class="text-muted"><br>Copyright &copy; 2015</p>
                        </div>
                        <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1">
                            <h3 class="row"><strong>Get in Touch</strong></h3>
                            <form action="<?php bloginfo('template_directory'); ?>/contact.php" class="form-horizontal" style="padding-top: 1em;" id="ajax-contact-footer" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 col-md-3 col-sm-2 col-xs-2 control-label hidden-xs">Name</label>
                                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-8">
                                        <div class="input-group">
                                            <input type="text" title="Name" class="form-control" id="contact-name">
                                            <span class="input-group-addon"><i class="fa fa-user text-primary"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-lg-3 col-md-3 col-sm-2 col-xs-2 control-label hidden-xs">Email</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input type="email" title="Email" class="form-control" id="contact-email" required>
                                            <span class="input-group-addon"><i class="fa fa-envelope text-primary"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required" style="position: relative;">
                                    <label class="col-lg-3 col-md-3 col-sm-2 col-xs-2 control-label hidden-xs">Message</label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                        <textarea type="text-area" title="Message" class="form-control" id="contact-msg" required></textarea>
                                    </div>
                                    <div class="visible-sm">
                                        <button class="btn btn-primary col-sm-offset-1" style="position: absolute; bottom: 0;">Send</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary hidden-sm">Send</button>
                                    </div>
                                </div>
                                <style>
                                    .form-group.required .control-label:after {
                                        content:"*";
                                        color:red;
                                    }
                                </style>
                            </form>
                        </div>
                        <div class="col-lg-5 col-md-5 visible-sm visible-xs">
                            <div style="padding: 10px 0;"></div>
                            <h3><strong>About Me</strong></h3>
                            <p style="line-height: 175%; padding-top: 1em;" class="text-muted">I am a Year 4 Computing student at NUS and I went for my Student Exchange in 2015 (Y3S2)
                                at Stockholm University.</p>
                            <p style="line-height: 175%;" class="text-muted">
                                So the whole point of creating this was to catalogue my memories so I wouldn't forget my experience and to 
                                <em>maybe</em> help whoever stumbled onto this place. </p>
                            <p class="text-muted"><br>Copyright &copy; 2015</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php else: ?>
        <footer>
            <div class="container" id="contact">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 text-center">
                        <p class="text-muted">EU-SEP.com<br>Copyright &copy; 2015</p>
                    </div>
                </div>
            </div>
        </footer>
        <?php endif; ?>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
<?php if(false) : ?>
        <script defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBLtzqmB9thtme1YsvAraa4XN4AyE9XdOU"></script>
        <script async defer src="<?php bloginfo('template_directory'); ?>/js/maps.js" type="text/javascript" ></script>
<?php endif; ?>   
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
    });

    // Make social-media-sidebar appear after scroll
    $(document).scroll(function() {
        var div = $("header").height();
        var win = $(window).scrollTop();
        if(div -75 < win) {
            $(".social-media-sidebar").fadeIn('fast');
        } else {
            $(".social-media-sidebar").fadeOut('fast');
        }
    });

    <?php
    // If statement that will only output pagescroll if in index page
    if(is_home()) :
    ?>
        $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') || location.hostname === this.hostname) {
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

    <?php endif; ?>
    </script>
    <!-- All ajax index.php scripts are here -->
    <?php 
    if(is_home()) : ?>
        <script language="javascript" type="text/javascript">
        // On Document Ready, hide ajax loading div & load swipe action
        $(document).ready( function() {
            $(".social-media-sidebar").hide('1');
            $("#swipe-div").owlCarousel({
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                itemsMobile: [479, 1],
                dots: true
            });
            $("#ajax-loading").hide();
            $("#ajax-load-sm").hide();
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
                if(ajaxRequest.readyState === 1) {
                    $("#ajax-button").hide();
                    $("#ajax-load-sm").fadeIn();
                }
                if(ajaxRequest.readyState === 4 && ajaxRequest.status === 200) {
                    var ajaxDisplay = document.getElementById('ajax-city-display');
                    $("#ajax-load-sm").fadeOut(300);
                    $("#ajax-city-display").fadeOut('', function() {
                        ajaxDisplay.innerHTML = ajaxRequest.responseText;
                        $("#ajax-city-display").fadeIn();
                    });
                }
                if(ajaxRequest.readyState === 4 && ajaxRequest.status === 404) {
                    $("#ajax-button").fadeIn();
                    $("#ajax-load-sm").hide();
                }
            };
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
            if(ajaxRequest.readyState === 4 && ajaxRequest.status === 200) {
                var ajaxDisplay = document.getElementById('ajax-expense-display');
                $("#ajax-expense-display").fadeOut(200, function() {
                    ajaxDisplay.innerHTML = ajaxRequest.responseText; 
                    $("#ajax-expense-display").fadeIn('slow');
                });

                $("#ajax-loading").fadeOut('slow');
            }
            if(ajaxRequest.readyState === 4 && ajaxRequest.status === 404) {
                $("#ajax-loading").fadeOut();
                displayContactAlert("Unable to process, please try again!")
            }
        };
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
            $(".social-media-sidebar").show();
            $("#panel1").slideDown('slow');
            $("#toggle1 i").toggleClass("fa-caret-right").toggleClass("fa-caret-down");
        });
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
        });
        $("#hide-all-button").click( function hideAll() {
            $(".collapse-panel").hide();
            $(".toggle-btn").toggle();
            var elements = document.getElementsByClassName("rotate");
            for(var i=0; i<elements.length; i++) {
                if(elements[i].classList.contains("fa-caret-down")) {
                    $("#toggle" + (i+1) + " i").toggleClass("fa-caret-right").toggleClass("fa-caret-down");
                }
            }
        });
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
            $(".social-media-sidebar").show();
        });
        function ajaxLoadPackingCategory(categoryName) {
            var categoryElement = document.getElementById(categoryName);
            if(categoryElement !== null) {
                $("#" + categoryName).remove();
                toggleCheckBox(categoryName);
                return;
            }
            $(document).ajaxStart(function() {
                $(document.body).css({'cursor': 'wait'});
                $(".nav-tabs button").css({'cursor': 'wait'});
                $(".tab-content button").css({'cursor': 'wait'});
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
                $(document.body).css({'cursor': 'default'});
                $(".nav-tabs button").css({'cursor': 'pointer'});
                $(".tab-content button").css({'cursor': 'pointer'});
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
        });

        </script>
    <?php endif; ?>

    <?php if(is_home()) : ?>
        <script>
        // Script for contact footer here
        $("#ajax-contact-footer").submit(function( event ) {
            event.preventDefault();

            // Retrieve all form inputs
            var name    = document.getElementById("contact-name").value;
            var email   = document.getElementById("contact-email").value;
            var msg     = document.getElementById("contact-msg").value;

            $.ajax({
                type: 'POST',
                url: '<?php bloginfo("template_directory"); ?>/contact.php',
                data: { "Name" : name, "Email" : email, "Message" : msg }
            })
            .done(function ( response ) {
                displayContactAlert(response);
                document.getElementById("ajax-contact-footer").reset();
})
            .fail(function ( response ) {
                displayContactAlert(response);
});
        });

        // Function governing contact alert
        function displayContactAlert(message) {
            $("#contact-alert").modal('show');
            $("body").removeClass("modal-open");
            $("body").css('padding-right', '');
            document.getElementById("alert-message").innerHTML = message;
            setTimeout(function() {
                $("#contact-alert").modal('hide');
            }, 3000);
        }

        // Change placeholder when screen resizes
        $(window).resize(function() {
            if($(window).width() < 751) {
                document.getElementById('contact-name').setAttribute('placeholder', 'Name');
                document.getElementById('contact-email').setAttribute('placeholder', 'Email');
                document.getElementById('contact-msg').setAttribute('placeholder', 'Message');
            } else {
                document.getElementById('contact-name').setAttribute('placeholder', '');
                document.getElementById('contact-email').setAttribute('placeholder', '');
                document.getElementById('contact-msg').setAttribute('placeholder', '');
            }

        });

        </script> 
    <?php endif; ?>
    <?php wp_footer(); ?>
</body>
</html>
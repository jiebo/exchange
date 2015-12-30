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
                    <p class="text-muted"><br>Copyright &copy; <?php echo date("Y"); ?></p>
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
                <p class="text-muted">EU-SEP.com<br>Copyright &copy; <?php echo date("Y"); ?></p>
            </div>
        </div>
    </div>
</footer>
<?php endif; ?>

<!-- Bootstrap Core JavaScript -->
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/bootstrap/3.3.5/bootstrap.min.js"></script>
        
<?php if(is_single()) : ?>
    <script defer src="https://maps.googleapis.com/maps/api/js?sensor=true&v=3"></script>
    <script async defer src="<?php bloginfo('template_directory'); ?>/js/maps.min.js" type="text/javascript" ></script>  
<?php elseif(is_home()) : ?>
    <script>
        var loadCity = "<?php bloginfo('template_directory'); ?>/ajax-load-more.php";
        var loadExpense = "<?php bloginfo('template_directory'); ?>/ajax-load-expense.php";
        var sendMsg  = "<?php bloginfo("template_directory"); ?>/contact.php";
    </script>
    <!-- Javascript for Owl Carousel -->
    <script defer src="<?php bloginfo('template_directory'); ?>/owl-carousel/owl.carousel.min.js"></script>
    <!-- HighCharts component -->
    <script defer src="<?php bloginfo('template_directory'); ?>/highcharts/highcharts.js" charset="utf-8"></script>

    <script src="<?php bloginfo('template_directory'); ?>/exchange-expense-chart.php" type="text/javascript"></script>
    <script defer src="<?php bloginfo('template_directory'); ?>/js/home.min.js" type="text/javascript"></script>
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
    </script>
<?php if(is_page_template('article-collapse.php')): ?>
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
<?php elseif(is_page_template('article-tabs.php')): ?>
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
<?php  elseif(is_single()) : ?>
    <script>
    var locations;
    $(document).ready(function() {
      $.ajax({
          method: 'GET',
          contentType: 'application/json',
          url: '<?php bloginfo("template_directory"); ?>/ajax-markers.php',
          dataType: 'json',
          data: {'Name': '<?php echo get_the_ID(); ?>'}
      })
      .done(function( markers ) {
          locations = markers;
          $("#map-trigger").show(0);
      })
      .fail(function() {
          $("#map-trigger").hide();
      })

    })
    $(window).resize(function() {
    var list, i;
    if($(window).width() < 751) {
        list = document.getElementsByClassName('btn-tooltip');
        for( i=0; i<list.length; i++ ) 
            list[i].setAttribute('data-trigger', 'click');
    } else {
        list = document.getElementsByClassName('btn-tooltip');
        for( i=0; i<list.length; i++ ) 
            list[i].setAttribute('data-trigger', 'hover');
    }
});
    </script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
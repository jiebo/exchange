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
                    <p style="line-height: 175%; padding-top: 1em;" class="text-muted">I am a Year 4 Computing student at NUS (<a href="http://comp.nus.edu.sg/~jiebo"><em>my NUS page</em></a>) and I went for my Student Exchange in 2015
                        at Stockholm University.</p>
                    <p style="line-height: 175%;" class="text-muted">
                        So the whole point of creating this was to catalogue my memories so I wouldn't forget my experience and to 
                        <em>maybe</em> help whoever stumbled onto this place. </p>
                    <p class="text-muted"><br>Copyright &copy; <?php echo date("Y"); ?></p>
                </div>
                <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1">
                    <h3 class="row"><strong>Get in Touch</strong></h3>
                    <form action="<?php bloginfo('template_directory'); ?>/contact.php" class="form-horizontal" style="padding-top: 1em;" id="ajax-contact-footer" method="POST">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-3 col-sm-2 col-xs-2 control-label hidden-xs">Name</label>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="input-group">
                                    <input type="text" title="Name" class="form-control" id="contact-name">
                                    <span class="input-group-addon"><i class="icon icon-user text-primary" style="width: 14px;"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-lg-3 col-md-3 col-sm-2 col-xs-2 control-label hidden-xs">Email</label>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="input-group">
                                    <input type="email" title="Email" class="form-control" id="contact-email" required>
                                    <span class="input-group-addon"><i class="icon icon-envelope text-primary"></i></span>
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
                        <style>.form-group.required .control-label:after{content:"*";color:red}</style>
                    </form>
                </div>
                <div class="col-lg-5 col-md-5 visible-sm visible-xs">
                    <div style="padding: 10px 0;"></div>
                    <h3><strong>About Me</strong></h3>
                    <p style="line-height: 175%; padding-top: 1em;" class="text-muted">I am a Year 4 Computing student at NUS (<a href="http://comp.nus.edu.sg/~jiebo"><em>my NUS page</em></a>) and I went for my Student Exchange in 2015
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
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.5/bootstrap.min.js" type="text/javascript"></script>
<script async defer src="https://use.fortawesome.com/e2810944.js" type='text/javascript'></script>
        
<?php if(is_single()) : ?>
<script defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBLtzqmB9thtme1YsvAraa4XN4AyE9XdOU"></script>
<script async defer src="<?php bloginfo('template_directory'); ?>/js/maps.min.js" type="text/javascript"></script>  
<?php elseif(is_home()) : ?>
<script>
    var loadCity = "<?php bloginfo('template_directory'); ?>/ajax-load-more.php";
    var loadExpense = "<?php bloginfo('template_directory'); ?>/ajax-load-expense.php";
    var sendMsg  = "<?php bloginfo("template_directory"); ?>/contact.php";
</script>
<script defer src="<?php bloginfo('template_directory'); ?>/js/home.min.js" type="text/javascript"></script>
<?php /*
<!-- HighCharts component -->
<script defer src="<?php bloginfo('template_directory'); ?>/highcharts/highcharts.js" charset="utf-8"></script>
<script defer async src="<?php bloginfo('template_directory'); ?>/js/exchange-expense-chart.js" type="text/javascript"></script>
*/?>
<?php endif; ?>

<!-- JavaScript -->
<script>
function fbshare(e){window.open(e,"_blank","width=630,height=530,toolbar=0,status=0")}$("#menu-close").click(function(e){e.preventDefault(),$("#sidebar-wrapper").toggleClass("active")}),$("#menu-toggle").click(function(e){e.preventDefault(),$("#sidebar-wrapper").toggleClass("active")}),$(function(){$('[data-toggle="tooltip"]').tooltip()});var boo=!0;$(document).scroll(function(){var e=$("header").height(),t=$(window).scrollTop(),a=$("#predeparture").height();t>e-75?$(".social-media-sidebar").fadeIn("fast"):$(".social-media-sidebar").fadeOut("fast"),t>a&&boo&&($("#ajax-button").trigger("click"),boo=!1)}),!function(e,t,a){var o,n=e.getElementsByTagName(t)[0],i=/^http:/.test(e.location)?"http":"https";e.getElementById(a)||(o=e.createElement(t),o.id=a,o.src=i+"://platform.twitter.com/widgets.js",n.parentNode.insertBefore(o,n))}(document,"script","twitter-wjs"),function(e,t,a,o,n,i,r){e.GoogleAnalyticsObject=n,e[n]=e[n]||function(){(e[n].q=e[n].q||[]).push(arguments)},e[n].l=1*new Date,i=t.createElement(a),r=t.getElementsByTagName(a)[0],i.async=1,i.src=o,r.parentNode.insertBefore(i,r)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-73574306-1","auto"),ga("require","linkid"),ga("send","pageview");
</script>
<?php /*
// Closes the sidebar menu
$("#menu-close").click(function(e){e.preventDefault(),$("#sidebar-wrapper").toggleClass("active")});

// Opens the sidebar menu
$("#menu-toggle").click(function(e){e.preventDefault(),$("#sidebar-wrapper").toggleClass("active")});

// Tooltip
$(function(){$('[data-toggle="tooltip"]').tooltip()});
    
// Make social-media-sidebar appear after scroll
var boo=!0;$(document).scroll(function(){var a=$("header").height(),e=$(window).scrollTop(),o=$("#predeparture").height();e>a-75?$(".social-media-sidebar").fadeIn("fast"):$(".social-media-sidebar").fadeOut("fast"),e>o&&boo&&($("#ajax-button").trigger("click"),boo=!1)});

// Initialise social media widgets
function fbshare(url) {
    window.open(url, "_blank", "width=630,height=530,toolbar=0,status=0");
}
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

// Google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-73574306-1', 'auto');
ga('require', 'linkid');
ga('send', 'pageview');
 */?>
<?php if(is_page_template('article-collapse.php')): ?>
<!-- Scripts for article-collapse -->
<script>
function triggerToggle(t){$("#panel"+t).toggle("fast"),$("#toggle"+t+" i").toggleClass("icon-caret-right").toggleClass("icon-caret-down")}$(document).ready(function(){$(".collapse-panel").hide(),$("#hide-all-button").hide(),$(".social-media-sidebar").show(),$("#panel1").slideDown("slow"),$("#toggle1 i").toggleClass("icon-caret-right").toggleClass("icon-caret-down")}),$("#show-all-button").click(function(){$(".collapse-panel").show(),$(".toggle-btn").toggle();for(var t=document.getElementsByClassName("rotate"),e=0;e<t.length;e++)t[e].classList.contains("icon-caret-right")&&$("#toggle"+(e+1)+" i").toggleClass("icon-caret-right").toggleClass("icon-caret-down")}),$("#hide-all-button").click(function(){$(".collapse-panel").hide(),$(".toggle-btn").toggle();for(var t=document.getElementsByClassName("rotate"),e=0;e<t.length;e++)t[e].classList.contains("icon-caret-down")&&$("#toggle"+(e+1)+" i").toggleClass("icon-caret-right").toggleClass("icon-caret-down")});
</script>
<?php /*
    $(document).ready(function() {
        $(".collapse-panel").hide();
        $("#hide-all-button").hide();
        $(".social-media-sidebar").show();
        $("#panel1").slideDown('slow');
        $("#toggle1 i").toggleClass("icon-caret-right").toggleClass("icon-caret-down");
    });
    function triggerToggle(toggleIndex) {
        $("#panel" + toggleIndex).toggle('fast');
        $("#toggle" + toggleIndex + " i").toggleClass("icon-caret-right").toggleClass("icon-caret-down");
    }
    $("#show-all-button").click( function showAll() {
        $(".collapse-panel").show();
        $(".toggle-btn").toggle();
        var elements = document.getElementsByClassName("rotate");
        for(var i=0; i<elements.length; i++) {
            if(elements[i].classList.contains("icon-caret-right")) {
                $("#toggle" + (i+1) + " i").toggleClass("icon-caret-right").toggleClass("icon-caret-down");
            }
        }
    });
    $("#hide-all-button").click( function hideAll() {
        $(".collapse-panel").hide();
        $(".toggle-btn").toggle();
        var elements = document.getElementsByClassName("rotate");
        for(var i=0; i<elements.length; i++) {
            if(elements[i].classList.contains("icon-caret-down")) {
                $("#toggle" + (i+1) + " i").toggleClass("icon-caret-right").toggleClass("icon-caret-down");
            }
        }
    });
*/ ?>
<?php elseif(is_page_template('article-tabs.php')): ?>
<script>function ajaxLoadPackingCategory(o){var e=document.getElementById(o);return null!==e?($("#"+o).remove(),void toggleCheckBox(o)):($(document).ajaxStart(function(){$(document.body).css({cursor:"wait"}),$(".nav-tabs button").css({cursor:"wait"}),$(".tab-content button").css({cursor:"wait"})}),$.ajax({url:"<?php bloginfo('template_directory'); ?>/ajax-load-packing-list.php",type:"GET",data:{Category:o},dataType:"html"}).done(function(e){$("#packing-list-container").prepend(e),toggleCheckBox(o)}).fail(function(){alert("error")}),void $(document).ajaxComplete(function(){$(document.body).css({cursor:"default"}),$(".nav-tabs button").css({cursor:"pointer"}),$(".tab-content button").css({cursor:"pointer"})}))}function toggleCheckBox(o){o=".categoryToggle"+o+" i",$(o).toggleClass("icon-square-o"),$(o).toggleClass("icon-check-square-o")}$(document).ready(function(){var o=$("#essential").clone(),e=$("#depends").clone(),t=$("#good-to-have").clone();$("#showall").html(o).append(t).append(e),ajaxLoadPackingCategory("Day-to-day"),$(".social-media-sidebar").show()}),$(".uncheck-all").click(function(){for(var o=document.getElementsByClassName("category-added"),e=0;e<o.length;e++)toggleCheckBox(o[e].id);$(".category-added").remove()});</script>
<?php /*
    <!-- Scripts for article-tabs -->
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
        $(id).toggleClass("icon-square-o");
        $(id).toggleClass("icon-check-square-o");
    }
    $(".uncheck-all").click(function() {
        var elements = document.getElementsByClassName("category-added");
        for(var i=0; i<elements.length; i++) {
            toggleCheckBox(elements[i].id);
        }
        $(".category-added").remove();
    });
*/ ?>
<?php  elseif(is_single()) : ?>
<script>var locations;$(document).ready(function(){$.ajax({method:"GET",contentType:"application/json",url:'<?php bloginfo("template_directory"); ?>/ajax-markers.php',dataType:"json",data:{Name:"<?php echo get_the_ID(); ?>"}}).done(function(t){locations=t,$("#map-trigger").show(0)}).fail(function(){$("#map-trigger").hide()})}),$(window).resize(function(){var t,e;if($(window).width()<751)for(t=document.getElementsByClassName("btn-tooltip"),e=0;e<t.length;e++)t[e].setAttribute("data-trigger","click");else for(t=document.getElementsByClassName("btn-tooltip"),e=0;e<t.length;e++)t[e].setAttribute("data-trigger","hover")});</script>
<?php /*
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
});*/
?>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
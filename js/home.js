// On Document Ready, hide ajax loading div & load swipe action
$(document).ready( function() {
    $(".social-media-sidebar").hide('1');
    $("#ajax-loading").hide();
    $("#ajax-load-sm").hide();
});

// Script for ajax loading of City Guide thumbnails
$("#ajax-button").click(function() {
    $("#ajax-button").hide();
    $("#ajax-load-sm").fadeIn();
    $.ajax({
        method: 'GET',
        url: loadCity
    })
            .done(function( html ) {
                $("#ajax-load-sm").fadeOut(300);
                $("#ajax-city-display").fadeOut('', function() {
                    document.getElementById('ajax-city-display').innerHTML = html;
                    $("#ajax-city-display").fadeIn();
                });
            })
            .fail(function() {
                $("#ajax-button").fadeIn();
                $("#ajax-load-sm").hide();
                displayContactAlert("Unable to process, please try again!");
            });

}) ;       

// Script for ajax loading of city expense
function ajaxLoadCityExpense(cityName) {
    $("#ajax-loading").show();
    $.ajax({
        method: 'GET',
        url: loadExpense,
        data: { "q" : cityName }
    })
            .done(function ( html ) {
                $("#ajax-expense-display").fadeOut(200, function() {
                    document.getElementById('ajax-expense-display').innerHTML = html; 
                    $("#ajax-expense-display").fadeIn('slow');
                });
                $("#ajax-loading").fadeOut('slow');
            })
            .fail(function() {
                $("#ajax-loading").fadeOut();
                displayContactAlert("Unable to process, please try again!");
            });

} ;

// Script for page navigation
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

// Script for contact footer here
$("#ajax-contact-footer").submit(function( event ) {
    event.preventDefault();

    // Retrieve all form inputs
    var name    = document.getElementById("contact-name").value;
    var email   = document.getElementById("contact-email").value;
    var msg     = document.getElementById("contact-msg").value;
    
    $.ajax({
        type: 'POST',
        url: sendMsg,
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
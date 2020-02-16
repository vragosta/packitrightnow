"use strict";

!function($) {
    var packitrightnow = {
        setupMenuToggle: function() {
            $(".drop-down").click(function() {
                $(this).fadeOut(), $("#mobile-menu").addClass("load");
            }), $(".fa-times").click(function() {
                $(".drop-down").fadeIn(), $("#mobile-menu").removeClass("load");
            });
        },
        productsToggle: function() {
            $("a[name=products]").click(function() {
                $(".sub-menu").hasClass("load") ? $(".sub-menu").removeClass("load") : $(".sub-menu").addClass("load");
            }), $(".dropdown").on("click", function() {
                $(".dropdown").hasClass("change-color") && ($(".dropdown").removeClass("change-color"), 
                $(".dropdown-toggle").removeClass("change-color")), $(this).find(".dropdown-toggle").hasClass("open") ? ($(this).find(".dropdown-toggle").removeClass("change-color"), 
                $(this).removeClass("change-color")) : ($(this).find(".dropdown-toggle").addClass("change-color"), 
                $(this).addClass("change-color"));
            }), $("html").on("click", function(e) {
                "dropdown-toggle change-color" !== e.srcElement.className && ($(".dropdown").removeClass("change-color"), 
                $(".dropdown-toggle").removeClass("change-color"));
            });
        },
        setCarouselSettings: function() {
            $(".carousel").slick({
                infinite: !0,
                slidesToShow: 1,
                autoplay: !0,
                autoplaySpeed: 3e3
            });
        },
        sendContactInformation: function() {
            $(".contact-btn").click(function() {
                var firstname = $("#firstname").val(), lastname = $("#lastname").val(), email = $("#email").val(), subject = $("#subject").val(), message = $("#message").val(), data = {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    subject: subject,
                    message: message
                };
                firstname && lastname && email && subject && message ? $.ajax({
                    url: PackItRightNow.options.apiUrl + "/contact/",
                    type: "post",
                    headers: {
                        "X-WP-Nonce": PackItRightNow.options.nonce
                    },
                    data: JSON.stringify(data),
                    dataType: "json"
                }).then(function(response) {
                    $(".error").find(".alert-danger").removeClass("alert-danger").addClass("alert-success"), 
                    $(".error").find("p").html("You message was successfully sent!"), $(".error").addClass("show-message");
                }) : $(".error").addClass("show-message");
            });
        },
        clickToExpand: function() {
            $("body").on("click", "h4[name=click-to-expand], h4[name=click-to-minimize]", function() {
                var $name = $(this).attr("name"), $assoc = $(this).attr("data-assoc");
                "click-to-expand" === $name ? ($(this).html('Click To Minimize <i class="fa fa-angle-double-up"></i>'), 
                $(this).attr("name", "click-to-minimize"), $(".content." + $assoc).show()) : ($(this).html('Click To Expand <i class="fa fa-angle-double-down"></i>'), 
                $(this).attr("name", "click-to-expand"), $(".content." + $assoc).hide());
            });
        },
        getParameterByName: function(name, url) {
            url || (url = window.location.href), name = name.replace(/[\[\]]/g, "\\$&");
            var results = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)").exec(url);
            return results ? results[2] ? decodeURIComponent(results[2].replace(/\+/g, " ")) : "" : null;
        },
        init: function() {
            this.setupMenuToggle(), this.productsToggle(), this.setCarouselSettings(), this.sendContactInformation(), 
            this.clickToExpand();
        }
    };
    jQuery(document).ready(function() {
        packitrightnow.init();
    });
}(jQuery);
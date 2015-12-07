/*! theme switcher by Christina Arasmo */

$(function() {

$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', 'assets/css/theme-switcher.min.css') );

// replace text
$.fn.replaceText = function(search, replace, text_only) {
    return this.each(function() {
        var v1, v2, rem = [];
        $(this).find("*").andSelf().contents().each(function() {
            if (this.nodeType === 3) {
                v1 = this.nodeValue;
                v2 = v1.replace(search, replace);
                if (v1 != v2) {
                    if (!text_only && /<.*>/.test(v2)) {
                        $(this).before(v2);
                        rem.push(this);
                    } else this.nodeValue = v2;
                }
            }
        });
        if (rem.length) $(rem).remove();
    });
};

function blueblue() {
    var img1OLDmm = 'assets/couple-images/the-couple-fpo.jpg';
    var img1NEWmm = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    $('img[src="' + img1OLDmm + '"]').attr('src', img1NEWmm);

    var img2OLDmm = 'assets/couple-images/individual-1-fpo.jpg';
    var img2NEWmm = 'assets/couple-images/partner-images/m-partner-individual-1.jpg';
    $('img[src="' + img2OLDmm + '"]').attr('src', img2NEWmm);

    var img3OLDmm = 'assets/couple-images/individual-2-fpo.jpg';
    var img3NEWmm = 'assets/couple-images/partner-images/m-partner-individual-2.jpg';
    $('img[src="' + img3OLDmm + '"]').attr('src', img3NEWmm);

    var img4OLDmm = 'assets/couple-images/gallery/thumbs/bride-and-groom.jpg';
    var img4NEWmm = 'assets/couple-images/partner-images/mm-gallery-thumb.jpg';
    $('img[src="' + img4OLDmm + '"]').attr('src', img4NEWmm);

    var img5OLDmm = 'assets/couple-images/gallery/bride-and-groom.jpg';
    var img5NEWmm = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    $('a[href="' + img5OLDmm + '"]').attr('href', img5NEWmm);

    var img6OLDmm = 'assets/couple-images/gallery/thumbs/persons.jpg';
    var img6NEWmm = 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    $('img[src="' + img6OLDmm + '"]').attr('src', img6NEWmm);

    var img7OLDmm = 'assets/couple-images/gallery/persons.jpg';
    var img7NEWmm = 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    $('a[href="' + img7OLDmm + '"]').attr('href', img7NEWmm);
    
    $("body.blue-blue").replaceText("Caitlyn", "Christopher");
    $("body.blue-blue").replaceText("Katherine", "Kyle");
    $("body.blue-blue").replaceText("Her", "Him");

}

function pinkpink() {
    var img1OLD = 'assets/couple-images/the-couple-fpo.jpg';
    var img1NEW = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    $('img[src="' + img1OLD + '"]').attr('src', img1NEW);

    var img2OLD = 'assets/couple-images/individual-1-fpo.jpg';
    var img2NEW = 'assets/couple-images/partner-images/w-partner-individual-1.jpg';
    $('img[src="' + img2OLD + '"]').attr('src', img2NEW);

    var img3OLD = 'assets/couple-images/individual-2-fpo.jpg';
    var img3NEW = 'assets/couple-images/partner-images/w-partner-individual-2.jpg';
    $('img[src="' + img3OLD + '"]').attr('src', img3NEW);

    var img4OLD = 'assets/couple-images/gallery/thumbs/bride-and-groom.jpg';
    var img4NEW = 'assets/couple-images/partner-images/ww-gallery-thumb.jpg';
    $('img[src="' + img4OLD + '"]').attr('src', img4NEW);

    var img5OLD = 'assets/couple-images/gallery/bride-and-groom.jpg';
    var img5NEW = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    $('a[href="' + img5OLD + '"]').attr('href', img5NEW);

    var img6OLD = 'assets/couple-images/gallery/thumbs/persons.jpg';
    var img6NEW = 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    $('img[src="' + img6OLD + '"]').attr('src', img6NEW);

    var img7OLD = 'assets/couple-images/gallery/persons.jpg';
    var img7NEW = 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    $('a[href="' + img7OLD + '"]').attr('href', img7NEW);
    
    $("body.pink-pink").replaceText("Kyle", "Katherine");
    $("body.pink-pink").replaceText("Christopher", "Caitlyn");
    $("body.pink-pink").replaceText("Him", "Her");
    
}


function resetBlue() {
    var img1OLD = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    var img1NEW = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    $('img[src="' + img1OLD + '"]').attr('src', img1NEW);

    var img2OLD = 'assets/couple-images/partner-images/w-partner-individual-1.jpg';
    var img2NEW = 'assets/couple-images/partner-images/m-partner-individual-1.jpg';
    $('img[src="' + img2OLD + '"]').attr('src', img2NEW);

    var img3OLD = 'assets/couple-images/partner-images/w-partner-individual-2.jpg';
    var img3NEW = 'assets/couple-images/partner-images/m-partner-individual-2.jpg';
    $('img[src="' + img3OLD + '"]').attr('src', img3NEW);

    var img4OLD = 'assets/couple-images/partner-images/ww-gallery-thumb.jpg';
    var img4NEW = 'assets/couple-images/partner-images/mm-gallery-thumb.jpg';
    $('img[src="' + img4OLD + '"]').attr('src', img4NEW);

    var img5OLD = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    var img5NEW = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    $('a[href="' + img5OLD + '"]').attr('href', img5NEW);

    var img6OLD = 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    var img6NEW = 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    $('img[src="' + img6OLD + '"]').attr('src', img6NEW);

    var img7OLD = 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    var img7NEW = 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    $('a[href="' + img7OLD + '"]').attr('href', img7NEW);
    
    $("body.blue-blue").replaceText("Caitlyn", "Christopher");
    $("body.blue-blue").replaceText("Katherine", "Kyle");
    $("body.blue-blue").replaceText("Her", "Him");

}


function resetPink() {
    var img1OLD = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    var img1NEW = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    $('img[src="' + img1OLD + '"]').attr('src', img1NEW);

    var img2OLD = 'assets/couple-images/partner-images/m-partner-individual-1.jpg';
    var img2NEW = 'assets/couple-images/partner-images/w-partner-individual-1.jpg';
    $('img[src="' + img2OLD + '"]').attr('src', img2NEW);

    var img3OLD = 'assets/couple-images/partner-images/m-partner-individual-2.jpg';
    var img3NEW = 'assets/couple-images/partner-images/w-partner-individual-2.jpg';
    $('img[src="' + img3OLD + '"]').attr('src', img3NEW);

    var img4OLD = 'assets/couple-images/partner-images/mm-gallery-thumb.jpg';
    var img4NEW = 'assets/couple-images/partner-images/ww-gallery-thumb.jpg';
    $('img[src="' + img4OLD + '"]').attr('src', img4NEW);

    var img5OLD = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    var img5NEW = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    $('a[href="' + img5OLD + '"]').attr('href', img5NEW);

    var img6OLD = 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    var img6NEW = 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    $('img[src="' + img6OLD + '"]').attr('src', img6NEW);

    var img7OLD = 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    var img7NEW = 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    $('a[href="' + img7OLD + '"]').attr('href', img7NEW);
    
    $("body.pink-pink").replaceText("Christopher", "Caitlyn");
    $("body.pink-pink").replaceText("Kyle", "Katherine");
    $("body.pink-pink").replaceText("Him", "Her");
}


function resetPartners() {    
    $("body.pink-blue").replaceText("Caitlyn", "Christopher");
    $("body.pink-blue").replaceText("Kyle", "Katherine");
    $("body.pink-blue .col-xs-6.col-md-4").replaceText("Him", "Her");
    $("body.pink-blue .col-xs-6.col-md-4.col-md-offset-2").replaceText("Her", "Him");
    
    var replace1 = 'assets/couple-images/the-couple-fpo.jpg';
    var replaceww1 = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    var replacemm1 = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    $('img[src="' + replaceww1 + '"]').attr('src', replace1);
    $('img[src="' + replacemm1 + '"]').attr('src', replace1);

    var replace2 = 'assets/couple-images/individual-1-fpo.jpg';
    var replaceww2 = 'assets/couple-images/partner-images/w-partner-individual-1.jpg';
    var replacemm2 = 'assets/couple-images/partner-images/m-partner-individual-1.jpg';
    $('img[src="' + replaceww2 + '"]').attr('src', replace2);
    $('img[src="' + replacemm2 + '"]').attr('src', replace2);

    var replace3 = 'assets/couple-images/individual-2-fpo.jpg';
    var replaceww3 = 'assets/couple-images/partner-images/w-partner-individual-2.jpg';
    var replacemm3 = 'assets/couple-images/partner-images/m-partner-individual-2.jpg';
    $('img[src="' + replaceww3 + '"]').attr('src', replace3);
    $('img[src="' + replacemm3 + '"]').attr('src', replace3);

    var replace4 = 'assets/couple-images/gallery/thumbs/bride-and-groom.jpg';
    var replaceww4 = 'assets/couple-images/partner-images/ww-gallery-thumb.jpg';
    var replacemm4 = 'assets/couple-images/partner-images/mm-gallery-thumb.jpg';
    $('img[src="' + replacemm4 + '"]').attr('src', replace4);
    $('img[src="' + replaceww4 + '"]').attr('src', replace4);

    var replace5 = 'assets/couple-images/gallery/bride-and-groom.jpg';
    var replaceww5 = 'assets/couple-images/partner-images/ww-the-couple.jpg';
    var replacemm5 = 'assets/couple-images/partner-images/mm-the-couple.jpg';
    $('a[href="' + replaceww5 + '"]').attr('href', replace5);
    $('a[href="' + replacemm5 + '"]').attr('href', replace5);

    var replace6 = 'assets/couple-images/gallery/thumbs/persons.jpg';
    var replaceww6= 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    var replacemm6= 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    $('img[src="' + replacemm6 + '"]').attr('src', replace6);
    $('img[src="' + replaceww6 + '"]').attr('src', replace6);

    var replace7 = 'assets/couple-images/gallery/persons.jpg';
    var replaceww7 = 'assets/couple-images/partner-images/ww-gallery-replace.jpg';
    var replacemm7 = 'assets/couple-images/partner-images/mm-gallery-replace.jpg';
    $('a[href="' + replacemm7 + '"]').attr('href', replace7);
    $('a[href="' + replaceww7 + '"]').attr('href', replace7);
        
}

      
    function zapCookies() {
        $.removeCookie("ivory");
        $.removeCookie("gold");
        $.removeCookie("purple");
        $.removeCookie("green");
    }

    function removeClassifCookie() {
        $("#reset").removeClass("active");
    }

    $(".theme-switcher-toggle").click(function(e) {
        $('html').toggleClass('theme-switcher-open');
        e.preventDefault();
    });


    // --- close panel on click outside but not on menu 
    $(document).on('click', '.theme-switcher-open .page-container', function() {
        $('html').removeClass('theme-switcher-open');
        $('html').removeClass('slide-active');
        $('.slide-panel').removeClass('open');
    });


    $('#theme-switcher .close').click(function(e) {
        $(this).parent().removeClass('open');
        $('html').removeClass('theme-switcher-open');
        e.preventDefault();
    });


    $(".colors a").click(function(e) {

        if ($(this).siblings().hasClass("active")) {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
        } else {
            $(this).addClass("active");
        }
        color = this.id.replace("#", "");
        zapCookies();
        $.cookie(color, 1, {
            expires: 7
        });
        
        history.replaceState("object or string", "title", "/swirly-love/v1.01/demo/");

        $('body').removeClass('green ivory purple reset gold');
        $('body').addClass(color);

        googleMapCenter();
        e.preventDefault();

    });

 
 
    // ----- data slide 
    $('[data-show="iframe"]').click(function(e) {
        $('html').toggleClass('iframe-open');
        $('#iframe-content').hide();
        var $this = $(this);
        var target = $this.attr('data-target');
        var $content = $this.attr('data-content');
        var $target = $(target);
            $(target).toggleClass('open');
            $("#iframe-content").load($content);
            $('#iframe-content').fadeIn(800);
        e.preventDefault();
    });
 
 
    $(".iframe-wrapper .close").click(function(e) {
        e.preventDefault();
        $(this).parent().removeClass('open');
        $('html').removeClass('iframe-open');
        $('.iframe-wrapper #iframe-content').html("");
    });



    // get color selection
    function getStyle(color) {
        $('body').addClass(color);
    }

  
    $(window).load(function() {
        if ($.cookie("ivory")) {
            getStyle("ivory");
            removeClassifCookie();
            $("#ivory").addClass("active")
        } else {
            if ($.cookie("green")) {
                getStyle("green");
                removeClassifCookie();
                $("#green").addClass("active")
            } else {
                if ($.cookie("purple")) {
                    getStyle("purple");
                    removeClassifCookie();
                    $("#purple").addClass("active")
                } else {
                    if ($.cookie("gold")) {
                        getStyle("gold");
                        removeClassifCookie();
                        $("#gold").addClass("active")
                    }
                }
            }
        }
    });


    $("#reset").click(function(e) {
        zapCookies();
        $("body").removeClass(color);
        $("#reset").addClass("active");
        e.preventDefault();
    });

    $("#reset-all").click(function(e) {
        zapCookies();
        zapCookies2();
        zapCookies3();
        location.reload();
        $('body').removeClass('green ivory purple reset gold');
        $('body').removeClass('pink-pink blue-blue');
        $('body').removeClass('header-left');
        $('body').removeClass('header-top');
        $.removeCookie("swirly");
        history.replaceState("object or string", "title", "/swirly-love/v1.01/demo/");
        e.preventDefault();
    });


    function zapCookies2() {
        $.removeCookie("pink-pink");
        $.removeCookie("blue-blue");
    }

    $(".partners a").click(function(e) {
        
        e.preventDefault();
        
        history.replaceState("object or string", "title", "/swirly-love/v1.01/demo/");

        
        if ($(this).siblings().hasClass("active")) {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
        } else {
            $(this).addClass("active");
        }
        partner = this.id.replace("#", "");
        zapCookies2();
        $.cookie(partner, 1, {
            expires: 7
        });

        $('body').removeClass('pink-pink blue-blue pink-blue');
        $('body').addClass(partner);
        
          if ($.cookie("blue-blue")) {
               resetBlue(); 
               blueblue().add();
          } 
            if ($.cookie("pink-pink")) {
                resetPink(); 
                pinkpink().add();
            }         
          if ($.cookie("pink-blue")) {
              resetPartners(); 
          }         
       

    });


    // get partner
    function getPartner(partner) {
        $('body').addClass(partner);
    }


    $(window).load(function() {
        if ($.cookie("blue-blue")) {
            getPartner("blue-blue");
            blueblue();
            $("#pink-blue").removeClass("active")
            $("#blue-blue").addClass("active")
        } else {
            if ($.cookie("pink-pink")) {
                getPartner("pink-pink");
                pinkpink();
                $("#pink-blue").removeClass("active")
                $("#pink-pink").addClass("active")
            }
        }
    });


    // header choices
    function zapCookies3() {
        $.removeCookie("header-left");
        $.removeCookie("header-right");
        $.removeCookie("header-top");
    }

    $(".header-choice a").click(function(e) {
        if ($(this).siblings().hasClass("active")) {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
        } else {
            $(this).addClass("active");
        }
        headerchoice = this.id.replace("#", "");
        zapCookies3();
        $.cookie(headerchoice, 1, {
            expires: 7
        });
        
        history.replaceState("object or string", "title", "/swirly-love/v1.01/demo/");

        $(window).trigger('resize'); 
        $('body').removeClass('header-left header-right header-top');
        $('body').addClass(headerchoice);

        e.preventDefault();

    });


    // get headerchoice
     function getHeader(headerchoice) {
        $('body').addClass(headerchoice);
    }


    $(window).load(function() {
        if ($.cookie("header-left")) {
            getHeader("header-left");
            $("body").removeClass("header-right")
            $("#header-right").removeClass("active")
            $("#header-left").addClass("active")
        } else
        if ($.cookie("header-top")) {
            getHeader("header-top");
            $("body").removeClass("header-left")
            $("body").removeClass("header-right")
            $(".header-choice a").removeClass("active")
            $("#header-top").addClass("active")
        }

    });




// ---- header location onload
    if (window.location.search.search(/[?&]header=left(?:$|&)/) !== -1) {
        zapCookies3();
        $('body').addClass('header-left');
        $.cookie('headerchoice', 1);
        $('body').removeClass('header-right');
        $('#header-right').removeClass('active');
        $('#header-left').addClass('active');
    }
    if (window.location.search.search(/[?&]header=right(?:$|&)/) !== -1) {
        zapCookies3();
        $.cookie('headerchoice', 1);
        $('body').removeClass('header-left');
        $('#header-left').removeClass('active');
        $('#header-right').addClass('active');
    }
    if (window.location.search.search(/[?&]header=top(?:$|&)/) !== -1) {
        zapCookies3();
        $('body').addClass('header-top');
        $.cookie('headerchoice', 1);
        $('body').removeClass('header-right');
        $('#header-right').removeClass('active');
        $('#header-top').addClass('active');
    }
// ---- green combos on load
    if (window.location.search.search(/[?&]combo=green-ww(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('green');
        $.cookie('green', 1);
        pinkpink();
        $('body').addClass('pink-pink');
        $.cookie('pink-pink', 1);
    }
    if (window.location.search.search(/[?&]combo=green-mm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('green');
        $.cookie('green', 1);
        blueblue();
        $('body').addClass('blue-blue');
        $.cookie('blue-blue', 1);
    }
    if (window.location.search.search(/[?&]combo=green-wm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('green');
        $.cookie('green', 1);
    }
    
// ---- purple combos on load
    if (window.location.search.search(/[?&]combo=purple-ww(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('purple');
        $.cookie('purple', 1);
        pinkpink();
        $('body').addClass('pink-pink');
        $.cookie('pink-pink', 1);
    }
    if (window.location.search.search(/[?&]combo=purple-mm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('purple');
        $.cookie('purple', 1);
        blueblue();
        $('body').addClass('blue-blue');
        $.cookie('blue-blue', 1);
    }
    if (window.location.search.search(/[?&]combo=purple-wm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('purple');
        $.cookie('purple', 1);
    }

// ---- ivory combos on load
    if (window.location.search.search(/[?&]combo=ivory-ww(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('ivory');
        $.cookie('ivory', 1);
        pinkpink();
        $('body').addClass('pink-pink');
        $.cookie('pink-pink', 1);
    }
    if (window.location.search.search(/[?&]combo=ivory-mm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('ivory');
        $.cookie('ivory', 1);
        blueblue();
        $('body').addClass('blue-blue');
        $.cookie('blue-blue', 1);
    }
    if (window.location.search.search(/[?&]combo=ivory-wm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('ivory');
        $.cookie('ivory', 1);
    }

// ---- gold combos on load
    if (window.location.search.search(/[?&]combo=gold-ww(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('gold');
        $.cookie('gold', 1);
        pinkpink();
        $('body').addClass('pink-pink');
        $.cookie('pink-pink', 1);
    }
    if (window.location.search.search(/[?&]combo=gold-mm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('gold');
        $.cookie('gold', 1);
        blueblue();
        $('body').addClass('blue-blue');
        $.cookie('blue-blue', 1);
    }
    if (window.location.search.search(/[?&]combo=gold-wm(?:$|&)/) !== -1) {
        zapCookies();
        zapCookies2();
        $('body').addClass('gold');
        $.cookie('gold', 1);
    }

// ---- colors on load
    if (window.location.search.search(/[?&]theme=green(?:$|&)/) !== -1) {
        zapCookies();
        $('body').addClass('green');
        $.cookie('green', 1);
    }
    if (window.location.search.search(/[?&]theme=gold(?:$|&)/) !== -1) {
        zapCookies();
        $('body').addClass('gold');
        $.cookie('gold', 1);
    }
    if (window.location.search.search(/[?&]theme=purple(?:$|&)/) !== -1) {
        zapCookies();
        $('body').addClass('purple');
        $.cookie('purple', 1);
    }
    if (window.location.search.search(/[?&]theme=ivory(?:$|&)/) !== -1) {
        zapCookies();
        $('body').addClass('ivory');
        $.cookie('ivory', 1);
    }

//---- partners on load
    if (window.location.search.search(/[?&]partner=mm(?:$|&)/) !== -1) {
        zapCookies2();
        zapCookies();
        blueblue();
        $('body').addClass('blue-blue');
        $.cookie('blue-blue', 1);
    }
    if (window.location.search.search(/[?&]partner=ww(?:$|&)/) !== -1) {
        zapCookies2();
        zapCookies();
        pinkpink();
        $('body').addClass('pink-pink');
        $.cookie('pink-pink', 1);
    }
    if (window.location.search.search(/[?&]partner=wm(?:$|&)/) !== -1) {
        zapCookies2();
        zapCookies();
    }


    $(window).scroll(function() {
        var $element = $('.theme-switcher-toggle'),
            $scroll = $(window).scrollTop(),
            $mastheadHeight = $('.masthead-graphic').height();

        if ($scroll >= $mastheadHeight) {
            $element.css('top', '10px');
        } else {
            $element.removeAttr('style');
        }

    });


}); // switcher functions



// ----- google map
// change map colors based on cookie for theme color options (green, ivory, purple, gold) white is not named and is the default
    
 if ($('#map-container').length) {
 
    $.fn.googleMap = function(address, options) {

        if ($.cookie("green") != null) {
            var $hue = "#aad333";
            var $sat = "1";
        } else
        if ($.cookie("gold") != null) {
            var $hue = "#f9e386";
            var $sat = "1";
        } else
        if ($.cookie("purple") != null) {
            var $hue = "#9c8fd0";
            var $sat = ".8";
        } else
        if ($.cookie("ivory") != null) {
            var $hue = "#f8f5dc";
            var $sat = "1";
        } else {
            var $hue = "#000000";
            var $sat = "-100";
        }

      // https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple

      // ===== styles 
        var styles = [{
            stylers: [{
                hue: $hue
            }, {
                saturation: $sat
            }, {
                gamma: .8
            }]
        }, {
            featureType: "road",
            elementType: "geometry",
            stylers: [{
                lightness: 20
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road",
            elementType: "labels",
            stylers: [{
                visibility: "simplified"
            }]
        }];

        var defaults = {
            lat: 44.081996,
            long: -123.0286928,
            zoom: 18,
            scrollwheel: false,
            mapTypeIds: [google.maps.MapTypeId.ROADMAP]
        };
        options = $.extend(defaults, options || {
            styles: styles
        });

        var center = new google.maps.LatLng(options.lat, options.long);
        var map = new google.maps.Map(this.get(0), $.extend(options, {
            center: center
        }));


        var infoContent = '<div id="content">'+$('#info-content').html()+'</div>';
        var infowindow = new google.maps.InfoWindow({
           content: infoContent
        });

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            address: address
        }, function(place, status) {
            if (status == google.maps.GeocoderStatus.OK && place.length) {
                if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                    map.setCenter(place[0].geometry.location);
                    var marker = new google.maps.Marker({
                        position: place[0].geometry.location,
                        map: map
                    }); 
                    
             google.maps.event.addListener(marker, 'click', function() {
                 infowindow.open(map,marker);
               });
                infowindow.open(map,marker);
                                                                                     
              }
            }
        });
    };
    

    // ===== center locator load and resize :: add the address 
    function googleMapCenter() {
      
       var location = $('#location').text();
       $('#map-container').googleMap(location);
        
    }

    $(window).load(googleMapCenter);
    $(window).resize(googleMapCenter);
    
} // end if #container-map

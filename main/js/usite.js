jQuery(document).ready(function($) {
    $.fn.setCookie = function() {
        var cookieName = this.attr("id");
        var st = this.attr("style");
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    };
    /*////////////////////////////////////////////STYLE CHANGES///////////////////////////////*/
    if ($.cookie('--l-color')) {
        document.documentElement.style.setProperty('--l-color', $.cookie('--l-color'));
        $("#link-color-input").val($.cookie('--l-color'));
    }
    if ($.cookie('--t-color')) {
        document.documentElement.style.setProperty('--t-color', $.cookie('--t-color'));
        $("#main-color-input").val($.cookie('--t-color'));
    }
    if ($.cookie('--bg-color')) {
        document.documentElement.style.setProperty('--bg-color', $.cookie('--bg-color'));
        $("#bg-color-input").val($.cookie('--bg-color'));
    }

    function setCookieColor(value) {
        var cookieName = value;
        var st = document.documentElement.style.getPropertyValue(value);
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    };

    function setAllColorsCookie() {
        setCookieColor('--l-color');
        setCookieColor('--t-color');
        setCookieColor('--bg-color');

    }
    $("#link-color-input").change(function() {
        document.documentElement.style.setProperty('--l-color', $(this).val());
        setAllColorsCookie();
    })
    $("#main-color-input").change(function() {
        document.documentElement.style.setProperty('--t-color', $(this).val());
        setAllColorsCookie();
    })
    $("#bg-color-input").change(function() {
        document.documentElement.style.setProperty('--bg-color', $(this).val());
        setAllColorsCookie();
    })
    $.fn.createCookieHeadFont = function() {
        var cookieName = 'header-font';
        var st = $(this).css("font-family");
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });

        var cookieName = 'active-head';
        var st = $(this).attr("id");
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    }
    if ($.cookie('header-font')) {
        $('.head-font a').removeClass("active");
        $('#' + $.cookie('active-head')).addClass("active");
        document.documentElement.style.setProperty('--headerfont', $.cookie('header-font'));
    }

    $.fn.createCookieTextFont = function() {
        var cookieName = 'text-font';
        var st = $(this).css("font-family");
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });

        var cookieName = 'active-text';
        var st = $(this).attr("id")
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    }
    if ($.cookie('text-font')) {
        $('.text-font a').removeClass("active");
        $('#' + $.cookie('active-text')).addClass("active");
        document.documentElement.style.setProperty('--textfont',
            $.cookie('text-font'));
    }

    $(".head-font").on("click", "a", function() {
        $('.head-font a').removeClass("active");
        $(this).addClass("active");
        document.documentElement.style.setProperty('--headerfont', $(this).css('font-family'));
        $(this).createCookieHeadFont();
    })
    $(".text-font").on("click", "a", function() {
        $('.text-font a').removeClass("active");
        $(this).addClass("active");
        document.documentElement.style.setProperty('--textfont', $(this).css('font-family'));
        $(this).createCookieTextFont();
    })

    function setCookieFontSize() {
        var cookieName = 'font-size';
        var st = $("#font-size-range").val();
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    }
    if ($.cookie("font-size")) {
        $("#font-size-range").val($.cookie("font-size"));
        document.documentElement.style.setProperty('--fontsize', $.cookie("font-size") + "px");
    }
    $("#font-size-range").change(function() {
        document.documentElement.style.setProperty('--fontsize', $(this).val() + 'px');
        setCookieFontSize();
    })

    function setCookieTextFontWeight() {
        var cookieName = 'font-weight-t';
        var st = $("#font-weight-text").val();
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    }
    if ($.cookie("font-weight-t")) {
        $("#font-weight-text").val($.cookie("font-weight-t"));
        document.documentElement.style.setProperty('--textfontweight', $.cookie("font-weight-t") * 200);
    }
    $("#font-weight-text").change(function() {
        document.documentElement.style.setProperty('--textfontweight', $(this).val() * 200);
        setCookieTextFontWeight();
    })

    function setCookieHeadFontWeight() {
        var cookieName = 'font-weight-h';
        var st = $("#font-weight-head").val();
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    }
    if ($.cookie("font-weight-h")) {
        $("#font-weight-head").val($.cookie("font-weight-h"));
        document.documentElement.style.setProperty('--headfontweight', $.cookie("font-weight-h") * 200);
    }
    $("#font-weight-head").change(function() {
        document.documentElement.style.setProperty('--headfontweight', $(this).val() * 200);
        setCookieHeadFontWeight();
    })

    $("#reset-color").click(function() {
            document.documentElement.style.setProperty('--l-color', '');
            setCookieColor('--l-color');
            $("#link-color-input").val("#FF1111");
            document.documentElement.style.setProperty('--t-color', '');
            setCookieColor('--t-color');
            $("#main-color-input").val('#000000');
            document.documentElement.style.setProperty('--bg-color', '');
            setCookieColor('--bg-color');
            $("#bg-color-input").val('#ffffff');
            document.documentElement.style.setProperty('--textfont', "Montserrat, sans-serif");
            document.documentElement.style.setProperty('--headerfont', "Montserrat, sans-serif");
            $('.text-font a').removeClass("active");
            $('.head-font a').removeClass("active");
            $("#text-mons").addClass("active").createCookieTextFont();
            $("#head-mons").addClass("active").createCookieHeadFont();
            document.documentElement.style.setProperty('--fontsize', '16px');
            $("#font-size-range").val('16')
            setCookieFontSize();
            $("#button-choose .btn").removeClass("active-btn");
            $("#button1").addClass("active-btn");
            for (i = 1; i < 7; i++) {
                $(".btn").removeClass("button" + i);
            }
            $("#font-weight-head").val(3);
            document.documentElement.style.setProperty('--headfontweight', 900);
            setCookieHeadFontWeight();

            $("#font-weight-text").val(2);
            document.documentElement.style.setProperty('--textfontweight', 400);
            setCookieTextFontWeight();
        })
        /*/////////////////////////COLOR PICK/////////////////////////*/
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    $(".in1").change(function() {
        if ($(this).val() == $("#bg-color-input").val() && $(this).attr("id") != "bg-color-input") {
            $("#bg-color-input").val(getRandomColor());
            document.documentElement.style.setProperty('--bg-color', $("#bg-color-input").val());
            setCookieColor('--bg-color');
        }
        if ($(this).val() == $("#main-color-input").val() && $(this).attr("id") != "main-color-input") {
            $("#main-color-input").val(getRandomColor());
            document.documentElement.style.setProperty('--t-color', $("#main-color-input").val());
            setCookieColor('--t-color');

        }
        if ($(this).val() == $("#link-color-input").val() && $(this).attr("id") != "link-color-input") {
            $("#link-color-input").val(getRandomColor());
            document.documentElement.style.setProperty('--l-color', $("#link-color-input").val());
            setCookieColor('--l-color');
        }
    })

    $("#reload-btn").click(function() {
        document.location.reload(true);
    })
    $("#generate").click(function() {
            $("#bg-color-input").val(getRandomColor());
            document.documentElement.style.setProperty('--bg-color', $("#bg-color-input").val())
            $("#main-color-input").val(getRandomColor());
            document.documentElement.style.setProperty('--t-color', $("#main-color-input").val());
            $("#link-color-input").val(getRandomColor());
            document.documentElement.style.setProperty('--l-color', $("#link-color-input").val());
            setCookieColor('--l-color');
            setCookieColor('--t-color');
            setCookieColor('--bg-color');

        })
        /*//////////////////////////////////////////////////////BUTTONS/////////////////////////////////////////////////////////////////*/
    function createButtonCookie() {
        var cookieName = "button"
        var st = $(".active-btn").attr("id");
        $.cookie(cookieName, st, { expires: 60 * 60 * 60 * 24 * 1000, path: '/' });
    }
    if ($.cookie("button")) {
        $("#button-choose .btn").removeClass("active-btn");
        $("#" + $.cookie("button")).addClass("active-btn");
        for (i = 1; i < 7; i++) {
            $(".btn").removeClass("button" + i);
        }
        $(".btn-primary").addClass($.cookie("button"));
    }

    $("#button-choose .btn").click(function() {
        $("#button-choose .btn").removeClass("active-btn");
        $(this).addClass("active-btn");
        for (i = 1; i < 7; i++) {
            $(".btn-primary").removeClass("button" + i);
        }
        $(".btn-primary").addClass($(this).attr("id"));
        createButtonCookie();
    })

    $("#button-hover").on("mouseenter", function() {
        $(this).css("border-color", getRandomColor());
        $(this).css("color", getRandomColor());
        $(this).css("backround-color", getRandomColor());
    })
    $("#button-hover").on("mouseleave", function() {
        $(this).css("border-color", "var(--l-color)");
        $(this).css("color", "var(--bg-color)");
        $(this).css("backround-color", "var(--l-color)");
    })

    var isTouch = (('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0));
    if (isTouch) {
        $("#button-choose").hide();
        $(".drag-on").hide();
        $(".resize-on").hide();
        $("#phone-warning").show();
        $("#div3").hide();
        $("a.nav-link[data-target='#modalSettings']").click(function() {
            $(".fa-times").click();
        })
    }

});
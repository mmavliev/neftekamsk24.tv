jQuery(document).ready(function($) {
    var times = 0;

    function removeFixed() {
        $(".buttons").removeClass("fixed");
    }



    function removeActive() {
        $(".aside-left").removeClass("aside-active");
        $(".aside-right").removeClass("aside-active");
        $(".form").addClass("display-none");
    }
    $("#opensearch").click(function() {
        if ($(".form").hasClass("display-none")) {
            removeActive();
            $(".form").removeClass("display-none");
            $("#main-input").focus();
            $(".buttons").addClass("fixed");
        } else {
            removeActive();
            removeFixed();
        }
    })
    if (!$(".container").hasClass("normal-cont")) {
        $(".container").css("min-height", $(window).height() - $("footer").height() - 190);
    }
    $(".new-hor").eq(0).css("border-top", "2px solid var(--l-color)");

    $(".wcp-openweather-city").text("Нефтекамск");
    $(".wcp-openweather-country").text("Россия");
    $(".in1").change(function() {
        $("#customModal .modal-content").addClass("transpar");
    })
    $(".in1").focusout(function() {
        $("#customModal .modal-content").removeClass("transpar");
    })
});
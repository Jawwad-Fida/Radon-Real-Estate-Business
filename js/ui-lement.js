$(".accordion li").click(function () {
    $(this).closest(".accordion").hasClass("one-open") ? ($(this).closest(".accordion").find("li").removeClass("active"), $(this).addClass("active")) : $(this).toggleClass("active"), "undefined" != typeof window.mr_parallax && setTimeout(mr_parallax.windowLoad, 500)
});

$(".tabbed-content").each(function () {
    $(this).append('<ul class="content"></ul>')
}), $(".tabs li").each(function () {
    var a = $(this),
        b = "";
    a.is(".tabs>li:first-child") && (b = ' class="active"');
    var c = a.find(".tab-content").detach().wrap("<li" + b + "></li>").parent();
    a.closest(".tabbed-content").find(".content").append(c)
}), $(".tabs li").click(function () {
    $(this).closest(".tabs").find("li").removeClass("active"), $(this).addClass("active");
    var a = $(this).index() + 1;
    $(this).closest(".tabbed-content").find(".content>li").removeClass("active"), $(this).closest(".tabbed-content").find(".content>li:nth-of-type(" + a + ")").addClass("active")
});

$("a.close").removeAttr("href").on('click', function () {
    function slideFade(elem) {
        var fadeOut = {
            opacity: 0,
            transition: 'opacity 0.5s'
        };
        elem.css(fadeOut).slideUp();
    }
    slideFade($(this).parent());
});

$('.validate-required[type="checkbox"]').each(function () {
    $('[name="' + $(this).attr("name") + '"]:checked').length || (c = 1, b = $(this).attr("name").replace("[]", ""), a.find(".form-error").text("Please tick at least one " + b + " box."))
});

$(".checkbox-option").on("click", function () {
    $(this).toggleClass("checked");
    var a = $(this).find("input");
    a.prop("checked") === !1 ? a.prop("checked", !0) : a.prop("checked", !1)
});

$(".radio-option").click(function () {
    var a = $(this).hasClass("checked"),
        b = $(this).find("input").attr("name");
    a || ($('input[name="' + b + '"]').parent().removeClass("checked"), $(this).addClass("checked"), $(this).find("input").prop("checked", !0))
});

var countdown = new Countdown({
    node:   document.querySelector( '.countdown' ),
    from:   '2017-08-19',
    to:     '2019-09-20',
    count:  'auto',
    tick:   100,
    onTick: function() { console.log( this ); }
});

/*----------------------------------
    //------ MODAL ------//
    -----------------------------------*/
    var modal = {};
    modal.hide = function () {
        $('.modal').fadeOut();
        $("html, body").removeClass("hid-body");
    };
    $('.modal-open').on("click", function (e) {
        e.preventDefault();
        $('.modal').fadeIn();
        $("html, body").addClass("hid-body");
    });
    $('.close-reg').on("click", function () {
        modal.hide();
    });
    
    /*----------------------------------
    //------ TABS ------//
    -----------------------------------*/
    $(".tabs-menu a").on("click", function (a) {
        a.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var b = $(this).attr("href");
        $(".tab-contents").not(b).css("display", "none");
        $(b).fadeIn();
    });

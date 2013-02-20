/*******

 ***	Anchor Slider by Cedric Dugas   ***
 *** Http://www.position-absolute.com ***

 Never have an anchor jumping your content, slide it.

 Don't forget to put an id to your anchor !
 You can use and modify this script for any project you want, but please leave this comment as credit.

 *****/



$(document).ready(function() {
    $("a.anchorLink").anchorAnimate();
    $("a.scrollToTop").toTop();

    setTimeout(function(){
        $('.sideMenu').addClass('visible');
    },1000);

    $("#buttonTweet").tweet();


    $(window).scroll(function() {
        if($(window).scrollTop() != 0){
            for(var i = 0; i < $('.anchor').length; i++){
                var eTop = $($('.anchor')[i]).offset().top;
                var a = eTop - $(window).scrollTop();
                if(a < 1){
                    var newAnchor = $('.anchor')[i];
                }
            }
            var el = $(newAnchor).attr('id');
            var elem = $('.' + el);

            if($('.active').length > 1){
                $('.sideMenu li a').removeClass('active');
            }
            elem.addClass('active');
        }
    });
});

jQuery.fn.anchorAnimate = function(settings) {

    settings = jQuery.extend({
        speed : 1100
    }, settings);

    return this.each(function(){
        var caller = this
        $(caller).click(function (event) {
            $("a.active").removeClass('active');
            $(caller).addClass('active');
            event.preventDefault()
            var locationHref = window.location.href
            var elementClick = $(caller).attr("href")

            var destination = $(elementClick).offset().top;
            $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, settings.speed, function() {
                window.location.hash = elementClick
            });
            return false;
        })
    })
};

jQuery.fn.toTop = function() {
    $(window).scroll(function() {
        if($(window).scrollTop() > 200){
            $('.scrollToTop').show('slow');
        }else{
            $('.scrollToTop').hide('slow');
        }
    });
};

jQuery.fn.tweet = function() {
    $("#buttonTweet").click(function() {
        var dataMsg = $("#buttonTweet").attr('data-message');
        var tweetLink = 'http://twitter.com/intent/tweet?text=' + dataMsg;
         window.open(tweetLink, 'twitter', 'width=500, height=300');
    });
};

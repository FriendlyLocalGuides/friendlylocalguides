
Stripe.setPublishableKey('pk_test_kFlQJaqOYrER1q0ktuQRjXK8');
var isTourPage,
    isGuidePage,
    isThanks;

function getTourTitles(){
    var $tourHeader         = $('.header_title'),
        tourTitle           = $tourHeader.find('h3').html(),
        tourPrice           = $tourHeader.find('.price').html(),
        $subHeader          = $('.sub_header'),
        $wrapPreorderImg    = $('.wrap-preorder-img'),
        $mailSuccess        = $('.mail_success'),
        headerTitle         = $subHeader.find('h4'),
        headerPrice         = $subHeader.find('.price'),
        wrapPreorderTitle   = $wrapPreorderImg.find('h4'),
        wrapPreorderPrice   = $wrapPreorderImg.find('.price'),
        titleBookedTour     = $mailSuccess.find('.title-tour'),
        priceBookedTour     = $mailSuccess.find('.price-tour'),
        viewTourImg         = $('.cover-img').attr('src');


    headerTitle.html(tourTitle);
    wrapPreorderTitle.html(tourTitle);
    titleBookedTour.html(tourTitle);
    headerPrice.html(tourPrice);
    wrapPreorderPrice.html(tourPrice);
    priceBookedTour.html(tourPrice);
    $('.preorder-img').attr('src', viewTourImg);
    $('.title-field').val(tourTitle);
    $('.price-field').val(tourPrice);
}

$(window).on('scroll resize orientationchange touchmove', $.debounce(750, function() {

    var scroll_position = $(window).scrollTop(),
        snap_range = 256,
        slide_top,
        snap_from,
        snap_to,
        snap_offset,
        scroll_to,
        scroll_diff;

    $('section').each(function () {

        if(!$(this).hasClass('contact')){
            slide_top = $(this).offset().top;

            snap_from = Math.round(slide_top - (snap_range / 2), 2);
            snap_to = Math.round(slide_top + (snap_range / 2), 2);


            if (scroll_position >= snap_from && scroll_position <= snap_to) {

                snap_offset = 0; //e.g. menu bar height

                scroll_to = $(this).offset().top - snap_offset;

                scroll_diff = scroll_position - scroll_to;

                if (scroll_diff != "-1") {

                    $("html, body").animate({scrollTop: scroll_to}, 300, 'linear');

                }

            }
        }

    });
}));

function toggleTheme(){
    var scroll_position, offset, element_top, element_bottom;
    scroll_position = $(window).scrollTop();
    offset = 116;

    if(scroll_position > offset){
        scroll_position += offset;
    }

    var white = false,
        black = false,
        hideSubHeader = false;

    $('.whiten').each(function(){
        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).outerHeight();

        if(scroll_position >= element_top && scroll_position <= element_bottom){
            white = true;
        }

    });

    $('.blacken').each(function(){

        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).outerHeight();

        if(scroll_position >= element_top && scroll_position <= element_bottom || element_top == 0){
            black = true;
        }

    });



    $('.tour-booked').each(function(){
        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).height();

        if(scroll_position >= element_top && scroll_position <= element_bottom){
            hideSubHeader = true;
        }
    });

    if(white){
        $('header, footer, aside').addClass('white_theme');

        if(isTourPage){
            $('html').addClass('tours-page');
            $('header').addClass('show_sub-header');
            $('.scroll-navigate').fadeIn();
        }

    }
    else{
        $('header, footer, aside').removeClass('white_theme');
    }

    if(black) {
        $('header, footer, aside').addClass('black_theme');

        if (isTourPage) {
            $('html').addClass('tours-page');
            $('header').addClass('show_sub-header');
            $('.scroll-navigate').fadeIn();
        }

    }else{
        $('header, footer, aside').removeClass('black_theme');
    }

    if(!white && !black || !isTourPage ){
        $('html').removeClass('tours-page');
        $('header').removeClass('show_sub-header');
        $('.scroll-navigate').fadeOut('fast');
    }

    if(hideSubHeader){
        $('header, footer, aside').addClass('white_theme');
        $('header').removeClass('show_sub-header');
    }

    var no_bookButton = false;

    $('.book-tour').each(function(){

        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).height();

        if(scroll_position >= element_top && scroll_position <= element_bottom){
            no_bookButton = true;
        }

    });

    $('.content_box').each(function(){
        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).height();
        if(scroll_position >= element_top && scroll_position <= element_bottom){
            $('.scroll-navigate li').removeClass('current');
            $('.scroll-navigate .description-icon').addClass('current');
        }

    });

    $('.what_include').each(function(){
        element_top = $(this).offset().top -15;
        element_bottom = element_top + $(this).height() + 490;
        if(scroll_position >= element_top && scroll_position <= element_bottom){
            $('.scroll-navigate li').removeClass('current');
            $('.scroll-navigate .info-icon').addClass('current');
        }

    });



    $('.gallery').each(function(){
        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).height();
        if(scroll_position >= element_top && scroll_position <= element_bottom){
            $('.scroll-navigate li').removeClass('current');
            $('.scroll-navigate .gallery-icon').addClass('current');
        }

    });


    $('.reviews').each(function(){
        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).height();
        if(scroll_position >= element_top && scroll_position <= element_bottom){
            $('.scroll-navigate li').removeClass('current');
            $('.scroll-navigate .reviews-icon').addClass('current');
        }

    });

    $('.book-tour').each(function(){
        element_top = $(this).offset().top;
        element_bottom = element_top + $(this).height();
        if(scroll_position >= element_top && scroll_position <= element_bottom){
            $('.scroll-navigate li').removeClass('current');
        }

    });

    if(no_bookButton){
        $('header').removeClass('show_sub-header');
        $('.scroll-navigate').addClass('hide');
        $('header').find(".book_button").hide();
        $('.sub_header').find(".too_long_duration").removeClass('show');
    }else{
        $('.scroll-navigate').removeClass('hide');
        $('header').find(".book_button").show();
        $('.sub_header').find(".too_long_duration").addClass('show');
    }

}

$(window).load(function(){

    toggleTheme();
    $('body').on('click touch ready resize orientation scroll', '.scroll-navigate .description-icon', function(e){
        e.preventDefault();
        $('.scroll-navigate li').removeClass('current');
        $(this).addClass('current');
        $('html, body').animate({
            scrollTop: $('.description_tour').offset().top
        }, 500);

    });


    $('body').on('click touch ready resize orientation scroll', '.scroll-navigate .info-icon', function(e){
        e.preventDefault();
        $('.scroll-navigate li').removeClass('current');
        $(this).addClass('current');
        $('html, body').animate({
            scrollTop: $('.what_include').offset().top - 130
        }, 500);

    });


    $('body').on('click touch ready resize orientation scroll', '.scroll-navigate .gallery-icon', function(e){
        e.preventDefault();
        $('.scroll-navigate li').removeClass('current');
        $(this).addClass('current');
        $('html, body').animate({
            scrollTop: $('.gallery').offset().top
        }, 500);

    });


    $('body').on('click touch ready resize orientation scroll', '.scroll-navigate .reviews-icon', function(e){
        e.preventDefault();
        $('.scroll-navigate li').removeClass('current');
        $(this).addClass('current');
        $('html, body').animate({
            scrollTop: $('.reviews').offset().top
        }, 500);

    });
    $('body').on('click touch ready resize orientation scroll', '.book-tour .scroll_down_container', function(e){
        e.preventDefault();
        /*$('.scroll-navigate li').removeClass('current');
        $(this).addClass('current');*/
        $('html, body').animate({
            scrollTop: $('.reviews').offset().top
        }, 500);

    });

    //Reviews
    $('.tabs').tabs('.pane');

    $('.container').on('click touch','.view_tour .scroll_down_container, .guide_page .scroll_down_container', function(){

        $('html, body').animate({
            scrollTop: $('.description_tour, .description, .features ').offset().top
        }, 500);

    })
    $('.container').on('click touch','.features .scroll_down_container', function(){
        console.log('Pis');
        $('html, body').animate({
            scrollTop: $('.tours-list_new').offset().top //TODO
        }, 500);

    });


    $('body').on('click touch', 'header .book_button, .header_title .book_button', function(e){
        if(!$(this).parent().hasClass('main-page_btns')){
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $('.book-tour').offset().top
            }, 500);
        }
    });




    $(window).on('ready resize orientation scroll', $.debounce(100, function(){
        toggleTheme();
    }));

    sendMessage();
    checkCheckbox();
    function checkCheckbox(){
        if ($('.checkbox-review input').prop( "checked")) {
            $('.video-field').fadeIn('fast');
        } else {
            $('.video-field').fadeOut('fast', function(){
                $('.video-field').val("");
            });
        }
    }

    $('.checkbox-review').on('click', function(){
        checkCheckbox()
    });

    $('.rateit').on('click', function(){
        var ratVal = $('.rateit').rateit('value');
        $('.rating').val(ratVal)
    });

/*    $('.container').on('click', '.reviews input[type="submit"]', function(e){
        e.preventDefault();
        $.post("/content/comments.php", $("#review-form").serialize(),function(result){
            console.log($("#review-form").serialize());
            console.log(result);
            //$('.written-reviews').append(result);
            if(result) {
                $('.review').fadeToggle(500, function () {
                    $(this).html(result).fadeToggle(500);
                    $(".name-field, .email-field, .comments-field").val("");
                });
            }
        });
    });*/


    function sendMessage(){

        $('.container').on('click', '.form-container .book_button', function(e){
            //e.preventDefault();
            //console.log();
            var error = false,
                $name = $(this).siblings('.form-row').find('.name-field'),
                $email = $(this).siblings('.form-row').find('.email-field'),
                $num_of_people = $(this).siblings('.form-row').find('.num_of_people-field'),
                $country = $(this).siblings('.form-row').find('.country-field'),
                $hotel = $(this).siblings('.form-row').find('.hotel-field'),
                $date = $(this).siblings('.form-row').find('.date-field'),
                $startTime = $(this).siblings('.form-row').find('.time-field'),
                $message = $(this).siblings('.form-row').find('.comments-field'),
                $videoReview = $(this).siblings('.form-row').find('.video-field'),
                nameVal = $name.val(),
                emailVal = $email.val(),
                timeVal = $startTime.val(),
                peopleVal = $num_of_people.val(),
                countryVal = $country.val(),
                dateVal = $date.val(),
                hotelVal = $hotel.val(),
                messageVal = $message.val(),
                ratingVal = $('.rateit-range').attr("aria-valuenow"),
                videoReviewsVal = $videoReview.val();

            if(nameVal.length == 0){
                error = true;
                $name.addClass("error_field");
            }else{
                $name.removeClass("error_field");
            }
            if(emailVal.length == 0 || emailVal.indexOf('@') == '-1'){
                error = true;
                $email.addClass("error_field");
            }else{
                $email.removeClass("error_field");
            }
            if(timeVal.length == 0){
                error = true;
                $startTime.addClass("error_field");
            }else{
                $startTime.removeClass("error_field");
            }
            if(isTourPage && $(this).hasClass('send-review')){
                e.preventDefault();
                if(countryVal.length == 0){
                    error = true;
                    $country.addClass("error_field");
                }else{
                    $country.removeClass("error_field");
                }
                if(messageVal.length == 0){
                    error = true;
                    $message.addClass("error_field");
                }else{
                    $message.removeClass("error_field");
                }
                if(ratingVal == "0"){
                    console.log(ratingVal);
                    error = true;
                    $('.rateit').addClass("error_field");
                }else{
                    $('.rateit').removeClass("error_field");
                }
                if ($('.checkbox-review input').prop( "checked")){
                    if(videoReviewsVal.length == 0){
                        error = true;
                        $videoReview.addClass("error_field");
                    }else{
                        $videoReview.removeClass("error_field");
                    }
                }
                if(!error){
                    $.post("/content/comments.php", $("#review-form").serialize(),function(result){
                        console.log($("#review-form").serialize());
                        console.log(result);
                        //$('.written-reviews').append(result);
                        if(result) {
                            $('<div class="overlay"><div class="thank-you"><span>Thank you for review!<br /> We hope to see you again soon!</span><div class="close-btn">×</div></div></div>').fadeIn().appendTo('body');
                            $('body').on('click','.close-btn',  function(){
                                $('.overlay').fadeOut(function(){
                                    $(this).remove();
                                });
                            });
                            $('.written-reviews li:first-child').after(result);
                            $('.review').fadeIn();
                            $(".name-field, .email-field, .comments-field, .country-field, .video-field").val("");
                            $('.rateit-selected').width(0);
                        }
                    });
                }
            }

            if(isTourPage && $(this).hasClass('booking-tour')){
                if(peopleVal.length == 0){
                    error = true;
                    $num_of_people.addClass("error_field");
                }else{
                    $num_of_people.removeClass("error_field");
                }
                if(countryVal.length == 0){
                    error = true;
                    $country.addClass("error_field");
                }else{
                    $country.removeClass("error_field");
                }
                if(hotelVal.length == 0){
                    error = true;
                    $hotel.addClass("error_field");
                }else{
                    $hotel.removeClass("error_field");
                }
                if(dateVal.length == 0){
                    error = true;
                    $date.addClass("error_field");
                }else{
                    $date.removeClass("error_field");
                }
                // This identifies your website in the createToken call below
                var $form = $("#booking_form");

                Stripe.card.createToken($form, stripeResponseHandler);
            }
            if(error){
                e.preventDefault();
            }
        });
    }
    function stripeResponseHandler(status, response) {
        var $form = $("#booking_form");

        if (response.error) {
            // Show the errors on the form
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
        } else {
            // response contains id and card, which contains additional card details
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // and submit
            $form.get(0).submit();
        }
    }

    var $swipeboxImg = $('.swipebox img');

    $('.cover-img').cover();

    $swipeboxImg.each(function(){
        $(this).cover()
    });
    //$('.gallery .thumb').height($('.gallery .thumb').outerWidth());

    $('.swipebox').swipebox();
    toggleTheme();
});


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
        titleBookedTour     = $mailSuccess.find('.title-tour'),
        priceBookedTour     = $mailSuccess.find('.price-tour'),
        viewTourImg         = $('.cover-img').attr('src');


    headerTitle.html(tourTitle);
    wrapPreorderTitle.html(tourTitle);
    titleBookedTour.html(tourTitle);
    headerPrice.html(tourPrice);
    priceBookedTour.html(tourPrice);
    $('.preorder-img').attr('src', viewTourImg);
    $('.tour-photo-field').attr('value', viewTourImg);
}

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

    $('.container').on('click touch','.view_tour .scroll_down_container, .guide_page .scroll_down_container, .about_page .scroll_down_container', function(){

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




    $(window).on('ready resize orientation scroll', (function(){
        toggleTheme();
    }));



    function checkCheckbox(){
        if ($('.checkbox-review input').prop( "checked")) {
            $('.video-field').fadeIn('fast').addClass('required');
        } else {
            $('.video-field').fadeOut('fast', function(){
                $('.video-field').val("");
            }).removeClass('required error_field');
        }
    }

    $('.checkbox-review').on('click', function(){
        checkCheckbox()
    });

    $('.rateit').on('click', function(){
        var ratVal = $('.rateit').rateit('value');
        $('.rating').val(ratVal);
        if($('.rating').val().length > 0){
            $('.rating').removeClass('error_field');
        }
    });


    function stripeResponseHandler(status, response) {
        var $form = $('#booking_form');
        if (response.error) {
            // Show the errors on the form
            if(response.error.message){
                $form.find('.payment-errors').text(response.error.message);
                $('.payment-errors-wrapper').fadeIn();
            }
        } else {
            // response contains id and card, which contains additional card details
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // and submit
            $form.get(0).submit();
        }
    }

    function createStripeToken(){
        var expiration = $('.cc-exp').payment('cardExpiryVal');
        Stripe.card.createToken({
            number: $('.cc-num').val(),
            cvc: $('.cc-cvc').val(),
            exp_month:  (expiration.month || 0),
            exp_year:  (expiration.year || 0)
        }, stripeResponseHandler);
    }

    //jQuery.payment
    $('input.cc-num').payment('formatCardNumber');
    $('input.cc-exp').payment('formatCardExpiry');
    $('input.cc-cvc').payment('formatCardCVC');

    function validateCardDetails(){
        var $ccNum = $('.cc-num'),
            $ccExp = $('.cc-exp'),
            $ccCVC = $('.cc-cvc'),
            expiry = $ccExp.payment('cardExpiryVal'),
            validateCardNumber = $.payment.validateCardNumber($ccNum.val()),
            validateExpiry = $.payment.validateCardExpiry(expiry["month"], expiry["year"]),
            validateCVC = $.payment.validateCardCVC($ccCVC.val());

        if(!validateCardNumber && $ccNum.is(':focus')){
            $ccNum.addClass('error_field');
        }
        if(validateExpiry){
            $ccExp.addClass('identified');
        }else{
            if($ccExp.is(':focus')){
                $ccExp.addClass('error_field');
                $ccExp.removeClass('identified');
            }
        }
        if(validateCVC){
            $ccCVC.addClass('identified');
        }else{
            if($ccCVC.is(':focus')){
                $ccCVC.addClass('error_field');
                $ccCVC.removeClass('identified');
            }
        }
    }

    function sendReview(){
        $.post("/content/comments.php", $("#review-form").serialize(),function(result){
            console.log($("#review-form").serialize());
            if(result) {
                $('<div class="overlay"><div class="thank-you"><span>Thank you for review!<br /> We hope to see you again soon!</span><div class="close-btn">×</div></div></div>').fadeIn().appendTo('body');
                $('body').on('click','.close-btn',  function(e){
                    e.stopPropagation();
                    $('.overlay').fadeOut(function(){
                        $(this).remove();
                    });
                });
                $('.written-reviews li:first-child').after(result);
                $('.review').fadeIn();

                $(".name-field, .email-field, .comments-field, .country-field, .video-field, .rating").val("");
                $('#review-form').removeClass('error_field');
                $('.rateit-selected').width(0);
            }
        });
    }

    function checkForm($input, event){

        $input = $($input);

        var error = false,
            $originInput = $input,
            isEmailField = $input.hasClass('email-field');

        if($input.hasClass('booking-tour') || $input.hasClass('send-review') || $input.hasClass('send-email')){
            $input =  $input.parent('form').find('.required');
        }

        $input.each(function(){
            if($(this).val().length == 0 || isEmailField && ($(this).val().indexOf('@') == '-1')){
                event.preventDefault()
                error = true;
                $(this).addClass("error_field");
            }else{
                $input = $originInput;
                $(this).removeClass("error_field");
            }
        });

        if(isTourPage && $input.hasClass('booking-tour') && !error){
            createStripeToken();
        }

        if(isTourPage && $input.hasClass('send-review') && !error){
            sendReview();
        }

    }
    $('.date-field').datepicker({
        minDate: 0,
        beforeShow: function(input, instance){
            $(input).removeClass('required');
            //insertMsgToDatePicker()
        },
        onSelect: function(){
            $('.time-field').focus()
        },
        onClose: function(){
            if($(this).val().length == 0){
                $(this).addClass('error_field required');
            }else{
                $(this).removeClass('error_field');
            }
        }
    });
    $('.date-field').focus(function(){
        $("#ui-datepicker-div").outerWidth($('.date-field').outerWidth());

        $('#ui-datepicker-div .ui-datepicker-prev').html('<i class="fa fa-angle-left"/>');
        $('#ui-datepicker-div .ui-datepicker-next').html('<i class="fa fa-angle-right"/>');
    });


    $('.time-field').clockpicker({

        beforeShow: function(){
            $('.time-field').removeClass('required');

        },
        init: function(){
            $(".clockpicker-popover").outerWidth($('.time-field').outerWidth());
        },
        afterHide: function(){
            if($('.time-field').val().length == 0){
                $('.time-field').addClass('error_field required');
            }else{
                $('.time-field').removeClass('error_field');
            }
        },
        vibrate: true,
        twelvehour: true,
        autoclose: true
    });
    $('.time-field').focus(function(){
        $(".clockpicker-popover").outerWidth($('.time-field').outerWidth());
    });

    $(document).on('click', '.ui-datepicker td', function(){
        $('.date-field').removeClass('required');
    });

    $(document).on('click', '.clockpicker-button', function(){
        $('.time-field').removeClass('required');
    });

    $('.container').on('change paste keyup submit click', '.required, .send-email', function(e){
        checkForm($(this), e);
    });

    $('.container').on('change paste blur keyup submit click', '.book-tour .required, .booking-tour', function(e){
        e.preventDefault();
        validateCardDetails();
        checkForm($(this), e);
    });

    $('.container').on('change paste keyup submit click', '.required, .send-review', function(e){
        e.preventDefault();
        checkForm($(this), e);
    });



    var $swipeboxImg = $('.swipebox img');

    $('.cover-img').cover();

    $swipeboxImg.each(function(){
        $(this).cover()
    });

    $('.swipebox').swipebox();
    toggleTheme();
});

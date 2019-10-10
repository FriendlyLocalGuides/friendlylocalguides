var isTourPage,
    isFreeTour,
    isGuidePage,
    isThanks;

var stripe = Stripe('pk_live_0vlApZF7Kx12foUyGibXG8L8');
var elements = stripe.elements();

// Create an instance of the card UI component
var card = elements.create('card', {
    'style': {
        'base': {
            'fontFamily': 'Arial, sans-serif',
            'color': '#000000',
            'height': '55px',
        },
        'invalid': {
            'color': 'red',
        },
    },

    hidePostalCode: true
});

function setFontSizeForStripe(){
    if (window.innerWidth <= 600) {
        card.update({style: {base: {fontSize: '14px'}}});
    } else {
        card.update({style: {base: {fontSize: '21px'}}});
    }
}
setFontSizeForStripe()
window.addEventListener('resize', function(event) {
    setFontSizeForStripe()
});

if(document.getElementById('card-element')){
    // Add an instance of the card UI component into the `card-element` <div>
    card.mount('#card-element');
}



function getTourTitles(){
    var $tourHeader         = $('.header_title'),
        tourTitle           = $tourHeader.find('h1').html(),
        tourPrice           = $tourHeader.find('.price').html(),
        $subHeader          = $('.sub_header'),
        $wrapPreorderImg    = $('.wrap-preorder-img'),
        $mailSuccess        = $('.mail_success'),
        headerTitle         = $subHeader.find('h4'),
        headerPrice         = $subHeader.find('.price'),
        wrapPreorderTitle   = $wrapPreorderImg.find('h4'),
        titleBookedTour     = $mailSuccess.find('.title-tour'),
        viewTourImg         = $('.cover-img').attr('src');


    headerTitle.html(tourTitle);
    wrapPreorderTitle.html(tourTitle);
    titleBookedTour.html(tourTitle);
    headerPrice.html(tourPrice);
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
    $('body').on('click touch ready resize orientation scroll', '.tours-list_new .scroll_down_container', function(e){
        e.preventDefault();
        /*$('.scroll-navigate li').removeClass('current');
        $(this).addClass('current');*/
        $('html, body').animate({
            scrollTop: $('.reviews').offset().top
        }, 500);

    });
    $('body').on('click touch ready resize orientation scroll', '.book-tour .scroll_down_container', function(e){
        e.preventDefault();
        /*$('.scroll-navigate li').removeClass('current');
         $(this).addClass('current');*/
        $('html, body').animate({
            scrollTop: $('.tours-list_new').offset().top
        }, 500);

    });

    //Reviews
    $('.tabs').tabs('.pane');

    $('.container').on('click touch','.view_tour .scroll_down_container, .guide_page .scroll_down_container, .about_page .scroll_down_container', function(){

        $('html, body').animate({
            scrollTop: $('.description_tour, .description, .features ').offset().top
        }, 500);

    });

    $('.container').on('click touch','.features .scroll_down_container', function(){
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

    // New Stripe
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('booking_form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

    function createToken() {
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

                // Enable the submit button
                document.querySelector('#booking_form .book_button').classList.remove("disabled");
                document.querySelector('#booking_form .book_button').disabled = false;

            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    };
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    function sendReview(){
        var noSpam = $('.antispam').val().length == 0;
        if(noSpam){
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
                event.preventDefault();
                error = true;
                $(this).addClass("error_field");
                /*$('html, body').animate({
                    scrollTop: $('.error_field').first().offset().top - 120
                }, 500);*/
            }else{
                $input = $originInput;
                $(this).removeClass("error_field");
            }
        });

        if(isTourPage && $input.hasClass('booking-tour') && !error && !isFreeTour){
            createToken();
        }else if(isTourPage && $input.hasClass('booking-tour') && !error && isFreeTour){
            $('#booking_form').get(0).submit();
        }else{
            // Enable the submit button
            document.querySelector('#booking_form .book_button').classList.remove("disabled");
            document.querySelector('#booking_form .book_button').disabled = false;
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

        // Disable the submit button to prevent repeated clicks
        document.querySelector('#booking_form .book_button').classList.add("disabled");
        document.querySelector('#booking_form .book_button').disabled = true;
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

    function scrollToAnchor(id){
        var aTag = $(id);
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }

    $(".taviator").click(function(e) {
        e.preventDefault();
        scrollToAnchor('#taviator');
    });
});

/**
 * Created by Сергей on 23.02.14.
 */
$(window).load(function(){

    var header = $("header"),
        $fixedElement = $('.fixed_element'),
        isToursPage = false;

    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 35) {
            $fixedElement.addClass('fixed_navigation');
        } else {
            $fixedElement.removeClass('fixed_navigation')
        }
    });


    /*
        $('header .list_item').on('click', function(e){

            flagSwitch = !flagSwitch;

        });
    */



    isToursPage = false;
    sendMessage();



    //append image in sidebar

    var flagSwitch = true;



    /*Reviews section*/
    $('.tabs').tabs('.pane');


    //tours
//    $sidebar.removeClass("show_section_title").addClass("show_nav-list");

    isToursPage = true;






    $(window).on('ready resize orientation scroll', $.debounce(100, function(){
        toggleTheme();
    }));



    var scroll_position, offset, element_top, element_bottom;

    function toggleTheme(){
        scroll_position = $(window).scrollTop();
        offset = 115;

        if(scroll_position > offset){
            scroll_position += offset;
        }

        var white = false,
            black = false,
            hideSubHeader = false;

        $('.whiten').each(function(){
            element_top = $(this).offset().top;
            element_bottom = element_top + $(this).height();

            if(scroll_position >= element_top && scroll_position <= element_bottom){
                white = true;
            }

        });

        $('.blacken').each(function(){

            element_top = $(this).offset().top;
            element_bottom = element_top + $(this).height();

            if(scroll_position >= element_top && scroll_position <= element_bottom){
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

            if(isToursPage){
                $('html').addClass('tours-page');
                $('header').addClass('show_sub-header');
            }

        }
        else{
            $('header, footer, aside').removeClass('white_theme');
        }

        if(black) {
            $('header, footer, aside').addClass('black_theme');

            if (isToursPage) {
                $('html').addClass('tours-page');
                $('header').addClass('show_sub-header');
            }

        }else{
            $('header, footer, aside').removeClass('black_theme');
        }

        if(!white && !black || !isToursPage ){
            $('html').removeClass('tours-page');
            $('header').removeClass('show_sub-header');
        }

        if(hideSubHeader){
            $('header, footer, aside').addClass('white_theme');
            $('header').removeClass('show_sub-header');
        }

        var no_bookButton = false;

        $('.form-container').each(function(){

            element_top = $(this).offset().top;
            element_bottom = element_top + $(this).height();

            if(scroll_position >= element_top && scroll_position <= element_bottom)
            {
                no_bookButton = true;
            }

        });

        if(no_bookButton){
            $('header').find(".book_button").hide();
            $('.sub_header').find(".too_long_duration").removeClass('show');
        }
        else{
            $('header').find(".book_button").show();
            $('.sub_header').find(".too_long_duration").addClass('show');
        }
    }


    $('.container').on('click touch','.scroll_down_container', function(){

        $('html, body').animate({
            scrollTop: $('.content_box').offset().top
        }, 500);

    });

    $('body').on('click touch', 'header .book_button, .header_title .book_button', function(e){
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('.form-container').offset().top
        }, 500);

    });


    /*
    getTourTitles();
    function getTourTitles(){
        var $tourHeader     = $('.header_title'),
            tourTitle       = $tourHeader.find('h3').html(),
            tourPrice       = $tourHeader.find('.price').html(),
            $subHeader      = $('.sub_header'),
            $mailSuccess      = $('.mail_success'),
            headerTitle     = $subHeader.find('h4'),
            headerPrice     = $subHeader.find('.price'),
            titleBookedTour = $mailSuccess.find('.title-tour'),
            priceBookedTour = $mailSuccess.find('.price-tour');


        headerTitle.html(tourTitle);
        titleBookedTour.html(tourTitle);
        headerPrice.html(tourPrice);
        priceBookedTour.html(tourPrice);
        $('.title-field').val(tourTitle);
        $('.price-field').val(tourPrice);
    }

    function sendMessage(){
        $(".form-container").find('.book_button').click(function(e){
            e.preventDefault();

            var error = false,
                $name = $('.name-field'),
                $email = $('.email-field'),
                $num_of_people = $('.num_of_people-field'),
                $country = $('.country-field'),
                $hotel = $('.hotel-field'),
                $date = $('.date-field'),
                $message = $('.comments-field'),
                nameVal = $name.val(),
                emailVal = $email.val(),
                peopleVal = $num_of_people.val(),
                countryVal = $country.val(),
                dateVal = $date.val(),
                hotelVal = $hotel.val(),
                messageVal = $message.val();

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
            if(messageVal.length == 0){
                error = true;
                $message.addClass("error_field");
            }else{
                $message.removeClass("error_field");
            }
            if(isToursPage){
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
                    $message.removeClass("error_field");
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
            }
            if(error == false){
                $(".form-container").find('.book_button').attr({'disabled' : 'true', 'value' : 'Sending...' });

                $.post("/send_email.php", $("#booking_form").serialize(),function(result){
                    console.log(result);
                    if(result == 'sent'){
                        $('.form_box').remove();
                        $('.mail_success').fadeIn(1000);
                        $('.form-container').removeClass('whiten').addClass('tour-booked');
                        header.removeClass('show_sub-header');
                    }else{
                        $('#mail_fail').fadeIn(1000);
                        $('#send_message').removeAttr('disabled').attr('value', 'Send The Message');
                    }
                });
            }
        });
    }*/


});

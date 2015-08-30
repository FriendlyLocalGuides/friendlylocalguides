/**
 * Created by Сергей on 23.02.14.
 */
$(window).load(function(){

    var header = $("header"),
        $sidebar = $(".sidebar-list"),
        $fixedElement = $('.fixed_element'),
        isToursPage = false,
        templateId = $('#mane-page');


    header.on('click', '.nav_title', (function(){
        header.toggleClass("show_nav-list");
    }));





    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 35) {
            $fixedElement.addClass('fixed_navigation');
        } else {
            $fixedElement.removeClass('fixed_navigation')
        }
    });

    $(".tours_item, .guides_item").click(function(e){
        e.preventDefault();
        $sidebar.removeClass("show_section_title").addClass("show_nav-list");
    });

    /*Sidebar*/

    $sidebar.find("li").click(function(e){
        e.preventDefault();
        $sidebar.removeClass("show_nav-list").addClass("show_section_title");
    });

   /* $sidebar.mouseleave(function(){
        $sidebar.removeClass("show_sidebar-list").addClass("show_section_title");
    });
*/

    $sidebar.find(".nav_title").click(function(){
        $sidebar.addClass("show_nav-list");
    });






    /*Backbone patch*/



    $('.tours-list .list_item').click(function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('body').offset().top
        }, 500);
        $('.container').hide().fadeIn('slow');
        controller.navigate('tours/' + $(this).data('link'),  {trigger: true} );
        return false;
    });

    $('.guides-list .list_item').click(function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('body').offset().top
        }, 500);
        $('.container').hide().fadeIn('slow');
        controller.navigate('guides/' + $(this).data('link'),  {trigger: true} );

        return false;
    });

    $('header .list_item').on('click', function(e){
        e.preventDefault();
        flagSwitch = !flagSwitch;
        header.find("a").removeClass("current");
        $(this).addClass("current");
        header.removeClass("show_nav-list");
        if($(this).hasClass('tours_item')){
            $('.tours-list').removeClass('hidden');
            $('.guides-list').addClass('hidden');
        }else if($(this).hasClass('guides_item')){
            $('.tours-list').addClass('hidden');
            $('.guides-list').removeClass('hidden');
        }

        controller.navigate($(this).data('link'),  {trigger: true} );

        $('html, body').animate({
            scrollTop: $('body').offset().top
        }, 500);
        $('.container').hide().fadeIn('slow');

    });



    var contentView = Backbone.View.extend({

        template: _.template(templateId.html()),

        initialize: function(){
            this.render();
        },

        render: function(){
            this.$el.html(_.template(templateId.html()));

            var $sectionSlide = $(".container").find("section");

            windowHeight = $(window).outerHeight();
            $sectionSlide.css({
                minHeight: windowHeight + "px"
            });

            $(window).on('resize',(function(){
                windowHeight = $(window).outerHeight();
                $sectionSlide.css({
                    minHeight: windowHeight + "px"
                });
            }));
            $('.gallery').cycle();

            isToursPage = false;
            toggleTheme();
            sendMessage();
        }

    });

    var content = new contentView({el: $('.container').fadeIn().get(0)});

    //append image in sidebar

    var flagSwitch = true,
        windowWidth = $(window).outerWidth(),
        windowHeight = $(window).outerHeight();

    var Controller = Backbone.Router.extend({
        routes: {
            "": 'main', // Блок удачи
            "contact": 'contact', // Блок удачи
            "about": 'about', // Блок удачи
            "reviews": 'reviews', // Блок удачи
            "guides/:id": 'guides', // Блок удачи
            "tours": 'tours', // Блок удачи
            "tours/:id": 'tours' // Блок удачи
        },


        contact: function(){
            templateId = $('#contact');
            $('.gallery').cycle('destroy');

            content.render();
        },

        about: function(){
            templateId = $('#about');
            $('.gallery').cycle('destroy');

            content.render();
        },

        reviews: function(){
            templateId = $('#reviews');
            $('.gallery').cycle('destroy');

            content.render();
            $('.tabs').tabs('.pane');
        },

        guides: function(id){

            if(id == null){
                $sidebar.removeClass("show_section_title").addClass("show_nav-list");
            }else{
                templateId = $('#' + id);
            }

            $('.gallery').cycle('destroy');

            content.render();

            appendToggle('guides-list');

            $(window).on('resize', function(){
                appendToggle('guides-list')
            });
        },

        tours: function(id){
            if(id == null){
                $sidebar.removeClass("show_section_title").addClass("show_nav-list");
            }else{
                templateId = $('#' + id);
            }

            $('.gallery').cycle('destroy');

            content.render();
            getTourTitles();
            isToursPage = true;

            appendToggle('tours-list');

            $(window).on('resize', function(){
                appendToggle('tours-list')
            });
        },

        error: function () {
            console.log('Вы находитесь на не существующей странице!');
        }
    });



    var controller = new Controller(); // Создаём контроллер
    Backbone.history.start({pushState: true, root: "/"});  // Запускаем HTML5 History push

//    console.log(controller.navigate());



    function appendToggle(parentOfList){
        windowWidth = $(window).outerWidth();

        if(windowWidth >= 800){
            $sidebar.find("img").remove()
            $('.' + parentOfList).find('li').each(function(){
                var imgSidebar,
                    titleImg = $(this).data('link');
                imgSidebar = ('<img src = /i/' + parentOfList + '/' + titleImg + '.jpg />');
                $(this).find('a').append(imgSidebar);
            });
        }else if(windowWidth <= 800){
            $sidebar.find("img").remove()
        }
    }



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
        ////
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
    }


});

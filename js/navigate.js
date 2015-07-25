/**
 * Created by Сергей on 23.02.14.
 */

var navigation = {

    /*HTML5 History*/
    history:  function(){
        var container = $('.container');
        function loadPage(href){
            container.load(href + ' .container > *', navigation.init);
        }
        var siteURL = "http://" + top.location.host.toString(),
            internalLinks = $("a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']");
        internalLinks.on('click', function(href){
            href = $(this).attr('href');
            history.pushState(null, null, href);
        });
        $(window).on('popstate', function(){
            loadPage(location.href);
        });
    },

    /*Get params url*/

    getUrlVars: function(link){
        var vars = [],
            hashes = link.slice(link.indexOf('/') + 1).split('/');
        for(var i = 0; i < hashes.length; i++)
        {
            var hash = hashes[i].split('/');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },

    setSeoStaff: function(){

    },
    /*Header*/

    nav: function(el){
        var container = $('.container');
        navigation.history();
        el.on('click', '.nav-list_item', function(e){
            e.preventDefault();
            var linkUrl = $(this).attr('href'),
                linkParams = navigation.getUrlVars(linkUrl),
                idUrl = linkParams[0],
                secondParamUrl = linkParams[1];

                if(!secondParamUrl) {
                    $.getJSON('/js/headers.json', function (result) {
                        $.map(result, function (res) {
                            $('title').html(res[idUrl].title)

                        });
                    });
                }else if(idUrl == 'tours'){
                    $.getJSON('/js/tours.json', function(result){
                        $.map(result, function(res) {
                            $('title').html(res[secondParamUrl].title)
                        });
                    });
                }else if(idUrl == 'guides'){
                    $.getJSON('/js/guides.json', function(result){
                        $.map(result, function(res) {
                            $('title').html(res[secondParamUrl].title)

                        });
                    });
                }


            if(!secondParamUrl){
                container.load('/content/routing.inc.php', 'id='+idUrl, navigation.init);
            }else{
                container.load('/content/routing.inc.php', 'id='+idUrl+'&'+idUrl+'='+secondParamUrl, navigation.init);
            }
        });
    }
};







$(function(){
    //navigation.nav($('.nav-list'));
    setHeight();
    checkCurrentPage();
    getTourTitles();

    navigation.init = function(){
        setHeight();
        checkCurrentPage();
        chooseForm();
        setParentOfAppendedList();
        changePageWithAppearing();
        toggleTheme();
    };

    /*Init variables*/

    var $container = $('.container'),
        windowWidth = $(window).outerWidth(),
        $header = $('header'),
        $sidebar = $('.sidebar-list');


    /*Header*/

    $header.on('click', '.nav_title', (function() {
        $('.sales').toggleClass('sales-zInd');
        $header.toggleClass("show_nav-list");
    }));

    $header.on('click', '.nav-list_item', (function(){
        $header.removeClass("show_nav-list");
        $('.sales').css({'z-index': 1000})

        $header.find(".nav-list_item").removeClass("current");
        $(this).addClass("current");

    }));
    if($(window).width() <= 799){
        $header.find('.expand_item').on('click', function(e){
            //e.preventDefault();
            $(this).toggleClass('extended').toggleClass('current');
            $(this).find('.inner-dropdown-submenu').slideToggle('fast');
            e.stopPropagation();
        });
    }
    /*Sidebar*/

    $(".tours_item, .guides_item").click(function(){
        $sidebar.removeClass("show_section_title").addClass("show_nav-list");
    });

    $sidebar.on('click', '.nav_title', function(){
        $sidebar.removeClass("show_section_title").addClass("show_nav-list");

    });

    $sidebar.find(".nav-list_item").click(function(){
        $sidebar.removeClass("show_nav-list").addClass("show_section_title");
    });

    setParentOfAppendedList();

    /*$(window).on('resize', function(){
        setParentOfAppendedList();
    });*/

    $(window).on('resize', function(){
        if($('.tours-list').hasClass('hidden')){
            appendToggle('guides-list')
        }else{
            appendToggle('tours-list')
        }
    });

    if(window.navigator.msMaxTouchPoints || Modernizr.touch){
        //alert('touch');
        $('.tour-item, .guide-item').on('click', function(){
            $('.tour-item, .guide-item').removeClass('hover');
            $(this).addClass('hover');
        });
    }

    /*FUNCTIONS*/


    /*Set section height*/

    function setHeight(){
        var androidDevice = $('html').hasClass('android');
        var $sectionSlide = $(".container").find(".height-viewport");
        var windowHeight = $(window).outerHeight();
        $sectionSlide.css({
            minHeight: windowHeight + "px"
        });
        $(window).on('resize',(function(){
            if(!androidDevice){
                windowHeight = $(window).outerHeight();
                $sectionSlide.css({
                    minHeight: windowHeight + "px"
                });
            }
        }));
        $(window).on('orientation',(function(){
            windowHeight = $(window).outerHeight();
            $sectionSlide.css({
                minHeight: windowHeight + "px"
            });
        }));
    }

    function changePageWithAppearing(){
        $('html, body').animate({
            scrollTop: $('body').offset().top
        }, 500);
        $container.hide().fadeIn('slow');
    }


    function appendToggle(parentOfList){
        var maxWindowWidth = document.documentElement.clientHeight >= document.documentElement.scrollHeight ? 800 : 783;
        windowWidth = $(window).outerWidth();
        if(windowWidth >= maxWindowWidth){
            $sidebar.find("img").remove();
            $('.' + parentOfList).find('li').each(function(){
                var imgSidebar,
                    titleImg = $(this).data('link');
                imgSidebar = ('<img src = /i/' + parentOfList + '/' + titleImg + '.jpg />');
                $(this).find('a').append(imgSidebar);
            });
        }else if(windowWidth <= maxWindowWidth){
            $sidebar.find("img").remove();
        }
    }


    function setParentOfAppendedList() {
        if(isTourPage || isThanks){
            $('.tours-list').removeClass('hidden');
            $('.guides-list').addClass('hidden');
            appendToggle('tours-list');
        }else if (isGuidePage || isThanks){
            $('.tours-list').addClass('hidden');
            $('.guides-list').removeClass('hidden');
            appendToggle('guides-list');
        }
    }

    function checkCurrentPage(){
        var links = navigation.getUrlVars(location.href);
        isThanks = links[5] == 'thanks';
        if(links[3] == 'tours' && links[4] && !isThanks){
            isTourPage = true;
        }else{
            isTourPage = false;
        }
        isGuidePage = links[3] == 'guides';
    }
    /*Form*/

    function chooseForm(){
        var links = navigation.getUrlVars(location.href);
        if(isTourPage){
            $('.form-container').load('/content/form/innerTourForm.php', getTourTitles);
        }else if(links[3] == 'contacts'){
            $('.form_box').load('/content/form/innerForm.php', getTourTitles);
        }
    }

});

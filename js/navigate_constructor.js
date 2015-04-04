/**
 * Created by Сергей on 23.02.14.
 */
function Navigation(){
/*Сделать history var и передать ее в nav посмотреть станет ли доступен container*/

    /*HTML5 History*/
    this.history = function(){
        var container = $('.container');
        var loadPage = function(href){
            container.load(href + " .container>*");
        };
        var siteURL = "http://" + top.location.host.toString(),
            internalLinks = $("a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']");
        internalLinks.on('click', function(href){
            href = $(this).attr('href');
            history.pushState({}, '', href);
        });
        $(window).on('popstate', function(){
            loadPage(location.href);
        });
    };

    /*Get params url*/
    function getUrlVars (link){
        var vars = [],
            hashes = link.slice(link.indexOf('/') + 1).split('/');
        for(var i = 0; i < hashes.length; i++)
        {
            var hash = hashes[i].split('/');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

    /*Header*/
    this.nav = function(el){
        this.history();
        var container = $('.container');
        el.on('click', '.list_item', function(e){
            e.preventDefault();
            var linkUrl = $(this).attr('href'),
                linkParams = getUrlVars(linkUrl),
                idUrl = linkParams[0],
                secondParamUrl = linkParams[1];
            $('.gallery').cycle('destroy');

            /*$.getJSON('/js/header.json', function(result){
                $.each(result, function(i, res){
                    if(i == "headers"){
                        $('title').html(res[linkParams[0]].title);
                        $('meta').attr('content', res[linkParams[0]].meta);
                    }
                });
            });*/

            if(!secondParamUrl){
                container.load('/content/routing.inc.php', 'id='+idUrl, setHeight);
            }else{
                container.load('/content/routing.inc.php', 'id='+idUrl+'&'+idUrl+'='+secondParamUrl, setHeight);
            }
        });
    }
}

var navigate = new Navigation;

/*Set section height*/
function setHeight(){
    var $sectionSlide = $(".container").find("section");
    var windowHeight = $(window).outerHeight();
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
}

$(function(){
    setHeight();
    navigate.nav($('header'));
});

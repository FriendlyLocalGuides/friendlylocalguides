<?  session_start();
    $result = $_SESSION['result'];
    $titleTour = $_SESSION['title'];
    $price = $_SESSION['price'];
    include_once 'content/header.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <meta content="width=device-width" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta charset="UTF-8"/>
    <meta content="<?=$meta?>" name="description">
    <script src="/js/lib/jquery-1.11.0.min.js"></script>
    <script src="/js/lib/modernizr.min.js"></script>
    <script src="/js/lib/jquery-ui.min.js"></script>
    <script src="/js/plugins/jquery.rateit.min.js"></script>
    <script src="/js/plugins/jquery.ba-throttle-debounce.min.js"></script>
    <script src="/js/plugins/jquery.cycle2.min.js"></script>
    <script src="/js/plugins/jquery.tools.min.js"></script>
    <script src="/js/plugins/placeholders.min.js"></script>
    <script src="/js/plugins/jquery.cover.js"></script>
    <script src="/js/plugins/jquery.swipebox.js"></script>
    <script src="/js/plugins/clockpicker.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="/js/lib/jquery.payment.js"></script>
    <script src="/js/navigate.js"></script>
    <script src="/js/base.js"></script>
    <link rel="shortcut icon" href="/i/fav.ico" type="image/x-icon">
    <link rel="icon" href="/i/fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/reset.css"/>
    <link href='//fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/css/base.css"/>
    <link rel="stylesheet" href="/css/font-awesome.css"/>
    <link rel="stylesheet" href="/css/sidebar.css"/>
    <link rel="stylesheet" href="/css/header.css"/>
    <link rel="stylesheet" href="/css/rateit.css"/>
    <link rel="stylesheet" href="/css/clockpicker.css"/>
    <link rel="stylesheet" href="/css/navigation.css"/>
    <link rel="stylesheet" href="/css/content.css"/>
    <link rel="stylesheet" href="/css/tours.css"/>
    <link rel="stylesheet" href="/css/jquery.cover.css"/>
    <link rel="stylesheet" href="/css/swipebox.css"/>
    <link rel="stylesheet" href="/css/css3-styles.css"/>
    <? include_once 'analyticstracking.php'?>
</head>
<body>
    <header class="clearfix">
        <div class="main_header">
            <a class="logo" href="/" title="Friendly Local Guides" ></a>
            <div class="navigation nav-list">
                <div class="nav_title">
                    <span class="menu_icon"></span>
                </div>
                <div class="nav-list_content ">
                    <nav class="nav-drop_down">
                        <div class="dropdown-submenu">
                            <div data-link="tours" class="expand_item" >
                                <div class="<? if($id == 'tours') echo 'current'?> tours_item  list_item nav-list_item" >Tours<i class="fa fa-plus"></i></div>
                                <div class="wrap-dropdown-submenu">
                                    <div class="inner-dropdown-submenu nav-drop_down">
                                        <a class="list_item nav-list_item" href="/moscow/tours">Moscow</a>
                                        <a class="list_item nav-list_item last_item" href="/saint-petersburg/tours">Saint Petersburg</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <div data-link="/<?=$city?>/guides" class="expand_item" >
                                <div class="<? if($id == 'guides') echo 'current'?> tours_item  list_item nav-list_item" >Guides<i class="fa fa-plus"></i></div>
                                <div class="wrap-dropdown-submenu">
                                    <div class="inner-dropdown-submenu nav-drop_down">
                                        <a class="list_item nav-list_item" href="/moscow/guides">Moscow</a>
                                        <a class="list_item nav-list_item last_item" href="/saint-petersburg/guides">Saint Petersburg</a>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        <a data-link="/--><?//=$city?><!--/guides" class="--><?// if($id == 'guides') echo 'current'?><!-- guides_item list_item nav-list_item" href="/--><?//=$city?><!--/guides">Guides</a>-->
                        <a class="<? if($id == 'about') echo 'current'?> list_item nav-list_item"  data-link="about" href="/about">About</a>
                        <a class="list_item blog_link" data-link="blog" href="/blog">Blog</a>
                        <a class="<? if($id == 'contact') echo 'current'?> list_item nav-list_item" data-link="contact" href="/contact">Contact</a>
                    </nav>
                </div>
            </div>
            <!--<a href="#" class="cart">
                <span class="cart_icon"></span>
                <span class="count_tours">3</span>
            </a>-->
            <menu class="social_links">
                <div class="fb"><a href="https://www.facebook.com/friendlylocalguides" target="_blank"></a></div>
                <div class="tw"><a href="https://twitter.com/FriendlyGuides" target="_blank"></a></div>
                <div class="gp"><a href="https://plus.google.com/b/113546718017692385903/113546718017692385903/posts/p/pub" target="_blank"></a></div>
                <div class="instagram"><a href="http://instagram.com/friendly.local.guides" target="_blank"></a></div>
            </menu>
        </div>
        <div class="sub_header">
            <h4></h4>
            <div class="price"></div>
            <a class="book_button" href="#">Book now</a>
        </div>
    </header>
    <article>
        <div class="container" >
            <?
                include 'content/routing.inc.php';
            ?>
        </div>
    </article>
    <footer>
        <div class="e-mail">info@friendlylocalguides.com</div>
        <div class="rights">&copy; Copyright 2015 Friendly Local Guides, LLC. All Rights Reserved</div>
    </footer>


    <!-- Google Code for tour guide Conversion Page -->
    <!-- Google Code for tour guide Conversion Page -->



    <!--pure chat-->
<!--    <script type='text/javascript'>	$(window).load(function(){(function () { var done = false;	var script = document.createElement('script');	script.async = true;	script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) {	if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {	var w = new PCWidget({ c: 'fd48cc66-4e56-4133-bb45-3b5540ea1f4a', f: true });	done = true; }	};	})()});	</script>-->
    <!--end of pure chat-->
</body>
</html>
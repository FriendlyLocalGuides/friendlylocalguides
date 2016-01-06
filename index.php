<?  session_start();
    $result = $_SESSION['result'];
    $titleTour = $_SESSION['title'];
    $price = $_SESSION['price'];
    $duration = $_SESSION['duration'];
    include_once 'content/header.inc.php';
    include_once 'content/routing.php';
    if($id != 'editor'){
?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <meta content="width=device-width" name="viewport">
    <meta name="viewport" content="initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta charset="UTF-8"/>
    <meta content="<?=$meta?>" name="description">
    <link rel="shortcut icon" href="/i/fav.ico" type="image/x-icon">
    <link rel="icon" href="/i/fav.ico" type="image/x-icon">
    <link href='//fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/styles.css"/>


    <script src="/js/lib/jquery-1.11.0.min.js"></script>
    <script src="/js/plugins/jquery.cover.js"></script>
    <script src="/js/lib/modernizr.min.js"></script>
    <script src="/js/lib/jquery-ui.min.js"></script>
    <script src="/js/lib/device.min.js"></script>
    <script src="/js/plugins/jquery.rateit.min.js"></script>
    <script src="/js/plugins/jquery.cycle2.min.js"></script>
    <script src="/js/plugins/jquery.tools.min.js"></script>
    <script src="/js/plugins/placeholders.min.js"></script>
    <script src="/js/plugins/jquery.swipebox.js"></script>
    <script src="/js/plugins/clockpicker.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="/js/lib/jquery.payment.js"></script>
    <? require_once 'Stripe/stripe_set_publishable_key.php'?>
    <script src="/js/navigate.js"></script>
    <script src="/js/base.js"></script>
    <? include_once 'analyticstracking.php'?>
    <? include_once 'yandexmetrika.php'?>
</head>
<body>
    <header class="clearfix">
        <div class="main_header">
            <a class="logo" href="/" title="Friendly Local Guides">
                <img src="/i/logo.png" alt="Guided tours in Moscow Saint-Petersburg and San Francisco">
            </a>
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
                                        <a class="list_item nav-list_item" href="/saint-petersburg/tours">Saint Petersburg</a>
                                        <a class="list_item nav-list_item" href="/new-york/tours">New York</a>
                                        <a class="list_item nav-list_item" href="/san-francisco/tours">San Francisco</a>
                                        <a class="list_item nav-list_item" href="/lisbon/tours">Lisbon</a>
                                        <a class="list_item nav-list_item" href="/milan/tours">Milan</a>
                                        <a class="list_item nav-list_item" href="/los-angeles/tours">Los Angeles</a>
                                        <a class="list_item nav-list_item last_item" href="/washington/tours">Washington</a>
                                        <a class="list_item nav-list_item" href="/chicago/tours">Chicago</a>
                                        <a class="list_item nav-list_item last_item" href="/paris/tours">Paris</a>
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
        <div class="e-mail">info@friendlylocalguides.com |</div>
        <a class="to-sitemap" href="/sitemap">sitemap</a>
        <div class="rights">&copy; Copyright 2015 Friendly Local Guides, LLC. All Rights Reserved</div>
    </footer>
    <!--pure chat-->
<!--    <script type='text/javascript'>	$(window).load(function(){(function () { var done = false;	var script = document.createElement('script');	script.async = true;	script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) {	if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {	var w = new PCWidget({ c: 'fd48cc66-4e56-4133-bb45-3b5540ea1f4a', f: true });	done = true; }	};	})()});	</script>-->
    <!--end of pure chat-->
</body>
</html>
<?}?>

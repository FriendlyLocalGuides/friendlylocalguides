<?php
require($_SERVER['DOCUMENT_ROOT'].'/admin/config.php');
if(!$user->is_logged_in()){ header('Location:'. '/admin/login.php'); }
$url = strtolower(strip_tags(trim($_GET['tour'])));
try {
    require_once $_SERVER["DOCUMENT_ROOT"]."/content/config.php";
}
catch(PDOException $e) {
    echo $e->getMessage();
}

switch($city){
    case 'moscow': $tourTable = 'tours_moscow'; break;
    case 'saint-petersburg': $tourTable = 'tours_spb'; break;
}
$sql_tour = "SELECT title, title_2, subtitle, price, duration, description, img_link_item FROM $tourTable WHERE url = '$url'";

foreach ($dbh->query($sql_tour) as $row){
    $titleTour = $row['title'];
    if($row['title_2']){
        $title2Tour = $row['title_2'];
    }
    $subtitleTour = $row['subtitle'];
    $price = $row['price'];
    $duration = $row['duration'];
    $descriptionTour = $row['description'];
    $imgTourItem = $row['img_link_item'];
}

$imgId = [];
$imagesLinks = [];
$thumbsLinks = [];
$imgAlt = [];
$imgTitle = [];
$sql_images = "select * from tours_images where url = '$url' AND city='$city'";
foreach ($dbh->query($sql_images) as $row){
    array_push($imgId, $row['id']);
    array_push($imagesLinks, $row['img_link']);
    array_push($thumbsLinks, $row['thumb_link']);
    array_push($imgAlt, $row['alt']);
    array_push($imgTitle, $row['title_item']);
}

$splashScreenId = $imgId[0];
$splashScreenLink = $imagesLinks[0];
$splashScreenThumbLink = $thumbsLinks[0];
$splashScreenAlt = $imgAlt[0];
$splashScreenTitle = $imgTitle[0];

?>
        <script src="/js/lib/jquery-1.11.0.min.js"></script>
        <script src="/js/lib/modernizr.min.js"></script>
        <script src="/js/lib/jquery-ui.min.js"></script>
        <script src="/js/plugins/clockpicker.js"></script>
        <script src="/js/plugins/jquery.tools.min.js"></script>
        <script src="/js/plugins/jquery.cover.js"></script>
        <script src="/js/plugins/jquery.swipebox.js"></script>
        <script src="/js/lib/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/lib/jquery.payment.js"></script>
        <script src="/js/navigate.js"></script>
        <script src="/js/base.js"></script>
        <script src="/ckeditor/ckeditor.js"></script>

        <link rel="shortcut icon" href="/i/fav.ico" type="image/x-icon">
        <link rel="icon" href="/i/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="/css/reset.css"/>
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <link href='//fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/jquery-ui.min.css"/>
        <link rel="stylesheet" href="/css/base.css"/>
        <link rel="stylesheet" href="/css/font-awesome.css"/>
        <link rel="stylesheet" href="/css/sidebar.css"/>
        <link rel="stylesheet" href="/css/header.css"/>
        <link rel="stylesheet" href="/css/navigation.css"/>
        <link rel="stylesheet" href="/css/content.css"/>
        <link rel="stylesheet" href="/css/tours.css"/>
        <link rel="stylesheet" href="/css/jquery.cover.css"/>
        <link rel="stylesheet" href="/css/swipebox.css"/>
        <link rel="stylesheet" href="/css/css3-styles.css"/>
        <link rel="stylesheet" href="/css/texteditor.css"/>
        <script type="text/javascript">
            $(window).load( function() {
                $(document).on('click', '.popover-alt', function(e){
                    $('.wrap-img-info').fadeOut();
                    $(this).siblings('.wrap-img-info').fadeIn();
                    $('.main-image-wrapper').addClass('pointer-events-none');
                });

                $(document).click( function(e){
                    if (!$(e.target).closest('.popover-alt').length && !$(e.target).closest('.wrap-img-info').length) {
                        $('.wrap-img-info').fadeOut();
                        $('.main-image-wrapper').removeClass('pointer-events-none');
                    }
                });
                var editor = CKEDITOR.replace('txtEditor'),
                    city,
                    imgRootDir,
                    imgDir,
                    coverDir,
                    coverImg = false,
                    thumbImg = false,
                    currentImg,
                    coverImgName,
                    tour_url,
                    $title_long_container = $('.title-long-container'),
                    $title_long_txt = $title_long_container.find('.too_long_title'),
                    $title = $('.title'),
                    $title_long = $('.title-long'),
                    $title_for_sending = $('.title-for-sending'),
                    imgFile = document.getElementById("tour-gallery"),

                    imagesArray;

                //styles for CKEDITOR
                CKEDITOR.config.contentsCss = '/css/ckeditor-custom.css';
                function title(){
                    if($title_long.val() != ""){
                        $title_long_txt.text($title_long.val());
                        $title_for_sending.val($title.val() + " " + $title_long_container.html());
                    }else{
                        $title_for_sending.val($title.val());
                    }
                }



                /*var cover_img = document.getElementById('cover_image');

                cover_img.addEventListener('change', function(){
                    coverImgName = this.files[0].name;
                    for(var i = 0, numFiles = this.files.length; i < numFiles; i++){
                        imgDir.push(this.files[i].name);
                    }
                }, false);*/



                function picsCreator(){

                    var tumb =  '<a rel="gallery-1" class="thumb swipebox" href="" title="">' +
                                    '<img src="" alt=""/>' +
                                '</a>',
                        tour_gallery_item = '<li>'+
                                                '<input class="file-upload" type="file" name="picture" placeholder="Picture"/>'+
                                                '<input class="form-control title" type="text" placeholder="Title"/>'+
                                                '<input class="form-control alt" type="text" placeholder="Alt"/>'+
                                                '<div class="btn btn-success add-tumb">Add picture</div>'+
                                                '<div class="btn btn-danger remove-tumb">Remove picture</div>'+
                                            '</li>',
                        $tumbFieldsList = $('#tour-gallery'),
                        $galleryList = $('.thumb-list'),
                        $galleryImgsDir = '/i/gallery/tours/',
                        $mainImg = $('.main-image');

                    $tumbFieldsList.on('click','.add-tumb:last', function(){
                        $tumbFieldsList.find('ul').append(tour_gallery_item);
                        $galleryList.append(tumb);

                        $tumbFieldsList.find('li').each(function(i,el){
                            $(el).attr('data-img', i);
                        });
                    });


                    $tumbFieldsList.on('click','.remove-tumb', function(){
                        var currentLi = $(this).parent();
                        currentLi.remove();

                        $tumbFieldsList.find('li').each(function(i,el){
                            $(el).attr('data-img', i);
                        });
                        $galleryList.find('.thumb').each(function(i,el){
                            if(currentLi.data('img') == i){
                                $(el).remove();
                            }
                        });
                    });


                    $('#tour-form').on('change','.splash-screen:file', function(){
                        var currentEl = $(this),
                            name = currentEl[0].files[0].name,
                            alt = currentEl.next('input.alt').val(),
                            src = $galleryImgsDir + city + '/' + imagesDir + '/' + name;

                        $('.cover-img').attr({
                            alt: alt,
                            src: src
                        });
                    });

                    $tumbFieldsList.on('change','.main-image-fields', function(){
                        var currentEl = $(this),
                            alt = currentEl.find('input.alt').val(),
                            title = currentEl.find('input.title').val(),
                            name = currentEl.find('input:file')[0].files[0].name,
                            src = $galleryImgsDir + city + '/' + imagesDir + '/' + name;
                        $($mainImg).attr({
                            title: title,
                            href: src
                        });
                        $($mainImg).find('img').attr({
                            alt: alt,
                            src: src
                        });
                    });

                    $tumbFieldsList.on('change','li', function(){
                        var currentLi = $(this),
                            alt = currentLi.find('input.alt').val(),
                            title = currentLi.find('input.title').val(),
                            name = currentLi.find('input:file')[0].files[0].name,
                            href = $galleryImgsDir + city + '/' + imagesDir + '/' + name,
                            src = $galleryImgsDir + city + '/' + imagesDir + '/small/' + name;

                        $galleryList.find('.thumb').each(function(i,el){
                            if(currentLi.data('img') == i){
                                $(el).attr({
                                    title: title,
                                    href: href
                                });
                                $(el).find('img').attr({
                                    alt: alt,
                                    src: src
                                });
                            }
                        });
                    });
                }
//                picsCreator();

                var reader;
                var progress = document.querySelector('.percent');
                function errorHandler(evt) {
                    switch(evt.target.error.code) {
                        case evt.target.error.NOT_FOUND_ERR:
                            alert('File Not Found!');
                            break;
                        case evt.target.error.NOT_READABLE_ERR:
                            alert('File is not readable');
                            break;
                        case evt.target.error.ABORT_ERR:
                            break; // noop
                        default:
                            alert('An error occurred reading this file.');
                    }
                }

                function updateProgress(evt) {
                    // evt is an ProgressEvent.
                    if (evt.lengthComputable) {
                        var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
                        // Increase the progress bar length.
                        if (percentLoaded < 100) {
                            progress.style.width = percentLoaded + '%';
                            progress.textContent = percentLoaded + '%';
                        }
                    }
                }
                function handleFileSelect(evt, output) {
                    // Reset progress indicator on new file selection.
                    progress.style.width = '0%';
                    progress.textContent = '0%';

                    reader = new FileReader();
                    reader.onerror = errorHandler;
                    reader.onprogress = updateProgress;
                    reader.onloadstart = function(e) {
                        $('.progress_bar').addClass('loading');
                    };
                    reader.onload = function(e) {
                        // Ensure that the progress bar displays 100% at the end.
                        progress.style.width = '100%';
                        progress.textContent = '100%';
                        $(output).attr('src', e.target.result);
                        setTimeout(function(){
                            $('.progress_bar').removeClass('loading')
                        }, 2000);
                    };

                    tour_url = $('#tour-url-hidden').val();
                    city = $('#city').val().toLowerCase();
                    imgDir = "/i/tours/" + city + "/" + tour_url;
                    $(evt.currentTarget).siblings('.img_link').val(imgDir + "/" + evt.currentTarget.files[0].name);
                    $(evt.currentTarget).siblings('.thumb_link').val(imgDir + "/small/" + evt.currentTarget.files[0].name);
                    reader.readAsDataURL(evt.currentTarget.files[0]);
                }

                tour_url = $('#tour-url-hidden').val();
                city = $('#city').val().toLowerCase();
                imgDir = "/i/tours/" + city + "/" + tour_url;
                $(document).on('change', '.btn-img-item', function(e){
                    coverDir = "/i/tours-list/" + city;
                    $('.img_link_item').val(coverDir + "/" + e.currentTarget.files[0].name);
                    $('.splash_img_link').val(imgDir + "/" + e.currentTarget.files[0].name);

                    handleFileSelect(e,'.tour-item-img');
                    handleFileSelect(e,'.cover-img');
                });
                $(document).on('change', '.splash-screen', function(e){
                    coverDir = "/i/tours-list/" + city;
                    $('.splash_img_link').val(imgDir + "/" + e.currentTarget.files[0].name);
                    $('.img_link_item').val(coverDir + "/" + e.currentTarget.files[0].name);

                    handleFileSelect(e,'.cover-img');
                    handleFileSelect(e,'.tour-item-img');
                });

                $(document).on('change', '.main-image-wrapper .file-upload', function(e){
                    handleFileSelect(e,'.main-image img');
                });
                $(document).on('change', '.thumb-list .file-upload', function(e){
                    handleFileSelect(e, $(this).siblings('a').find('img'));
                });

                //synchronize changing of value

                $("input[name=title]").on('keyup', function(){
                    $("input[name=title]").val($(this).val())
                });

                $("input[name=subtitle]").on('keyup', function(){
                    $("input[name=subtitle]").val($(this).val())
                });

                $("input[name=price]").on('keyup', function(){
                    $("input[name=price]").val($(this).val())
                });

                $("input[name=duration]").on('keyup', function(){
                    $("input[name=duration]").val($(this).val())
                });

                $("#tour-url-visible").on('keyup', function(){
                    $("#tour-url-hidden").val( $(this).val());
                });

                $('#update-tour').on('click', function(e){
                    e.preventDefault();
                    $("input[name=action]").val('update');
                    $('#tour-url-hidden').val($('#tour-url-visible').val());
                    tour_url = $('#tour-url-hidden').val();
                    city = $('#city').val().toLowerCase();
                    imgDir = "/i/tours/" + city + "/" + tour_url;
                    CKEDITOR.instances.txtEditor.updateElement();
                    $.post(
                        "/content/tour-creator.php",
                        $("#tour-form").serialize(),function(result){
                            console.log(result);
                        }
                    );

                    var imgFiles = document.querySelectorAll(".file-upload");

                    for(var i = 0; i < imgFiles.length; i++){
                        var imagesArray = imgFiles[i].files;
                        thumbImg = !!$(imgFiles[i]).hasClass('thumb-input');
                        coverImg = !!$(imgFiles[i]).hasClass('cover-input');
                        sendFile(imagesArray[0], imagesArray[0], imagesArray[0]);
                    }
                });
                $('#add-tour').on('click', function(e){
                    e.preventDefault();
                    $("input[name=action]").val('add');
                    $('#tour-url-hidden').val($('#tour-url-visible').val());
                    tour_url = $('#tour-url-hidden').val();
                    city = $('#city').val().toLowerCase();
                    imgDir = "/i/tours/" + city + "/" + tour_url;
                    CKEDITOR.instances.txtEditor.updateElement();
                    $.post(
                        "/content/tour-creator.php",
                        $("#tour-form").serialize(),function(result){
                            console.log(result);
                        }
                    );

                    var imgFiles = document.querySelectorAll(".file-upload");

                    for(var i = 0; i < imgFiles.length; i++){
                        var imagesArray = imgFiles[i].files;
                        thumbImg = !!$(imgFiles[i]).hasClass('thumb-input');
                        coverImg = !!$(imgFiles[i]).hasClass('cover-input');
                        sendFile(imagesArray[0], imagesArray[0], imagesArray[0]);
                    }
                });

                function sendFile(file, fileThumb, coverFile) {
                    var uri = "content/image_uploader.php",
                        xhr = new XMLHttpRequest(),
                        fd = new FormData(),
                        dir = imgDir,
                        coverDirectory = coverDir;
                    xhr.open("POST", uri, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Handle response.
                            console.log(xhr.responseText); // handle response.
                        }
                    };
                    fd.append('myFile', file);
                    if(thumbImg){
                        console.log(thumbImg);
                        fd.append('myThumbFile', fileThumb);
                    }
                    if(coverImg) {
                        fd.append('myCoverFile', coverFile);
                    }
                    fd.append('myDir', dir);
                    fd.append('myCoverDir', coverDirectory);

                    // Initiate a multipart/form-data upload
                    xhr.send(fd);
                }


            });
            $(document).on('click', '.tour-item', function(){
                $(this).toggleClass('hover')
            });
            $(document).on('click', '.tour-item input', function(e){
                e.stopPropagation();
            });

        </script>
<header class="clearfix">
    <div class="main_header">

        <div class="input-groups">
            <input id="update-tour" class="btn btn-lg btn-success pull-left" value="Update tour" type="submit"/>
            <input id="add-tour" class="btn btn-lg  btn-primary pull-right" value="Publish tour" type="submit"/>
        </div>
    </div>
</header>
        <section class="text-editor-container">
            <form id="tour-form" class="text-editor" enctype="multipart/form-data">
                <div class=" text-editor-inner">
                    <div class="input-groups">
                        <input id="city" class="form-control" type="text" name="city" placeholder="City" value="<?=$city?>"/>
                        <input id="tour-url-visible" class="form-control" type="text" placeholder="Link to the tour" value="<?=$url?>"/>
                        <input id="tour-url-hidden" type="hidden" name="url" placeholder="Link to the tour" value="<?=$url?>"/>
                    </div>
                        <figure class="tour-item content_box tours-list_new">
                            <img class="tour-item-img" src="<?=$imgTourItem;?>" alt=""/>
                            <figcaption>
                                <div class="img-item-upload">
                                    <input class="btn-img-item cover-input file-upload" type="file">
                                    <input class="img_link_item" type="hidden" name="img_link_item" value="<?=$imgTourItem;?>">
                                    <div class="progress_bar"><div class="percent">0%</div></div>
                                </div>
                                <h2>
                                    <input class="form-control title_item" type="text" placeholder="Title of the tour" name="title" value="<?=$titleTour?>"/>
                                </h2>
                                <div class="price">
                                    $<input class="form-control" type="text" name="price" placeholder="price" value="<?=$price?>"/> &mdash;
                                    <input class="form-control" type="text" name="duration" placeholder="duration" value="<?=$duration?>"/>
                                </div>
                                <h3>
                                    <input class="form-control" type="text" name="subtitle" placeholder="Subtitle - short description" value="<?=$subtitleTour?>"/>
                                </h3>
                                <div class="buttons-container">
                                    <a class="view-button" href="/<?=$city?>/tours/<?=$url;?>">View tour</a>
                                    <a class="book_button" href="/<?=$city?>/tours/<?=$url;?>/#book">Book tour</a>
                                </div>
                            </figcaption>
                        </figure>
<!--                    <input id="cover_image" type="file" name="img_link[]" />-->

                    <section class="view_tour_wrapper">
                        <div class="header_title">
                            <div class="header_tour_content">
                                <h3>
                                    <div class="inline-block">
                                        <input class="form-control title" type="text" name="title" placeholder="Title of the tour" value="<?=$titleTour?>"/>
                                        <input class="form-control title-long" type="text" name="title_2" placeholder="Second part of the title if it's too long" value="<?=$title2Tour?>"/>
                                    <!--<span><?/*=$titleTour*/?></span> <span class='too_long_title'><br><?/*=$title2Tour*/?></span>-->
                                    </div>
                                </h3>
                                <h4>
                                    <input class="form-control" type="text" name="subtitle" placeholder="Subtitle - short description" value="<?=$subtitleTour?>"/>
<!--                                    --><?//=$subtitleTour?>
                                </h4>
                            </div>
                            <div class="price">
                                $<input class="form-control" type="text" name="price" placeholder="price" value="<?=$price?>"/>
                                <input class="form-control" type="text" name="duration" placeholder="duration" value="<?=$duration?>"/>
                                <?/*=$price*/?><!-- &mdash; --><?/*=$duration*/?>
                            </div>
                            <a class="book_button" href="#">Book now</a>
                        </div>

                        <section class="view_tour height-viewport">
                            <input class="img_id" type="hidden" value="<?=$splashScreenId?>" name="id[]"/>
                            <input class="splash_img_link" type="hidden" value="<?=$splashScreenLink?>" name="img_link[]"/>
                            <input class="thumb_link" type="hidden" value="<?=$splashScreenThumbLink?>" name="thumb_link[]"/>
                            <div class="text-center absolute">
                                <div class="input-groups">
                                    <input class="splash-screen cover-input file-upload" type="file"  placeholder="Splash Screen" />
                                    <input type="text" class="form-control" name="alt[]" placeholder="Alt for cover picture" value="<?=$splashScreenAlt?>" />
                                    <input type="text" class="form-control" name="title_item[]" placeholder="Title for cover picture" value="<?=$splashScreenTitle?>" />
                                </div>
                            </div>
                            <div class="overlay_view_tour"></div>
                            <img class="cover-img" src="<?=$splashScreenLink?>" alt="<?=$splashScreenAlt?>" />

                            <div class="scroll_down">
                                <div class="scroll_down_container">
                                    <div class="scroll_down_text">Details</div>
                                    <div class="scroll_down_icon"></div>
                                </div>
                            </div>
                        </section>
                    </section>
                    <section class="blacken gallery height-viewport">
                        <div class="wrap_gallery">
                            <div class="main-image-wrapper">
                                <input class="main-image-upload file-upload" type="file" placeholder="Splash Screen"/>
                            <div class="text-center absolute">
                                <div class="input-groups">
                                    <input type="text" class="form-control" name="alt[]" placeholder="Alt for main/first gallery picture" value="<?=$imgAlt[1];?>">
                                    <input type="text" class="form-control" name="title_item[]" placeholder="Title for main/first gallery picture" value="<?=$imgTitle[1];?>">
                                </div>
                            </div>
                                <input class="img_id" type="hidden" value="<?=$imgId[1]?>" name="id[]"/>
                                <input class="img_link" type="hidden" value="<?=$imagesLinks[1]?>" name="img_link[]"/>
                                <input class="thumb_link_fake" type="hidden" value="<?=$thumbsLinks[1];?>" name="thumb_link[]"/>
                                <a rel="gallery-1" class="main-image swipebox parent-upload" href="<?=$imagesLinks[1];?>" title="<?=$imgTitle[1];?>">
                                    <img src="<?=$imagesLinks[1];?>" alt="<?=$imgAlt[1];?>"/>
                                </a>
                            </div>

                            <ul class="thumb-list">

                                <?
                                $counter = 0;
                                for($i = 2; $i < count($imagesLinks); $i++){
                                    ?>
                                    <li>
                                        <input class="thumb-input file-upload" type="file"/>
                                        <input class="img_id" type="hidden" value="<?=$imgId[$i]?>" name="id[]"/>
                                        <input class="img_link" type="hidden" value="<?=$imagesLinks[$i]?>" name="img_link[]"/>
                                        <input class="thumb_link" type="hidden" value="<?=$thumbsLinks[$i];?>" name="thumb_link[]"/>
                                        <a rel="gallery-1" class="thumb swipebox parent-upload" href="<?=$imagesLinks[$i]?>" title="<?=$imgTitle[$i];?>">
                                            <img src="<?=$thumbsLinks[$i];?>" alt="<?=$imgAlt[$i];?>"/>
                                        </a>
                                        <button type="button" class="btn btn-xs btn-primary popover-alt" >Alt/Title</button>
                                        <div class="wrap-img-info">
                                            <input type="text" class="form-control" name="alt[]" placeholder="Alt" value="<?=$imgAlt[$i];?>" />
                                            <input type="text" class="form-control" name="title_item[]" placeholder="Title" value="<?=$imgTitle[$i];?>" />
                                            <div class="arrow"></div>
                                        </div>
                                    </li>
                                    <?
                                }
                                ?>
                            </ul>

                        </div>

                    </section>
                    <div class="textEditorWraper">
                        <textarea id="txtEditor" name="description">
                            <?=$descriptionTour?>
                        </textarea>
                    </div>
                    <!--<div id="tour-gallery">
                        <div class="main-image-fields">
                            <input class="file-upload" type="file" name="picture" placeholder="Main Picture"/>
                            <input class="form-control title" type="text" placeholder="Title"/>
                            <input class="form-control alt" type="text" placeholder="Alt"/>
                        </div>
                        <ul class="list-unstyled">
                            <li data-img="0">
                                <input class="file-upload" type="file" name="picture" placeholder="Picture"/>
                                <input class="form-control title" type="text" placeholder="Title"/>
                                <input class="form-control alt" type="text" placeholder="Alt"/>
                                <div class="btn btn-success add-tumb">Add picture</div>
                                <div class="btn btn-danger remove-tumb">Remove picture</div>
                            </li>
                        </ul>
                    </div>-->
                </div>
                <!--SET ONE OF ACTIONS: EITHER INSERT OR UPDATE-->
                <input type="text" hidden name="action">
            </form>
        </section>
<footer>
    <div class="e-mail">info@friendlylocalguides.com | </div>
    <a href="/sitemap"> &nbsp;sitemap</a>
    <div class="rights">&copy; Copyright 2015 Friendly Local Guides, LLC. All Rights Reserved</div>
</footer>
<script>
    $(function(){
        $('.cover-img').cover();
    })
</script>
    <!--</body>
</html>-->
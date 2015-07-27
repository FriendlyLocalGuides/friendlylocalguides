<?php
$tour = strtolower(strip_tags(trim($_GET['tour'])));
try {
    require_once "/content/config.php";
}
catch(PDOException $e) {
    echo $e->getMessage();
}

switch($city){
    case 'moscow': $tourTable = 'tours_moscow'; break;
    case 'saint-petersburg': $tourTable = 'tours_spb'; break;
}
$sql_tour = "SELECT title, title_2, subtitle, price, duration, description, img_link_item FROM $tourTable WHERE url = '$tour'";

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

$imagesLinks = [];
$thumbsLinks = [];
$imgAlt = [];
$imgTitle = [];
$sql_images = "select * from tours_images where tour = '$tour' AND city='$city'";
foreach ($dbh->query($sql_images) as $row){
    array_push($imagesLinks, $row['img_link']);
    array_push($thumbsLinks, $row['thumb_link']);
    array_push($imgAlt, $row['alt']);
    array_push($imgTitle, $row['title']);
}

$splashScreenLink = $imagesLinks[0];
$splashScreenAlt = $imgAlt[0];
$splashScreenTitle = $imgTitle[0];

?>
<!--<html>
    <head>

        <script src="//code.jquery.com/jquery-2.1.0.min.js"></script>-->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="/ckeditor/ckeditor.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/texteditor.css"/>
        <link rel="stylesheet" href="/css/tours.css"/>
        <script type="text/javascript">
            $(window).load( function() {

                var editor = CKEDITOR.replace('txtEditor'),
                    city,
                    imgDir,
                    coverImgName,
                    imagesDir,
                    $title_long_container = $('.title-long-container'),
                    $title_long_txt = $title_long_container.find('.too_long_title'),
                    $title = $('.title'),
                    $title_long = $('.title-long'),
                    $title_for_sending = $('.title-for-sending'),
                    imgFile = document.getElementById("tour-gallery"),
                    imgFiles = document.querySelectorAll(".file-upload"),
                    imagesArray;
                function title(){
                    if($title_long.val() != ""){
                        $title_long_txt.text($title_long.val());
                        $title_for_sending.val($title.val() + " " + $title_long_container.html());
                    }else{
                        $title_for_sending.val($title.val());
                    }
                }



                var cover_img = document.getElementById('cover_image');

                cover_img.addEventListener('change', function(){
                    coverImgName = this.files[0].name;
                    for(var i = 0, numFiles = this.files.length; i < numFiles; i++){
                        imgDir.push(this.files[i].name);
                    }
                }, false);

                $('#tour-form').on('change','input[name=city]', function() {
                    city = $(this).val().toLowerCase();
                });

                $('#tour-form').on('change','input[name=images-dir]', function() {
                    imagesDir = $(this).val().toLowerCase();
                });

                $('#tour-gallery').on('change','input:file', function(){
                    imgFiles = document.querySelectorAll(".file-upload");
                });
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
                picsCreator();


                $('#add-tour').on('click', function(e){
                    e.preventDefault();
                    title();
                    $('.gallery-data').val($('.wrapper-gallery').html());
                    $('.cover-img-data').val($('.wrapper-cover-img').html());
                    imagesDir = $("input[name=images-dir]").val().toLowerCase();
                    city = $("input[name=city]").val().toLowerCase();

                    CKEDITOR.instances.txtEditor.updateElement();
                    $.post(
                        "/content/tour-creator.php",
                        $("#tour-form").serialize(),function(result){
                            console.log(result);
                        }
                    );
                    if(imgFiles[0].files.length){
                        for(var i = 0; i < imgFiles.length; i++){
                            imagesArray = imgFiles[i].files;
                            sendFile(imagesArray[0]);
                        }
                    }
                });


                function sendFile(file) {
                    var uri = "../image_uploader.php";
                    var xhr = new XMLHttpRequest();
                    var fd = new FormData();
                    var dir = city + "/" + imagesDir;
                    xhr.open("POST", uri, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Handle response.
                            alert(xhr.responseText); // handle response.
                        }
                    };
                    fd.append('myFile', file);
                    fd.append('myDir', dir);
                    // Initiate a multipart/form-data upload
                    xhr.send(fd);
                }
            });
            $(document).on('click', '.tour-item', function(){
                $(this).toggleClass('hover')
            })
            $(document).on('click', '.tour-item input', function(e){
                e.stopPropagation();
            })
        </script>
   <!-- </head>
    <body>-->
    <ul>
        <li>
            <a href="http://friendlylocalguides/index.php?id=editor&city=moscow&tour=free-tour">Moscow Free Tour</a>
        </li>
    </ul>
        <section class="text-editor-container">
            <div class="title-long-container" hidden="hidden"><br/><span class='too_long_title'></span></div>
            <form id="tour-form" class="text-editor" enctype="multipart/form-data">
                <div class="input-groups">
                    <input class="form-control" type="text" name="city" placeholder="City" value="<?=$city?>"/>
                    <input class="form-control" type="text" name="link" placeholder="Link to the tour" value="<?=$tour?>"/>
                    <input class="form-control" type="text" name="images-dir" placeholder="Name folder with all images of this tour"/>
                        <figure class="tour-item content_box tours-list_new">
                            <img src="<?=$imgTourItem;?>" alt=""/>
                            <figcaption>
                                <h2>
                                    <input class="form-control title_item" type="text" placeholder="Title of the tour" value="<?=$titleTour?>"/>
                                    <?=$titleTour;?>
                                </h2>
                                <div class="price">
                                    <input class="form-control" type="text" name="price" placeholder="price" value="<?=$price?>"/>
                                    <input class="form-control" type="text" name="duration" placeholder="duration" value="<?=$duration?>"/>
                                    $<?=$price;?> — <?=$duration;?>
                                </div>
                                <h3>
                                    <input class="form-control" type="text" name="subtitle" placeholder="subtitle" value="<?=$subtitleTour?>"/>
                                    <?=$subtitleTour;?>
                                </h3>
                                <div class="buttons-container">
                                    <a class="view-button" href="/<?=$city?>/tours/<?=$tour;?>">View tour</a>
                                    <a class="book_button" href="/<?=$city?>/tours/<?=$tour;?>/#book">Book tour</a>
                                </div>
                            </figcaption>
                        </figure>
                    <input id="cover_image" type="file" name="cover_image" />

                    <section class="view_tour_wrapper">
                        <div class="header_title">
                            <div class="header_tour_content">
                                <h3>
                                    <input class="form-control title" type="text" name="title" placeholder="Title of the tour" value="<?=$titleTour?>"/>
                                    <input class="form-control title-long" type="text" placeholder="Second part of the title if it's too long" value="<?=$title2Tour?>"/>
                                    <span><?=$titleTour?></span> <span class='too_long_title'><br><?=$title2Tour?></span>
                                </h3>
                                <h4>
                                    <input class="form-control" type="text" name="subtitle" placeholder="subtitle" value="<?=$subtitleTour?>"/>
                                    <?=$subtitleTour?>
                                </h4>
                            </div>
                            <div class="price">
                                <input class="form-control" type="text" name="price" placeholder="price" value="<?=$price?>"/>
                                <input class="form-control" type="text" name="duration" placeholder="duration" value="<?=$duration?>"/>
                                <?=$price?> &mdash; <?=$duration?>
                            </div>
                            <a class="book_button" href="#">Book now</a>
                        </div>

                        <div class="overlay_view_tour"></div>
                        <section class="view_tour height-viewport">
                            <img class="cover-img" src="<?=$splashScreenLink?>" alt="<?=$splashScreenAlt?>" />

                            <div class="scroll_down">
                                <div class="scroll_down_container">
                                    <div class="scroll_down_text">Details</div>
                                    <div class="scroll_down_icon"></div>
                                </div>
                            </div>
                        </section>
                    </section>
                    <input class="splash-screen file-upload" type="file" placeholder="Splash Screen"/>
                    <input class="form-control alt" type="text" placeholder="Alt for splash screen"/>
                    <input class="cover-img-data" type="text" name="splashscreen" hidden="hidden"/>
                    <textarea id="txtEditor" name="description">
                        <?=$descriptionTour?>
                    </textarea>
                    <input class="gallery-data" name="gallery" type="text" hidden="hidden"/>

                    <section class="blacken gallery height-viewport">
                        <div class="wrap_gallery">
                            <a rel="gallery-1" class="main-image swipebox" href="<?=$imagesLinks[1];?>" title="<?=$imgTitle[1];?>">
                                <img src="<?=$imagesLinks[1];?>" alt="<?=$imgAlt[1];?>"/>
                            </a>

                            <div class="thumb-list">
                                <?
                                for($i = 2; $i < count($imagesLinks); $i++){
                                    ?>
                                    <a rel="gallery-1" class="thumb swipebox" href="<?=$imagesLinks[$i]?>" title="<?=$imgTitle[$i];?>">
                                        <img src="<?=$thumbsLinks[$i];?>" alt="<?=$imgAlt[$i];?>"/>
                                    </a>
                                    <?
                                }
                                ?>
                            </div>

                        </div>

                    </section>
                    <div id="tour-gallery">
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
                    </div>
                </div>
                <input id="add-tour" class="btn btn-lg btn-success" value="Publish tour" type="submit"/>
            </form>
        </section>
<script>
    $(function(){
        $('.cover-img').cover();
    })
</script>
    <!--</body>
</html>-->
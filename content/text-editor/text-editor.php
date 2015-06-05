<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 5/17/2015
 * Time: 5:41 PM
 */

//3 DAYS IN MOSCOW

    $titleTour = "3 days in Moscow <br/> <span class='too_long_title'>with a Friendly Guide</span>";
    $price = "397$ <span class='too_long_duration'>&mdash; (7 hours each day)</span>";
?>
<html>
    <head>

        <script src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="/ckeditor/ckeditor.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/texteditor.css"/>
        <link rel="stylesheet" href="/css/tours.css"/>
        <script type="text/javascript">
            $(window).load( function() {

                var editor = CKEDITOR.replace('txtEditor'),
                    $title_long_container = $('.title-long-container'),
                    $title_long_txt = $title_long_container.find('.too_long_title'),
                    $title = $('.title'),
                    $title_long = $('.title-long'),
                    $title_for_sending = $('.title-for-sending');


                function title(){
                    if($title_long.val() != ""){
                        $title_long_txt.text($title_long.val());
                        $title_for_sending.val($title.val() + " " + $title_long_container.html());
                    }else{
                        $title_for_sending.val($title.val())
                    }
                }



                var imgDir,
                    coverImgName,
                    galleryImgsNames = [];

                var cover_img = document.getElementById('cover_image');

                cover_img.addEventListener('change', function(){
                    coverImgName = this.files[0].name;
                    for(var i = 0, numFiles = this.files.length; i < numFiles; i++){
                        imgDir.push(this.files[i].name);
                    }
                }, false);

                /*cover_img.addEventListener('change', function(){
                    for(var i = 0, numFiles = this.files.length; i < numFiles; i++){
                        imgDir.push(this.files[i].name);
                    }
                }, false);*/


                function picsCreator(){
                    /*var img = document.createElement('img');
                    img.className = 'splash-screen';
                    img.src = imgDir + '/' + coverImgName;*/

                    var $gallery = $('.wrap_gallery'),
                        $mainImage = $gallery.find('.main-image'),
                        $mainImageLink = $mainImage.find('img'),
                        $tumbList = $gallery.find('.thumb-list'),
                        tumb = '<a rel="gallery-1" class="thumb swipebox" href="" title="">' +
                                    '<img src="" alt=""/>' +
                                '</a>',
                        $tumbImg = $gallery.find('img'),
//                        $addTumb = $('.add-tumb').last(),
                        $tour_gallery_list = $('#tour-gallery'),
                        tour_gallery_item ='<li data-img="">'+
                                                '<input type="file" name="picture" placeholder="Picture"/>'+
                                                '<input class="form-control title" type="text" placeholder="Title"/>'+
                                                '<input class="form-control alt" type="text" placeholder="Alt"/>'+
                                                '<div class="add-tumb">Add picture</div>'+
                                            '</li>',
                        $tour_gallery_file = $tour_gallery_list.find('input:file'),
                        altText = $tour_gallery_list.find('.alt'),
                        titleText = $tour_gallery_list.find('.title'),


                        src = $tour_gallery_file[0].name;


                    $mainImage.attr({
                        src: src,
                        alt: altText
                    });
                    $mainImageLink.attr({
                        href: src,
                        title: titleText
                    });


                    var count = 0;
                    $tour_gallery_list.each(function(){

                        var $addTumb = $(this).find('.add-tumb').last();

                        $tour_gallery_list.on('click',$addTumb, function(){

                            $tumbList.last().append(tumb);
                            $tour_gallery_list.last().append(tour_gallery_item);
                            $(tour_gallery_item).last().attr('data-img', 3);
                            $addTumb = $(this).find('.add-tumb').last();
                            console.log($addTumb[0]);
                        });
                    });


                }
                picsCreator();

                $('#add-tour').on('click', function(e){
                    e.preventDefault();
                    title();
//                    uploadPhoto();
                    CKEDITOR.instances.txtEditor.updateElement();
                    $.post(
                        "/content/tour-creator.php",
                        $("#tour-form").serialize(),function(result){
                            console.log(result);
                        }
                    );
                });
                $(document).on('change', '#cover_image:file', function(){
                    console.log($(this)[0].files[0].name);
                });

            });

            function sendFile(file) {
                var uri = "../image_uploader.php";
                var xhr = new XMLHttpRequest();
                var fd = new FormData();

                xhr.open("POST", uri, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Handle response.
                        alert(xhr.responseText); // handle response.
                    }
                };
                fd.append('myFile', file);
                // Initiate a multipart/form-data upload
                xhr.send(fd);
            }

            window.onload = function() {
                var dropzone = document.getElementById("cover_image");
                dropzone.ondragover = dropzone.ondragenter = function(event) {
                    event.stopPropagation();
                    event.preventDefault();
                }

                dropzone.ondrop = function(event) {
                    event.stopPropagation();
                    event.preventDefault();

                    var filesArray = event.dataTransfer.files;
                    for (var i=0; i<filesArray.length; i++) {
                        sendFile(filesArray[i]);
                    }
                }
            }
        </script>
    </head>
    <body>
        <section>
            <div class="wrap_gallery" hidden="hidden">
                <a rel="gallery-1" class="main-image swipebox" href="/i/gallery/tours/free/Nikolskaya.jpg" title="Probably most Iconic View in Moscow from Nikolskaya street">
                    <img src="/i/gallery/tours/free/Nikolskaya.jpg" alt="Moscow Free Walking Tour. Kazan Cathedral. Red Square"/>
                </a>
                <div class="thumb-list">
                    <a rel="gallery-1" class="thumb swipebox" href="/i/gallery/tours/free/Masha_Tverskaya.jpg" title="Friendly Local Guide and the Founder of Moscow – Yury Dolgorukiy">
                        <img src="/i/gallery/tours/free/small/Masha_Tverskaya.jpg" alt="Moscow Free Walking Tour. Tverskaya street. Private guide in Moscow"/>
                    </a>
                </div>
            </div>
            <img class="cover-img" src="" alt="" hidden="hidden" />
            <img class="cover-img" src="" alt="" hidden="hidden" />
            <div class="title-long-container" hidden="hidden"><br/><span class='too_long_title'></span></div>
            <form id="tour-form" class="text-editor" enctype="multipart/form-data">
                <div class="input-groups">
                    <input class="form-control" type="text" name="city" placeholder="City"/>
                    <input class="form-control" type="text" name="link" placeholder="Link to the tour"/>
                    <input id="cover_image" type="file" name="cover_image" />
                    <input class="form-control title" type="text" placeholder="Title of the tour"/>
                    <input class="form-control title-long" type="text" placeholder="Second part of the title if it's too long"/>
                    <input class="title-for-sending" type="text" name="title" hidden="hidden"/>
                    <input class="form-control" type="text" name="subtitle" placeholder="subtitle"/>
                    <input class="form-control" type="text" name="price" placeholder="price"/>
                    <input type="file" name="splashscreen" placeholder="Splash Screen"/>
                    <textarea id="txtEditor" name="description"></textarea>
                    <ul id="tour-gallery" class="list-unstyled">
                        <li>
                            <input type="file" name="picture" placeholder="Picture"/>
                            <input class="form-control title" type="text" placeholder="Title"/>
                            <input class="form-control alt" type="text" placeholder="Alt"/>
                            <div class="add-tumb">Add picture</div>
                        </li>
                    </ul>
                </div>
                <input id="add-tour" class="btn btn-lg btn-success" value="Publish tour" type="submit"/>
            </form>
        </section>
    </body>
</html>
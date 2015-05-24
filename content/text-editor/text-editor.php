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
        <script src="/line-control/editor.js"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link href="/line-control/editor.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="/css/texteditor.css"/>
        <link rel="stylesheet" href="/css/tours.css"/>
        <script type="text/javascript">
            $(document).ready( function() {
                var texteditor = $("#txtEditor").Editor(),
                    $textarea = $("#txtEditorContent"),
                    description;
                $('#add-tour').on('click', function(e){
                    e.preventDefault();
                    description =  $("#txtEditor").Editor('getText');
                    $textarea.val(description);
                    console.log($textarea.val());
                    $.post(
                        "/content/tour-creator.php",
                        $("#tour-form").serialize(),function(result){
//                            console.log($("#tour-form").serialize());
                            console.log(result);
                        }
                    );
                });
            });
        </script>
    </head>
    <body>
        <section>
            <form id="tour-form" class="text-editor">
                <div class="input-groups">
                    <input class="form-control" type="text" name="city" placeholder="City"/>
                    <input class="form-control" type="text" name="link" placeholder="Link to the tour"/>
                    <input type="file" name="cover-img" placeholder="Cover image"/>
                    <input class="form-control" type="text" name="title" placeholder="Title of the tour"/>
                    <input class="form-control" type="text" name="title" placeholder="Second part of the title if it's too long"/>
                    <input class="form-control" type="text" name="subtitle" placeholder="subtitle"/>
                    <input class="form-control" type="text" name="price" placeholder="price"/>
                    <input type="file" name="price" placeholder="Splash Screen"/>
                    <textarea id="txtEditor"></textarea>
                    <textarea id="txtEditorContent" name="description" hidden="hidden"></textarea>
                    <ul id="tour-gallery" class="list-unstyled">
                        <li>
                            <input type="file" name="picture" placeholder="Picture"/>
                            <input class="form-control" type="text" placeholder="Title"/>
                            <input class="form-control" type="text" placeholder="Alt"/>
                        </li>
                    </ul>
                </div>

                <input id="add-tour" class="btn btn-lg btn-success" value="Publish tour" type="submit"/>
            </form>
        </section>
    </body>
</html>
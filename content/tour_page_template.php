<?
    include_once "tour_page_content.php";
    include_once "tour_images.php";
    include_once "comments.php";
?>

<div class="scroll-navigate">
    <ul>
        <li class="description-icon"><span>Description tour</span></li>
        <li class="info-icon"><span>Info</span></li>
        <li class="gallery-icon"><span>Gallery</span></li>
        <li class="reviews-icon"><span>Reviews</span></li>
    </ul>
</div>

<div class="header_title">
    <div class="header_tour_content">
        <?if($id == 'tours' && $tours == 'free-tour'){?>
           <p class="text-note">*Valid when booking any <a href="/moscow/tours">other tour</a></p>
        <?}?>
        <h1><span><?=$titleTour?></span> <?if($title2Tour){?><span class='too_long_title'><br><?=$title2Tour?></span><?}?></h1>
        <h2>
            <?=$subtitleTour?>
        </h2>
    </div>
    <div class="price">$<?=$price?> &mdash; <?=$duration?></div>
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
<section class="description_tour content_box whiten">
    <?=$descriptionTour?>
</section>
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

<!--<section class="content_box tours-list_new  whiten">
<h1 class="title-of-tours single-title">Related tours</h1>
<div class="row">
    <figure class="tour-item">
        <img src="/i/tours-list/moscow/View_Kremlin.jpg" alt="Red Square & Kremlin"/>
        <figcaption>
            <h2>Red Square & Kremlin</h2>
            <div class="price">$157 — 5 hours</div>
            <h3>The former residence of Dukes, Tsars, Emperors, Communist Rulers & Presidents</h3>
            <div class="buttons-container">
                <a class="view-button" href="/moscow/tours/kremlin-tour-moscow">View tour</a>
                <a class="book_button" href="/moscow/tours/kremlin-tour-moscow/#book">Book tour</a>
            </div>
        </figcaption>
    </figure>
    <figure class="tour-item">
        <img src="/i/tours-list/moscow/Happiness.jpg" alt="Going Out in Moscow"/>
        <figcaption>
            <h2>Going Out in Moscow</h2>
            <div class="price">$187 — 7 hours</div>
            <h3>A bit of history, a bit of architecture, and a lot of FUN!</h3>
            <div class="buttons-container">
                <a class="view-button" href="/moscow/tours/going-out-in-moscow">View tour</a>
                <a class="book_button" href="/moscow/tours/going-out-in-moscow/#book">Book tour</a>
            </div>
        </figcaption>
    </figure>
    <figure class="tour-item">
        <img src="/i/tours-list/moscow/Tsaritsino.jpg" alt="3-days-in-moscow"/>
        <figcaption>
            <h2>Moscow in 3 Days</h2>
            <div class="price">$357 — (5 hours each day)</div>
            <h3>You’re almost a local! </h3>
            <div class="buttons-container">
                <a class="view-button" href="/moscow/tours/3-days-in-moscow">View tour</a>
                <a class="book_button" href="/moscow/tours/3-days-in-moscow/#book">Book tour</a>
            </div>
        </figcaption>
    </figure>
</div>
</section>-->
<section class="whiten form-container book-tour">
    <a name="book"></a>
    <?
        include 'content/form/innerTourForm.php';
    ?>
    <div class="scroll_down black_scroll_down">
        <div class="scroll_down_container">
            <div class="scroll_down_text">Reviews</div>
            <div class="scroll_down_icon"></div>
        </div>
    </div>
</section>
<section class="whiten reviews height-viewport">
    <section class="content_box whiten">
        <div class="tabs clearfix">
            <h3>Reviews</h3>
            <h3>Video reviews</h3>
        </div>
        <div class="panes form-container">
            <ul class="written-reviews pane">
                <li>
                    <form id="review-form" method="post" action="" class="clearfix">
                        <div class="rate_us">
                            <span class="rate-us_word">Rate us</span>
                            <input type="range" value="0" step="1" id="backing" name="range" placeholder="">
                            <input class="rating required" type="hidden" value="" name="rating" placeholder="">
                            <div class="rateit bigstars" data-rateit-backingfld="#backing" data-rateit-resetable="false"  data-rateit-ispreset="true"
                                 data-rateit-min="0" data-rateit-max="5" data-rateit-starwidth="32" data-rateit-starheight="32">
                            </div>
                        </div>
                        <input class="input-item name-field required" type="text" name="name" placeholder="Name"/>
                        <input class="input-item country-field required" type="text" name="country" placeholder="City, Country"/>
                        <input class="input-item email-field required" type="email" name="email"  placeholder="E-mail"/>
                        <textarea class="input-item comments-field" name="message" placeholder="Message"></textarea>
                        <label class="checkbox-review">Video<input type="checkbox"/></label>
                         <input class="input-item video-field" type="email" name="video"  placeholder="Link to your video review of the tour"/>
                        <input class="input-item send-review book_button" value="Submit" type="submit">
                    </form>
                </li>
                <?
                foreach ($dbh->query($sql) as $row){
                    echo '<li class="review">';
                ?>
                    <img class="rating" src="/i/stars/stars-<?=$row['rating'];?>.png" alt=""/><?=$row['message']?>
                    <p class="tourist-writer"><em><?=$row['name']?>, <?=$row['country']?>, <?=date("M d, Y", strtotime($row['date_time']));?></em></p>
                <?='</li>'; }?>
            </ul>
        </div>
    </section>
</section>

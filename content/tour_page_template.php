<!--//1. Create Template of the tour page
//2. Output data from BD to this template
//3. Be able insert new reviews into BD and show it on the page-->
<?
    include_once "tour_page_content.php";
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
        <h3><?=$titleTour?></h3>
        <h4>
            <?=$subtitleTour?>
        </h4>
    </div>
    <div class="price"><?=$price?></div>
    <a class="book_button" href="#">Book now</a>
</div>

<div class="overlay_view_tour"></div>
<section class="view_tour">
    <?=$splashScreen?>
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
<section class="blacken gallery">
    <?=$tourGallery?>
</section>
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
<section class="whiten reviews">
    <section class="content_box whiten">
        <div class="tabs clearfix">
            <h3>Reviews</h3>
            <h3>Video reviews</h3>
        </div>
        <div class="panes form-container">

            <!-- <form id="review-form" method="post" action="">
                 <label for="range"></label><input type="range" min="0" max="5" value="0" step="1" id="range">
                 <div class="rateit"  data-rateit-backingfld="#range"></div>
                 <label>
                     Как к Вам обращаться:
                     <input type='text' name='name' required/>
                 </label>
                 <label>Email (не публикуется):</label>
                 <label>
                     <input type='email' name='email' required/>
                 </label>
                 <label>Oтзыв:</label>
                 <label>
                     <textarea name='content' required rows="5"></textarea>
                 </label>
                 <input type='submit' value='публикация'/>
             </form>-->
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
               <!-- <li>
                    <img class="rating" src="/i/stars/stars-5.png" alt=""/>Alina is an excelent companion. She's extremely fun, flexible and versatile and knows Moscow like the back
                    of her hand. She'll take you to every interesting and fun place you want to know in Moscow from the great
                    Museums, War Memorials and Cathedrals that represent Russia's splendour, to wonderful restaurants, cafes and
                    places where you can just chill out and enjoy your surroundings as if you were a muscovite all with a great
                    schedule flexibility. I spent over 10 days with her as my guide and I got to see so many facets of Moscow
                    the existence of which I wouldn't have even fathomed hadn't it been for Aina's company.
                    She'll make you feel like home and will guarantee that your visit is amazing!
                    <p class="tourist-writer"><em>Bernardo G, Mexico City, Mexico, May 2014</em></p>
                </li>-->
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
<!--END OF RED SQUARE & KREMLIN-->

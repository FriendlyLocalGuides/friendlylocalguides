<?
    try {
        require_once "config.php";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    switch($city){
        case 'moscow': $toursListTable = 'tours_moscow'; break;
        case 'saint-petersburg': $toursListTable = 'tours_spb'; break;
    }
    $sql_tour = "select * from '$toursListTable' where url = '$currentPage'";
    foreach ($dbh->query($sql_tour) as $row){
        $titleTour = $row['title'];
        if($row['title_2']){
            $title2Tour = $row['title_2'];
        }
        $subtitleTour = $row['subtitle'];
        $price = $row['price'];
        $duration = $row['duration'];
        $descriptionTour = $row['description'];
        $tourGallery = $row['urls_gallery'];
    }
?>
<section class="content_box tours-list_new  whiten">
	<h1 class="title-of-tours">Choose your unique experience</h1>
	<div class="sub_title-of-tours">Friendly Local Guides offers Moscow private customized tours starting from $87. We keep things simple and love meeting new people, so we charge only $20 for every additional traveller.</div>
    <figure class="tour-item">
        <img src="/i/tours-list/free-tour.jpg" alt="Moscow Free Walking Tour"/>
        <figcaption>
            <h2>Moscow Free Tour</h2>
	        <div class="price">$<?=$price;?> — <?=$duration?></div>
            <h3>A bit of History, a bit of Culture, and lots of Fun</h3>
            <div class="buttons-container">
                <a class="view-button" href="/<?=$city?>/tours/free-tour">View tour</a>
                <a class="book_button" href="/<?=$city?>/tours/free-tour/#book">Book tour</a>
            </div>
        </figcaption>
    </figure>
</section>
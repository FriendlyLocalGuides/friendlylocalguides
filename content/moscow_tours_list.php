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
    $sql_tours_list = "select * from $toursListTable";
?>
<section class="content_box tours-list_new  whiten">
    <h1 class="title-of-tours">Choose your unique experience</h1>
    <div class="sub_title-of-tours">Friendly Local Guides offers Moscow private customized tours starting from $87. We keep things simple and love meeting new people, so we charge only $20 for every additional traveller.</div>
    <?
        foreach ($dbh->query($sql_tours_list) as $row){
    ?>
            <figure class="tour-item">
                <img src="<?=$row['img_link_item'];?>" alt=""/>
                <figcaption>
                    <h2><?=$row['title'];?></h2>
                    <div class="price">$<?=$row['price'];?> — <?=$row['duration'];?></div>
                    <h3><?=$row['subtitle'];?></h3>
                    <div class="buttons-container">
                        <a class="view-button" href="/<?=$city?>/tours/<?=$row['url'];?>">View tour</a>
                        <a class="book_button" href="/<?=$city?>/tours/<?=$row['url'];?>/#book">Book tour</a>
                    </div>
                </figcaption>
            </figure>
    <?
        }
    ?>
</section>
<?
    try {
        require_once "config.php";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    $sql_tours_list = "select * from spb_tours_list";
?>
<section class="content_box tours-list_new  whiten">
    <h1 class="title-of-tours">Choose your unique experience</h1>
    <div class="sub_title-of-tours">We keep things simple and love meeting new people, so we charge only $20 for every additional traveller.</div>
    <?
        foreach ($dbh->query($sql_tours_list) as $row){
    ?>
            <figure class="tour-item">
                <img src="<?=$row['img_link'];?>" alt=""/>
                <figcaption>
                    <h2><?=$row['title'];?></h2>
                    <div class="price">$<?=$row['price'];?> — <?=$row['duration'];?></div>
                    <h3><?=$row['description'];?></h3>
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
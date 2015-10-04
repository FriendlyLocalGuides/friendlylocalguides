<?
    try {
        require_once "config.php";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    switch($city){
        case 'San Francisco': $toursListTable = 'tours_San Francisco'; break;
        case 'saint-petersburg': $toursListTable = 'tours_spb'; break;
        case 'san-francisco': $toursListTable = 'tours_sanfrancisco'; break;
    }
    $sql_tours_list = "select * from $toursListTable";
?>
<section class="content_box tours-list_new  whiten">
    <div class="tabs clearfix">
        <h1 class="title-of-tours">San Francisco tours</h1>
        <h2 class="title-of-tours">Features</h2>
    </div>
    <div class="panes">
        <div class="pane">
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
        </div>
        <div class="pane features extra-features height-viewport" style="display: none;">
            <ul class="list-of-features">
                <li class="feature-1">
                    <span>Meet a local and make a new friend in San Francisco. Choose your own San Francisco tour guide, see the photos and read the fun facts of our San Francisco guides. We can even organize a Skype call with your private guide once you book the tour. Ask your guide questions about any subject and get genuinely connected with your new local friend.</span>
                </li>
                <li class="feature-2">
                    <span>Exciting fun communication with a local on your San Francisco guided tour, not just boring history lessons. Your personal tour guide focuses solely on you and makes sure you get the most out of your San Francisco experience.</span>
                </li>
                <li class="feature-3">
                    <span>No extra fees for additional traveler if you book 2- or 3-day tour. And only $20 per additional person on all other tours (you can pay in cash on the tour).</span>
                </li>
                <li class="feature-4">
                    <span>Private San Francisco tour, customized itinerary, personalized experience. Choose the sights YOU want, start the time YOU choose, go to places YOU are most interested in, ask any questions YOU have. All our attention to you, and only you.</span>
                </li>
                <li class="feature-5">
                    <span>Flexibility during your tour: changes can be made at any time to suit your individual preferences. Go at your own pace and decide when to stop for a coffee break.</span>
                </li>
                <li class="feature-6">
                    <span>San Francisco Must See + Off The Beaten Path. We will help you make your San Francisco tour a unique lifetime experience combining all the most historical and iconic places of San Francisco, as well as non-touristy places and insider’s cozy nooks only locals knows about. Just give us a hint and tell us what interests you and why you chose San Francisco as your travel destination. Your San Francisco private guide will make sure you have an authentic experience of local life, if you want to.</span>
                </li>
                <li class="feature-7">
                    <span>Reliable, friendly and flexible online service. Your personal travel consultant is at your service any time via email, facebook, skype or whatsapp. You will not feel alone with Friendly Local Guides. Ask us any questions about tours in San Francisco, what to do in San Francisco, where to go in San Francisco at night, what’s on in San Francisco and any other question you have.</span>
                </li>
                <li class="feature-8">
                    <span>Tour San Francisco in style. All our guides are good photographers and will gladly take photos of you and with you amongst spectacular San Francisco scenery that can be treasured for a lifetime.</span>
                </li>
                <li class="feature-9">
                    <span>Traditional American cuisine. You don’t have to go for Food Tour of San Francisco to try the best American food in the city. On your tour you will experience American hospitality and national dishes in local cozy restaurants with traditional cuisine and interior.</span>
                </li>
                <li class="feature-10">
                    <span>Expert local advice. Apart from super friendly San Francisco sightseeing tours, we are also good at advising how to make the most of your time in San Francisco. Best coffee shops in the city, best hotels, reliable and affordable taxi service etc. Just ask us!</span>                </li>
            </ul>
        </div>
    </div>
</section>
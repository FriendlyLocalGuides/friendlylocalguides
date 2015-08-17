<?php require($_SERVER['DOCUMENT_ROOT'].'/admin/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
require_once $_SERVER['DOCUMENT_ROOT'] . "/content/get_url.php";
try {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/content/config.php";
}
catch(PDOException $e) {
    echo $e->getMessage();
}

switch($city){
    case 'moscow': $tourTable = 'tours_moscow'; break;
    case 'saint-petersburg': $tourTable = 'tours_spb'; break;
}

/*** ?????????? ??? ?????? ? ?????????? ***/
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql_tour = "SELECT title, title_2, subtitle, price, duration, description, img_link_item, url FROM tours_moscow";
?>
<ul>
<li><a href='//friendlylocalguides/index.php?id=editor&city=moscow&tour=".$url."' target='_blank'>Create a New Tour</a></li>
<?
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
    $url = $row['url'];
    echo "<li><a href='//friendlylocalguides/index.php?id=editor&city=moscow&tour=".$url."' target='_blank'>".$titleTour."</a></li>";
}
?>
</ul>

<!--<a href="https://friendlylocalguides/index.php?id=editor&city=moscow&tour=free-tour" target="_blank">Moscow Free Tour</a>-->
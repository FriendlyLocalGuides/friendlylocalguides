<?
try {
    require_once "config.php";
}
catch(PDOException $e) {
    echo $e->getMessage();
}

switch($city){
    case 'moscow': $tourTable = 'tours_moscow'; break;
    case 'saint-petersburg': $tourTable = 'tours_spb'; break;
}

$imagesLinks = [];
$thumbsLinks = [];
$imgAlt = [];
$imgTitle = [];
$sql_images = "select * from tours_images where tour = '$currentPage'";
foreach ($dbh->query($sql_images) as $row){
    array_push($imagesLinks, $row['img_link']);
    array_push($thumbsLinks, $row['thumb_link']);
    array_push($imgAlt, $row['alt']);
    array_push($imgTitle, $row['title']);
}

$splashScreenLink = $imagesLinks[0];
$splashScreenAlt = $imgAlt[0];
$splashScreenTitle = $imgTitle[0];
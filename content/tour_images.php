<?
try {
    require_once "config.php";
}
catch(PDOException $e) {
    echo $e->getMessage();
}

$imagesLinks = [];
$thumbsLinks = [];
$imgAlt = [];
$imgTitle = [];
$sql_images = "select * from tours_images where url = '$currentPage'";
foreach ($dbh->query($sql_images) as $row){
    array_push($imagesLinks, $row['img_link']);
    array_push($thumbsLinks, $row['thumb_link']);
    array_push($imgAlt, $row['alt']);
    array_push($imgTitle, $row['title_item']);
}

$splashScreenLink = $imagesLinks[0];
$splashScreenAlt = $imgAlt[0];
$splashScreenTitle = $imgTitle[0];
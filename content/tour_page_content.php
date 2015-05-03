<?
try {
    require_once "config.php";
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$sql_tour = "select * from tours where url = '$currentPage' AND city = '$city'";
foreach ($dbh->query($sql_tour) as $row){
    $titleTour = $row['title'];
    $subtitleTour = $row['subtitle'];
    $price = $row['price'];
    $splashScreen = $row['url_splash_image'];
    $descriptionTour = $row['description'];
    $tourGallery = $row['urls_gallery'];
}
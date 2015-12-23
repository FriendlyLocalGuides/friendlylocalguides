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
    case 'san-francisco': $tourTable = 'tours_sanfrancisco'; break;
    case 'new-york': $tourTable = 'tours_newyork'; break;
    case 'lisbon': $tourTable = 'tours_lisbon'; break;
}
$sql_tour = "select * from $tourTable where url = '$currentPage'";
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
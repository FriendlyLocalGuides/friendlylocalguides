<?
try {
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currentPage = basename($_SERVER['HTTP_REFERER']);
        /*$sql_tour = "select * from tours where url = '$currentPage' AND city = '$city'";
        foreach ($dbh->query($sql_tour) as $row){
            $titleTour = $row['title'];
            $subtitleTour = $row['subtitle'];
            $price = $row['price'];
            $splashScreen = $row['url_splash_image'];
            $descriptionTour = $row['description'];
            $tourGallery = $row['urls_gallery'];
        }*/
//        $sql_tour = "select title from tours where url = '$currentPage'";
        $city         = $_POST['city'];
        $url          = $_POST['link'];
        $title        = $_POST['title'];
        $subtitle     = $_POST['subtitle'];
        $price        = $_POST['price'];
        $description  = $_POST['description'];
       /* if($_POST['video'] != ""){
            $video = $_POST['video'];
        }else{
            $video = "None";
        }*/

        /*** превратить все ошибки в исключения ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO tours (city, url, title, subtitle, price, description)
                VALUES (:city, :link, :title, :subtitle, :price, :description)";
        /*** готовим выражение ***/
        $stmt = $dbh->prepare($sql);

        /*** вставляем параметры ***/
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':link', $url, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':description', $price, PDO::PARAM_STR);

        /*** запускаем sql выражение ***/
        if($stmt->execute()){
            echo "sucess!";
        }
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}

$sql = "select * from tours WHERE url = '$url'";
foreach ($dbh->query($sql) as $row){
    echo $row['city'].' '.$row['url'].' '.$row['title'].' '.$row['subtitle'].' '.$row['price'].' '.$row['description'];
}
/*
if($_POST['refresh']) {
    populate_shoutbox();
}

function populate_shoutbox(){
    global $dbh;
    global $currentPage;
    $sql = "select * from reviews where url = '$currentPage' order by date_time desc limit 1";
    foreach ($dbh->query($sql) as $row){
        echo '<li class="review">';
        echo '<img class="rating" src="/i/stars/stars-'.$row['rating'].'.png"/>'.$row['message'];
        echo '<p class="tourist-writer"><em>'.$row['name'].', ' .$row['country'].', '. date("M d, Y", strtotime($row['date_time'])).'</em></p>';
        echo '</li>';
    }

}*/

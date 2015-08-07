<?


try {
    require_once "config.php";
    require_once "image_uploader.php";
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currentPage = basename($_SERVER['HTTP_REFERER']);
        $action       = $_POST['action'];
        $city         = $_POST['city'];
        $title        = $_POST['title'];
        $title_2      = $_POST['title_2'];
        $subtitle     = $_POST['subtitle'];
        $price        = $_POST['price'];
        $duration     = $_POST['duration'];
        $description  = $_POST['description'];
        $url          = $_POST['url'];
        $img_link     = $_POST['img_link'];
        $thumb_link   = $_POST['thumb_link'];
        $img_alt      = $_POST['gallery-item-alt'];
        $img_title    = $_POST['gallery-item-title'];
        switch($city){
            case 'moscow': $tourTable = 'tours_moscow'; break;
            case 'saint-petersburg': $tourTable = 'tours_spb'; break;
        }

        /*** превратить все ошибки в исключения ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($action == 'add'){
            $sql = "INSERT INTO $tourTable (title, title_2, subtitle, price, duration, description, url)
                    VALUES (:title, :title_2, :subtitle, :price, :duration, :description, :url)";


        }else if ($action == 'update'){
            $sql = "UPDATE $tourTable
                    SET title = :title, title_2 = :title_2, subtitle = :subtitle, price = :price, duration = :duration, description = :description
                    WHERE url = :url";
        }
        /*** готовим выражение ***/
        $stmt = $dbh->prepare($sql);

        /*** вставляем параметры ***/
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':title_2', $title_2, PDO::PARAM_STR);
        $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':duration', $duration, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);

        /*** запускаем sql выражение ***/
        if($stmt->execute()){
            echo "sucess!\n";;
        }
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}

/*$sql = "select * from tours WHERE url = '$url'";
foreach ($dbh->query($sql) as $row){
    echo $row['title'].' '.$row['title_2'].' '.$row['subtitle'].' '.$row['price'].' '.$row['duration'].' '.$row['description'];
}*/

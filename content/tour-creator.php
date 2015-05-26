<?
try {
    require_once "config.php";
//    require_once "image_uploader.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currentPage = basename($_SERVER['HTTP_REFERER']);
        $city         = $_POST['city'];
        $url          = $_POST['link'];
        $title        = $_POST['title'];
        $subtitle     = $_POST['subtitle'];
        $price        = $_POST['price'];
        $splashscreen = $_POST['splashscreen'];
        $description  = $_POST['description'];



        /*** превратить все ошибки в исключения ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO tours (city, url, title, subtitle, price, url_splash_image, description)
                VALUES (:city, :link, :title, :subtitle, :price, :splashscreen, :description)";
        /*** готовим выражение ***/
        $stmt = $dbh->prepare($sql);

        /*** вставляем параметры ***/
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':link', $url, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':splashscreen', $splashscreen, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);

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

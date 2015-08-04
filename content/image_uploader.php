<?php


try {
    require_once "config.php";
    require_once "image_uploader.php";
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dir = $_SERVER['DOCUMENT_ROOT']."/i/gallery/tours/";
        $newDir = $_POST['images-dir'];
        $newDir = $_POST['myDir'];
        //    $newDir = $_POST['images-dir'];
        //    $newDir = "here";
        $dir .= $newDir;
        echo "First:".$dir."\n";
        if (is_dir($dir)) // is_dir - tells whether the filename is a directory
        {

            //mkdir - tells that need to create a directory
//            echo "asdasd"."\n";
            move_uploaded_file($_FILES['myFile']['tmp_name'],  $dir . "/" . $_FILES['myFile']['name']);
        }else{
            mkdir($dir, 0777, true);
            move_uploaded_file($_FILES['myFile']['tmp_name'],  $dir . "/" . $_FILES['myFile']['name']);
        }
        /* echo $dir."\n";
         if (isset($_FILES['myFile'])) {
             $file_name = $_FILES['myFile']['name'];
             move_uploaded_file($_FILES['myFile']['tmp_name'],  "'" . $dir . "'" . "/" . $file_name);
             exit;
         }*/

        $currentPage = basename($_SERVER['HTTP_REFERER']);
        $action       = $_POST['action'];
        $city         = $_POST['city'];
        $img_link     = $_POST['img_link'];
        $thumb_link   = $_POST['thumb_link'];
        $img_alt      = $_POST['gallery-item-alt'];
        $img_title    = $_POST['gallery-item-title'];
        $url          = $_POST['url'];

        /*** ?????????? ??? ?????? ? ?????????? ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($action == 'add'){
            $sql = "INSERT INTO tours_images (city, img_link, thumb_link, alt, title, tour)
                    VALUES (:city, :img_link, :thumb_link, :gallery-item-alt, :gallery-item-title, :description, :url)";
        }else if ($action == 'update'){
            $sql = "UPDATE tours_images
                    SET img_link = :img_link, thumb_link = :thumb_link, alt = :gallery-item-alt, title = :gallery-item-title
                    WHERE tour = :url";
        }
        /*** ??????? ????????? ***/
        $stmt = $dbh->prepare($sql);

        /*** ????????? ????????? ***/
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':img_link', $img_link, PDO::PARAM_STR);
        $stmt->bindParam(':thumb_link', $thumb_link, PDO::PARAM_STR);
        $stmt->bindParam(':gallery-item-alt', $img_alt, PDO::PARAM_STR);
        $stmt->bindParam(':gallery-item-title', $img_title, PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);

        /*** ????????? sql ????????? ***/
        if($stmt->execute()){
            echo "sucess!\n";
            print_r($img_link);
            print_r($img_alt);
            print_r($img_title);
        }
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}


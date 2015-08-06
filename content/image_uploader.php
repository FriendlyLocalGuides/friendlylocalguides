<?php

function insert_into ($dbh, $table, $assoc) {
    $fields_arr = array ();

    foreach ($assoc as $key => $val) {
        array_push ($fields_arr, "`" . $key . "`");
    }

    $fields = implode (",", $fields_arr);
    $namedPlaceholders = array ();

    foreach ($assoc as $key => $val) {
        array_push ($namedPlaceholders, ":" . $key);
    }

    $values = implode (",", $namedPlaceholders);

    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    try {
        $sth = $dbh->prepare ($sql);
        reset ($namedPlaceholders);
        foreach ($assoc as $key => &$val) {
            $sth->bindParam (current ($namedPlaceholders), $val);
            next ($namedPlaceholders);
        }
        $sth->execute ();
    } catch (PDOException $e) {
        echo $e->getMessage ();
    }
}
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

        $b = array(
            $img_link,
            $thumb_link,
            $img_alt,
            $img_title
        );


        /*foreach($img_link as $val){
            echo "$val\n";
            $data[] = array(
                'img_link' => $val
            );
        }

        foreach($thumb_link as $val){
            echo "$val\n";
            $data[] = array(
                'thumb_link' => $val
            );
        }*/
        $counter = 0;
        for($i = 0; $i < count($b); $i++){

            for($j = 0; $j < count($b[0]); $j++){
                $counter++;
            }
            echo "$counter\n";
            $data[] = array(
                'img_link' => $b[$j][$i],
                'thumb_link' => $b[$j][1],
                'gallery-item-alt' => $b[$j][2],
                'gallery-item-title' => $b[$j][3]
            );
        }
//        print_r($data);
//        print_r($b[3]);
//        print_r($data);
        /*foreach($b as $c) {
            for ($i = 0; $i < count($c); $i++) {
                for ($j = 0; $j < count($c); $j++) {
                    $data[$i] = array(
                        'img_link' => $c[0],
                        'thumb_link' => $c[1],
                        'gallery-item-alt' => $c[2],
                        'gallery-item-title' => $c[3]
                    );
                }
            }
        }*/

        insert_into($dbh, 'tours_images', $data);
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}


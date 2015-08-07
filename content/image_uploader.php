<?php

function pdoMultiInsert($tableName, $data, $pdoObject){

    //Will contain SQL snippets.
    $rowsSQL = array();

    //Will contain the values that we need to bind.
    $toBind = array();

    //Get a list of column names to use in the SQL statement.
    $columnNames = array_keys($data[0]);

    //Loop through our $data array.
    foreach($data as $arrayIndex => $row){
        $params = array();
        foreach($row as $columnName => $columnValue){
            $param = ":" . $columnName . $arrayIndex;
            $params[] = $param;
            $toBind[$param] = $columnValue;
        }
        $rowsSQL[] = "(" . implode(", ", $params) . ")";
    }

    //Construct our SQL statement
    $sql = "INSERT INTO $tableName (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);

    //Prepare our PDO statement.
    $pdoStatement = $pdoObject->prepare($sql);

    //Bind our values.
    foreach($toBind as $param => $val){
        $pdoStatement->bindValue($param, $val);
    }

    //Execute our statement (i.e. insert the data).
    return $pdoStatement->execute();
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
        $img_alt      = $_POST['alt'];
        $img_title    = $_POST['title_item'];
        $url          = $_POST['url'];
        foreach( $img_title as $k => $img ) {
            $data[] = array(
                'city' => $city,
                'img_link' => $img_link[$k],
                'thumb_link' => $thumb_link[$k],
                'alt' => $img_alt[$k],
                'title_item' => $img_title[$k],
                'tour' => $url
            );
        }
        pdoMultiInsert('tours_images', $data, $dbh);
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}


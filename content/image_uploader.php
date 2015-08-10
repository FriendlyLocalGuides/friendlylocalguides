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
        echo "$param $val\n";
    }

    //Execute our statement (i.e. insert the data).
    return $pdoStatement->execute();
}
try {
    require_once "config.php";
    require_once "image_uploader.php";
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dir = $_POST['myDir'];
        $dir = $_SERVER["DOCUMENT_ROOT"].$dir;
//        $newDir = $_POST['images-dir'];
//        $newDir = $_POST['myDir'];
        //    $newDir = $_POST['images-dir'];
        //    $newDir = "here";
//        $dir .= $newDir;
        echo "First:".$dir."\n";
        echo "File:".$_FILES['myFile']['tmp_name']."\n";
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
        $id           = $_POST['id'];
        $city         = $_POST['city'];
        $img_link     = $_POST['img_link'];
        $thumb_link   = $_POST['thumb_link'];
        $img_alt      = $_POST['alt'];
        $title_item   = $_POST['title_item'];
        $url          = $_POST['url'];
        if($action == 'add') {
            foreach( $title_item as $k => $img ) {
                $sql = "INSERT INTO  tours_images
                        (city, img_link, thumb_link, alt, title_item, url)
                        VALUES (:city, :img_link, :thumb_link, :alt, :title_item, :url)";

                $stmt = $dbh->prepare($sql);

                $stmt->bindParam(':city', $city, PDO::PARAM_STR);
                $stmt->bindParam(':img_link', $img_link[$k], PDO::PARAM_STR);
                $stmt->bindParam(':thumb_link', $thumb_link[$k], PDO::PARAM_STR);
                $stmt->bindParam(':alt', $img_alt[$k], PDO::PARAM_STR);
                $stmt->bindParam(':title_item', $title_item[$k], PDO::PARAM_STR);
                $stmt->bindParam(':url', $url, PDO::PARAM_STR);

                if($stmt->execute()){
                    echo "sucess!\n";;
                }
            }
        }else if($action == 'update'){
            foreach( $id as $k => $img ) {
                $sql = "UPDATE tours_images SET city = :city, img_link = :img_link, thumb_link = :thumb_link, alt = :alt, title_item = :title_item WHERE id = :id";

                $stmt = $dbh->prepare($sql);

                $stmt->bindParam(':id', $id[$k], PDO::PARAM_STR);
                $stmt->bindParam(':city', $city, PDO::PARAM_STR);
                $stmt->bindParam(':img_link', $img_link[$k], PDO::PARAM_STR);
                $stmt->bindParam(':thumb_link', $thumb_link[$k], PDO::PARAM_STR);
                $stmt->bindParam(':alt', $img_alt[$k], PDO::PARAM_STR);
                $stmt->bindParam(':title_item', $title_item[$k], PDO::PARAM_STR);

                if($stmt->execute()){
                    echo "sucess!\n";;
                }
            }

        }
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}


<?php
// Example:
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
}
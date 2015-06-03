<?php
if (isset($_FILES['myFile'])) {
    // Example:
    move_uploaded_file($_FILES['myFile']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/i/gallery/" . $_FILES['myFile']['name']);
    exit;
}
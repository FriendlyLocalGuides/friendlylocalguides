<?php
ob_start();
session_start();

try {
    require_once $_SERVER['DOCUMENT_ROOT']."/content/config.php";
//application address
    define('DIR','https://friendlylocalguides/admin/');
    define('SITEEMAIL','info@friendlylocalguides.com');
} catch(PDOException $e) {
    //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}
//include the user class, pass in the database connection
include('user.php');
$user = new User($dbh);
<?php
$hostname = 'localhost';

$username = 'alinamosco_ser';

$password = 'vivaldi21';

$dbname = 'alinamosco_friendlylocalguides';

$currentPage = basename($_SERVER['REQUEST_URI']);

$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
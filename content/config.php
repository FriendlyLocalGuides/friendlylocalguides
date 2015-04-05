<?php
$hostname = 'localhost';

$username = 'root';

$password = 'r00t';

$dbname = 'alinamosco_friendlylocalguides';

$currentPage = basename($_SERVER['REQUEST_URI']);

$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
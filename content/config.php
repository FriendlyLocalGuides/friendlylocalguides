<?php
$hostname = 'localhost';

$username = 'friendl8_sergiusmuzzz';

$password = '35F$ksQM@GWWeo81h';

$dbname = 'friendl8_friendlylocalguides';

$currentPage = basename($_SERVER['REQUEST_URI']);

$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
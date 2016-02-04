<?
// занести в массив значение полей
/*** mysql host ***/
$hostname = 'localhost';

/*** mysql user ***/
$username = 'root';

/*** mysql password ***/
$password = '';

$dbname = 'alinamosco_friendlylocalguides';

//$url = $_SERVER('');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

/***** Это я объясню позже *****/
if($_POST['refresh']) {
    populate_shoutbox();
}
/********************************/

function populate_shoutbox() {
    // нам не нужно снова подключаться
    global $dbh;
    $sql = "select * from reviews order by date_time WHERE url = $url desc limit 1";
    echo '<ul>';
    foreach ($dbh->query($sql) as $row) {
        echo '<li>';
        echo '<span class="rating">'.$row['rating'].'</span>';
        echo '<span class="date">'.date("d.m.Y H:i", strtotime($row['date_time'])).'</span>';
        echo '<span class="name">'.$row['name'].'</span>';
        echo '<span class="message">'.$row['message'].'</span>';
        echo '</li>';
    }
    echo '</ul>';
}


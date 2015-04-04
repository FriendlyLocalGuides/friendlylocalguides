<?
// занести в массив значение полей
/*** mysql хост ***/
$hostname = 'localhost';

/*** mysql пользователь ***/
$username = 'root';

/*** mysql пароль ***/
$password = '';

$dbname = 'friendlylocalguides';

//$url = $_SERVER('');

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    /*if($_POST['name']) {
        $rating         = $_POST['rating'];
        $name         = $_POST['name'];
        $email         = $_POST['email'];
        $message    = $_POST['message'];
//        превратить все ошибки в исключения
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO reviews (date_time, name, message, email, rating)
            VALUES (NOW(), :name, :message, :email, :rating)";
//        готовим выражение
        $stmt = $dbh->prepare($sql);

//        вставляем параметры
        $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);

//        запускаем sql выражение
        if ($stmt->execute()) {
            populate_shoutbox();
        }
    }*/
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


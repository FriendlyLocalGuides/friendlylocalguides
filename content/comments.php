<?
try {
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currentPage = basename($_SERVER['HTTP_REFERER']);
        $sql_tour = "select title from tours where url = '$currentPage'";
        $rating      = $_POST['rating'];
        $name        = $_POST['name'];
        $email       = $_POST['email'];
        $message     = $_POST['message'];
        $country     = $_POST['country'];
        if($_POST['video'] != ""){
            $video = $_POST['video'];
        }else{
            $video = "None";
        }

        /*** превратить все ошибки в исключения ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO reviews (date_time, name, message, email, rating, url, country, video_review)
            VALUES (NOW(), :name, :message, :email, :rating, '$currentPage', :country, :video)";
        /*** готовим выражение ***/
        $stmt = $dbh->prepare($sql);

        /*** вставляем параметры ***/
        $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':video', $video, PDO::PARAM_STR);

        /*** запускаем sql выражение ***/
        if ($stmt->execute()) {
            populate_shoutbox();
            global $title;
            foreach ($dbh->query($sql_tour) as $row){
                $title = $row['title'];
            }
            $title = strip_tags($title);
            $headers  = "From: $email\r\nReply-To: $email\r\nContent-type: text/plain; charset=UTF-8";
            $form_message  = "Tour: $title\nRating: $rating\nReview: $message\nName: $name\nE-mail: $email\nFrom: $country\nVideo-review: $video";
            if(!mail("Friendly Local Guides<info@friendlylocalguides.com>", "Review", $form_message, $headers)){
                echo 'failed';
            }
        }
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}

if($_POST['refresh']) {
    populate_shoutbox();
}

function populate_shoutbox(){
    global $dbh;
    global $currentPage;
    $sql = "select * from reviews where url = '$currentPage' order by date_time desc limit 1";
    foreach ($dbh->query($sql) as $row){
        echo '<li class="review">';
        echo '<img class="rating" src="/i/stars/stars-'.$row['rating'].'.png"/>'.$row['message'];
        echo '<p class="tourist-writer"><em>'.$row['name'].', ' .$row['country'].', '. date("M d, Y", strtotime($row['date_time'])).'</em></p>';
        echo '</li>';
    }

}
$sql = "select * from reviews where url = '$currentPage' order by date_time desc";


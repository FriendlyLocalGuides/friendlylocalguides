<?

try {
    require_once "config.php";
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currentPage    = basename($_SERVER['HTTP_REFERER']);
        $order_number   = $_POST['order'];
        $payment        = $_POST['price'];
        $tour_name      = $_POST['title'];
        $user_name      = $_POST['name'];
        $email          = $_POST['email'];
        $phone          = $_POST['phone'];
        $hotel          = $_POST['hotel'];
        $message        = $_POST['message'];
        $country        = $_POST['country'];
        $people_num     = $_POST['people_num'];
        $tour_date      = $_POST['date'];
        $start_time     = $_POST['time'];


        /*** превратить все ошибки в исключения ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO orders (order_number, order_date, payment, tour, name, email, phone, hotel, message, country, people_num, date_of_tour, start_time)
                VALUES (:order, NOW(), :price, :title, :name, :email, :phone, :hotel, :message, :country, :people_num, :date, :time)";
        /*** готовим выражение ***/
        $stmt = $dbh->prepare($sql);

        /*** вставляем параметры ***/
        $stmt->bindParam(':order', $order_number, PDO::PARAM_STR);
        $stmt->bindParam(':price', $payment, PDO::PARAM_STR);
        $stmt->bindParam(':title', $tour_name, PDO::PARAM_STR);
        $stmt->bindParam(':name', $user_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':hotel', $hotel, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':people_num', $people_num, PDO::PARAM_STR);
        $stmt->bindParam(':date', $tour_date, PDO::PARAM_STR);
        $stmt->bindParam(':time', $start_time, PDO::PARAM_STR);

        /*** запускаем sql выражение ***/
        if($stmt->execute()){
            echo "sucess!";
        }
    }
}catch(PDOException $e) {
    echo $e->getMessage();
}
/*
$sql = "select * from orders";
foreach ($dbh->query($sql) as $row){
    echo $row['order'].' '.$row['price'].' '.$row['title'].' '.$row['name'].' '.$row['email'].'  '.$row['phone'].' '.$row['hotel'].' '.$row['message'].'  '.$row['people_num'].' '.$row['date'].' '.$row['time'];
}*/
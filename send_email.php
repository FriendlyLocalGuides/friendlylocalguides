<?
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email_to     =   "Friendly Local Guides<info@friendlylocalguides.com>";
        $subject      =   trim(strip_tags($_POST['subject']));
        $subject_user      =   trim(strip_tags($_POST['subject-user']));
        $order_number =   trim(strip_tags($_POST['order']));
        $title        =   html_entity_decode(trim(strip_tags($_POST['title'])));
        $price        =   html_entity_decode(trim(strip_tags($_POST['price'])));
        $name         =   "Name: ".trim(strip_tags($_POST['name']));
        $email        =   trim(strip_tags($_POST['email']));
        $phone        =   "Phone number: ".trim(strip_tags($_POST['phone']));
        $numOfPeople  =   "Number of people: ".trim(strip_tags($_POST['people_num']));
        $country      =   "Tourist(s) from: ".trim(strip_tags($_POST['country']));
        $hotel        =   "Hotel pickup: ".trim(strip_tags($_POST['hotel']));
        $date         =   "Date of tour: ".trim(strip_tags($_POST['date']));
        $startTime    =   "Start time: ".trim(strip_tags($_POST['time']));
        $message      =   "Comment: ".trim(strip_tags($_POST['message']));
		$result       =   "";

        if(stristr($_SERVER['HTTP_REFERER'], 'contact')){
            $subject = 'Contact';
            $form_message  = "$name\nE-mail: $email\n$message";
	        $result = 'contact';
        }else{
            $subject = 'Friendly Local Guides booking';
            $form_message  = "Order number: #$order_number\nTour: $title\nPrice and duration: $price\n$name\nE-mail: $email\n$phone\n$numOfPeople\n$country\n$hotel\n$date\n$startTime\n$message";
            $form_message_user  = "Your order number is: #$order_number\nTour: $title\nPrice and duration: $price\n$name\nE-mail: $email\n$phone\n$numOfPeople\n$country\n$hotel\n$date\n$startTime\n$message";
	        $result = 'tour';
            include $_SERVER["DOCUMENT_ROOT"]."/Stripe/stripe_handler.php";
            include "content/order-info.php";
        }

        session_start();
        $_SESSION['result'] = $result;
        $_SESSION['title'] = html_entity_decode(trim($_POST['title']));
        $_SESSION['price'] = html_entity_decode(trim($_POST['price']));

        $headers  = "From: $email\r\nReply-To: $email\r\nContent-type: text/plain; charset=UTF-8";
        $headers_user = "From: $email_to\r\nReply-To: $email\r\nContent-type: text/plain; charset=UTF-8";

        if(mail($email_to, $subject, $form_message, $headers) ){
            mail($email, $subject, $form_message_user, $headers_user); //TODO: do not send it when it's a contact message
	        header("Location: " . $_SERVER['HTTP_REFERER'] ."/thanks");
        }else{
            echo 'failed';
        }
    }
<?
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email_to     =   "Friendly Local Guides<info@friendlylocalguides.com>";
        $subject      =   trim(strip_tags($_POST['subject']));
        $title        =   html_entity_decode(trim(strip_tags($_POST['title'])));
        $price        =   html_entity_decode(trim(strip_tags($_POST['price'])));
        $name         =   "Name: ".trim(strip_tags($_POST['name']));
        $email        =   trim(strip_tags($_POST['email']));
        $numOfPeople  =   "Number of people: ".trim(strip_tags($_POST['num_of_people']));
        $country      =   "Tourist(s) from: ".trim(strip_tags($_POST['country']));
        $hotel        =   "Hotel pickup: ".trim(strip_tags($_POST['hotel']));
        $date         =   "Date of tour: ".trim(strip_tags($_POST['date']));
        $message      =   "Comment: ".trim(strip_tags($_POST['message']));
		$result       =   "";



        if(stristr($_SERVER['HTTP_REFERER'], 'contact')){
            $subject = 'Contact';
            $form_message  = "$name\nE-mail: $email\n$message";
	        $result = 'contact';
        }else{
            $subject = 'Friendly Local Guides booking';
            $form_message  = "Tour: $title\nPrice and duration: $price\n$name\nE-mail: $email\n$numOfPeople\n$country\n$hotel\n$date\n$message";
	        $result = 'tour';
        }

        session_start();
        $_SESSION['result'] = $result;
        $_SESSION['title'] = html_entity_decode(trim($_POST['title']));
        $_SESSION['price'] = html_entity_decode(trim($_POST['price']));

        $headers  = "From: $email\r\nReply-To: $email\r\nContent-type: text/plain; charset=UTF-8";

        if(mail($email_to, $subject, $form_message, $headers)){
	        header("Location: " . $_SERVER['HTTP_REFERER'] ."/thanks");
        }else{
            echo 'failed';
        }
    }
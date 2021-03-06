<?
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email_to     =   "Friendly Local Guides<info@friendlylocalguides.com>";
        $subject      =   trim(strip_tags($_POST['subject']));
        $subject_user =   trim(strip_tags($_POST['subject-user']));
        $order_number =   trim(strip_tags($_POST['order']));
        $title        =   html_entity_decode(trim(strip_tags($_POST['title'])));
        $tourPicture  =   html_entity_decode(trim(strip_tags($_POST['tour-pic'])));
        $price        =   html_entity_decode(trim(strip_tags($_POST['price'])));
        $duration     =   html_entity_decode(trim(strip_tags($_POST['duration'])));
        $name         =   trim(strip_tags($_POST['name']));
        $email        =   trim(strip_tags($_POST['email']));
        $phone        =   trim(strip_tags($_POST['phone']));
        $numOfPeople  =   trim(strip_tags($_POST['people_num']));
        $country      =   trim(strip_tags($_POST['country']));
        $hotel        =   trim(strip_tags($_POST['hotel']));
        $date         =   trim(strip_tags($_POST['date']));
        $startTime    =   trim(strip_tags($_POST['time']));
        $message      =   trim(strip_tags($_POST['message']));
		$result       =   "";

        if(stristr($_SERVER['HTTP_REFERER'], 'contact')){
            $subject = 'Contact';
            $form_message  = "<p>Name: $name</p><p>E-mail: $email</p><p>Message: $message</p>";
	        $result = 'contact';
        }else{
            $subject = 'Friendly Local Guides booking';
            $amount = $_POST['price'];
            ob_start();
            include $_SERVER["DOCUMENT_ROOT"]."/email-templates/email.php";
            $form_message  = ob_get_clean();

            $form_message_user  =  $form_message;

	        $result = 'tour';
            if(!stristr($_SERVER['HTTP_REFERER'], 'free-tour')){
                include $_SERVER["DOCUMENT_ROOT"]."/Stripe/stripe_handler.php";
            }
            include "content/order-info.php";
        }

        session_start();
        $_SESSION['result'] = $result;
        $_SESSION['title'] = html_entity_decode(trim($_POST['title']));
        $_SESSION['price'] = html_entity_decode(trim($_POST['price']));
        $_SESSION['duration'] = html_entity_decode(trim($_POST['duration']));

        $headers  = "From: $email\r\nReply-To: $email\r\nContent-type: text/html; charset=UTF-8";
        $headers_user = "From: $email_to\r\nReply-To: $email\r\nContent-type: text/html; charset=UTF-8";

        if(mail($email_to, $subject, $form_message, $headers) ){
            if(!stristr($_SERVER['HTTP_REFERER'], 'contact')) {
                mail($email, $subject, $form_message_user, $headers_user);
            }
	        header("Location: " . $_SERVER['HTTP_REFERER'] ."/thanks");
        }else{
            echo 'failed';
        }
    }
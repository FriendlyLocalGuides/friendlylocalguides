<?php require('config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

    //email validation
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error[] = 'Please enter a valid email address';
    } else {
        $stmt = $dbh->prepare('SELECT email FROM members WHERE email = :email');
        $stmt->execute(array(':email' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(empty($row['email'])){
            $error[] = 'Email provided is not on recognised.';
        }

    }

    //if no errors have been created carry on
    if(!isset($error)){

        //create the activasion code
        $token = md5(uniqid(rand(),true));

        try {

            $stmt = $dbh->prepare("UPDATE members SET resetToken = :token, resetComplete='No' WHERE email = :email");
            $stmt->execute(array(
                ':email' => $row['email'],
                ':token' => $token
            ));

            //send email
            $to = $row['email'];
            $subject = "Password Reset";
            $body = "Someone requested that the password be reset. \n\nIf this was a mistake, just ignore this email and nothing will happen.\n\nTo reset your password, visit the following address: ".DIR."resetPassword.php?key=$token";
            $additionalheaders = "From: <".SITEEMAIL.">\r\n";
            $additionalheaders .= "Reply-To: $".SITEEMAIL."";
            mail($to, $subject, $body, $additionalheaders);

            //redirect to index page
            header('Location: login.php?action=reset');
            exit;

            //else catch the exception and show the error.
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }

    }

}

//define page title
$title = 'Reset Account';

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form role="form" method="post" action="" autocomplete="off">
                    <h2>Reset Password</h2>
                    <p><a href='login.php'>Back to login page</a></p>
                    <hr>

                    <?php
                    //check for any errors
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<p class="bg-danger">'.$error.'</p>';
                        }
                    }

                    if(isset($_GET['action'])){

                        //check the action
                        switch ($_GET['action']) {
                            case 'active':
                                echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
                                break;
                            case 'reset':
                                echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
                                break;
                        }
                    }
                    ?>

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Sent Reset Link" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
                    </div>
                </form>
            </div>
        </div>


    </div>
<?php require('config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//define page title
$title = 'Members Page';

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

                <h2>Member only page - Welcome <?php echo $_SESSION['username']; ?></h2>
                <p><a href='logout.php'>Logout</a></p>
                <hr>
                <ul>
                    <li>
                        <a href="/index.php?id=editor&city=moscow&tour=free-tour" target="_blank">Text editor</a>
                    </li>
                    <li>
                        <a href="/index.php?id=editor&&city=moscow" target="_blank">Moscow tours</a>
                    </li>
                    <li>
                        <a href="/index.php?id=editor&&city=saint-petersburg" target="_blank">Saint Petersburg tours</a>
                    </li>
                </ul>
            </div>
        </div>


    </div>
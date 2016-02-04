<?
require_once('config.php');
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys

function baseErrorMessage($e){
    $e_json = $e->getJsonBody();
    $error = $e_json['error'];
    $error_message = $error['message'];
    $error_code = $error['code'];
    $error_type = $error['type'];
    $error_param = $error['param'];
    echo "<h2 style='text-align: center; font-family: Helvetica, Arial, sans-serif; margin: 50px 0 5px; color: #555;'>Sorry, you've got 'Invalid Request Error'</h2>";
    echo "<h3 style='text-align: center; font-family: Helvetica, Arial, sans-serif; margin: 0 0 15px; color: #555;'>No money was withdrawn from your card</h3>";
    echo "<div class='error-messenger' style='box-sizing: border-box; width: 320px; min-width: 310px; margin: 0 auto 15px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; color: #fff; background: #e07661; text-align: center; padding: 10px 10px 15px; border: 1px solid #e02200; border-radius: 4px;'>";
    echo "<h4 style='margin: 5px 0; font-size: 16px;'>Error Details: </h4>";

    if($error_type) {
        echo "<div class='error'>Error type: $error_type</div>";
    }
    if($error_code) {
        echo "<div class='error'>Error code: $error_code</div>";
    }
    if($error_message){
        echo "<div class='error'>Error message: $error_message</div>";
    }
    if($error_param) {
        echo "<div class='error'>Param: $error_param</div></div>";
    }
    echo "<div class='error' style='text-align: center; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; color: #555;'>Please email us the details of the error you have. <a href='mailto:info@friendlylocalguides.com' style='color: #249ebf;'>info@friendlylocalguides.com</a></div>";
    exit;
}
// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];
$amount = $_POST['price'];
$description = $_POST['title'];

$amount .= "00";

// Create the charge on Stripe's servers - this will charge the user's card
try {
    $charge = \Stripe\Charge::create(array(
            "amount" => $amount, // amount in cents, again
            "currency" => "usd",
            "source" => $token,
            "description" => $description)
    );

} catch(\Stripe\Error\Card $e) {
    // The card has been declined
    $e_json = $e->getJsonBody();
    $error = $e_json['error'];
    $error_message = $error['message'];
    $error_type = $error['type'];
    $error_code = $error['code'];
    $error_charge_id = $error['charge'];
    $body = $e->getJsonBody();
    $err  = $body['error'];

    echo "<h2 style='text-align: center; font-family: Helvetica, Arial, sans-serif; margin: 50px 0 15px; color: #555;'>$error_message</h2>";
    echo "<div style='text-align: center;'><div class='error-messenger' style='display: inline-block;box-sizing: border-box; margin: 0 auto 15px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; color: #fff; background: #e07661; text-align: center; padding: 10px 10px 15px; border: 1px solid #e02200; border-radius: 4px;'>";
    echo "<h4 style='margin: 5px 0; font-size: 16px;'>Error Details: </h4>";
    echo "<div class='error'>Error type: $error_type</div>";
    echo "<div class='error'>Error message: $error_message</div>";
    echo "<div class='error'>Error Code: $error_code</div>";
    echo "<div class='error'>Error ID: $error_charge_id</div></div>";
    echo "<div class='error' style='max-width: 500px; margin: auto; text-align: center; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; color: #555;'> For details please contact your credit card issuer. <br> Or, you may want to try a different card. <p>If this error still occurs, please email us the details of the error you have. <a href='mailto:info@friendlylocalguides.com' style='color: #249ebf;'>info@friendlylocalguides.com</a></p></div>";
    echo "</div>";
    exit;
}catch (\Stripe\Error\InvalidRequest $e) {
    // You screwed up in your programming. Shouldn't happen!
    baseErrorMessage($e);
} catch (\Stripe\Error\Authentication $e) {
    // Authentication with Stripe's API failed
    // (maybe you changed API keys recently)
    baseErrorMessage($e);
} catch (\Stripe\Error\ApiConnection $e) {
    // Network communication with Stripe failed
    baseErrorMessage($e);
} catch (\Stripe\Error\Base $e) {
    // Display a very generic error to the user, and maybe send
    // yourself an email
    baseErrorMessage($e);
} catch (Exception $e) {
    // Something else happened, completely unrelated to Stripe
    $body = $e;
    print($e);
    exit;
}
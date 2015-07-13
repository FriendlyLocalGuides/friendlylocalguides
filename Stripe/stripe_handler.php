<?
require_once('config.php');
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];
$amount = $_POST['price'];

$amount = substr($amount, 1);
$amount = substr($amount, 0, strpos($amount, " "));
$amount .= "00";

// Create the charge on Stripe's servers - this will charge the user's card
try {
    $charge = \Stripe\Charge::create(array(
            "amount" => $amount, // amount in cents, again
            "currency" => "usd",
            "source" => $token,
            "description" => "Example charge")
    );
} catch(\Stripe\Error\Card $e) {
    // The card has been declined

        echo "something is wrong!";
}
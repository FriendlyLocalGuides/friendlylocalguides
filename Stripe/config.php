<?
require_once('vendor/autoload.php');
$stripe = array(
    'secret_key'      => 'sk_live_7oZ22dZGiw1VTFNvOJuDXVBm',
    'publishable_key' => 'pk_live_tD2JJyEeD449SHD7DX6WGwrj'
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);
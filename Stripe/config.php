<?
require_once('vendor/autoload.php');
$stripe = array(
    'secret_key'      => 'sk_test_VTLL0sVWcAQFeghsoZqXJOA',
    'publishable_key' => 'pk_test_kFlQJaqOYrER1q0ktuQRjXK8'
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);
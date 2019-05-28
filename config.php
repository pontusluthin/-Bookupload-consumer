<?php
require_once('vendor/autoload.php');

$stripe = [
  "secret_key"      => "sk_test_l4md0uAZS9OkltbyYGUf72IZ00yKlrSpBr",
  "publishable_key" => "pk_test_g6ZqDAqpQWdvygjao8aGKIAB00a7tj4IWK",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
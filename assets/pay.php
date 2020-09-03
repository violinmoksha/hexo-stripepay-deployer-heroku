<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Stripe\Stripe;

require '../vendor/autoload.php';

$app = AppFactory::create();

$app->post('/pay.php', function (Request $request, Response $response) {
  $parsedBody = $request->getParsedBody();
  $amount = $parsedBody['amount'];
  $token = $parsedBody['stripeToken'];
  $email = $parsedBody['stripeEmail'];

  Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

  $customer = \Stripe\Customer::create([
      'email' => $email,
      'source'  => $token,
  ]);

  $charge = \Stripe\Charge::create([
      'customer' => $customer->id,
      'amount'   => $amount * 100, // integer representation of 2-decimals
      'currency' => 'usd',
  ]);

  header('Location: /thanks');
});

$app->run();

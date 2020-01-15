<?
echo "asd";
require_once('init.php');
Stripe::setApiKey('sk_test_mHrULMPKBf3tksd5BH6F40iZ00eVL1PdEa');
echo"3";

$token = "tok_1ErsOeFcA4GfTWd7QR9r04PJ";
// This is a $20.00 charge in US Dollar.
$charge = Stripe_Charge::create(
    [
        'amount' => 20,
        'currency' => 'usd',
        'source' => $token
    ]);

if($charge){
    echo "asd";
}
echo var_dump($charge)."ch";




/**

if (true) {
  Stripe\Stripe::setApiKey("sk_test_mHrULMPKBf3tksd5BH6F40iZ00eVL1PdEa");
   echo "1";
  $error = '';
  $success = '';
  try {
    //if (true)
   echo "1";
      //throw new Exception("The Stripe Token was not generated correctly");
    Stripe_Charge::create(array("amount" => 1000,
                                "currency" => "usd",
                                "card" => "tok_1ErrOvFcA4GfTWd78uBBrwep"));
    $success = 'Your payment was successful.';
    echo $success."suc";
  }
  catch (Exception $e) {
    $error = $e->getMessage();
    echo $error."err";
  }
   echo "2";
}

**/

/**
echo"2";

\Stripe\Stripe::setApiKey('sk_test_mHrULMPKBf3tksd5BH6F40iZ00eVL1PdEa');
echo"3";

$token = "tok_1ErrOvFcA4GfTWd78uBBrwep";
// This is a $20.00 charge in US Dollar.
$charge = \Stripe\Charge::create(
    array(
        'amount' => 20,
        'currency' => 'usd',
        'source' => $token
    )
);


echo"4";


print_r($charge);
echo"5";
**/
?>
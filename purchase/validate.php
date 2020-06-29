<?php
    require('config.php');
    require('razorpay-php/Razorpay.php');
    $amount = $_POST["coins"];
    $id = $_POST["id"];

    session_start();

    use Razorpay\Api\Api;
    use Razorpay\Api\Errors\SignatureVerificationError;

    $success = true;

    $error = "Payment Failed";

    if (empty($_POST['razorpay_payment_id']) === false)
    {
        $api = new Api($keyId, $keySecret);

        try
        {
            // Please note that the razorpay order ID must
            // come from a trusted source (session here, but
            // could be database or something else)
            $attributes = array(
                'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                'razorpay_signature' => $_POST['razorpay_signature']
            );

            $api->utility->verifyPaymentSignature($attributes);
        }
        catch(SignatureVerificationError $e)
        {
            $success = false;
            $error = 'Razorpay Error : ' . $e->getMessage();
        }
    }

    if ($success === true)
    {
        $html = "<p>Your payment was successful</p>
                <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
                <p>Amount : ".$_POST["amount"]."<p>
                <p>User : ".$_POST["id"]."<p>";
    }
    else
    {
        $html = "<p>Your payment failed</p>
                <p>{$error}</p>";
    }

    echo $html;

?>
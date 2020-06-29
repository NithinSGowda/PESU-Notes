<?php
    $PATH = '/var/www/pesu';
    require_once $PATH.'/libraries/config/config.php';
    
    $dbpay = getDbInstance();
    $dbpay2 = getDbInstance();
    $dbpay3 = getDbInstance();
    
    
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
        $dbpay->where ('razorpay_order_id', $_SESSION['razorpay_order_id']);
        $amountInDB=$dbpay->getValue('payments','amount');
        $dbpay->where ('razorpay_order_id', $_SESSION['razorpay_order_id']);
        $paymentStatus=$dbpay->getValue('payments','state');    
        $dbpay3->where ('razorpay_order_id', $_SESSION['razorpay_order_id']);
        $dbpay2->where ('user_profile_id',$_POST["id"]);

        if($amountInDB == $_POST["coins"] && $paymentStatus == 0){
            $DBdata = Array (
                'state' => 1
            );
            $balanceUpdate = Array (
                'coins' => $dbpay2->inc($amountInDB)
            );
            if ($dbpay3->update ('payments', $DBdata) && $dbpay2->update ('user_profiles',$balanceUpdate)){
                $state ='Payment Successful';
                $message = ' ';
            }
            else{
                $state ='Payment failed';
                $message = 'Note : Internal Database error';
            }
            
        }else{
            $state ='Payment failed';
            $message = "Note : Your payment has been declined by PESU Notes due to suspicious activity. Contact pesunote@gmail.com to get your money back.";
        }
    }
    else
    {
        $state ='Payment failed';
        $message = "Note : Your payment failed by Razorpay. In case money is deducted, it'll be refunded back in 5-7 working days.";
    }

?>
<!-- Valdation ends here -->



<?php 
	$db = getDbInstance();
	$db->where ('user_id', $_SESSION['user_id']);
    $userId=$db->getValue('auth_users','user_profile_id');
    $dbCoin = getDbInstance();
    $dbCoin->where ('user_profile_id', $userId);
    $coins=$dbCoin->getValue('user_profiles','coins');
    $username=$dbCoin->getValue('user_profiles','full_name');
?>
<?php include '../includes/header.php'; ?>
<head>
	<title><?php echo $state;?></title>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<!--===============================================================================================-->
</head>
  <body>
  <?php include '../includes/navbar.php'; ?>
	<div class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>payment</span></p>
            <h1 class="mb-3 bread"><?php echo $state;?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="highlight-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="margin: 7px;margin-bottom: 20px; font-size: 45px;"><?php echo $state;?></h2>
                <p class="text-monospace text-center m-3">Reference ID : <?php echo $_SESSION['razorpay_order_id'];?></p>
                <p class="text-monospace text-center m-3">User : <?php echo $username;?></p>
                <p class="text-monospace text-center m-3">Transaction date : <?php echo date("Y-m-d h:i:sa");?></p>
                <p class="lead text-center text-success border rounded-0 border-success m-4" style="padding: 24px;">Updated Balance : <?php echo $coins; ?> coins</p>
            </div>
            <p class="text-monospace text-center mb-7"><?php echo $message;?></p>
            <div class="buttons"><a class="btn btn-primary" role="button" href="/index.php">Home</a><button class="btn btn-light" data-bs-hover-animate="tada" type="button" href="/purchase">Buy more</button></div>
        </div>
        <p class="text-monospace text-center" style="margin: 45px;font-size: 16px;">*For any queries contact pesunote@gmail.com</p>
    </div>
<hr>
<?php include '../includes/footer.php'; ?>
</body>
<?php include '../includes/scripts.php'; ?>

<?php 
    ini_set('display_startup_errors', 1); ini_set('display_errors', 1); error_reporting(-1);
    $PATH = '/var/www/pesu';

    require_once $PATH.'/libraries/config/config.php';
	session_start();
	$db = getDbInstance();
	$db->where ('user_id', $_SESSION['user_id']);
    $userId=$db->getValue('auth_users','user_profile_id');
    $dbCoin = getDbInstance();
    $dbCoin->where ('user_profile_id', $userId);
    $coins=$dbCoin->getValue('user_profiles','coins');
    $username=$dbCoin->getValue('user_profiles','full_name');
    $phone=$dbCoin->getValue('user_profiles','phone');
?>
<?php include '../includes/header.php'; ?>
<head>
	<title>Purchase Coins</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
  <body>
  <?php include '../includes/navbar.php'; ?>
	<div class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>purchase</span></p>
            <h1 class="mb-3 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="validate.php" method="POST">
			<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">UserID </span>
					<input class="input100 money" type="text" name="id" value="&#8377 <?php echo $userId;?>" hidden>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">You are about to pay </span>
					<input class="input100 money" type="text" name="coins" value="&#8377 <?php echo $data['amount']/100;?>" readonly="readonly">
				</div>
				

				
				<script
					src="https://checkout.razorpay.com/v1/checkout.js"
					data-key="<?php echo $data['key']?>"
					data-amount="<?php echo $data['amount']?>"
					data-currency="INR"
					data-buttontext="Pay with Razorpay"
					data-name="<?php echo $data['name']?>"
					data-image="<?php echo $data['image']?>"
					data-description="<?php echo $data['description']?>"
					data-prefill.name="<?php if($phone!='NULL'){echo $phone;}else{echo ' '}?>"
					data-prefill.email="<?php echo explode(' ',trim($username))[0]."@pesunotes.com"?>"
					data-theme.hide_topbar="true"
					data-notes.shopping_order_id="<?php echo $data['order_id']?>"
					data-order_id="<?php echo $data['order_id']?>"
					<?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
					<?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
				>
				</script>
				<input type="hidden" name="shopping_order_id" value="<?php echo $data['order_id']?>">

			</form>
		</div>
	</div>

<?php include '../includes/footer.php'; ?>
</body>
<?php include '../includes/scripts.php'; ?>

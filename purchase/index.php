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
            <h1 class="mb-3 bread">Purchase coins</h1>
          </div>
        </div>
      </div>
    </div>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="checkout.php" method="POST">
				<span class="contact100-form-title">
					You have <?php echo $coins;?> coins
				</span>
				<span class="h5">Purchasing as :</span><br><br>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Username </span>
					<input class="input100 username" type="text" name="name" value="<?php echo $username;?>" readonly="readonly">
                </div>
                <div class="wrap-input100 validate-input bg1" hidden>
					<span class="label-input100">UserID </span>
					<input class="input100 username" type="text" name="id" value="<?php echo $userId;?>" readonly="readonly">
				</div>
				<input class="range" type="range" value="0" min="100" max="2000">

				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Coins </span>
					<input class="input100 coins" type="number" name="amount" value="100" min="0" max="2000">
                </div>
                <div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit">
						<span class="buy">
							Buy now
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

<?php include '../includes/footer.php'; ?>
</body>
<script>
	var ranger = document.querySelector('.range');
	var coins = document.querySelector('.coins');
	ranger.addEventListener("change",()=>{
        if(ranger.value < 100){
            ranger.value = 100
        }
		coins.value = ranger.value
	})
	coins.addEventListener("change",()=>{
        if(coins.value < 100){
            coins.value = 100
        }
		ranger.value = coins.value
	})
</script>
<?php include '../includes/scripts.php'; ?>

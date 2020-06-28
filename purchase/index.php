<?php include 'includes/header.php'; ?>
<head>
	<title>Purchase Coins</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
  <body>
  <?php include 'includes/navbar.php'; ?>



	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					You have 755 coins
				</span>
				<span class="h5">Purchasing as :</span><br><br>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Username </span>
					<input class="input100" type="text" name="id" value="Nithin " disabled>
				</div>
				<input class="range" type="range" value="0" min="0" max="2000">

				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Coins </span>
					<input class="input100 coins" type="number" name="id" value="0" min="0" max="2000">
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Buy now
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>


<?php include 'includes/footer.php'; ?>
</body>
<script>
	var ranger = document.querySelector('.range');
	var coins = document.querySelector('.coins')
	ranger.addEventListener("change",()=>{
		coins.value = ranger.value
	})
	coins.addEventListener("change",()=>{
		ranger.value = coins.value
	})
</script>
<?php include 'includes/scripts.php'; ?>

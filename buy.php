<?php
    $PATH = '/var/www/pesu';
    require_once $PATH.'/libraries/config/config.php';
    ini_set('display_startup_errors', 1); ini_set('display_errors', 1); error_reporting(-1);
    session_start();
    
    $db3 = getDbInstance();
    $db3->where ('user_id', $_SESSION['user_id']);
    $userId=$db3->getValue('auth_users','user_profile_id');
    $db2 = getDbInstance();
    $db2->where ('user_profile_id', $userId);
    $row=$db2->get('user_profiles');
?>
<?php include 'includes/header.php'; ?>
  <body>
  <?php include 'includes/navbar.php'; ?>
  <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>buy</span></p>
            <h1 class="mb-3 bread">Buy Coins</h1>
          </div>
        </div>
      </div>
    </div>

        <div class="container text-center mt-2">
            <h2>You have <?php echo $row[0]["coins"];?> coins</h2>
        </div>



<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<?php include 'includes/footer.php'; ?>
</body>
<?php include 'includes/scripts.php'; ?>
<?php
    $PATH = '/var/www/pesu';
    require_once $PATH.'/libraries/config/config.php';
    ini_set('display_startup_errors', 1); ini_set('display_errors', 1); error_reporting(-1);

    $db = getDbInstance();
    $db->join("auth_users u", "p.created_by=u.user_id", "LEFT");
    $db->where ('post_id', $_GET["id"]);
    $post = $db->get ('posts p');
?>
<?php include 'includes/header.php'; ?>
  <body>
  <?php include 'includes/navbar.php'; ?>
  <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $post[0]["post_title"];?></span></p>
            <h1 class="mb-3 bread"><?php echo $post[0]["post_title"];?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Content -->
<div class="container">

<!-- Portfolio Item Heading -->
<h1 class="my-4"><?php echo $post[0]["post_title"];?> - 
  <small><?php echo $post[0]["user_name"];?></small>
</h1>

<!-- Portfolio Item Row -->
<div class="row">

  <div class="col-md-8">
    <img class="img-fluid" src="images/bg_1.jpg" alt=""><br><br>
    <h5><div class="d-flex justify-content-between"><span>&nbsp;<?php echo $post[0]["downloads"];?> downloads</span><span><?php echo $post[0]["post_likes"];?>&nbsp; <span class="bx bx-like bx-tada-hover"></span></span></div></h5>
  </div>

  <div class="col-md-4">
    <h3 class="my-3">File Description</h3>
    <p><?php echo $post[0]["post_description"];?></p>
    <h3 class="my-3">File Details</h3>
    <ul>
      <li>Branch   : <?php echo $post[0]["post_branch"];?></li>
      <li>Semeter  : <?php echo $post[0]["post_semester"];?></li>
      <li>Subject  : <?php echo $post[0]["post_subject"];?></li>
      <li>Uploaded : <?php echo $post[0]["created_at"];?></li>
    </ul>
  
	<button type="button" class="btn btn-outline-primary btn-lg btn-block"><b>View Online</b> <small>1 coin</small></button>
  <button type="button" class="btn btn-success btn-lg btn-block"><b>Download</b> <small>10 coins</small></button></div>
</div>
<!-- /.row -->

<!-- Related Projects Row -->
<h3 class="my-4">Related Notes</h3>

<div class="row">

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="images/bg_1.jpg" alt="">
        </a>
        Lorem ipsum dolor sit.
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="images/bg_1.jpg" alt="">
        </a>
        Lorem ipsum dolor sit.
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="images/bg_1.jpg" alt="">
        </a>
        Lorem ipsum dolor sit.
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="images/bg_1.jpg" alt="">
        </a>
        Lorem ipsum dolor sit.
  </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->



<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<?php include 'includes/footer.php'; ?>
</body>
<?php include 'includes/scripts.php'; ?>
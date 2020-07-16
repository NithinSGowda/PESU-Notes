<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<?php     require_once '/var/www/pesu/libraries/config/config.php';?>
<?php 
if(!isset($_GET['subject']))
{
    header('Location:/audience');
    exit;
}
$getFeedForSubject = $_GET['subject'];
?>
<body>

<style>
.subheading{
    font-size: 12px;
display: block;
margin-bottom: 0px;
color: #206dfb;
font-weight: 600;
letter-spacing: 2px;
text-transform: uppercase;
}
.subadge {
    color: rgba(0, 0, 0, 0.3);
    color: #206dfb;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 14px;
}

#scrollable-element {
  scrollbar-color: #6879d666 #fff;
}
</style>
                           
                      
  <div class="main-content" id="panel">
    <?php include 'includes/top-navbar.php'; ?>
    <div class="container-fluid mx-0 mt-4">
      <div class="row ">
        <div class="col-md-2 ">
            <?php include 'panel-items/subjects.php';?>
        </div>
        <div  class="col-md-10 ">
            <nav aria-label="breadcrumb mb-2">
                <ol class="breadcrumb bg-white p-3">
                    <li class="breadcrumb-item "><a href="/audience">4 SEM </a> </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $getFeedForSubject;?></li>
                </ol>
            </nav>
            <?php include 'panel-items/latest-feed-for.php';?>
        </div>

         
         
            
        
    </div>

</div>
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>

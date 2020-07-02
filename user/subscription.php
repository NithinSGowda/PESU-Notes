<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<?php     require_once '/var/www/pesu/libraries/config/config.php';?>
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
.subscription .icon i{
    font-size:8rem;
    background: -webkit-linear-gradient(0deg, #62bdfc 0%, #8490ff 100%);
    background-clip: border-box;
    background: -ms-linear-gradient(0deg, #62bdfc 0%, #8490ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent
    }
    @media screen and (max-width: 480px) {
        .display-1{
            font-size: 4rem;
        }
}

</style>
                           
                      
  <div class="main-content" id="panel">
    <?php include 'includes/top-navbar.php'; ?>
    <div class="container-fluid mx-0 mt-4">
      <div class="row ">
         
            <div class="col-md-7 ">
                <nav aria-label="breadcrumb mb-2">
                    <ol class="breadcrumb bg-white p-3">
                    <li class="breadcrumb-item ">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Subscription</li>
                    </ol>
                </nav>
               
                <div class="row ">
                   <div class="col-12">
                   <div class="card subscription">
                        <div class="card-body">
                            <div style="height:100% " class="d-flex flex-column justify-content-center text-center align-center  ">
                            <div class="icon  my-5 w-100"> <i class="fa fa-check"></i></div>
                            <p class="lead text-center ">
                            <br>
                            <span class="h1 text-primary">Basic Plan</span><br>
                            <span class="h1 text-primary mb-1">Successfully Subscribed!</span><br><br>
                            We are happy to inform you that your subscription for basic plan is complete. 
                            Your plan included an give away of 80 coins, with a validity of 30 days. 
                            You may recieve a confirmination email from our side. <br>
                            <span class="subheading pt-3">Thankyou for choosing PESU Notes</span>
                            </p>
                            <div class=" mt-3">
                                    <li class="list-group-item  mt-1 border rounded bg-white d-flex justify-content-between"><span>Date</span><strong><span class="badge badge-primary p-2"><?php echo date('j F Y');?> </span></strong></li>
                                    <li class="list-group-item  mt-1 border rounded bg-white d-flex justify-content-between"><span>TRANSACTION ID</span><strong>123456789</strong> </li>
                                    <li class="list-group-item  mt-1 border rounded bg-white d-flex justify-content-between"><span>REWARD</span><strong>80 Coins</strong> </li>
                                    <li class="list-group-item  mt-1 border rounded bg-white d-flex justify-content-between"><span>VALIDITY</span><strong>30 Days</strong> </li>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
            <div class="col-md-1 ">
                <div class="row py-3 bg-white  border-bottom mb-2 rounded shadow ">
                        <div class="col-12 d-flex align-items-center ">   
                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i class='bx bx-detail'></i>
                            </div>
                            <span class="pl-2">All</span>
                        </div>
                    </div>

                    <div class="row py-3 bg-white     border-bottom mb-2 rounded shadow">
                        <div class="col-12 d-flex align-items-center ">   
                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i class='bx bxs-file-pdf'></i>
                            </div>
                            <span class="pl-2">DBMS</span>
                        </div>
                    </div>
                    <div class="row py-3 bg-white     border-bottom mb-2 rounded shadow">
                        <div class="col-12 d-flex align-items-center ">   
                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i class='bx bxs-file-pdf'></i>
                            </div>
                            <span class="pl-2">MPCA</span>
                        </div>
                    </div>
                    <div class="row py-3 bg-white     border-bottom mb-2 rounded shadow">
                        <div class="col-12 d-flex align-items-center ">   
                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i class='bx bxs-file-pdf'></i>
                            </div>
                            <span class="pl-2">LAA</span>
                        </div>
                    </div>
                    <div class="row py-3 bg-white     border-bottom mb-2 rounded shadow">
                        <div class="col-12 d-flex align-items-center ">   
                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i class='bx bxs-file-pdf'></i>
                            </div>
                            <span class="pl-2">DAA</span>
                        </div>
                    </div>
                    <div class="row py-3 bg-white  rounded shadow   ">
                        <div class="col-12 d-flex align-items-center ">   
                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i class='bx bxs-file-pdf'></i>
                            </div>
                            <span class="pl-2">TOC</span>
                        </div>
                    </div>
                    
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <div class="card py-3">
                    <div class="card-body text-center">
                        <img style="height:180px; width:180px;" class="rounded-circle" src="uploads/profiles/<?php echo $_SESSION['profile_image']?>" alt="">
                        <div class="text-center mt-3">
                            <h3 class="h1 text-capitalize">
                                Qazi Amaan <span class="font-weight-light">, CSE</span>
                            </h3>
                            <div class=" font-weight-300">
                               Electronic City Campus
                            </div>
                            <div class="px-0 mx-0 mt-3">
                                <div class="container p-2 ">
                                    <div class="row">
                                    <div class="col-4 d-flex align-items-center justify-content-center align-center">   
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class='bx bx-diamond'></i>
                                        </div>
                                        <span class="pl-2">Basic</span>
                                    </div>
                                    <div class="col-4 d-flex align-items-center justify-content-center align-center">
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                            <i class='bx bx-coin-stack'></i>
                                        </div>
                                        <span class="pl-2">1500</span>
                                    </div>
                                    <div class="col-4 d-flex align-items-center justify-content-center align-center">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class='bx bxs-calendar' ></i>
                                        </div>
                                        <span class="pl-2">25 Days</span>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class=" container-full-width">
            <div class="row ">
                    <div class="col-12  ">
                        <div class="bg-white  border rounded p-3 d-flex justify-content-between align-items-center">
                            <span>Favourites</span>
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                        <div class=" bg-white border mt-1 rounded p-3 d-flex justify-content-between align-items-center">
                            <span>Dashboard</span>
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                        <div class=" bg-white border mt-1 rounded p-3 d-flex justify-content-between align-items-center">
                            <span>Profile</span>
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
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

<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<?php     require_once '/var/www/pesu/libraries/config/config.php';?>
<body>

<style>
.subheading-blue{
    font-size: 16px;
display: block;
margin-bottom: 0px;
color: #206dfb;
font-weight: 600;
letter-spacing: 2px;
text-transform: uppercase;
}
.subheading-green{
    font-size: 16px;
display: block;
margin-bottom: 0px;
color: #2dce89;
font-weight: 600;
letter-spacing: 2px;
text-transform: uppercase;
}
.subheading-red{
    font-size: 16px;
display: block;
margin-bottom: 0px;
color: #f56036;
font-weight: 600;
letter-spacing: 2px;
text-transform: uppercase;
}
.subheading-yellow{
    font-size: 16px;
display: block;
margin-bottom: 0px;
color: #beff00;
font-weight: 600;
letter-spacing: 2px;
text-transform: uppercase;
}
.subheading-purple{
    font-size: 16px;
display: block;
margin-bottom: 0px;
color: #bc65e0;
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

.hot-tag {
    position:absolute;
    left:0;
    top:0;
    color:#fff;
    width:30%;
    padding:15px;
    background:linear-gradient(87deg, #2dce89 0, #2dcecc 100%) !important;
}
.btn-bg-gradient-purple{
    background:linear-gradient(87deg, #8965e0 0, #bc65e0 100%) !important;
    color:#fff;
}
</style>
                           
                      
  <div class="main-content" id="panel">
    <?php include 'includes/top-navbar.php'; ?>
    <div class="container-fluid mx-0 mt-4">
      <div class="row ">
         
            <div class="col-md-9 ">
                <nav aria-label="breadcrumb mb-2">
                    <ol class="breadcrumb bg-white p-3">
                    <li class="breadcrumb-item ">Home</li>
                        <li class="breadcrumb-item " >Subscription</li>
                        <li class="breadcrumb-item active" aria-current="page">Choose</li>

                    </ol>
                </nav>
               
                <div class="row ">
                   <div class="col-12">
                      <div class="container-full-width">
                        <p class="pl-1 py-2">Choose a subscription</p>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="card rounded-lg shadow text-center card-body">
                                <div class="icon mt-5 mx-auto p-5 my-3 icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                                <i style="font-size:3rem;" class='bx bx-diamond'></i>
                            </div>
                            <p class="subheading-yellow my-2">Bronze</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="badge badge-warning p-2">60 Star Coins </span></li>
                                <li class="list-group-item">Price ₹49</li>
                                <li class="list-group-item"> Prime Content</li>
                                <li class="list-group-item">30 Days Validity</li>
                            </ul>
                            <a href="#" class="btn bg-gradient-yellow w-100 text-center text-white">Pay ₹49</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            
                            <div class="card rounded-lg shadow text-center card-body">
                            <div class="hot-tag  "><span>HOT!</span></div>
                                <div class="icon mt-5 mx-auto p-5 my-3 icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i style="font-size:3rem;" class='bx bx-diamond'></i>
                            </div>
                            <p class="subheading-green my-2">Silver</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="badge badge-success p-2">120 Star Coins </span></li>
                                <li class="list-group-item">Price ₹99</li>
                                <li class="list-group-item"> Prime Content</li>
                                <li class="list-group-item">30 Days Validity</li>
                            </ul>
                            <a href="#" class="btn bg-gradient-green w-100 text-center text-white">Pay ₹99 </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card rounded-lg shadow text-center card-body">
                                <div class="icon mt-5 mx-auto p-5 my-3 icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i style="font-size:3rem;" class='bx bx-diamond'></i>
                            </div>
                            <p class="subheading-red my-2 ">Gold</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="badge badge-danger p-2">200 Star Coins </span></li>
                                <li class="list-group-item">Price ₹149</li>
                                <li class="list-group-item"> Premium Content</li>
                                <li class="list-group-item">45 Days Validity</li>
                            </ul>
                            <a href="#" class="btn bg-gradient-red w-100 text-center text-white"> Pay ₹499</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card rounded-lg shadow text-center card-body">
                                <div class="icon mt-5 mx-auto p-5 my-3 icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i style="font-size:3rem;" class='bx bx-diamond'></i>
                            </div>
                            <p class="subheading-blue my-2 ">Daimond</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="badge badge-primary p-2">600 Star Coins </span></li>
                                <li class="list-group-item">Price ₹499</li>
                                <li class="list-group-item"> Premium Content</li>
                                <li class="list-group-item">60 Days Validity</li>
                            </ul>
                            <a href="#" class="btn bg-gradient-blue w-100 text-center text-white">Pay ₹499</a>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          
            <div class="col-md-3 mt-3 mt-md-0">
                <div class="col-md-12 px-0">
                    <div class="card d-flex flex-row align-items-center rounded-lg pt-0 mt-0 shadow text-center card-body">
                        <div class="icon mt-4  p-3  icon-shape bg-gradient-purple text-white rounded-circle shadow">
                        <i style="font-size:1.6rem;" class='bx bx-rupee'></i>
                        </div>
                        <span class="subheading-purple pt-4 pl-2  ">Pay as you go</span>
                        <a href="#" class="btn mt-4 ml-auto btn-bg-gradient-purple">Recharge </a>
                    </div>
                </div>
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

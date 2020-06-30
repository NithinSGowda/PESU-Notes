<?php session_start(); ?>
<?php include 'includes/header.php'; ?>

<?php require_once '/var/www/pesu/libraries/config/config.php';?>
<style>
.dark-overlay{
  background-color: rgba(0,0,0,0.3);
}
</style>
<body>
  <?php include 'includes/side-navbarCategories.php'; ?>

  <div class="main-content" id="panel">
    <?php include 'includes/top-navbar.php'; ?>

    <!-- Header -->
    <div class="header py-4">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header  border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">DBMS</h3>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                     <div class="row d-flex justify-content-center">


                     <!-- Card-Single -->
                     <div class="col-md-3 col-4 rounded">
                     <a href="/post.php?id={insert id here}">
                     <img src="/images/person_1.jpg"  class="w-100" alt="">
                    </a>
                     
                     <!-- Text-template start -->
                     <div class="card-header  border-0">
                        <div class="row align-items-center">
                            <div class="col strech">
                                <h3 class="mb-0">File Title</h3><h2 class="text-muted"> - Author</h2><br>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem, iusto!</p>
                                <p>145 downloads</p>
                            </div>
                        </div>
                    </div>
                     <!-- Text-template end -->

                    </div>
                    <!-- card-single-end -->


                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
            </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </div>


       
      </div>
    </div>
    <!-- Page content -->
    <div class="header py-4">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header  border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">DBMS</h3>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                     <div class="row d-flex justify-content-center">
                     <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>

                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
            </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </div>


       
      </div>
    </div> <div class="header py-4">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header  border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">MPCA</h3>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                     <div class="row d-flex justify-content-center">
                     <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>

                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
            </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </div>


       
      </div>
    </div> <div class="header py-4">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header  border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">LAA</h3>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                     <div class="row d-flex justify-content-center">
                     <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>

                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
            </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </div>


       
      </div>
    </div> <div class="header py-4">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header  border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">TOC</h3>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                     <div class="row d-flex justify-content-center">
                     <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>

                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
                <div class="carousel-item">
                     <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                    <div class="col-md-3 col-4 rounded"><img src="/images/person_1.jpg"  class="w-100" alt="">   </div>
                </div>
                </div>
            </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-left"></i>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i style="font-size: 45px; color:#5e72e4;" class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </div>


       
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>

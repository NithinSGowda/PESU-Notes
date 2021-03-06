<?php 
    ini_set('display_startup_errors', 1); ini_set('display_errors', 1); error_reporting(-1);

    $PATH = '/var/www/pesu';
    require_once $PATH.'/libraries/config/config.php';
    session_start();
    $db = getDbInstance();
    $posts=$db->getValue('posts','count(*)'); 
    $users=$db->getValue('posts','count(DISTINCT(created_by))'); 
    $downloads = $db->getValue('posts','sum(downloads)'); 
?>



<?php include 'includes/header.php'; ?>
  <body>
  <?php include 'includes/navbar.php'; ?>
   
    <div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-10 d-flex align-items-center ftco-animate">
                    <div class="text text-center pt-5 mt-md-5">
                    <?php if(isset($_SESSION['user_logged_in'])) {?>
                        <h4><p class="mb-4">Welcome <?php 
                        $db->where ('user_id', $_SESSION['user_id']);
                        $userId=$db->getValue('auth_users','user_profile_id');
                        $dbCoin = getDbInstance();
                        $dbCoin->where ('user_profile_id', $userId);
                        $userFname=$dbCoin->getValue('user_profiles','full_name');
                        echo $userFname; 
                        ?></p></h4>
                    <?php }else{?>
                        <p class="mb-4">Find Notes, Assignments, and Projects</p>
                    <?php }?>
                        <h1 class="mb-5">The Easiest Way to Get Your Notes </h1>
                        <div class="ftco-counter ftco-no-pt ftco-no-pb">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                                    <div class="block-18">
                                        <div class="text d-flex">
                                            <div class="icon mr-2">
                                                <span class="bx bxs-file-pdf bx-tada-hover"></span>
                                            </div>
                                            <div class="desc text-left">
                                                <strong class="number" data-number="<?php echo $posts  ?>">0</strong>
                                                <span>Notes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                                    <div class="block-18 text-center">
                                        <div class="text d-flex">
                                            <div class="icon mr-2">
                                                <span class="flaticon-visitor bx-tada-hover"></span>
                                            </div>
                                            <div class="desc text-left">
                                                <strong class="number" data-number="<?php echo $users  ?>">0</strong>
                                                <span>Creators</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                                    <div class="block-18 text-center">
                                        <div class="text d-flex">
                                            <div class="icon mr-2">
                                                <span class="bx bx-cloud-download bx-fade-down-hover"></span>
                                            </div>
                                            <div class="desc text-left">
                                                <strong class="number" data-number="<?php echo  $downloads ?>">0</strong>
                                                <span>Downloads</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ftco-search my-md-5">
                            <div class="row">

                                <div class="col-md-12 tab-wrap">

                                    <div class="tab-content p-4" id="v-pills-tabContent">

                                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                            <form action="#" class="search-job">
                                                <div class="row no-gutters">
                                                    <div class="col-md-9 mr-md-2">
                                                        <div class="form-group">
                                                            <div class="form-field">
                                                                <div class="icon"><span class="bx bx-search-alt bx-tada-hover"></span></div>
                                                                <input type="text" class="form-control" placeholder="Ex : DBMS, Microprocessor   etc..">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="form-field">
                                                                <button type="submit" class="form-control btn btn-primary">Find Notes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category-wrap">
                        <div class="row no-gutters">

                            <div class="col-md-4">
                                <div class="top-category text-center">
                                    <h3><a href="#">Find Study Material</a></h3>
                                    <span class="icon flaticon-idea"></span>
                                    <p><span>Access notes, question papers, and other useful study material, of any semester and any subject.</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="top-category text-center">
                                    <h3><a href="#">Earn for Your Content</a></h3>
                                    <span class="icon flaticon-accounting"></span>
                                    <p><span>Upload your study material and get a rating based credit you can redeem.</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="top-category text-center">
                                    <h3><a href="#">Request Notes</a></h3>
                                    <span class="icon flaticon-dish"></span>
                                    <p><span>Request notes from your favourite contributors.</span></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Notes Categories</span>
                    <h2 class="mb-0">Top Categories</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ftco-animate">
                    <ul class="category text-center">
                        <li><a href="#">Web Development <br><span class="number">354</span> <span> notes available</span><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 ftco-animate">
                    <ul class="category text-center">
                        <li><a href="#">Web Development <br><span class="number">354</span> <span> notes available</span><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 ftco-animate">
                    <ul class="category text-center">
                        <li><a href="#">Web Development <br><span class="number">354</span> <span> notes available</span><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 ftco-animate">
                    <ul class="category text-center">
                        <li><a href="#">Web Development <br><span class="number">354</span> <span> notes available</span><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-candidates bg-primary">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-10 heading-section heading-section-white text-center ftco-animate">
                    <span class="subheading">Content Creators</span>
                    <h2 class="mb-4"  style="color : #e5c100;">Top Contributors</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-candidates owl-carousel">
                        <div class="item">
                            <a href="#" class="team text-center">
                                <div class="img" style="background-image: url(images/person_1.jpg);"></div>
                                <h2>Danica Lewis</h2>
                                <span class="position">Western City, UK</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="team text-center">
                                <div class="img" style="background-image: url(images/person_2.jpg);"></div>
                                <h2>Nicole Simon</h2>
                                <span class="position">Western City, UK</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="team text-center">
                                <div class="img" style="background-image: url(images/person_3.jpg);"></div>
                                <h2>Cloe Meyer</h2>
                                <span class="position">Western City, UK</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="team text-center">
                                <div class="img" style="background-image: url(images/person_4.jpg);"></div>
                                <h2>Rachel Clinton</h2>
                                <span class="position">Western City, UK</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="team text-center">
                                <div class="img" style="background-image: url(images/person_5.jpg);"></div>
                                <h2>Dave Buff</h2>
                                <span class="position">Western City, UK</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="team text-center">
                                <div class="img" style="background-image: url(images/person_6.jpg);"></div>
                                <h2>Dave Buff</h2>
                                <span class="position">Western City, UK</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pr-lg-5">
                    <div class="row justify-content-center pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <span class="subheading">Recently Added Notes</span>
                            <h2 class="mb-4">Recently Added Notes This Week</h2>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                    $db3 = getDbInstance();
                    $db3->join("auth_users u", "p.created_by=u.user_id", "LEFT");
                    $posts=$db3->orderBy('p.created_at','DESC')->get('posts p',5); 
                    foreach ($posts as $post):
                    ?>
                         <div class="col-md-12 ftco-animate">
                         <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                             <div class="one-third mb-4 mb-md-0">
                                 <div class="job-post-item-header align-items-center">
                                     <span class="subadge"><?php echo $post["post_subject"];?></span>
                                     <h2 class="mr-3 text-black"><a href="post.php?id=<?php echo $post["post_id"];?>"><?php echo $post["post_title"];?></a></h2>
                                 </div>
                                 <div class="job-post-item-body d-block d-md-flex">
                                     <div class="mr-3"><span class="bx bx-download"></span><span class="number">  <?php echo $post["downloads"];?></span> <span> Downloads</span></div>
                                     <div><span class="bx bx-user"></span> <span> <?php 
                                         echo $post["user_name"];
                                     ?></span></div>
                                 </div>
                             </div>
                             <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                <form method="post" action="downloadHelper.php">
                                    <input type="text" hidden value="<?php echo encrypt($post["post_id"])?>" name="mcrypt_encrypt">
                                    <button class="btn btn-primary py-2 download-file">Download</button>
                                </form>
                             </div>
                         </div>
                     </div>
                        <?php 
                    endforeach;
                    ?>



                    </div>
                </div>
                <div class="col-lg-3 sidebar">
                    <div class="row justify-content-center pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4">Latest Contributors</h2>
                        </div>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="">
                            <a href="#" class="company-wrap"><img src="images/person_3.jpg" class="img-fluid" alt="Colorlib Free Template"></a>
                            <div class="text p-3">
                                <h3><a href="#">Nithin S</a></h3>
                                <p><span class="number">5000</span> <span>Content Downloads</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="">
                            <a href="#" class="company-wrap"><img src="images/person_2.jpg" class="img-fluid" alt="Colorlib Free Template"></a>
                            <div class="text p-3">
                                <h3><a href="#">Author 2</a></h3>
                                <p><span class="number">700</span> <span>Content Downloads</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="">
                            <a href="#" class="company-wrap"><img src="images/person_1.jpg" class="img-fluid" alt="Colorlib Free Template"></a>
                            <div class="text p-3">
                                <h3><a href="#">Author 3</a></h3>
                                <p><span class="number">400</span> <span>Content Downloads</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="bx bxs-file-pdf"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Search notes instantly</h3>
                            <p>Some content related to this.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="bx bx-fullscreen"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Easy To Browse</h3>
                            <p>Some content related to this.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="bx bx-time"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Available anytime anywhere</h3>
                            <p>Some content related to this.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-career"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Get featured for uploading good content</h3>
                            <p>Some content related to this.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.easing.1.3.js"></script>
    <script src="/js/jquery.waypoints.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/jquery.animateNumber.min.js"></script>
    <script src="/js/scrollax.min.js"></script>
    <script src="/js/main.js"></script>
    
</body>

</html>

<?php session_start(); ?>
<?php require_once '/var/www/pesu/libraries/config/config.php';?>
<!-- GETTING USER DETAILS -->
<?php
  $user_id = 	$_SESSION['user_profile_id'];
  $db = getDbInstance();
  $db->where('user_profile_id', $user_id);
  $user = $db->getOne('user_profiles');

  // DETAILS
  $numNotes= $db->where('created_by', $user_id)->getValue('posts','count(*)')
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $data_to_db = filter_input_array(INPUT_POST);
    $db = getDbInstance();
    $db->where('user_profile_id', $data_to_db['user_profile_id']);
    $stat = $db->update('user_profiles', $data_to_db);
    if ($stat)
    { 
      $_SESSION['success'] = 'Profile updated successfully!';
      header('Location: profile.php');
      exit();
    }else{
      $_SESSION['failure'] = 'Failed to update profile!';
      header('Location: profile.php');
      exit();
    }
  }
    ?>
<?php include 'includes/header.php';?>
<body>
  <?php include 'includes/side-navbar.php';?>

  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include 'includes/top-navbar.php';?>
    
    
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-7"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white text-capitalize">Hello <?php echo $user['full_name']; ?> </h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your profile</p>
            <a href="dashboard.php" class="btn btn-neutral"> Go to Dashboard</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="assets/img/theme/team-4.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                
              </div>
            </div>
            <div class="card-body pt-2">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading"><?php echo $numNotes;?></span>
                      <span class="description">Notes</span>
                    </div>
                    <div>
                      <span class="heading">1540</span>
                      <span class="description">downloads</span>
                    </div>
                    <div>
                      <span class="heading">89 INR</span>
                      <span class="description">Earned</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3 text-capitalize">
                <?php echo $user['full_name']; ?> <span class="font-weight-light">, <?php echo $user['branch']; ?></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $user['campus']; ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>
                  <?php echo $user['about_me']; ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-12 pt-3 pb-0 mb-0">
                <?php include    '/var/www/pesu/includes/flash_messages.php'; ?>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method ="POST">
                <input type="text" hidden name="user_profile_id" value="<?php echo $user['user_profile_id']; ?>">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-srn">SRN</label>
                        <input type="text" id="input-srn" class="form-control" placeholder=""   value="<?php echo $user['user_srn']; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Phone</label>
                        <input type="number" id="input-phone" class="form-control" placeholder="Phone" name="phone"  value="<?php echo $user['phone']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Full Name</label>
                        <input type="text" id="input-full-name" class="form-control" placeholder="Full Name"  name="full_name"  value="<?php echo $user['full_name']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-branch">Branch</label>
                        <input type="text" id="input-branch" class="form-control" placeholder="Branch"  name="branch"  value="<?php echo $user['branch']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      
                    </div>
            
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-semester">Semester</label>
                        <input type="text" id="input-semester" class="form-control" placeholder="Semester"  name="class"  value="<?php echo $user['class']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-section">Section</label>
                        <input type="text" id="input-section" class="form-control" placeholder="Section"  name="section"  value="<?php echo $user['section']; ?>">
                      </div>
                    </div>
                    </div>
                  </div>  
                
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea rows="4" class="form-control" name="about_me"  placeholder="A few words about  you ..."><?php echo $user['about_me']; ?></textarea>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">PESU Notes</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">PESU Notes</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">Support</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
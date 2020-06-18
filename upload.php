
<?php

    $PATH = '/var/www/pesu';
    require_once $PATH.'/libraries/config/config.php';
    $targetDir = $PATH.'/uploads/'; 

    session_start();
    if(!isset($_SESSION['user_logged_in'])){
      header('Location : /signIn.php');
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {

    $allowTypes = array('jpg','png','jpeg','gif'); 
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            $fileName = uniqid().'-'.substr(basename($_FILES['files']['name'][$key]),0,25); 
            $targetFilePath = $targetDir . $fileName; 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    $insertValuesSQL .= "".$fileName.","; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
        } 
        }else{ 
            $_SESSION['failure'] = 'Please select a file to upload.';
            header('Location: /upload.php');
            exit();
        } 

    $data_to_db = array_filter($_POST);

    $data_to_db['created_by'] = $_SESSION['user_id'];
    $data_to_db['created_at'] = date('Y-m-d');
    $data_to_db['file_url'] = $insertValuesSQL;

    $db = getDbInstance();
    $last_id = $db->insert('posts', $data_to_db);

    if ($last_id)
    {
        $_SESSION['success'] = 'Product added successfully!';
        header('Location: /upload.php');
    	  exit();
    }
    else
    {
      $_SESSION['failure'] = $db->getLastError();
      header('Location: /upload.php');
      exit();
    }
}

?>

<?php include 'includes/header.php'; ?>
  <body>
  <?php include 'includes/navbar.php'; ?>

    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Upload</span></p>
            <h1 class="mb-3 bread">Upload Notes</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12">

          <?php include    $PATH.'/includes/flash_messages.php'; ?>

          </div>
          <div class="col-md-12 col-lg-8 mb-5">
          
          <!-- START FORM -->
			     <form action="" enctype="multipart/form-data" method="POST" class="p-5 bg-white">
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Title</label>
                  <input required type="text" name="post_title" id="fullname" name="post_title" class="form-control" placeholder="eg. Eigen Vectors..">
                </div>
              </div>

              <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add File</button>

                <div class="image-upload-wrap">
                <input multiple required onchange="readURL(this);"  class="file-upload-input" name="files[]" type="file"  multiple >


                  <div class="drag-text">
                    <h3>Drag and drop a file or select Add File</h3>
                  </div>
                </div>
                <div class="file-upload-content">
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded File</span></button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-field">
                  <div class="select-wrap">
                    <select  required name="post_semester" id="" class="form-control">
                      <option value="">Semester</option>
                      <option value="1">Sem - 1</option>
                      <option value="2">Sem - 2</option>
                      <option value="3">Sem - 3</option>
                      <option value="4">Sem - 4</option>
                      <option value="5">Sem - 5</option>
                      <option value="6">Sem - 6</option>
                      <option value="7">Sem - 7</option>
                      <option value="8">Sem - 8</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-field">
                  <div class="select-wrap">
                    <select required  name="post_branch" id="" class="form-control">
                      <option value="">Branch</option>
                      <option value="cse">CSE</option>
                      <option value="ece">ECE</option>
                      <option value="mech">Mech</option>
                      <option value="others">others</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-field">
                  <div class="select-wrap">
                    <input required type="text" name="post_subject"   placeholder="Subject" class="form-control"id="">
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Uploading as</label>
                  <input required type="text" name="created_by" id="fullname" class="form-control" value="<?php echo $_SESSION['user_srn']; ?>" disabled>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12"><h3>Additional points (optional)</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea name="post_description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input required type="submit" value="Upload" class="btn btn-primary  py-2 px-5">
                </div>
              </div>

  
            </form>
          </div>


          <!-- END FORM -->

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Note :</h3>
              <p class="mb-0 font-weight-bold">Duplicate Conent</p>
              <p class="mb-4">Please do not download other docs from this website and upload again. Your account may get banned for such actions</p>
            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Upload issues ?</h3>
              <p>In case you are facing any issues while uploading files to this website, feel free to contact us</p>
              <p><a href="https://nith/ml/chat" class="btn btn-primary  py-2 px-4">Contact Us</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
		

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php include 'includes/footer.php'; ?>
  </body>
  <?php include 'includes/scripts.php'; ?>
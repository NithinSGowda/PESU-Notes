<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    require_once '/var/www/pesu/libraries/config/config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        echo '<script>alert("DATABASE NOT CONNECTED")</script>';
    }
    if(isset($_POST['btn'])){
    // $author = $_POST["author"];
    $author = 3;
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $sub = $_POST["subject"];
    $sem = $_POST["sem"];
    $branch = $_POST["branch"];

     $f_name=$_FILES['file']['name'];
     $t_name=$_FILES['file']['tmp_name'];
     $upload = '/'.'content';
     if( is_dir($upload.'/'.$sem.'/'.$branch) === false )
        {
            mkdir($upload.'/'.$sem.'/'.$branch,0777,true);
        }
    if( is_dir($upload.'/'.$sem.'/'.$branch.'/'.$sub) === false )
        {
            mkdir($upload.'/'.$sem.'/'.$branch.'/'.$sub,0777,true);
        }
     $file_url = $upload.'/'.$sem.'/'.$branch.'/'.$sub.'/'.date("his").$f_name;
     $fupload=move_uploaded_file($t_name,$file_url);

    $sql = "INSERT INTO posts (created_by, sem, post_title, post_description, post_subject, post_branch, file_url) VALUES ('".$author."', '".$sem."','".$title."','".$desc."','".$sub."','".$branch."','".$file_url."')";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    if($fupload){
        echo '<script>alert("File uploaded successfully")</script>';
        header("Location: /index.php");
    }
    
}
?>
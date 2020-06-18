<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    require_once '/var/www/pesu/libraries/config/config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        echo '<script>alert("DATABASE NOT CONNECTED")</script>';
    }
    $author = $_POST["author"];
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $sub = $_POST["sub"];
    $sem = $_POST["sem"];
    $branch = $_POST["branch"];


    $sql = "INSERT INTO posts (created_by, sem, title, post_description, post_subject, post_branch) VALUES ('".$author."', '".$sem."','".$title."','".$desc."','".$sub."','".$branch."')";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("Location: index.php");
?>
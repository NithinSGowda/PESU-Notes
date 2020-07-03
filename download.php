<?php
    require_once '/var/www/pesu/libraries/config/config.php';
    $id = decrypt(filter_input(INPUT_POST, 'mcrypt_encrypt'));
    if ($id && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = getDbInstance();
        $fileName=$db->where('post_id',$id)->getValue('posts','file_url');
        $path =$_SERVER['DOCUMENT_ROOT'].'content/'; 
        $fullPath = $fileName;

        if ($fd = fopen ($fullPath, "r")) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "pdf":
                    header("Content-type: application/pdf"); // add here more headers for diff. extensions
                    header("Content-Disposition: inline; filename=\"".$path_parts["basename"]."\"");     
                    break;
                default;
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
            }
                header("Content-length: $fsize");
                header("Cache-control: private"); 

                while(!feof($fd)) {
                    $buffer = fread($fd, 2048);
                    echo $buffer;
                }
        }
            fclose ($fd);
            exit;
    }else{
        die("Method Not allowed!");
    }
?>
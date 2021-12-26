<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg","JPG" => "image/JPG", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"][$key];
        $filetype = $_FILES["photo"]["type"][$key];
        $filesize = $_FILES["photo"]["size"][$key];
    
        // Verify file extension
        $ext = pathinfo($_FILES["photo"]["name"][$key], PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("uploads/" . $_FILES["photo"]["name"][$key])){
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"][$key], "uploads/" . $_FILES["photo"]["name"][$key]);
            } 
        } else{
        }
    } else{
    }
}

 
<?php
include("backend/functions.php");

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
                   $link = connect_to_database();
                    if( mysqli_connect_error()){
                         die("hello");
                     }
       
      $category=$_POST['category']; 
      $image="admin/backend/upload/".basename( $_FILES["fileToUpload"]["name"]);
     $query = "CREATE TABLE `$category` (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    PRIMARY KEY (id)
)";
                  $result = mysqli_query($link, $query);
                    if($result){
                    echo "1";    
              $query2="INSERT INTO `categories` (name, image)
            VALUES ('$category', '$image')";
            echo "2";
            $result2 = mysqli_query($link, $query2);
            echo "3";
            if($result2){
                
    echo "done";
}

        }
        


        
        
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>


        
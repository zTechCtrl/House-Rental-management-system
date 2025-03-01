<?php
if(isset($_POST['submit'])){
    //Handle Photo Upload
    if(isset($_FILES['photo'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        if(in_array($imageFileType, $allowed_extensions)){
            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)){
                echo "Photo uploaded successfully!";
            }else{
                echo "Error uploading photo!";
            }
        }else{
            echo "Invalid file type for photo!";
        }
    }
    
    //Handle Video Upload
    if(isset($_FILES['video'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["video"]["name"]);
        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $allowed_extensions = array("mp4", "avi", "mov", "wmv");
        if(in_array($videoFileType, $allowed_extensions)){
            if(move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)){
                echo "Video uploaded successfully!";
            }else{
                echo "Error uploading video!";
            }
        }else{
            echo "Invalid file type for video!";
        }
    }
}
?>
<!-- HTML Form to Upload Photo and Video -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="photo"><br>
    <input type="file" name="video"><br>
    <input type="submit" name="submit" value="Upload">
</form>
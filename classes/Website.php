<?php
USE SQL as DB;
class Website{
    public static function viewPics(){
        $out= "";
        $sql="SELECT * FROM photos ORDER BY id DESC";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row= $result->fetch_assoc()){
                $rows[]=$row;
            }
            $out= $rows;
        }else{
            $out= "No data";
        }
        return $out;
    }

    public static function uploadImage(){
        if(isset($_POST['add'])){
            $target_dir = "public/images/";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                echo "<div class='alert alert-success'>Success The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.</div>";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            
            $photo =basename( $_FILES["photo"]["name"],".jpg/.png/.jpeg/.jfif");
            $category= filter_var($_POST['category'], FILTER_SANITIZE_STRING);
            $sql="INSERT INTO `photos`(`category`, `photo`) VALUES ('$category', '$photo')";
            if(DB::runQuery($sql)){
                echo '<div class="alert alert-success">Success</div>';
                echo '<script>window.location="gallery-pics"</script>';
            }else{
                echo 'failed';
            }


        }
    }
    public static function deleteImage(){
        $id= $_GET['id'];
        $sql= "DELETE FROM photos WHERE id= '$id'";
        if(DB::runQuery($sql)){
            echo 'Success';
            echo '<script>window.location="gallery-pics"</script>';
        }else{
            echo 'Failed';
            echo '<script>window.location="gallery-pics"</script>';
        }
    }
}
?>
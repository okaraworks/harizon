<?php
Use SQL As DB;
class Functions{
    public static function countResidents(){
        $out="";
        $sql="SELECT count(id) As total FROM residents";
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="0";
        }
        return $out;
    }

    public static function countUsers(){
        $out="";
        $sql="SELECT count(id) As total FROM users";
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="0";
        }
        return $out;
    }

    public static function countActiveUsers(){
        $out="";
        $sql="SELECT count(id) As total FROM users WHERE `last_activity` > DATE_ADD(NOW(), INTERVAL -1 MINUTE)";
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="0";
        }
        return $out;
    }

    public static function countNewUsers(){
        $out="";
        $sql="SELECT count(id) As total FROM users WHERE `date_added` > DATE_ADD(NOW(), INTERVAL -1 DAY)";
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="0";
        }
        return $out;
    }


    public static function countNewMembers(){
        $out="";
        $sql="SELECT count(id) As total FROM members WHERE `date` > DATE_ADD(NOW(), INTERVAL -1 DAY)";
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="0";
        }
        return $out;
    }
    public static function countMembers(){
        $out="";
        $sql="SELECT count(id) As total FROM `persons`";
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="0";
        }
        return $out;
    }

    public static function countHouses(){
        $out="";
        $sql="SELECT count(id) As total FROM `house`";
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="0";
        }
        return $out;
    }


    public static function uploadImage(){
        if (isset($_POST['upload'])) {
            global $userID;
            $user_id=MD5($userID);
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

            $sql="INSERT INTO `images`(`user_id`,`photo`) VALUES('$user_id','$photo')";
            if(DB::runQuery($sql)){
                echo '<script>window.location="dashboard";</script>';
            }else{
                echo 'failed';
            }


        }
    }

    public static function checkRegistration(){
        $out="";
        global $userID;
        // $id=MD5($userID);
        $sql="SELECT users.id, members.user_id from `members` inner JOIN users on users.id=members.user_id WHERE members.user_id='$userID'";
        if($result=DB::runQuery($sql)){
            $rows = [];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="No results";
        }
        return $out;
    }

    public static function checkPRegistration(){
        $out="";
        global $userID;
        // $id=MD5($userID);
        $sql="SELECT users.id, parents.user_id from `parents` inner JOIN users on users.id=parents.user_id WHERE parents.user_id='$userID'";
        if($result=DB::runQuery($sql)){
            $rows = [];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="No results";
        }
        return $out;
    }

    public static function checkNRegistration(){
        $out="";
        global $userID;
        // $id=MD5($userID);
        $sql="SELECT users.id, nextofkin.user_id from `nextofkin` inner JOIN users on users.id=nextofkin.user_id WHERE nextofkin.user_id='$userID'";
        if($result=DB::runQuery($sql)){
            $rows = [];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="No results";
        }
        return $out;
    }
 
     public static function randID($len) {
            $len = 5;
            // randID($len);
            $index = "0123456789";
            $out = "";
            for ($t=0; $t<$len;$t++) {
              $r = rand(0,61);
              $out = $out . substr($index,$r,1);
            }
            return $out;
        }
    


}
?>
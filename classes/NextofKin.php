<?php
USE SQL AS DB;
class NextofKin{
    public static function regNext(){
        if(isset($_POST['add'])){
            $user_id= $_POST['user_id'];
            $names= filter_var($_POST['names'], FILTER_SANITIZE_STRING);
            $nid= $_POST['nid'];
            $phone= $_POST['phone'];
            $relationship= filter_var($_POST['relationship'], FILTER_SANITIZE_STRING);
            global $errors;
            if($row = DB::getOne("SELECT * FROM `nextofkin` WHERE `user_id`='$user_id' LIMIT 1")){
                if($row['user_id'] == $user_id) {
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'>Sorry Next of kin for the above person exits</div>";
                }
            }


            if (count($errors) == 0) {
                $sql="INSERT INTO `nextofkin`(`user_id`, `names`, `nid`, `phone`, `relationship`) 
                VALUES ('$user_id','$names','$nid','$phone','$relationship')";
                if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success">Added Successfully</div>';
                    echo '<script>window.location="nextofkin.html"</script>';
                }else{
                    echo '<div class="alert alert-danger">Failed to add </div>';
                }
            }
        }
    }

    public static function viewRegistered(){
        $out="";
        global $userID;
        $sql="SELECT * FROM nextofkin INNER JOIN members ON members.user_id=nextofkin.user_id ORDER BY nextofkin.id DESC";
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

    public static function delNext(){
        $id= $_GET['id'];
        $sql="DELETE FROM nextofkin WHERE user_id='$id'";
        if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success">Deleted Successfully</div>';
                    echo '<script>window.location="nextofkin.html"</script>';
                }else{
                    echo '<div class="alert alert-danger">OOPS</div>';
                }
    }

    public static function editRequest(){
        $out="";
        global $userID;
        $id= $_GET['q'];
        $sql="SELECT * FROM nextofkin WHERE user_id='$id' ORDER BY id DESC";
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

    public static function editNext(){
        if(isset($_POST['edit'])){
            $user_id= $_POST['user_id'];
            $names= filter_var($_POST['names'], FILTER_SANITIZE_STRING);
            $nid= $_POST['nid'];
            $phone= $_POST['phone'];
            $relationship= filter_var($_POST['relationship'], FILTER_SANITIZE_STRING);

            $sql= "UPDATE nextofkin SET names='$names', nid='$nid', phone='$phone', relationship='$relationship' 
            WHERE user_id='$user_id' ";

            if(DB::runQuery($sql)){
                echo '<div class="alert alert-success">Edited Successfully</div>';
                echo '<script>window.location="nextofkin.html"</script>';
            }else{
                echo '<div class="alert alert-danger">Failed to edit </div>';
            }
        }
    }

    public static function viewMyKin(){
        $out="";
        global $userID;
        $sql="SELECT * FROM nextofkin WHERE user_id='$userID' ORDER BY id DESC";
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

    public static function editMyNext(){
        if(isset($_POST['edit'])){
            $user_id= $_POST['user_id'];
            $names= filter_var($_POST['names'], FILTER_SANITIZE_STRING);
            $nid= $_POST['nid'];
            $phone= $_POST['phone'];
            $relationship= filter_var($_POST['relationship'], FILTER_SANITIZE_STRING);

            $sql= "UPDATE nextofkin SET names='$names', nid='$nid', phone='$phone', relationship='$relationship' 
            WHERE user_id='$user_id' ";

            if(DB::runQuery($sql)){
                echo '<div class="alert alert-success">Edited Successfully</div>';
                echo '<script>window.location="viewmynextofkin"</script>';
            }else{
                echo '<div class="alert alert-danger">Failed to edit </div>';
            }
        }
    }

    public static function delMyNext(){
        $id= $_GET['id'];
        $sql="DELETE FROM nextofkin WHERE user_id='$id'";
        if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success">Deleted Successfully</div>';
                    echo '<script>window.location="viewmynextofkin"</script>';
                }else{
                    echo '<div class="alert alert-danger">OOPS</div>';
                }
    }

    public static function regMyNext(){
        if(isset($_POST['add'])){
            global $userID;
            $names= filter_var($_POST['names'], FILTER_SANITIZE_STRING);
            $nid= $_POST['nid'];
            $phone= $_POST['phone'];
            $relationship= filter_var($_POST['relationship'], FILTER_SANITIZE_STRING);
            global $errors;
            if($row = DB::getOne("SELECT * FROM `nextofkin` WHERE `user_id`='$userID' LIMIT 1")){
                if($row['user_id'] == $userID) {
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'>Sorry Next of kin for the above person exits</div>";
                }
            }


            if (count($errors) == 0) {
                $sql="INSERT INTO `nextofkin`(`user_id`, `names`, `nid`, `phone`, `relationship`) 
                VALUES ('$userID','$names','$nid','$phone','$relationship')";
                if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success">Added Successfully</div>';
                    echo '<script>window.location="viewmynextofkin"</script>';
                }else{
                    echo '<div class="alert alert-danger">Failed to add </div>';
                }
            }
        }
    }
}
?>
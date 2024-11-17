<?php
USE SQL As DB;

class Parents{
    public static function addMyParent(){
        if(isset($_POST['regparents'])){
            global $userID;
            global $errors;
            $hfather=filter_var($_POST['hfather'], FILTER_SANITIZE_STRING);
            $hfnid=filter_var($_POST['hfnid'], FILTER_SANITIZE_STRING);
            $hfstatus=filter_var($_POST['hfstatus'], FILTER_SANITIZE_STRING);
            $hmother=filter_var($_POST['hmother'], FILTER_SANITIZE_STRING);
            $hmnid=filter_var($_POST['hmnid'], FILTER_SANITIZE_STRING);
            $hmstatus=filter_var($_POST['hmstatus'], FILTER_SANITIZE_STRING);
            $hphone=filter_var($_POST['hphone'], FILTER_SANITIZE_STRING);
            $sfather=filter_var($_POST['sfather'], FILTER_SANITIZE_STRING);
            $sfnid=filter_var($_POST['sfnid'], FILTER_SANITIZE_STRING);
            $sfstatus=filter_var($_POST['sfstatus'], FILTER_SANITIZE_STRING);
            $smother=filter_var($_POST['smother'], FILTER_SANITIZE_STRING);
            $smnid=filter_var($_POST['smnid'], FILTER_SANITIZE_STRING);
            $smstatus=filter_var($_POST['smstatus'], FILTER_SANITIZE_STRING);
            $sphone=filter_var($_POST['sphone'], FILTER_SANITIZE_STRING);

            if($row = DB::getOne("SELECT * FROM `parents` WHERE `user_id`='$userID' LIMIT 1")){
                if($row['user_id'] == $userID) {
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'>Sorry Your parent details are already with us click <a href='myparents'>Here</a> To view</div>";
                }
            }

            // if (!empty($userID)) { echo "<div class='alert alert-danger'>Please Select Person</div>"; }

            if (count($errors) == 0) {
            $sql="INSERT INTO `parents`(`user_id`, `hfather`, `hfnid`, `hfstatus`, `hmother`, `hmnid`, `hmstatus`,
             `hphone`, `sfather`, `sfnid`, `sfstatus`, `smother`, `smnid`, `smstatus`, `sphone`, `date`) 
            VALUES ('$userID','$hfather', '$hfnid', '$hfstatus', '$hmother', '$hmnid', '$hmstatus',
             '$hphone', '$sfather', '$sfnid', '$sfstatus', '$smother', '$smnid', '$smstatus', '$sphone',NOW())";

             if(DB::runQuery($sql)){
                 echo '<div class="alert alert-success">Success</div>';
                 echo '<script>window.location="myparents"</script>';
             }else{
                 echo '<div class="alert alert-danger">Failed</div>';
             }
             }
        }
    }

    public static function addParent(){
        if(isset($_POST['regparents'])){
            global $errors;
            $userID=$_POST['user_id'] ;
            $hfather=filter_var($_POST['hfather'], FILTER_SANITIZE_STRING);
            $hfnid=filter_var($_POST['hfnid'], FILTER_SANITIZE_STRING);
            $hfstatus=filter_var($_POST['hfstatus'], FILTER_SANITIZE_STRING);
            $hmother=filter_var($_POST['hmother'], FILTER_SANITIZE_STRING);
            $hmnid=filter_var($_POST['hmnid'], FILTER_SANITIZE_STRING);
            $hmstatus=filter_var($_POST['hmstatus'], FILTER_SANITIZE_STRING);
            $hphone=filter_var($_POST['hphone'], FILTER_SANITIZE_STRING);
            $sfather=filter_var($_POST['sfather'], FILTER_SANITIZE_STRING);
            $sfnid=filter_var($_POST['sfnid'], FILTER_SANITIZE_STRING);
            $sfstatus=filter_var($_POST['sfstatus'], FILTER_SANITIZE_STRING);
            $smother=filter_var($_POST['smother'], FILTER_SANITIZE_STRING);
            $smnid=filter_var($_POST['smnid'], FILTER_SANITIZE_STRING);
            $smstatus=filter_var($_POST['smstatus'], FILTER_SANITIZE_STRING);
            $sphone=filter_var($_POST['sphone'], FILTER_SANITIZE_STRING);

            if($row = DB::getOne("SELECT * FROM `parents` WHERE `user_id`='$userID' LIMIT 1")){
                if($row['user_id'] == $userID) {
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'> Sorry parent details for selected already exists!!</div>";
                }
            }

            if (!empty($userID)) { echo "<div class='alert alert-danger'>Please Select Person</div>"; }

            if (count($errors) == 0) {
                $sql="INSERT INTO `parents`(`user_id`, `hfather`, `hfnid`, `hfstatus`, `hmother`, `hmnid`, `hmstatus`,
                `hphone`, `sfather`, `sfnid`, `sfstatus`, `smother`, `smnid`, `smstatus`, `sphone`, `date`) 
                VALUES ('$userID','$hfather', '$hfnid', '$hfstatus', '$hmother', '$hmnid', '$hmstatus',
                '$hphone', '$sfather', '$sfnid', '$sfstatus', '$smother', '$smnid', '$smstatus', '$sphone',NOW())";

                if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success">Success</div>';
                    echo '<script>window.location="members-parents"</script>';
                }else{
                    echo '<div class="alert alert-danger">Failed</div>';
                }
            }
        }
    }

    public static function myParents(){
        $out="";
        global $userID;
        $sql="SELECT * FROM parents INNER JOIN users on users.id=parents.user_id WHERE parents.user_id='$userID'";
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

    public static function getParent(){
        $out="";
        $userID= $_GET['user'];
        $sql="SELECT * FROM parents WHERE user_id='$userID'";
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

    public static function getParents(){
        $out="";
        $sql="SELECT * FROM members inner join parents on parents.user_id=members.user_id order by parents.id desc";
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

    public static function delParent(){
        $id= $_GET['id'];
        $sql="DELETE FROM parents WHERE user_id='$id'";
        if(DB::runQuery($sql)){
            echo 'deleted Successfully';
            echo '<script>window.location="members-parents"</script>';
        }else{
            echo 'failed';
            echo '<script>window.location="members-parents"</script>';
        }
    }

     public static function editRequest(){
        $out="";
        $id= $_GET['q'];
        $sql="SELECT * FROM parents WHERE id='$id'  ORDER BY id DESC";
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

    public static function editParent(){
        if(isset($_POST['editparents'])){
            $parent_id=$_POST['parent_id'] ;
            $hfather=filter_var($_POST['hfather'], FILTER_SANITIZE_STRING);
            $hfnid=filter_var($_POST['hfnid'], FILTER_SANITIZE_STRING);
            $hfstatus=filter_var($_POST['hfstatus'], FILTER_SANITIZE_STRING);
            $hmother=filter_var($_POST['hmother'], FILTER_SANITIZE_STRING);
            $hmnid=filter_var($_POST['hmnid'], FILTER_SANITIZE_STRING);
            $hmstatus=filter_var($_POST['hmstatus'], FILTER_SANITIZE_STRING);
            $hphone=filter_var($_POST['hphone'], FILTER_SANITIZE_STRING);
            $sfather=filter_var($_POST['sfather'], FILTER_SANITIZE_STRING);
            $sfnid=filter_var($_POST['sfnid'], FILTER_SANITIZE_STRING);
            $sfstatus=filter_var($_POST['sfstatus'], FILTER_SANITIZE_STRING);
            $smother=filter_var($_POST['smother'], FILTER_SANITIZE_STRING);
            $smnid=filter_var($_POST['smnid'], FILTER_SANITIZE_STRING);
            $smstatus=filter_var($_POST['smstatus'], FILTER_SANITIZE_STRING);
            $sphone=filter_var($_POST['sphone'], FILTER_SANITIZE_STRING);

           
            
                $sql="UPDATE parents SET hfather='$hfather', hfnid='$hfnid', hfstatus='$hfstatus', hmother='$hmother',
                hmnid='$hmnid', hmstatus='$hmstatus', hphone='$hphone', sfather='$sfather', sfnid='$sfnid', sfstatus='$sfstatus',
                smother='$smother', smnid='$smnid',smstatus='$smstatus', sphone='$sphone' WHERE id='$parent_id'";
                if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success">Success</div>';
                    echo '<script>window.location="members-parents"</script>';
                }else{
                    echo '<div class="alert alert-danger">Failed</div>';
                }
        }
    }

    public static function editMyPRequest(){
        $out="";
        global $userID;
        $sql="SELECT * FROM parents WHERE user_id='$userID'  ORDER BY id DESC";
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

    public static function editMyParent(){
        if(isset($_POST['editmyparents'])){
            global $userID;
            $hfather=filter_var($_POST['hfather'], FILTER_SANITIZE_STRING);
            $hfnid=filter_var($_POST['hfnid'], FILTER_SANITIZE_STRING);
            $hfstatus=filter_var($_POST['hfstatus'], FILTER_SANITIZE_STRING);
            $hmother=filter_var($_POST['hmother'], FILTER_SANITIZE_STRING);
            $hmnid=filter_var($_POST['hmnid'], FILTER_SANITIZE_STRING);
            $hmstatus=filter_var($_POST['hmstatus'], FILTER_SANITIZE_STRING);
            $hphone=filter_var($_POST['hphone'], FILTER_SANITIZE_STRING);
            $sfather=filter_var($_POST['sfather'], FILTER_SANITIZE_STRING);
            $sfnid=filter_var($_POST['sfnid'], FILTER_SANITIZE_STRING);
            $sfstatus=filter_var($_POST['sfstatus'], FILTER_SANITIZE_STRING);
            $smother=filter_var($_POST['smother'], FILTER_SANITIZE_STRING);
            $smnid=filter_var($_POST['smnid'], FILTER_SANITIZE_STRING);
            $smstatus=filter_var($_POST['smstatus'], FILTER_SANITIZE_STRING);
            $sphone=filter_var($_POST['sphone'], FILTER_SANITIZE_STRING);

           
            
                $sql="UPDATE parents SET hfather='$hfather', hfnid='$hfnid', hfstatus='$hfstatus', hmother='$hmother',
                hmnid='$hmnid', hmstatus='$hmstatus', hphone='$hphone', sfather='$sfather', sfnid='$sfnid', sfstatus='$sfstatus',
                smother='$smother', smnid='$smnid',smstatus='$smstatus', sphone='$sphone' WHERE `user_id`='$userID'";
                if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success">Success</div>';
                    echo '<script>window.location="myparents"</script>';
                }else{
                    echo '<div class="alert alert-danger">Failed</div>';
                }
        }
    }
}
?>
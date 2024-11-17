<?php
USE SQL AS DB;
class Contributions{
    public static function makeContribution(){
        if(isset($_POST['contribute'])){
            global $userID;
            $amount= $_POST['amount'];
            $sql= "INSERT INTO `monthlycontributions`(`user_id`, `amount`, `date`)
             VALUES ('$userID','$amount',NOW())";
             if(DB::runQuery($sql)){
                 echo '<div class="alert alert-info">Contribution Received Successfully</div>';
                 echo '<script>window.location="my-contributions"</script>';
             }else{
                 echo 'Failed';
             }
        }
    }

    public static function myContributions(){
        $out= "";
        global $userID;
        $sql="SELECT * FROM monthlycontributions where user_id='$userID'";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row= $result->fetch_assoc()){
                $rows[]= $row;
            }
            $out= $rows;
        }else{
            $out= "No data found";
        }
        return $out;
    }

    public static function getContributions(){
        $out= "";
        global $userID;
        $sql="SELECT members.reg, members.id, members.nid, members.fname, members.lname, monthlycontributions.id as
        m_id, monthlycontributions.amount, monthlycontributions.status, monthlycontributions.date
         FROM members INNER JOIN monthlycontributions ON monthlycontributions.user_id=members.user_id
        WHERE monthlycontributions.status='0'";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row= $result->fetch_assoc()){
                $rows[]= $row;
            }
            $out= $rows;
        }else{
            $out= "No data found";
        }
        return $out;
    }

    public static function getContributionsApproved(){
        $out= "";
        global $userID;
        $sql="SELECT members.reg, members.id, members.nid, members.fname, members.lname, monthlycontributions.id as
        m_id, monthlycontributions.amount, monthlycontributions.status, monthlycontributions.date
         FROM members INNER JOIN monthlycontributions ON monthlycontributions.user_id=members.user_id
        WHERE monthlycontributions.status='1'";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row= $result->fetch_assoc()){
                $rows[]= $row;
            }
            $out= $rows;
        }else{
            $out= "No data found";
        }
        return $out;
    }

    public static function approveContribution(){
        $id= $_GET['id'];
        $sql="UPDATE monthlycontributions SET status=1 WHERE id='$id'";
        if(DB::runQuery($sql)){
            echo 'Successfully Updated';
            echo '<script>window.location="monthlycontributions-pending"</script>';
        }else{
            echo 'Failed To update';
        }
    }

    public static function totalContributions(){
        $out= "";
        global $userID;
        $sql="SELECT sum(amount) AS total FROM monthlycontributions WHERE status='1'";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row= $result->fetch_assoc()){
                $rows[]= $row;
            }
            $out= $rows;
        }else{
            $out= "No data found";
        }
        return $out;
    }

    public static function totalContribution(){
        $out= "";
        global $userID;
        $sql="SELECT sum(amount) AS total FROM monthlycontributions WHERE user_id='$userID'  AND  status='1'";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row= $result->fetch_assoc()){
                $rows[]= $row;
            }
            $out= $rows;
        }else{
            $out= "No data found";
        }
        return $out;
    }
}
?>
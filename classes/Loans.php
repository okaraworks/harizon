<?php
USE SQL AS DB;
class Loans{
    public static function loanLimit(){
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

    public static function loanRequest(){
        if (isset($_POST['request'])) {
            global $userID;
            $principal=$_POST['principal'];
            $interest=$_POST['interest'];
            $years=$_POST['years'];
            $payment=$_POST['payment'];
            $total=$_POST['total'];
            $balance=$total;
            $totalinterest=$_POST['totalinterest'];
            // $date=date(now);
            $status='PENDING';
            $sql="INSERT INTO `loans`(`user_id`,`principal`,
            `interest`,`years`,`payment`,`total`,`totalinterest`,`balance`,`status`,`date`) 
            VALUES ('$userID','$principal','$interest','$years',
            '$payment','$total','$totalinterest','$balance','$status',NOW())";
            if(DB::runQuery($sql)){
                echo "<div class='alert alert-success'> Loan Request Has been Submitted Successfuly  
                <span style='color:blue'>Please wait for Approval</span></div>";
                echo '<script>window.location="my-loans"</script>';
            }else{
                // echo $sql;
                echo "<div class='alert alert-danger'>Request Not Submitted</div>";
            }
        }
    }

    public static function myLoans(){
        $out= "";
        global $userID;
        $sql="SELECT * FROM loans WHERE user_id='$userID' ";
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

    public static function thisLoan(){
        $out= "";
        $id= $_GET['q'];
        $sql="SELECT * FROM loans WHERE id='$id'";
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

    public static function receivePayments(){
        if(isset($_POST['lipaa'])){
            $id= $_POST['loan_id'];
            $amount= $_POST['amount'];
            global $userID;

            $sql= "INSERT INTO `repayments`(`loan_id`, `user_id`, `amount`, `date`) 
            VALUES ('$id','$userID','$amount',NOW())";
            if(DB::runQuery($sql)){

            }
        }
    }

    public static function lipaaLoan(){
        if(isset($_POST['lipaa'])){
            $id= $_POST['loan_id'];
            $amount= $_POST['amount'];

            $sql= "UPDATE loans SET `balance`= balance-$amount, paid=paid+$amount WHERE id='$id'";
            if(DB::runQuery($sql)){
                echo Loans::receivePayments();
                echo 'Success';
                echo '<script>window.location="my-loans"</script>';
            }else{
                echo 'failed ';
            }
        }
    }

    public static function myHistory(){
        $out='';
        global $userID;
        $sql="SELECT loans.principal, loans.id, loans.paid, loans.date as dt, repayments.id as p_id,
        repayments.amount, repayments.date, loans.balance FROM loans 
        INNER JOIN repayments ON repayments.loan_id=loans.id 
        WHERE repayments.user_id='$userID'
        ORDER BY repayments.id DESC";
        if($result=DB::runQuery($sql)){
           
            $rows= [];
            while($row=$result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;

        }else{
            $out="no loans";
        }
        return $out;
    }

    public static function pendingLoans(){
        $out='';
        $sql="SELECT members.id as members_id, members.reg, members.fname, members.lname, loans.id, loans.principal, 
        loans.interest, loans.years, loans.payment, loans.total, loans.totalinterest, loans.balance, loans.paid,
         loans.status, loans.date FROM members inner join loans on loans.user_id=members.user_id 
         WHERE loans.status=0
         order by loans.id DESC";
        if($result=DB::runQuery($sql)){
           
            $rows= [];
            while($row=$result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;

        }else{
            $out="no loans";
        }
        return $out;
    }

    public static function validateLoan(){
        $id= $_GET['id'];
        $sql= "UPDATE loans SET status='1' WHERE id='$id'";
        if(DB::runQuery($sql)){
            echo 'Success';
            echo '<script>window.location="pendingloans"</script>';
        }else{
            echo 'Failed to update';
        }
    }

    public static function approvedLoans(){
        $out='';
        $sql="SELECT members.id as members_id, members.reg, members.fname, members.lname, loans.id, loans.principal, 
        loans.interest, loans.years, loans.payment, loans.total, loans.totalinterest, loans.balance, loans.paid,
         loans.status, loans.date FROM members inner join loans on loans.user_id=members.user_id 
         WHERE loans.status=1
         order by loans.id DESC";
        if($result=DB::runQuery($sql)){
           
            $rows= [];
            while($row=$result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;

        }else{
            $out="no loans";
        }
        return $out;
    }

     public static function loanRepaymentHistory(){
        $out='';
        $sql="SELECT * FROM loans INNER JOIN MEMBERS ON members.user_id=loans.user_id 
        INNER JOIN repayments ON repayments.user_id=loans.user_id order by repayments.user_id DESC";
        if($result=DB::runQuery($sql)){
           
            $rows= [];
            while($row=$result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;

        }else{
            $out="no loans";
        }
        return $out;
    }

}
?>
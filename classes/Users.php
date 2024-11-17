<?php
use SQL as DB;

class Users{

    public static function getUsers(){
        $out = '';
        $sql = "SELECT * FROM users";

        if($no_rows = DB::countRows($sql)){
            $result = DB::runQuery($sql);
            $rows = [];
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            
            $out = $rows;
        }else{
            $out = '0 users';
        }
        return $out;
    }
    
    public static function getUser($id){
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $row = DB::getOne($sql);
        return $row;
    
    } 

    public static function userGet(){
        $out= "";
        global $userID;
        $sql = "SELECT * FROM users WHERE id = '$userID'";
       if($result= DB::runQuery($sql)){
           $rows=[];
           while($row= $result->fetch_assoc()){
               $rows[]=$row;
           }
           $out= $rows;
       }else{
           $out= "No data";
       }
       return $out;
    
    } 

    public static function editUsers(){
        $id=$_GET['id'];
        $out= "";
        global $userID;
        $sql = "SELECT * FROM users WHERE id = '$id'";
       if($result= DB::runQuery($sql)){
           $rows=[];
           while($row= $result->fetch_assoc()){
               $rows[]=$row;
           }
           $out= $rows;
       }else{
           $out= "No data";
       }
       return $out;
    
    } 

    public static function pass(){
        $id=$_GET['id'];
        $out= "";
        global $userID;
        $sql = "SELECT * FROM users WHERE id = '$id'";
       if($result= DB::runQuery($sql)){
           $rows=[];
           while($row= $result->fetch_assoc()){
               $rows[]=$row;
           }
           $out= $rows;
       }else{
           $out= "No data";
       }
       return $out;
    
    }

    public static function checkUser($username,$password){
        $out="";

        $sql="SELECT `id` FROM `users` WHERE `username` = '$username' AND password= MD5('$password') ";
        if($row=DB::getOne($sql)){
            //user exists 
            //creste session
            Session::createSession($row['id']);

            $out ="success";
           
        }else{
            //wrong data
            $out="Wrong password or username";
        }
        return $out;
    }

    public static function isAdmin($id){
        
        if($row = DB::getOne("SELECT `type` FROM `users` WHERE `id` = '$id' ")){
            if($row['type']=="admin"){
                return true;
            }
        }
        return false;
    }

    public static function registeredUsers(){
        $out='';
        $sql = "SELECT * FROM users ORDER BY `id` DESC";
        if($no_rows= DB::countRows($sql)){
            $result= DB::runQuery($sql);
            $rows= [];
            while($row= $result->fetch_assoc()){
                $rows[]=$row;

            }
            $out= $rows;           

        }else{
            $out='No Registered Users';
        }
        return $out;
        
    }

    public static function delUser(){
        $id=$_GET['id'];
        $sql="DELETE FROM users WHERE id='$id'";
        if(DB::runQuery($sql)){
            return $id.'Deleted  <script>window.location="users"</script>';
        }else{
            return 'Opps';
        }
    }
    
    

    public static function createUser(){
        if(isset($_POST['adduser'])){
                global $errors;
                $username=$_POST['username'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $type=$_POST['type'];
                $password=MD5("1212");

            if($row = DB::getOne("SELECT * FROM `users` WHERE `username`='$username' OR `email`='$email' LIMIT 1")){
                if(($row['username'] == $username) OR ($row['email'] == $email)){
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'> Sorry $username and $email already exists!!</div>";
                }
            }
            
            if (empty($username)) { echo "<div class='alert alert-danger'>Username is Required</div>"; }
            if (empty($email)) { echo "<div class='alert alert-danger'>Email Address is Required</div>"; } 
            if (empty($phone)) { echo "<div class='alert alert-danger'>PhoneNumber Required</div>"; } 

            if (count($errors) == 0) {
                $sql = "INSERT INTO `users`(`username`, `email`, `phone`, `type`, `password`, `date_added`) 
                            VALUES('$username','$email','$phone','$type','$password', NOW())";
                            if(DB::runQuery($sql)){
                                echo '<div class="alert alert-success">Dear '.ucfirst($username).' Your Account Created Sucessfully</div>';
                                echo '<script>window.location="users"</script>';
                            }else{
                                echo '<div class="alert alert-danger">Opps! Something went wrong!</div>';
                            }
            }
        }
    }
    public static function passwordRest(){
        if(isset($_POST['resetpassword'])){
                global $errors;
                $id=$_GET['id'];
                $password=$_POST['password'];            
            if (count($errors) == 0) {
                $password=MD5($password);
                $sql= "UPDATE `users` SET `password` = '$password' WHERE id='$id' ";
                if($result =DB::runQuery($sql)){
                   echo '<div class="alert alert-success">DOne!</div>';

                    echo '<script>window.location="users"</script>';
               }else{
                   echo '<div class="alert alert-success">Ooop!😥</div>';
                   echo '<script>window.location="users"</script>';
               }
            }
        }
    }

    public static function userEdit(){
        if(isset($_POST['editUser'])){
                global $errors;
                $id=$_GET['id'];
                $username=$_POST['username'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
            
            if (empty($username)) { echo "<div class='alert alert-danger'>Username is Required</div>"; }
            if (empty($email)) { echo "<div class='alert alert-danger'>Email Address is Required</div>"; } 
            if (empty($phone)) { echo "<div class='alert alert-danger'>PhoneNumber Required</div>"; } 

            if (count($errors) == 0) {
                $sql= "UPDATE `users` SET `username` = '$username', `email` = '$email', `phone` = '$phone' WHERE id='$id' ";
                if($result =DB::runQuery($sql)){
                    echo '<script>window.location="users"</script>';
               }else{
                   echo '<div class="alert alert-success">Ooop!😥</div>';
                   echo '<script>window.location="users"</script>';
               }
            }
        }
    }

    public static function signUser(){
        if(isset($_POST['signup'])){
                global $errors;
                $username=$_POST['username'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $password_1=$_POST['password_1'];
                $password_2=$_POST['password_2'];
                $type="user";

                if($password_1 != $password_2){
                    array_push($errors, "Opps");
                    echo"<div class='alert alert-danger'>Sorry the two passwords do not match</div>";
                }
                // $password=MD5("1212");

            if($row = DB::getOne("SELECT * FROM `users` WHERE `username`='$username' OR `email`='$email' LIMIT 1")){
                if(($row['username'] == $username) OR ($row['email'] == $email)){
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'> Sorry $username and $email already exists!!</div>";
                }
            }
            
            if (empty($username)) { echo "<div class='alert alert-danger'>Username is Required</div>"; }
            if (empty($email)) { echo "<div class='alert alert-danger'>Email Address is Required</div>"; } 
            if (empty($phone)) { echo "<div class='alert alert-danger'>PhoneNumber Required</div>"; } 

            if (count($errors) == 0) {
                $password=MD5($password_1);
                $sql = "INSERT INTO `users`(`username`, `email`, `phone`, `type`, `password`, `date_addedfuserddd`) 
                            VALUES('$username','$email','$phone','$type','$password', NOW())";
                            if(DB::runQuery($sql)){
                                echo '<div class="alert alert-success">Dear '.ucfirst($username).' Your Account Created Sucessfully</div>';
                                echo '<script>window.location="login"</script>';
                            }else{
                                echo '<div class="alert alert-danger">Opps! Something went wrong!</div>';
                            }
            }
        }
    }


    public static function changePassReq(){
        $out='';
        global $userID;
        $sql='SELECT * FROM users WHERE id="'.$userID.'"'; 
        if($no_rows=DB::countRows($sql)){
            $rows=[];
            $result=DB::runQuery($sql);
            while($row= $result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out ="No Logged In user";
        }
        return $out;
    }

    public static function changePass(){
        global $userID;
        if(isset($_POST['changepass'])){
            global $errors;
            // $id=$_GET['id'];
            $username= $_POST['username'];
            $password_1=$_POST['password_1'];
            $password_2=$_POST['password_2'];
        
        if($password_1 != $password_2){
            array_push($errors,"Sorry");
            echo '<div class="alert alert-danger">The two passwords do not match</div>';
        }

        if (count($errors) == 0) {
            
            $password=MD5($password_1);
            $sql = 'UPDATE `users` SET `username`="'.$username.'",`password` = "'.$password.'" WHERE id = "'.$userID.'" ';
            if(DB::runQuery($sql)){
                return '<div class="alert alert-success">Password Change Success<script>window.location="dashboard"</script></div>';

            }else{
                return '<div class="alert alert-danger">Opps! Something went wrong!</div>';
            }
        }
        }
    }

    public static function usersOnly(){
        $out="";
        $sql="SELECT * FROM `users` WHERE `type`='user'";
        if($result=DB::runQuery($sql)){
            $rows = [];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out= $rows;
        }else{
            $out="0 users";
        }
        return $out;
    }

    public static function updateActive(){
        global $userID;
        $date = date('Y-m-d h:i');
        $sql = "UPDATE users SET last_activity = '$date' WHERE id = '$userID' ";
        DB::runQuery($sql);
        // echo 'here';
    }

    public static function getLoggedUser(){
        $out='';
        global $userID;
        $sql='SELECT * FROM users WHERE id="'.$userID.'"'; 
        if($result=DB::runQuery($sql)){
            $rows=[];
            
            while($row= $result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out ="No Logged In user";
        }
        return $out;
    }

    public static function getLoggedUsers(){
        $out='';
        $sql='SELECT * FROM users WHERE `last_activity` > DATE_ADD(NOW(), INTERVAL -1 MINUTE)'; 
        if($result=DB::runQuery($sql)){
            $rows=[];
            while($row= $result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out="No Logged In user";
        }
        return $out;
    }
}
?>
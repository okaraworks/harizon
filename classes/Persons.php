<?php
 USE SQL As DB;
 class Persons{
     public static function registeredMembers(){
        $out='';
        $sql="SELECT * FROM members ORDER BY id DESC"; 
        if($result=DB::runQuery($sql)){
            $rows=[];
            
            while($row= $result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out ="NO DATA";
        }
        return $out;
     }

     public static function delUserAccount(){
        $user_id= $_GET['user'];
        $sql="DELETE FROM users WHERE id='$user_id'";
        if(DB::runQuery($sql)){
            // echo 'user Account Deleted';
        }else{
            echo 'unable to delete person';
            echo '<script>window.location="member-children"</script>';
        }
    }
     public static function delMember(){
        $id= $_GET['id'];
        // echo '<script>alert("Are you sure?")</script>';
        $sql="DELETE FROM members WHERE id='$id'";
        if(DB::runQuery($sql)){
            echo Persons::delUserAccount();
            echo 'Deleted';
            echo '<script>window.location="registered~persons"</script>';
        }else{
            echo 'unable to delete person';
            echo '<script>window.location="registered~persons"</script>';
        }
     }

     public static function getLastId(){
        if(isset($_POST['addperson'])){
           $phone= $_POST['phone'];
            $out="";
            $sql= "SELECT * FROM users WHERE phone='$phone'";
            if($result=DB::runQuery($sql)){
                $rows=[];
                while($row= $result->fetch_assoc()){
                    $rows[]= $row;
                }
                $out= $rows;
            }else{
                $out= 'Could not get last insert id';
            }
            return $out;
        }
    }

    public static function thisId(){
        if(isset($_POST['member_reg'])){
        // $id= Doctors::getLastId();
        // foreach ($id as $key => $value) {
        //     # code...
        //     echo $value['id'];
        // }
        }
    }
    public static function addPerson(){
        if(isset($_POST['addperson'])){
            $nid= $_POST['nid'];
            $regno= $_POST['regno'];
            $fname= filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
            $sname= filter_var($_POST['sname'],FILTER_SANITIZE_STRING);
            $lname= filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
            $gender= $_POST['gender'];
            $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
            $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
            $dob= $_POST['dob'];
            $type= "user";
            $password= MD5($nid);
            global $errors;
            $out="";

            if($row = DB::getOne("SELECT * FROM `users` WHERE `phone`='$phone' OR  `username`='$nid' LIMIT 1")){
                if($row['phone'] == $phone){
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'> Sorry  $phone already exists!!</div>";
                }
                if($row['username'] == $nid){
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'> Sorry  $nid already exists!!</div>";
                }
            }

            if($row = DB::getOne("SELECT * FROM `persons` WHERE `nid`='$nid' LIMIT 1")){
                if($row['nid'] == $nid) {
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'> Sorry $nid already exists!!</div>";
                }
            }

     
            if(count($errors) == 0){
                $sql= "INSERT INTO `users`(`username`, `email`, `phone`, `type`, `password`) 
                VALUES('$nid','$email','$phone','$type','$password')";
                echo '<div class="alert alert-success">User Created</div>';
                if(DB::runQuery($sql)){

                    $id= Persons::getLastId();
                    foreach ($id as $key => $value) {
                        # code...
                        $user_id= $value['id'];
                        // echo $user_id;
                    }
                    $sql="INSERT INTO `members`(`user_id`, `reg`, `nid`, `fname`, `sname`, `lname`, `phone`, `email`, `dob`,
                    `gender`, `date`) 
                    VALUES ('$user_id','$regno','$nid','$fname','$sname','$lname','$phone','$email', '$dob','$gender', NOW())";
                    if(DB::runQuery($sql)){;
                        echo '<div class="alert alert-success">Member Created</div>';
                        echo '<script>window.location="registered~persons"</script>';
                    }else{
                        echo 'zii';
                    }
                  
                   
                }else{
                    echo 'Failed';
                }
            }
        }
    }

    public static function regChildren(){
        if (isset($_POST['children'])) {
            // global $userID;
            if(isset($_POST['cname'])){
              $sql = "INSERT INTO `children`(`user_id`, `child`, `bno`) VALUES";
              $user_id =  $_POST['user_id'];
              $children = $_POST['cname'];
              $bno = $_POST['bno'];
             
             
          
              if(count($_POST['cname'])){
                  $out = [];
                  for($i = 0; $i <count($children); $i++ ){
                      if(!empty($children[$i])){
                          //add child to array
                          array_push($out, "('$user_id', '$children[$i]','$bno[$i]')"); 
                      }  
                  }
                  //explode the array into sql values
                  $sql .= implode(', ',$out);
              }
            
           if(DB::runQuery($sql)){
               echo 'Success';
               echo '<script>window.location="member-children";</script>';
           }else{
               echo $sql;
           }
            
          }
          }
    }

    public static function registeredChildren(){
        $out='';
        global $userID;
        $sql="SELECT * FROM members INNER JOIN children on children.user_id=members.user_id ORDER BY children.id DESC"; 
        if($result=DB::runQuery($sql)){
            $rows=[];
            
            while($row= $result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out ="NO DATA";
        }
        return $out;
    }

   
    public static function delChild(){
        $id= $_GET['id'];
        // $user_id= $_GET['user'];
        $sql="DELETE FROM children WHERE id='$id'";
        if(DB::runQuery($sql)){
            echo 'Deleted';
            echo '<script>window.location="member-children"</script>';
        }else{
            echo 'unable to delete person';
            echo '<script>window.location="member-children"</script>';
        }
     }

     public static function editMemberRequest(){
         $id= $_GET['id'];
         $out='';
        $sql="SELECT * FROM members WHERE id='$id' ORDER BY id DESC"; 
        if($result=DB::runQuery($sql)){
            $rows=[];
            
            while($row= $result->fetch_assoc()) {
                # code...
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out ="NO DATA";
        }
        return $out;
     }

     public static function editUser(){
        if(isset($_POST['editperson'])){
            $id= $_GET['user'];
            $nid= $_POST['nid'];
            $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
            $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);

            $sql= "UPDATE users SET username='$nid', phone='$phone', email='$email' WHERE id='$id'";

            if(DB::runQuery($sql)){
                // echo '<div class="alert alert-success">Member Edited</div>';
                // echo '<script>window.location="registered~persons"</script>';
            }
         }
     }
     public static function editMember(){
         if(isset($_POST['editperson'])){
            $id= $_GET['id'];
            $user_id=  $_GET['user'];
            $nid= $_POST['nid'];
            $fname= filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
            $sname= filter_var($_POST['sname'],FILTER_SANITIZE_STRING);
            $lname= filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
            $gender= $_POST['gender'];
            $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
            $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
            $dob= $_POST['dob'];
            $spouse= filter_var($_POST['spouse'],FILTER_SANITIZE_STRING);
             $snid= $_POST['snid'];
            $sphone= $_POST['sphone'];

            $sql= "UPDATE members SET nid='$nid', fname='$fname', sname='$sname', lname='$lname', gender='$gender',
            phone='$phone', email='$email', dob='$dob', spouse='$spouse', snid='$snid', sphone='$sphone'
            WHERE id='$id'";

            if(DB::runQuery($sql)){
                echo Persons::editUser();
                echo '<div class="alert alert-success">Member Edited</div>';
                echo '<script>window.location="registered~persons"</script>';
            }
         }
     }

     public static function memberInfo(){
        $id= $_GET['id'];
        $out='';
        $sql="SELECT * FROM members WHERE id='$id' ORDER BY id DESC"; 
        if($result=DB::runQuery($sql)){
           $rows=[];
           
           while($row= $result->fetch_assoc()) {
               # code...
               $rows[]=$row;
           }
           $out=$rows;
        }else{
           $out ="NO DATA";
        }
        return $out;
     }

     public static function childrenInfo(){
        $id= $_GET['user'];
        $out='';
        $sql="SELECT * FROM children WHERE user_id='$id' ORDER BY id DESC"; 
        if($result=DB::runQuery($sql)){
           $rows=[];
           
           while($row= $result->fetch_assoc()) {
               # code...
               $rows[]=$row;
           }
           $out=$rows;
        }else{
           $out ="NO DATA";
        }
        return $out;
     }

     public static function myData(){
        global $userID;
        $out='';
        $sql="SELECT * FROM members WHERE `user_id`='$userID'"; 
        if($result=DB::runQuery($sql)){
           $rows=[];
           
           while($row= $result->fetch_assoc()) {
               # code...
               $rows[]=$row;
           }
           $out=$rows;
        }else{
           $out ="NO DATA";
        }
        return $out;
     }

     public static function watotoWangu(){
        global $userID;
        $out='';
        $sql="SELECT * FROM children WHERE user_id='$userID' order by id desc"; 
        if($result=DB::runQuery($sql)){
           $rows=[];
           
           while($row= $result->fetch_assoc()) {
               # code...
               $rows[]=$row;
           }
           $out=$rows;
        }else{
           $out ="NO DATA";
        }
        return $out;
     }

     public static function personEditRequest(){
        global $userID;
        $out='';
       $sql="SELECT * FROM members WHERE `user_id`='$userID' ORDER BY id DESC"; 
       if($result=DB::runQuery($sql)){
           $rows=[];
           
           while($row= $result->fetch_assoc()) {
               # code...
               $rows[]=$row;
           }
           $out=$rows;
       }else{
           $out ="NO DATA";
       }
       return $out;
    }

    public static function personEdit(){
        if(isset($_POST['editperson'])){
            global $userID;
          
           $nid= $_POST['nid'];
           $fname= filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
           $sname= filter_var($_POST['sname'],FILTER_SANITIZE_STRING);
           $lname= filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
           $gender= $_POST['gender'];
           $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
           $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
           $dob= $_POST['dob'];
           $spouse= filter_var($_POST['spouse'],FILTER_SANITIZE_STRING);
           $snid= $_POST['snid'];
           $sphone= $_POST['sphone'];

           $sql= "UPDATE members SET nid='$nid', fname='$fname', sname='$sname', lname='$lname', gender='$gender',
           phone='$phone', email='$email', dob='$dob', spouse='$spouse',snid='$snid', sphone='$sphone'
            WHERE user_id='$userID'";

           if(DB::runQuery($sql)){
               echo Persons::updateUser();
               echo '<div class="alert alert-success">Member Edited</div>';
               echo '<script>window.location="dashboard"</script>';
           }
        }
    }

    public static function updateUser(){
        if(isset($_POST['editperson'])){
            global $userID;
            $nid= $_POST['nid'];
            $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
            $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);

            $sql= "UPDATE users SET username='$nid', phone='$phone', email='$email' WHERE id='$userID'";

            if(DB::runQuery($sql)){
                // echo '<div class="alert alert-success">Member Edited</div>';
                // echo '<script>window.location="registered~persons"</script>';
            }
         }
     }

     public static function registerMe(){
        if(isset($_POST['addperson'])){
            $nid= $_POST['nid'];
            $regno= $_POST['regno'];
            $fname= filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
            $sname= filter_var($_POST['sname'],FILTER_SANITIZE_STRING);
            $lname= filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
            $gender= $_POST['gender'];
            $phone= filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
            $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
            $dob= $_POST['dob'];
            global $errors;
            global $userID;

            

            if($row = DB::getOne("SELECT * FROM `persons` WHERE `nid`='$nid' LIMIT 1")){
                if($row['nid'] == $nid) {
                    array_push($errors, "Sorry");
                    echo"<div class='alert alert-danger'> Sorry $nid already exists!!</div>";
                }
            }

           

            if(count($errors) == 0){
                     $sql="INSERT INTO `members`(`user_id`, `reg`, `nid`, `fname`, `sname`, `lname`, `phone`, `email`, `dob`,
                     `gender`, `date`) 
                    VALUES ('$userID','$regno','$nid','$fname','$sname','$lname','$phone','$email', '$dob','$gender', NOW())";
                    if(DB::runQuery($sql)){
                        echo '<div class="alert alert-success">Success</div>';
                        echo '<script>window.location="view-details"</script>';
                    }else{
                        echo 'zii';
                    }
                  
            }
        }
    }

    public static function addMyChildren(){
        if (isset($_POST['children'])) {
            // global $userID;
            if(isset($_POST['cname'])){
              $sql = "INSERT INTO `children`(`user_id`, `child`, `bno`) VALUES";
              global $userID;
              $children = $_POST['cname'];
              $bno = $_POST['bno'];
             
             
          
              if(count($_POST['cname'])){
                  $out = [];
                  for($i = 0; $i <count($children); $i++ ){
                      if(!empty($children[$i])){
                          //add child to array
                          array_push($out, "('$userID', '$children[$i]','$bno[$i]')"); 
                      }  
                  }
                  //explode the array into sql values
                  $sql .= implode(', ',$out);
              }
            
           if(DB::runQuery($sql)){
               echo 'Success';
               echo '<script>window.location="dashboard";</script>';
           }else{
               echo $sql;
           }
            
          }
          }
    }

    public static function regMyChildren(){
        if (isset($_POST['children'])) {
            if(isset($_POST['cname'])){
              $sql = "INSERT INTO `children`(`user_id`, `child`, `bno`) VALUES";
              $user_id =  $_POST['user_id'];
              $children = $_POST['cname'];
              $bno = $_POST['bno'];
             
             
          
              if(count($_POST['cname'])){
                  $out = [];
                  for($i = 0; $i <count($children); $i++ ){
                      if(!empty($children[$i])){
                          //add child to array
                          array_push($out, "('$user_id', '$children[$i]','$bno[$i]')"); 
                      }  
                  }
                  //explode the array into sql values
                  $sql .= implode(', ',$out);
              }
            
           if(DB::runQuery($sql)){
               echo 'Success';
               echo '<script>window.location="mychildren";</script>';
           }else{
               echo $sql;
           }
            
          }
          }
    }

    public static function thisParent(){
        $out='';
        $nid = $_GET['q'];
        $sql="SELECT * FROM `members` WHERE `nid`= '$nid'  ORDER BY `id` DESC"; 
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

    public static function updateSpouse(){
        if(isset($_POST['adding'])){
            $snid= $_POST['snid'];
            $sphone= $_POST['sphone'];
            $code= $_POST['code'];
            global $userID;
            $sql= "UPDATE members SET snid='$snid', scode='$code', sphone='$sphone' WHERE user_id='$userID'";
            if(DB::runQuery($sql)){
                echo '<div class="alert alert-success>Success</div>';
                echo '<script>window.location="view-details</script>';
            }else{
                echo 'Something went wrong';
            }
        }
    }


 }
?>
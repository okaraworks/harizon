<?php
    USE SQL As DB;
    class Children{
        public static function addChild(){
            if(isset($_POST['add_child'])){
                if(isset($_POST['cname'])){
                    $sql = "INSERT INTO children (`parent_Id`, `nid` ,`child`,`date`) VALUES";
                    $id =  $_POST['parent_id'];
                    $regno= $_POST['regno'];
                    $children = $_POST['cname'];
                    $date = date('Y-m-d h:i');
                   
                   
                
                    if(count($_POST['cname'])){
                        $out = [];
                        for($i = 0; $i <count($children); $i++ ){
                            if(!empty($children[$i])){
                                //add child to array
                                array_push($out, "('$id','$regno','$children[$i]','$date')"); 
                            }  
                        }
                        //explode the array into sql values
                        $sql .= implode(', ',$out);
                    }
                  
                    if(DB::runQuery($sql)){
                        echo '<div class="alert alert-success"> Successfully Added</div>';
                        echo '<script>window.location="registered~persons"</script>';
                    }else{
                        echo '<div class="alert alert-danger">  Not Added</div>';
                    }
                }
            }
        }

        public static function getChildren(){
            $out='';
            // global $userID;
            $sql='SELECT children.child,  children.id, persons.names from `persons`
             inner join `children` on children.parent_Id=persons.id
             ORDER BY children.id DESC'; 
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

        public static function filterChild(){
            $out='';
            // global $userID;
            $sql='SELECT children.child,  children.id, persons.names, children.parent_Id as paro from `persons`
             inner join `children` on children.parent_Id=persons.id
             group by children.parent_Id DESC'; 
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

         public static function filteredChild(){
            $out='';
            // global $userID;
            $q= $_GET['q'];
            $sql="SELECT children.child,  children.id, persons.names, children.parent_Id as paro from `persons`
             inner join `children` on children.parent_Id=persons.id
             WHERE children.parent_Id='$q'"; 
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

        public static function delChild(){
            $id= $_GET['id'];
            $sql= "DELETE FROM children WHERE id= '$id'";
            if(DB::runQuery($sql)){
                echo '<script>alert("Deleted"); window.location="registered~children"</script>';
            }
        }

        public static function delMyChild(){
            $id= $_GET['id'];
            $sql= "DELETE FROM children WHERE id= '$id'";
            if(DB::runQuery($sql)){
                echo '<script>alert("Deleted"); window.location="mychildren"</script>';
            }
        }

        public static function editChild(){
            $out='';
            $id= $_GET['id'];
            $sql="SELECT * FROM `children` WHERE `id`= '$id'"; 
            if($result=DB::runQuery($sql)){
                $rows=[];
                
                while($row= $result->fetch_assoc()) {
                    # code...
                    $rows[]=$row;
                }
                $out=$rows;
            }else{
                $out ="no data";
            }
            return $out;
        }

        public static function editingChild(){
            if(isset($_POST['edit_child'])){
                $id= $_GET['id'];
                $child= $_POST['child'];
                $bno= $_POST['bno'];
                $sql= "UPDATE children SET child= '$child', bno='$bno' WHERE id= '$id'";
                if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success"> Successfully Updated</div>';
                    echo '<script>window.location="member-children"</script>';
                }else{
                    echo '<div class="alert alert-danger">Not Added</div>';
                }

            }
        }

        public static function editingMyChild(){
            if(isset($_POST['edit_child'])){
                $id= $_GET['id'];
                $child= filter_var($_POST['child'], FILTER_SANITIZE_STRING);
                $bno= $_POST['bno'];
                $sql= "UPDATE children SET child= '$child', bno='$bno' WHERE id= '$id'";
                if(DB::runQuery($sql)){
                    echo '<div class="alert alert-success"> Successfully Updated</div>';
                    echo '<script>window.location="mychildren"</script>';
                }else{
                    echo '<div class="alert alert-danger">Not Added</div>';
                }

            }
        }
    
    }
?>
<?php
USE SQL AS DB;
class Events{
    public static function createEvent(){
        if(isset($_POST['create_event'])){
            $event= filter_var($_POST['event'], FILTER_SANITIZE_STRING);
            $description= filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $organiser= filter_var($_POST['organiser'], FILTER_SANITIZE_STRING);
            $date= $_POST['date'];

            $sql= "INSERT INTO `events`(`event`, `description`,`organiser`, `date`, `date_created`) 
            VALUES ('$event', '$description','$organiser','$date',NOW())";
            if(DB::runQuery($sql)){
                echo '<div class="alert alert-success">Success</div>';
                echo '<script>window.location="events.html"</script>';
            }else{
                echo 'Failed';
            }
        }
    }

    public static function getEvents(){
        $out= "";
        $sql="SELECT * FROM events ORDER BY id desc";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out= "No results";
        }
        return $out;
    }

    public static function getEventsToday(){
        $out= "";
        $sql="SELECT * FROM events WHERE DATE(date_created) = CURDATE() AND status= 0
         ORDER BY id desc";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out= "No results";
        }
        return $out;
    }

    public static function deleteEvent(){
        $id= $_GET['id'];
        $sql= "DELETE FROM events WHERE id='$id'";
        if(DB::runQuery($sql)){
            echo 'Success';
            echo '<script>window.location="events.html"</script>';
        }else{
            echo 'Success';
            echo '<script>window.location="events.html"</script>';
        }
    }

    public static function editRequest(){
        $out= "";
        $id= $_GET['q'];
        $sql="SELECT * FROM events WHERE id='$id'";
        if($result= DB::runQuery($sql)){
            $rows= [];
            while($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
            $out=$rows;
        }else{
            $out= "No results";
        }
        return $out;
    }

    public static function editEvent(){
        if(isset($_POST['edit_event'])){
            $id= $_GET['q'];
            // $id= $_POST['q'];
            $event= filter_var($_POST['event'], FILTER_SANITIZE_STRING);
            $description= filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $organiser= filter_var($_POST['organiser'], FILTER_SANITIZE_STRING);
            $date= $_POST['date'];

            $sql= "UPDATE events SET event='$event', description='$description', organiser='$organiser', date='$date' WHERE id='$id'";
            if(DB::runQuery($sql)){
                echo '<div class="alert alert-success">Success</div>';
                echo '<script>window.location="events.html"</script>';
            }else{
                echo 'Failed';
            }
        }
    }
}
?>
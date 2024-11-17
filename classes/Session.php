<?php
use SQL as DB;
class Session{
    public static function createSession($id){
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        
        return "Suceess";
       
        
    }

    public static function logOut(){
        session_destroy();
        
        echo '<script>window.location="login"</script>';
    }

    public static function checkSession(){
        if(isset($_SESSION['loggedin'])){
            if($_SESSION['loggedin']){
                return true;
            }
            return false;
        }
        return false;
    }

    public static function getUser(){
        if(isset($_SESSION['id'])){
            return $_SESSION['id'];
        }
        return 0;
    }
}
?>
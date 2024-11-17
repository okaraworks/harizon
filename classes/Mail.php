<?php
 USE SQL As DB;
 class Mail{
     public static function sendEmail(){
         if(isset($_POST['send_email'])){
             $to= $_POST['to'];
             $subject= $_POST['subject'];
             $msg= $_POST['msg'];
             $message = wordwrap($msg,70);
             $headers= "From: brianjuniorrasugu@gmail.com" . "\r\n";
             mail($to,$subject,$message,$headers);
             echo 'wow';
         }
     }
 }
?>
<?php 

error_reporting(E_ALL);
session_start();
//Define connection
define('DBPATH','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','birongo');

include 'Autoloader.php';


//Session
$userID = Session::getUser();

//errors
$errors = array();

?>
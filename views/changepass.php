<?php
include 'views/header.php';
if(!Session::checkSession()){
?>
<script src="public/js/jquery.min.js"></script>

<script>
    window.location="login";
</script>
<?php
} else{
    global $userID;
    $req=Users::changePassReq($userID);
    foreach ($req as $key => $value) {
        # code...
    ?>
    <script src="public/js/jquery.min.js"></script>
    <body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   
<?php include'views/sidebar.php'?>
  

    
 
    <!-- <center> -->
    <div id="page-wrapper">
    <div class="panel panel-primary">
    <div class="panel-heading">Password Changing</div>
    <div class="panel-body">
        <?php echo Users::changePass();?>
        <form action="" method="post" enctype="multipart/form-data">
                        <?php include('errors.php')?>
        
       
              <div class="form-group">
            <input type="text" name="username" value="<?php echo ucfirst($value['username']);?>"   class="form-control">
            </div>
             
             <div class="form-group">
            <input type="password" name="password_1" placeholder="Enter Password"  required="" class="form-control">
                </div>

           <div class="form-group">
            <input type="password" name="password_2" placeholder="Retype Password" class="form-control">
                </div>

       
        
     
            <button class="btn btn-primary" type="submit" name="changepass">Submit</button>
        </div>
                
                            
                    
                        
        </form>
    </div>
    </center>



</body>
<?php } }?>

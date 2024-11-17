<?php 
include 'views/header.php';
if(!Session::checkSession()){
    echo '<script>window.location="login"</script>';
}else{  
?>
<div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
    		<div class="col-lg-12">
            <div class="col-lg-6 col-md-8 px-lg-3 px-0">
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-gear"></i> Reset Password</h3>
              </div>
              
              <div class="panel-body">
              <?php
                $users = Users::pass();
                foreach ($users as $key => $value) {?>
                <form action="change-pass?id=<?php echo $value['id'];?>"method="post" enctype="multipart/form-data" >
                <?php include('errors.php')?>
                <div class="form-group">
                    <strong style="color:red;">Reset password to user phone number!</strong>
                    <input type="text" name="password" value="<?php echo $value['phone']?>" class="form-control" required="" readonly>
                </div>

                    <button class="btn btn-warning" type="submit" name="resetpassword">Reset</button>
                </form>
                <?php }?>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
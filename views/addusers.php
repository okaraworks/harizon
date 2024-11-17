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
                <h3 class="panel-title"><i class="fa fa-users"></i> User Registration</h3>
              </div>
              
              <div class="panel-body">
            <?php Users::createUser()?>
                <form action="add-users" method="post" enctype="multipart/form-data">
                <?php include('errors.php')?>
                <div class="form-group">
                    <input type="text" name="username" placeholder="username" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control" required="">
                </div>

                <div class="form-group">
                    <input type="text" name="phone" placeholder="Mobie Number" class="form-control">
                </div>

                    <input type="radio" name="type" value="admin">Admin
                    <input type="radio" name="type" value="user">User
                    <button class="btn btn-primary" type="submit" name="adduser">Submit</button>
                </form>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
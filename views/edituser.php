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
                <h3 class="panel-title"><i class="fa fa-edit"></i> Edit User</h3>
              </div>
              
              <div class="panel-body">
              <?php
                $users = Users::editUsers();
                foreach ($users as $key => $value) {?>
                <form action="edit-users?id=<?php echo $value['id'];?>"method="post" enctype="multipart/form-data" >
                <?php include('errors.php')?>
                <div class="form-group">
                    <input type="text" name="username" value="<?php echo $value['username']?>" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <input type="email" name="email" value="<?php echo $value['email']?>" class="form-control" required="">
                </div>

                <div class="form-group">
                    <input type="text" name="phone" value="<?php echo $value['phone']?>"" class="form-control">
                </div>
                    <button class="btn btn-primary" type="submit" name="editUser">Edit</button>
                </form>
                <?php }?>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
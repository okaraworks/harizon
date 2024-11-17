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
                <h3 class="panel-title"><i class="fa fa-users"></i>Member Registration</h3>
              </div>
              
              <div class="panel-body">
            <?php Persons::addPerson()?>
                <form method="post" enctype="multipart/form-data">
                <?php include('errors.php')?>
                <div class="form-group">
                    <input type="hidden" name="regno" value="<?php echo 'UHIF/'.date('Y')?>" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <input type="text" name="nid" placeholder="National Id" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <input type="text" name="fname" placeholder="First Name" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <input type="text" name="sname" placeholder="Second Name" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <input type="text" name="phone" placeholder="Mobile Number" class="form-control" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" placeholder="Date of Birth" class="form-control" >
                </div>

                <label>Select Gender</label>
                    <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female<br>
                
                    <button class="btn btn-primary" type="submit" name="addperson">Submit</button>
                </form>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
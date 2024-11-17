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
                <h3 class="panel-title"><i class="fa fa-users"></i>Edit Member</h3>
              </div>
              
              <div class="panel-body">
                  <?php echo Persons::editMember();?>
            <?php Persons::addPerson()?>
                <?php 
                $person= Persons::editMemberRequest();
                foreach ($person as $key => $value) {
                ?>
                <form method="post" enctype="multipart/form-data">
                <?php include('errors.php')?>
                

                <div class="form-group">
                    <label>National Id</label>
                    <input type="text" name="nid" placeholder="National Id" value="<?php echo $value['nid']?>" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="First Name" value="<?php echo $value['fname']?>" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <label>Second Name</label>
                    <input type="text" name="sname" placeholder="Second Name" value="<?php echo $value['sname']?>" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $value['lname']?>" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="Mobile Number" value="<?php echo $value['phone']?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Email Address" value="<?php echo $value['email']?>" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" name="dob" placeholder="Date of Birth" value="<?php echo $value['dob']?>" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender" placeholder="Gender" value="<?php echo $value['gender']?>" class="form-control" >
                </div>
                
                
               

                    <button class="btn btn-primary" type="submit" name="editperson">Submit</button>
                </form>
                <?php }?>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
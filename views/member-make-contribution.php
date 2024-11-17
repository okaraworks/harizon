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
                <h3 class="panel-title"><i class="fa fa-money"></i>Monthly Contributions</h3>
              </div>
              
              <div class="panel-body">
            <?php Contributions::makeContribution() ?>
                <form method="post" enctype="multipart/form-data">
                
                
                <?php
                 $member= Users::userGet();
                 foreach ($member as $key => $value) { ?>
                <div class="form-group">
                <label>National Id</label>
                    <input type="text" name="nid" value="<?php echo $value['username']?>" placeholder="National Id" class="form-control" disabled >
                </div>

           

                <div class="form-group">
                <label>Phone Number</label>
                    <input type="text" name="phone" value="<?php echo $value['phone']?>" placeholder="Mobile Number" class="form-control" required >
                </div>

                <div class="form-group">
                    <input type="number" name="amount"  placeholder="Enter Amount" class="form-control" required>
                </div>
                    <?php }?>
                

                
                    <button class="btn btn-primary" type="submit" name="contribute">Submit</button>
                </form>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
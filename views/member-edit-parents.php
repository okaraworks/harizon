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
            <!-- <div class="col-lg-6 col-md-8 px-lg-3 px-0"> -->
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i>Edit Member</h3>
              </div>
              
              <div class="panel-body">
                  <?php echo Parents::editMyParent();?>
                      <form class="horizontal-form" method="post">
                    
                  <?php
                  $parent= Parents::editMyPRequest();
                  foreach ($parent as $key => $value) {
                  ?>
                    <div class="panel-body">
                        <div class="col-md-6">
                        <div class="panel panel-success">
                        <div class="panel-heading">Husband Parents</div>
                            <div class="panel-body">
                                <div class="form-group">
                                <label>Father's Details</label>
                                    <input type="text" name="hfather" value="<?php echo $value['hfather']?>" placeholder="Full Names" class="form-control">
                                    <input type="number" name="hfnid" value="<?php echo $value['hfnid']?>" placeholder="National Id">
                                    <input type="text" name="hfstatus" value="<?php echo $value['hfstatus']?>">
                                </div>
                                <hr>
                                <div class="form-group">
                                <label>Mother's Details</label>
                                    <input type="text" name="hmother" value="<?php echo $value['hmother']?>" placeholder="Full Names" class="form-control">
                                    <input type="number" name="hmnid" value="<?php echo $value['hmnid']?>" placeholder="National Id">
                                    <input type="text" name="hmstatus" value="<?php echo $value['hmstatus']?>">
                                </div>
                                <hr>
                                 <div class="form-group">
                                <label>Phone Number(For any of the above or both)</label>
                                    <input type="text" name="hphone" value="<?php echo $value['hphone']?>" placeholder="Mobile Number" class="form-control">
                                </div>

                                
                            </div>
                        </div>
                       
                        </div>
                        <div class="col-md-6">
                        <div class="panel panel-info">
                        <div class="panel-heading">Spouse Parents</div>
                            <div class="panel-body">
                            <div class="form-group">
                                <label>Father's Details</label>
                                    <input type="text" name="sfather" value="<?php echo $value['sfather']?>" placeholder="Full Names" class="form-control">
                                    <input type="number" name="sfnid" value="<?php echo $value['smother']?>" placeholder="National Id">
                                    <input type="text" name="sfstatus" value="<?php echo $value['sfstatus']?>">
                                </div>
                                <hr>
                                <div class="form-group">
                                <label>Mother's Details</label>
                                    <input type="text" name="smother"value="<?php echo $value['smother']?>" placeholder="Full Names" class="form-control">
                                    <input type="number" name="smnid" value="<?php echo $value['smnid']?>" placeholder="National Id">
                                    <input type="text" name="smstatus" value="<?php echo $value['smstatus']?>">
                                </div>
                                <hr>
                                 <div class="form-group">
                                <label>Phone Number(For any of the above or both)</label>
                                    <input type="text" name="sphone" value="<?php echo $value['sphone']?>" placeholder="Mobile Number" class="form-control">
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php }?>
                        <button class="btn btn-success" name="editmyparents">Submit</button>
                    </div>
                    
                    </form>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
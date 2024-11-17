<?php 
include 'views/header.php';
?>

        <div class="row">
   

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Parent Info</div>
                    <form class="horizontal-form" method="post">
                  <input type="hidden" name="parent_id" value="<?php echo $_GET['q']?>">
                  <?php
                  $parent= Parents::editRequest();
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
                        <button class="btn btn-success" name="editparents">Submit</button>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    

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
                <?php
                $person= Persons::thisPerson();
                foreach ($person as $key => $value) {
                ?>
        <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> Adding children for <i class="fa fa-arrow-circle-right"></i> <?php echo $value['names']?></h3>
              </div>
              
              <div class="panel-body">
                <div class="table-responsive" id="">
                    <?php echo Children::addChild();?>
                <form method="POST">
                        <input type="hidden" name="parent_id" value="<?php echo $value['id']?>">
                        <input type="hidden" name="regno" value="<?php echo $value['regno']?>">
                    
                    <div class="form-group input-group">
                        <span class="input-group-addon">No.1</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.2</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.3</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.4</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.5</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.6</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.7</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.8</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.9</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">No.10</span>
                        <input type="text" name="cname[]" class="form-control" placeholder="Name"  >
                    </div>

                    

                    
                    
                    <div class="form-group input-group">
                        <button name="add_child" class="btn btn-primary" type="submit">Submit <i class="fa fa-arrow-circle-right"></i> </button>
                    </div>

            </form>
                    <?php }?>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
    	</div>
    	</div>

</div>

    	
<?php }?>

                        
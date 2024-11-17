<?php 
if(!Persons::thisParent()){
    echo '<div class="alert alert-info">No record Found</div>';
}else{
?>
<div id="wrapper">
    	
    	<div id="page-wrapper">
    		<div class="col-lg-12">
            <div class="col-lg-6 col-md-8 px-lg-3 px-0">
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Add Next of Kin</h3>
              </div>
              
              <div class="panel-body">
            
                <form  method="post" enctype="multipart/form-data">
                <?php
            $parent= Persons::thisParent();
            foreach ($parent as $key => $value) {
            ?>
        <div class="alert alert-info">Adding Next of Kin to <?php echo $value['fname']?> <?php echo $value['lname']?></div>
                        <input type="hidden" name="user_id" value="<?php echo $value['user_id'] ?>">  
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="names" placeholder="Enter Fullnames" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <label>National Id</label>
                    <input type="number" name='nid' placeholder="National Id" class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="Phone Number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Relationship</label>
                    <input type="text" name="relationship" placeholder="Relationship e.g Parent" class="form-control">
                </div>

                    
                    <button class="btn btn-primary" type="submit" name="add">Add</button>
                </form>
                <?php }?>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
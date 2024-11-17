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
            <div class="panel panel-success" >
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> Editing Child Name</h3>
              </div>
              
              <div class="panel-body">
            <?php Children::editingMyChild();
            $child= Children::editChild();
            foreach ($child as $key => $value) {
                # code...
            
            ?>
                <form  method="post" enctype="multipart/form-data">
            
                <div class="form-group">
                    <input type="text" name="child"  class="form-control" value="<?php echo $value['child']?>" >
                </div>

                
                <div class="form-group">
                    <input type="text" name="bno"  class="form-control" value="<?php echo $value['bno']?>" >
                </div>

                    <button class="btn btn-primary" type="submit" name="edit_child">Submit</button>
                </form>
            <?php }?>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
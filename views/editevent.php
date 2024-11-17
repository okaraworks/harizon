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
                <h3 class="panel-title"><i class="fa fa-bell"></i> Add Event</h3>
              </div>
              
              <div class="panel-body">
                  <?php Events::editEvent()?>
                <?php 
                    $event= Events::editRequest();
                    foreach ($event as $key => $value) {
                        # code...
                ?>
                <form  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Event Title</label>
                    <input type="text" name="event" placeholder="EventTitle" value="<?php echo $value['event']?>" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="Say something" required><?php echo $value['description']?></textarea>
                </div>

                <div class="form-group">
                    <label>Organiser</label>
                    <input type="text" name="organiser" placeholder="Organiser" value="<?php echo $value['organiser']?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" placeholder="Organiser" value="<?php echo $value['date']?>" class="form-control">
                </div>

                    
                    <button class="btn btn-success" type="submit" name="edit_event">Update</button>
                </form>
                <?php }?>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
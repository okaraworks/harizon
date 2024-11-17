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
                <?php Events::createEvent()?>
                <form  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Event Title</label>
                    <input type="text" name="event" placeholder="EventTitle" class="form-control" required="" >
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="Say something" required></textarea>
                </div>

                <div class="form-group">
                    <label>Organiser</label>
                    <input type="text" name="organiser" placeholder="Organiser" class="form-control">
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" placeholder="Organiser" class="form-control">
                </div>

                    
                    <button class="btn btn-primary" type="submit" name="create_event">Create</button>
                </form>
            </div>
    		
    	    </div>
    	</div>
    </div>
<?php }?>
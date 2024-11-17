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
            <!-- <button onClick='window.print()' class="btn btn-sm btn-primary">Print</button>
            <button onclick="window.location='member-children'" class="btn btn-sm btn-danger">Back</button> -->
        <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title">Next of Kin Registration</h3>
              </div>
            
              <div class="panel-body">
            
                <?php echo NextofKin::regMyNext();?>
                
                
                <form  method="post" enctype="multipart/form-data">
              
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
                </div>
              </div>
              </div>
            </div>
          </div>
    	</div>
    	</div>

</div>

    	
<?php }?>

<script>
	function search(str) {
    if (str == "") {
        document.getElementById("hapa").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("hapa").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","adding-nextofkin?q="+str,true);
        xmlhttp.send();
    }
}
</script>
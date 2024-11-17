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
              <input type="text" name="nid" onChange="search(this.value)" name="search" placeholder="Enter Member's Id Number"><button>Search</button>
                <div class="table-responsive" id="hapa">
                <?php echo NextofKin::regNext();?>
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
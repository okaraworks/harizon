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
            <button onClick='window.print()' class="btn btn-sm btn-primary">Print</button>
            <button onclick="window.location='member-children-add'" class="btn btn-sm btn-info">Add Children</button>
        <div class="panel panel-success" >
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> Registered Children</h3>
              </div>
            
              <div class="panel-body">
                <div class="table-responsive" id="hapa">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th># <i class="fa fa-sort"></i></th>
                        <th>Parent<i class="fa fa-sort"></i></th>
                        <th>Birth Certificate Number<i class="fa fa-sort"></i></th>
                        <th>Child Name<i class="fa fa-sort"></i></th>
                        <!-- <th>Edit<i class="fa fa-sort"></i></th> -->
                        <th>Action<i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                      $child = Persons::registeredChildren();
                      $index= 1;
                      foreach ($child as $key => $value) {
                          if($value['bno']==""){
                            $bno= "<p class='alert-danger'>~MISSSING BIRTH CERT No~</p>";
                          }else{
                            $bno= $value['bno'];
                          }
                          ?>
                      <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo ucfirst($value['fname']).' '.ucfirst($value['sname']).' '.ucfirst($value['lname'])?>  </td>
                        <td><?php echo $bno?></td>
                        <td><?php echo $value['child']?></td>
                        
                        
                        <td>
                        <a href="edit-child?id=<?php echo $value['id']?>" class="btn btn-sm btn-success">Edit</a>
                          <!-- <button onClick="delChild()"><i class="fa fa-trash-o"></i></button> -->
                          <a href="delete-child?id=<?php echo $value['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                          <!-- <a href="delete-child?id=<?php echo $value['id']?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a> -->
                        </td>
                      </tr>
                      <!-- <script>
                        function delChild(){
                          var del=confirm("Delete <?php echo $value['child']?> ?");
                          if(del==true){
                            window.location="delete-child?id=<?php echo $value['id']?>";
                          }else{
                            window.location="member-children";
                          }
                        }
                      </script> -->
                      <?php $index++; }?>
      
                    </tbody>
                  </table>
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
	function getHouse(str) {
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
        xmlhttp.open("GET","filtered-children?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php 
include 'views/header.php';
if(!Session::checkSession()){
    echo '<script>window.location="login"</script>';
}else{  
?>
<script src="public/js/jquery.min.js"></script>
<div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
    		<div class="col-lg-12">
            <button class="btn btn-sm btn-primary" onclick="window.location='addParent'">Add</button>
            <button class="btn btn-sm btn-info" onClick="window.print()">Print</button>
            
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Registered Member Parents</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
    		<table class="table table-bordered table-hover table-striped tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/NO<i class="fa fa-sort"></i></th>
                        <th>Parents For</th>
                        <th>Husband.Father<i class="fa fa-sort"></i></th>
                        <th>Husband.Mother<i class="fa fa-sort"></i></th>
                        <th>Spouse.Father<i class="fa fa-sort"></i></th>
                        <th>Spouse.Mother<i class="fa fa-sort"></i></th>
                        <th>Action<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $parents= Parents::getParents();
                $index= 1;
                foreach ($parents as $key => $value) { ?>
                    <tr>
                        <td><?php echo $index?></td>
                          <td><?php echo ucfirst($value['fname']).' '.ucfirst($value['sname']).' '.ucfirst($value['lname'])?>  </td>
                        <td><?php echo ucfirst($value['hfather'])?></td>
                        <td><?php echo ucfirst($value['hmother'])?></td>
                        <td><?php echo ucfirst($value['sfather'])?></td>
                        <td><?php echo ucfirst($value['smother'])?></td>
                       
                        <td>
                            <a href="members-parents-view?id=<?php echo $value['id']?>&user=<?php echo $value['user_id']?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i></a>
                            <a href="deleteparent?id=<?php echo $value['user_id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" value="<?php echo $value['id']?>" onClick="editParent(this.value)"><i class="fa fa-pencil"></i></button>
                        </td>
                    </tr>
                   
                <?php $index++; }?>
                </tbody>
            </table>
            </div>
         </div>
     </div>
    </div>
    </div>
</div>

<div class="modal fade"  id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Editing Parents</h4>
            </div>
            <?php echo Parents::editParent()?>
            <div class="modal-body" id="here">
       
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
	function editParent(str) {
    if (str == "") {
        document.getElementById("here").innerHTML = "";
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
                document.getElementById("here").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","editparents?q="+str,true);
        xmlhttp.send();
    }
}
</script>
    	
<?php }?>   




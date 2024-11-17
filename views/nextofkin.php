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
            <button class="btn btn-sm btn-primary" onclick="window.location='addnextofkin'">Add</button>
            <button class="btn btn-sm btn-info" onClick="window.print()">Print</button>
           
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Next Of Kin</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
    		<table class="table table-bordered table-hover table-striped tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/NO<i class="fa fa-sort"></i></th>
                        <th>Next of Kin for<i class="fa fa-sort"></i></th>
                        <th>Next of Kin Names<i class="fa fa-sort"></i></th>
                        <th>National Id<i class="fa fa-sort"></i></th>
                        <th>Phone Number<i class="fa fa-sort"></i></th>
                        <th>Relationship with Member<i class="fa fa-sort"></i></th>
                        <th>Action<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $member= NextofKin::viewRegistered();
                $index= 1;
                foreach ($member as $key => $value) { ?>
                    <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo ucfirst($value['fname'])?> <?php echo ucfirst($value['sname'])?> <?php echo ucfirst($value['lname'])?></td>
                        <td><?php echo ucfirst($value['names'])?></td>
                        <td><?php echo ucfirst($value['nid'])?></td>
                        <td><?php echo $value['phone']?></td>
                        <td><?php echo ucfirst($value['relationship'])?></td>
                        <td>
                            <!-- <a href="member-info.htm?id=<?php echo $value['id']?>&user=<?php echo $value['user_id']?>"><i class="fa fa-search"></i></a> -->
                            <a href="deletenext?id=<?php echo $value['user_id']?>"><i class="fa fa-trash-o"></i></a>
                            <button data-toggle="modal" data-target="#myModal" value="<?php echo $value['user_id']?>" onClick="editNext(this.value)"><i class="fa fa-pencil"></i></button>
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
                <h4>Editing Next Of Kin</h4>
            </div>
            <?php echo NextofKin::editNext()?>
            <div class="modal-body" id="here">
       
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
	function editNext(str) {
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
        xmlhttp.open("GET","editnextofkin?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php }?>   
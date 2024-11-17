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
            <button class="btn btn-sm btn-primary" onclick="window.location='addPerson'">Add</button>
            <button class="btn btn-sm btn-info" onClick="window.print()">Print</button>
           
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Registered Members</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
    		<table class="table table-bordered table-hover table-striped tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/NO<i class="fa fa-sort"></i></th>
                        <th>RegNumber<i class="fa fa-sort"></i></th>
                        <th>Id Number<i class="fa fa-sort"></i></th>
                        <th>Names<i class="fa fa-sort"></i></th>
                        <th>Phone<i class="fa fa-sort"></i></th>
                        <th>Email<i class="fa fa-sort"></i></th>
                        <th>Date<i class="fa fa-sort"></i></th>
                        <th>Action<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $member= Persons::registeredMembers();
                $index= 1;
                foreach ($member as $key => $value) { ?>
                    <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo $value['reg']?>/<?php echo $value['id']?></td>
                        <td><?php echo $value['nid']?></td>
                        <td><?php echo ucfirst($value['fname']).' '.ucfirst($value['sname']).' '.ucfirst($value['lname'])?>  </td>
                        <td><?php echo $value['phone']?></td>
                        <td><?php echo strtolower($value['email'])?></td>
                        <td><?php echo $value['date']?></td>
                        <td>
                            <a href="member-info.htm?id=<?php echo $value['id']?>&user=<?php echo $value['user_id']?>" class="btn btn-sm btn-info">View</a>
                            <button onClick="delMember()" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                            <a href="editmember?id=<?php echo $value['id']?>&user=<?php echo $value['user_id']?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>    
                        </td>
                    </tr>
                    <script>
                        function delMember(){
                            var brian = confirm("Delete <?php echo ucfirst($value['fname'])?>?");

                            if(brian == true){
                                window.location="deletemember?id=<?php echo $value['id']?>&user=<?php echo $value['user_id']?>";
                            }else{
                                window.location="registered~persons";
                            }

                        }
                    </script>
                <?php $index++; }?>
                </tbody>
            </table>
            </div>
         </div>
     </div>
    </div>
    </div>
</div>

    	
<?php }?>   
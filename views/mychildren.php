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
          <button onClick="window.print()" class="btn btn-sm btn-info">Print</button>
          <button onClick="window.location='addmychildren'" class="btn btn-sm btn-info">Add Children</button>
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><center>My Children</center></h3>
              </div>
              <div class="panel-body">
              
                    Children Information
                    <table class="table">
                      <tr>
                        <th>S/N<u>o</u></th>
                        <th>Name</th>
                        <th>Birth Certificate</th>
                        <th>Action</th>
                      </tr>
                      <?php
                      $index=1;
                      $child= Persons::watotoWangu();
                      foreach ($child as $key => $value) {
                      ?>
                      <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo ucfirst($value['child'])?></td>
                        <td><?php echo ucfirst($value['bno'])?></td>
                        <td>
                          <a class="btn btn-sm btn-success" href="editmychild?id=<?php echo $value['id']?>">Edit</a>
                          <a class="btn btn-sm btn-danger" href="deletemychildren?id=<?php echo $value['id']?>">Del</a>
                        </td>
                      </tr>
                      <?php $index++; }?>
                    </table>
                    </div>
            </div>
    	</div>
    </div>
<?php }?>
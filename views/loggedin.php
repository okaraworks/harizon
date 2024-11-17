<?php 
include 'views/header.php';
if(!Session::checkSession()){
    echo '<script>window.location="login"</script>';
}else{  
?>
<div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
        <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> Active Users</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th># <i class="fa fa-sort"></i></th>
                        <th>Username<i class="fa fa-sort"></i></th>
                        <th>Email <i class="fa fa-sort"></i></th>
                        <th>Phone <i class="fa fa-sort"></i></th>
                        <th>Type<i class="fa fa-sort"></i></th>
                        <th>LastActivity<i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                      $users = Users::getLoggedUsers();
                      $index= 1;
                      foreach ($users as $key => $value) {?>
                      <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo $value['username']?></td>
                        <td><?php echo $value['email']?></td>
                        <td><?php echo $value['phone']?></td>
                        <td><?php echo $value['type']?></td>
                        <td><?php echo $value['last_activity']?></td>
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
</div>

    	
<?php }?>
<?php
include 'views/header.php';
if(!Session::checkSession()){
    echo '<script>window.location="login"</script>';
}else{
?>
<button input value='Print' type='button' onclick='handlePrint()' />Print</button>
      <script type="text/javascript">
         const handlePrint = () => {
            var actContents = document.body.innerHTML;
            document.body.innerHTML = actContents;
            window.print();
         }
      </script>
<div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
    		<div class="col-lg-12">
            <button class="btn btn-sm btn-primary" onclick="window.location='add-users'">Add</button>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-users"></i> Registered Users</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
    		<table class="table table-bordered table-hover table-striped tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#<i class="fa fa-sort"></i></th>
                        <th>Username<i class="fa fa-sort"></i></th>
                        <th>Email<i class="fa fa-sort"></i></th>
                        <th>Phone<i class="fa fa-sort"></i></th>
                        <th>Type<i class="fa fa-sort"></i></th>
                        <th>Action<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $users = Users::registeredUsers();
                $index= 1;
                foreach ($users as $key => $value) {
                # code...
                echo '
                <tr>
                    <td>'.$index.'</td>
                    <td>'.$value['username'].'</td>
                    <td>'.$value['email'].'</td>
                    <td>'.$value['phone'].'</td>
                    <td>'.$value['type'].'</td>
                    <td><a class="btn btn-danger" href="delete_user?id='.$value['id'].'">Del</a>
                    <a class="btn btn-primary" href="edit_user?id='.$value['id'].'">Edit</a>
                    <a class="btn btn-warning" href="reset_password?id='.$value['id'].'">Reset Password</a>
                    </td>
                </tr>
                 ';
                 $index++;
                }
                ?>
                </tbody>
            </table>
            </div>
         </div>
     </div>
    </div>
    </div>
</div>


<?php }?>

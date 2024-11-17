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
                        <th>Category<i class="fa fa-sort"></i></th>
                        <th>Image<i class="fa fa-sort"></i></th>
                        <th>Action<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $image= Website::viewPics();
                $index= 1;
                foreach ($image as $key => $value) {
                # code...
                echo '
                <tr>
                    <td>'.$index.'</td>
                    <td>'.$value['category'].'</td>
                    <td><img src="public/views/'.$value['photo'].'"></td>
                    <td><a class="btn btn-danger" href="delete_image?id='.$value['id'].'">Del</a>
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
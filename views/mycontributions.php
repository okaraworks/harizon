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
            <!-- <button class="btn btn-sm btn-primary" onclick="window.location='addPerson'">Add</button> -->
            <button class="btn btn-sm btn-info" onClick="window.print()">Print</button>
           
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Monthly Contributions</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
    		<table class="table table-bordered table-hover table-striped tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/NO<i class="fa fa-sort"></i></th>
                        <th>Date<i class="fa fa-sort"></i></th>
                        <th>Amount<i class="fa fa-sort"></i></th>
                        <th>Status<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $contribution= Contributions::myContributions();
                $index= 1;
                foreach ($contribution as $key => $value) {
                    if($value['status'] ==0){
                        $status= "<span class='alert-danger'>Pending</span>";
                    }else{
                        $status= "<span class='alert-success'>Validated</span>";
                    }
                     ?>
                    <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo $value['date']?></td>
                        <td>Ksh.<?php echo number_format($value['amount'],2)?></td>
                        <td><?php echo $status?></td>
                       
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

    	
<?php }?>   
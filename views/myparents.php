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
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><center>Kilimani Cooperative Society Parents Registration Details</center></h3>
              </div>
              <div class="panel-body">

                <?php
                    $parent= Parents::myParents();
                    foreach ($parent as $key => $value) {
                ?>
                <div class="table-responsive">
                      <table class="table table-compressed">
                        <center><h4>Husband's Father</h4></center>
                        <tr>
                          <th>Names</th>
                          <th>Id Number</th>
                          <th>Status</th>
                          <th>Phone</th>
                        </tr>

                        <tr>
                          <td><?php echo ucfirst($value['hfather'])?></td>
                          <td><?php echo $value['hfnid']?></td>
                          <td><?php echo $value['hfstatus']?></td>
                          <td><?php echo $value['hphone']?></td>
                        </tr>

                      </table>

                      <table class="table table-compressed">
                        <center><h4>Husband's Mother</h4></center>
                        <tr>
                          <th>Names</th>
                          <th>Id Number</th>
                          <th>Status</th>
                          <th>Phone</th>
                        </tr>

                        <tr>
                          <td><?php echo ucfirst($value['hmother'])?></td>
                          <td><?php echo $value['hmnid']?></td>
                          <td><?php echo $value['hmstatus']?></td>
                          <td><?php echo $value['hphone']?></td>
                        </tr>

                      </table>

                      <table class="table table-compressed">
                        <center><h4>Spouse Father</h4></center>
                        <tr>
                          <th>Names</th>
                          <th>Id Number</th>
                          <th>Status</th>
                          <th>Phone</th>
                        </tr>

                        <tr>
                          <td><?php echo ucfirst($value['sfather'])?></td>
                          <td><?php echo $value['sfnid']?></td>
                          <td><?php echo $value['sfstatus']?></td>
                          <td><?php echo $value['sphone']?></td>
                        </tr>

                      </table>

                      <table class="table table-compressed">
                        <center><h4>Spouse Mother</h4></center>
                        <tr>
                          <th>Names</th>
                          <th>Id Number</th>
                          <th>Status</th>
                          <th>Phone</th>
                        </tr>

                        <tr>
                          <td><?php echo ucfirst($value['smother'])?></td>
                          <td><?php echo $value['smnid']?></td>
                          <td><?php echo $value['smstatus']?></td>
                          <td><?php echo $value['sphone']?></td>
                        </tr>

                      </table>
                    <?php }?>

                    </div>
            </div>
    	</div>
    </div>
<?php }?>

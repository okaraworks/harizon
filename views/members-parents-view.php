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
          <button onClick="window.location='members-parents'" class="btn btn-sm btn-info">Back</button>
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><center>Kilimani Cooperative Society Registration Details</center></h3>
              </div>
              <div class="panel-body">
                Personal Information
                <?php
                    $member= Persons::memberInfo();
                    foreach ($member as $key => $value) {
                ?>
                <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th>Registration Number</th>
                          <th>Id Number</th>
                          <th>Names</th>
                        </tr>

                        <tr>
                          <td><?php echo $value['reg']?>/<?php echo $value['id']?></td>
                          <td><?php echo $value['nid']?></td>
                          <td><?php echo ucfirst($value['fname']).' '.ucfirst($value['sname']).' '.ucfirst($value['lname'])?>  </td>
                        </tr>

                      </table>

                    <?php }?>

                        Parent Details
                    <?php
                    $parent= Parents::getParent();
                    foreach ($parent as $key => $value) {
                ?>

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

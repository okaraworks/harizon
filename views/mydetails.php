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
                <h3 class="panel-title"><center>Kilimini Cooperative Society Registration Details</center></h3>
              </div>
              <div class="panel-body">
                Personal Information
                <?php
                    $member= Persons::myData();
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

                        <tr>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Date of Birth</th>
                        </tr>

                        <tr>
                          <td><?php echo $value['phone']?></td>
                          <td><?php echo strtolower($value['email'])?></td>
                          <td><?php echo $value['dob']?></td>
                        </tr>



                        <tr>
                          <th>Gender</th>
                          <th>Date Registered</th>
                        </tr>
                        <tr>
                          <td><?php echo $value['gender']?></td>
                          <td><?php echo $value['date']?></td>
                        </tr>


                      </table>

                    <?php }?>

                    </div>
            </div>
    	</div>
    </div>
<?php }?>

<?php
include 'views/header.php';
if(!Session::checkSession()){
  echo '<script>window.location="login"</script>';
}else{
?>
<body>

    <div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
    		<div class="col-lg-12">
        <?php
        global $userID;
        if(Users::isAdmin($userID)){
        ?>
          <?php include 'views/counter.php'?>

          <div class="row">
			   <div class="col-lg-12">


      <h4>Active Users</h4>
            <div class="panel panel-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                    <!-- <?php include 'views/footer.php';?> -->
                </div>
              </div>
            </div>
          </div>
    	</div>
    	</div>

      <?php }else{?>
<div class="row">

        <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">

                  <div class="col-MD-12">
                    <p class="announcement-heading">
                      <?php
                        $amount= Contributions::totalContribution();
                        foreach ($amount as $key => $value) {
                          # code...
                          echo number_format($value['total'], 2);
                        }
                      ?>
                    </p>
                    <p class="announcement-text">Total Monthly Contributions</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Ksh
                    </div>
                    <!-- <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div> -->
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">

                  <div class="col-MD-12">
                    <p class="announcement-heading">
                      <?php
                        $loanLimit= Loans::loanLimit();
                        foreach ($loanLimit as $key => $value) {
                          # code...
                          $limit= ($value['total'] * 0.3);
                          echo number_format($limit, 2);
                        }
                      ?>
                    </p>
                    <p class="announcement-text">Loan Limit</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Ksh
                    </div>
                    <!-- <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div> -->
                  </div>
                </div>
              </a>
            </div>
          </div>
</div>
          <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><center>Kilimani Cooperative Society Registration Details</center></h3>
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




<script>
	function addSpouse(str) {
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
        xmlhttp.open("GET","add-spouse-details?q="+str,true);
        xmlhttp.send();
    }
}
</script>

     <style>
     .butt {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
     </style>

       <?php }?>
    </div>
    </div>
                      <?php }?>

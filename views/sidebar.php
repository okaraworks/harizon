 <?php Users::updateActive();?>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#3c1212;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard">KILIMANI</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" >
          <ul class="nav navbar-nav side-nav" style="background-color: #3c1212;">
            <li class="active" ><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
           <?php
           global $userID;
           $type=Users::userGet($userID);
           foreach ($type as $key => $value) {
             # code...
            //  print_r($type);
            if($value['type']=="admin"){
           ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Memberships<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="addPerson">Add Members</a></li>
                <li><a href="registered~persons">View Members</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Monthly Contributions<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="monthlycontributions-pending">PendingContributions</a></li>
                <li><a href="monthlycontributions-approved">ApprovedContributions</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-money"></i> Loans<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pendingloans">PendingLoans</a></li>
                <li><a href="approvedloans">ApprovedLoans</a></li>
                <li><a href="loanrepayments">LoanRepayments</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Users<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="add-users">Add Users</a></li>
                <li><a href="users">View Users</a></li>
              </ul>
            </li>
            <?php } elseif($value['type'] =="user"){?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>Personal Data<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php
                if(!Functions::checkRegistration()){?>
                <li><a href="member-add-personalinfo">Register</a></li>
                <?php }else{?>
                  <li><a href="member-edit-info">Edit</a></li>
                  <?php }?>
                <li><a href="view-details">View My data</a></li>
                <!-- <li><a href="mychildren">Manage My children</a></li> -->
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-money"></i>Monthly Contributions<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="member-make-contribution">MakePayment</a></li>
                <li><a href="my-contributions">View-History</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-money"></i>Loans<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="member-loan-application">Apply</a></li>
                <li><a href="my-loans">ViewLoans</a></li>
                <li><a href="member-loanhistory">LoanPaymentHistory</a></li>
                <!-- <li><a href="mychildren">Manage My children</a></li> -->
              </ul>
            </li>




           <?php }else{?>
           NO MENU AVAILABLE
           <?php }?>
           <?php }?>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
            <?php
            $user=Users::userGet();
            foreach ($user as $key => $value) {
              # code...

            ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ucfirst($value['username']);?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <!-- <li><a href="#"><i class="fa fa-user"></i> Profile</a></li> -->
                <!-- <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li> -->
                <li><a href="changepass"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="logout"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            <?php }?>
            </li>


          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

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
                    <h3 class="panel-title">Approved Loan Requests</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
    		<table class="table table-bordered table-hover table-striped tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/NO<i class="fa fa-sort"></i></th>
                        <th>RegNo<i class="fa fa-sort"></i></th>
                        <th>Borrowed By <i class="fa fa-sort"></i></th>
                        <th>Principal<i class="fa fa-sort"></i></th>
                        <th>Period<i class="fa fa-sort"></i></th>
                        <th>Monthly Installments<i class="fa fa-sort"></i></th>
                        <th>TotalIntrest<i class="fa fa-sort"></i></th>
                        <th>TotalPayable<i class="fa fa-sort"></i></th>
                        <th>Paid<i class="fa fa-sort"></i></th>
                        <th>Balance<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $loan= Loans:: approvedLoans();
                $index= 1;
                foreach ($loan as $key => $value) {
                   
                     ?>
                    <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo  $value['reg']?>/<?php echo $value['id']?></td>
                        <td><?php echo  $value['fname']?> <?php echo $value['lname']?></td>
                        <td>Ksh.<?php echo number_format($value['principal'],2)?></td>
                        <td>Ksh.<?php echo $value['years']?></td>
                        <td>Ksh.<?php echo number_format($value['payment'],2)?></td>
                        <td>Ksh.<?php echo number_format($value['totalinterest'],2)?></td>
                        <td>Ksh.<?php echo number_format($value['total'],2)?></td>
                        <td>Ksh.<?php echo number_format($value['paid'],2)?></td>
                        <td>Ksh.<?php echo number_format($value['balance'],2)?></td>
                       
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
<div class="modal fade"  id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Loan Repayment</h4>
            </div>
            <?php echo Loans::lipaaLoan()?>
            <div class="modal-body" id="here">
       
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
	function repayLoan(str) {
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
        xmlhttp.open("GET","member-repay-loan?q="+str,true);
        xmlhttp.send();
    }
}
</script>
    	
<?php }?>   
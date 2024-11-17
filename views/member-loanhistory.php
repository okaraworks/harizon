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
                    <h3 class="panel-title">My Loan Repayments History</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Principal</th>
            <th>Balance</th>
            <th>AmountPaid</th>
            <th>TotalPaid</th>
            <th>DateTaken</th>
            <th>DatePaid</th>
        </tr> 
        <?php
        $index=1;
        $loni=Loans::myHistory();
        foreach ($loni as $key => $value) {
            $date= date_create($value['dt']);
           $tarehe= date_format($date, "M/d/y");

           $datep= date_create($value['date']);
           $tade= date_format($datep, "M/d/y");
            

        
        ?>
        <tr>
            <td><?php echo $index ?></td>
            <td>Ksh<?php echo number_format($value['principal'],2) ?></td>
            <td>Ksh<?php echo number_format($value['balance'],2) ?></td>
            <td>Ksh<?php echo number_format($value['amount'],2) ?></td>
            <td>Ksh<?php echo number_format($value['paid'],2) ?></td>
            <td><?php echo $tarehe?></td>
            <td><?php echo $tade?></td>
        </tr>
        <?php $index ++; }?>
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
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
            <!-- <div class="col-lg-12"> -->
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Loan Application </h3>
              </div>
              
              <div class="panel-body">
            <?php echo Loans::loanRequest() ?>
            <form  method="post" name="loandata">
            <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>PrincipalAmount</th>
                    <th>Rate</th>
                    <th>RepaymentPeriod(Years)</th>
                </tr>

                <tr>
                  
                    <td>
                        <div class="form-group" >
                        <!-- <span>Amount to Request</span> -->
                        <?php
                        $loanLimit= Loans::loanLimit();
                        foreach ($loanLimit as $key => $value) {
                            $limit= ($value['total'] * 0.3);
                        ?>
                            <input type="number" name="principal" placeholder="Principal Amount" max="<?php echo $limit?>" onchange="getCalc()" class="form-control" required/ >
                        <?php }?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group" >
                            <input type="text" name="interest" placeholder="Principal Amount"onchange="getCalc();"
                            value="<?php echo $rate=3;?>" class="form-control" readonly >
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" name="years" placeholder="Repayment Period(years)" onchange="getCalc();" class="form-control" required>
                        </div>
                    </td>

                </tr>

                <tr>
                    <th>MonthlyInstallments</th>
                    <th>Intrest</th>
                    <th>TotalPayable</th>
                </tr>

                <tr>
                    <td>
                        <div class="form-group"   >
                            <input type="text" name="payment" placeholder="Monthly Installments" onchange="getCalc();" class="form-control" readonly required >
                        </div>
                    </td>

                    <td>
                        <div class="form-group"   >
                        <input type="text" name="totalinterest" size="12" class="form-control" placeholder="Intrest" readonly required>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="text" name="total" placeholder="Principal Amount" onchange="getCalc();" class="form-control" readonly required>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
                   
                    <button class="btn btn-primary" type="submit" name="request">Request</button>

                </form>
            </div>
    		
    	    </div>
    	</div>
    </div>
   
    <script>
        function getCalc() {
            // Get the user's input from the form. Assume it is all valid.
            // Convert interest from a percentage to a decimal, and convert from
            // an annual rate to a monthly rate. Convert payment period in years
            // to the number of monthly payments.
            var principal = document.loandata.principal.value;
            var interest = document.loandata.interest.value / 100 / 12;
            var payments = document.loandata.years.value * 12;

            // Now compute the monthly payment figure, using esoteric math.
            var x = Math.pow(1 + interest, payments);
            var monthly = (principal*x*interest)/(x-1);

            // Check that the result is a finite number. If so, display the results.
            if (!isNaN(monthly) && 
                (monthly != Number.POSITIVE_INFINITY) &&
                (monthly != Number.NEGATIVE_INFINITY)) {

                document.loandata.payment.value = round(monthly);
                document.loandata.total.value = round(monthly * payments);
                document.loandata.totalinterest.value = 
                    round((monthly * payments) - principal);
            }
            // Otherwise, the user's input was probably invalid, so don't
            // display anything.
            else {
                document.loandata.payment.value = "";
                document.loandata.total.value = "";
                document.loandata.totalinterest.value = "";
            }
        }

        // This simple method rounds a number to two decimal places.
        function round(x) {
        return Math.round(x*100)/100;
        }
    </script>
<?php }?>
<form method="post">
<?php 
$loan= Loans::thisLoan();
foreach ($loan as $key => $value) {
?>
    <input type="text" name="loan_id" value="<?php echo $value['id']?>">
    <div class="form-group">
    <label>Amount</label>
        <input type="text" class="form-control" name="amount" value="<?php echo $value['balance']?>">
    </div>
<?php }?>
<button type="submit" name="lipaa"  class="btn btn-sm btn-primary">Pay</button>
</form>
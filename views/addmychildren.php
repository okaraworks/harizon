<?php 
global $userID;
include 'views/header.php';
if(!Session::checkSession()){
    echo '<script>window.location="login"</script>';
}else{  
?>
<div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
            <div class="col-lg-12">
               
        <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title"> Adding children</h3>
              </div>
              
              <div class="panel-body">
                <div class="table-responsive" id="">
                    <?php echo Persons::regMyChildren();?>
                <form method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $userID; ?>">  
                        <div class="table-responsive">                  
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Child Name</th>
                            <th>Birth Cert No</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>8</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>9</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>10</td>
                            <td><input type="text" name="cname[]" class="form-control"></td>
                            <td><input type="text" name="bno[]" class="form-control"></td>
                        </tr>
                    </table>
                        </div>

                    

                    
                    
                    <div class="form-group input-group">
                        <button name="children" class="btn btn-primary" type="submit">Submit <i class="fa fa-arrow-circle-right"></i> </button>
                    </div>

            </form>
                
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
    	</div>
    	</div>

</div>

    	
<?php }?>

                        
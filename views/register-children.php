<?php 
if(!Persons::thisParent()){
    echo '<div class="alert alert-info">No record Found</div>';
}else{
?>
    <form method="POST">
        <?php
        $parent= Persons::thisParent();
        foreach ($parent as $key => $value) {
        ?>
        <div class="alert alert-info">Adding Children To <?php echo $value['fname']?> <?php echo $value['lname']?></div>
                        <input type="hidden" name="user_id" value="<?php echo $value['user_id'] ?>">  
                     
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
            <?php }?>
            <?php }?>
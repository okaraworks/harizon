<?php 
include 'views/header.php';
if(!Session::checkSession()){
    echo '<script>window.location="login"</script>';
}else{  
?>
<div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
        <div class="row">
   
        <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Please Fill in the form Correctly before submitting</div>
        <?php Parents::addParent();?>
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Parent Info</div>
                    <form class="horizontal-form" method="post">
                    <?php include 'views/errors.php'?>
                        <div class="form-group">
                            <label>Add Parents To:</label>
                            <select name="user_id" class="form-control" required>
                                <option>Select Person</option>
                                <?php
                                $item= Persons::registeredMembers();
                                foreach ($item as $key => $value) {
                                    # code...
                                    echo '<option value="'.$value['user_id'].'" >'.$value['nid'].' '.ucfirst($value['fname']).' '.ucfirst($value['sname']).' '.ucfirst($value['lname']).'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                        <div class="panel panel-success">
                        <div class="panel-heading">Husband Parents</div>
                            <div class="panel-body">
                                <div class="form-group">
                                <label>Father's Details</label>
                                    <input type="text" name="hfather" placeholder="Full Names" class="form-control">
                                    <input type="number" name="hfnid" placeholder="National Id" >
                                    <input type="radio" name="hfstatus" value="Alive">Alive
                                    <input type="radio" name="hfstatus" value="Deceased">Deceased
                                </div>
                                <hr>
                                <div class="form-group">
                                <label>Mother's Details</label>
                                    <input type="text" name="hmother" placeholder="Full Names" class="form-control">
                                    <input type="number" name="hmnid" placeholder="National Id">
                                    <input type="radio" name="hmstatus" value="Alive">Alive
                                    <input type="radio" name="hmstatus" value="Deceased">Deceased
                                </div>
                                <hr>
                                 <div class="form-group">
                                <label>Phone Number(For any of the above or both)</label>
                                    <input type="text" name="hphone" placeholder="Mobile Number" class="form-control">
                                </div>

                                
                            </div>
                        </div>
                       
                        </div>
                        <div class="col-md-6">
                        <div class="panel panel-info">
                        <div class="panel-heading">Spouse Parents</div>
                            <div class="panel-body">
                            <div class="form-group">
                                <label>Father's Details</label>
                                    <input type="text" name="sfather" placeholder="Full Names" class="form-control">
                                    <input type="number" name="sfnid" placeholder="National Id">
                                    <input type="radio" name="sfstatus" value="Alive">Alive
                                    <input type="radio" name="sfstatus" value="Deceased">Deceased
                                </div>
                                <hr>
                                <div class="form-group">
                                <label>Mother's Details</label>
                                    <input type="text" name="smother" placeholder="Full Names" class="form-control">
                                    <input type="number" name="smnid" placeholder="National Id">
                                    <input type="radio" name="smstatus" value="Alive">Alive
                                    <input type="radio" name="smstatus" value="Deceased">Deceased
                                </div>
                                <hr>
                                 <div class="form-group">
                                <label>Phone Number(For any of the above or both)</label>
                                    <input type="text" name="sphone" placeholder="Mobile Number" class="form-control">
                                </div>
                            </div>
                        </div>
                        </div>
                        <button class="btn btn-success" name="regparents">Submit</button>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    	
    </div>
<?php }?>
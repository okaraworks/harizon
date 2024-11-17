<?php echo Persons::updateSpouse()?>
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Please if you are not married you can ignore this
</div>
                <form  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Spouse National Id</label>
                    <input type="number" name="snid" placeholder="National Id" class="form-control" required="" >
                </div>

           

                          <div class="form-group input-group">
                            <div class="input-group-addon">
                            <input list="codes" name="code" id="code" placeholder="+254">
                                    <datalist id="codes">
                                        <option class="select-option" value="+254" class="select-option">
                                        <option class="select-option" value="+1" class="select-option">
                                        <option class="select-option" value="+256" class="select-option">
                                        <option class="select-option" value="+255" class="select-option">
                                        <option class="select-option" value="+44" class="select-option">
                                    </datalist>
                            </div>
                            <input type="number" name="sphone" placeholder="700000000" class="form-control" required="">
                         </div>
                    <button class="btn btn-primary" type="submit" name="adding">Submit</button>
                </form>
           
<div class="panel panel-success" >
    <div class="panel-heading">Relogin</div>
    <center>
    <div class="panel-body">
    <div class="lockscreen-image">
    <i class="fa fa-user fa-5x"></i>
    <?php
            $user=Users::userGet();
            foreach ($user as $key => $value) {?>
             <strong><?php echo ucfirst($value['username'])?></strong>
            
    </div>
    <form method="post">
    <input placeholder="username" id="username" name="username" type="hidden" required="" class="form-control" value="<?php echo $value['username']?>">
    <div class="input-group">
    <input placeholder="Password" id="password" name="password" type="password" class="form-control" required="">

        <div class="input-group-append">
          <button type="button" id="relog" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i></button>
        </div>
      </div>
    </form>
    <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="logout">Or sign in as a different user</a>
  </div>
    </div>
    </center>
</div>
            <?php }?>
            <script src="public/js/jquery.min.js"></script>     
            <script>
    $(document).ready(function(){
        
        $("#relog").click(function(e){
            e.preventDefault();
            var user= $("#username").val();
            var pass= $("#password").val();
            $.post('auth/login',
                {username:user,password:pass},
                function(data){
                    alert(data);
                    if(data==="success"){
                        window.location="dashboard";
                    }else{
                        alert("Wrong Information");
                    }
                });
                // alert("test");
        });
    });

</script>
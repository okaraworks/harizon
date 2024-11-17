
<?php   
    include 'views/header.php';
    echo '<body style="padding:10%">';
    if(!Session::checkSession()){
?>
<script src="public/js/jquery.min.js"></script>


<div class="col-lg-5">

<h4>Login</h4>
<center>
<form action="#" method="post">
    <!-- <div class="form-group">
        <input class="form-control">
    </div> -->
    <div class="form-group">
        <input placeholder="username" id="username" name="username" type="text" required="" class="form-control" autofocus>
    </div>

    <div class="form-group"> 
        <input placeholder="Password" id="password" name="password" type="password" class="form-control" required="">
    </div>     
        <button id="log" name="logUser" class="btn btn-primary">Login</button>
        <!-- Dont have an account? <a href="create-account">Create Account</a> -->
    </div>
</form>
</div>

</center>
<?php
} else{
    include 'views/lockscreen.php';
} ?>

<script>
    $(document).ready(function(){
        
        $("#log").click(function(e){
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
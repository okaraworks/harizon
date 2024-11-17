<?php include 'views/header.php'?>
<script src="/public/js/jquery.min.js"></script>



<body>


<h3>Create Account</h3>
<div class="col-lg-5 col-md-8 px-lg-3 px-0">
<?php Users::signUser()?>
<form action="" method="post" enctype="multipart/form-data">
                      <?php include('errors.php')?>
    

      <div class="form-group">        
          <input type="text" name="username" placeholder="username"  required="" class="form-control">
      </div>
     
      <div class="form-group">        
          <input type="email" name="email" placeholder="Email" class="form-control" required="">
      </div>

      <div class="form-group">        
          <input type="text" name="phone" placeholder="Mobie Number" class="form-control">
      </div>

      <div class="form-group">        
          <input type="password" name="password_1" placeholder="Password" class="form-control">
      </div>

      <div class="form-group">        
          <input type="password" name="password_2" placeholder="Retype Pssword" class="form-control">
      </div>

      
      
     
      <div class="form-group">
          <button class="btn btn-primary" type="submit" name="signup">Create Account</button>
      </div>
              
                          
                  
                      </div>
                  </form>
                  <span>Already Have Account?<a href="login">Login</a></span>
</div>

</center>
</body>


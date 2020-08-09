<div class="box">
    
  <div class="box-header">
      
      <center>
          
          <h1> Login </h1>
          
      </center>
      
  </div>
   
  <form method="post" action="checkout.php">
      
      <div class="form-group">
          
          <label> Email </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div>
      
       <div class="form-group">
          
          <label> Password </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div>
      
      <div class="text-center">
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> Login
              
          </button>
          
      </div>     
      
  </form>
   
  <center>
      
     <a href="customer_register.php">
         
         <h4> You don't have an account? Register here </h4>
         
     </a> 
      
  </center>
    
</div>


<?php 

if(isset($_POST['login'])){
    
    $email = $_POST['c_email'];
    
    $pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$email' AND customer_pass='$pass'";
    
    $run_customer = mysqli_query($con,$select_customer);

    $check_customer = mysqli_num_rows($run_customer);
    
    $select_admin= "select * from admins where admin_email='$email' AND admin_pass='$pass'";
    
    $run_admin= mysqli_query($con,$select_admin);

    $check_admin= mysqli_num_rows($run_admin);
                
    if(($check_customer==0)&&($check_admin==0)){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    }    
    if($check_customer==1){
        
        $_SESSION['customer_email']=$email;
        
        echo "<script>alert('You are Logged in')</script>"; 
        
        echo "<script>window.open('index.php','_self')</script>";

    }elseif($check_admin==1){
        
        $_SESSION['admin_email']=$email;
        
        echo "<script>alert('You are Logged in')</script>"; 
        
        echo "<script>window.open('admin_area/index.php','_self')</script>";
    }
}

?>


   <?php 
    
      $session_email = $_SESSION['customer_email'];
    
      $select_customer = "select * from customers where customer_email='$session_email'";
      
      $run_customer = mysqli_query($con,$select_customer);
      
      $row_customer = mysqli_fetch_array($run_customer);
      
      $customer_id = $row_customer['customer_id'];

      echo "<script>window.open('order.php?c_id=$customer_id','_self')</script>";

   ?>
    
                 

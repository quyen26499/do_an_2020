<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['confirm_order'])){

        $complete= "Complete";
        
        $confirm_id = $_GET['confirm_order'];

        $get_pro = "select * from products";
                                
        $run_pro = mysqli_query($con,$get_pro);
          
        while($row_pro=mysqli_fetch_array($run_pro)){
                                    
            $pro_id = $row_pro['product_id'];

            $pro_qty = $row_pro['product_quantity'];

                $get_pen = "select * from pending_orders where product_id = '$pro_id' AND order_id='$confirm_id'";
                                        
                $run_pen = mysqli_query($con,$get_pen);

                while($row_pen=mysqli_fetch_array($run_pen)){
                    
                    $pen_id = $row_pen['product_id'];  

                    $pen_qty = $row_pen['qty'];  
            
                    $quantity = ($pro_qty-$pen_qty);    
            
                    $update_product = "update products set product_quantity = '$quantity' where product_id ='$pro_id'";
                                        
                    $run_update_product = mysqli_query($con,$update_product);  
                }

                $get_sold = "select sum(qty),product_id from pending_orders where product_id = '$pro_id'";
                                            
                $run_sold = mysqli_query($con,$get_sold);

                while($row_sold=mysqli_fetch_array($run_sold)){

                    $product_id = $row_sold['product_id'];

                    $qty = $row_sold['sum(qty)'];
                                                        
                    $count = ($qty);

                    $update_product = "update products set product_sold='$count' where product_id = '$product_id' ";
            
                    $run_product = mysqli_query($con,$update_product);
                                    
                }   

        }        

        $confirm_customer_order = "update customer_orders set order_status='$complete' where order_id='$confirm_id'";
                            
        $run_customer_order = mysqli_query($con,$confirm_customer_order);
                            
        $confirm_pending_order = "update pending_orders set order_status='$complete' where order_id='$confirm_id'";
                            
        $run_pending_order = mysqli_query($con,$confirm_pending_order);
        
        if($run_pending_order){
            
            echo "<script>alert('One of your costumer order has been confirm')</script>";
            
            echo "<script>window.open('index.php?view_order','_self')</script>";
            
        }
        
    }

?>

<?php }?>
<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  Orders
                
               </h3> 
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Customer Email </th>
                                <th> Name </th>
                                <th> Contact </th>
                                <th> Address </th>
                                <th> Invoice No </th>
                                <th colspan="2" > Product </th>
                                <th> Amount </th>
                                <th> Mode </th>
                                <th> Order Date </th>
                                <th> Status </th>
                                <th> Confirm </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from pending_orders";
                                
                                $run_orders = mysqli_query($con,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_id = $row_order['product_id'];
                                    
                                    $qty = $row_order['qty'];

                                    $order_status = $row_order['order_status'];

                                    $order_date = $row_order['order_date'];
                                    
                                    $order_amount = $row_order['due_amount'];

                                    $order_name = $row_order['name'];

                                    $order_phone = $row_order['phone'];

                                    $order_address = $row_order['address'];

                                    $order_mode = $row_order['mode'];

                                    $get_products = "select * from products where product_id='$product_id'";
                                    
                                    $run_products = mysqli_query($con,$get_products);
                                    
                                    $row_products = mysqli_fetch_array($run_products);
                                    
                                    $product_title = $row_products['product_title'];

                                    $product_img1 = $row_products['product_img1'];

                                    $get_customer = "select * from customers where customer_id='$c_id'";

                                    $run_customer = mysqli_query($con,$get_customer);

                                    $row_customer=mysqli_fetch_array($run_customer);
                                        
                                    $customer_email = $row_customer['customer_email'];

                                    // $customer_address = $row_customer['customer_address'];
                                        
                                    // $customer_contact = $row_customer['customer_contact'];

                                    
                                    // $get_customer = "select * from customer_payment where invoice_no='$invoice_no'";

                                    // $run_customer = mysqli_query($con,$get_customer);

                                    // $row_customer=mysqli_fetch_array($run_customer);
                                        
                                    // $customer_email = $row_customer['email'];

                                    // $customer_address = $row_customer['address'];
                                        
                                    // $customer_contact = $row_customer['contact'];

                                    // $customer_mode = $row_customer['mode'];
                                    
                                        
                                    // $get_c_order = "select * from customer_orders where order_id='$order_id'";
                                    
                                    // $run_c_order = mysqli_query($con,$get_c_order);
                                    
                                    // $row_c_order = mysqli_fetch_array($run_c_order);
                                    
                                    // $order_date = $row_c_order['order_date'];
                                    
                                    // $order_amount = $row_c_order['due_amount'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $order_name; ?> </td>
                                <td> <?php echo $order_phone; ?> </td>
                                <td> <?php echo $order_address; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <img  src="../admin_area/product_images/<?php echo $product_img1; ?>" style="width: 30px; height:30px;" ></td>
                                <td> <?php echo $product_title; ?> x <?php echo $qty; ?> </td>                             
                                <td> $ <?php echo $order_amount+((5*$order_amount)/100); ?> </td>
                                <td> <?php echo $order_mode; ?> </td>
                                <td> <?php echo $order_date; ?></td>
                                <td>
                                    
                                    <?php 

                                    echo $order_status;
                                    
                                        if ($order_status=='waiting') {

                                            $order_status=='waiting';

                                        } 
                                        else {

                                            $order_status=='Complete';

                                        }
                                    
                                    ?>
                                    
                                </td>
                                <td> 
                                     
                                    <a href="index.php?confirm_order=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-check"></i> Confirm
                                    
                                    </a>

                                </td>
                                <!-- <td>

                                    <a href="index.php?cancel_order=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-times"></i>
                                    
                                    </a>  
                                     
                                </td> -->

                                <td> 
                                     
                                     <a href="index.php?delete_order=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>

                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php } ?>
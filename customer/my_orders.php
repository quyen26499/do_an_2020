<center>
    
    <h1> My Orders </h1>
    
    <p class="lead"> Your orders on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
        
    </p>
    
</center>


<hr>


<div class="table-responsive">
    
    <table class="table table-bordered table-hover">
        
        <thead>
            
            <tr>
                
                <th> ON </th>
                <th> Invoice No </th>
                <th colspan=2> Product </th>
                <th> Total </th>
                <th> Order Date</th>
                <th> Status </th>
                <th> Confirm </th>
                
            </tr>
            
        </thead>
        
        <tbody>
           
           <?php 

            $i = 0;
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];

            $customer_email = $row_customer['customer_email'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
                                           
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];

                $product_id = $row_orders['product_id'];

                $get_order = "select * from products where product_id='$product_id'";
            
                $run_order = mysqli_query($con,$get_order);

                while($row_order = mysqli_fetch_array($run_order)){

                    $product_img1 = $row_order['product_img1'];
                
                    $product_title = $row_order['product_title'];
                
                $i++;
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unconfirmed';
                    
                }else if($order_status=='waiting'){
                    
                    $order_status = 'Waiting';
                    
                }
                else{
                    
                    $order_status = 'Complete';
                    
                }
            
            ?>
            
            <tr>
                
                <th> <?php echo $i; ?> </th>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <img  src="../admin_area/product_images/<?php echo $product_img1; ?>" style="width: 30px; height:30px;" ></td>
                <td> <?php echo $product_title; ?> x <?php echo $qty; ?> </td>
                <td> $<?php echo $due_amount + (($due_amount*10)/100); ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
                <td>
                    
                    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm </a>
                    
                </td>
                
            </tr>
            
            <?php } }?>
            
        </tbody>
        
    </table>
    
</div>

            <?php ?>
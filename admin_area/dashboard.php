<?php

    if(!isset($_SESSION['admin_email'])){
                      
            echo "<script>window.open('login.php','_self')</script>";
            
        }else{

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Dashboard </h1>
    </div>
</div>

<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-tasks fa-f5x" style="font-size:42px"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge"> <?php echo $count_products; ?> </div>

                        <div> Products </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_product">
                <div class="panel-footer">
                    
                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-users fa-f5x" style="font-size:42px"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        
                        <div class="huge"> <?php echo $count_customers; ?> </div>

                        <div> Customers </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_customer">
                <div class="panel-footer">
                    
                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-tags fa-f5x" style="font-size:42px"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        
                        <div class="huge"> <?php echo $count_p_categories; ?> </div>

                        <div> Products Categories </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_p_cat">
                <div class="panel-footer">
                    
                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-shopping-cart fa-f5x" style="font-size:42px"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        
                        <div class="huge"> <?php echo $count_pending_orders; ?> </div>

                        <div> Orders </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_order">
                <div class="panel-footer">
                    
                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> New Orders

                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">

                        <thead>
                            <tr>

                                <th> No </th>
                                <th> Customer Email</th>
                                <th> Invoice No </th>
                                <th> Amount </th>
                                <th> Status </th>

                            </tr>

                        </thead> 

                        <tbody>

                        <?php 
                          
                            $i=0;
    
                            $get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
        
                            $run_order = mysqli_query($con,$get_order);
        
                            while($row_order=mysqli_fetch_array($run_order)){
                                
                                $order_id = $row_order['order_id'];
                                
                                $c_id = $row_order['customer_id'];
                                
                                $due_amount = $row_order['due_amount'];
                                
                                $invoice_no = $row_order['invoice_no'];
                                
                                $product_id = $row_order['product_id'];

                                $order_status = $row_order['order_status'];
                                
                                $i++;
                        
                        ?>
                        
                        <tr>
                            
                            <td> <?php echo $i ?> </td>
                            <td>
                                
                                <?php 
                                
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                
                                    $run_customer = mysqli_query($con,$get_customer);
                                
                                    $row_customer = mysqli_fetch_array($run_customer);
                                
                                    $customer_email = $row_customer['customer_email'];
                                
                                    echo $customer_email;
                                
                                ?>
                                
                            </td>
                            <td> <?php echo $invoice_no; ?> </td>
                            <td> <?php echo $due_amount+((5*$due_amount)/100); ?> </td>
                            <td>
                                
                                <?php 
                                
                                    if($order_status=='pending'){
                                        
                                        echo $order_status='Unconfirmed';

                                    }else if($order_status=='waiting'){
                                        
                                        echo $order_status='Waiting';
                                        
                                    }else{
                                        
                                        echo $order_status='Complete';
                                        
                                    }
                                
                                ?>
                                
                            </td>
                            
                        </tr>
                        
                        <?php } ?>

                        </tbody>

                    </table>
                </div>

                <div class="text-right">

                    <a href="index.php?view_order">
                        
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                        
                    </a>
                    
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="md-md thumb-info">
                    
                    <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive">

                </div>

                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i> <span> Email   : </span> <?php echo $admin_email; ?> <br/>
                        <i class="fa fa-flag"></i> <span> Address : </span> <?php echo $admin_country; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Contact : </span> <?php echo $admin_contact; ?> <br/>
                    </div>

                    <hr class="dotted short" style="margin: 10px 0 10px 0">

                    <h5 class="text-muted"> About me </h5>

                    <p>

                        <?php echo $admin_about; ?>

                    </p>

                </div>

            </div>
        </div>
    </div>

</div>

<?php } ?>
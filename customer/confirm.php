<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dev Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
   
    <div id="top">
        
        <div class="container">
            
            <div class="col-md-6 offer">
                
                <a href="#" class="btn btn-success btn-sm">
                    
                    <?php 
                    
                    if(!isset($_SESSION['customer_email'])){
                        
                        echo "Welcome: Guest";
                        
                    }else{
                        
                        echo "Welcome: " . $_SESSION['customer_email'] . "";
                        
                    }
                    
                    ?>
                
                </a>
                                
            </div>
            
            <div class="col-md-6">
                
                <ul class="menu">
                    
                    <li>
                        <a href="../customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="../checkout.php">
                        
                            <?php 
                            
                            if(!isset($_SESSION['customer_email'])){
                        
                                    echo "<a href='checkout.php'> Login </a>";

                                }else{

                                    echo " <a href='logout.php'> Log Out </a> ";

                                }
                            
                            ?>
                        
                        </a>
                    </li>
                    
                </ul>
                
            </div>
            
        </div>
        
    </div>
    
    <div id="navbar" class="navbar navbar-default">
        
        <div class="container">
            
            <div class="navbar-header">
                
                <a href="../index.php" class="navbar-brand home">
                    
                    <img src="images/logo.jpg" alt="M-dev-Store Logo">
                    
                </a>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    
                    <span class="sr-only">Toggle Navigation</span>
                    
                    <i class="fa fa-align-justify"></i>
                    
                </button>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    
                    <span class="sr-only">Toggle Search</span>
                    
                    <i class="fa fa-search"></i>
                    
                </button>
                
            </div>
            
            <div class="navbar-collapse collapse" id="navigation">
                
                <div class="padding-nav">
                    
                    <ul class="nav navbar-nav left">
                        
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>
                        
                    </ul>
                    
                </div>
                
                <a href="../cart.php" class="btn navbar-btn btn-primary right">
                    
                    <i class="fa fa-shopping-cart"></i>
                                    
                </a>
                
                <div class="navbar-collapse collapse right">
                    
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        
                        <span class="sr-only">Toggle Search</span>
                        
                        <i class="fa fa-search"></i>
                        
                    </button>
                    
                </div>
                
                <div class="collapse clearfix" id="search">
                    
                    <form method="get" action="results.php" class="navbar-form">
                        
                        <div class="input-group">
                            
                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            
                            <span class="input-group-btn">
                            
                            <button type="submit" name="search" value="Search" class="btn btn-primary">
                                
                                <i class="fa fa-search"></i>
                                
                            </button>
                            
                            </span>
                            
                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        My Account
                    </li>
                </ul>
                
            </div>
            
            <div class="col-md-3">
    
                <?php 
                
                    include("includes/sidebar.php");
                
                ?>
                
            </div>

            <?php 

                $customer_session = $_SESSION['customer_email'];

                $get_customer = "select * from customers where customer_email='$customer_session'";

                $run_customer = mysqli_query($con,$get_customer);

                $row_customer = mysqli_fetch_array($run_customer);

                $customer_id = $row_customer['customer_id'];

                $customer_name = $row_customer['customer_name'];

                $customer_email = $row_customer['customer_email'];

                $customer_contact = $row_customer['customer_contact'];

                $customer_address = $row_customer['customer_address'];

            ?>
            
            <div class="col-md-9">
                
                <div class="box">
                    
                    <h1 align="center"> Please confirm your payment</h1>
                    
                    <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                                                
                        <div class="form-group">
                                
                            <label>Recipient's name</label>
                                
                            <input type="text" class="form-control" name="name" value="<?php echo $customer_name ?>" required>
                                
                        </div>
                            
                        <div class="form-group">
                                
                            <label>Recipient's phone number</label>
                                
                            <input type="text" class="form-control" name="contact" value="<?php echo $customer_contact ?>" required>
                                
                        </div>
                            
                        <div class="form-group">
                                
                            <label>Recipient's address</label>
                                
                            <input type="text" class="form-control" name="address" value="<?php echo $customer_address ?>" required>
                                
                        </div>
           
                        <div class="text-center">
                            
                            <button class="btn btn-primary" name="confirm_payment">
                                
                                <i class="fa fa-user-md"></i> Offline Payment
                                
                            </button>

                            <button class="btn btn-light" name="online_payment">
                                
                                <a href="checkout20.PHP" name="online_payment"><i class="fa fa-credit-card"></i> Online Payment</a>
                                
                            </button>
                            
                        </div>
                        
                    </form>
                    
                    <?php 
                    
                            if(isset($_POST['confirm_payment'])){

                                // $get_payment = "select * from customer_orders";
                                    
                                // $run_payment = mysqli_query($con,$get_payment);
            
                                // while($row_payment=mysqli_fetch_array($run_payment)){

                                //     $invoice_no = $row_payment['invoice_no'];

                                //     $get_order = "select * from customer_orders where invoice_no='$invoice_no'";
                                                    
                                //     $run_order = mysqli_query($con,$get_order);
                                                                                
                                // // $mode = $_POST['mode'];                            
                                
                                // $waiting= "waiting";
                                
                                // $insert_payment = "insert into customer_payment (invoice_no,email,name,contact,address,mode) values ('$invoice_no','$email','$name','$contact','$address','$mode')";
                                
                                // $run_payment = mysqli_query($con,$insert_payment);

                                // $email = $_POST['email'];
                                
                                $update_id = $_GET['update_id'];

                                $waiting= "waiting";

                                $name = $_POST['name'];
        
                                $contact = $_POST['contact'];
        
                                $address = $_POST['address'];

                                $offline = "Offline";

                                $update_pending = "update pending_orders set name='$name',address='$address',phone='$contact',mode = '$offline' where order_id='$update_id' ";
        
                                $run_pending = mysqli_query($con,$update_pending);
                                
                                $update_customer_order = "update customer_orders set order_status='$waiting' where order_id='$update_id'";
                                
                                $run_customer_order = mysqli_query($con,$update_customer_order);
                                
                                $update_pending_order = "update pending_orders set order_status='$waiting' where order_id='$update_id'";
                                
                                $run_pending_order = mysqli_query($con,$update_pending_order);
                                
                                if($run_pending_order){
                                    
                                    echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                                    
                                    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                                    
                                }
                                
                            }
                            elseif(isset($_POST['online_payment'])){
                                
                                $update_id = $_GET['update_id'];

                                $waiting= "waiting";

                                $name = $_POST['name'];
        
                                $contact = $_POST['contact'];
        
                                $address = $_POST['address'];

                                $online = "Online";

                                $update_pending = "update pending_orders set name='$name',address='$address',phone='$contact',mode = '$online' where order_id='$update_id' ";
        
                                $run_pending = mysqli_query($con,$update_pending);
                                
                                $update_customer_order = "update customer_orders set order_status='$waiting' where order_id='$update_id'";
                                
                                $run_customer_order = mysqli_query($con,$update_customer_order);
                                
                                $update_pending_order = "update pending_orders set order_status='$waiting' where order_id='$update_id'";
                                
                                $run_pending_order = mysqli_query($con,$update_pending_order);
                                
                                if($run_pending_order){

                                    echo "<script>window.open('checkout20.PHP')</script>";
                                    
                                    echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                                    
                                }
                                
                            }

                    ?>
                    
                </div>
                
            </div>
            
        </div>
    </div>
    
    <?php 
        
        include("includes/footer.php");
        
    ?>
        
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>      
        
</body>
</html>
<?php } ?>
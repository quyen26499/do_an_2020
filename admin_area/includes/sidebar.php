<?php

    if(!isset($_SESSION['admin_email'])){
                      
            echo "<script>window.open('login.php','_self')</script>";
            
        }else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        
        <a href="index.php?dashboard" class="navbar-brand fa fa-opencart" style="font-size:24px">

            Admin Area 

        </a>
        
    </div>
    
    <!-- <ul class="nav navbar-right top-nav">
        
        <li class="dropdown">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>
                
            </a>
            
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_product">
                        
                        <i class="fa fa-fw fa-envelope"></i> Products
                        
                        <span class="badge"><?php echo $count_products; ?></span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_customer">
                        
                        <i class="fa fa-fw fa-users"></i> Customers
                        
                        <span class="badge"><?php echo $count_customers; ?></span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_cat">
                        
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        
                        <span class="badge"><?php echo $count_p_categories; ?></span>
                        
                    </a>
                </li>
                
                <li class="divider"></li>
                
                <li>
                    <a href="logout.php">
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a>
                </li>
                
            </ul>
            
        </li>
        
    </ul> -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav" >
            <li>
                <a href="index.php?dashboard">
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a>
            </li>
            
            <li>
                <a href="index.php?view_product" data-toggle="collapse" data-target="#products">
                        
                        <i class="fa fa-fw fa-tag"></i> Products
                        
                </a>               
            </li>
            
            <li>
                <a href="index.php?view_p_cat" data-toggle="collapse" data-target="#p_cat">
                        
                        <i class="fa fa-fw fa-edit"></i> Products Categories
                        
                </a> 
            </li>
            
            <li>
                <a href="index.php?view_cat" data-toggle="collapse" data-target="#cat">
                        
                        <i class="fa fa-fw fa-book"></i> Categories
                        
                </a>          
            </li>
            
            <li>
                <a href="index.php?view_customer">
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a>
            </>
            
            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-book"></i> View Orders
                </a>
            </li>

            <li>
                <a href="index.php?view_feedback" data-toggle="collapse" data-target="#users">
                        
                        <i class="fa fa-envelope-o"></i> View Feedback
                        
                </a>
                
            </li>
            
            <li>
                <a href="index.php?view_user" data-toggle="collapse" data-target="#users">
                        
                        <i class="fa fa-fw fa-users"></i> Users
                        
                </a>
                
            </li>
            
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li>
            
        </ul>
    </div>
    
</nav>

<?php } ?>
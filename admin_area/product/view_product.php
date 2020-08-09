<?php

    if(!isset($_SESSION['admin_email'])){
                      
            echo "<script>window.open('login.php','_self')</script>";
            
        }else{

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title ">

                    <i class="fa fa-tags"></i> Products

                </h3>
            </div>

            <a class="btn btn-primary" style="margin: 5px 15px -10px " href="index.php?insert_product" >

                <i class="fa fa-plus"></i> Insert Product

            </a>   

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Title </th>
                                <th> Image </th>
                                <th> Price </th>
                                <th> Sold </th>
                                <th> Quantity </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
            
                                $i=0;
                            
                                $get_pro = "select * from products";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_title = $row_pro['product_title'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];
                                    
                                    $pro_quantity = $row_pro['product_quantity'];

                                    $pro_sold = $row_pro['product_sold'];
                                       
                                    $i++;
                                    
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="50" height="40"></td>
                                <td> $ <?php echo $pro_price; ?> </td>
                                <td> <?php echo $pro_sold; ?> </td>
                                <td> 

                                    <?php echo $pro_quantity; ?>
                                    
                                    <!-- <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                                                                                                    
                                        <input name="product_quantity" type="number"  required value="<?php echo $pro_quantity; ?>">
                                                
                                        <input name="update" value="+" type="submit" >
                                                                                        
                                    </form> -->

                                    <!-- <?php        
                                            $get_p = "select * from products";
        
                                            $run_p = mysqli_query($con,$get_p);
                                            
                                            while($row_p = mysqli_fetch_array($run_p)){
                                            
                                                $p_id = $row_p['product_id'];

                                            }

                                    ?> -->
                                </td>
                                <td> 
                                     
                                    <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-pencil" ></i> Edit
                                    
                                    </a> 
                                    
                                </td>
                                <td> 
                                     
                                    <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                    </a> 
                                     
                                </td>
                            </tr>
                            
                            <?php }  ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- <?php 

    if(isset($_POST['update'])){

    $product_quantity = $_POST['product_quantity'];

    $update_product = "update products set product_quantity='$product_quantity' where product_id='$pro_id'";

    $run_product = mysqli_query($con,$update_product);

    if($run_product){
                                                    
    echo "<script>window.open('index.php?view_product','_self')</script>"; 

    }

    }

?> -->
<?php } ?>
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

                    <i class="fa fa-tag fa-fw"></i> Product Category

                </h3>
            </div>

            <a class="btn btn-primary" style="margin: 5px 15px -10px " href="index.php?insert_p_cat" >

                <i class="fa fa-plus"></i> Insert Product Category

            </a> 

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Title </th>
                                <th> Desc </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
                            
                                $i=0;
          
                                $get_p_cats = "select * from product_categories";
          
                                $run_p_cats = mysqli_query($con,$get_p_cats);
          
                                while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                    
                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    
                                    $p_cat_title = $row_p_cats['p_cat_title'];
                                    
                                    $p_cat_desc = $row_p_cats['p_cat_desc'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $p_cat_title; ?> </td>
                                <td width="300"> <?php echo $p_cat_desc; ?> </td>
                                <td> 
                                    <a href="index.php?edit_p_cat= <?php echo $p_cat_id; ?> ">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_p_cat= <?php echo $p_cat_id; ?> ">
                                        <i class="fa fa-trash"></i> Delete
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
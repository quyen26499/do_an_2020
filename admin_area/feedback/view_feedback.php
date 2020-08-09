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
               
                   <i class="fa fa-tags"></i> Feedback
                
               </h3> 
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Name </th>
                                <th> E-Mail </th>
                                <th> Subject </th>
                                <th> Message </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_feedback = "select * from feedback";
                                
                                $run_feedback = mysqli_query($con,$get_feedback);
          
                                while($row_feedback=mysqli_fetch_array($run_feedback)){
                                                                       
                                    $feedback_name = $row_feedback['feedback_name'];
                                    
                                    $feedback_email = $row_feedback['feedback_email'];
                                                                        
                                    $feedback_subject = $row_feedback['feedback_subject'];
                                    
                                    $feedback_message = $row_feedback['feedback_message'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $feedback_name; ?> </td>
                                <td> <?php echo $feedback_email; ?> </td>
                                <td> <?php echo $feedback_subject; ?></td>
                                <td> <?php echo $feedback_message; ?> </td>
                                <td> 
                                     
                                    <a href="index.php?delete_feedback=<?php echo $feedback_name; ?>">
                                     
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
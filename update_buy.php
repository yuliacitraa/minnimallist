<?php
     if (isset($_POST['save'])) { // check data variabel POST from form
        include "connection.php"; //call connection php mysql
    
        // sql query UPDATE VALUES
        $query = "UPDATE buy SET 
        payment_status = '$_POST[payment_status]',
        order_status = '$_POST[order_status]'
        WHERE id_buy = '$_POST[id_buy]'";
    
        //run query
        $update = mysqli_query($db_connection, $query);
    
        if($update) { // check if query TRUE
            echo "<script> alert ('Status updated!'); window.location.replace('product.php'); </script>";
        }else{
            echo "<script> alert ('Update status failed!'); window.location.replace('product.php'); </script>";
        }
    }
     ?>
        <!--<p><a href="read_user_200035.php">Back To Users List</a></p>-->
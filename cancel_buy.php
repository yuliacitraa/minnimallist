<?php
     if (isset($_GET['id_buy'])) { // check data variabel POST from form
        include "connection.php"; //call connection php mysql
    
        // sql query UPDATE VALUES
        $query = "UPDATE buy SET 
        payment_status = 'Canceled',
        order_status = 'Canceled'
        WHERE id_buy = '$_GET[id_buy]'";
    
        //run query
        $update = mysqli_query($db_connection, $query);
    
        if($update) { // check if query TRUE
            echo "<script> alert ('Canceled!'); window.location.replace('buy_history.php'); </script>";
        }else{
            echo "<script> alert ('Failed to cancel!'); window.location.replace('buy_history.php'); </script>";
        }
    }
     ?>
        <!--<p><a href="read_user_200035.php">Back To Users List</a></p>-->
<?php
     if (isset($_POST['save'])) { // check data variabel POST from form
        include "connection.php"; //call connection php mysql
    
        // sql query UPDATE VALUES
        $query = "UPDATE buy SET 
        payment_status = '$_POST[payment_status]',
        order_status   = '$_POST[order_status]',
        payment_method = '$_POST[payment_method]',
        no_card        = '$_POST[no_card]',
        pin            = '$_POST[pin]'
        WHERE id_buy   = '$_POST[id_buy]'";
    
        //run query
        $update = mysqli_query($db_connection, $query);
    
        if($update) { // check if query TRUE
            echo "<script> alert ('Payment Success!'); </script>";
        }else{
            echo "<script> alert ('Payment Failed!'); </script>";
        }
    }
     ?>
        <!--<p><a href="read_user_200035.php">Back To Users List</a></p>-->
        <script>window.location.replace("buy_history.php");</script>
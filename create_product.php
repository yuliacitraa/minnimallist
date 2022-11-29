<?php
     if (isset($_POST['save'])) { // check data variabel POST from form
        include "connection.php"; //call connection php mysql
    
        // sql query INSERT INTO VALUES
        $query = "INSERT Into product (product_id, category, product_name, stock, price, pr_desc) 
        VALUES ('$_POST[product_id]','$_POST[category]', '$_POST[product_name]', '$_POST[stock]', '$_POST[price]', '$_POST[pr_desc]')";
    
        //run query
        $create = mysqli_query($db_connection, $query);
    
        if($create) { // check if query TRUE
            echo "<script> alert ('Product added successfully !'); </script>";
        }else{
            echo "<script> alert ('Product add failed !'); </script>";
        }
    }
     ?>
        <!--<p><a href="read_product.php">Back To Product List</a></p>-->
        <script>window.location.replace("product.php");</script>
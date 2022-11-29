<?php

session_start();

    if(isset($_POST)) {
        include 'connection.php';

        $query = "INSERT INTO buy SET
            product_id      = '$_POST[product_id]', 
            userid          = '$_SESSION[userid]', 
            amount          = '$_POST[amount]', 
            total_payment   = '$_POST[total_payment]', 
            phone           = '$_POST[phone]', 
            address_buy     = '$_POST[address_buy]', 
            voucher         = '$_POST[voucher]', 
            expedition      = '$_POST[expedition]',
            payment_status  = '$_POST[payment_status]',
            order_status    = '$_POST[order_status]',
            payment_method  = '$_POST[payment_method]',
            no_card         = '$_POST[no_card]',
            pin             = '$_POST[pin]' ";

        $create = mysqli_query($db_connection, $query);

        if($create){
            $querystock="UPDATE product SET stock=stock-'$_POST[amount]', total_payment='$_POST[amount]'*price WHERE product_id='$_POST[product_id]'";
	        $updatestock=mysqli_query($db_connection, $querystock);
            echo "<script> alert('Buy success !');</script>";
        }else{
            echo "<script> alert('Buy failed !');</script>";
        }
    }

?>
    <!-- <p><a href="product_id.php">Back to pet list</a></p> -->
    <script> window.location.replace("buy_history.php")</script>
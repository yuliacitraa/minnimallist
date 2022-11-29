<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    }
?>

<!DOCTYPE html>
<head>
    <title>product</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="navbar">
            <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="product.php">product</a></li>
                <li><a href="about.php">about</a></li>
                    
                <?php if(!isset($_SESSION['login'])) { ?>
                    <li><a href="login.php">login</a></li>
                <?php } else {?>

                <?php if($_SESSION['usertype']=='Manager') { ?>
                    <li><a href="read_signup.php">admin</a></li>
                    <li><a href="monthly_report.php">report</a></li>
                <?php } else {}?>

                    <li><a href="profile.php">profile</a></li>
                    <li><a href="logout.php">logout</a></li>
                <?php } ?>
                </ul>
            </div>


        <div class="edit-product">
            <h1>Payment</h1>

            <?php 
        //call connection php mysql
        include "connection.php";

        //make query SELECT * FROM
        $querypayment = "SELECT * FROM buy AS b, user AS u, product AS p WHERE b.id_buy= '$_GET[id_buy]' AND b.payment_status = 'Not Paid' AND p.product_id = b.product_id AND b.userid=u.userid";


        //run query
        $payment = mysqli_query($db_connection, $querypayment);

        //extract data from query ressult
        $data1 = mysqli_fetch_assoc($payment);
    ?>

            <form class="edit-product-form" method="post" action="create_payment.php">
                <table class="edit-product-table">
                    <tr>
                        <td>Name</td>
                        <td><?= $data1['full_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Product name</td>
                        <td><?= $data1['product_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td><?= $data1['amount'] ?></td>
                    </tr>
                    <tr>
                        <td>Total Payment</td>
                        <td><?= $data1['total_payment'] ?></td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>
                            <select name="payment_method" required>
                                <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Card Number</td>
                        <td><input class="edit-product-table-line" type="text" name="no_card" required></td>
                    </tr>
                    <tr>
                        <td>PIN</td>
                        <td><input class="edit-product-table-line" type="password" name="pin" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="save" onclick="return confirm ('are you sure?')">Pay</button>
                            <button type="reset" name="reset">Reset</button>
                            <button class="add-btn"><a href="buy_history.php">Back</a></button>
                            <input type="hidden" name="payment_status" value="Paid">
                            <input type="hidden" name="order_status" value="Prepared">
                            <input type="hidden" name="id_buy" value="<?= $data1['id_buy'] ?>">

                            
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
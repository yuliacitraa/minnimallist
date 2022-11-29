<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    }

//call connection php mysql
include "connection.php";

$querybuy = "SELECT * FROM buy AS b, user AS u, product AS p WHERE b.id_buy= '$_GET[id_buy]' AND p.product_id = b.product_id AND b.userid=u.userid";
$buy = mysqli_query($db_connection, $querybuy);
$data2=mysqli_fetch_assoc($buy);

?>

<!DOCTYPE html>
<head>
    <title>Buy</title>
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
    
    <div class="list-buy">
        <h1>Buy Info</h1>

    <table class="edit-product-table">
        <tr>
            <td><img src="uploads/products/<?= $data2['product_photo'];?>" width="200px" align="center"></td>
            <td></td>
        </tr>
        <tr>
            <td>Date</td>
            <td>: <?= date('l, M-Y H:i:s', strtotime($data2['date_buy'])) ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td>: <?= $data2['full_name'] ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>: <?= $data2['phone'] ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>: <?= $data2['address_buy'] ?></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>: <?= $data2['category'] ?></td>
        </tr>
        <tr>
            <td>Product</td>
            <td>: <?= $data2['product_name'] ?></td>
        </tr>
        <tr>
            <td>Amount</td>
            <td>: <?= $data2['amount'] ?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td>: Rp. <?= $data2['price'] ?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>: <?= $data2['pr_desc'] ?></td>
        </tr>
        <tr>
            <td>Voucher Code</td>
            <td>: <?= $data2['voucher'] ?></td>
        </tr>
        <tr>
            <td>Shipping</td>
            <td>: <?= $data2['expedition'] ?></td>
        </tr>
        <tr>
            <td>Payment Status</td>
            <td>: <?= $data2['payment_status'] ?>
            
            </td>
        </tr>
        <tr>
            <td>Order Status</td>
            <td>: <?= $data2['order_status'] ?></td>
        </tr>
    </table>
    <button><a href="buy_history.php">Back</a><br></button>
    </div>    
</div>
</body>
</html>
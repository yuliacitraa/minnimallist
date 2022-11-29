<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    }
    if($_SESSION['usertype'] != 'Manager') {
        echo "<script>alert('Access forbidden !');window.location.replace('product.php');</script>";
}
//call connection php mysql
include "connection.php";

$querybuy = "SELECT * FROM buy AS b, user AS u, product AS p WHERE b.id_buy = '$_GET[id_buy]' AND p.product_id = b.product_id AND b.userid=u.userid";
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
        <h1>Edit Buy</h1>

    <form class="edit-product-form" method="post" action="update_buy.php">
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
            <td>: 
                <select name="payment_status" required>
                    <option value="Not Paid" <?=($data2['payment_status']=='Not Paid')?'selected':'';?>>Not Paid</option>
                    <option value="Paid" <?=($data2['payment_status']=='Paid')?'selected':'';?>>Paid</option>
                    <option value="Finished" <?=($data2['payment_status']=='Finished')?'selected':'';?>>Finished</option>
                    <option value="Canceled" <?=($data2['payment_status']=='Canceled')?'selected':'';?>>Canceled</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Order Status</td>
            <td>: 
                <select name="order_status" required>
                    <option value="Waiting for being paid" <?=($data2['order_status']=='Waiting for being paid')?'selected':'';?>>Waiting for being paid</option>
                    <option value="Prepared" <?=($data2['order_status']=='Prepared')?'selected':'';?>>Prepared</option>
                    <option value="Has been picked up by shipment" <?=($data2['order_status']=='Has been picked up by shipment')?'selected':'';?>>Has been picked up by shipment</option>
                    <option value="Parcel is on road" <?=($data2['order_status']=='Parcel is on road')?'selected':'';?>>Parcel is on road</option>
                    <option value="Parcel is heading to your home" <?=($data2['order_status']=='Parcel is heading to your homee')?'selected':'';?>>Parcel is heading to your home</option>
                    <option value="Parcel has been received" <?=($data2['order_status']=='Parcel has been received')?'selected':'';?>>Parcel has been received</option>
                    <option value="Finished" <?=($data2['order_status']=='Finished')?'selected':'';?>>Finished</option>
                    <option value="Canceled" <?=($data2['order_status']=='Canceled')?'selected':'';?>>Canceled</option>
                </select>
            </td>
        </tr>
    </table>
    <button type="submit" name="save">Save</button>
    <button><a href="view_product.php?product_id=<?=$data2['product_id']?>">Back</a><br></button>
    <input type="hidden" name="id_buy" value="<?=$data2['id_buy']?>">
    </form>
    </div>    
</div>
</body>
</html>
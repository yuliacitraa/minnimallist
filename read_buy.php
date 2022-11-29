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

//make query SELECT * FROM
$queryproduct = "SELECT * FROM product, user WHERE product_id = '$_GET[product_id]'";

//run query
$product = mysqli_query($db_connection, $queryproduct);

//extract data from query ressult
$data1 = mysqli_fetch_assoc($product);

// $querybuy = "SELECT * FROM product WHERE product_id = '$_GET[product_id]'";

$querybuy = "SELECT * FROM buy AS b, user AS u, product AS p WHERE b.product_id = '$_GET[product_id]' AND p.product_id = b.product_id AND b.userid=u.userid";
$buy = mysqli_query($db_connection, $querybuy);

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
        <h1>List Buy</h1>

    
    <table>
        <tr>
            <td><img src="uploads/products/<?= $data1['product_photo'];?>" width="200px" align="center"></td>
            <td></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>: <?= $data1['category'] ?></td>
        </tr>
        <tr>
            <td>Product</td>
            <td>: <?= $data1['product_name'] ?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td>: Rp. <?= $data1['price'] ?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>: <?= $data1['pr_desc'] ?></td>
        </tr>
    </table>
    <table class="list-buy-table">
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Voucher Code</th>
            <th>Shipping</th>
            <th>Payment Status</th>
            <th>Order Status</th>

        </tr>

        <?php 
            if (mysqli_num_rows($buy) > 0){
                $i = 1;
                foreach($buy as $data2) :
            
        ?>
        <tr>
            <td class="list-buy-table-td"><?= $i++  ?></td>
            <td><?= date('l, M-Y H:i:s', strtotime($data2['date_buy'])) ?></td>
            <td class="list-buy-table-td"><a href="edit_buy.php?id_buy=<?=$data2['id_buy']?>"><?php echo $data2['full_name'] ?></a></td>
            <td><?= $data2['phone'] ?></td>
            <td class="list-buy-table-td"><?= $data2['address_buy'] ?></td>
            <td><?= $data2['voucher'] ?></td>
            <td class="list-buy-table-td"><?= $data2['expedition'] ?></td>
            <td><?= $data2['payment_status'] ?></td>
            <td class="list-buy-table-td"><?= $data2['order_status'] ?></td>
        </tr>
        
        <!-- will loop if the data not empty -->
        <?php 
            endforeach;
        } else {
        ?>
        <tr>
            <td colspan="10" align="center">No record!</td>
        </tr>
        <?php } ?>
    </table>
    <button><a href="view_product.php?product_id=<?=$data1['product_id']?>">Back</a><br></button>
    </div>    
</div>
</body>
</html>
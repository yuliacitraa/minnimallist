<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
}
?>

<!DOCTYPE html>
<html>
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


    <div class="buy">
    <?php 
        //call connection php mysql
        include "connection.php";

        //make query SELECT * FROM
        $queryproduct = "SELECT * FROM product WHERE product_id = '$_GET[product_id]'";

        //run query
        $product = mysqli_query($db_connection, $queryproduct);

        //extract data from query ressult
        $data1 = mysqli_fetch_assoc($product);
    ?>

        <h2>Buy Now!</h2>
        <form class="form-buy" method="post" action="create_buy.php">
            <table class="table-buy">
            <tr>
                <td><img src="uploads/products/<?= $data1['product_photo'];?>" width="120px" align="center"></td>
                <td></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?= $data1['category'] ?></td>
            </tr>
            <tr>
                <td>Product</td>
                <td><?= $data1['product_name'] ?></td>
            </tr>
            <tr>
                <td>Price /pcs</td>
                <td>Rp. <?= $data1['price'] ?><input type="hidden" name="price" id="price" value="<?= $data1['price'] ?>"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td> <?= $_SESSION['full_name'] ?></td>
            </tr>
            <tr>
                <td>Product Amount</td>
                <td><input type="number" name="amount" id="amount" placeholder="Amount" onkeyup="total()" required></td>
            </tr>
            <tr>
                <td>Total Payment (Rp)</td>
                <td><input type="text" name="total_payment" id="total_payment" placeholder="Total Payment" required></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" placeholder="Phone" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address_buy" placeholder="Address" required></td>
            </tr>
            <tr>
                <td>Voucher Code</td>
                <td><input type="text" name="voucher" placeholder="Voucher Code" required></td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>
                    <select name="expedition" required>
                        <option value="">Choose</option>
                        <option value="J&T">J&T</option>
                        <option value="JNE">JNE</option>
                        <option value="sicepat">Sicepat</option>
                        <option value="anteraja">anteraja</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="buy" onclick="return confirm ('are you sure?')">Buy</button>
                    <button><a href="view_product.php?product_id=<?=$data1['product_id']?>">Back</a></button>
                    <input type="hidden" name="product_id" value="<?= $data1['product_id'] ?>"> 
                    <input type="hidden" name="payment_status" value="Not Paid">
                    <input type="hidden" name="order_status" value="Waiting for being paid">
                    <input type="hidden" name="payment_method" value="none">
                    <input type="hidden" name="no_card" value="0">
                    <input type="hidden" name="pin" value="0">
                </td>
            </tr>
            </table>
        </form>
    </div>
    </div>
    <script>
        function total() {
            var price = parseInt(document.getElementById("price").value);
            var amount = parseInt(document.getElementById("amount").value)
            document.getElementById("total_payment").value = price * amount;
        }
    </script>
</body>
</html>
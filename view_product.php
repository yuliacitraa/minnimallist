<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    }

?>

<!DOCTYPE html>
<head>
    <title>View</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //call connection php mysql
        include "connection.php";

        //make query SELECT * FROM
        $queryproduct = "SELECT * FROM product WHERE product_id = '$_GET[product_id]'";

        //run query
        $product = mysqli_query($db_connection, $queryproduct);

        //extract data from query ressult
        $data1 = mysqli_fetch_assoc($product);

        // $querybuy = "SELECT * FROM product WHERE product_id = '$_GET[product_id]'";

        $querybuy = "SELECT * FROM buy AS b, product AS p WHERE b.product_id = '$_GET[product_id]' AND p.product_id = b.product_id";
        $buy = mysqli_query($db_connection, $querybuy);
    ?>

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

        <div class="view-product">
            <h1><?= $data1['product_name']?></h1>
            <div class="view-product-img">
                <img src="uploads/products/<?= $data1['product_photo'];?>" width="100%" align="center">
            </div>
            <div class="view-product-txt">
                <span class="view-product-txt-span">ID :</span>
                <?php if($_SESSION['usertype']=='Manager') { ?>
                <span><h4><a href="read_buy.php?product_id=<?=$data1['product_id']?>"><?php echo $data1['product_id']; ?></a></h4></span> <br>
                <?php } else {?>
                    <span><h4><?php echo $data1['product_id']; ?></h4></span> <br>
                    <?php } ?>


                <span class="view-product-txt-span">Category :</span>
                <span><h4><?= $data1['category'] ?></h4></span><br>
                
                <span class="view-product-txt-span">Stock :</span>
                <span><h4><?= $data1['stock'] ?></h4></span><br>
                
                <span class="view-product-txt-span">Price :</span>
                <span><h4>Rp. <?= $data1['price'] ?></h4></span><br>
                
                <span class="view-product-txt-span">Description :</span>
                <span><h4><?= $data1['pr_desc'] ?></h4></span> <br>
                 
                
                <button><a href="buy.php?product_id=<?=$data1['product_id']?>">buy</a><br></button>
                <button><a href="https://wa.me/62816861173">Chat Admin</a></button>

                <?php if($_SESSION['usertype']=='Manager' || $_SESSION['usertype']=='Staff') { ?>
                    <button><a href="edit_product.php?id=<?=$data1['product_id']?>">Edit</a></button>
                    <button><a href="delete_product.php?id=<?=$data1['product_id']?>" onclick="return confirm('Are you sure?')">Delete</a></button>
                <?php } ?>

                <button><a href="product.php">Back</a><br></button>

            </div>
        </div>
    </div>
</body>
</html>
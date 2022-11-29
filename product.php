<?php 
    session_start();
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
        

        <div class="product-display-txt">
            <h2>PRODUCT LIST</h2>
        </div>

        

        <div class="product-display-cntr">
        <?php
            include "connection.php"; //call connection
            $query = "SELECT * FROM product"; //make a sql query
            $product = mysqli_query ($db_connection, $query); // run query
            foreach ($product as $data) : //loop to extract data from database
        ?>
            <div class="product-display">
                <img src="uploads/products/<?= $data['product_photo'];?>" width="100%" align="center">
                    <div class="product-display-txt">
                        <p>
                            <h5><?= $data['product_id'];?></h5> <br>
                            <b><?= $data['product_name'];?></b><br>
                            <i><?= $data['category'];?></i> <br>
                            Price : Rp. <?= $data['price'];?><br>
                            <?= $data['pr_desc'];?><br>
                            <a href="view_product.php?product_id=<?=$data['product_id']?>">view more</a> <br>
                        </p>
                    </div>
            </div>
        <?php endforeach; ?>
        </div>
        

        <div class="add-button">

                <?php if(isset($_SESSION['login'])) { 
                    if($_SESSION['usertype']=='Manager' || $_SESSION['usertype']=='Staff') { ?>
                                <a href="add_product.php" ><img src="img/add.png"></a>
                    <?php } } else { } ?>

        </div>

    </div>
</body>
</html>
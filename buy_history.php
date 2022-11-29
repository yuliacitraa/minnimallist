<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    }
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy History</title>
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

		<div class="user-list-txt">
            <h2>History</h2>
        </div>

        <div class="paid">
        <span><h3>Not Paid</h3></span>
        <?php 
            $querybuy = "SELECT * FROM buy AS b, user AS u, product AS p WHERE u.userid= '$_SESSION[userid]' AND b.payment_status = 'Not Paid' AND p.product_id = b.product_id AND b.userid=u.userid";
            $buy = mysqli_query($db_connection, $querybuy);
            if (mysqli_num_rows($buy) > 0){
                foreach($buy as $data2) :
        ?>

		<div class="user-list-cntr">
            <div class="user-list">
            <img src="uploads/products/<?= $data2['product_photo']?>" width="100px" align="center">
                <div class="user-list-txt">
                    <p>
                        <h5><?= date('l, M-Y H:i:s', strtotime($data2['date_buy'])) ?></h5> <br>
                        <b><?= $data2['product_name'] ?></b><br>
                        <b>Amount : </b><i><?= $data2['amount']?></i> <br>
                        <b>Payment Status : </b><i><?= $data2['payment_status']?></i> <br>
                        <b>Order Status : </b><i><?= $data2['order_status']?></i><br>
                        <button><a href="more_buy_history.php?id_buy=<?=$data2['id_buy']?>">More</a><br></button>
                        <button><a href="payment.php?id_buy=<?=$data2['id_buy']?>">Pay Now</a><br></button>
                        <button><a href="cancel_buy.php?id_buy=<?=$data2['id_buy']?>" onclick="return confirm('Are you sure?')">Cancel</a><br></button>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; } else {?> <span class="norecord" style="margin-left:50px; padding: 5px;" align="center"><h4>no record!!!</h4></span> <?php } ?>

        </div>

        <div class="paid">
        <span><h3>On Process</h3></span>
        <?php 
            $querybuy = "SELECT * FROM buy AS b, user AS u, product AS p WHERE u.userid= '$_SESSION[userid]' AND b.payment_status = 'Paid' AND p.product_id = b.product_id AND b.userid=u.userid";
            $buy = mysqli_query($db_connection, $querybuy);
            if (mysqli_num_rows($buy) > 0){
                foreach($buy as $data2) :
        ?>

		<div class="user-list-cntr">
            <div class="user-list">
            <img src="uploads/products/<?= $data2['product_photo']?>" width="100px" align="center">
                <div class="user-list-txt">
                    <p>
                        <h5><?= date('l, M-Y H:i:s', strtotime($data2['date_buy'])) ?></h5> <br>
                        <b><?= $data2['product_name'] ?></b><br>
                        <b>Amount : </b><i><?= $data2['amount']?></i> <br>
                        <b>Payment Status : </b><i><?= $data2['payment_status']?></i> <br>
                        <b>Order Status : </b><i><?= $data2['order_status']?></i><br>
                        <button><a href="more_buy_history.php?id_buy=<?=$data2['id_buy']?>">More</a><br></button>
                        <button><a href="cancel_buy.php?id_buy=<?=$data2['id_buy']?>" onclick="return confirm('Are you sure?')">Cancel</a><br></button>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; } else {?> <span class="norecord" style="margin-left:50px; padding: 5px;" align="center"><h4>no record!!!</h4></span> <?php } ?>
        </div>

        <div class="paid">
        <span><h3>Finished</h3></span>        
        <?php 
            $querybuy = "SELECT * FROM buy AS b, user AS u, product AS p WHERE u.userid= '$_SESSION[userid]' AND b.payment_status = 'Finished' AND b.order_status = 'Finished' AND p.product_id = b.product_id AND b.userid=u.userid";
            $buy = mysqli_query($db_connection, $querybuy);
            if (mysqli_num_rows($buy) > 0){
                foreach($buy as $data2) :
        ?>

		<div class="user-list-cntr">
            <div class="user-list">
            <img src="uploads/products/<?= $data2['product_photo']?>" width="100px" align="center">
                <div class="user-list-txt">
                    <p>
                        <h5><?= date('l, M-Y H:i:s', strtotime($data2['date_buy'])) ?></h5> <br>
                        <b><?= $data2['product_name'] ?></b><br>
                        <b>Amount : </b><i><?= $data2['amount']?></i> <br>
                        <b>Payment Status : </b><i><?= $data2['payment_status']?></i> <br>
                        <b>Order Status : </b><i><?= $data2['order_status']?></i><br>
                        <button><a href="more_buy_history.php?id_buy=<?=$data2['id_buy']?>">More</a><br></button>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; } else {?> <span class="norecord" style="margin-left:50px; padding: 5px;" align="center"><h4>no record!!!</h4></span> <?php } ?>
        </div>

        <div class="paid">
        <span><h3>Canceled</h3></span>        
        <?php 
            $querybuy = "SELECT * FROM buy AS b, user AS u, product AS p WHERE u.userid= '$_SESSION[userid]' AND b.payment_status = 'Canceled' AND p.product_id = b.product_id AND b.userid=u.userid";
            $buy = mysqli_query($db_connection, $querybuy);
            if (mysqli_num_rows($buy) > 0){
                foreach($buy as $data2) :
        ?>

		<div class="user-list-cntr">
            <div class="user-list">
            <img src="uploads/products/<?= $data2['product_photo']?>" width="100px" align="center">
                <div class="user-list-txt">
                    <p>
                        <h5><?= date('l, M-Y H:i:s', strtotime($data2['date_buy'])) ?></h5> <br>
                        <b><?= $data2['product_name'] ?></b><br>
                        <b>Amount : </b><i><?= $data2['amount']?></i> <br>
                        <b>Payment Status : </b><i><?= $data2['payment_status']?></i> <br>
                        <b>Order Status : </b><i><?= $data2['order_status']?></i><br>
                        <button><a href="more_buy_history.php?id_buy=<?=$data2['id_buy']?>">More</a><br></button>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; } else {?> <span class="norecord" style="margin-left:50px; padding: 5px;" align="center"><h4>no record!!!</h4></span> <?php } ?>
        </div>

    </div>
</body>
</html>
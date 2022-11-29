<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
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


        <div class="user-profile-cntr">
            <h1>PROFILE</h1>
    
            <div class="user-list-txt">
                <img src="uploads/users/<?= $_SESSION['photo']; ?>" width="200px"> <br>
                <span class="view-product-txt-span">Name :</span> <br>
                <h4><?=$_SESSION['full_name'];?></h4><br>

                <span class="view-product-txt-span">Username :</span> <br>
                <h4><?=$_SESSION['username'];?></h4><br>

                <span class="view-product-txt-span">Email :</span> <br>
                <h4><?=$_SESSION['email'];?></h4><br>


                <h4><i>you're login as <?=$_SESSION['usertype'];?></i></h4><br>

                <button><a href="change_password.php">Change Password</a><br></button>
                <button><a href="edit_profile.php">Edit Profile</a></button>
                <button><a href="buy_history.php">Buy History</a></button>

            </div>
        </div>
    </div>
</body>
</html>
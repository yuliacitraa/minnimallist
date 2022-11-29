<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    }
    if($_SESSION['usertype'] != 'Manager') {
		echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
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
            <h2>USER LIST</h2>
        </div>
        <div class="add-button">
            <a href="signup.php" ><img src="img/add.png"></a>
        </div>
		<?php
			include "connection.php"; //call connection
			$query = "SELECT * FROM user"; //make a sql query
			$signup = mysqli_query ($db_connection, $query); // run query
			foreach ($signup as $data) : //loop to extract data from database
		?>

		<div class="user-list-cntr">
            <div class="user-list">
                <img src="uploads/users/<?= $data['user_photo'];?>" width="100px" align="center">
                    <div class="user-list-txt">
                        <p>
                            <h5><?php echo $data['usertype']; ?></h5> <br>
                            <b><?php echo $data['username']; ?></b><br>
                            <i><?php echo $data['email']; ?></i> <br>
                            <?php echo $data['full_name']; ?><br>
                            <button><a href="edit_signup.php?id=<?=$data['userid']?>">Edit</a><br></button>
                            <button><a href="delete_signup.php?id=<?=$data['userid']?>" onclick="return confirm('Are you sure?')">Delete</a></button>
                            <button><a href="reset_password.php?id=<?=$data['userid'];?>&type=<?=$data['usertype'];?>" onclick="return confirm('are you sure reset the password?')">Reset Password</a></button>
                        </p>
                    </div>
            </div>
            
        </div>
		<?php endforeach; ?>
        
        </div>
</body>
</html>
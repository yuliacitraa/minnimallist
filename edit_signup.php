<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('form_login.php');</script>";
    }
    if($_SESSION['usertype'] != 'Manager') {
		echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
	}

    include "connection.php";
    $query="SELECT * FROM user WHERE userid='$_GET[id]'";
    $signup=mysqli_query($db_connection,$query);
    $data=mysqli_fetch_assoc($signup);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Edit User</title>
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
                    <?php } else {}?>

                    <li><a href="profile.php">profile</a></li>
                    <li><a href="logout.php">logout</a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="edit-user">
            <h1>Edit User</h1>
            <div>
                <form class="edit-user-form" method="post" action="update_signup.php" enctype="multipart/form-data" >
                    <table class="edit-user-table">
                        <tr>
                            <td></td>
                            <td><img src="uploads/users/<?= $data['user_photo']; ?>" width="200px">
                            <input type="file" name="new_photo" value="<?= $data['user_photo']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input class="edit-user-table-line" type="text" name="full_name" value="<?=$data['full_name']?>" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input class="edit-user-table-line" type="text" name="email" value="<?=$data['email']?>" required></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input class="edit-user-table-line" type="text" name="username" value="<?=$data['username']?>" required></td>
                        </tr>
                        <tr>
                            <td>User type</td>
                            <td>
                                <input type="radio" name="usertype" value="Staff" <?=($data['usertype']=='Staff')?'checked':'';?> required>Staff
                                <input type="radio" name="usertype" value="Manager" <?=($data['usertype']=='Manager')?'checked':'';?>  required>Manager
                                <input type="radio" name="usertype" value="Pelanggan" <?=($data['usertype']=='Pelanggan')?'checked':'';?> required>Pelanggan
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="add-btn" type="submit" name="save">Save</button>
                                <button class="add-btn" type="reset" name="reset">Reset</button>
                                <button class="add-btn"><a href="read_signup.php">Back</a></button>
                                <input type="hidden" name="userid" value="<?=$data['userid']?>">
                                <input type="hidden" name="user_photo" value="<?=$data['user_photo']?>">
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
        </div>
    </body>
</html>

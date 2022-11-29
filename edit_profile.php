<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('form_login.php');</script>";
    }

    include "connection.php";
    $query="SELECT * FROM user WHERE userid='$_SESSION[userid]'";
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
                    <li><a href="monthly_report.php">report</a></li>
                    <?php } else {}?>

                    <li><a href="profile.php">profile</a></li>
                    <li><a href="logout.php">logout</a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="edit-user">
            <h1>Edit Profile</h1>
            <div>
                <form class="edit-user-form" method="post" action="update_profile.php" enctype="multipart/form-data" >
                    <table class="edit-user-table">
                        <tr>
                            <td></td>
                            <td><img src="uploads/users/<?= $data['user_photo']; ?>" width="200px">
                            <input type="file" name="new_photo"></td>
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
                            <td></td>
                            <td>
                                <button class="add-btn" type="submit" name="save">Save</button>
                                <button class="add-btn" type="reset" name="reset">Reset</button>
                                <button class="add-btn"><a href="profile.php?product_id=<?=$data['userid']?>">Back</a></button>
                                <input type="hidden" name="userid" value="<?=$data['userid']?>">
                                <input type="hidden" name="user_photo" value="<?=$data['user_photo']?>">
                                <input type="hidden" name="usertype" value="<?=$data['usertype']?>">

                            </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
        </div>
    </body>
</html>

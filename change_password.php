<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
}

    include "connection.php";
    $query = "SELECT * FROM user WHERE userid= '$_SESSION[userid]'";
    $user = mysqli_query($db_connection, $query); 
    $data = mysqli_fetch_assoc($user);

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
    <h1>Change Password</h1>

        <div class="user-list-txt">
            <form method="post" action="update_password.php">
                <table>
                    <tr>
                        <td>New Password</td>
                        <td>: <input type="password" name="new_password" id="new" required /></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp; 
                            <input type="checkbox" onclick="show()">Show Password
                        </td> 
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp; 
                            <button type="submit" name="change">Change</button>
                            <button type="reset" name="reset">Reset</button>
                            <button class="add-btn"><a href="profile.php?product_id=<?=$data['userid']?>">Back</a></button>
                        </td> 
                    </tr>
                </table>
            </form>
        </div>
    </div>

    </div>

    <script>
        function show(){
            var x = document.getElementById("new");
            if (x.type == "password"){
                x.type="text";
            } else {
                x.type="password";
            }
        }
    </script>
</body>
</html>
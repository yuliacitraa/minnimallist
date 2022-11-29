<?php
    if(isset($_POST['save'])){
        include "connection.php";

        //create default password
	    $password = password_hash($_POST['usertype'], PASSWORD_DEFAULT);

        $query = "INSERT INTO user  (full_name, email, username, password, usertype) 
        VALUES ('$_POST[full_name]', '$_POST[email]', '$_POST[username]', '$password', '$_POST[usertype]')";

        $create1 = mysqli_query($db_connection, $query);

        if ($create1){
            echo "<script> alert ('you registered successfully!!'); </script>";
        } else {
            echo "<script> alert ('register failed !!'); </script>";
        }
    }
?>
    <!--<p><a href="read_user.php">Back To Users List</a></p>-->
    <script>window.location.replace("login.php");</script>
<?php
session_start();
if(isset($_POST['change'])){
    include "connection.php";

    $password = password_hash($_POST['new_password'],PASSWORD_DEFAULT);

    $query = "UPDATE user SET password='$password' WHERE userid='$_SESSION[userid]'";

    $update = mysqli_query($db_connection,$query);

    if($update){
        $_SESSION['password']=$password;
        echo "<script> alert('Change Password Success!'); window.location.replace('index.php');</script>";
    } else {
        echo "<script> alert('Change Password Failed!'); window.location.replace('profile.php');</script>";
    }
}
<?php
    if(isset($_GET['id'])){
        include "connection.php";
        $query = "DELETE FROM user 
        WHERE userid = '$_GET[id]'";

        $delete = mysqli_query($db_connection, $query);

        if ($delete){
            echo "<script> alert ('User Deleted  successfully!!'); </script>";
        } else {
            echo "<script> alert ('Delete User failed !!'); </script>";
        }
    }
?>

<script>window.location.replace("read_signup.php");</script>
<?php
    if(isset($_GET['id'])){
        include "connection.php";
        $query = "DELETE FROM product
        WHERE product_id = '$_GET[id]'";

        $delete = mysqli_query($db_connection, $query);

        if ($delete){
            echo "<script> alert ('Product Deleted successfully!!'); </script>";
        } else {
            echo "<script> alert ('Delete failed !!'); </script>";
        }
    }
?>

<script>window.location.replace("product.php");</script>
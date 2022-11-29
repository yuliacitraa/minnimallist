<?php
    if(isset($_POST['save'])){ // chek variable POST from RFORM
        include "connection.php"; //call connection php mysql

        $folder = 'uploads/products/'; // target folder for upload
        if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])){
            
            // success upload, get the photo name
            $photo = $_FILES['new_photo']['name'];
            if($_POST['product_photo'] !== 'default.png') unlink($folder . $_POST['product_photo']); // delete old photo

        } else $photo = $_POST['product_photo']; //jika tidak ganti foto, maka menggunakan foto lama pada hidden

            // make query for update photo

            $query = "UPDATE product SET 
                product_id   = '$_POST[product_id]',
                category     = '$_POST[category]',
                product_name = '$_POST[product_name]',
                stock        = '$_POST[stock]',
                price        = '$_POST[price]',
                pr_desc      = '$_POST[pr_desc]',
                product_photo= '$photo'
                WHERE product_id = '$_POST[product_id]'";
                        
            // run query
            $upload = mysqli_query($db_connection, $query);

            if($upload){ // check query result TRUE/success
                // success msg
                echo "<script> alert ('Product Photo Successfully Edited !'); window.location.replace('product.php'); </script>";
            } else {
                // failed msg
                echo "<script> alert ('Upload Product Photo Failed !'); window.location.replace('edit_product.php?id=$_POST[product_id]'); </script>";
            }
    }
?>
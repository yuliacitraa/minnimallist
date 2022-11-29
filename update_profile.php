<?php
    if(isset($_POST['save'])){ // chek variable POST from RFORM
        include "connection.php"; //call connection php mysql

        $folder = 'uploads/users/'; // target folder for upload
        if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])){
            
            // success upload, get the photo name
            $photo = $_FILES['new_photo']['name'];
            if($_POST['user_photo'] !== 'default.png') unlink($folder . $_POST['user_photo']); // delete old photo

        } else $photo = $_POST['user_photo']; //jika tidak ganti foto, maka menggunakan foto lama pada hidden

            // make query for update photo

            $query = "UPDATE user SET 
                full_name = '$_POST[full_name]',
                email     = '$_POST[email]',
                username  = '$_POST[username]',
                usertype  = '$_POST[usertype]',
                user_photo= '$photo'
                WHERE userid = '$_POST[userid]'";
                        
            // run query
            $upload = mysqli_query($db_connection, $query);

            if($upload){ // check query result TRUE/success
                // success msg
                echo "<script> alert ('Successfully Edited !'); window.location.replace('profile.php'); </script>";
            } else {
                // failed msg
                echo "<script> alert ('Edit Failed !'); window.location.replace('profile.php'); </script>";
            }
        // failed upload
        }
?>

<script>window.location.replace("index.php");</script>
<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    
    if($_SESSION['usertype'] != 'Manager' || $_SESSION['usertype'] != 'Staff') {
        echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>product</title>
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
        
        <div class="buy">
            <h2>Add Product</h2>
        
            <form method="post" action="create_product.php" class="form-buy">
                <table class="table-buy">
                    <tr>
                        <td>Product ID</td>
                        <td><input type="text" name="product_id" required></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="category" required>
                                <option value="">Choose</option>
                                <option value="Livingroom">Livingroom</option>
                                <option value="Bedroom">Bedroom</option>
                                <option value="Bathroom">Bathroom</option>
                                <option value="Kitchen">Kitchen</option>
                                <option value="Essentials">Essentials</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><input type="text" name="product_name" required></td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td><input type="text" name="stock" required></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="pr_desc" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="add-btn" type="submit" name="save">Save</button>
                            <button class="add-btn" type="reset" name="reset">Reset</button>
                            <button class="add-btn"><a href="product.php">Back</a></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
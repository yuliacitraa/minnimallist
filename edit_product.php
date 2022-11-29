<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('login.php');</script>";
    }
    if($_SESSION['usertype'] == 'Pelanggan') {
		echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
	}
    include "connection.php";
    $query="SELECT * FROM product WHERE product_id='$_GET[id]'";
    $product=mysqli_query($db_connection,$query);
    $data=mysqli_fetch_assoc($product);
?>

<!DOCTYPE html>
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


        <div class="edit-product">
            <h1>Edit Product</h1>

            <form class="edit-product-form" method="post" action="update_product.php"  enctype="multipart/form-data">
                <table class="edit-product-table">
                    <tr>
                        <td>Product ID</td>
                        <td><input class="edit-product-table-line" type="text" name="product_id" value="<?=$data['product_id']?>" required></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="category" required>
                                <option value="">Choose</option>
                                <option value="Livingroom" <?=($data['category']=='Livingroom')?'selected':'';?>>Livingroom</option>
                                <option value="Bedroom" <?=($data['category']=='Bedroom')?'selected':'';?>>Bedroom</option>
                                <option value="Bathroom" <?=($data['category']=='Bathroom')?'selected':'';?>>Bathroom</option>
                                <option value="Kitchen" <?=($data['category']=='Kitchen')?'selected':'';?>>Kitchen</option>
                                <option value="Essentials" <?=($data['category']=='Essentials')?'selected':'';?>>Essentials</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><input class="edit-product-table-line" type="text" name="product_name" value="<?=$data['product_name']?>" required></td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td><input class="edit-product-table-line" type="text" name="stock" value="<?=$data['stock']?>" required></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input class="edit-product-table-line" type="text" name="price" value="<?=$data['price']?>" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input class="edit-product-table-line" type="text" name="pr_desc" value="<?=$data['pr_desc']?>" required></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><img src="uploads/products/<?= $data['product_photo']; ?>" width="200px">
                        <input type="file" name="new_photo" value="<?= $data['product_photo']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="save">Save</button>
                            <button type="reset" name="reset">Reset</button>
                            <button class="add-btn"><a href="view_product.php?product_id=<?=$data['product_id']?>">Back</a></button>
                            <input type="hidden" name="product_id" value="<?=$data['product_id']?>">
                            <input type="hidden" name="product_photo" value="<?=$data['product_photo']?>">

                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
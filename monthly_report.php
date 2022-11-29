<?php
    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>alert('Please Login first!'); window.location.replace('form_login_200035.php');</script>";
    }
    if($_SESSION['usertype'] != 'Manager') {
	    echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
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


        <div class="list-buy">
            <h1>Monthly Report</h1>
                <?php 
    		        $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
	    	        $year = date('Y');
	            ?>
            <form class="edit-product-table">
                <p>select
                    <select name="month" required>
                        <option value="">Month</option>
                        <?php for($m = 1; $m <= 12; $m++){ ?>
                        <?php if(!isset($_GET['month'])) { ?>
                        <option value="<?= $m ?>"><?= $months[$m-1] ?></option>
                        <?php } else { ?>
                        <option value="<?= $m ?>" <?= ($m==$_GET['month'])?'selected':'' ?>><?= $months[$m-1] ?></option>
                        <?php }} ?>
                    </select>
                    <select name="year" required>
                        <option value="">Year</option>
                        <?php for($y = 0; $y <= 2; $y++){ 
                            if(!isset($_GET['year'])) { ?>
                        <option value="<?= $year-$y ?>" ><?= $year-$y ?></option>
                        <?php } else { ?>
                        <option value="<?= $year-$y ?>" <?= ($year-$y==$_GET['year'])?'selected':'' ?>><?= $year-$y ?></option>
                        <?php }} ?>
                    </select>
                    <button type="submit">View Report</button>
                </p>
            </form>

            <?php
		        if(isset($_GET['year'])){
			        include 'connection.php';
			        $query = "SELECT b.date_buy, p.category, p.product_name, u.full_name, b.amount, p.price FROM
				              buy AS b, product AS p, user AS u WHERE b.product_id=p.product_id AND 
				              b.userid=u.userid AND MONTH(b.date_buy)='$_GET[month]' AND YEAR(b.date_buy)='$_GET[year]'";
    			    $report = mysqli_query($db_connection,$query);
	        ?>

            <br><h4>Report Periode <?=$months[$_GET['month']-1]?> - <?=$_GET['year']?></h4>
            <table class="list-buy-table">
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Costumer</th>
                    <th>Amount</th>
                    <th>Pay (Rp)</th>
                </tr>
                <?php 
			        if(mysqli_num_rows($report) > 0) {
    				    $i=1; $total=0;
        				foreach($report as $data) :
	        	?>
                <tr>
                    <td class="list-buy-table-td"><?=$i++?></td>
                    <td><?=date('l jS \of F Y (h:i:s A)',strtotime($data['date_buy']))?></td>
                    <td class="list-buy-table-td"><?=$data['category']?></td>
                    <td><?=$data['product_name']?></td>
                    <td class="list-buy-table-td"><?=$data['full_name']?></td>
                    <td><?=$data['amount']?></td>
                    <td class="list-buy-table-td" align="right"><?=$amount=$data['amount']*$data['price']?></td>
                </tr>
                <?php $total = $total+$amount; endforeach; ?>
                <tr><th colspan="7" align="right"> Total : Rp. <?=$total?></th></tr>
                <?php }else{ ?>
                <tr><th colspan="7" align="center"> No Record! </th></tr>
                <?php } ?>
            </table>
            <?php } ?>

        </div>
    </div>
</body>
</html>
<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Minnimallist</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <div class="navbar">
                <ul>
                    <li><a href="#product">home</a></li>
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

            <div class="home" id="home">
                <div class="hleft">

                </div>

                <div class="hright">
                    <div class="htext">
                        <h1>Minnimallist</h1>
                        <h5><i>home furniture by 'Minnimallist'</i></h5>
                        <p><b>noun. noun. /ˈfərnɪtʃər/ [uncountable] </b>
                            objects that can be moved, such as tables, chairs, and beds, that are put into a house or an 
                            office to make it suitable for living or working in a piece of furniture patio/office, etc.</p>
                    </div>
                </div>
            </div>

            <div class="product" id="product">
                <div class="pr1">
                    <h2>Our Best Seller Product</h2>
                        <table>
                            <tr>
                                <td><img class="img1" src="img/chair.jpg"></td>
                                <td><img class="img1" src="img/shelf.jpg"></td>
                                <td><img class="img1" src="img/sofa.jpg"></td>
                            </tr>
                            <tr>
                                <td><b>Chair</b></td>
                                <td><b>Shelf</b></td>
                                <td><b>Sofa</b></td>
                            </tr>
                            <tr>
                                <td>Rp. 550.000</td>
                                <td>Rp. 369.000</td>
                                <td>Rp. 14.899.999</td>
                            </tr>
                            <tr>
                                <td><button class="buy-btn">CHECK NOW!!!</button></td>
                                <td><button class="buy-btn">CHECK NOW!!!</button></td>
                                <td><button class="buy-btn">CHECK NOW!!!</button></td>
                            </tr>
                        </table>
                </div>
                <div class="pr2">
                    <h2>Category</h2>
                    <div class="cat">
                        <table>
                            <tr>
                                <td class="td-img" style="background-image: url(img/livingroom.jpg);"></td>
                                <td class="td-txt" style="text-align:justify;">
                                    <h2 style="text-align: left;"><a href="livingroom.php">LivingRoom</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat pellentesque, 
                                        condimentum ex sit amet, rhoncus justo. Sed sed cursus sem, at faucibus risus. <a href="livingroom.php"><i><b>...read more</b></i></a> </p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="cat" align="right">
                        <table>
                            <tr>
                                <td class="td-txt" style="text-align:justify;">
                                    <h2 style="text-align: right;"><a href="bedroom.php">Bedroom</a></h2>
                                    <p style="text-align: right;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat pellentesque, 
                                        condimentum ex sit amet, rhoncus justo. Sed sed cursus sem, at faucibus risus. <a href="bedroom.php"><i><b>...read more</b></i></a> </p>
                                </td>
                                <td class="td-img" style="background-image: url(img/bedroom.jpg);"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="cat">
                        <table>
                            <tr>
                                <td class="td-img" style="background-image: url(img/bathroom.jpg); height: 550px; width: 450px;"></td>
                                <td class="td-txt" style="width:350px; text-align:justify;">
                                    <h2 style="text-align: left;"><a href="bathroom.php">Bathroom</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat pellentesque, 
                                        condimentum ex sit amet, rhoncus justo. Sed sed cursus sem, at faucibus risus. <a href="bathroom.php"><i><b>...read more</b></i></a> </p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="cat" align="right">
                        <table>
                            <tr>
                                <td class="td-txt"  style="text-align:justify;">
                                    <h2 style="text-align: right;"><a href="kitchen.php">Kitchen</a></h2>
                                    <p style="text-align: right;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat pellentesque, 
                                        condimentum ex sit amet, rhoncus justo. Sed sed cursus sem, at faucibus risus. <a href="kitchen.php" ><i><b>...read more</b></i></a> </p>
                                </td>
                                <td class="td-img" style="background-image: url(img/kitchen.jpg);"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="cat" >
                        <table>
                            <tr>
                                <td class="td-img" style="background-image: url(img/essentials.jpg); height: 550px; width: 450px;"></td>
                                <td class="td-txt" style="width:350px; text-align:justify;">
                                    <h2 style="text-align: left;"><a href="essentials.php">Essentials</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat pellentesque, 
                                        condimentum ex sit amet, rhoncus justo. Sed sed cursus sem, at faucibus risus. <a href="essentials.php"><i><b>...read more</b></i></a> </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>

            </div>

            <div class="footer">
                <table class="ftable">

                    <tr>
                        <br> <br>
                        <td><b>Made by <a href="about.html" target="_blank" onclick="return confirm ('Move to About Founder')">yuliacitra</b></a></td>
                        <td><b>Address</b></td>
                        <td><b>Contact</b></td>
                        <td><b>Follow Us</b></td>
                    </tr>

                    <tr>
                        
                        <td>founder : <a href="about.html" target="_blank" onclick="return confirm ('Move to About Founder?')">yuliacitra</a></td>
                        <td>Baleendah, Bandung, West Java 40375 Indonesia</td>
                        <td>
                            <a href="yuliacitra2011@gmail.com" target="_blank" onclick="return confirm ('Move to email?')">Email</a> <br>
                            <a href="https://wa.me/62816861173" target="_blank" onclick="return confirm ('Move to WhatsApp?')">WhatsApp</a>
                        </td>
                        <td>
                            <a href="https://instagram.com/yuliaacitraa_?utm_medium=copy_link" target="_blank" onclick="return confirm ('Move to instagram?')">Instagram</a> <br>
                            <a href="https://pin.it/5IQnXbF" target="_blank" onclick="return confirm ('Move to Pinterest?')">Pinterest</a> <br>
                            <a href="https://twitter.com/gakenal_kamu?t=4KN0CS2C91LSX4Qhsj2_6Q&s=09" target="_blank" onclick="return confirm ('Move to Twitter?')">Twitter</a> <br>
                            <a href="https://youtube.com/channel/UC9RBDzSeDFPK1XhdS4KSiOQ" target="_blank" onclick="return confirm ('Move to Youtube?')">YouTube</a> <br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">Copyright 2021</td>
                    </tr>

                </table>
            </div>
        </div>
    </body>
</html>
<?php
session_start(); //start session
if(isset($_POST['login'])) { //check post variable
	include "connection.php"; //call connection
	
	//make query based on username
	$query="SELECT * FROM user WHERE username='$_POST[username]'";
	
	//run query 
	$login=mysqli_query($db_connection,$query);
	
	if(mysqli_num_rows($login) > 0) {
		$user=mysqli_fetch_assoc($login);
		if(password_verify($_POST['password'], $user['password'])) {
			
		$_SESSION['login']=TRUE;
		$_SESSION['userid']=$user['userid'];
		$_SESSION['full_name']=$user['full_name'];
		$_SESSION['email']=$user['email'];
		$_SESSION['username']=$user['username'];
		$_SESSION['password']=$user['password'];
        $_SESSION['usertype']=$user['usertype'];
		$_SESSION['photo']=$user['user_photo'];

		
		echo "<script>alert('login success !');window.location.replace('index.php');</script>";
		} else {
			echo "<script>alert('login failed, wrong password !');window.location.replace('login.php');</script>";
		}
		}else {
			echo "<script>alert('login failed, user not found !');window.location.replace('login.php');</script>";
	}
}
?>
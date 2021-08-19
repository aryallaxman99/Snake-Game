<?php
session_start();
	include("connection.php");
	include("function.php");
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$first_name =$_POST['first_name'];
		$last_name =$_POST['last_name'];
		if(!empty($user_name)&& !empty($password) && !is_numeric($user_name) && !empty($first_name) && !is_numeric($first_name) && !empty($last_name) && !is_numeric($last_name)){

			$user_id = random_num(20);
			$query ="insert into users(user_id,user_name,first_name,last_name,password) values('$user_id','$user_name','$first_name','$last_name','$password')";

			mysqli_query($con,$query);
			header("Location:login.php");
			die;

		}else{
			echo"please enter valid data";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Snake</title>
	<link rel="shortcut icon" href="game/image/icon.ico">
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>

	<div class="log_in">
		<div class = "login_page">Sign Up</div>
		<form method="post">
			<div class="textfield">
				<input type="text" required
				name = "first_name">
				<label>First Name</label>
			</div>
			<div class="textfield">
				<input type="text" required
				name= "last_name">
				<label>Last Name</label>
			</div>
			<div class="textfield">
				<input type="text" required
				name = "user_name">
				<label>Username</label>
			</div>

			<div class="textfield">
				<input type="password" required
				name = "password">
				<label>Password</label>
			</div>
			<div class="textfield">
				<input type="submit" value="submit">
			</div>
			<div class="singup_link">
				Back to <a href="login.php">Login</a>
			</div>
		</form>
	</div>

</body>
</html>
<?php
session_start();
	include("connection.php");
	include("function.php");
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name)&& !empty($password) && !is_numeric($user_name)){

			
			$query ="select * from users where user_name = '$user_name' limit 1";

			$result = mysqli_query($con,$query);
			
			if($result && mysqli_num_rows($result)>0){
				$user_data = mysqli_fetch_assoc($result);

				
				if($user_data['password'] == $password)
				{
					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location:game/game.html");
					die;
				}
				else{
					echo "Invalid login";
				}
			}
			else
				echo "Credentials not found in this database";

		}else{
			echo "please enter valid data";
		}
	}
?>

<html>
<head>
	<title>Snake</title>
	<link rel="shortcut icon" href="game/image/icon.ico">
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>

	<div class="log_in">
		<div class = "login_page">Log In</div>
		<form method="post">
			<div class="textfield">
				<input type="text" required
				name="user_name">
				<label>Username</label>
			</div>

			<div class="textfield">
				<input type="password" required
				name= "password">
				<label>Password</label>
			</div>
			<div class="textfield">
				<input type="submit" value="Login">
			</div>
			<div class="singup_link">
				Not a member? <a href="signup.php">Signup</a>
			</div>
		</form>
	</div>

</body>
</html>
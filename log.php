<?php
	session_start();
	$db=mysqli_connect("localhost","root","","swave");
?>
<!DOCTYPE html>
<?php	
	if(isset($_POST['reg'])){
		$login=$_POST['login'];
		$password=$_POST['password'];
		if($login!='' && $password!=''){
		mysqli_query($db,"Insert into log_pas values('','$login','$password')");
		$_SESSION['login']=$login;
		$_SESSION['password']=$password;
		header("Location: index.php");
		}
		if($login==''){
			echo "Заполните логин!";
		} 
		if($password==''){
			echo "Заполните пароль!";
		}
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация в Swave</title>
    <link rel="icon" href="img/cupcake.png">
	<link rel="stylesheet" href="css/stylereg.css">
</head>
<body>
	<div class="box">
		<form method="POST" autocomplete="off">
			<h2>Регистрация</h2>
			<div class="inputBox">
				<input name="login" type="text" required="required">
				<span>Придумайте логин</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input name="password" type="password" required="required">
				<span>Придумайте пароль</span>
				<i></i>
			</div>
			<div class="links">
				<a href="reg.php">войти в аккаунт</a>
			</div>
			<input type="submit" value="Создать" name="reg">
		</form>
	</div>
</body>
</html>
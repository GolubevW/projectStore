<?php
	session_start();
	$db=mysqli_connect("localhost","root","","swave");
?>
<!DOCTYPE html>
<?php	
	if(isset($_POST['reg'])){
		$temp=0;
		$login=$_POST['login'];
		$password=$_POST['password'];
		$sql=mysqli_query($db, "Select *from log_pas");
		while($res=mysqli_fetch_array($sql)){
			if($login==$res['login'] && $password==$res['password']){
				$temp=1;	
			}

		}
		if($temp==1){
			echo "Добро пожаловать <br>".$login;
			$_SESSION['login']=$login;
			$_SESSION['password']=$password;
			header("Location: index.php");
		}
		else{
			echo "Такого пользователя нет";
		}
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вход в Swave</title>
    <link rel="icon" href="img/cupcake.png">
	<link rel="stylesheet" href="css/stylereg.css">
</head>
<body>
	<div class="box">
		<form autocomplete="off" method="POST">
			<h2>Вход</h2>
			<div class="inputBox">
				<input name="login" type="text" required="required">
				<span>Логин</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input name="password" type="password" required="required">
				<span>Пароль</span>
				<i></i>
			</div>
			<div class="links">
				<a href="log.php">Создать аккаунт</a>
			</div>
			<input type="submit" value="Войти" name="reg">
		</form>
	</div>
	
</body>
</html>
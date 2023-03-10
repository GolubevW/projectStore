<?php
	session_start();
	$db=mysqli_connect("localhost","root","","swave");
    if(isset($_POST['add'])){
		$name=$_POST['name'];
		$price=$_POST['price'];
		$image=$_POST['image'];
		$catalog=$_POST['catalog'];
		mysqli_query($db,"Insert into products values('','$name','$price','$image','$catalog')");
        header("Location: admin.php");
    }
    if(isset($_POST['out'])){
        header("Location: index.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
	<link rel="stylesheet" href="css/styleadm.css">
    <link rel="icon" href="img/cupcake.png">
</head>
<body>
    <div class="box">
        
    <form method="POST">
			<input type="text" name="name" placeholder="Название продукта"><br>
			<input type="text" name="price" placeholder="Цена"><br>
			<input type="text" name="image" placeholder="Картинка"><br>
			<input type="text" name="catalog" placeholder="site/foto/template"><br>
			<input type="submit" name="add" value="Добавить">
		</form> 
        <div class="tableProduct">
        <?php
			$sql=mysqli_query($db,"Select *from products");
			while($res=mysqli_fetch_array($sql)){?>
				<tr> 
					<td><?php echo $res['id']; ?></td>
					<td><?php echo $res['name']; ?></td>
                    <td><?php echo $res['price']; ?></td>
                    <td><?php echo $res['image']; ?></td>
                    <td><?php echo $res['catalog']; ?></td><br>
                    <?php echo '------------';?>
                    <br><br>
				</tr>
                <?php } ?>
        </div>
        <form method="POST" class="formProfile">
				<input class="profileOut" type="submit" name="out" value="На главную">
		</form>
    </div>
</body>
</html>
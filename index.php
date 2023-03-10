<?php

error_reporting(0);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
$products = get_products();
$temp=0;

if(isset($_POST['out'])){
    unset($_SESSION['login']);
    session_destroy();
    header("Location: index.php");}
if($_SESSION['login'] != ''){
    $login=$_SESSION['login'];
    $temp=1;}
if(isset($_POST['.profileLogin'])){
    unset($_SESSION['login']);
    session_destroy();
}
if(isset($_POST['.profileRegist'])){
    unset($_SESSION['login']);
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swave</title>
    <link rel="icon" href="img/cupcake.png">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body style="margin: 0px;">
    <div id="header">
        <div class="iconHeadImg"><img class="iconHeadImg" src="img/cupcake.png"></div>
        <div class=""><img src=""><img class="iconHeadText" src="img/image.png" alt=""></div>
        
        <div class="buttonHeadBlock">
            <button class="buttonHead">
                    <img src="img/basic_home.png" class="buttonHeadImg">
            </button>
        </div>
        <div class="profile" style="display: none;"><?php if ($temp==0) {  ?>
            <div class="profileName"> <p class="profileNameText">Вы не зарегестрированы</p> </div>
            <a class="profileLogin" href="reg.php">Вход</a><br>
            <a class="profileRegist" href="reg.php">Регистрация</a>
            <?php } ?>
            <?php if ($temp==1) { ?>
                
                <img class="iconProfileimg" src="img/basic_life_buoy.png">
                <h2><?php echo $login; ?></h2>
                <form method="POST" class="formProfile">
				<input class="profileOut" type="submit" name="out" value="Выйти">
		</form>
	
            
            <?php } ?>
            
            
        </div>
        <div class="backgroundWindow"></div>
       <div class="corz">
        <div class="headercorz"  >
            <h1 class="textizb">Корзина</h1>
            <div class="iconHeadImg"><img class="iconHeadImg" src="img/cupcake.png"></div>
            <div class=""><img src=""><img class="iconHeadText" src="img/image.png" alt=""></div>
        <div class="close">
            <img src="img/basic_eye_closed.png" class="closeImg">
        </div>
        
        
        <div class="modal-body">
                    <div class="name"><h1 style="margin-top: 0px;">имя товара</h1></div>
                    <div class="price"><h1 style="margin-top: 0px;">цена товара</h1></div>
                    <div class="but"><h1 style="margin-top: 0px;">Купить</h1></div>
                
        <div class="modal-footer"><?php if (!empty($_SESSION['cart'])):?>
<?php foreach($_SESSION['cart'] as $id => $item): ?>
   <?php if(isset($_POST['buy-item'])){
    $db=mysqli_connect("localhost","root","","swave");
    $number =$_POST['phone'];
    $card =$_POST['cart-buy'];
    $itembuy=$item['name'];
    if($number!='' && $card!=''){
    mysqli_query($db,"Insert into products_user values('','$number','$card','$itembuy')");
    header("Location: index.php");
    }
}?>
    <div class="backgroundWindow1"></div>
            <div class="okno">
                <div class="close1">
                    <img src="img/basic_eye_closed.png" class="closeImg">
                </div>
                <div class="windBuy">
                    <form action="" method="post">
                        <input name="name-item" disabled="disabled" type="text" style="background:#999999;"value="<?= $item['name']?> (<?= $item['qty'] ?> шт.)" 
                        oninput="this.parentElement.dataset.val = this.value">  <?= $item['price'] *  $item['qty'] ?>  RUB <br><br>
                
                        <input name="phone" type="text" required="required" style="background:#999999;" placeholder="Ваш номер телефона">

                        <p>Выбрать способ оплаты:</p>
                        <img class="qiwi" src="img/qiwi.png" alt="">
                        <img class="mir" src="img/mir.png" alt="">
                        <br><br><br>
                        <input name="cart-buy" type="text" required="required" class="cart-buy" style="background:#999999; display: none;" placeholder="Номер карты">
                        <input type="submit" value="Заказать" class="buy-item" name="buy-item" >
                    </form>
            </div>
        </div>
            <br> <br> <br>
            <div class="modal-line" style="border: 1px solid #999999;">
                <div class="image" style="border: none;">
                    <img src="<?= $item['image'] ?>" style="width: 50px; height: 50px; margin-left: 72%;">
                </div>
                <div class="name" style="border: none; margin-left: 10%;">
                    <p><?= $item['name']?></p>
                </div>
                <div class="price" style="border: none;">
                    <p style="margin-left: 5px;"><?= $item['price'] ?> RUB X <?= $item['qty'] ?> ШТУК</p>
                </div>
                <button class="btn1" style=" border-radius: 0px;">купить</button><p style="margin-left: 10px; margin-top: 6px;"><?= $item['qty'] ?>штук <br> цена: <?= $item['price'] *  $item['qty'] ?>  RUB</p>
            </div><br><br><br><br>
                    <table class="table">
                        <?php endforeach; ?>
                        <br><br><br><br><tr style="float:right;">
                            <div class="table"  aling="right" style="background: #666666; border: 1px solid #999999; padding-left: 5px; padding-top: 10px; margin-left: -2px; width: 100%; height: 50px;">
                            товаров <span id="modal-cart-qty" ><?=
                             $_SESSION['cart.qty'] ?></span> <br> Сумма: <?= $_SESSION['cart.sum'] ?> RUB
                            </div>
                            
                        </tr>
                    </table>
                <?php else: ?>
                    <h1 style="margin-top:20%; margin-left: 40%;">КОЗИНА ПУСТА...</h1>    
                <?php endif;?>

        </div>
        </div>
        
        </div>
       </div>
       <div class="izb">
        <div class="headercorz">
            <h1 class="textizb">Избранное</h1>
            <div class="iconHeadImg"><img class="iconHeadImg" src="img/cupcake.png"></div>
            <div class=""><img src=""><img class="iconHeadText" src="img/image.png" alt=""></div>
        <div class="close">
            <img src="img/basic_eye_closed.png" class="closeImg">
        </div>
                </div>
    </div>
    
    <div id="container">
        <div class="menu">

            <button id="cont" class="corzbat" style="text-align: right;">
                <div class="smart1">
                    <img src="img/basic_upload.png" class="smartf2">
                </div>
                <p class="text_menu2">Корзина</p>
            </button>

            <button id="cont" class="izbbat" style="text-align: right;">
                <div class="smart1">
                    <img src="img/basic_star1.png" class="smartf3">
                </div>
                <p class="text_menu3">Избранное</p>
            </button>
        </div>
    </div>
  
<div class="slider_bottom">
    <ul class="slider">
        <li>
            <input type="radio" id="slide1" name="slide" checked>
            <label for="slide1" onclick="document.getElementById('id1').innerHTML = 'Ноутбук-трансформер Samsung Notebook 9 Pen'"></label>
            <img src="img/notebook.jpg" alt="Panel 1">
        </li>
        <li>
            <input type="radio" id="slide2" name="slide">
            <label for="slide2" onclick="document.getElementById('id1').innerHTML = 'LG V30'"></label>
            <img src="img/smartphone.jpeg" alt="Panel 2">
        </li>
        
        <li>
            <input type="radio" id="slide3" name="slide">
            <label for="slide3" onclick="document.getElementById('id1').innerHTML = 'Bluetooth наушники'"></label>
            <img src="img/headphone.jpg" alt="Panel 3">
        </li>
        <li>
            <input type="radio" id="slide4" name="slide">
            <label for="slide4" onclick="document.getElementById('id1').innerHTML = 'PS5'"></label>
            <img src="img/PS5.jpg" alt="Panel 4">
        </li>
    </ul>

    <div class="slider_info">
        <h1>АКЦИЯ!</h1>
        <span id="id1">Ноутбук-трансформер Samsung Notebook 9 Pen</span>
    </div>
</div>

<div class="content">
    
    <div class="content_filter">
        
        <button id="content_catalog">
            <p class="text_catalog" >Каталог</p>
            <img src="img/basic_diamonds.png" class="content_catalog_img">
        </button>
        <div class="wrapper"> 
            <ul class="clear">
              <li class="button_all-i" data-filter="all" tabindex="-1"><p class="text_catalog_all" >Всё</p></li>
              <li class="button_site-i" data-filter="site" tabindex="-2"><p class="text_catalog_all" >Смартфоны</p></li>
              <li class="button_foto-i" data-filter="foto" tabindex="-3"><p class="text_catalog_all" >Ноутбуки</p></li>
              <li class="button_template-i" data-filter="template" tabindex="-4"><p class="text_catalog_all" >Наушники</p></li>
            </ul>
            
          </div>
    </div>
                

    <div class="items clear">
    <?php                   
							$dbUser = 'root';
							$dbName = 'swave';
							$dbPass = '';
							$mysqli = new mysqli('localhost', $dbUser, $dbPass, $dbName);
							$query = "set names utf8";
							$mysqli->query($query);
							$query = "select * from products";
							$results = $mysqli->query($query);
							while($row = $results->fetch_assoc()){
								echo '
                                <div class="item elem '.$row["catalog"].'" date-id="'.$row["id"].'">
                        
                                <div class="card-thumb">
                                    <img " src="'.$row["image"].'" alt="">
                                </div>
                                <div class="card-caption">
                                    <div class="card-title">
                                        <p name="name">'.$row["name"].'</p>
                                    </div>
                                    <div class="card-price text-center">
                                    <p name="price">'.$row["price"].' RUB</p>
                                    </div>
                                    <input type="submit" value="В корзину" class="add-to-cart" name="add" data-id="'.$row["id"].'">
                                    
                                </div>
                                </div>';
							}
						?> 
      
        <!--
        <div class="item elem foto" date-id="2">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/notebook.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>HONOR MagicBook</p>
                            </div>
                            <div class="card-price text-center">
                                25 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>
        
        <div class="item elem template">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/headphone.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>Bluetooth headphone</p>
                            </div>
                            <div class="card-price text-center">
                                2 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart" date-id="3">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>

        <div class="item elem site" date-id="1">
                       <div class="card-thumb">
                            <a href="product.html"><img src="img/SamsungA52.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>SamsungA52</p>
                            </div>
                            <div class="card-price text-center">
                                15 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>
        
        <div class="item elem foto" date-id="2">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/notebook.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>HONOR MagicBook</p>
                            </div>
                            <div class="card-price text-center">
                                25 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>
        
        <div class="item elem template" date-id="3">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/headphone.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>Bluetooth headphone</p>
                            </div>
                            <div class="card-price text-center">
                                2 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>

        <div class="item elem site" date-id="1">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/SamsungA52.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>SamsungA52</p>
                            </div>
                            <div class="card-price text-center">
                                15 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>
        
        <div class="item elem foto" date-id="2">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/notebook.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>HONOR MagicBook</p>
                            </div>
                            <div class="card-price text-center">
                                25 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>
        
        <div class="item elem template" date-id="3">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/headphone.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>Bluetooth headphone</p>
                            </div>
                            <div class="card-price text-center">
                                2 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>

        <div class="item elem site" date-id="1">
        <div class="card-thumb">
                            <a href="product.html"><img src="img/SamsungA52.jpg" alt=""></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title">
                                <p>SamsungA52</p>
                            </div>
                            <div class="card-price text-center">
                                15 799 руб.
                            </div>
                            <button type="button" class="btn btn-info btn-block card-addtocart">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>
                        </div>
        </div>-->
        

</div>

    <footer class="footer" style="float: bottom;">
        <p class="footerinf">© 2022–2022 Swave</p>
        <div class="vkblock"><a href="" class="vksrc"><img class="vk" src="img/vk.png" alt=""></a></div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
 
</body>
</html>
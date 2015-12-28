<?php defined('KOLIBRI') or die('Access denied');?>

<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?=TITLE?></title>
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>css/fonts.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>css/main.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>css/media.css" />

	<script src="<?=TEMPLATE?>libs/jquery/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="wrapper-mainer">
<?php //print_r($_SESSION) ?>
	<div class="top-line">
		<div class="container">
			<div class="phone-box">
				<span>+3 (068) 59 59 335</span>
				<span>+3 (050) 59 59 335</span>
				<span>+3 (093) 59 59 335</span>
				<div class="clear"></div>
			</div>
			<div class="client-panel">
				<p class="client-btn"><span>Кабинет клиента</span></p>	
				<ul class="menu-top">
					<?php if($_SESSION['auth']['level'] >= 2):?>
						<li><a href="<?=PATH?>admin">Админ панель</a></li>
					<?php endif;?>
					<?php if($_SESSION['auth']['user']):?>
						<li><a href="?do=logout">Выход</a></li>
					<?php else:?>
						<!-- Button that triggers the popup -->
						<li><a class="js-open-auth" href="#">Вход</a></li>
						<li><a href="#" class="js-open-reg">Регистрация</a></li>
					<?php endif;?>
				</ul>	
			</div>
	            <!-- Element to pop up -->
	            <div class="modal-window" id="js-auth-modal">
					<div class="modal-header">
						<h3>Войти в кабинет клиента</h3>
						<span class="btn-close b-close"></span>
					</div>
	            	<form class="modal-form clear" method="post">
	            		<div class="form-group">
							<label for="inputlogin">Логин</label>
							<input type="text" class="form-control" id="inputlogin" name="login" autofocus required>
						</div>
						<div class="form-group">
							<label for="InputPassword">Пароль</label>
							<input type="password" class="form-control" id="InputPassword" name="pass" required>
						</div>
						<div class="form-group clear">
							<a class="pull-right b-close js-open-reg" href="#">Регистрация</a>
						</div>						
						<div class="form-group clear">
							<button class="btn-default b-close">Отмена</button>
							<button type="submit" class="btn-default" name="auth">Вход</button>
						</div>
					</form>
	            </div>

	            <div class="modal-window" id="js-registration-modal">
					<div class="modal-header">
						<h3>Регистрация</h3>
						<span class="btn-close b-close"></span>
					</div>
	            	<form class="modal-form clear" method="post">
	            		<div class="form-group">
							<label for="inputlogin">Логин</label>
							<input type="text" class="form-control" id="inputlogin" name="login" value="<?=$_SESSION['reg']['login']?>" autofocus required>
						</div>
						<div class="form-group">
							<label for="InputPassword">Пароль</label>
							<input type="password" class="form-control" id="InputPassword" name="pass" required>
						</div>		            	
	            		<div class="form-group">
							<label for="inputname">ФИО</label>
							<input type="text" class="form-control" id="inputname" name="name" value="<?=$_SESSION['reg']['name']?>" required>
						</div>	  
	            		<div class="form-group">
							<label for="inputmail">E-mail</label>
							<input type="text" class="form-control" id="inputmail" name="email" value="<?=$_SESSION['reg']['email']?>" required>
						</div>
	            		<div class="form-group">
							<label for="js-inputphone">Телефон</label>
							<input type="text" class="form-control" id="js-inputphone" name="phone" value="<?=$_SESSION['reg']['phone']?>" required>
						</div>				
						<div class="form-group">
							<label for="js-inputaddress">Адрес (город)</label>
							<input type="text" class="form-control" id="js-inputpaddress" name="address" value="<?=$_SESSION['reg']['address']?>" required>
						</div>					                  					
						<div class="form-group clear">
							<button class="btn-default b-close">Отмена</button>
							<button type="submit" class="btn-default" name="reg">Регистрация</button>
						</div>
					</form>
	            </div>
		</div>
	</div>
	<div class="container content-wrapper">
		<header class="row">
			<a href="<?=PATH?>" class="col-md-2 logo">
				<img src="<?=TEMPLATE?>img/Kolibri-logo.png" height="105" alt="колибри">
			</a>
			<div class="functional col-md-offset-2 col-xs-8 ">
				<form action="" class="col-md-4 col-md-offset-3 search-form">
					<div class="search-wrap">
						<input type="text" class="search" placeholder="Поиск...">
					</div>
					<input type="submit" class="go-search" name="" value="">
				</form>
				<div class="basket-wrap col-md-5">
					<a href="?view=cart">
						<b>Корзина:</b>
						<span class="info-but"></span>
						<span class="cart-sum">
						<?php if($_SESSION['cart']):?>
							<span class="cart-item-count"><?=$_SESSION['total_quantity']?></span>
							 товар(ов) - 
							<span class="cart-item-price"><?=$_SESSION['total_sum']?> </span>грн.
						<?else:?>
							<span class="cart-item-count">Ваша корзина пуста</span>
						<?endif;?>	
						</span>
					</a>
				</div>
			</div>
		</header>
		<div class="row">
			<ul class="menu-cat">
				<li><a href="<?=PATH?>">Главная</a></li>
				<li><a href="?view=cart">Корзина</a></li>
				<li><a href="#">О нас</a></li>
				<li><a href="?view=supplierprice">Прайс лист</a></li>
			</ul>
		</div>	
		<div class="row">
			<div class="caroosel">
				<img src="<?=TEMPLATE?>img/2015-04-08_134549.jpg" width="1110" alt="">
			</div>
		</div>	
<div class="row">
	<div class="new">
		<p class="newsale"><?php 
		if(!$current_cat['name']){
			echo 'Новинки';
		}
		else echo $current_cat['name'];?></p>
	</div>
</div>
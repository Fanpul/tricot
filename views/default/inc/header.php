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
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>css/fonts.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>css/main.css" />
	<link rel="stylesheet" href="<?=TEMPLATE?>css/media.css" />
</head>
<body>
<div class="wrapper-mainer">
	<div class="top-line">
		<div class="container">
			<div class="client-panel">
				<p class="client-btn"><span>Кабинет клиента</span></p>	
				<ul class="menu-top">
					<!-- Button that triggers the popup -->
					<li><a id="js-open-auth" href="#">Вход</a></li>
					<li><a href="#" class="js-open-reg">Регистрация</a></li>
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
							<input type="text" class="form-control" id="inputlogin" required>
						</div>
						<div class="form-group">
							<label for="InputPassword">Пароль</label>
							<input type="password" class="form-control" id="InputPassword" required>
						</div>
						<div class="form-group clear">
							<a class="pull-right b-close js-open-reg" href="#">Регистрация</a>
						</div>						
						<div class="form-group clear">
							<button class="btn-default b-close">Отмена</button>
							<button type="submit" class="btn-default" name="">Вход</button>
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
							<input type="text" class="form-control" id="inputlogin" autofocus>
						</div>
						<div class="form-group">
							<label for="InputPassword">Пароль</label>
							<input type="password" class="form-control" id="InputPassword">
						</div>		            	
	            		<div class="form-group">
							<label for="inputname">ФИО</label>
							<input type="text" class="form-control" id="inputname">
						</div>	  
	            		<div class="form-group">
							<label for="inputmail">E-mail</label>
							<input type="text" class="form-control" id="inputmail">
						</div>
	            		<div class="form-group">
							<label for="js-inputphone">Телефон</label>
							<input type="text" class="form-control" id="js-inputphone">
						</div>							                  					
						<div class="form-group clear">
							<button class="btn-default b-close">Отмена</button>
							<button type="submit" class="btn-default" name="">Регистрация</button>
						</div>
					</form>
	            </div>
		</div>
	</div>
	<div class="container content-wrapper">
		<header class="row">
			<a href="#" class="col-md-2 logo">КОЛИБРИ</a>
			<div class="functional col-md-offset-2 col-xs-8 ">
				<menu class="col-xs-12">
					<li><a href="#">Главная </a></li>
					<li><a href="#">Обратная связь</a></li>
					<li><a href="#">Отзывы</a></li>
					<li><a href="#">О нас</a></li>
					<li><a href="#">Корзина</a></li>
				</menu>
				<form action="" class="col-md-4 col-md-offset-3 search-form">
					<div class="search-wrap">
						<input type="text" class="search" placeholder="Поиск...">
					</div>
					<input type="submit" class="go-search" name="" value="">
				</form>
				<div class="basket-wrap col-md-5">
					<a href="#">
						<b>Корзина:</b>
						<span class="info-but"></span>
						<span class="cart-sum">
							<span class="cart-item-count">1</span>
							 товар(ов) - 
							<span class="cart-item-price">100грн.</span>
						</span>
					</a>
				</div>
			</div>
		</header>
		<div class="row">
			<ul class="menu-cat">
				<li><a href="?view=new">Новинки</a></li>
			    <?php if($category_list):
			    	foreach ($category_list as $value):
			    ?>    
			      <li><a href="?view=cat&category=<?=$value['id']?>"><?=$value['name']?></a></li>  
			    <?php endforeach;?>               
			    <?php endif;?> 
			</ul>
		</div>	
		<div class="row">
			<div class="caroosel">
				<img src="<?=TEMPLATE?>img/618x230.jpg" alt="">
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
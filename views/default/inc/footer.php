<?php defined('KOLIBRI') or die('Access denied');?>


	</div> <!--container content-wrapper-->
</div> <!--container wrapper-mainer-->
<footer class="site-footer">


	<div class="footer-info">
		<div class="container">
			<div class="footer-block footer-block-first pull-left">
				<h2>Контакты</h2>
				<ul>
					<li>время работы: Пн-Сб: 10.00-18.00</li>
					<li><i class="fa fa-envelope-o"></i> shop@kolibri.cn.ua</li>
					<li><i class="fa fa-map-marker faa"></i> Чернигов, пр. Победы, 100</li>
				</ul>
				<span><i class="fa fa-mobile faa"></i> +3 (068) 59 59 335</span>
				<span><i class="fa fa-mobile faa"></i> +3 (068) 59 59 335</span>
				<span><i class="fa fa-mobile faa"></i> +3 (068) 59 59 335</span>
			</div>
			<div class="footer-block footer-block-last pull-right">
				<h2>Кабинет клиента</h2>
				<ul>
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
			<div class="footer-block pull-right">
				<h2>Карта сайта</h2>
				<ul>
					<li><a href="/">Главная</a></li>
					<li><a href="?view=cart">Корзина</a></li>
					<li><a href="?view=supplierprice">Прайс лист</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="footer-copy"><div class="container"><p>Интернет-магазин "Колибри" &copy; 2015-<?=date('Y')?> г.</p></div></div>
</footer>

<div class="call-me js-open-call-me" ></div>	
<!-- Element to pop up -->
<div class="modal-window" id="js-callme-modal">
	<div class="modal-header">
		<h3>Оставьте ваши контакты и мы вам перезвоним</h3>
		<span class="btn-close b-close"></span>
	</div>
	<form class="modal-form clear" id="js-call-me-submit">
		<div class="form-group">
			<label for="inputlogin">Имя*</label>
			<input type="text" class="form-control" id="inputlogin" name="name" autofocus required>
		</div>
		<div class="form-group">
			<label for="js-callme-phone">Телефон*</label>
			<input type="text" class="form-control" id="js-callme-phone" name="phone" required>
		</div>					
		<div class="form-group clear">
			<button class="btn-default b-close">Отмена</button>
			<button class="btn-default">Отправить</button>
		</div>
	</form>
</div>
<div class="message-container <?php if($msg) echo on?>">
		<!--message-->
	<div class="message">
		<?=$msg?>
	</div>
</div>

	<!--[if lt IE 9]>
	<script src="<?=TEMPLATE?>libs/html5shiv/es5-shim.min.js"></script>
	<script src="<?=TEMPLATE?>libs/html5shiv/html5shiv.min.js"></script>
	<script src="<?=TEMPLATE?>libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="<?=TEMPLATE?>libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="<?=TEMPLATE?>libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="<?=TEMPLATE?>libs/jquery.maskedinput-master/jquery.maskedinput.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="<?=TEMPLATE?>libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="<?=TEMPLATE?>libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="<?=TEMPLATE?>libs/waypoints/waypoints-1.6.2.min.js"></script>
	<script src="<?=TEMPLATE?>libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="<?=TEMPLATE?>libs/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?=TEMPLATE?>libs/countdown/jquery.plugin.js"></script>
	<script src="<?=TEMPLATE?>libs/countdown/jquery.countdown.min.js"></script>
	<script src="<?=TEMPLATE?>libs/countdown/jquery.countdown-ru.js"></script>
	<script src="<?=TEMPLATE?>libs/landing-nav/navigation.js"></script>
	<script src="<?=TEMPLATE?>js/jquery.bpopup.min.js"></script>
	<script src="<?=TEMPLATE?>js/init.js"></script>
	<script src="<?=TEMPLATE?>js/common.js"></script>
	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>

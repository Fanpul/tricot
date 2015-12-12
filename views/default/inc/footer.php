<?php defined('KOLIBRI') or die('Access denied');?>


	</div> <!--container content-wrapper-->
</div> <!--container wrapper-mainer-->
<footer class="site-footer">
	
	

	<div class="footer-info"><div class="container"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis magnam deserunt doloremque consectetur beatae ad, totam similique repellendus maxime cum! Ex vero, accusantium fuga nostrum quas, maiores enim quibusdam qui. Voluptatibus, assumenda doloremque nesciunt nulla sint, suscipit autem illo harum, maiores nemo dolorem enim ipsam voluptates qui architecto iste neque.</p></div></div>
	<div class="footer-copy"><div class="container"><p>Интернет-магазин "Колибри" &copy; 2015-2016 г.</p></div></div>
</footer>

<div class="call-me js-open-call-me" onclick="javascript: void(0);"></div>	
<!-- Element to pop up -->
<div class="modal-window" id="js-callme-modal">
	<div class="modal-header">
		<h3>Оставьте ваши контакты и мы вам перезвоним</h3>
		<span class="btn-close b-close"></span>
	</div>
	<form class="modal-form clear" method="post">
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
			<button type="submit" class="btn-default" name="callme">Отправить</button>
		</div>
	</form>
</div>
	<!--[if lt IE 9]>
	<script src="<?=TEMPLATE?>libs/html5shiv/es5-shim.min.js"></script>
	<script src="<?=TEMPLATE?>libs/html5shiv/html5shiv.min.js"></script>
	<script src="<?=TEMPLATE?>libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="<?=TEMPLATE?>libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="<?=TEMPLATE?>libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="<?=TEMPLATE?>libs/jquery.maskedinput-master/jquery.maskedinput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
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
	<script src="<?=TEMPLATE?>js/common.js"></script>
	<script src="<?=TEMPLATE?>js/init.js"></script>
	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>

<?php defined('KOLIBRI') or die('Access denied');?>

<div class="col-md-12 product-info">
	<a class="product-img-link col-md-4" href="#">
		<img id="img-zoom" src="<?=PRODUCTIMG?><?=$product['img']?>" alt="" data-zoom-image="<?=PRODUCTIMG?><?=$product['img']?>" >
	</a>
	<div class="description col-md-8">
		<h1 class="item-name"><?=$product['name']?></h1>
		<div class="description-item-box">
			<h2 class="description-item-text"><?=$product['description']?></h2>
			<div class="presence-box">
				<span class="presence-item">Артикул:</span> 
				<span><?=$product['articul']?></span><br>
				<span class="presence-item">Наличие:</span> 
				<span>Есть на складе</span><br>
				<span class="presence-item">Цвет:</span> 
				<span>Уточнять цвет при заказе.</span>
			</div>
			<div class="price-item-box">
				<span>Цена:</span>
				<span><?=$product['price']?></span>
				<span>грн.</span>
			</div>
			<div class="payment">
				<!-- <label for="count-item">Количество</label><input type="text" value="1" id="count-item"> -->
				<a class="buy-item-but" href="<?=PATH?>?view=addtocart&amp;id=<?=$product['id']?>">В корзину</a>
			</div>
		</div>
	</div>

	<div class="reviews-box row col-md-12">
		<?php if($_SESSION['auth']['user_id']):?>
			<form method="post">
				<textarea class="reviews-area" name="reviews" cols="30" rows="10"></textarea>
				<input type="submit" value="Отправить" name="send">
				<input type="reset">
			</form>
		<?php else:?>
			<div class="col-md-12 nocomment-text">
				<a href="#" id="js-reg-pls" class="js-open-reg">Зарегистрируйтесь</a>, чтобы оставить комментарий.
			</div>
		<?php endif;?>
		<?php foreach ($comment as $value):?>
			<div class="rewiew-user-box col-md-12">
				<div class="comment-user row">
					<img src="<?=PATH?><?=TEMPLATE?>img/comment.png" alt="" class="avatar col-md-2">
					<div class="info-and-comment col-md-8 col-md-offset-1">
						<span class="name">
							<?php $user = getUserNameById($link, $value['userid']);?>
							<?=$user['name']?>
						</span>
						<span class="date"><?=formatDate($value['cdate'])?></span>
						<div class="comment-field"><?=$value['text']?></div>
					</div>
				</div>
			</div>
		<?php endforeach;?>	

	</div>
</div>

	<script src="<?=PATH?><?=TEMPLATE?>js/jquery.elevateZoom-3.0.8.min.js"></script>
	<script>
		$('#img-zoom').elevateZoom({
			tint:true,
			tintColour:'#F90',
			easing : true,
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 350
		});
	</script>
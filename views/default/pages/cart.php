<?php defined('KOLIBRI') or die('Access denied');?>

<div class="basket-box row col-xs-12">
	<h1 class="header-basket">Корзина</h1>
<?php if($_SESSION['cart']):?>	
	<div class="basket-body">
		<table class="cart-table col-md-12">
			<thead>
				<tr>
					<td>Изображение</td>
					<td>Наименование</td>
					<td>Кол-во</td>
					<td>Цена</td>
					<td>Сумма</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($_SESSION['cart'] as $key => $item):
				?>
					<tr>
						<td class="img"><a href="/product/<?=$key?>/">
							<img src="<?=PRODUCTIMG?><?=$item['img']?>" alt="<?=$item['name']?>" height="70"></a>
						</td>
						<td class="model"><a href="/product/<?=$key?>/"><?=$item['name']?></a></td>
						<td class="quantity">
							<input class="js-qty" id="id<?=$key?>" type="number" value="<?=$item['qty']?>" >
							<a href="<?=PATH?>?view=cart&delete=<?=$key?>"><img src="<?=PATH?><?=TEMPLATE?>img/gnome-fs-trash-full.png" alt="удалить"></a>
						</td>
						<td class="price-item">
							<span><?=$item['price']?></span> грн.</td>
						<td class="total-price">
							<span><?=$item['qty']*$item['price']?> грн.</span> 
						</td>
					</tr>
				<?php endforeach; ?>				
			</tbody>
		</table>
		<div class="total-price-ticket">
			<span>Итого: </span>
			<span class="out-price"><?=$_SESSION['total_sum'];?> грн.</span> 
		</div>
		<div class="clear"></div>

<?php if(!$_SESSION['auth']['user']):?>
		<form action="" method="post" class="row form-basket">
			<h2 class="info-basket col-sm-offset-4 col-sm-4">Заполните данные</h2>
			<div class="basket-contact col-sm-8 col-sm-offset-2 row">
				<div class="box-cont col-sm-12">
					<i class="fa fa-user fa-3x"></i>
					<input class="cont-fio" type="text" placeholder="Ф. И. О." name="name" required>
				</div>
				<div class="box-cont col-sm-12">
					<i class="fa fa-phone fa-3x"></i>
					<input id="js-order-phone" class="cont-phone" type="text" placeholder="Телефон" name="phone" required>
				</div>
				<div class="box-cont col-sm-12">
					<i class="fa fa-envelope-o fa-3x"></i>
					<input class="cont-mail" type="email " placeholder="E-mail" name="email">
				</div>
				<div class="box-cont col-sm-12">
					<i class="fa fa-home fa-3x"></i>
					<input class="cont-city" type="text" placeholder="Город" name="address" required>
				</div>
			</div>	
			<div class="row box-button-trade text-center">
					<a class="do-order pull-left" href="#">Продолжить покупки</a>
					<input class="do-order pull-right" type="submit" value="Заказать" name="buy">
				</div>
			</form>
		<?php else:?>
			<form method="post" class="row form-basket">
				<div class="row box-button-trade text-center">
					<a class="do-order pull-left" href="#">Продолжить покупки</a>
					<input class="do-order pull-right" name="buy" type="submit" value="Заказать">
				</div>
			</form>
	<?php endif;?>
	</div>
<?php else:?>
	
	<?php
		if ($info):?>
			<h2 class="text-center"><?=$_SESSION['order']['res']?></h2>
		<?php else: ?>
			<h2 class="text-center">Ваша корзина пуста.</h2>
		<?php endif;?>
<?php endif;?>	
</div>

<script>
		// Пересчет кол-ва товаров в корзине
	$('.js-qty').each(function(){
	var qty_start = $(this).val();

		$(this).change(function(){
			var qty = $(this).val();
			var id = $(this).attr('id');
			id = id.substr(2);
			if(!parseInt(qty)){
				qty = qty_start;
			}
			window.location = '<?=PATH?>?view=cart&qty=' + qty + '&id=' + id;
		});
	});

	$('.js-qty').keypress(function(e){
		if(e.which == 13){
			return false;
		}
	});
</script>
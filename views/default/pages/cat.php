<?php defined('KOLIBRI') or die('Access denied');?>

<?php if($products):
	foreach ($products as $value):
?>

<div class="product">
	<?php if ($value['new']):?>
		<div class="eyestop"></div>
	<?php endif;?>
	<div class="product-pic">
		<a href="?view=product&productid=<?=$value['id']?>">
			<img src="<?=PRODUCTIMG?><?=$value['img']?>" alt="<?=$value['name']?>">
		</a>
	</div>
	<div class="product-name">
		<a href="?view=product&productid=<?=$value['id']?>"><?=$value['name']?></a>
	</div>
	<div class="product-price">
		<div class="price"><span><?=$value['price']?>&nbsp;грн</span></div>
		<div class="tocart">
			<a class="tocart-btn" href="?view=addtocart&productid=<?=$value['id']?>">В корзину</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php endforeach;?>
<div class="clear"></div>
<div class="block-pagination">
	<?php if($pages_count > 1) pagination($page, $pages_count)?>
</div>
	<?php else:?>
		<p>Товаров пока нет!</p>                 
<?php endif;?>  
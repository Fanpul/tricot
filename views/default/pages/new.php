<?php defined('KOLIBRI') or die('Access denied');?>

<?php if($eyestopper):
	foreach ($eyestopper as $value):
?>

<div class="product">
	<?php if ($value['new']):?>
		<div class="eyestop"></div>
	<?php endif;?>
	<a href="/product/<?=$value['id']?>/">
		<div class="product-pic">
			<img src="<?=PRODUCTIMG?><?=$value['img']?>" alt="<?=$value['name']?>">
		</div>
	</a>
	<div class="product-name-wrapper">
		<div class="product-name">
			<a href="/product/<?=$value['id']?>/"><?=$value['name']?></a>
		</div>
	</div>

	<div class="product-price">
		<div class="price"><span><?=$value['price']?>&nbsp;грн</span></div>
		<div class="tocart">
			<a class="tocart-btn" href="<?=PATH?>?view=addtocart&id=<?=$value['id']?>">В корзину</a>
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
<?php defined('KOLIBRI') or die('Access denied');?>

<aside class="col-md-3">
	<ul class="list-category">
		<li><a href="?view=new">Новинки</a></li>
	    <?php if($category_list):
	    	foreach ($category_list as $value):
	    ?>    
	      <li><a href="?view=cat&category=<?=$value['id']?>"><?=$value['name']?></a></li>  
	    <?php endforeach;?>               
	    <?php endif;?> 
	</ul>
	<div class="choose-price">
		<p>
		  	<label class="filter-price" for="amount">Цена:</label>
		  	<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
		</p>
		<div class="slider-price" id="slider-range"></div>
		<div class="pick-size-box">
			<p class="choose-size">Выбрать размер</p>
			<ul class="pick-size-list">
				<li>
					<input id="s" type="radio" name="size">
					<label for="s">S</label>
				</li>
				<li>
					<input id="xl" type="radio" name="size">
					<label for="xl">XL</label>
				</li>
				<li>
					<input id="xxl" type="radio" name="size">
					<label for="xxl">XXL</label>
				</li>
			</ul>
			<input class="size-but" type="submit" value="Искать">
		</div>
	</div>
</aside>
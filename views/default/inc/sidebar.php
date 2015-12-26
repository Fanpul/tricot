<?php defined('KOLIBRI') or die('Access denied');?>

<aside class="col-md-3">
	<ul class="list-category">
		<li><a href="?view=new">Новинки</a></li>
	    <?php if($category_list):
	    	foreach ($category_list as $value):
	    ?>    
	      <li class="menu-but"><a href="?view=cat&category=<?=$value['id']?>"><?=$value['name']?></a>
			<?php 
				$subcat = category($link,$value['id']);
				if ($subcat):
			?>
				<ul class="submenu">
					<?php foreach ($subcat as $key):?>
						<li><a class="sub-menu-a" href="?view=subcat&category=<?=$key['id']?>"><?=$key['name']?></a></li>
					<?php endforeach;?>
				</ul>
			<?php endif;?>	
	      </li>  
	    <?php endforeach;?>               
	    <?php endif;?> 
	</ul>
</aside>
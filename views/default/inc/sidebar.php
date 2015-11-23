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
</aside>
<?php defined('KOLIBRI') or die('Access denied');?>

<?php if($func):?>
	<?php foreach ($func as $value):?>
		<div class="download">
			<span><a href="<?=PATH?>save.php?filename=<?=$value['name']?>"><?=$value['name']?> <i class="fa fa-download"></i></a></span>
		</div>
	<?php endforeach;?>
<?php else:?>	
	<div class="download">
		Файлы отсутствуют.
	</div>
<?php endif;?>	

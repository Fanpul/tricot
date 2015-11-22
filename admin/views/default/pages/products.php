<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Продукты
    <small>Optional description</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Your Page Content Here -->
<div class="box">
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Подкатегория</th>
            <th>Категория</th>
            <th>Артикул</th>
            <th>Новинка</th>
            <th>Видимость</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
			<?php foreach ($func as $value): 
				if ($value['new'] == 1) {
                    $value['new'] = '<i class="fa fa-check" style="color: green;"></i>';
				} else { 
					$value['new'] = '';
				}

				if ($value['visible'] == 1) {
                    $value['visible'] = '<i class="fa fa-eye" style="color: green;"></i>';
				} else { 
                    $value['visible'] = '<i class="fa fa-eye-slash" style="color: red;"></i>';
				}
			?>	
				<tr>
					<td>
						<?php 
							static $i = 0;
							$i++;
							echo $i;
						?>
					</td>
					<td><a href="?view=products&amp;action=edit&amp;id=<?=$value['id']?>"><?=$value['name']?></a></td>
					<td><?=$value['description']?></td>
					<td><?=$value['price']?></td>
					<td><?php 
						$cat = getCategoryById($link, $value['categoryid']);
						$pid = $cat['parentid'];
						echo $cat['name'];?>
					</td>
					<td><?php 
						$pcat = getParentCategoryById($link, $pid);
						echo $pcat['name'];?>
					</td>
					<td><?=$value['articul']?></td>
					<td><?=$value['new']?></td>
					<td><?=$value['visible']?></td>
					<td>
						<a href="#" data-toggle="modal" data-target=".mod<?=$value['id']?>"><i class="fa fa-trash faa"></i></a>
						<div class="modal mod<?=$value['id']?>">
							<div class="modal-dialog modal-sm modal-content">
								<h4 class="modal-title text-center">"<?=$value['name']?>"</h4>
								<form action="" method="post" class="text-center">
									<input type="hidden" name="productid" value="<?=$value['id']?>">
									<button type="button" class="btn btn-default" data-dismiss="modal">Отмена <i class="fa fa-reply"></i></button>
			    					<button type="submit" class="btn btn-danger" name="delete">Удалить <i class="fa fa-times"></i></button> 
								</form>
								
		    				</div>
		    			</div>
					</td>
				</tr>	
			<?php endforeach;?>
        </tbody>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</section><!-- /.content -->
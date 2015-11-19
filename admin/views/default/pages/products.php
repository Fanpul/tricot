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
            <th>Категория</th>
            <th>Подкатегория</th>
            <th>Артикул</th>
            <th>Новинка</th>
            <th>Видимость</th>
            <th>Удалить</th>
          </tr>
        </thead>

        <tbody>
			<?php foreach ($func as $value): ?>
				<tr>
					<td>
						<?php 
							static $i = 0;
							$i++;
							echo $i;
						?>
					</td>
					<td><?=$value['name']?></td>
					<td><?=$value['description']?></td>
					<td><?=$value['price']?></td>
					<td><?=$value['categoryid']?></td>
					<td><?=$value['subcategoryid']?></td>
					<td><?=$value['articul']?></td>
					<td><?=$value['new']?></td>
					<td><?=$value['visible']?></td>
					<td><a href="#">x</a></td>
				</tr>	
			<?php endforeach;?>
        </tbody>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</section><!-- /.content -->
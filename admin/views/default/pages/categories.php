<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Все категории
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
			<div class="box-group" id="accordion">
				<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
				<?php foreach ($category as $value):?>
					<div class="panel box box-primary">
						<div class="box-header with-border">
							<h4 class="box-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$value['id']?>">
									<?=$value['name']?>
								</a>
							</h4>
						</div>
						<div id="collapse<?=$value['id']?>" class="panel-collapse collapse">
							<div class="box-body">
								<table id="example3" class="table table-bordered table-hover">
							        <thead>
							        	<tr>
							        		<th>#</th>
							        		<th>Подкатегория</th>
							        		<th>Удалить</th>
							        	</tr>
							        </thead>
							        <tbody>
							        <?php 
							        	$i = 0;
							        	$subcat = getCategoryAllByParentId($link, $value['id']); 
							        	foreach ($subcat as $value):
							        ?>
					                	<tr>
							        		<th>
												<?php 
													$i++;
													echo $i;
												?>
							        		</th>
							        		<th><a href="?view=categories&amp;action=edit&amp;id=<?=$value['id']?>"><?=$value['name']?></a></th>
							        		<th><a href="?view=categories&amp;action=delete&amp;id=<?=$value['id']?>">х</a></th>
							        	</tr>
									<?php endforeach;?>
						            </tbody>
								</table>
							</div>
						</div>
					</div>
				<?php endforeach;?>

			</div>
		</div><!-- /.box-body -->
	</div>
</section><!-- /.content -->
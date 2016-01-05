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
							<h4 class="box-title block-view">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$value['id']?>">
									<?=$value['name']?>
								</a>
								<a class="js-open-block-edit" href="#"><i class="fa fa-pencil-square-o"></i></a>
                                <div class="block-edit js-block-edit">
                                    <form method="post">
                                        <input type="text" name="categoryname" value="<?=$value['name']?>">
                                        <input type="hidden" name="categoryid" value="<?=$value['id']?>">
                                        <button class="success" type="submit" name="ok"><i class="fa fa-check-circle"></i></button>
                                    </form>
                                    <button class="cancel js-close-block-edit" type="button" ><i class="fa fa-ban"></i></button>
                                </div>
							</h4>
							<div class="pull-right">
								<a href="?view=categories&amp;action=delete&amp;id=<?=$value['id']?>" onclick="return confirm('Вы подтверждаете удаление?');"><i class="fa fa-trash faa"></i></a>
							</div>
							<div class="clear"></div>
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
							        		<th class="block-view">
                                                <a href="?view=categories&amp;action=edit&amp;id=<?=$value['id']?>"><?=$value['name']?></a>
                                                <a class="js-open-block-edit" href="#"><i class="fa fa-pencil-square-o"></i></a>
                                                <div class="block-edit js-block-edit">
                                                    <form method="post">
                                                        <input type="text" name="categoryname" value="<?=$value['name']?>">
                                                        <input type="hidden" name="categoryid" value="<?=$value['id']?>">
                                                        <button class="success" type="submit" name="ok"><i class="fa fa-check-circle"></i></button>
                                                    </form>
                                                    <button class="cancel js-close-block-edit" type="button" ><i class="fa fa-ban"></i></button>
                                                </div>
                                            </th>
							        		<th><a href="?view=categories&amp;action=delete&amp;id=<?=$value['id']?>" onclick="return confirm('Вы подтверждаете удаление?');"><i class="fa fa-trash faa"></i></a></th>
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
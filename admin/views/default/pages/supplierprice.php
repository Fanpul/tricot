<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Прайс лист
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
    <div class="box box-success">
        <div class="box-body">
            <table class="table table-bordered table-hover example2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Название файла</th>
                        <th>Дата</th>
                        <!-- <th>Видимость</th> -->
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($func as $value): 
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
                            <td><?=$value['name']?></td>
                            <td><?=formatDate($value['cdate'])?></td>
                           <!--  <td><?=$value['visible']?></td> -->
                            <td class="text-center">
                                <a href="<?=MAINPATH?>save.php?filename=<?=$value['name']?>"><i class="fa fa-download faa"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="?view=supplierprice&amp;action=delete&amp;id=<?=$value['id']?>" onclick="return confirm('Вы подтверждаете удаление?');"><i class="fa fa-trash faa"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div><!-- /.box-body -->

    </div>
    <div class="box box-info" style="padding: 20px;">
        <form method="post" enctype="multipart/form-data">
            <div class="pull-left">
            <span class="text-aqua">Добавить прайс лист</span>
                <input type="file" id="InputFile" name="file">
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-success" name="ok">Сохранить</button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</section><!-- /.content -->
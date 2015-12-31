<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Контакты
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
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-bordered table-hover example2">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>E-mail</th>
                    <th>Телефон</th>
                    <th>Адрес</th>
                    <th>Логин</th>
                    <th></th>
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
                        <td><?=$value['email']?></td>
                        <td><?=$value['phone']?></td>
                        <td><?=$value['address']?></td>
                        <td><?=$value['login']?></td>
                        <td>
                            <a href="?view=user&amp;action=delete&amp;id=<?=$value['id']?>" onclick="return confirm('Вы подтверждаете удаление?');"><i class="fa fa-trash faa"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>    
                </tbody>
            </table>
        </div>

    </div>
</section><!-- /.content -->
<?php defined('KOLIBRI') or die('Access denied');?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Заказы
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
    <div class="box box-info">
        <div class="box-body">
            <table id="js-order" class="table table-bordered table-hover example2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Номер заказа</th>
                        <th>Имя заказчика</th>
                        <th>Дата заказа</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($func as $value): 
                        if ($value['status'] == 0) {
                            $value['status'] = '<span style="color: red;">Новый заказ</span>';
                        } else { 
                            $value['status'] = '<span style="color: #00D200;">Заказ обработан</span>';
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
                        <td>
                            <a href="?view=order&amp;action=view&amp;orderid=<?=$value['id']?>">Заказ #<?=$value['id']?></a>
                        </td>
                        <td class="client-name">
                            <?php 
                                $user = getUserNameById($link, $value['userid']);
                                echo $user['name'];
                            ?>
                            <a class="icon-client-view" href="?view=user&amp;id=<?=$value['userid']?>"><i class="fa fa-user"></i></a>
                        </td> 
                        <td><?=formatDate($value['cdate']);?></td>
                        <td><?=$value['status']?></td>
                        <td>
                            <a href="?view=order&amp;action=delete&amp;orderid=<?=$value['id']?>" onclick="return confirm('Вы подтверждаете удаление?');"><i class="fa fa-trash faa"></i></a>
                        </td>
                    </tr>   
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section><!-- /.content -->

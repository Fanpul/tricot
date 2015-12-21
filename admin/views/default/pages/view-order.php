<?php defined('KOLIBRI') or die('Access denied');?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Заказ #<?=$id?>
        <small>
            <?php $status = $orderInfo['status'];
                if ($orderInfo['status'] == 0) {
                    $orderInfo['status'] = '<span style="color: red;">Новый заказ</span>';
                } else { 
                    $orderInfo['status'] = '<span style="color: #00D200;">Заказ обработан</span>';
                }
                echo $orderInfo['status']
            ?>

        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content content-margin">

    <!-- Your Page Content Here -->
    <div class="box box-success">
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Изображение</td>
                        <td>Наименование</td>
                        <td>Артикул</td>
                        <td>Количество</td>
                        <td>Цена</td>
                        <td>Сумма</td>
                    </tr>
                </thead>
                <?php foreach ($order as $key => $value):
                    $product = getProductById($link, $value['productid']);
                ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php 
                                    static $i = 0;
                                    $i++;
                                    echo $i;
                                ?>
                            </td>
                            <td>
                                <img src="<?=PRODUCTIMG?><?=$product['img']?>" alt="<?=$product['name']?>" height="100"></a>
                            </td>
                            <td class="vertical-align-middle"><?=$product['name']?></td>
                            <td class="vertical-align-middle"><?=$product['articul']?></td>
                            <td class="vertical-align-middle"><?=$value['quantity']?></td>
                            <td class="vertical-align-middle"><?=$product['price']?> грн.</td>
                            <td class="vertical-align-middle"><?php echo $product['price']*$value['quantity']?> грн.</td>
                        </tr>
                    </tbody>
                <?php endforeach;?>

            </table>
        </div>
        <div class="in-total"><p class="total">Итого: </p><span class="decimal-success"><?=$orderInfo['totalsum']?></span> грн.</div>
        <div class="about-client">
            <div>
                <p class="total">ФИО: </p>
                <span class="client-info">
                    <?php 
                        $userInfo = getUserById($link, $clientId['userid']);
                        echo $userInfo['name'];
                    ?>
                </span> 
            </div>
            <div>
                <p class="total">Телефон: </p>
                <span class="client-info">
                    <?=$userInfo['phone'];?>
                </span> 
            </div>
            <div>
                <p class="total">E-mail: </p>
                <span class="client-info">
                    <?=$userInfo['email'];?>
                </span> 
            </div>
            <div>
                <p class="total">Адрес: </p>
                <span class="client-info">
                    <?=$userInfo['address'];?>
                </span> 
            </div>
        </div>
    </div>
</section><!-- /.content -->

<div class="fixed-buttons-wrapper">
    <div class="fixed-buttons" <?php if($status) echo 'style= "width: 120px;"'?> >
        <?php if (!$status):?>
            <div class="button-wrapper">
                <form method="post">
                    <input type="hidden" value="<?=$id?>" name="status">
                    <button type="submit" class="btn btn-block btn-success btn-sm" name="status-ok">Заказ обработан</button>
                </form>
            </div>
        <?php endif;?>
        <div class="button-wrapper">
        <form method="post">
            <input type="hidden" value="<?=$id?>" name="delete">
            <button type="submit" onclick="return confirmDelete();" class="btn btn-block btn-danger btn-sm" name="del">Удалить</button>
        </form>
        </div>
    </div>      
</div>
<?php if($msg):?>
    <script>
        setTimeout( 'location="<?=PATH?>?view=order";', 0 );
    </script>
<?php endif;?>

<script>
    function confirmDelete() {
        if (confirm("Вы подтверждаете удаление?")) {
            return true;
        } else {
            return false;
        }
    }
</script>
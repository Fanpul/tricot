<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Добавить продукт
    <small>Optional description</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="alert alert-success alert-dismissable a-block <?=$msg?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" name='close'>&times;</button>
    <h4>  <i class="icon fa fa-check"></i> Добавлено</h4>
    Успешно создан новый продукт
  </div>
  <!-- Your Page Content Here -->
        <div class="col-md-6 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Новый продукт</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" class="form-horizontal" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Название</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" name="name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputDesc3" class="col-sm-3 control-label">Описание</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" name="description"></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputDesc3" class="col-sm-3 control-label">Категория</label>
                    <div class="col-sm-9">
                       <select class="form-control select2" name="category" required>
                        <option selected="selected">---</option>
                        <?php foreach ($parent as $key => $value):?>
                          <optgroup label="<?=$value['name']?>">
                            <?php foreach (getCategoryAllByParentId($link, $parentid=$value['id'] ) as $key => $value):?>
                              <option value="<?=$value['id']?>"><?=$value['name']?></option>
                            <?php endforeach;?>
                          </optgroup>
                        <?php endforeach;?>
                      </select> 
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputPrice" class="col-sm-3 control-label">Цена(грн.)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPrice" name="price" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPrice" class="col-sm-3 control-label">Артикул</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPrice" name="articul">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <input type="file" id="exampleInputFile" name="pic"> 
                      <p class="help-block">Фото продукта</p>
                    </div>
                  </div>
                </div>                
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="new" value="1"> Новинка
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label>
                        <input type="radio" name="visible" class="minimal" value="1" checked>
                        Показать
                      </label>
                      <label>
                        <input type="radio" name="visible" class="minimal" value="0">
                        Скрыть
                      </label>
                    </div>
                  </div>
                </div>                 
              </div><!-- /.box-body -->
              <div class="box-footer">
                <a href="?view=products" class="btn btn-default">Отмена</a> 
                <button type="submit" name="ok" class="btn btn-info pull-right">Создать</button>
              </div><!-- /.box-footer -->
            </form>
          </div><!-- /.box -->
        </div>

        <div class="clearfix"></div>
</section><!-- /.content -->
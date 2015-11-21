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
                  <label for="inputEmail3" class="col-sm-2 control-label">Название</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputDesc3" class="col-sm-2 control-label">Описание</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description"></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputDesc3" class="col-sm-2 control-label">Категория</label>
                    <div class="col-sm-10">
                       <select class="form-control select2" name="category">
                        <option selected="selected">---</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                      </select> 
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputPrice" class="col-sm-2 control-label">Цена(грн.)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPrice" name="price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPrice" class="col-sm-2 control-label">Артикул</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPrice" name="articul">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <input type="file" id="exampleInputFile" name="pic"> 
                      <p class="help-block">Фото продукта</p>
                    </div>
                  </div>
                </div>                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="new" value="1"> Новинка
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
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
                <button type="submit" name="cancel" class="btn btn-default">Отмена</button>
                <button type="submit" name="ok" class="btn btn-info pull-right">Создать</button>
              </div><!-- /.box-footer -->
            </form>
          </div><!-- /.box -->
        </div>

        <div class="clearfix"></div>
</section><!-- /.content -->
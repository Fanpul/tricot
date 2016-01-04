<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Добавить категорию
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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Новая категория</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Название</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" name="name" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputDesc3" class="col-sm-3 control-label">Родительская категория</label>
                    <div class="col-sm-9">
                       <select class="form-control select2" name="category" required>
                        <option selected="selected" value="0">---</option>
                        <?php foreach ($parent as $key => $value):?>
                          <option value="<?=$value['id']?>"><?=$value['name']?></option>
                        <?php endforeach;?>
                      </select> 
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
                <a class="btn btn-default" href="?view=categories">Отмена</a>
                <button type="submit" name="ok" class="btn btn-primary pull-right">Создать</button>
              </div><!-- /.box-footer -->
            </form>
          </div><!-- /.box -->
        </div>

        <div class="clearfix"></div>
</section><!-- /.content -->
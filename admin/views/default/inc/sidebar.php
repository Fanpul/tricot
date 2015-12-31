<?php defined('KOLIBRI') or die('Access denied'); ?>

<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=PATH?><?=TEMPLATE?>dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=makeName($cuser['name']);?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li><a href="?view=user"><i class="fa fa-users"></i> <span>Контакты</span></a></li>
            <li class="header">Товары</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
              <a href="#"><i class="fa fa-plus"></i></i> <span>Создать...</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?view=categories&amp;action=add-category">Добавить категорию</a></li>
                <li><a href="?view=products&amp;action=add-product">Добавить продукт</a></li>
              </ul>
            </li>
            <li><a href="?view=products"><i class="fa fa-shopping-cart"></i> <span>Все продукты</span></a></li>
            <li><a href="?view=categories"><i class="fa fa-database"></i> <span>Все категории</span></a></li>
            <li><a href="?view=order"><i class="fa fa-credit-card"></i> <span>Заказы</span></a></li>
            <li class="header">Файлы</li>
            <li><a href="?view=supplierprice"><i class="fa fa-file-text-o"></i> <span>Прайс лист</span></a></li>
            <li class="header">Выход</li>
            <li><a href="<?=MAINPATH?>" target="_blank"><i class="fa fa-hand-o-right"></i> <span>В магазин</span></a></li>
            <li><a href="?do=logout"><i class="fa fa-sign-out"></i> <span>Выйти</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
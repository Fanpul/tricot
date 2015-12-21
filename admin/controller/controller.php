<?php
defined('KOLIBRI') or die('Access denied');
require_once MODEL;
session_start();
$view = empty($_GET['view']) ? 'order' : $_GET['view'];
$link = db_connect();

if(isset($_POST['submit'])){
	auth($link);	
	redirect();
}
if(isset($_POST['submit_reg'])){
	reg($link);	
	redirect();
}
if($_GET['do'] == 'logout'){
	logout($link);
	redirect();
}

$cuser = getUserById($link, $_SESSION['auth']['user_id']);

switch ($view) {
	case 'categories':
		$category = getCategoryAllByParentId($link);


		switch ($_GET['action']) {
			case 'add-category':
				$view = 'add-category';
				$parent = getCategoryAllByParentId($link);
				
				if(isset($_POST["ok"])) {
					add_category($link);
					redirect();
				}
				break;
		}
		break;
	case 'products':
		$func = products($link);
		$cat = getCategoryById($link, $id);
		if(isset($_POST['delete'])){
			$id = (int)$_POST['productid'];
			if ($id) {
				deleteProductById($link, $id);
			}
			redirect();
		}
		switch ($_GET['action'])
		{
			case 'edit':
  				$view = 'edit-product';
  				$parent = getCategoryAllByParentId($link);
				$id = abs((int)$_GET['id']);
				if(isset($_POST['ok'])){	
					$basename =  basename($_FILES['pic']['name']);
					if (preg_match("/.+(\.[a-z]+)/i", $basename, $r)) {
						$file = md5(mt_rand(1, 9999999999)) . strtolower($r[1]);
					} else {
						$file = $basename;  // по идее не должно сработать
					}
					$uploadfile = UPLOADDIR . $file;
					// сохраняем на сервере картинку
					move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile);
					saveEditProduct($link, $id, $file);
					$msg="a-success";
				}
				if ($id) {
					$product = getProductById($link, $id);
				} else {
					redirect();
				}
				/*if(isset($_POST['submit_cancel'])){	
					header("Location: ?view=trips");
				}*/
  			break;
  			case 'add-product':
				$view = 'add-product';
				$parent = getCategoryAllByParentId($link);

				if(isset($_POST["ok"])) {
					$basename =  basename($_FILES['pic']['name']);
					if ($basename) {
						if (preg_match("/.+(\.[a-z]+)/i", $basename, $r)) {
							$file = md5(mt_rand(1, 9999999999)) . strtolower($r[1]);
						} else {
							$file = $basename;  // по идее не должно сработать
						}
					} else {
						$file = 'no_photo.png';
					}
					$uploadfile = UPLOADDIR . $file;
					// сохраняем на сервере картинку
					move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile);
					add_product($link, $file);
					$msg="a-success";
					//redirect();
				}
/*				if(isset($_POST['cancel'])){	
					header("Location: ?view=products");
				}*/
  			break;
		}	
		break;
	case 'order':
		$view = 'order';
		$func = getOrderAll($link);
		switch ($_GET['action']) {
			case 'view':
	  				$view = 'view-order';
	  				$id = (int)$_GET['orderid'];
					if ($id && isset($_POST["status-ok"])) {
						changeStatusOk($link, $id);
					}
					if ($id && isset($_POST['del'])) {
						deleteOrderById($link, $id);
						$msg = 'Успешно удалено!';
					}
					$order = getOrderProductById($link, $id);
					$orderInfo = getOrderById($link, $id);
					$clientId = getUseridByOrderId($link, $id);
	  			break;	
			case 'delete':
	  				$id = (int)$_GET['orderid'];
					if ($id && isset($_GET['orderid'])) {
						deleteOrderById($link, $id);
					}
					if ($id && isset($_POST['del'])) {
						deleteOrderById($link, $id);
						$msg = 'ypa!';
					}
					redirect();
	  			break;	
	  	}		
  		break;
  	case 'user':
  		break;	
	default:
		$view = 'order';
		break;
}
require_once TEMPLATE.'index.php';
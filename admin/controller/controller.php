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
		if (isset($_POST['ok'])) {
			updateCategoryName($link);
			redirect();
		}
		if (isset($_POST['okvisible'])) {
			updateCategoryVisible($link);
			redirect();
		}

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
			case 'delete':
  				$id = (int)$_GET['id'];
				if ($id && isset($_GET['id'])) {
					deleteCategoryById($link, $id);
				}
				redirect();
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
					$filenew = false;
					if (preg_match("/.+(\.[a-z]+)/i", $basename, $r)) {
						$file = md5(mt_rand(1, 9999999999)) . strtolower($r[1]);
						$filenew = md5(mt_rand(1, 9999999999)).'.jpeg';
					} else {
						$file = $basename;  // по идее не должно сработать
					}
					$uploadfile = UPLOADDIR . $file;
					//$filenew = md5(mt_rand(1, 9999999999)).'.jpeg';
					$uploadfilenew = UPLOADDIR . $filenew;
					// сохраняем на сервере картинку
					move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile);
					$optimimg = @img_resize($uploadfile, $uploadfilenew, 684, 690);
					if ($optimimg === 'limit_size') {
						$msgerror="a-success";
					} else {
						saveEditProduct($link, $id, $filenew);
						$msg="a-success";
					}
					
				}
				if ($id) {
					$product = getProductById($link, $id);
				} else {
					redirect();
				}
  			break;
  			case 'add-product':
				$view = 'add-product';
				$parent = getCategoryAllByParentId($link);

				if(isset($_POST["ok"])) {
					$basename =  basename($_FILES['pic']['name']);
					$filenew = false;
					if ($basename) {
						if (preg_match("/.+(\.[a-z]+)/i", $basename, $r)) {
							$file = md5(mt_rand(1, 9999999999)) . strtolower($r[1]);
							$filenew = md5(mt_rand(1, 9999999999)).'.jpeg';
						} else {
							$file = $basename;  // по идее не должно сработать
						}
					} else {
						$file = 'no_photo.png';
					}
					$uploadfile = UPLOADDIR . $file;
					$uploadfilenew = UPLOADDIR . $filenew;
					// сохраняем на сервере картинку
					move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile);
					$optimimg = @img_resize($uploadfile, $uploadfilenew, 684, 690);
					if ($optimimg === 'limit_size') {
						$filenew = 'no_photo.png';
					}
					add_product($link, $filenew);
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
						$msg = 'Успешно удалено!';
					}
					redirect();
	  			break;	
	  	}		
  		break;
  	case 'user':
  		$func = getUsersAll($link);
  		switch ($_GET['action']) {
			case 'delete':
  				$id = (int)$_GET['id'];
				if ($id && isset($_GET['id'])) {
					deleteUserById($link, $id);
				}
				redirect();
  			break;	
	  	}	
  		break;	
  	case 'supplierprice':
		if(isset($_POST["ok"])) {
			$basename =  basename($_FILES['file']['name']);
			$file = $basename;
			$uploadfile = UPLOADDIR . $file;
			// сохраняем на сервере
			move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
			add_supplierprice($link, $file);
			$msg="a-success";
		}

		$func = getSupplierpriceAll($link);
		switch ($_GET['action']) {
			case 'delete':
	  				$id = (int)$_GET['id'];
					if ($id && isset($_GET['id'])) {
						deleteSupplierpriceById($link, $id);
					}
					redirect();
	  			break;	
	  	}		
  		break;	  		
	default:
		$view = 'order';
		break;
}
require_once TEMPLATE.'index.php';
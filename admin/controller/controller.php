<?php
defined('KOLIBRI') or die('Access denied');
require_once MODEL;
session_start();
$view = empty($_GET['view']) ? 'products' : $_GET['view'];
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

switch ($view) {
	case 'categories':
		switch ($_GET['action']) {
			case 'add-category':
				$view = 'add-category';
				$parent = getCategoryAllByParentId($link);
				
				if(isset($_POST["ok"])) {
					add_category($link);
					redirect();
				}
				break;
			
			default:
				# code...
				break;
		}
		break;
	case 'products':
		$func = products($link);
		$cat = getCategory($link, $id);
		switch ($_GET['action'])
		{
			case 'edit-product':
				$view = 'edit-product'; 

/*				$id = abs((int)$_GET['id']);
				$run_list = pre_edit_trips($link, $id);
				if(!$id){
					die("Нечего редактировать");
				}
				if(isset($_POST['submit_red'])){	
					edit_trips($link, $id);
					header("Location: ?view=trips");
				}
				if(isset($_POST['submit_cancel'])){	
					header("Location: ?view=trips");
				}*/
  			break;
  			case 'add-product':
				$view = 'add-product';
				$parent = getCategoryAllByParentId($link);

				if(isset($_POST["ok"])) {
					//$uploaddir = "/home/u942717332/public_html/userfiles/";
					$uploaddir = "C:/OpenServer/domains/tri.loc/userfiles/";
					$basename =  basename($_FILES['pic']['name']);
					if ($basename) {
						if (preg_match("/.+(\.[a-z]+)/i", $basename, $r)) {
							$file = md5(mt_rand(1, 9999999999)) . strtolower($r[1]);
						} else {
							$file = $basename;  // по идее не должно сработать
						}
					} else {
						$file = 'no-image.jpg';
					}
					$uploadfile = $uploaddir . $file;
					move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile);
					add_product($link, $file);
					redirect();
				}

				if(isset($_POST['cancel'])){	
					header("Location: ?view=products");
				}
  			break;
		}	
		break;
	default:
		$view = 'main';
		break;
}
require_once TEMPLATE.'index.php';
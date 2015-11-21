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
/*
				$target_dir = MAINPATH."userfiles/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				*/
				if(isset($_POST["ok"])) {
					$uploaddir = "C:/OpenServer/domains/tri.loc/userfiles/";
					$basename =  md5(mt_rand (1000000000,9999999999)) . basename($HTTP_POST_FILES['pic']['name']);
					$uploadfile = $uploaddir . $basename;
					move_uploaded_file($HTTP_POST_FILES['pic']['tmp_name'], $uploadfile);
					add_product($link, $basename);
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
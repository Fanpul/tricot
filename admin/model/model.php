<?php
defined('KOLIBRI') or die('Access denied');

function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_error($link));
	mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	mysqli_query($link, "SET CHARACTER SET 'utf8'");
	return $link;
}


// redirect
function redirect(){
	$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}

// logout
function logout($link){
	unset($_SESSION['auth']);
	mysqli_close($link);
}

// Очистить получаемые данные POST, GET
function clear($link, $var) {
	$varible = mysqli_real_escape_string($link, trim($var));
	return $varible;
}

// Перевод даты в ru формат
function formatDate($access_date) {
	$date_elements  = explode("-",$access_date);
	$format = $date_elements[2].'.'.$date_elements[1].'.'.$date_elements[0];
	return $format;
}

// Получить все продукты
function products($link) {
	$query = "SELECT * FROM product";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$products = array();
	while($row = mysqli_fetch_assoc($result)){
		$products[] = $row;
	}
	return $products;
}

// Получить все категории
function categories($link) {
	$query = "SELECT * FROM category";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$categories = array();
	while($row = mysqli_fetch_assoc($result)){
		$categories[] = $row;
	}
	return $categories;
}

// получить категорию по ид
function getCategoryById($link, $id){
	$query = "SELECT id, name, parentid FROM category WHERE id='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$cat = mysqli_fetch_assoc($result);
	return $cat;
}

// Получить все категории по родительскому ид
function getCategoryAllByParentId($link, $parentid = 0){
	$query = "SELECT * FROM category WHERE parentid='$parentid'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$cat = array();
	while($row = mysqli_fetch_assoc($res)){
		$cat[] = $row;
	}
	return $cat;
}

// Получить родительскую категорию по ид
function getParentCategoryById($link, $parentid){
	$query = "SELECT * FROM category WHERE id='$parentid'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$cat = array();
	$cat = mysqli_fetch_assoc($result);
	return $cat;
}

// создать категорию
function add_category($link) {
	$name = $_POST['name'];
	$parentid = $_POST['category'];
	$visible = $_POST['visible'];
	$cdate = date("Y-m-d");

	$query = "INSERT INTO category VALUES('', '$name', '$parentid', '$cdate', '$visible')";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

// удалить категорию по ид
function deleteCategoryById($link, $id) {
	$query = "DELETE FROM `category` WHERE `id`='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	mysqli_query($link, "DELETE FROM `category` WHERE `parentid` = '$id'");
	return true;		
}

function updateCategoryName($link) {
	$name = clear($link, $_POST['categoryname']);
	$id = $_POST['categoryid'];
	$query = "UPDATE `category` SET `name`='$name' WHERE `id`='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

function updateCategoryVisible($link) {
	$visible = $_POST['visible'];
	$id = $_POST['categoryid'];
	$query = "UPDATE `category` SET `visible`='$visible' WHERE `id`='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

// создать продукт
function add_product($link, $file = false) {
	$name = clear($link, $_POST['name']);
	$desc = clear($link, $_POST['description']);
	$cat = $_POST['category'];
	$s = getParentCategoryById($link, $cat);
	$subcat =  $s['parentid'];
	$price = $_POST['price'];
	$articul = $_POST['articul'];
	$new = $_POST['new'];
	$visible = $_POST['visible'];
	$cdate = date("Y-m-d H:i:s");
	$pic = $file;
	$query = "INSERT INTO product VALUES('', '$name', '$desc', '$pic', '$price', '$new', '$visible', '$cdate', '$articul', '$cat', '$subcat')";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

// получить продукт по ид
function getProductById($link, $id){
	$query = "SELECT * FROM product WHERE id='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$row = mysqli_fetch_array($result);
	return $row;
}

// редактировать продукт
function saveEditProduct($link, $id, $file = false) {
	$name = clear($link, $_POST['name']);
	$desc = clear($link, $_POST['description']);
	$cat = $_POST['category'];
	$price = $_POST['price'];
	$articul = $_POST['articul'];
	$new = $_POST['new'];
	$visible = $_POST['visible'];
	$pic = $file;
	$f="";
	if ($pic) {
		$f = "img='$pic', ";
	}
	$query = "UPDATE product SET name='$name', description='$desc', " . $f ."price='$price', articul='$articul', categoryid='$cat', new='$new', visible='$visible' WHERE id='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

// удалить продукт по ид
function deleteProductById($link, $id){
	$query = "DELETE FROM product WHERE id='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

// заказы
function getOrderAll($link) {
	$query = "SELECT * FROM `order` ORDER BY `id` DESC";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$order = array();
	while($row = mysqli_fetch_assoc($res)){
		$order[] = $row;
	}
	return $order;
}

function getOrderById($link, $id) {
	$query = "SELECT * FROM `order` WHERE `id`='$id'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$row = mysqli_fetch_array($res);
	return $row;
}

function deleteOrderById($link, $id) {
	$query = "DELETE FROM `order` WHERE `id`='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	mysqli_query($link, "DELETE FROM `orderproduct` WHERE `orderid` = '$id'");


	return true;	
}

// user
function getUserNameById($link, $userid) {
	$query = "SELECT `name` FROM user WHERE id='$userid'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$row = mysqli_fetch_array($result);
	return $row;
}

function getUsersAll($link) {
	$query = "SELECT * FROM `user`";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$array = array();
	while($row = mysqli_fetch_assoc($res)){
		$array[] = $row;
	}
	return $array;	
}

function getUserById($link, $userid) {
	$query = "SELECT * FROM user WHERE id='$userid'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$row = mysqli_fetch_array($result);
	return $row;
}

function getUseridByOrderId($link, $orderid) {
	$query = "SELECT `userid` FROM `order` WHERE id='$orderid'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$row = mysqli_fetch_array($result);
	return $row;
}

function deleteUserById($link, $id) {
	$query = "DELETE FROM `user` WHERE `id`='$id' AND `level`<'3'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;	
}

function makeName($name) {
	if (preg_match("/([\S]+\s[\S]+)/i", $name, $r)) {
		$n = $r[1];
	} else {
		$n = $name;
	}
	return $n;
}

// order-products
function getOrderProductById($link, $orderid) {
	$query = "SELECT * FROM `orderproduct` WHERE `orderid`='$orderid'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$order = array();
	while($row = mysqli_fetch_assoc($res)){
		$order[] = $row;
	}
	return $order;	
}

function changeStatusOk($link, $id) {
	$query = "UPDATE `order` SET `status`='1' WHERE `id`='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

/******supplier price******/

function getSupplierpriceAll($link) {
	$query = "SELECT * FROM `supplierprice`";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$array = array();
	while($row = mysqli_fetch_assoc($res)){
		$array[] = $row;
	}
	return $array;		
}

function add_supplierprice($link, $file) {
	$cdate = date("Y-m-d");
	$query = "INSERT INTO `supplierprice` VALUES('', '$file', '$cdate', '1')";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

function deleteSupplierpriceById($link, $id) {
	$query = "DELETE FROM `supplierprice` WHERE `id`='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;	
}

/*********************************************************************************** 
Функция img_resize(): генерация thumbnails 
Параметры: 
  $src             - имя исходного файла 
  $dest            - имя генерируемого файла 
  $width, $height  - ширина и высота генерируемого изображения, в пикселях 
Необязательные параметры: 
  $rgb             - цвет фона, по умолчанию - белый 
  $quality         - качество генерируемого JPEG, по умолчанию - максимальное (100) 
***********************************************************************************/ 
function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100) 
{ 

  	if (!file_exists($src)) {
   		return false;
	} 

  	$size = getimagesize($src); 
  	//print_r($size);
    if ($size === false) {
  		return false; 
	} 

  // Определяем исходный формат по MIME-информации, предоставленной 
  // функцией getimagesize, и выбираем соответствующую формату 
  // imagecreatefrom-функцию. 
  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1)); 
  $icfunc = "imagecreatefrom" . $format; 
  if (!function_exists($icfunc)) {
  	return false; 
  } 

  $x_ratio = $width / $size[0]; 
  $y_ratio = $height / $size[1]; 

  $ratio       = min($x_ratio, $y_ratio); 
  $use_x_ratio = ($x_ratio == $ratio); 

  $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio); 
  $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio); 
  $new_left    = 0;//$use_x_ratio  ? 0 : floor(($width - $new_width) / 2); 
  $new_top     = 0;//!$use_x_ratio ? 0 : floor(($height - $new_height) / 2); 

  try {
  	$isrc = $icfunc($src); 
  } catch (Exception $ge) {
  	echo 'Слишком большой файл';
  }
  //$idest = imagecreatetruecolor($width, $height); 
  $idest = imagecreatetruecolor($new_width, $new_height); 

  imagefill($idest, 0, 0, $rgb); 
  imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
    $new_width, $new_height, $size[0], $size[1]); 

  imagejpeg($idest, $dest, $quality); 

  imagedestroy($isrc); 
  imagedestroy($idest); 
  return true; 
} 
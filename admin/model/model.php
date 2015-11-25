<?php
defined('KOLIBRI') or die('Access denied');

function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_error($link));
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

function clear($link, $var) {
	$varible = mysqli_real_escape_string($link, trim($var));
	return $varible;
}
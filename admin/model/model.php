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

// получить категорию
function getCategory($link, $id){
	$query = "SELECT name FROM category WHERE id='$id'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$row = mysqli_fetch_array($result);
	return $row;
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

// создать продукт
function add_product($link, $file = false) {
	$name = $_POST['name'];
	$desc = $_POST['description'];
	$cat = $_POST['category'];
	$price = $_POST['price'];
	$articul = $_POST['articul'];
	$new = $_POST['new'];
	$visible = $_POST['visible'];
	$cdate = date("Y-m-d H:i:s");
	$pic = $file;
	$query = "INSERT INTO product VALUES('', '$name', '$desc', '$pic', '$price', '$new', '$visible', '$cdate', '$articul', '$cat')";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	return true;
}

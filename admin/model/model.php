<?php
defined('KOLIBRI') or die('Access denied');

function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_error($link));
	return $link;
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
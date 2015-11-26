<?php
defined('KOLIBRI') or die('Access denied');
require_once MODEL;
session_start();

if(!isset($_SESSION['cart']))
{
	$_SESSION['cart'] = array();
	$_SESSION['total_sum'] = 0.00;
	$_SESSION['total_quantity'] = 0;
}

$view = empty($_GET['view']) ? 'new' : $_GET['view'];
$link = db_connect();
$category_list = category($link);

switch ($view) {
	case 'new':
		$perpage = 6;
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1){
				$page = 1;
			}
		} 
		else{
			$page = 1;
		}
		$count_rows = count_rows_new($link);
		$pages_count = ceil($count_rows / $perpage);
		if(!$pages_count) $pages_count = 1;
		if($page > $pages_count) $page = $pages_count;
		$start_pos = ($page - 1) * $perpage;

		$eyestopper = eyestopper($link, $start_pos, $perpage);
		break;
	case 'cat':
		$category = abs((int)$_GET['category']);//getProductSubcategoryAll
		$current_cat = current_cat($link, $category);
		$perpage = 6;
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1){
				$page = 1;
			}
		} 
		else{
			$page = 1;
		}
		$count_rows = count_rows($link, $category);
		$pages_count = ceil($count_rows / $perpage);
		if(!$pages_count) $pages_count = 1;
		if($page > $pages_count) $page = $pages_count;
		$start_pos = ($page - 1) * $perpage;

		$products = products($link, $category, $start_pos, $perpage);
		break;	
	case 'subcat':
		$category = abs((int)$_GET['category']);
		$current_cat = current_cat($link, $category);
		$perpage = 6;
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1){
				$page = 1;
			}
		} 
		else{
			$page = 1;
		}
		$count_rows = count_rows($link, $category);
		$pages_count = ceil($count_rows / $perpage);
		if(!$pages_count) $pages_count = 1;
		if($page > $pages_count) $page = $pages_count;
		$start_pos = ($page - 1) * $perpage;

		$products = getProductSubcategoryAll($link, $category, $start_pos, $perpage);
		break;	
	case 'addtocart':
		$productid = abs((int)$_GET['productid']);
		addtocart($productid);
		//$_SESSION['total_quantity'] = total_items($_SESSION['cart']);
		$_SESSION['total_sum'] = total_sum($link, $_SESSION['cart']);
		total_quantity();
		redirect();
		break;		
	case 'auth':
		# code...
		break;
	
	default:
		$view = 'new';
		break;
}


require_once TEMPLATE.'index.php';
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
		# code...
		break;
	
	default:
		$view = 'main';
		break;
}
require_once TEMPLATE.'index.php';
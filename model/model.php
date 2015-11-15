<?php
defined('KOLIBRI') or die('Access denied');

function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die(mysqli_error($link));
	return $link;
}
$link = db_connect();
function printarr($array) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function redirect(){
	$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}

function clear($link, $var){
    $var = mysqli_real_escape_string($link, strip_tags(trim($var)));
    return $var;
}

/********auth vk*********/
//require_once '/../SocialAuther/autoload.php';
/************************/
// конфигурация настроек адаптера
/*$vkAdapterConfig = array(
    'client_id'     => '5139295',
    'client_secret' => 'w06e408Xl2gpcYeisVfV',
    'redirect_uri'  => 'http://tri.loc/?view=auth'
);

// создание адаптера и передача настроек
$vkAdapter = new SocialAuther\Adapter\Vk($vkAdapterConfig);

// передача адаптера в SocialAuther
$auther = new SocialAuther\SocialAuther($vkAdapter);
//echo '<p><a href="' . $auther->getAuthUrl() . '">Аутентификация через ВКонтакте</a></p>';
// аутентификация и вывод данных пользователя или вывод ссылки для аутентификации
// if (!isset($_GET['code'])) {
//    echo '<p><a href="' . $auther->getAuthUrl() . '">Аутентификация через ВКонтакте</a></p>';
// }

if ($auther->authenticate()) {

    $result = mysqli_query($link,
        "SELECT *  FROM `users` WHERE `social_id` = '{$auther->getSocialId()}' LIMIT 1"
    );

    $record = mysqli_fetch_array($result);
    // if (!$record) {
    //     $values = array(
    //         $auther->getSocialId(),
    //         $auther->getName(),
    //         $auther->getEmail(),
    //         $auther->getSocialPage(),
    //         $auther->getSex(),
    //         date('Y-m-d', strtotime($auther->getBirthday())),
    //         $auther->getAvatar()
    //     );
        $b = date('Y-m-d', strtotime($auther->getBirthday()));
        $query = "INSERT INTO `users` (`social_id`, `name`, `email`, `social_page`, `sex`, `birthday`, `avatar`) VALUES ('{$auther->getSocialId()}', '{$auther->getName()}', '{$auther->getEmail()}', '{$auther->getSocialPage()}', '{$auther->getSex()}', '$b', '{$auther->getAvatar()}' )";
        $result = mysqli_query($link, $query);
    }
}
*/

/*********************/

function category($link){
	$query = "SELECT * FROM category";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$cat = array();
	while($row = mysqli_fetch_assoc($res)){
		$cat[] = $row;
	}
	return $cat;
}

function products($link, $category, $start_pos, $perpage){
	$query = "SELECT id, name, img, price, new FROM product 
		WHERE categoryid='$category' AND visible='1' LIMIT $start_pos, $perpage";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	//$_SESSION['count'][$category] = mysql_num_rows($res);
	$prod = array();
	while($row = mysqli_fetch_assoc($res)){
		$prod[] = $row;
	}
	return $prod;
}

function eyestopper($link, $start_pos, $perpage){
	$query = "SELECT id, name, img, price, new FROM product 
		WHERE visible='1' AND new='1' LIMIT $start_pos, $perpage";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	//$_SESSION['count'][$category] = mysql_num_rows($res);
	$prod = array();
	while($row = mysqli_fetch_assoc($res)){
		$prod[] = $row;
	}
	return $prod;
}

function current_cat($link, $category){
	$query = "SELECT name FROM category 
		WHERE id='$category'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$cur_cat = array();
	$cur_cat = mysqli_fetch_assoc($res);
	return $cur_cat;
	
}

function count_rows($link, $category){
	$query = "SELECT id, name, img, price FROM product 
		WHERE categoryid='$category' AND visible='1'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$count_rows = mysqli_num_rows($res);
	$_SESSION['nun'][$category] = $count_rows;
	return $count_rows;
}
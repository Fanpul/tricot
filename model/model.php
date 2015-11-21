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

function category($link, $parentid = 0){
	$query = "SELECT * FROM category WHERE parentid='$parentid'";
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
	$query = "SELECT id FROM product 
		WHERE categoryid='$category' AND visible='1'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$count_rows = mysqli_num_rows($res);
	$_SESSION['nun'][$category] = $count_rows;
	return $count_rows;
}

function count_rows_new($link){
	$query = "SELECT id FROM product 
		WHERE new='1' AND visible='1'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$count_rows = mysqli_num_rows($res);
	$_SESSION['nun'][$category] = $count_rows;
	return $count_rows;
}

function pagination($page, $pages_count){
    //echo "Страница: {$page}; Общее кол-во страниц: {$pages_count}<br/><br/>";
    if($_SERVER['QUERY_STRING']){
        foreach ($_GET as $key => $value) {
            if($key != 'page') $uri .= "{$key}={$value}&amp;";
        }
    }
    $back = ''; //назад
    $forward = ''; // вперед
    $startpage = '';
    $endpage = '';
    $page2left = '';
    $page1left = '';
    $page2right = '';
    $page1right = '';
    if($page > 1){
        $back = "<li class='previous'><a href='?{$uri}page=".($page-1)."'>&laquo; Назад</a></li>";
    }
    else{
        $back = "<li class='previous-off'>&laquo; Назад</li>";        
    }
    if($page < $pages_count){
        $forward = "<li class='next'><a href='?{$uri}page=".($page+1)."'>Вперед &raquo;</a></li>";
    }
    else{
        $forward = "<li class='next-off'>Вперед &raquo;</li>"; 
    }
    if($page - 1 > 0){
        $page1left = "<li><a href='?{$uri}page=".($page-1)."'>".($page-1)."</a></li>";
    }
    if($page + 1 <= $pages_count){
        $page1right = "<li><a href='?{$uri}page=".($page+1)."'>".($page+1)."</a></li>";
    }
    if($page - 2 > 0){
        $page2left = "<li><a href='?{$uri}page=".($page-2)."'>".($page-2)."</a></li>";
    }
    if($page + 2 <= $pages_count){
        $page2right = "<li><a href='?{$uri}page=".($page+2)."'>".($page+2)."</a></li>";
    }
    if($page > 3){
        $startpage = "<li><a href='?{$uri}page=1'>1</a></li>";
    }
    if($page < ($pages_count-2)){
        $endpage = "<li><a href='?{$uri}page={$pages_count}'>$pages_count</a></li>";
    }
    if($page > 4){
        $dotleft = "<li class='next'><a href='?{$uri}page=".($page-3)."'>...</a></li>";
    }
    if($page < ($pages_count-3)){
        $dotright = "<li class='next'><a href='?{$uri}page=".($page+3)."'>...</a></li>";
    }
    echo "<ul id='pagination-flickr'>".$back.$startpage.$dotleft.$page2left.$page1left."<li class='active'>".$page."</li>".$page1right.$page2right.$dotright.$endpage.$forward."</ul>";
}
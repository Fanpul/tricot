<?php 
	defined('KOLIBRI') or die('Access denied');
	//$_SESSION['auth']['level'] = 3;
if($_SESSION['auth']['level'] < 2 ):
	$path = MAINPATH;
	header("Location: $path");
 else:
	require_once 'inc/header.php';
	require_once 'inc/sidebar.php';
?>	
	<div class="content-wrapper">
		<?php include 'pages/' .$view. '.php'; ?>
   	</div><!-- end of center content -->
<?php require_once 'inc/footer.php';
endif;?>
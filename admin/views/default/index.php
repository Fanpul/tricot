<?php 
	defined('KOLIBRI') or die('Access denied');
	$_SESSION['auth']['adminn'] = true;
if(!$_SESSION['auth']['adminn']):
	header('Location: http://tri.loc/');
 else:
	require_once 'inc/header.php';
	require_once 'inc/sidebar.php';
?>	
	<div class="content-wrapper">
		<?php include 'pages/' .$view. '.php'; ?>
   	</div><!-- end of center content -->
<?php require_once 'inc/footer.php';
endif;?>
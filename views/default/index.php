<?php 
	defined('KOLIBRI') or die('Access denied');
	require_once 'inc/header.php';
?>
	<div class="row main-products">
		<?php require_once 'inc/sidebar.php';?>
		<div class="row col-md-9 wrap-product">
			<?php include 'pages/' .$view. '.php'; ?>
		</div>
   	</div><!-- end of center content -->	
<?php 
	require_once 'inc/footer.php';
?>
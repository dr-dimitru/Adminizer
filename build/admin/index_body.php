<? require_once 'menu.php'; ?>
<div id="main_container" class="container">
<?
	if(empty($_SESSION['admin']))
	{
		require_once 'not_logged_in.php'; 
	}
	else
	{
		require_once 'logged_in.php';
	}	
?>
</div>
<? require_once 'footer.php'; ?>
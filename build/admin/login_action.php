<?php 
require_once 'main_class.php';
$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$name = $json_arr["login"];
$password = $json_arr["password"];

$login = $main_class->login($name, $password);

if($login == 'success')
{
	?>
	<h2><?= $main_class->getContent('success_login'); ?></h2>
	<script type="text/javascript">
		location.replace("<?= SITE_URL ?>/admin");
	</script>
	<?
}
else
{
	$error = '<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		'.$main_class->getContent('login_error_message').'
	</div>';
	require_once 'login_area.php';
}
?>
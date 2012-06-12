<?
	define("abutton_", "abutton_", true);
	$rep_arr = array('.php', '/', 'admin', '?en=1', '?ru=1');
	$page = str_replace($rep_arr, '', $_SERVER['REQUEST_URI']);
	${abutton_.$page} = 'class="active"';


	$main_p = true;
?>
<div class="well sidebar-nav">
	<ul class="nav nav-list">
		<li <? if($page){ echo $abutton_index;}else{ echo 'class="active"';} ?>>
			<a class="" href="./"><i class="icon-home"></i></a>
		</li>
	<?
		require_once 'admin_content.php';
		require_once 'admin_users.php';
		require_once 'admin_settings.php';
	?>
	</ul>
</div>
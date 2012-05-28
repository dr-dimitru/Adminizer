<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$level_id = $json_arr["id"];
$level = $json_arr["level"];
$level_desc = rawurldecode($json_arr["desc"]);
$level_status = $json_arr["status"];
$delete = $json_arr["delete"];

if($delete == 'delete')
{
	$main_class->deleteAccessLevel($level_id);
}
else
{
	$main_class->saveAccessLevel($level, $level_desc, $level_status, $level_id);
}
	require_once 'access_levels.php';
?>
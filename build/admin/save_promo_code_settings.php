<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$id = $json_arr["id"];
$value = $json_arr['value'];

$main_class->savePromoSettings($id, $value);

if($id == 5)
{
	echo '<i class="icon-ok-circle"></i>';
}
else
{
	echo '<i class="icon-ok-circle icon-white"></i> ON / OFF';
}
?>
<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$id = $json_arr['id'];
$url = $json_arr['url'];

$main_class->deleteMedia($id, $url);
?>
<?
	require_once 'main_class.php';
	$main_class->checkAdmin(777);
	
	$json = stripcslashes($_POST["data"]);
	$json_arr = json_decode($json, true);
	
	$code = $json_arr['code'];
	
	if($code)
	{
		$main_class->addPromoCode($code);
	}
	
	require_once 'promo_code_table.php';
?>

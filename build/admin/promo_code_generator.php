<?
	require_once 'main_class.php';
	$main_class->checkAdmin(777);
	
	$json = stripcslashes($_POST["data"]);
	$json_arr = json_decode($json, true);
	
	$qty = $json_arr['qty'];
	$length = $json_arr['length'];
	
	for ($i = 1; $i <= $qty; $i++) 
	{
		for ($i2 = 1; $i2 <= $length; $i2++) 
		{
			$code = $code.mt_rand(1, 9);
		}
		$main_class->addPromoCode($code);
		unset($code);
	}
	
	require_once 'promo_code_table.php';
?>

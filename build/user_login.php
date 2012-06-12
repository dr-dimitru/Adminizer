<?
require_once 'user_class.php';

$login_level = 1; //SET MINIMUM DEFAULT ACCESS LEVEL


$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$login = rawurldecode($json_arr["login"]);
$password = rawurldecode($json_arr["password"]);

if(strlen($password) !== 32)
{
	$password = md5($password);
}

$promo_active = $main_class->getPromoSettingsValueByName('active');
$promo_on_login = $main_class->getPromoSettingsValueByName('on_login');


//CHECK LOGIN
if(!empty($login))
{
	$user_data = $main_class->getUser($login);
	if(!empty($user_data))
	{
		//FETCH USER DATA
		foreach($user_data as $value)
		{
			$user_password = $value['password'];
			$user_level = $value['access'];
		}
	}
	else
	{
		die('<div class="alert alert-error">'.$main_class->getContent('incorrect_login_message').'</div>');
	}
}
else
{
	die('<div class="alert alert-error">'.$main_class->getContent('empty_login_message').'</div>');
}

//CHECK PASSWORD
if(!empty($password))
{
	if($password !== $user_password)
	{
		die('<div class="alert alert-error">'.$main_class->getContent('incorrect_pass_message').'</div>');
	}
}
else
{
	die('<div class="alert alert-error">'.$main_class->getContent('incorrect_pass_message').'</div>');
}

//IF PROMO CODES FEATURE IS ACTIVE AND 'ON LOGIN' ACTIVE
if($promo_active == 1 && $promo_on_login == 1)
{
	$promo = $json_arr["promo"];
	if(!empty($promo))
	{
		$promo_code = $main_class->getPromoCodeByEmail($login);
		
		if(!empty($promo_code))
		{
			foreach($promo_code as $value)
			{
				if($promo !== $value["code"])
				{
					die('<div class="alert alert-error">'.$main_class->getContent('others_promo_message').'</div>');
				}
				else
				{
					$login_level = $main_class->getPromoSettingsValueByName('user_level');
				}
			}
		}
		else
		{
			$promo_code_data = $main_class->getPromoCodeData($promo);
			
			if(!empty($promo_code_data))
			{
				foreach($promo_code_data as $value)
				{
					if(empty($value["owner"]))
					{
						$main_class->updatePromoCode($promo, $login);
						$login_level = $main_class->getPromoSettingsValueByName('user_level');
					}
					else
					{
						die('<div class="alert alert-error">'.$main_class->getContent('non_exsist_promo_message').'</div>');
					}
				}
			}
			else
			{
				die('<div class="alert alert-error">'.$main_class->getContent('non_exsist_promo_message').'</div>');
			}
		}
	}
}
else //IF PROMO CODE FEATURE IS INACTIVE SET USER LEVEL
{
	$level = $user_level;
}

$main_class->userLogin($login, $level); //PROCEED LOGIN

//ECHO SUCCESS LOGIN MESSAGE
echo $main_class->getContent('user_success_login');
echo '<script type="text/javascript">
	location.replace("'.SITE_URL.'");
</script>';
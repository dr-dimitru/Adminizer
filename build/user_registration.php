<?
require_once 'user_class.php';

$reg_level = 1;

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$login = rawurldecode($json_arr["login"]);
$name = rawurldecode($json_arr["name"]);
$orig_password = rawurldecode($json_arr["password"]);
$re_password = rawurldecode($json_arr["re_password"]);
$password = md5($orig_password);

$promo_active = $main_class->getPromoSettingsValueByName('active');
$promo_on_login = $main_class->getPromoSettingsValueByName('on_login');

if(empty($login) || !preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $login))
{
	die('<div class="alert alert-error">'.$main_class->getContent('incorrect_email_message').'</div>');
}
else
{
	$user_data = $main_class->getUser($login);
	if(!empty($user_data))
	{
		die('<div class="alert alert-error">'.$main_class->getContent('registered_message').'</div>');
	}
}

if(empty($name) || strlen($name) < 3)
{
	die('<div class="alert alert-error">'.$main_class->getContent('name_error_message').'</div>');
}

if(empty($orig_password))
{
	die('<div class="alert alert-error">'.$main_class->getContent('password_error').'</div>');
}

if($re_password !== $orig_password)
{
	die('<div class="alert alert-error">'.$main_class->getContent('incorrect_pass_repass').'</div>');
}

if($promo_active == 1 && $promo_on_login == 1)
{
	$promo = rawurldecode($json_arr["promo"]);
	if(!empty($promo))
	{
		$promo_code = $main_class->getPromoCodeByEmail($login);
		
		if(!empty($promo_code))
		{
			foreach($promo_code as $value)
			{
				if($promo !== $promo_code["code"])
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
				$main_class->updatePromoCode($promo, $login);
				$reg_level = $main_class->getPromoSettingsValueByName('user_level');
			}
			else
			{
				die('<div class="alert alert-error">'.$main_class->getContent('non_exsist_promo_message').'</div>');
			}
		}
	}
}


$main_class->registerUser($name, $login, $password, $reg_level);

$message = sprintf($main_class->getContent("registration_email_text"), $login, $orig_password);
$subject = $main_class->getContent("registration_email_subject");
$main_class->send_email($login, $message, $subject);


$main_class->userLogin($login, $reg_level);

echo $main_class->getContent('user_success_signup');
echo '<script type="text/javascript">
	location.replace("'.SITE_URL.'");
</script>';
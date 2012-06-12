<?
require_once 'user_class.php';

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$email = $json_arr["email"];

if(empty($email) || !preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email))
{
	die('<div class="alert alert-error">'.$main_class->getContent('incorrect_email_message').'</div>');
}
else
{
	//CHECK USER
	$user_data = $main_class->getUser($email);
	if(!empty($user_data))
	{
		$new_pass = mt_rand(100000, 900000);
		$new_pass = md5($new_pass + time());
		$new_pass = mb_strcut($new_pass, 1, 7);
		$new_pass_md5 = md5($new_pass);
		
		//SETUP NEW PASSWORD
		$main_class->userPasswordRecovery($email, $new_pass_md5);
		
		//SEDN EMAIL WITH NEW PASSWORD
		$message = sprintf($main_class->getContent("password_recovery_email_text"), $email, $new_pass);
		$subject = $main_class->getContent("password_recovery_email_subject");
		$main_class->send_email($email, $message, $subject);
		
		//SHOW SUCCESS MESSAGE
		echo $main_class->getContent('user_success_recovery');
	}
	else
	{
		die('<div class="alert alert-error">'.$main_class->getContent('incorrect_login_message').'</div>');
	}
}
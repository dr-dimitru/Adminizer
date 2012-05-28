<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$id = $json_arr["id"];
$delete = $json_arr["delete"];

if($delete == 'delete')
{
	$main_class->deleteUser($id);
	die(require_once 'users_management.php');
}

$name = rawurldecode($json_arr["name"]);
$email = rawurldecode($json_arr["email"]);
$password = rawurldecode($json_arr["password"]);
$access = $json_arr["access"];

$send_email = $json_arr["send_email"];

if($id == 'new')
{
	${name.$id} = $name;
	${email.$id} = $email;
	${password.$id} = $password;
	${post_access_.$access.$id} = "SELECTED";
}

if(empty($name) || empty($email) || empty($access))
{
	${error_.$id} = '<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> '.$main_class->getContent('section_error_message').'</div>';
	
	if(empty($name))
	{
		${error_name.$id} = 'error control-group';
	}
	if(empty($email))
	{
		${error_email.$id} = 'error control-group';
	}
	if(empty($access))
	{
		${error_access.$id} = 'error control-group';
	}
	
	if(empty($password))
	{
		${error_password.$id} = 'error control-group';
	}
	
	die(require_once 'users_management.php');
}

if($id == 'new')
{	
	if(empty($password))
	{
		${error_password.$id} = 'error control-group';
		die(require_once 'users_management.php');
	}
	
	$main_class->registerUser($name, $email, $password, $access);
	
	if($send_email == 1)
	{
		$message = sprintf($main_class->getContent("registration_email_text"), $email, $password);
		
		$subject = $main_class->getContent("registration_email_subject");
		
		$main_class->send_email($email, $message, $subject);
	}
	
	unset(${name.$id});
	unset(${email.$id});
	unset(${post_access_.$access.$id});
	unset(${password.$id});
	die(require_once 'users_management.php');
}
else
{
	${error_name.$id} = 'success control-group';
	${error_email.$id} = 'success control-group';
	${error_access.$id} = 'success control-group';
	
	$main_class->updateUser($name, $email, $access, $id);
	die(require_once 'users_management.php');
}
?>
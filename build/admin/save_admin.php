<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$id = $json_arr["id"];
$delete = $json_arr["delete"];

if($delete == 'delete')
{
	$main_class->deleteAdmin($id);
	die(require_once 'admins_management.php');
}

$name = rawurldecode($json_arr["name"]);
$password = rawurldecode($json_arr["password"]);
$access = $json_arr["access"];

$send_email = $json_arr["send_email"];

if($id == 'new')
{
	${name.$id} = $name;
	${password.$id} = $password;
	${access.$id} = $access;
}

if(empty($name) || empty($password) || empty($access))
{
	${error_.$id} = '<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> '.$main_class->getContent('section_error_message').'</div>';
	
	if(empty($name))
	{
		${error_name.$id} = 'error control-group';
	}

	if(empty($access))
	{
		${error_access.$id} = 'error control-group';
	}
	
	if(empty($password))
	{
		${error_password.$id} = 'error control-group';
	}
	
	die(require_once 'admins_management.php');
}

if($id == 'new')
{	
	if(empty($password))
	{
		${error_password.$id} = 'error control-group';
		die(require_once 'admins_management.php');
	}
	
	$main_class->saveAdmin($name, $password, $access);
		
	unset(${name.$id});
	unset(${access.$id});
	unset(${password.$id});
	die(require_once 'admins_management.php');
}
else
{
	${error_name.$id} = 'success control-group';
	${error_password.$id} = 'success control-group';
	${error_access.$id} = 'success control-group';
	
	$main_class->updateAdmin($name, $password, $access, $id);
	die(require_once 'admins_management.php');
}
?>
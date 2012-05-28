<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$id = $json_arr["id"];
$delete = $json_arr["delete"];

if($delete == 'delete')
{
	$main_class->deleteSiteSettings($id);
	die('<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> <h2>'.$main_class->getContent('deleted_word').'</h2></div>');
}

$name = rawurldecode($json_arr["name"]);
$value = rawurldecode($json_arr["value"]);

${name.$id} = $name;
${value.$id} = $value;

if($id == 'new')
{	
	if(empty($name) || empty($value))
	{
		${error_.$id} = '<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> '.$main_class->getContent('section_error_message').'</div>';
		
		if(empty($name))
		{
			${error_name_field_.$id} = 'error control-group';
		}
		if(empty($value))
		{
			${error_value_field_.$id} = 'error control-group';
		}
		
		die(require_once 'site_settings.php');
	}
	
	$main_class->saveSiteSettings($id, $value, $name);
	
	unset(${name.$id});
	unset(${value.$id});
	die(require_once 'site_settings.php');
}
else
{
	$key = $id;
	if(empty($value))
	{
		${error_.$id} = '<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> '.$main_class->getContent('section_error_message').'</div>';
		
		${error_value_field_.$id} = 'error control-group';
		
		die(require_once 'site_settings_area.php');
	}
	
	${error_value_field_.$id} = 'success control-group';
	
	$main_class->saveSiteSettings($id, $value);
	die(require_once 'site_settings_area.php');
}
?>
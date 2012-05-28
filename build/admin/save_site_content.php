<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$id = $json_arr["id"];
$delete = $json_arr["delete"];

if($delete == 'delete')
{
	$main_class->deleteAllContent($id);
	die('<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> <h2>'.$main_class->getContent('deleted_word').'</h2></div>');
}

$name = rawurldecode($json_arr["name"]);
$ru = rawurldecode($json_arr["ru"]);
$en = rawurldecode($json_arr["en"]);

${name.$id} = $name;
${ru.$id} = $ru;
${en.$id} = $en;


if($id == 'new')
{	
	if(empty($name) || empty($en) || empty($ru))
	{
		${error_cont.$id} = '<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> '.$main_class->getContent('section_error_message').'</div>';
		
		if(empty($name))
		{
			${error_site_cont_name_field_.$id} = 'error control-group';
		}
		if(empty($ru))
		{
			${error_ru_field_.$id} = 'error control-group';
		}
		if(empty($en))
		{
			${error_en_field_.$id} = 'error control-group';
		}
		
		die(require_once 'site_settings.php');
	}
	
	$main_class->saveAllContent($name, $ru, $en);
	
	unset(${name.$id});
	unset(${ru.$id});
	unset(${en.$id});
	die(require_once 'site_settings.php');
}
else
{
	$key = $id;
	if(empty($ru) || empty($en))
	{
		${error_cont.$id} = '<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> '.$main_class->getContent('section_error_message').'</div>';
		
		if(empty($ru))
		{	
			${error_ru_field_.$id} = 'error control-group';
		}
		
		if(empty($en))
		{
			${error_en_field_.$id} = 'error control-group';
		}
		
		die(require_once 'site_content_area.php');
	}
	
	${error_ru_field_.$id} = 'success control-group';
	${error_en_field_.$id} = 'success control-group';
	
	$main_class->updateAllContent($ru, $en, $id);
	die(require_once 'site_content_area.php');
}
?>
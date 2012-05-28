<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);


$delete = $json_arr["delete"];
$section_id = $json_arr["id"];
$section_title = rawurldecode($json_arr["title"]);


if($delete == 'delete')
{
	$main_class->deleteSection($section_id);
	die('<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> <h2>'.$main_class->getContent('deleted_word').'</h2></div>');
}

if(empty($section_title))
{
	${error_title_field_.$section_id} = 'error control-group';
	${error_.$section_id} = '<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		'.$main_class->getContent('section_error_message').'
	</div>';
	
	if($section_id == 'new')
	{
		$section_save_error = 1;
		die(require_once 'sections.php');
	}
	die(require_once 'section_area.php');
}

if($section_id == 'new')
{
	$main_class->addNewSection($section_title);
	die(require_once 'sections.php');
}
else
{
	${error_title_field_.$section_id} = 'success control-group';
	$main_class->updateSection($section_id, $section_title);
	die(require_once 'section_area.php');
}
?>
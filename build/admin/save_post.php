<? 
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$post_id = $json_arr["id"];
$delete = $json_arr["delete"];

if($delete == 'delete')
{
	$main_class->deletePost($post_id);
	die('<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> <h2>'.$main_class->getContent('deleted_word').'</h2></div>');
}

$post_title = rawurldecode($json_arr["title"]);
$post_text = rawurldecode($json_arr["text"]);
$post_text = preg_replace('#<br>#i', "\n", $post_text);

$post_section = $json_arr["section"];
$post_access = $json_arr["access"];
$media = $json_arr["media"];
$tags = rawurldecode($json_arr["tags"]);

if(!empty($media))
{
	$media = trim($media);
	$media_arr = explode(" ", $media);
	$media_string = implode(",", $media_arr);
}

if($post_id == 'new')
{
	${post_title.$post_id} = $post_title;
	${post_text.$post_id} = $post_text;
	${post_access_.$post_access.$post_id} = "SELECTED";
	${post_section_.$post_section.$post_id} = "SELECTED";
}

if(empty($post_title) || empty($post_section) || empty($post_text) || empty($post_access))
{
	${error_.$post_id} = '<div class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a> '.$main_class->getContent('section_error_message').'</div>';
	
	if(empty($post_title))
	{
		${error_title_field_.$post_id} = 'error control-group';
	}
	if(empty($post_text))
	{
		${error_text_field_.$post_id} = 'error control-group';
	}
	if(empty($post_section))
	{
		${error_section_.$post_id} = 'error control-group';
	}
	if(empty($post_access))
	{
		${error_access_.$post_id} = 'error control-group';
	}
	
	if($post_id == 'new')
	{
		$post_save_error = 1;
		die(require_once 'posts.php');
	}
	
	die(require_once 'post_area.php');
}

if($post_id == 'new')
{	
	$main_class->addNewPost($post_title, $post_text, $post_section, $post_access);
	
	unset(${post_title.$post_id});
	unset(${post_text.$post_id});
	unset(${post_access_.$post_access.$post_id});
	unset(${post_section_.$post_section.$post_id});
	die(require_once 'posts.php');
}
else
{
	${error_title_field_.$post_id} = 'success control-group';
	${error_text_field_.$post_id} = 'success control-group';
	${error_section_.$post_id} = 'success control-group';
	${error_access_.$post_id} = 'success control-group';
	${error_tags_field_.$post_id} = 'success control-group';
	
	$main_class->updatePost($post_title, $post_text, $post_section, $post_access, $post_id, $media_string, $tags);
	die(require_once 'post_area.php');
}
?>
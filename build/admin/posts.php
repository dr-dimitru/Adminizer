<? 
require_once 'main_class.php';
$main_class->checkAdmin();

if(empty($_SESSION['admin']))
{
	require_once 'not_logged_in.php'; 
}
else
{
	?>
	<div class="page-header">
		<h1><?= $main_class->getContent('post_word'); ?></h1>
	</div>
	<? 
	require_once 'post_area_new.php';
	
	$mediaFiles = $main_class->getMedia();
	
	$posts = $main_class->getPosts();
	if($posts)
	{
		foreach($posts as $key => $value)
		{
			$post_id = $key;
			$post_section = $value["post_section"];
			$post_access = $value["post_access"];
			$post_media = explode(",", $value["media"]);
			
			${post_title.$post_id} = $value["post_title"];;
			${post_text.$post_id} = $value["post_text"];
			${post_access_.$post_access.$post_id} = "SELECTED";
			${post_section_.$post_section.$post_id} = "SELECTED";
			
			?>
			<div id="post_<?= $post_id ?>">
			<?
				require 'post_area.php';
			?>
			</div>
			<?
		}
	}
}

if($post_save_error == 1)
{
?>
<script>
	$(document).ready(
		function(){
			$('#new_post').modal('show');
		}
	);
</script>
<?}?>
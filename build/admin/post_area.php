<? 
require_once 'main_class.php'; 

if(!$posts)
{
	$posts = $main_class->getPosts($post_id);
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
	}
}

$json_delete = '{ "id": "'.$post_id.'", "delete": "delete" }';
$json_save = '{"id": "'.$post_id.'", "title": "\'+encodeURI($(\'#title_'.$post_id.'\').val())+\'", "text": "\'+encodeURI($(\'#text_'.$post_id.'\').val())+\'", "access": "\'+$(\'#post_access_'.$post_id.'\').val()+\'", "section": "\'+$(\'#section_'.$post_id.'\').val()+\'", "media": "\'+$(\'#selected_media_'.$post_id.'\').val()+\'"}';
?>
<div class="row">
	<div class="span3 <?= ${error_title_field_.$post_id} ?>">
		<input id="title_<?= $post_id ?>" class="span3 x-large" value="<?= htmlspecialchars(stripslashes(${post_title.$post_id})) ?>" />
	</div>
	<div class="span5 <?= ${error_text_field_.$post_id} ?>">
		<textarea id="text_<?= $post_id ?>" rows="8" class="span5"><?= htmlspecialchars(stripslashes(${post_text.$post_id})) ?></textarea>
		<?= ${error_.$post_id} ?>
	</div>
	<div class="span2">
		<div class="<?= ${error_section_.$post_id} ?>">
			<? require 'section_select.php'; ?>
		</div>
		<div class="<?= ${error_access_.$post_id} ?>">
			<select id="post_access_<?= $post_id ?>" class="span2">
			<?
			if(!$accessLevels)
			{
				$accessLevels = $main_class->getAccessLevels(); 
			}
			foreach($accessLevels as $key => $value)
			{?>
				<option <?= ${post_access_.$key.$post_id} ?> value="<?= $key ?>"><? if(!empty($value["level_description"])){ echo $value["level_description"]; }else{ echo $value["level"]; } ?></option>
			<?}?>
			</select>
		</div>
	</div>
	<div class="span2">
		<button id="post_button_<?= $post_id ?>" style="margin:0px" class="btn btn-success span2 no-margin" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'save_post.php', 'post_button_<?= $post_id ?>', 'post_<?= $post_id ?>')"><?= $main_class->getContent('save_word'); ?></button>
		
		<button type="button" style="margin:0px" class="btn btn-info span2 no-margin" data-target="#post_media_<?= $post_id ?>" data-toggle="modal"><?= $main_class->getContent('gallery_word'); ?></button>
		
		<button type="button" id="post_delete_button_<?= $post_id ?>" onclick="showerp_alert('<?= htmlspecialchars($json_delete) ?>', 'save_post.php', 'post_delete_button_<?= $post_id ?>', 'post_<?= $post_id ?>', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), ${post_title.$post_id})) ?>')" style="margin:0px" class="btn btn-danger span2 no-margin"><?= $main_class->getContent('delete_word'); ?></button>
	</div>
</div>
<hr>
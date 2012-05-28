<? 
require_once 'main_class.php';
$accessLevels = $main_class->getAccessLevels(); 
$post_id = 'new';

$json_save = '{"id": "'.$post_id.'", "title": "\'+encodeURI($(\'#title_'.$post_id.'\').val())+\'", "text": "\'+encodeURI($(\'#text_'.$post_id.'\').val())+\'", "access": "\'+$(\'#post_access_'.$post_id.'\').val()+\'", "section": "\'+$(\'#section_'.$post_id.'\').val()+\'"}';
?>
<div id="post_<?= $post_id ?>" class="row">
	<div class="span12">
		<div class="well">
			<button type="button" class="btn btn-primary btn-large" data-target="#new_post" data-toggle="modal">+ <?= $main_class->getContent('add_new_word'); ?></button>
		</div>
	</div>
</div>

<div id="new_post" class="modal fade">
	<div class="modal-header">
		<h3>+ <?= $main_class->getContent('add_new_word'); ?></h3>
	</div>
	
	<div class="modal-body form-vertical">
		<div class="<?= ${error_title_field_.$post_id} ?>">
			<input id="title_<?= $post_id ?>" placeholder="<?= $main_class->getContent('title_word'); ?>" class="input input-xxlarge" value="<?= ${post_title.$post_id} ?>" />
		</div>
		<div class="<?= ${error_text_field_.$post_id} ?>">
			<textarea id="text_<?= $post_id ?>" rows="4" placeholder="<?= $main_class->getContent('text_word') ?>" class="input input-xxlarge"><?= stripslashes(${post_text.$post_id}) ?></textarea>
		</div>
		<div class="<?= ${error_section_.$post_id} ?>">
			<? require 'section_select.php'; ?>
		</div>
		<div class="<?= ${error_access_.$post_id} ?>">
			<select id="post_access_<?= $post_id ?>" class="span2">
			<?
			foreach($accessLevels as $key => $value)
			{?>
				<option <?= ${post_access_.$key.$post_id} ?> value="<?= $key ?>"><? if(!empty($value["level_description"])){ echo $value["level_description"]; }else{ echo $value["level"]; } ?></option>
			<?}?>
			</select>
		</div>
		
		<?= ${error_.$post_id} ?>
	</div>
	
	<div class="modal-footer">
		<button id="post_button_<?= $post_id ?>" style="margin:0px" class="btn btn-success pull-right no-margin" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_post.php', 'post_button_<?= $post_id ?>', 'main_container'); $('#new_post').modal('hide')"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
</div>
<? unset($post_id); ?>
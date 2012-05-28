<?
$json_delete = '{ "id": "'.$id.'", "delete": "delete" }';
$json_save = '{"id": "'.$id.'", "name": "\'+encodeURI($(\'#name_'.$id.'\').val())+\'", "email": "\'+encodeURI($(\'#email_'.$id.'\').val())+\'", "access": "\'+$(\'#access_'.$id.'\').val()+\'"}';
?>
<div class="row">
	<div class="span2">
		<h5><?= $main_class->getContent('registered_word'); ?>:</h5>
		<h6><?= $value["when"]; ?></h6>
	</div>
	<div class="span2 <?= ${error_name.$id} ?>">
		<input id="name_<?= $id ?>" class="input span2" value="<?= ${name.$id} ?>" />
	</div>
	<div class="span2 <?= ${error_email.$id} ?>">
		<input id="email_<?= $id; ?>" class="input span2" value="<?= ${email.$id} ?>" />
	</div>
	<div class="span3 <?= ${error_access.$id} ?>">
		<select id="access_<?= $id ?>" class="span3">
			<?
			foreach($accessLevels as $al_key => $al_value)
			{?>
				<option <?= ${post_access_.$al_key.$id} ?> value="<?= $al_key ?>"><?=$al_value["level"]; ?>: <?= $al_value["level_description"]; ?></option>
			<?}?>
			</select>
		</select>
	</div>
	<div class="span2">
		<button id="save_button_<?= $id ?>" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_user.php', 'save_button_<?= $id ?>', 'main_container')" class="btn btn-success span2 no-margin" class="btn btn-success span2 no-margin"><?= $main_class->getContent('save_word'); ?></button>
		<button id="delete_button_<?= $id ?>" onclick="showerp_alert('<?= htmlspecialchars($json_delete) ?>', 'save_user.php', 'delete_button_<?= $key ?>', 'main_container', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), ${name.$id})) ?>')" class="btn btn-danger span2 no-margin" type="button"><?= $main_class->getContent('delete_word'); ?></button>
	</div>
</div>
<hr>
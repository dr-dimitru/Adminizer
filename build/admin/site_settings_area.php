<? 
$json_delete = '{ "id": "'.$key.'", "delete": "delete" }';
$json_save = '{"id": "'.$key.'", "value": "\'+encodeURI($(\'#value_'.$key.'\').val())+\'", "name": "'.${name.$key}.'"}';
?>
<div class="row">
	<div class="span3" style="text-align:right">
		<h5><?= ${name.$key} ?></h5>
	</div>
	<div class="span3 <?= ${error_value_field_.$key} ?>">
		<input id="value_<?= $key ?>" class="span3" value="<?= htmlspecialchars(${value.$key}) ?>" />
	</div>
	<div class="span3 btn-group">
		<button id="save_button_<?= $key ?>" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'save_site_settings.php', 'save_button_<?= $key ?>', 'site_settings_<?= $key ?>')" class="btn btn-success" type="button"><?= $main_class->getContent('save_word'); ?></button>
		<button id="delete_button_<?= $key ?>" onclick="showerp_alert('<?= htmlspecialchars($json_delete) ?>', 'save_site_settings.php', 'delete_button_<?= $key ?>', 'site_settings_<?= $key ?>', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), ${name.$key})) ?>')" class="btn btn-danger" type="button"><?= $main_class->getContent('delete_word'); ?></button>
	</div>
</div>
<?= ${error_.$key} ?>
<?
unset(${value.$key});
unset(${name.$key});
?>
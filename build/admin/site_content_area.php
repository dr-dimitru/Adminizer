<? 
$json_delete = '{ "id": "'.$key.'", "delete": "delete" }';
$json_save = '{"id": "'.$key.'", "ru": "\'+encodeURI($(\'#ru_value_'.$key.'\').val())+\'", "en": "\'+encodeURI($(\'#en_value_'.$key.'\').val())+\'", "name": "'.${name.$key}.'"}';
?>
<div class="row">
	<div class="span3" style="text-align:right">
		<h5><?= ${name.$key} ?></h5>
	</div>
	<div class="span3 <?= ${error_ru_field_.$key} ?>">
		<input id="ru_value_<?= $key ?>" class="span3" value="<?= htmlspecialchars(${ru.$key}) ?>" />
	</div>
	<div class="span3 <?= ${error_en_field_.$key} ?>">
		<input id="en_value_<?= $key ?>" class="span3" value="<?= htmlspecialchars(${en.$key}) ?>" />
	</div>
	<div class="span3 btn-group">
		<button id="save_c_button_<?= $key ?>" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'save_site_content.php', 'save_c_button_<?= $key ?>', 'site_content_<?= $key ?>')" class="btn btn-success" type="button"><?= $main_class->getContent('save_word'); ?></button>
		<button id="delete_c_button_<?= $key ?>" onclick="showerp_alert('<?= htmlspecialchars($json_delete) ?>', 'save_site_content.php', 'delete_c_button_<?= $key ?>', 'site_content_<?= $key ?>', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), ${name.$key})) ?>')" class="btn btn-danger" type="button"><?= $main_class->getContent('delete_word'); ?></button>
	</div>
</div>
<?= ${error_cont.$key} ?>
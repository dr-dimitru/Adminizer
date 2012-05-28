<? 
$key = 'new'; 
$json_save = '{"id": "'.$key.'", "value": "\'+encodeURI($(\'#value_'.$key.'\').val())+\'", "name": "\'+encodeURI($(\'#name_'.$key.'\').val())+\'"}';
?>
<div class="well no-margin no-padding" style="padding: 20px 5px">
<div class="row">
	<div class="span3 <?= ${error_name_field_.$key} ?>">
		<h3 class="pull-left">+ <?= $main_class->getContent('add_new_word'); ?></h3>
		<div class="pull-right"><input id="name_<?= $key ?>" class="input input-small" value="<?= ${name.$key} ?>" /></div>
	</div>
	<div class="span3 <?= ${error_value_field_.$key} ?>">
		<input id="value_<?= $key ?>" class="input span3" value="<?= htmlspecialchars(${value.$key}) ?>" />
	</div>
	<div class="span2">
		<button id="save_button_<?= $key ?>" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'save_site_settings.php', 'save_button_<?= $key ?>', 'main_container')" class="btn btn-success span2" type="button"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
<?= ${error_.$key} ?>
</div>
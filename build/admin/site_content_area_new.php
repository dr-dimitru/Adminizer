<? 
$key = 'new'; 
$json_save = '{"id": "'.$key.'", "ru": "\'+encodeURI($(\'#ru_value_'.$key.'\').val())+\'", "en": "\'+encodeURI($(\'#en_value_'.$key.'\').val())+\'", "name": "\'+encodeURI($(\'#content_name_'.$key.'\').val())+\'"}';
?>
<div class="well no-margin no-padding" style="padding: 20px 5px">
<div class="row">
	<div class="span3 <?= ${error_site_cont_name_field_.$key} ?>">
		<h3 class="pull-left">+ <?= $main_class->getContent('add_new_word'); ?></h3>
		<div class="pull-right"><input id="content_name_<?= $key ?>" class="input input-small" value="<?= ${name.$id} ?>" /></div>
	</div>
	<div class="span3 <?= ${error_ru_field_.$key} ?>">
		<input id="ru_value_<?= $key ?>" class="span3" value="<?= htmlspecialchars(${ru.$key}) ?>" />
	</div>
	<div class="span3 <?= ${error_en_field_.$key} ?>">
		<input id="en_value_<?= $key ?>" class="span3" value="<?= htmlspecialchars(${en.$key}) ?>" />
	</div>
	<div class="span2">
		<button id="save_c_button_<?= $key ?>" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_site_content.php', 'save_c_button_<?= $key ?>', 'main_container')" class="btn btn-success" type="button"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
	<?= ${error_cont.$key} ?>
</div>
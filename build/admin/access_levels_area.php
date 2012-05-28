<?
$json_delete = '{ "id": "'.$key.'", "delete": "delete" }';
$json_save = '{"id": "'.$key.'", "desc": "\'+encodeURI($(\'#level_description_'.$key.'\').val())+\'", "status": "exist", "level": "\'+$(\'#level_'.$key.'\').val()+\'"}';
?>
<div class="span4">
	<div class="well pull-left">
		<h1><?= $count ?></h1>
	</div>
	<div class="form-vertical well pull-right span 2">
		<input onFocus="$('#save_btn_<?= $key ?>, #delete_btn_<?= $key ?>').fadeIn('slow');" id="level_<?= $key ?>" class="input input-mini" value="<?= $value["level"] ?>" />
		<input onFocus="$('#save_btn_<?= $key ?>, #delete_btn_<?= $key ?>').fadeIn('slow');" id="level_description_<?= $key ?>" class="input input-medium" value="<?= $value["level_description"] ?>" />
		<div>
			<button id="save_btn_<?= $key ?>" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'save_access_level.php', 'save_btn_<?= $key ?>', 'main_container')" style="display:none; min-width:15px" type="button" class="btn btn-mini btn-success"><i class="icon-ok icon-white"></i></button>
			<button id="delete_btn_<?= $key ?>" onclick="showerp_alert('<?= htmlspecialchars($json_delete) ?>', 'save_access_level.php', 'save_btn_<?= $key ?>', 'main_container', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), $title)) ?>')" style="display:none; min-width:15px" type="button" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i></button>
		</div>
	</div>
</div>
<?
$json_save = '{"id": "'.$key.'", "desc": "\'+encodeURI($(\'#level_description_'.$key.'\').val())+\'", "status": "new", "level": "\'+$(\'#level_'.$key.'\').val()+\'"}';
?>
<div class="row">
	<div class="span4">
		<h6>+ <?= $main_class->getContent('add_new_word'); ?></h6>
		<div class="well pull-left">
			<h1><?= ++$count ?></h1>
		</div>
		<div class="form-vertical well pull-right span 2">
			<input onFocus="$('#save_btn_<?= $key ?>').fadeIn('slow');" id="level_<?= $key ?>" class="input input-mini" />
			<input onFocus="$('#save_btn_<?= $key ?>').fadeIn('slow');" id="level_description_<?= $key ?>" class="input input-medium" />
			<div>
				<button id="save_btn_<?= $key ?>" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'save_access_level.php', 'save_btn_<?= $key ?>', 'main_container')" style="display:none; min-width:15px" type="button" class="btn btn-mini btn-success"><i class="icon-plus icon-white"></i></button>
			</div>
		</div>
	</div>
</div>
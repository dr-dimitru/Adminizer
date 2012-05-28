<? $json_save = '{"id": "'.$section_id.'", "title": "\'+encodeURI($(\'#title_'.$section_id.'\').val())+\'"}'; ?>
<div id="section_area_<?= $section_id ?>" class="row">
	<div class="span12">
		<div class="well">
			<button type="button" class="btn btn-primary btn-large" data-target="#new_section" data-toggle="modal">+ <?= $main_class->getContent('add_new_word'); ?></button>
		</div>
	</div>
</div>

<div id="new_section" class="modal fade">
	<div class="modal-header">
	 	<a class="close" data-dismiss="modal" >×</a>
		<h3>+ <?= $main_class->getContent('add_new_word'); ?></h3>
	</div>
	
	<div class="modal-body form-vertical">
		<div class="<?= ${error_title_field_.$section_id} ?>">
			<input id="title_<?= $section_id ?>" placeholder="<?= $main_class->getContent('title_word'); ?>" class="input input-xxlarge" />
			<?= ${error_.$section_id} ?>
		</div>
	</div>
	
	<div class="modal-footer">
		<button type="button" id="section_button_<?= $section_id ?>" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_section.php', 'section_button_<?= $section_id ?>', 'main_container'); $('#new_section').modal('hide')" style="margin:0px" class="btn btn-success pull-right no-margin"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
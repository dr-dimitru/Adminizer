<? 
$json_delete = '{ "id": "'.$section_id.'", "delete": "delete" }';
$json_save = '{"id": "'.$section_id.'", "title": "\'+encodeURI($(\'#title_'.$section_id.'\').val())+\'"}';

if(!$sections)
{
	$sections = $main_class->getSections($section_id);
	foreach($sections as $key => $value)
	{
		$section_id = $key;
	}
}
?>

<div class="row">
	<div class="span8 <?= ${error_title_field_.$section_id} ?>">
		<input id="title_<?= $section_id ?>" class="span8 x-large" value="<?= stripslashes($value["section_title"]) ?>" />
		<?= ${error_.$section_id} ?>
	</div>
	<div class="span4 btn-group">
		<button type="button" id="section_delete_button_<?= $section_id ?>" onclick="showerp_alert('<?= htmlspecialchars($json_delete); ?>', 'save_section.php', 'section_delete_button_<?= $section_id ?>', 'section_area_<?= $section_id ?>', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), $value["section_title"])) ?>')" style="margin:0px" class="btn btn-danger span2 no-margin"><?= $main_class->getContent('delete_word'); ?></button><button type="button" id="section_button_<?= $section_id ?>" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_section.php', 'section_button_<?= $section_id ?>', 'section_area_<?= $section_id ?>')" style="margin:0px" class="btn btn-success span2 no-margin"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
<hr>
<? 
require_once 'main_class.php';
$sections = $main_class->getSections();
?>
<select id="section_<?= $post_id ?>" class="span2">
	<option DISABLED value="0"><?= $main_class->getContent('select_section_word'); ?></option>
	<? 
	foreach($sections as $key => $value)
	{
	?>
	<option <?= ${post_section_.$key.$post_id} ?> value="<?= $key ?>"><?= $value["section_title"] ?></option>
	<?
	}
	?>
</select>
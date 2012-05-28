<? 
$json_save = '{"id": "'.$key.'", "value": "\'+$(\'#'.$value["name"].'\').val()+\'"}'; 
?>
<tr>
	<td>
		<?= $text ?>
	</td>
	<td>
	<?
	if($value["name"] == 'user_level')
	{
	?>
		<select id="<?= $value["name"] ?>" onchange="showerp('id=<?= $key ?>&value='+$('#<?= $value["name"] ?>').val(), 'save_promo_code_settings.php', 'aa_<?= $value['name'] ?>', 'aa_<?= $value['name'] ?>')">
		<?
		$accessLevels = $main_class->getAccessLevels();
		foreach($accessLevels as $al_key => $al_value)
		{?>
			<option <?= ${post_access_.$al_value["level"]} ?> value="<?= $al_key ?>"><?=$al_value["level"]; ?>: <?= $al_value["level_description"]; ?></option>
		<?}?>
		</select>
		<span id="aa_<?= $value['name'] ?>"></span>
	<?
	}
	else
	{
	?>
		<button <?= $button_content ?> onclick="if($('#<?= $value["name"] ?>').val() !== '1'){$('#<?= $value["name"] ?>').val('1'); $('#button_<?= $value['name'] ?>').addClass('btn-success') }else{$('#<?= $value["name"] ?>').val('0'); $('#button_<?= $value['name'] ?>').removeClass('btn-success') }; showerp('<?= htmlspecialchars($json_save) ?>', 'save_promo_code_settings.php', 'button_<?= $value['name'] ?>', 'button_<?= $value['name'] ?>')" >ON / OFF</button>
		<input type="hidden" id="<?= $value["name"] ?>" value="<?= $value["value"] ?>" />
	<?}?>
	</td>
</tr>
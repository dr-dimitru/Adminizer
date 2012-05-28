<? 
$id = 'new'; 
$json_save = '{"id": "'.$id.'", "name": "\'+encodeURI($(\'#name_'.$id.'\').val())+\'", "email": "\'+encodeURI($(\'#email_'.$id.'\').val())+\'", "access": "\'+$(\'#access_'.$id.'\').val()+\'", "password": "\'+encodeURI($(\'#password_'.$id.'\').val())+\'", "send_email": "\'+$(\'#send_email_'.$id.'\').val()+\'"}'; 
?>
<div class="well no-margin no-padding" style="padding: 20px 5px">
<div class="row">
	<div class="span2 <?= ${error_name.$id} ?>">
		<input id="name_<?= $id ?>" class="input span2" value="<?= ${name.$id} ?>" placeholder="<?= $main_class->getContent('name_ph'); ?>" />
	</div>
	<div class="span2">
		<div class="<?= ${error_email.$id} ?>">
			<input id="email_<?= $id; ?>" class="input span2" value="<?= ${email.$id} ?>" placeholder="<?= $main_class->getContent('email_ph'); ?>" />
		</div>
		<div class="<?= ${error_password.$id} ?>">
			<input id="password_<?= $id; ?>" class="input span2" value="<?= ${password.$id} ?>" placeholder="<?= $main_class->getContent('password_word'); ?>" />
		</div>
	</div>
	<div class="span3 <?= ${error_access.$id} ?>">
		<select id="access_<?= $id ?>" class="span3">
			<?
			foreach($accessLevels as $al_key => $al_value)
			{?>
				<option <?= ${post_access_.$al_key.$id} ?> value="<?= $al_key ?>"><?=$al_value["level"]; ?>: <?= $al_value["level_description"]; ?></option>
			<?}?>
			</select>
		</select>
	</div>
	<div class="span2">
		<button class="btn btn-primary" data-toggle="button" onclick="if($('#send_email_<?= $id ?>').val() !== '1'){$('#send_email_<?= $id ?>').val('1')}else{$('#send_email_<?= $id ?>').val('0')}"><?= $main_class->getContent('send_email_word'); ?></button>
		<input id="send_email_<?= $id ?>" value="0" type="hidden" />
	</div>
	<div class="span2">
		<button id="save_button_<?= $id ?>" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_user.php', 'save_button_<?= $id ?>', 'main_container')" class="btn btn-success span2 no-margin"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
</div>
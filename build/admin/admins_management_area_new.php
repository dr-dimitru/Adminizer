<? 
$id = 'new'; 
$json_save = '{"id": "'.$id.'", "name": "\'+encodeURI($(\'#name_'.$id.'\').val())+\'", "password": "\'+encodeURI($(\'#password_'.$id.'\').val())+\'", "access": "\'+$(\'#access_'.$id.'\').val()+\'"}';
?>
<div class="well">
<div class="row">
	<div class="span3 <?= ${error_name.$id} ?>">
		<input type="text" id="name_<?= $id ?>" class="input span3" value="<?= ${name.$id} ?>" placeholder="Login" />
	</div>
	<div class="span3 <?= ${error_password.$id} ?>">
		<input type="password" id="password_<?= $id ?>" class="input span3" value="<?= ${password.$id} ?>" placeholder="Password" />
	</div>
	<div class="span3 <?= ${error_access.$id} ?>">
		<input type="number" maxlength="2" min="1" max="777" id="access_<?= $id ?>" class="input input-small" value="<?= ${access.$id} ?>" placeholder="Access" />
	</div>
	<div class="span2">
		<button id="save_button_<?= $id ?>" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_admin.php', 'save_button_<?= $id ?>', 'main_container')" class="btn btn-success"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
<?= ${error_.$id} ?>
</div>
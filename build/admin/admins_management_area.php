<?
require_once 'main_class.php';
$main_class->checkAdmin(777);

$json = stripcslashes($_POST["data"]);
$json_arr = json_decode($json, true);

$id = $json_arr["id"];

$admin = $main_class->getAdmin($id);
if($admin)
{
	foreach($admin as $key => $value)
	{
		$id = $key;
		${name.$id} = $value["name"];
		${password.$id} = $value["password"];
		${access.$id} = $value["access"];
	}
}

$json_delete = '{ "id": "'.$id.'", "delete": "delete" }';
$json_save = '{"id": "'.$id.'", "name": "\'+encodeURI($(\'#name_'.$id.'\').val())+\'", "password": "\'+encodeURI($(\'#password_'.$id.'\').val())+\'", "access": "\'+$(\'#access_'.$id.'\').val()+\'"}';
?>
<div>
<div class="row">
	<div class="span3 <?= ${error_name.$id} ?>">
		<input type="text" id="name_<?= $id ?>" class="input span3" value="<?= ${name.$id} ?>" />
	</div>
	<div class="span3 <?= ${error_password.$id} ?>">
		<input type="password" id="password_<?= $id ?>" class="input span3" value="<?= ${password.$id} ?>" />
	</div>
	<div class="span3 <?= ${error_access.$id} ?>">
		<input type="number" maxlength="2" min="1" max="777" id="access_<?= $id ?>" class="input input-small" value="<?= ${access.$id} ?>" />
	</div>	
	<div class="span3 btn-group">
		<button id="save_button_<?= $id ?>" onclick="showerp('<?= htmlspecialchars($json_save); ?>', 'save_admin.php', 'save_button_<?= $id ?>', 'main_container')" class="btn btn-success" class="btn btn-success"><?= $main_class->getContent('save_word'); ?></button>
		<button id="delete_button_<?= $id ?>" onclick="showerp_alert('<?= htmlspecialchars($json_delete) ?>', 'save_admin.php', 'delete_button_<?= $key ?>', 'main_container', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), ${name.$id})) ?>')" class="btn btn-danger" type="button"><?= $main_class->getContent('delete_word'); ?></button>
	</div>
</div>
<?= ${error_.$id} ?>
</div>
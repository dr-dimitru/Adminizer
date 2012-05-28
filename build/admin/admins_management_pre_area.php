<?
$json_edit = '{"id": "'.$id.'"}';
?>
<div id="admin_a_<?= $id ?>">
<div class="row">
	<div class="span3 <?= ${error_name.$id} ?>">
		<h3><?= ${name.$id} ?></h3>
	</div>
	<div class="span3 <?= ${error_password.$id} ?>">
		<br>
	</div>
	<div class="span3 <?= ${error_access.$id} ?>">
		<h3><?= ${access.$id} ?></h3>
	</div>	
	<div class="span3 btn-group">
		<button id="edit_button_<?= $id ?>" onclick="showerp('<?= htmlspecialchars($json_edit); ?>', 'admins_management_area.php', 'edit_button_<?= $id ?>', 'admin_a_<?= $id ?>')" class="btn btn-success" class="btn btn-success"><?= $main_class->getContent('edit_word'); ?></button>
	</div>
</div>
<?= ${error_.$id} ?>
</div>
<hr>
<? 
$json_delete = '{ "id": "'.$key.'", "url": "'.$value["url"].'" }';
?>
<li id="media_<?= $key ?>" class="span3">
    <a class="thumbnail">
		<img src="<?= $value["url"] ?>" />
		<div class="caption" style="text-align:center;">
			<input class="input uneditable-input" style="width:242px" value="admin/<?= $value["url"] ?>" />
			<button onclick="showerp_alert('<?= htmlspecialchars($json_delete) ?>', 'delete_media.php', 'media_<?= $key ?>', 'media_<?= $key ?>', '<?= htmlspecialchars(sprintf($main_class->getContent('delete_warning'), $main_class->getContent('picture_word'))) ?>')" class="btn btn-danger btn-mini"><?= $main_class->getContent('delete_word'); ?></button>
		</div>
	</a>
</li>
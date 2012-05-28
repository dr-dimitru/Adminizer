<!--GALLERY MODAL-->
<div id="post_media_<?= $post_id ?>" class="modal fade">
	<div class="modal-header">
		<h3><?= ${post_title.$post_id} ?>: <?= $main_class->getContent('gallery_word'); ?> <small><?= $main_class->getContent('select_media_text'); ?></small></h3>
	</div>
	
	<div class="modal-body">
		<ul class="thumbnails">
<?
if($mediaFiles)
{
	foreach($mediaFiles as $key => $value)
	{
		?>
			<li id="<?= $key ?>" class="span2">
				<a href="#" onclick="$(this).find('.uploaded').toggle(); $('#selected_media_<?= $post_id ?>').toggleClass('<?= $key ?>'); $('#selected_media_<?= $post_id ?>').val($('#selected_media_<?= $post_id ?>').attr('class'));" class="thumbnail" style="position:relative">
					<img src="<?= $value["url"] ?>" />
		<?
		if(in_array($key, $post_media))
		{
			?>
					<span class="uploaded" style="display:block"></span>
			<?
			$selected_media = $selected_media.' '.$key;
		}
		else
		{
			?>
					<span class="uploaded" style=""></span>
			<?
		}
		?>
				</a>
			</li>
		<?
	}
}
?>
		</ul>
		<input id="selected_media_<?= $post_id ?>" type="hidden" class="<?= $selected_media ?>" style="display:none" value="<?= $selected_media ?>" />
	</div>
	<? unset($selected_media); ?>
	<div class="modal-footer">
		<button onclick="$('#post_media_<?= $post_id ?>').modal('hide'); showerp(showerp('<?= htmlspecialchars($json_save) ?>', 'save_post.php', 'post_button_<?= $post_id ?>', 'post_<?= $post_id ?>'));" class="btn btn-success pull-right"><?= $main_class->getContent('save_word'); ?></button>
	</div>
</div>
<ul class="thumbnails">
<? 
if($posts)
{
	foreach($posts as $key => $value)
	{
		if($value['post_access'] <= $user_access_level)
		{
			if($key != $id)
			{
			?>
				<div class="span3">
					<h2><a href="item.php?id=<?= $key ?>" title="<?= $main_class->getContent('read_all_word'); ?>" rel="tooltip" alt="<?= $main_class->getContent('read_all_word'); ?>"><?= $value["post_title"] ?></a></h2>
					<div class="mozaic_desc">
						<div class="mozaic_desc">
							<?= substr(strip_tags($value["post_text"]), 0, 600) ?><a class="continue_read" href="item.php?id=<?= $key ?>" title="<?= $main_class->getContent('read_all_word'); ?>" rel="tooltip" alt="<?= $main_class->getContent('read_all_word'); ?>">…<i class="icon-arrow-right"></i></a>
						</div>
					</div>
				</div>
<?}}}}?>
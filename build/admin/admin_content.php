<? require_once 'main_class.php'; ?>
<? if(!$main_p){?>
<ul class="nav nav-pills">
<?}?>
<li class="nav-header">
	<?= $main_class->getContent('management_word'); ?>
</li>
<li>
	<a class="" href="#" onclick="shower('posts.php', 'main_container', 'main_container')"><?= $main_class->getContent('post_word') ?></a>
</li>
<li>
	<a class="" href="#" onclick="shower('sections.php', 'main_container', 'main_container')"><?= $main_class->getContent('sections_word') ?></a>
</li>
<li>
	<a class="" href="media.php"><?= $main_class->getContent('media_lib_word') ?></a>
</li>
<? if(!$main_p){?>
</ul>
<?}?>
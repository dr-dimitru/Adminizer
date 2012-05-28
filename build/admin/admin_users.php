<? require_once 'main_class.php'; ?>
<? if(!$main_p){?>
<ul class="nav nav-pills">
<?}?>
<li class="nav-header">
	<?= $main_class->getContent('users_management_word'); ?>
</li>
<li <?= $abutton_users_management ?>>
	<a class="" href="#" onclick="shower('users_management.php', 'main_container', 'main_container')"><?= $main_class->getContent('users_management_word') ?></a>
</li>
<li <?= $abutton_admins_management ?>>
	<a class="" href="#" onclick="shower('admins_management.php', 'main_container', 'main_container')"><?= $main_class->getContent('adminds_management_word') ?></a>
</li>
<? if(!$main_p){?>
</ul>
<?}?>
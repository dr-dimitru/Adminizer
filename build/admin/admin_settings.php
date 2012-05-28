<? require_once 'main_class.php'; ?>
<? if(!$main_p){?>
<ul class="nav nav-pills">
<?}?>
<li class="nav-header">
	<?= $main_class->getContent('settings_word'); ?>
</li>
<li <?= $abutton_site_settings ?>>
	<a class="" href="#" onclick="shower('site_settings.php', 'main_container', 'main_container')"><?= $main_class->getContent('settings_word') ?></a>
</li>
<li <?= $abutton_access_levels ?>>
	<a class="" href="#" onclick="shower('access_levels.php', 'main_container', 'main_container')"><?= $main_class->getContent('privacy_levels') ?></a>
</li>
<li <?= $abutton_promo_code_management ?>>
	<a class="" href="#" onclick="shower('promo_code_management.php', 'main_container', 'main_container')"><?= $main_class->getContent('access_code_word') ?></a>
</li>
<? if(!$main_p){?>
</ul>
<?}?>
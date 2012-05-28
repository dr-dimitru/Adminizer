<div class="navbar navbar-fixed-top" style="margin-bottom:0px">
	<div class="navbar-inner">
		<ul class="nav">
			<a class="brand" href="."><img src="img/icon_bw.png" height="40" width="40" alt="Adminizer" title="Adminizer" /></a>
			<li class="divider-vertical"></li>
		</ul>
		<div class="container">
  			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    			<span class="icon-bar"></span>
    			<span class="icon-bar"></span>
    			<span class="icon-bar"></span>
    		</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $text_lang ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
					<?
						$languages = $language_main->get_languages();
						foreach($languages as $key => $value)
						{
							$fb_lang = $value['fb_lang'];
							$text_lang = $value['text_lang'];
							$lang_code = $value['lang_code'];
							?>
							<li class="<?= ${selected_.$lang_code} ?>" ><a href="index.php?<?= $lang_code ?>=1"><?= $text_lang ?></a></li>
							<?
						}
						unset($value);
						
					if(!empty($_SESSION['admin']))
					{
					?>
						</ul>
					</li>
					<li>
						<a href="#" onclick="shower('admin_content.php', 'main_container', 'main_container')"><?= $main_class->getContent('management_word') ?></a>
					</li>
					<li>
						<a href="#" onclick="shower('admin_users.php', 'main_container', 'main_container')"><?= $main_class->getContent('users_management_word') ?></a>
					</li>
					<li>
						<a href="#" onclick="shower('admin_settings.php', 'main_container', 'main_container')"><?= $main_class->getContent('settings_word') ?></a>
					</li>
					<?}?>
				</ul>
			</div>
			<? 
				if(empty($_SESSION['admin']))
				{
					?>
					<div class="nav-collapse pull-right">
						<ul class="nav">
							<li class="divider-vertical"></li>
							<li>
								<a href="#"><?= $main_class->getContent('login_word') ?></a>
							</li>
							<li class="divider-vertical"></li>
						</ul>
					</div>
					<?
				}
				else
				{
					?>
					<div class="nav-collapse pull-right">
						<ul class="nav">
							<li class="divider-vertical"></li>
							<li>
								<a href="#" onclick="shower('logout.php', 'main_container', 'main_container')"><?= $main_class->getContent('logout_word') ?></a>
							</li>
							<li class="divider-vertical"></li>
						</ul>
					</div>
					<?
				}
			?>
		</div>
	</div>
</div>
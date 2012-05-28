<? $login_query = '{ "login": "\'+$(\'#admin_login\').val()+\'", "password": "\'+$(\'#admin_password\').val()+\'" }'; ?>
<h3><?= $main_class->getContent('login_word') ?></h3>
<div class="form-inline input-prepend input-append">
	<span class="add-on"><i class="icon-user"></i></span><input id="admin_login" type="text" class="input span2" placeholder="<?= $main_class->getContent('name_word'); ?>" value="<?= $_COOKIE['admin_login'] ?>" /><input id="admin_password" type="password" class="input span2" placeholder="<?= $main_class->getContent('password_word'); ?>" value="<?= $_COOKIE['admin_password'] ?>" /><button style="min-width: 60px" id="login_button" onclick="showerp('<?= htmlspecialchars($login_query) ?>', 'login_action.php', 'login_button', 'status')" class="btn btn-primary" type="submit"><?= $main_class->getContent('login_action_word'); ?></button>
	<p class="help-block"><?= $main_class->getContent('login_annotation'); ?></p>
	<?= $error ?>
</div>
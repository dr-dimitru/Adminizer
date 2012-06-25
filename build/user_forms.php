<?
//UNCOMMENT LINES BELOW TO ADD LINKS TO FORMS
/*
<div class="pull-right" id="user_login_logout">
<h6>
if(!$_SESSION['user'])
{?>
	<!--<a href="#login_form" data-toggle="modal"><?= $main_class->getContent('login_word'); ?></a> | <a href="#registration_form" data-toggle="modal"><?= $main_class->getContent('registration_word'); ?></a>-->
<?}
else
{?>
	<!--<?= $_SESSION['user']['name'] ?> | <a id="logout_href" href="#" onclick="shower('user_logout.php', 'logout_href', 'user_login_logout')"><?= $main_class->getContent('logout_word'); ?></a>-->
<?}?>
</h6>
</div>
<?*/?>
<?
require_once 'user_login_form.php';
require_once 'user_registration_form.php';
require_once 'user_password_recovery.php';
?>
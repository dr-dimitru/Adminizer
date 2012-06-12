<?
	require_once 'user_class.php';
	
	$promo_active = $main_class->getPromoSettingsValueByName('active');
	$promo_on_login = $main_class->getPromoSettingsValueByName('on_login');
	
?>
<div id="login_form" class="modal fade">
	 <div class="modal-header">
	 	<a class="close" data-dismiss="modal" >×</a>
	    <h3><?= $main_class->getContent('login_word'); ?></h3>
	 </div>
	 <div class="modal-body form-horizontal">
	 	<fieldset>
	 		<div class="control-group">
		 		<label class="control-label" for="login">
	 				<?= $main_class->getContent('login_email_word'); ?>:
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="login" type="email" value="<?= $_COOKIE['login']; ?>" />
	 			</div>
	 		</div>
	 	</fieldset>
	 	<fieldset>
	 		<div class="control-group">
	 			<label class="control-label" for="password">
	 				<?= $main_class->getContent('password_word'); ?>: 
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="password" type="password" value="<?= $_COOKIE['password']; ?>" />
	 			</div>
	 		</div>
	 	</fieldset>
	 		<?
	 		if($promo_active == 1 && $promo_on_login == 1)
	 		{
	 			$json_data = '{"login": "\'+encodeURI($(\'#login\').val())+\'", "password": "\'+encodeURI($(\'#password\').val())+\'", "promo": "\'+encodeURI($(\'#promo_code\').val())+\'"}';
	 		?>
	 	<fieldset>
	 		<div class="control-group">
	 			<label class="control-label" for="promo_code">
	 				<?= $main_class->getContent('promo_code_word'); ?>: 
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="promo_code" type="text" />
	 				<p class="help-block"><?= $main_class->getContent('promo_code_annotation'); ?></p>
	 			</div>
	 		</div>
	 	</fieldset>
	 		<?
	 		}
	 		else
	 		{
	 			$json_data = '{"login": "\'+encodeURI($(\'#login\').val())+\'", "password": "\'+encodeURI($(\'#password\').val())+\'"}';
	 		}
	 		?>
	 	<div id="login_action"></div>
	 </div>
	 <div class="modal-footer">
	 	<a href="#pass_recovery_form" class="pull-left" onclick="$('#login_form').modal('hide')" data-toggle="modal"><?= $main_class->getContent('pass_recovery_word'); ?></a>
	    <a href="#" onclick="showerp('<?= htmlspecialchars($json_data); ?>', 'user_login.php', 'login_action', 'login_action')" class="btn btn-primary"><?= $main_class->getContent('login_action_word'); ?></a>
	 </div>
</div>
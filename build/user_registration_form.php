<?
	require_once 'user_class.php';
	
	$promo_active = $main_class->getPromoSettingsValueByName('active');
	$promo_on_signup = $main_class->getPromoSettingsValueByName('on_registration');
?>
<div id="registration_form" class="modal fade">
	 <div class="modal-header">
	 	<a class="close" data-dismiss="modal" >×</a>
	    <h3><?= $main_class->getContent('registration_word'); ?></h3>
	 </div>
	 <div class="modal-body form-horizontal">
	 	<fieldset>
	 		<div class="control-group">
	 	 		<label class="control-label" for="reg_login">
	 				<?= $main_class->getContent('login_email_word'); ?>: 
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="reg_login" type="email" value="" />
	 			</div>
	 		</div>
	 	</fieldset>
	 	<fieldset>
	 		<div class="control-group">
	 	 		<label class="control-label" for="name">
	 				<?= $main_class->getContent('name_word'); ?>: 
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="name" type="text" value="" />
	 			</div>
	 		</div>
	 	</fieldset>
	 	<fieldset>
	 		<div class="control-group">
	 	 		<label class="control-label" for="reg_password">
	 				<?= $main_class->getContent('password_word'); ?>: 
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="reg_password" type="password" value="" />
	 			</div>
	 		</div>
	 	</fieldset>
	 	<fieldset>
	 		<div class="control-group">
	 	 		<label class="control-label" for="re_password">
	 				<?= $main_class->getContent('re_password_word'); ?>: 
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="re_password" type="password" value="" />
	 			</div>
	 		</div>
	 	</fieldset>
	 	<?
	 	if($promo_active == 1 && $promo_on_signup == 1)
	 	{
	 		$json_data = '{"login": "\'+encodeURI($(\'#reg_login\').val())+\'", "name": "\'+encodeURI($(\'#name\').val())+\'", "password": "\'+encodeURI($(\'#reg_password\').val())+\'", "re_password": "\'+encodeURI($(\'#re_password\').val())+\'", "promo": "\'+encodeURI($(\'#reg_promo_code\').val())+\'"}';
	 	?>
	 	<fieldset>
	 		<div class="control-group">
	 	 		<label class="control-label" for="reg_promo_code">
	 				<?= $main_class->getContent('promo_code_word'); ?>: 
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="reg_promo_code" type="text" />
	 				<p class="help-block"><?= $main_class->getContent('promo_code_annotation'); ?></p>
	 			</div>
	 		</div>
	 	</fieldset>
	 	<?
	 	}
	 	else
	 	{
	 		$json_data = '{"login": "\'+encodeURI($(\'#reg_login\').val())+\'", "name": "\'+encodeURI($(\'#name\').val())+\'", "password": "\'+encodeURI($(\'#reg_password\').val())+\'", "re_password": "\'+encodeURI($(\'#re_password\').val())+\'"}';
	 	}
	 	?>
	 	<div id="registration_action"></div>
	 </div>
	 <div class="modal-footer">
	 	<a href="#pass_recovery_form" class="pull-left" onclick="$('#registration_form').modal('hide')" data-toggle="modal"><?= $main_class->getContent('pass_recovery_word'); ?></a>
	    <a href="#" onclick="showerp('<?= htmlspecialchars($json_data); ?>', 'user_registration.php', 'registration_action', 'registration_action')" class="btn btn-primary"><?= $main_class->getContent('registration_action_word'); ?></a>
	 </div>
</div>
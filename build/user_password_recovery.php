<?
	require_once 'user_class.php';
	
	$promo_active = $main_class->getPromoSettingsValueByName('active');
	$promo_on_login = $main_class->getPromoSettingsValueByName('on_login');
	
?>
<div id="pass_recovery_form" class="modal fade">
	 <div class="modal-header">
	 	<a class="close" data-dismiss="modal" >×</a>
	    <h3><?= $main_class->getContent('pass_recovery_word'); ?></h3>
	 </div>
	 <div class="modal-body form-horizontal">
	 	<fieldset>
	 		<div class="control-group">
		 		<label class="control-label" for="email">
	 				<?= $main_class->getContent('login_email_word'); ?>:
	 			</label>
	 			<div class="controls">
	 				<input class="input" id="email" type="email" value="<?= $_COOKIE['login']; ?>" />
	 			</div>
	 		</div>
	 	</fieldset>
	 	<?
	 		$json_data = '{"email": "\'+encodeURI($(\'#email\').val())+\'"}';
	 	?>
	 	<div id="recovery_action"></div>
	 </div>
	 <div class="modal-footer">
	    <a href="#" onclick="showerp('<?= htmlspecialchars($json_data); ?>', 'user_password_recovery_action.php', 'recovery_action', 'recovery_action')" class="btn btn-primary"><?= $main_class->getContent('pass_recovery_action_word'); ?></a>
	 </div>
</div>
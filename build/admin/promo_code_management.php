<? 
require_once 'main_class.php';
$main_class->checkAdmin();
$promoSettings = $main_class->getPromoSettings();
?>
<div class="page-header">
	<h1><?= $main_class->getContent('access_code_word'); ?></h1>
</div>
<div class="row">
	<div class="span5">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th colspan="2">
						<?= $main_class->getContent('access_code_main_word'); ?>
					</th>
				</tr>
			</thead>
			<? 
			foreach($promoSettings as $key => $value)
			{
				if($value["name"] == 'on_registration')
				{
					$text = $main_class->getContent('promo_on_registration_word');
				}
				if($value["name"] == 'on_login')
				{
					$text = $main_class->getContent('promo_on_login_word');
				}
				if($value["name"] == 'active')
				{
					$text = $main_class->getContent('promo_active_word');
					$promo_active = $value["value"];
				}
				if($value["value"] == 1)
				{
					$button_content = " id='button_".$value['name']."' type='button' data-toggle='button' class='btn btn-success active span2'";
				}
				
				if($value["value"] == 0)
				{
					$button_content = " id='button_".$value['name']."' type='button' data-toggle='button' class='btn span2'";
				}
				
				if($value["name"] == 'user_level')
				{
					$text = $main_class->getContent('promo_user_level');
					unset($button_content);
					${post_access_.$value['value']} = 'SELECTED';
				}
				require 'promo_code_settings_table.php';
			}
		?>
		</table>
		
		<hr>
		
	<?
		if($promo_active == 1)
		{
			$json_save = '{"qty": "\'+$(\'#generator_qty\').val()+\'", "length": "\'+$(\'#generator_length\').val()+\'"}'; 
	?>
		<div id="promo_generator">
			<div class="form-horizontal">
				<fieldset>
					<legend><?= $main_class->getContent('promo_generator_word'); ?></legend>
					<div class="control-group">
						<label class="control-label" for="generator_qty"><?= $main_class->getContent('qty_word'); ?></label>
						<div class="controls">
							<input id="generator_qty" min="1" max="99" class="input input-mini" type="number" maxlength="2" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="generator_length"><?= $main_class->getContent('length_word'); ?></label>
						<div class="controls">
							<input id="generator_length" min="1" max="99" class="input input-mini" type="number" maxlength="2" />
						</div>
					</div>
					<div class="form-actions">
						<button type="button" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'promo_code_generator.php', 'promo_codes', 'promo_codes')" class="btn btn-primary"><?= $main_class->getContent('generate_word'); ?></button>
					</div>
				</fieldset>
			</div>
		</div>
	<?}?>
	</div>
	<div class="span1" style="background-color: #F9F9F9; height:100%">
		<br>
	</div>
	<div id="promo_zone" class="span6">
	<? 
	if($promo_active == 1)
	{
		$promoCodes = $main_class->getPromoCodes();
		$json_save = '{"code": "\'+$(\'#manual_promo_code\').val()+\'", "length": "\'+$(\'#generator_length\').val()+\'"}';
	?>
		
		<div id="promo_adder">
			<div class="form-horizontal">
				<fieldset>
					<legend><?= $main_class->getContent('promo_add_code_word'); ?></legend>
					<div class="control-group">
						<label class="control-label" for="manual_promo_code"><?= $main_class->getContent('promo_insert_promo_code'); ?></label>
						<div class="controls">
							<input id="manual_promo_code" class="input" type="text" maxlength="99" />
						</div>
					</div>
					<div class="form-actions">
						<button type="button" onclick="showerp('<?= htmlspecialchars($json_save) ?>', 'promo_code_man_add.php', 'promo_codes', 'promo_codes')" class="btn btn-primary"><?= $main_class->getContent('add_new_word'); ?></button>
					</div>
				</fieldset>
			</div>
		</div>
		
		<hr>
		
		<div id="promo_codes">
			<? require_once 'promo_code_table.php'; ?>
		</div>
	<?}?>
	</div>
</div>
<hr>
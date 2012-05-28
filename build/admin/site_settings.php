<? 
require_once 'main_class.php';
$main_class->checkAdmin();
$site_settings = $main_class->getSiteSettings();
?>
<div class="row">
	<div class="span3">
		<? require_once 'sidebar.php'; ?>
	</div>
	<div class="span9">
		<div class="page-header">
			<h1><?= $main_class->getContent('settings_word'); ?></h1>
			<span class="label label-warning"><?= $main_class->getContent('change_warning_message'); ?></span>
		</div>
		<div class="row">
			<div class="span9">
				<h3><?= $main_class->getContent('usage_word'); ?></h3>
				<p><?= $main_class->getContent('site_settings_usage'); ?></p>
			</div>
		</div>
		<?
		require_once 'site_settings_area_new.php';
		
		foreach($site_settings as $key => $value)
		{
			${value.$key} = $value["value"];
			${name.$key} = $value["name"];
			
			?>
			<div id="site_settings_<?= $key ?>">
			<?
			require 'site_settings_area.php';
			?>
			</div>
			<?
		}
		?>
	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="page-header">
			<h1><?= $main_class->getContent('site_content_word'); ?></h1>
			<span class="label label-warning"><?= $main_class->getContent('change_warning_message'); ?></span>
		</div>
		<div class="row">
			<div class="span12">
				<h3><?= $main_class->getContent('usage_word'); ?></h3>
				<p><?= $main_class->getContent('site_content_usage'); ?></p>
			</div>
		</div>
		
		<?
		require 'site_content_area_new.php';
		
		$content = $main_class->getAllContent();
		foreach($content as $key => $value)
		{
			${name.$key} = $value["name"];
			${ru.$key} = $value["ru"];
			${en.$key} = $value["en"];
			
			?>
			<div id="site_content_<?= $key ?>">
			<?
			require 'site_content_area.php';
			?>
			</div>
			<?
		}
		?>
	</div>
</div>
<script>
	prettyPrint();
</script>
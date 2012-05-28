<? 
require_once 'main_class.php';
$main_class->checkAdmin();
$accessLevels = $main_class->getAccessLevels();
?>
<div class="row">
	<div class="span3">
		<? require_once 'sidebar.php'; ?>
	</div>
	<div class="span9">
		<div class="page-header">
			<h1><?= $main_class->getContent('privacy_levels'); ?> </h1>
			<span class="label label-warning"><?= $main_class->getContent('change_warning_message'); ?></span>
		</div>
		<div class="row">
			<?
				$count = 0;
				foreach($accessLevels as $key => $value)
				{
					++$count;
					if(!empty($value["level_description"]))
					{ 
						$title = $value["level_description"]; 
					}
					else
					{ 
						$title =  $value["level"];
					}
					
					require 'access_levels_area.php';	
				}
			++$key;
			?>
		</div>
		<hr>
		<? require_once 'access_levels_area_new.php'; ?>
	</div>
</div>
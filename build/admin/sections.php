<? 
require_once 'main_class.php'; 
$main_class->checkAdmin();

if(empty($_SESSION['admin']))
{
	require_once 'not_logged_in.php'; 
}
else
{
	$section_id = 'new';
?>
	<div class="page-header">
		<h1><?= $main_class->getContent('sections_word'); ?></h1>
	</div>
<? 
	require_once 'section_area_new.php';
	unset($section_id); 
	
	$sections = $main_class->getSections();
	if($sections)
	{
		foreach($sections as $key => $value)
		{
			$section_id = $key;
			?>
			<div id="section_area_<?= $section_id ?>">
			<?
			require 'section_area.php';
			?>
			</div>
			<?
		}
		unset($section_id);
		unset($value);
	}
}

if($section_save_error == 1)
{
?>
<script>
	$(document).ready(
		function(){
			$('#new_section').modal('show');
		}
	);
</script>
<?}?>
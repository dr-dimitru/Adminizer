<? 
require_once 'main_class.php'; 
?>
<div class="row-fluid">
	<div class="span12">
		<div class="hero-unit">
			<h1>Adminizer<sup style="color:#999999; font-weight:400;">CMS</sup></h1>
			<p><?= $main_class->getContent('adminizer_welcome'); ?></p>
			
			<div class="well" id="status">
				<? require_once 'login_area.php'; ?>
			</div>
		</div>	
	</div>
	<div class="span3"><br></div>
</div>
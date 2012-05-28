<? require_once 'main_class.php'; ?>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<? require_once 'head.php'; ?>
	</head>
	<body id="body">
		<? require_once 'menu.php'; ?>
		<div id="main_container" class="container">
		<div class="page-header">
			<h1><?= $main_class->getContent('media_lib_word'); ?></h1>
		</div>
		<?
			if(empty($_SESSION['admin']))
			{
				require_once 'not_logged_in.php'; 
			}
			else
			{
				$main_class->checkAdmin();
				?>
			<div class="row">
				<div class="span12">
					<div id="dropbox" class="well">
						<div id="message" class="alert alert-info">
							<?= $main_class->getContent('drop_box_message'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="page-header">
			<h1><?= $main_class->getContent('gallery_word'); ?></h1>
		</div>
		<div class="row">
			<div class="span12">
				<ul class="thumbnails">
<?
	$mediaFiles = $main_class->getMedia();
	if($mediaFiles)
	{
		foreach($mediaFiles as $key => $value)
		{
			require 'media_container.php';
		}
	}
?>
				</ul>
			</div>
		</div>
		<?
			}	
		?>
	</div>
		<? require_once 'footer.php'; ?>
		<script src="js/jquery.filedrop.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>
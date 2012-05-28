<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<? 
require_once 'user_class.php'; 
require_once 'head.php';
?>

<body>
	<? require_once 'header.php' ?>
	<hr>
	<div id="main_container" class="container">
		<div class="row">
			<div class="span12">
				<div class="welcome_text hero-unit">
					<h1><img src="img/icon.png" height="64" width="64" atl="logo" title="logo" />dminizer<sup style="color:#999999; font-weight:400;">CMS</sup></h1>
					<?= $main_class->getContent('adminizer_welcome'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<? require_once 'posts_mozaic.php'; ?>
			</div>
		</div>
	</div>
	<? require_once 'footer.php'; ?>
</body>
</html>
<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<? 
require_once 'user_class.php'; 
require_once 'head.php';
?>

<body>
	<? require_once 'header.php' ?>
	<? require_once 'user_forms.php' ?>
	<hr>
	<div id="main_container" class="container">
		<div class="row">
			<div class="span12">
				<div class="welcome_text hero-unit">
					<h1><img src="img/icon.png" height="94" width="94" alt="adminizer_logo" title="adminizer_logo" />dminizer<sub style="color:#999999; font-weight:400; font-size:25px">CMS</sub></h1>
					<?= $main_class->getContent('adminizer_welcome'); ?>
					
					<div style="margin: 40px auto;">
					  <a href="https://github.com/dr-dimitru/Adminizer" onclick=" _gaq.push(['_trackEvent', 'github', 'go_to_github', 'View on GitHub']);" class="btn btn-info btn-large"><i class="icon-magnet icon-white"></i> <?= $main_class->getContent('view_on_gh_word'); ?></a>
					  
					  <a  href="http://adminizer.veliovgroup.com/admin" onclick=" _gaq.push(['_trackEvent', 'demo', 'go_to_demo', 'Test admin side']);" class="btn btn-success btn-large"><i class="icon-play icon-white"></i> <?= $main_class->getContent('try_it_word'); ?></a>
					  
					  <a  href="http://adminizer.veliovgroup.com/build/build.zip" onclick=" _gaq.push(['_trackEvent', 'download', 'download_click', 'Download Adminizer']);" class="btn btn-inverse btn-large"><i class="icon-download-alt icon-white"></i> <?= $main_class->getContent('download_admin_word'); ?></a>
					</div>
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
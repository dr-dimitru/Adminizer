<!DOCTYPE HTML>
<!--
____________________________________________________________________________
_________////////////////////////////////////////////////////|_____________
________////////////////////////////////////////////////////||____________
_______//|              Adminizer CMS              |///////|||////////////\
______///|       WE'RE PROWIDE HIGH-QUALITY        |//////||||///////////_\\
_____////|_AND_NON-COMMERCIAL_SERVICES_FOR_PEOPLE__|/////|||||//////////_\\\\
____/////|     CONTACT AUTHOR: INFOatVELIOV.COM;   |////||||||/////////_\\\\\\
___//////|        SaaS APPS AND DEVELOPMENT.       |///|||||||////////_\\\\\\\\
__///////|           (c) VeliovGroup.com           |//||||||||///////_\\\\\\\\\\
_////////////////////////////////////////////////////|||||||||//////_\\\\\\\\\\\\
////////////////////////////////////////////////////||||||||||/////_\\\\\\\\\\\\\\
_________|||||||||||||||||||||||||||||||||||||||||||||||||||||////_\\\\\\\\\\\\\\\\
_________|||||||||||||||||||||||||||||||||||||||||||||||||||||///_\\\\\\\\\\\\\\\\\\
_________|||||||||||||||||||||||||||||||||||||||||||||||||||||//_\\\\\\\\\\\\\\\\\\\\
______________________________________________________________________________________
-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html itemscope itemtype="http://schema.org/WebPage" xmlns:og="http://ogp.me/ns#" style="padding:0px; margin:0px;" class="no-js" lang="<?= $fb_lang ?>"> <!--<![endif]-->
	<head>
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!-- META TAGS -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="<?= PAGES_CHARSET ?>" />
		
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" href="img/icon.png">
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<link rel="stylesheet" type="text/css" href="admin/js/google-code-prettify/prettify.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="admin/js/modernizr-2.5.3.min.js"></script>
		
		<meta name="creator" content="<?= $main_class->getSiteSettings('meta_creator'); ?>" />
		<meta name="description" content="<?= $main_class->getContent('meta_description'); ?>" />
		<meta name="keywords" content="<?= $main_class->getSiteSettings('meta_tags'); ?>" />
		<!-- END META TAGS -->
		
		<!-- G+ TAGS -->
		<meta itemprop="name" content="<?= $main_class->getContent('site_title') ?>" />
		<meta itemprop="image" content="<?= SITE_URL ?>/img/logo.png" />
		<meta itemprop="url" content="<?= SITE_URL ?>" />
		<meta itemprop="description" content="<?= $main_class->getContent('meta_description') ?>" />
		<!-- END G+ TAGS -->
		
		<!-- FaceBook Open Graph -->
		<meta id="ogtitle" property="og:title" content="<?= $main_class->getContent('site_title'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?= SITE_URL ?>" />
		<meta property="og:image" content="<?= SITE_URL ?>/img/logo_sq.png" />
		<meta property="fb:app_id" content="367108623351010" />
		<meta id="ogname" property="og:site_name" content="<?= $main_class->getContent('site_title'); ?>" />
		<meta id="ogdesc" property="og:description" content="<?= $main_class->getContent('meta_description'); ?>" />
		<!--END FaceBook Open Graph-->
		
		<!-- STYLES AND OTHER HEAD STUFF -->
		<title><?= $main_class->getContent('site_title'); ?></title>
		
		<?
		require_once 'js.php';
		
		$googleID = $main_class->getSiteSettings('google_analytics');
		
		if($googleID)
		{?>
		
		<script>
		  var _gaq=[['_setAccount','<?= $googleID ?>'],['_trackPageview']];
		  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		  s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		
		<?}?>
		<!-- END STYLES AND OTHER HEAD STUFF -->
		
	</head>	
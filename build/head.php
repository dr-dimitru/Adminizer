<? 
require_once 'head_styles.php'; 
require_once 'js.php'; 
?>
		
		<meta name="author" content="<?= $main_class->getSiteSettings('meta_creator'); ?>" />
		<meta name="description" content="<?= $main_class->getContent('meta_description'); ?>" />
		<meta name="keywords" content="<?= $main_class->getSiteSettings('meta_tags'); ?>" />
		<!-- END META TAGS -->
		
		<!-- G+ TAGS -->
		<meta itemprop="name" content="<?= $main_class->getContent('site_title') ?>" />
		<meta itemprop="image" content="<?= SITE_URL ?>/img/logo_sq.png" />
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
		
		<title><?= $main_class->getContent('site_title'); ?></title>
		
	</head>	
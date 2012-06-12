<? 
require_once 'head_styles.php'; 
require_once 'js.php';
?>

		<meta name="author" content="<?= $main_class->getSiteSettings('meta_creator'); ?>" />
		<meta name="description" content="<?= trim(htmlspecialchars(strip_tags($value['post_text']))); ?>" />
		<meta name="keywords" content="<?if(!$value['tags']){ echo $main_class->getSiteSettings('meta_tags');}else{ echo $value['tags']; } ?>" />
		<!-- END META TAGS -->
		
		<!-- G+ TAGS -->
		<meta itemprop="name" content="<?= $main_class->getContent('site_title') ?>" />
		<?
		//LOOK UP FOR IMAGES RELATED TO THIS POST
		if($mediaFiles && $post_media)
		{
			foreach($mediaFiles as $media_key => $media_value)
			{
				if(in_array($media_key, $post_media))
				{
				?>
			<meta itemprop="image" content="<?= SITE_URL.'/admin/'.$media_value["url"] ?>" />
			<?
				break;
				}
			}
		}
		else //IF NO IMAGES SETUP DEFAULT LOGO
		{?>
			<meta itemprop="image" content="<?= SITE_URL ?>/img/logo_sq.png" />
		<?}?>
		<meta itemprop="url" content="<?= SITE_URL ?>" />
		<meta itemprop="description" content="<?= $main_class->getContent('meta_description') ?>" />
		<!-- END G+ TAGS -->
		
		<!-- FaceBook Open Graph -->
		<meta id="ogtitle" property="og:title" content="<?= $main_class->getContent('site_title'); ?> · <?= $value['post_title']; ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?= SITE_URL ?><?= $_SERVER['REQUEST_URI'] ?>" />
		<?
		//LOOK UP FOR IMAGES RELATED TO THIS POST
		if($mediaFiles && $post_media)
		{
			foreach($mediaFiles as $media_key => $media_value)
			{
				if(in_array($media_key, $post_media))
				{
				?>
			<meta property="og:image" content="<?= SITE_URL.'/admin/'.$media_value["url"] ?>" />
			<?
				break;
				}
			}
		}
		else //IF NO IMAGES SETUP DEFAULT LOGO
		{?>
			<meta property="og:image" content="<?= SITE_URL ?>/img/logo_sq.png" />
		<?}?>
		<meta property="fb:app_id" content="367108623351010" />
		<meta id="ogname" property="og:site_name" content="<?= $main_class->getContent('site_title'); ?>" />
		<meta id="ogdesc" property="og:description" content="<?= trim(htmlspecialchars(strip_tags($value['post_text']))); ?>" />
		<!--END FaceBook Open Graph-->
		
		<title><?= $main_class->getContent('site_title'); ?> · <?= $value['post_title']; ?></title>
		
	</head>	
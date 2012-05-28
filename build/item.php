<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<? 
require_once 'user_class.php';

$id = $_GET['id'];
$post = $main_class->getPosts($id);
$mediaFiles = $main_class->getMedia();
if($post)
{
	foreach($post as $key => $value)
	{
		$post_media = explode(",", $value["media"]);
	}
	require_once 'item_head.php';
}
else
{
	require_once 'head.php';
}

$posts = $main_class->getPosts();
?>

<body>
	<? require_once 'header.php' ?>
	
	<div id="main_container" class="container">
		<?if($id && $post){?>
		<div class="row">
			<div class="span12">
				<div class="page-header">
					<h1><?= $value["post_title"] ?> <small><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?= SITE_URL ?><?= $_SERVER['REQUEST_URI'] ?>" data-count="horizontal" data-via="VeliovGroup" data-related="<?= $value['post_title']; ?>">Tweet</a></small></h1>
				</div>
				<div class="row">
					<div class="span12">
							<?= $value["post_text"]; ?>
					</div>
				</div>
			</div>
		</div>
		<?}else{?>
		<div class="row">
			<div class="span12">
				<div class="page-header well">
					<h1><?= $main_class->getContent('no_page'); ?></h1>
				</div>
			</div>
		</div>
		<?}?>
		<div class="row">
			<div class="span12">
				<div class="page-header">
					<h1><?= $main_class->getContent('more_word'); ?></h1>
				</div>
				<? require_once 'posts_mozaic_static.php'; ?>
			</div>
		</div>
	</div>
	<? require_once 'footer.php'; ?>
</body>
</html>
<div class="row">
	<div class="span12">
		<div class="page-header">
			<h1><?
			if(!$value["qr_code"])
			{
				echo '<img src="'.$filename.'" alt="'.$main_class->getContent('site_title').' · '.$value['post_title'].'" title="'.$main_class->getContent('site_title').' · '.$value['post_title'].'" />';
			}
			else
			{
				echo '<img src="'.$value["qr_code"].'" alt="'.$main_class->getContent('site_title').' · '.$value['post_title'].'" title="'.$main_class->getContent('site_title').' · '.$value['post_title'].'" />';
			}
		?><?= $value["post_title"] ?> <small class="tweet-btn"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?= SITE_URL ?><?= $_SERVER['REQUEST_URI'] ?>" data-count="horizontal" data-via="VeliovGroup" data-related="<?= $value['post_title']; ?>">Tweet</a> <a href="#" class="g-plusone" data-size="medium" data-href="<?= SITE_URL ?><?= $_SERVER['REQUEST_URI'] ?>"></a></small></h1>
		</div>
		<div class="row">
			<div class="span12">
					<?= $value["post_text"]; ?>
			</div>
		</div>
	</div>
</div>
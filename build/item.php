<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<? 
require_once 'user_class.php';

//GET POST'S ID AND CALL FOR POST'S DATA ARRAY
$id = $_GET['id'];

if(!$id)
{
	$page_name = str_replace("%20", " ", "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
	$page_name = str_replace(SITE_URL."/item.php/", "", $page_name); 
	$id = $user_class->getPageByName($page_name);
	
	if($id)
	{
		die(header('Location: '.SITE_URL.'/item.php?id='.$id));
	}
	
	if(!$id)
	{
		die(header('Location: '.SITE_URL.'/item.php?id='.md5(time())));
	}
}

$post = $main_class->getPosts($id);

//CALL FOR ALL MEDIA ARRAY
$mediaFiles = $main_class->getMedia();
if($post && $id)
{
	foreach($post as $key => $value)
	{
		//CREATE POSTS'S MEDIA ARRAY FROM STRING
		if($value["media"])
		{
			$post_media = explode(",", $value["media"]);
		}
	}
	
	if(!$value["qr_code"])
	{	
		//CALL TO CREATE QR-CODE IF DOES NOT EXIST
		$filename = $main_class->addQRCode($id);
	}
	
	//ITEM HEAD WITH IMAGES, TITLE, DESC & ETC.
	require_once 'item_head.php';
}
else
{
	//STANDART HEAD FOR WRONG POST $ID
	require_once 'head.php';
}

//CALL ALL POSTS ARRAY FOR POSTS_MOZAIC_STATIC
$posts = $main_class->getPosts();

//REQUIRE BODY CONTAINER
require 'item_container.php';
?>
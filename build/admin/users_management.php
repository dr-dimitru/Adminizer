<?php
require_once 'main_class.php';
$main_class->checkAdmin();

$accessLevels = $main_class->getAccessLevels();
$users = $main_class->getUser();
?>
<div class="page-header">
	<h1><?= $main_class->getContent('users_management_word'); ?></h1>
	<h6><?= $main_class->getContent('users_word'); ?>: <span class="badge badge-info"><?= count($users); ?></span></h6>
</div>

<?
require_once 'users_management_area_new.php';

if($users)
{
	foreach($users as $key => $value)
	{
		$id = $key;
		${name.$id} = $value["name"];
		${email.$id} = $value["email"];
		${password.$id} = $value["password"];
		${post_access_.$value["access"].$id} = 'SELECTED';
	
		require 'users_management_area.php';
	}
}
?>
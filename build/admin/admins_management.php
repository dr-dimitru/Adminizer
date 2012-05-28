<?php
require_once 'main_class.php';
$main_class->checkAdmin();

$admins = $main_class->getAdmin();
?>
<div class="page-header">
	<h1><?= $main_class->getContent('adminds_management_word'); ?></h1>
</div>

<?
require_once 'admins_management_area_new.php';

if($admins)
{
	foreach($admins as $key => $value)
	{
		$id = $key;
		${name.$id} = $value["name"];
		${password.$id} = $value["password"];
		${access.$id} = $value["access"];
		
		if(${error_.$id})
		{
			require 'admins_management_area.php';
		}
		else
		{
			require 'admins_management_pre_area.php';
		}
	}
}
?>
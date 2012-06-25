<?php
/*
 *  ADMINIZER CMS™
 *
 *
 *  Copyright 2012 Veliov Group: Dmitriy A. Golev
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 
 
 user_class.php - MAIN FILE FOR USERS SIDE.
 
 REQUIRES: admin/main_class.php
           
 AFTER THIS FILE YOU WILL HAVE GLOBAL VARIABLES:
 $user_access_level - CURRENT USERS ACCESS_LEVEL (1 - BY DAFAULT)
 $user_class - OBJECT OF user_class() CLASS.
 */
require_once 'admin/main_class.php';

if(isset($_SESSION['user']['access']))
{
	$user_access_level = $_SESSION['user']['access'];
}
else
{
	$user_access_level = 1;
}

$user_class = new user_class;

class user_class{
	
	private $mysqli;
	
	public function __construct()
	{
		$this->mysqli = new mysqli(HOSTNAME,USERNAME,PASSWORD,DBNAME);
		$this->mysqli->set_charset(MYSQL_CHARSET);
	}
	
	public function getPostsBySection($id=null)
	{
		global $lang_code;
		
		$getSections_query = "SELECT * FROM `".SQLPREFIX."posts` WHERE `section` = ? and `lang` = ? ; ";
			
		if($stmt = $this->mysqli->prepare($getSections_query))
		{
			$stmt->bind_param('is', $id, $lang_code);
			$stmt->execute();
			$stmt->bind_result($post_id, $post_title, $post_text, $post_when, $post_access, $post_section, $media, $qr_code, $lang, $tags);
			
			while($stmt->fetch())
			{
				$posts[$post_id] = array('post_title' => $post_title, 'post_text' => $post_text, 'post_when' => $post_when, 'post_access' => $post_access, 'post_section' => $post_section, 'qr_code' =>$qr_code, 'media' => $media, 'tags' => $tags);
			}
					$stmt->close();
		}
		
		return $posts;
	}
	
	public function getPageByName($needle)
	{
		$needle = "%".$needle."%";
		$getPageByName_query = "SELECT `id` FROM `".SQLPREFIX."posts` WHERE `title` LIKE ? LIMIT 0,1 ; ";
		
		if($stmt = $this->mysqli->prepare($getPageByName_query))
		{
			$stmt->bind_param('s', $needle);
			$stmt->execute();
			$stmt->bind_result($pid);
			
			while($stmt->fetch())
			{
				$id = $pid;
			}
			
			$stmt->close();
		}
		
		return $id;
	}

}
?>
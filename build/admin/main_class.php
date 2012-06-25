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
 
 
 main_class.php - MAIN FILE, CONTAINS ALL FUNCTIONS AND SETTINGS.
 
 REQUIRES: settings.php
           lang_switcher.php
           
 AFTER THIS FILE YOU WILL HAVE GLOBAL VARIABLES:
 $content_names - ARRAY OF ALL CONTENT
 $main_class - OBJECT OF main() CLASS.
 LANGCODE - CONSTANT OF LANGUAGE CODE LIKE "en"
 */

require_once 'settings.php';
require_once 'lang_switcher.php';
define("LANGCODE", $lang_code, true);

//GET ALL CONTENT QUERY
	$name_query = "SELECT `id`, `name`, `".LANGCODE."` FROM `".SQLPREFIX."content` ; ";
	if($stmt = $mysqli->prepare($name_query))
	{
		$stmt->execute();
		$stmt->bind_result($content_id, $content_name, $content);
		
		while($stmt->fetch())
		{
			$content_names[$content_name] = array('content' => $content);
		}
		$stmt->close();
	}
//END ALL CONTENT QUERY

//MAIN CLASS
$main_class = new main;

class main {
	
	//MYSQLI
	private $mysqli;
	
	public function __construct()
	{
		$this->mysqli = new mysqli(HOSTNAME,USERNAME,PASSWORD,DBNAME);
		$this->mysqli->set_charset(MYSQL_CHARSET);
	}
	//END MYSQLI
	
	
	//CONTENT FUNCTIONS
	public function deleteAllContent($id)
	{
		$deleteAllContent_query = "DELETE QUICK FROM `".SQLPREFIX."content` WHERE `id` = ? ; ";
		if($stmt = $this->mysqli->prepare($deleteAllContent_query))
		{
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
		}

	}
	
	public function saveAllContent($name, $ru, $en)
	{
		$saveAllContent_query = "INSERT INTO `".SQLPREFIX."content` (`name`, `ru`, `en`) VALUES (?, ?, ?) ; ";
		if($stmt = $this->mysqli->prepare($saveAllContent_query))
		{
			$stmt->bind_param('sss', $name, $ru, $en);
			$stmt->execute();
			$stmt->close();
		}

	}
	
	public function updateAllContent($ru, $en, $id)
	{
		$updateAllContent_query = "UPDATE `".SQLPREFIX."content` SET `ru` = ?, `en` = ? WHERE `id` = ?; ";
		if($stmt = $this->mysqli->prepare($updateAllContent_query))
		{
			$stmt->bind_param('ssi', $ru, $en, $id);
			$stmt->execute();
			$stmt->close();
		}

	}
	
	public function getAllContent()
	{
		$getAllContent_query = "SELECT * FROM `".SQLPREFIX."content` ; ";
		if($stmt = $this->mysqli->prepare($getAllContent_query))
		{
			$stmt->execute();
			$stmt->bind_result($id, $name, $ru, $en);
			
			while($stmt->fetch())
			{
				$content[$id] = array('name' => $name, 'ru' => $ru, 'en' => $en);
			}
			$stmt->close();
		}
		
		return $content;
	}
	
	public function getContent($target)
	{
		global $content_names;
		
		foreach($content_names as $key => $value)
		{
			if($key == $target)
			{
				$content = $value['content'];
				break;
			}
		}
		return $content;
	}
	//END CONTENT FUNCTIONS
	
	
	//MEDIA FUNCTIONS
	public function deleteMedia($id, $url)
	{
		global $main_class;
		
		$file = str_replace(SITE_URL, '', $url);
		unlink($file);
		
		$deleteMedia_query = "DELETE QUICK FROM `".SQLPREFIX."media` WHERE `id` = ? ";
		if($stmt = $this->mysqli->prepare($deleteMedia_query))
		{
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
		}
		
		echo $main_class->getContent('deleted_word');
	}
	
	public function getMedia()
	{
		$getMedia_query = "SELECT * FROM `".SQLPREFIX."media`; ";	
		if($stmt = $this->mysqli->prepare($getMedia_query))
		{
			$stmt->execute();
			$stmt->bind_result($id, $url, $name);
				
			while($stmt->fetch())
			{
				$mediaFiles[$id] = array('url' => $url, 'name' => $name);
			}
			$stmt->close();
		}
		return $mediaFiles;
	}
	
	public function getMediaFileByUrl($url)
	{
		$getMediaFileByUrl_query = "SELECT * FROM `".SQLPREFIX."media` WHERE `url` = ? ; ";	
		if($stmt = $this->mysqli->prepare($getMediaFileByUrl_query))
		{
			$stmt->bind_param('s', $url);
			$stmt->execute();
			$stmt->bind_result($id, $url, $name);
				
			while($stmt->fetch())
			{
				$mediaFile[$id] = array('url' => $url, 'name' => $name);
			}
			$stmt->close();
		}
		return $mediaFile;
	}
	
	public function addMediaFile($url, $name=null)
	{
		global $main_class;
		$media_exist = $main_class->getMediaFileByUrl($url);
		
		if(empty($media_exist))
		{
			$addMediaFile_query = "INSERT INTO `".SQLPREFIX."media` (`url`, `name`) VALUES (?, ?) ; ";
			if($stmt = $this->mysqli->prepare($addMediaFile_query))
			{
				$stmt->bind_param('ss', $url, $name);
				$stmt->execute();
				$stmt->close();
			}
		}
	}
	//END MEDIA FUNCTIONS
	
	
	//PROMOCODE FUNCTIONS
	public function getPromoCodeByEmail($email)
	{
		$getPromoCodes_query = "SELECT * FROM `".SQLPREFIX."promocodes` WHERE `owner` = ? ; ";	
		if($stmt = $this->mysqli->prepare($getPromoCodes_query))
		{
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->bind_result($id, $code, $used, $owner);
				
			while($stmt->fetch())
			{
				$promoCodes[$id] = array('code' => $code, 'used' => $used, 'owner' => $owner);
			}
			$stmt->close();
		}
		return $promoCodes;
	}
	
	public function getPromoCodeData($code)
	{
		$getPromoCodes_query = "SELECT * FROM `".SQLPREFIX."promocodes` WHERE `code` = ? ; ";	
		if($stmt = $this->mysqli->prepare($getPromoCodes_query))
		{
			$stmt->bind_param('s', $code);
			$stmt->execute();
			$stmt->bind_result($id, $code, $used, $owner);
				
			while($stmt->fetch())
			{
				$promoCodes[$id] = array('code' => $code, 'used' => $used, 'owner' => $owner);
			}
			$stmt->close();
		}
		return $promoCodes;
	}
	
	public function updatePromoCode($code, $owner)
	{
		$addPromoCode_query = "UPDATE `".SQLPREFIX."promocodes` SET `used` = '1', `owner` = ? WHERE `code` = ? ; ";
		if($stmt = $this->mysqli->prepare($addPromoCode_query))
		{
			$stmt->bind_param('ss', $owner, $code);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function addPromoCode($code)
	{
		$addPromoCode_query = "INSERT INTO `".SQLPREFIX."promocodes` (`code`) VALUES (?) ; ";
		if($stmt = $this->mysqli->prepare($addPromoCode_query))
		{
			$stmt->bind_param('s', $code);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function getPromoCodes()
	{
		$getPromoCodes_query = "SELECT * FROM `".SQLPREFIX."promocodes` ; ";	
		if($stmt = $this->mysqli->prepare($getPromoCodes_query))
		{
			$stmt->execute();
			$stmt->bind_result($id, $code, $used, $owner);
				
			while($stmt->fetch())
			{
				$promoCodes[$id] = array('code' => $code, 'used' => $used, 'owner' => $owner);
			}
			$stmt->close();
		}
		return $promoCodes;
	}
	
	
		//PROMOCODE SETTINGS FUNCTIONS
		public function savePromoSettings($id, $value)
		{
			$savePromoSettings_query = "UPDATE `".SQLPREFIX."promo_settings` SET `value` = ? WHERE `id` = ? ; ";
			if($stmt = $this->mysqli->prepare($savePromoSettings_query))
			{
				$stmt->bind_param('ii', $value, $id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function getPromoSettingsValueByName($name)
		{
			$getPromoSettings_query = "SELECT `value` FROM `".SQLPREFIX."promo_settings` WHERE `name` = ? ; ";	
			if($stmt = $this->mysqli->prepare($getPromoSettings_query))
			{
				$stmt->bind_param('s', $name);
				$stmt->execute();
				$stmt->bind_result($value);
					
				while($stmt->fetch())
				{
					$promoSettings = $value;
				}
				$stmt->close();
			}
			return $promoSettings;
		}
		
		public function getPromoSettings()
		{
			$getPromoSettings_query = "SELECT * FROM `".SQLPREFIX."promo_settings` ; ";	
			if($stmt = $this->mysqli->prepare($getPromoSettings_query))
			{
				$stmt->execute();
				$stmt->bind_result($id, $name, $value);
					
				while($stmt->fetch())
				{
					$promoSettings[$id] = array('name' => $name, 'value' => $value);
				}
				$stmt->close();
			}
			return $promoSettings;
		}
		//END PROMOCODE SETTINGS FUNCTIONS
	//END PROMOCODE FUNCTIONS
	
	
	//USERS FUNCTIONS
	public function deleteUser($id)
	{
		$deleteUser_query = "DELETE QUICK FROM `".SQLPREFIX."users` WHERE `id` = ? ; ";
		
		if($stmt = $this->mysqli->prepare($deleteUser_query))
		{
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close(); 
		}
	}
	
	public function updateUser($name, $email, $access, $id)
	{
		$updateUser_query = "UPDATE `".SQLPREFIX."users` SET `name` = ?, `email` = ?, `access` = ? WHERE `id` = ? ; ";
		if($stmt = $this->mysqli->prepare($updateUser_query))
		{
			$stmt->bind_param('ssii', $name, $email, $access, $id);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function registerUser($name, $email, $password, $access)
	{
		$password = md5($password);
		
		$registerUser_query = "INSERT INTO `".SQLPREFIX."users` (`name`, `email`, `password`, `access`) VALUES (?, ?, ?, ?) ; ";
		if($stmt = $this->mysqli->prepare($registerUser_query))
		{
			$stmt->bind_param('sssi', $name, $email, $password, $access);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function getUser($email=null)
	{
		if(empty($email))
		{
			$getUser_query = "SELECT * FROM `".SQLPREFIX."users` ; ";	
			if($stmt = $this->mysqli->prepare($getUser_query))
			{
				$stmt->execute();
				$stmt->bind_result($id, $name, $email, $password, $access, $when);
					
				while($stmt->fetch())
				{
					$user[$id] = array('name' => $name, 'email' => $email, 'password'=>$password, 'access'=>$access, 'when'=>$when);
				}
				$stmt->close();
			}
		}
		else
		{
			$getUser_query = "SELECT * FROM `".SQLPREFIX."users` WHERE `email` = ? ; ";	
			if($stmt = $this->mysqli->prepare($getUser_query))
			{
				$stmt->bind_param('s', $email);
				$stmt->execute();
				$stmt->bind_result($id, $name, $email, $password, $access, $when);
					
				while($stmt->fetch())
				{
					$user[$id] = array('name' => $name, 'email' => $email, 'password'=>$password, 'access'=>$access, 'when'=>$when);
				}
				$stmt->close();
			}
		}
		return $user;
	}
	//END USERS FUNCTIONS
	
	
	//ACCESS LEVELS FUNCTIONS
	public function deleteAccessLevel($id)
	{
		$deleteAccessLevel_query = "DELETE QUICK FROM `".SQLPREFIX."accessLevels` WHERE `id` = ? ; ";
		
		if($stmt = $this->mysqli->prepare($deleteAccessLevel_query))
		{
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close(); 
		}
	}
	
	public function getAccessLevels()
	{
		global $lang_code;
		
		$getAccessLevels_query = "SELECT `id`, `level`, `description_".$lang_code."` FROM `".SQLPREFIX."accessLevels` ; ";	
		if($stmt = $this->mysqli->prepare($getAccessLevels_query))
		{
			$stmt->execute();
			$stmt->bind_result($level_id, $level, $level_description);
				
			while($stmt->fetch())
			{
				$levels[$level_id] = array('level' => $level, 'level_description' => $level_description);
			}
			$stmt->close();
		}
		return $levels;
	}
	
	public function saveAccessLevel($level, $level_desc, $level_status, $level_id=null)
	{
		global $lang_code;
		
		if($level_status == 'exist')
		{
			$saveAccessLevel_query = "UPDATE `".SQLPREFIX."accessLevels` SET `level` = ? , `description_".$lang_code."` = ? WHERE `id` = ? ; ";
			if($stmt = $this->mysqli->prepare($saveAccessLevel_query))
			{
				$stmt->bind_param('isi', $level, $level_desc, $level_id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		if($level_status == 'new')
		{
			$saveAccessLevel_query = "INSERT INTO `".SQLPREFIX."accessLevels` (`level`, `description_".$lang_code."`) VALUES(?, ?) ; ";
			if($stmt = $this->mysqli->prepare($saveAccessLevel_query))
			{
				$stmt->bind_param('is', $level, $level_desc);
				$stmt->execute();
				$stmt->close();
			}
		}
	}
	//END ACCESS LEVELS FUNCTIONS
	
	
	//QRCODE FUNCTIONS
	public function addQRCode($post_id)
	{
		include "phpqrcode/qrlib.php";
		
		//QR-Code SETTINGS
			$filename = $post_id.'_post.png';
			$errorCorrectionLevel = 'H';
			$matrixPointSize = 1;
			$PNG_WEB_DIR = './admin/uploads/';
			$filename = $PNG_WEB_DIR.$filename;
			$QR_data = SITE_URL.'/item.php?id='.$post_id;
			
		//RUN QR-Code GENERATION
			QRcode::png($QR_data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		//ADD QR-Code INTO DB
		$addQRCode_query = "UPDATE `".SQLPREFIX."posts` SET `qr_code` = ? WHERE `id` = ? ; ";
		if($stmt = $this->mysqli->prepare($addQRCode_query))
		{
			$stmt->bind_param('si', $filename, $post_id);
			$stmt->execute();
			$stmt->close();
		}
		
		return $filename;
	}
	
	public function createQRCode($QR_data)
	{
		include "phpqrcode/qrlib.php";
		
		//QR-Code SETTINGS
			$filename = 'qr_'.$time().'.png';
			$errorCorrectionLevel = 'H';
			$matrixPointSize = 1;
			$PNG_WEB_DIR = './admin/uploads/';
			$filename = $PNG_WEB_DIR.$filename;
			
		//RUN QR-Code GENERATION
			QRcode::png($QR_data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		return $filename;
	}
	
	//END QRCODE FUNCTIONS
	
	
	//POSTS FUNCTIONS
	public function deletePost($post_id)
	{
		$deletePost_query = "DELETE QUICK FROM `".SQLPREFIX."posts` WHERE `id` = ? ; ";
		
		if($stmt = $this->mysqli->prepare($deletePost_query))
		{
			$stmt->bind_param('i', $post_id);
			$stmt->execute();
			$stmt->close(); 
		}
	}
	
	public function updatePost($post_title, $post_text, $post_section, $post_access, $post_id, $media, $tags)
	{
		$updatePost_query = "UPDATE `".SQLPREFIX."posts` SET `title` = ? , `text` = ? , `section` = ? , `access` = ?, `media` = ?, `tags` = ? WHERE `id` = ? ; ";
		if($stmt = $this->mysqli->prepare($updatePost_query))
		{
			$stmt->bind_param('ssiissi', $post_title, $post_text, $post_section, $post_access, $media, $tags, $post_id);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function addNewPost($post_title, $post_text, $post_section, $post_access)
	{
		global $lang_code;
		
		$addNewPost_query = "INSERT INTO `".SQLPREFIX."posts` (`title`, `text`, `section`, `access`, `lang`) VALUES (?, ?, ?, ?, ?)  ; ";
	
		if($stmt = $this->mysqli->prepare($addNewPost_query))
		{
			$stmt->bind_param('ssiis', $post_title, $post_text, $post_section, $post_access, $lang_code);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function getPosts($id=null)
	{
		global $lang_code;
		
		if(empty($id))
		{
			$getPosts_query = "SELECT * FROM `".SQLPREFIX."posts` WHERE `lang` = ? ; ";
		
			if($stmt = $this->mysqli->prepare($getPosts_query))
			{
				$stmt->bind_param('s', $lang_code);
				$stmt->execute();
				$stmt->bind_result($post_id, $post_title, $post_text, $post_when, $post_access, $post_section, $media, $qr_code, $lang_code, $tags);
				
				while($stmt->fetch())
				{
					$posts[$post_id] = array('post_title' => $post_title, 'post_text' => $post_text, 'post_when' => $post_when, 'post_access' => $post_access, 'post_section' => $post_section, 'qr_code' => $qr_code, 'media' => $media, 'tags' => $tags);
				}
				$stmt->close();
			}
		}
		else
		{
			$getPosts_query = "SELECT * FROM `".SQLPREFIX."posts` WHERE `id` = ? ; ";
			
				if($stmt = $this->mysqli->prepare($getPosts_query))
				{
					$stmt->bind_param('i', $id);
					$stmt->execute();
					$stmt->bind_result($post_id, $post_title, $post_text, $post_when, $post_access, $post_section, $media, $qr_code, $lang, $tags);
					
					while($stmt->fetch())
					{
						$posts[$post_id] = array('post_title' => $post_title, 'post_text' => $post_text, 'post_when' => $post_when, 'post_access' => $post_access, 'post_section' => $post_section, 'qr_code' => $qr_code, 'media' => $media, 'tags' => $tags);
					}
					$stmt->close();
				}
		}
		
		return $posts;
	}
	//END POSTS FUNCTIONS
	
	
	//SECTIONS FUNCTIONS
	public function deleteSection($section_id)
	{
		$deleteSection_query = "DELETE QUICK FROM `".SQLPREFIX."section` WHERE `id` = ? ; ";
		
		if($stmt = $this->mysqli->prepare($deleteSection_query))
		{
			$stmt->bind_param('i', $section_id);
			$stmt->execute();
			$stmt->close(); 
		}
	}
	
	public function updateSection($section_id, $title)
	{
		$updateSection_query = "UPDATE `".SQLPREFIX."section` SET `title` = ? WHERE `id` = ? ; ";
		if($stmt = $this->mysqli->prepare($updateSection_query))
		{
			$stmt->bind_param('si', $title, $section_id);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function addNewSection($title)
	{
		global $lang_code;
		
		$addNewSection_query = "INSERT INTO `".SQLPREFIX."section` (`title`, `lang`) VALUES (?, ?)  ; ";
	
		if($stmt = $this->mysqli->prepare($addNewSection_query))
		{
			$stmt->bind_param('ss', $title, $lang_code);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function getSections($id=null)
	{
		global $lang_code;
		
		if(empty($id))
		{
			$getSections_query = "SELECT `id`, `title` FROM `".SQLPREFIX."section` WHERE `lang` = ? ; ";
		
			if($stmt = $this->mysqli->prepare($getSections_query))
			{
				$stmt->bind_param('s', $lang_code);
				$stmt->execute();
				$stmt->bind_result($section_id, $section_title);
				
				while($stmt->fetch())
				{
					$sections[$section_id] = array('section_title' => $section_title);
				}
				$stmt->close();
			}
		}
		else
		{
			$getSections_query = "SELECT `id`, `title` FROM `".SQLPREFIX."section` WHERE `id` = ? ; ";
			
				if($stmt = $this->mysqli->prepare($getSections_query))
				{
					$stmt->bind_param('i', $id);
					$stmt->execute();
					$stmt->bind_result($section_id, $section_title);
					
					while($stmt->fetch())
					{
						$sections[$section_id] = array('section_title' => $section_title);
					}
					$stmt->close();
				}
		}
		
		return $sections;
	}
	//END SECTIONS FUNCTIONS
	
	
	//SITE SETTINGS FUNCTIONS
	public function deleteSiteSettings($id)
	{
		$SiteSettings_query = "DELETE QUICK FROM `".SQLPREFIX."site_settings` WHERE `id` = ? ; ";
		
		if($stmt = $this->mysqli->prepare($SiteSettings_query))
		{
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close(); 
		}
	}
	
	public function saveSiteSettings($id, $value, $name=null)
	{
		if($id == 'new')
		{
			$saveSiteSettings_query = "INSERT INTO `".SQLPREFIX."site_settings` (`name`, `value`) VALUES(?, ?) ; ";
			if($stmt = $this->mysqli->prepare($saveSiteSettings_query))
			{
				$stmt->bind_param('ss', $name, $value);
				$stmt->execute();
				$stmt->close();
			}
		}
		else
		{
			$saveSiteSettings_query = "UPDATE `".SQLPREFIX."site_settings` SET `value` = ? WHERE `id` = ? ; ";
			if($stmt = $this->mysqli->prepare($saveSiteSettings_query))
			{
				$stmt->bind_param('si', $value, $id);
				$stmt->execute();
				$stmt->close();
			}
		}
	}
	
	public function getSiteSettings($name=null)
	{
		if(empty($name))
		{
			$getSiteSettings_query = "SELECT * FROM `".SQLPREFIX."site_settings`; ";
			
			if($stmt = $this->mysqli->prepare($getSiteSettings_query))
			{
				$stmt->execute();
				$stmt->bind_result($id, $name, $value);
					
				while($stmt->fetch())
				{
					$siteSettings[$id] = array('name' => $name, 'value' => $value);
				}
				$stmt->close();
			}
			return $siteSettings;
		}
		else
		{
			$getSiteSettings_query = "SELECT `value` FROM `".SQLPREFIX."site_settings` WHERE `name` = ? ; ";
		
			if($stmt = $this->mysqli->prepare($getSiteSettings_query))
			{
				$stmt->bind_param('s', $name);
				$stmt->execute();
				$stmt->bind_result($value);	
				while($stmt->fetch())
				{
					$siteSettings = $value;
				}
				$stmt->close();
			}
			return $siteSettings;
		}	
	}
	//END SITE SETTINGS FUNCTIONS
	
	
	//USER LOGIN/LOGOUT FUNCTIONS
	public function userLogin($login, $level=null)
	{
		global $main_class;
		
		$user_data = $main_class->getUser($login);
		foreach($user_data as $value)
		{
			if(empty($level))
			{
				$_SESSION['user']['access'] = $value['access'];
			}
			else
			{
				$_SESSION['user']['access'] = $level;
			}
			$_SESSION['user']['name'] = $value['name'];
			$_SESSION['user']['email'] = $value['email'];
			
			setcookie("login", $value['email'], time()+60*60*24*15);
			setcookie("password", $value['password'], time()+60*60*24*15);
		}
		
	}
	
	public function userLogout()
	{
		unset($_SESSION["user"]);
	}
	
	public function userPasswordRecovery($email, $password)
	{
		$userPasswordRecovery_query = "UPDATE `".SQLPREFIX."users` SET `password` = ? WHERE `email` = ? ; ";
		if($stmt = $this->mysqli->prepare($userPasswordRecovery_query))
		{
			$stmt->bind_param('ss', $password, $email);
			$stmt->execute();
			$stmt->close();
		}
	}
	//END USER LOGIN/LOGOUT FUNCTIONS
	
	
	//ADMIN FUNCTIONS
	public function deleteAdmin($id)
	{
		$deleteUser_query = "DELETE QUICK FROM `".SQLPREFIX."admin` WHERE `id` = ? ; ";
		
		if($stmt = $this->mysqli->prepare($deleteUser_query))
		{
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close(); 
		}
	}
	
	public function updateAdmin($name, $password, $access, $id)
	{
		if(strlen($password) !== 32)
		{
			$password = md5($password);
		}
		
		$updateUser_query = "UPDATE `".SQLPREFIX."admin` SET `name` = ?, `password` = ?, `access` = ? WHERE `id` = ? ; ";
		if($stmt = $this->mysqli->prepare($updateUser_query))
		{
			$stmt->bind_param('ssii', $name, $password, $access, $id);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function saveAdmin($name, $password, $access)
	{
		$password = md5($password);
		
		$registerUser_query = "INSERT INTO `".SQLPREFIX."admin` (`name`, `password`, `access`) VALUES (?, ?, ?) ; ";
		if($stmt = $this->mysqli->prepare($registerUser_query))
		{
			$stmt->bind_param('ssi', $name, $password, $access);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	public function getAdmin($id=null)
	{
		if($id)
		{
			$login_query = "SELECT * FROM `".SQLPREFIX."admin` WHERE `id`= ? ; ";	
			if ($stmt = $this->mysqli->prepare($login_query))
			{
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($id, $name, $password, $access);	
				while($stmt->fetch())
				{
					$admin[$id] = array("name" => $name, "access" => $access, "password" => $password);
				}
				$stmt->close();
			}
		}
		else
		{
			$login_query = "SELECT * FROM `".SQLPREFIX."admin` ; ";	
			if ($stmt = $this->mysqli->prepare($login_query))
			{
				$stmt->execute();
				$stmt->bind_result($id, $name, $password, $access);	
				while($stmt->fetch())
				{
					$admin[$id] = array("name" => $name, "access" => $access, "password" => $password);
				}
				$stmt->close();
			}
		}
		
		return $admin;
	}
	
	public function login($name, $password)
	{
		if(strlen($password) !== 32)
		{
			$password = md5($password);
		}
			
		$login_query = "SELECT * FROM `".SQLPREFIX."admin` WHERE `name`= ? and `password`= ? ; ";	
		if ($stmt = $this->mysqli->prepare($login_query))
		{
			$stmt->bind_param('ss', $name, $password);
			$stmt->execute();
			$stmt->store_result();
			$login = $stmt->num_rows;
			if($login)
			{
				$stmt->bind_result($id, $name, $password, $access);	
				while($stmt->fetch())
				{
					$admin[$id] = array("name" => $name, "access" => $access);
				}
			}
			$stmt->close();
		}
		
		if($login >= 1)
		{
			$_SESSION["admin"] = $access;
			setcookie("admin_login", $name, time()+60*60*24*15);
			setcookie("admin_password", $password, time()+60*60*24*15);
			
			return 'success';
		}
		else
		{
			return 'fail';
		}
	}
	
	public function logout()
	{
		unset($_SESSION["admin"]);
	}
	
	public function checkAdmin($level=null)
	{
		if(empty($_SESSION['admin']))
		{
			global $main_class;
			die($main_class->getContent('logged_out_warning'));
		}
		
		if($level)
		{
			if($_SESSION['admin'] !== $level)
			{
				global $main_class;
				die($main_class->getContent('permissions_denied'));
			}
		}
	}
	//END ADMIN FUNCTIONS
	
	
	//SEND EMAIL FUNCTION
	public function send_email($email, $message, $subject)
	{
		global $main_class;
		global $default_files_encoding;
		
		$site_noreply_email = $main_class->getSiteSettings("no-reply_email");
		$site_email = $main_class->getSiteSettings("no-site_email");
		$site_title = $main_class->getContent("site_title");
		
		$headers = 'Content-type: text/html; charset='.$default_files_encoding."\r\n";
		$headers .= 'From: '.$site_title.' <'.$site_noreply_email.'>' . "\r\n";
		$headers .= 'Bcc: '.$site_title.' <'.$site_email.'>' . "\r\n";
		
		mail($email, $subject, $message, $headers);
	}
	//END SEND EMAIL FUNCTION
}
?>
<?php
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
			$stmt->bind_result($post_id, $post_title, $post_text, $post_when, $post_access, $post_section, $media, $lang);
			
			while($stmt->fetch())
			{
				$posts[$post_id] = array('post_title' => $post_title, 'post_text' => $post_text, 'post_when' => $post_when, 'post_access' => $post_access, 'post_section' => $post_section, 'media' => $media);
			}
					$stmt->close();
		}
		
		return $posts;
	}

}
?>
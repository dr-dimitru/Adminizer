<?php
$language_main = new language_class();
class language_class{
	
	public function get_languages()
		{
			global $mysqli;
			
			$get_languages_query = "SELECT `id`, `lang`, `fb_lang`, `text_lang` FROM `".SQLPREFIX."lang_table` ; ";
			if ($stmt = $mysqli->prepare($get_languages_query))
			{
				$stmt->execute();
				$stmt->bind_result($lang_id, $lang_code, $fb_lang, $text_lang);
				
				while($stmt->fetch())
				{
					$languages[$lang_id] = array('fb_lang' => $fb_lang, 'text_lang' => $text_lang, 'lang_code' => $lang_code);
				}
				$stmt->close();
			}
			
			return $languages;
		}
	
	public function get_lang_params($lang, $activate=null)
		{
			global $language_main;
			session_register('language');
			
			if($activate == true)
			{
				$_SESSION['language'] = $lang;
				setcookie("lang", $lang, time()+60*60*24*15);
			}
			$languages = $language_main->get_languages();
			
			foreach($languages as $key => $value)
			{
				$langs[] = $value["lang_code"];
				
				if($lang == $value["lang_code"])
				{
					$fb_lang = $value['fb_lang'];
					$text_lang = $value['text_lang'];
					$lang_code = $value['lang_code'];
				}
			}
			unset($value);
			
			$lang_params = array($lang_code, $fb_lang, $text_lang);
			return $lang_params;
		}
}

	$languages = $language_main->get_languages();
	foreach($languages as $key => $value)
	{
		if(!empty($_GET[$value["lang_code"]]) || !empty($_POST[$value["lang_code"]]))
		{
			$lang_params = $language_main->get_lang_params($value["lang_code"], true);
			
			break;
		}
	}
	unset($value);
	
	if(empty($lang_params))
	{
		session_register('language');
		if(!empty($_COOKIE['lang']))
		{
			$_SESSION['language'] = $_COOKIE['lang'];
		}
		
		if(isset($_SESSION['language']))
		{
			$lang_params = $language_main->get_lang_params($_SESSION['language']);
		}
	
		if(!isset($_SESSION['language']))
		{
			$lang_params = $language_main->get_lang_params('ru', true);
		}
	}
	
	define("selected_","selected_", true);
	list($lang_code, $fb_lang, $text_lang) = $lang_params;
	${selected_.$lang_code} = 'active';
?>
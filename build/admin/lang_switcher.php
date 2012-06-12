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
 
 
 lang_switcher.php - SETUP DEFAULT LANGUAGE OR APPLY LANGUAGE SAVED IN SESSION OR COOKIES.
 TO APPLY LANGUAGE THRU POST OR GET PARAMS - JUST PASS ANY PARAMETER LIKE "..php?en=1"
 WHERE "EN" IS LANG_CODE FROM LANG_TABLE
 AND "1" IS RANDOM IDENTIFICATOR OF WHATEVER
 
 AFTER THIS FILE YOU WILL HAVE GLOBAL VARIABLES:
 $lang_code - LANGUAGE CODE LIKE "en"
 $fb_lang - LANGUAGE CODE LIKE "en_US"
 $text_lang - LANGUAGE NAME IN HUMAN TEXT LIKE "english"
 */
 
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
		
		//IF SESSION, GET, POST AND COOKIE EMPTY SET DEFAULT LANGUAGE
		if(!isset($_SESSION['language']))
		{
			$lang_params = $language_main->get_lang_params('ru', true);
		}
	}
	
	define("selected_","selected_", true);
	list($lang_code, $fb_lang, $text_lang) = $lang_params;
	${selected_.$lang_code} = 'active';
?>
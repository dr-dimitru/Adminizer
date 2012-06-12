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
 
 
 settings.php - MAIN SETTING OF YOUR PROJECT.
           
 AFTER THIS FILE YOU WILL HAVE GLOBAL VARIABLES:
 $mysqli - OBJECT: Represents a connection between PHP and a MySQL database.
 SQLPREFIX - CONSTANT OF DB TABLES PREFIX.
 HOSTNAME - CONSTANT OF NAME OF DB-SERVER HOST.
 USERNAME - CONSTANT OF USERNAME FOR CONNECTION TO DB
 PASSWORD - CONSTANT OF PASSWORD FOR CONNECTION TO DB
 DBNAME - CONSTANT OF NAME OF DATABASE
 
 SITE_URL - CONSTANT OF PRIMARY URL LIKE "HTTP://YOURSITE.COM"
 PAGES_CHARSET - CONSTANT FOR <META CHARSET="PAGES_CHARSET"> TAG ON PAGES
 MYSQL_CHARSET - CONSTANT FOR CHARSET OF DB CONNECTION
 FILES_ENCODING - CONSTANT OF FILE'S ENCODING. SET IN HEADER().
 */

//MySQLi CONNECT
	//VARIABLES FOR MySQL DB
 	define("SQLPREFIX", "adminizer_", true);
 	define("HOSTNAME", "", true);
 	define("USERNAME", "", true);
 	define("PASSWORD", "", true);
 	define("DBNAME", "", true);
 	
 	
 	$mysqli = new mysqli(HOSTNAME,USERNAME,PASSWORD,DBNAME);
 //CONNECT TO DB
 	
 	if (mysqli_connect_errno()) { 
 	   printf("Can not connect. Error: %s\n", mysqli_connect_error());
 	   exit(); 
 	}
//END MySQLi CONNECT	
 	
//MAIN SITE SETTINGS
//SITE PREFERENCES
define("SITE_URL", "", true);
define("PAGES_CHARSET", "UTF-8", true);
define("MYSQL_CHARSET", "utf8", true);
define("FILES_ENCODING", "UTF-8", true);

//SET SOME SETTINGS AND MAIN CONNECTIONS
session_cache_limiter('private_no_expire, must-revalidate');
session_start();

header('Content-Type: text/html; charset='.FILES_ENCODING);
ini_set('display_errors', 1);

//UNCOMMENT TO DEBUG YOURS SERVER
//error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);

session_set_cookie_params(60*60*24,'/',SITE_URL,false,false);
$mysqli->set_charset(MYSQL_CHARSET);
?>
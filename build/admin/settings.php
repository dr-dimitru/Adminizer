<?php
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
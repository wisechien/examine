<?php
$web_url = $_SERVER['PHP_SELF'];
$web_url = strrchr($web_url,"/"); 
$web_url = str_replace("/","",$web_url);
$web_domain = $_SERVER["HTTP_HOST"];
$host_url = "http://" . $web_domain;
//Fixed meta
$web_Generator =" ";
$copyright ="  ";
$seo_title_tw ="  ";
$web_site_title = "SuperABC 語文能力測驗";
	
//for Faebook 
$web_site_og_type="Education";
$web_site_og_site_name=" ";
$web_site_favicon_ico=" favicon_ico";

//for mysql
 
$mysql_host_port = 'localhost:8889'; 
$mysql_user = 'root';
$mysql_password = 'root';
$db_name = 'quiz'; 

$user = 'root';
$password = 'root';
$db = 'quiz';
$host = 'localhost';
$port = 8889;
//$link = mysqli_init();
$link = mysql_connect("localhost", "root", "root");
mysql_connect("localhost", "root", "root") or
    die("Could not connect: " . mysql_error());
 mysql_select_db("quiz");
//$serverset = "character_set_connection='utf8', character_set_results='utf8', character_set_client='binary'";
 
//mysql_query("SET $serverset");
//mysql_select_db("$db_name") or die("Could not select database");
 

//mysql_set_charset('utf8', $connection);

?>
 
 
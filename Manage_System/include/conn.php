<?    
$web_url = $_SERVER['PHP_SELF'];
$web_url = strrchr($web_url,"/"); 
$web_url = str_replace("/","",$web_url);
$web_domain = $_SERVER["HTTP_HOST"];
$host_url = "http://" . $web_domain;
//Fixed meta
$web_Generator =" ";
$copyright ="  ";
$seo_title_tw ="  ";
$web_site_title = " ";
	
//for Faebook 
$web_site_og_type="Education";
$web_site_og_site_name=" ";
$web_site_favicon_ico=" favicon_ico";

//for mysql
 
$mysql_host_port = 'localhost:3306'; 
$mysql_user = 'root';
$mysql_password = 'root';
$db_name = 'study'; 

$connection = mysql_connect($mysql_host_port,$mysql_user,$mysql_password) or die("Could not connect");
$link = mysql_connect($mysql_host_port,$mysql_user,$mysql_password) or die("Could not connect");

$serverset = "character_set_connection='utf8', character_set_results='utf8', character_set_client='binary'";
mysql_query("SET $serverset");
mysql_select_db("$db_name") or die("Could not select database");

//meiupic Config
$db_name = 'study';
$db_config = array( 
'adapter'  => 'mysql',
'host'     => 'localhost',
'port'     => '3306',
'dbuser'   =>$mysql_user,
'dbpass'   =>$mysql_password,
'dbname'   => $db_name,
'pconnect' => false,
'charset'  => 'utf8',
'pre'      => 'meu_'
);

mysql_set_charset('utf8', $connection);

?>
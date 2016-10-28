<?
	 function replace_fck_url($txt){
	$tmp_web_url = $_SERVER['PHP_SELF'];
	$tmp_web_url = strrchr($tmp_web_url,"/"); 
	$tmp_web_url = str_replace("/","",$tmp_web_url);
	if(stristr($_SERVER['PHP_SELF'],"/manage/")){
		$tmp_web_url = str_replace("/manage/$tmp_web_url","",$_SERVER['PHP_SELF']);
	}else{
		$tmp_web_url = str_replace("/$tmp_web_url","",$_SERVER['PHP_SELF']);
	}	
 	$txt = str_replace("/UserFiles/","$tmp_web_url/UserFiles/",$txt);
	//echo $txt;exit;
 	return $txt;//$txt; 
 }
 
 function replace_request_src($txt){
	$tmp_web_url = $_SERVER['PHP_SELF'];
	$tmp_web_url = strrchr($tmp_web_url,"/"); 
	$tmp_web_url = str_replace("/","",$tmp_web_url);
	if(stristr($_SERVER['PHP_SELF'],"/manage/")){
		$tmp_web_url = str_replace("/manage/$tmp_web_url","",$_SERVER['PHP_SELF']);
	}else{
		$tmp_web_url = str_replace("/$tmp_web_url","",$_SERVER['PHP_SELF']);
	}	
	$tmp_web_url.= "/UserFiles/";
	//echo $tmp_web_url;exit;
	//echo $tmp_3;exit;	
 	$txt = str_replace($tmp_web_url,"/UserFiles/",$txt);
 	return $txt;//$txt; 
 } 
 
  function replace_request_src_2($txt){
	$tmp_1 = stristr($txt,"src=");
	$tmp_2 = stristr($txt,"/UserFiles/");
	$tmp_3 = substr($tmp_1,5,strlen($tmp_1) - strlen($tmp_2)-4);
	echo $tmp_3;exit;	
 	$txt = str_replace($tmp_3,"/",$txt);
	
 	return $txt;//$txt; 
 } 
 	// 處理SQL查詢式的字串
function GetSQLValue($value, $type) 
{
  	switch ($type) 
	{
    	case "text":
		    $value = ($value != "") ? "'" . htmlspecialchars($value, ENT_QUOTES) . "'" : "NULL";
      		break;
    	case "int":
	        $value = ($value != "") ? intval($value) : "NULL";
      		break;
	    case "double":
    	    $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      		break;
		case "date":
		    $value = ($value != "") ? "'" . htmlspecialchars($value, ENT_QUOTES) . "'" : "NULL";
      		break;
  	}
  
  	return $value;
}
function uniDecode($str)
{
 	return preg_replace_callback("/%u[0-9A-Za-z]{4}/", toUtf8, $str);
}
function toUtf8($ar)
{
	foreach( $ar as $val)
  	{
    	$val = intval(substr($val,2), 16);

    	if ($val < 0x7F)
		{        
			// 0000-007F
	        $c .= chr($val);
    	}
		elseif ($val < 0x800) 
		{ 
	    	// 0080-0800
	        $c .= chr(0xC0 | ($val / 64));
    	    $c .= chr(0x80 | ($val % 64));
	    }
		else
		{   
		    // 0800-FFFF
        	$c .= chr(0xE0 | (($val / 64) / 64));
	        $c .= chr(0x80 | (($val / 64) % 64));
    	    $c .= chr(0x80 | ($val % 64));
	    }
  	}
	
  	return $c;
}

 function getPay2($id){
	$tmp = "";
	if($id == 1){
		$tmp = "新信息";
	}else if($id == 2){
		$tmp = "已讀";
	}else if($id == 3){
		$tmp = "已回覆";
	}
 	return $tmp;
 } 
 function getHtmlUrl($txt){ 
 	return str_replace(".php",".htm",$txt);
 }
 
 function filter($txt,$int_type){
	$var = $_GET[$txt];
	if($var==''){
		$var = $_POST[$txt];
	}
	$var = trim($var);
	if($int_type==0){
		if($var==''){
			return 0;
		}else{
			return (float) $var;
		}
	}else{
		$var = eregi_replace("update "," ",$var);
		$var = eregi_replace("insert "," ",$var);
		$var = eregi_replace("select "," ",$var);
		$var = eregi_replace("drop "," ",$var);
	}
	return $var;
 }



 function cutStr($txt,$len){
	return mb_substr($txt, 0,$len, 'utf-8');
 }

 function delHtml($a){
	return preg_replace('/<(.*?)>/','',$a);
 }

 function GetParentToHidden(){    
    $tmp_par = "";
	foreach($_GET as $key=>$target){ 
	     if($key != "account" && $key != "password" && $key != "do_login" && $key != "u" && $key != "page" && $key != "int_Var"){  
			$tmp_par.="<input type=\"hidden\" name=\"$key\" value=\"$target\">\n";
		 }
	}
	foreach($_POST as $key=>$target){   
		if($key != "account" && $key != "password" && $key != "do_login" && $key != "u" && $key != "page" && $key != "int_Var"){ 
			$tmp_par.="<input type=\"hidden\" name=\"$key\" value=\"$target\">\n";
		}	 
	}
	return $tmp_par;
 }

 function fixsql($txt,$int_type){
    $var = $_GET[$txt];
	if($var==''){
		$var = $_POST[$txt];
	}
	$var = trim($var);
 	if($int_type==0){
		if($var==''){
			return 0;
		}else{
			return (float) $var;
		}
	}else if($int_type==2){
		if($var==''){
			return 0;
		}else{
			return (float) $var;
		}
	}else{
		
		if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()){
			//$var = str_replace("\\\"", "&quot;",$var);
			$var = str_replace("\\'", "&#039;",$var);
			//$var = str_replace("\\''", "&#039;",$var);
		}else{
			//$var = str_replace("\"", "&quot;",$var);
			$var = str_replace("'", "&#039;",$var);
		}		
	
	}
	return $var;
 }
 

function DateDiff($date1,$date2,$unit=""){
switch ($unit){ 
case 's': 
	$dividend = 1; 
	break; 
case 'i': 
     $dividend = 60; 
break; 
case 'h': 
     $dividend = 3600; 
     break; 
case 'd': 
     $dividend = 86400; 
	 break; 
default: 
	 $dividend = 86400; 
} 
$time1 = strtotime($date1); 
$time2 = strtotime($date2); 
if ($time1 && $time2) {
	return (float)($time1 - $time2) / $dividend; 
}
return false; 
}
 
 function del($path,$file_name){
    if($file_name!="" && $file_name!="no.gif"){
		$file_path = realpath($path . "/" . $file_name);
		if(file_exists($file_path)){
			unlink($file_path);
		} 
	}
 }
 
 function addZero($txt,$num){
	if($txt==0){
		$txt = "";
    }else if($txt != ""){
		if($num==3){
			if($txt<10){
				return "00" . $txt;
			}else if($txt < 100){
				return "0" . $txt;
			}
		}else if($num == 2){
			if($txt<10){
				return "0" . $txt;
			}
		}
	}	
    return $txt;
 }
 
 function redirect($url){
   echo "<script>window.location='".$url."';</script>";
   exit;
 }
 
 function getUpDownSql($t_name){
	$tmp = ""; 
	if($t_name <> ""){ 
		$t_name .= ".";
	}
	$realDate = date('Y-m-d',time());
	$tmp  = $t_name . "upordown=1 and ((" . $t_name . "uptime<='" . $realDate . "' and " . $t_name . "downtime='') ";
    $tmp .= "or (" . $t_name . "uptime='' and " . $t_name . "downtime='') or (";
	$tmp .= $t_name . "uptime='' and " . $t_name . "downtime>'";
    $tmp .= $realDate  . "') or (" . $t_name . "uptime<='" . $realDate . "' and " . $t_name . "downtime>'" . $realDate . "'))";
	return $tmp;
 }
 
 function getRealDate(){
 	return date('Y-m-d',time());
 }
 
 function getRandNum(){
 	return time() . rand(1000,2000);
 }
 

 function mysendmail($to_email,$from_email,$from_name,$subject,$morningbody,$smtp_server,$smtp_user,$smtp_pass) {
 		
  	$smtpserver = $smtp_server;

	$smtpserverport =25;
	
	$smtpusermail = $from_email;
	
	$smtpemailto = $to_email;
	
	$smtpuser = $smtp_user;
	
	$smtppass = $smtp_pass;
	
	$mailsubject = $subject;
	
	$mailbody = $morningbody;
	
	$mailtype = "HTML";
	
	########################################## 
	
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass); 
	
	$smtp->debug =  FALSE;//TRUE;//
	$smtp->sendmail($smtpemailto,$from_name,$smtpusermail,$mailsubject, $mailbody, $mailtype); 
	
 }  

?>
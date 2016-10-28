<?php

function getRealDate(){
 	return date('Y-m-d',time());
 }
 
 function getRandNum(){
 	return time() . rand(1000,2000);
 }

function redirecturl($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
 
 function cutStr($txt,$len){
  return mb_substr($txt, 0,$len, 'utf-8');
 }

 function delHtml($a){
  return preg_replace('/<(.*?)>/','',$a);
 }

  function getHtmlUrl($txt){ 
  return str_replace(".php",".htm",$txt);
 } 

 function _insert_class_level($get_qid, $get_answer, $get_optionsRadios, $test_id,$total_cur,$RandNum)
{
  $realDate = date('Y-m-d',time()); 
  	mysql_query("INSERT INTO sessions  (qid, answer, optionsRadios, test_id, total_cur,data,RandNum)VALUES  ('$get_qid', '$get_answer', '$get_optionsRadios', '$test_id','$total_cur','$realDate',$RandNum)") or die("query db INSERT sessions false!!!");   
}

function _change_level($cur) {
//切換 題型 
  //echo "cur=".$cur;
  switch ($cur) {
        case '1':
       $get_question_type = ListenPic;
      break;
        case '2':
       $get_question_type = ListenPic;
      break;
        case '3':
       $get_question_type = ListenPhrase;
      break;
      case '4':
       $get_question_type = ListenPhrase;
      break;
      case '5':
       $get_question_type =  Letter;
      break; 
      case '6':
       $get_question_type = Letter;
      break;
     case '7':
       $get_question_type =  Letter;
      break;
       case '8':
       $get_question_type =  Grammar;
      break;
       case '9':
       $get_question_type = Grammar;
        break; 
  }
  return $get_question_type;
}


 function _insert_class($get_testid, $get_level,$get_cur,$get_incorrect_score,$get_correct,$RandNum)
{
	 $realDate = date('Y-m-d',time());
	$access = $realDate;
	$test_id = $get_testid;
	$cur = $get_cur;
	$incorrect_score = $get_incorrect_score;
	$correct = $get_correct;
   
    switch ($cur) {
    case '9': 
      	mysql_query("INSERT INTO class_level(test_id, set1 ,realDate,set1_correct,RandNum)VALUES  ('$test_id','$get_level' ,'$realDate','$get_correct','$RandNum')") or die("query db false 1"); 
       break;
    case '18':  
     $mysql2 = "UPDATE class_level SET set2 = $get_level ,set2_correct= '$get_correct'  WHERE test_id = '$test_id'";
      //echo $mysql2;
      	mysql_query("UPDATE class_level SET set2 = '$get_level' ,set2_correct= '$get_correct'  WHERE test_id = '$test_id'") or die("query db false 2");  
       break;
    case '27': 
      	mysql_query("UPDATE class_level SET set3 = '$get_level' ,set3_correct= '$get_correct' WHERE test_id = '$test_id'") or die("query db false 3");
      break;
    case '36': 
        mysql_query("UPDATE class_level SET set4 = '$get_level' ,set4_correct= '$get_correct' WHERE test_id = '$test_id'") or die("query db false 4");
      break;
	case '45': 
       mysql_query("UPDATE class_level SET set5 = '$get_level', incorrect_score = '$incorrect_score' ,set5_correct= '$get_correct'WHERE test_id = '$test_id'") or die("query db false 5 ");
      break; 
   }  
  }
 function _last_level($last_repeat)
{
$get_last_repeat = $last_repeat;
  switch ($get_last_repeat) {
    case '1':
      $last_level = "Starter 2 <br> Level2"; 
      break;
       case '2':
      $last_level = "Starter 3 <br>Level3"; 
      break;
       case '3':
      $last_level = "Starter 4 <br>Level4"; 
      break;
       case '4':
      $last_level = "Walker 1 <br>Level5"; 
      break;
       case '5':
      $last_level = "Walker 2 <br>Level6"; 
      break;
       case '6':
      $last_level = "Walker 3 <br>Level7"; 
      break;
         case '7':
      $last_level = "Walker 4 <br>Level8"; 
      break;
         case '8':
      $last_level = "Jumper 1 <br>Level9"; 
      break;
         case '9':
      $last_level = "Jumper 2 <br>Level10"; 
      break;
         case '10':
      $last_level = "Jumper 3 <br>Level11"; 
      break;
         case '11':
      $last_level = "Jumper 4 <br>Level12"; 
      break;
        case '12':
      $last_level = "Runer 1 <br>Level13"; 
      break;
        case '13':
      $last_level = "Runer 2 <br>Level14"; 
      break;
        case '14':
      $last_level = "Runer 3 <br>Level15"; 
      break;
        case '15':
      $last_level = "Runer 4 <br>Level16"; 
      break;
      	default;
      	echo "做題有誤 請重新答題";
      	break;
  }
  return $last_level;
}

 function _last_babycount($last_repeat)
{
$get_last_repeat = $last_repeat;
  switch ($get_last_repeat) {
    case '1': 
      # show baby counter
     $last_level = 2 ;
      break;
       case '2': 
      $last_level = 3 ;
      break;
       case '3': 
      $last_level = 4 ;
      break;
       case '4': 
      $last_level = 5 ;
      break;
       case '5': 
     $last_level = 6 ;
      break;
       case '6': 
     $last_level = "7" ;
      break;
         case '7': 
      $last_level = "8" ;
      break;
         case '8': 
       $last_level = "9" ;
      break;
         case '9': 
      $last_level = "10" ;
      break;
         case '10': 
      $last_level = 11 ;
      break;
         case '11': 
     $last_level = 12 ;
      break;
        case '12': 
      $last_level = 13 ;
      break;
        case '13': 
     $last_level = 14 ;
      break;
        case '14':  
     $last_level= 15 ;
      break;
        case '15': 
      $last_level = 16 ;
      break;
        default;
        echo "做題有誤 請重新答題";
        break;
  }
  return $last_level;
}

function _test_level($test_id)
{
 // Entrance Examination start  
  require('include/conn.php');
   //echo $test_id;
 $result = "SELECT *  FROM `class_level`  where test_id = '$test_id'"; 
  $rs = mysql_query($result,$link) or die(" Get test level Query failed");  
  while($list=mysql_fetch_array($rs)){  
  $set1 = $list['set1'];
  $set2 = $list['set2'];
  $set3 = $list['set3'];
  $set4 = $list['set4'];
  $set5 = $list['set5']; 
   $format_str  =  $set1.','.$set2.','.$set3.','.$set4.','.$set5 ; 
   //$format_level = _last_level($set1).','._last_level($set2).','._last_level($set3).','._last_level($set4).','._last_level($set5) ;
}
       $str =$format_str;
     //$str = "11,11,13,14,1";
    $arr = explode(',', $str);
    $arrCount = array_count_values($arr);
    $temp= false;
    for($i=count($arr)-1;$i> 0;$i--) {
        if($arrCount[$arr[$i]] > 1) {
           $last_repeat = $arr[$i]; 
           //echo "Level=".$last_repeat."<br>";
           //echo "Level="._last_level($last_repeat)."<br>"; 
           $temp = true;
           break;
    } 
        }
     if(!$temp) {
     $last_repeat = end($arr); 
           }  
       //echo "<span class=\"badge\">"._last_level($last_repeat)."</span>";   
      //echo "'<br>建議級數 <span class=\"badge\">"._last_level($last_repeat)."</span><br>".$test_id."'";  
              $baby_count =  _last_babycount($last_repeat); 
    return $baby_count;
}

function _format_str($test_id,$RandNum)
{ 
    require('include/conn.php'); 
 $result = "SELECT *  FROM `class_level`  where test_id = '$test_id' AND RandNum = '$RandNum'"; 
  $rs = mysql_query($result,$link) or die(" Get test level Query failed");  
  while($list=mysql_fetch_array($rs)){   
  $set1 = $list['set1_correct'];
  $set2 = $list['set2_correct'];
  $set3 = $list['set3_correct'];
  $set4 = $list['set4_correct'];
  $set5 = $list['set5_correct']; 
   $format_str  =  $set1.','.$set2.','.$set3.','.$set4.','.$set5 ;  
		}
		return $format_str;
	}

	function _format_level($test_id,$RandNum)
{ 
 // Level 換置 
   require('include/conn.php'); 
 $result = "SELECT *  FROM `class_level`  where test_id = '$test_id' AND RandNum = '$RandNum'"; 
  $rs = mysql_query($result,$link) or die(" Get test level Query failed");  
  while($list=mysql_fetch_array($rs)){   
  $set1 = $list['set1'];
  $set2 = $list['set2'];
  $set3 = $list['set3'];
  $set4 = $list['set4'];
  $set5 = $list['set5'];  
   $format_level = chr(39)._last_level($set1).chr(39).','.chr(39)._last_level($set2).chr(39).','.chr(39)._last_level($set3).chr(39).','.chr(39)._last_level($set4).chr(39).','.chr(39)._last_level($set5).chr(39);
		}
		return $format_level;
	}

function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
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
 
 function del_file($path,$file_name){
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
/*
 *  AnyExample's good_query_... library. 
 *  
 *  See:
 *  http://www.anyexample.com/programming/php/5_useful_php_functions_for_mysql_data_fetching.xml
 *
 *  Published under AnyExample License:
 *  http://www.anyexample.com/license.xml
 *   
 *   - Do whatever you want, but do not publish 
 *     in an article or book.
 *     
 *   - Code provided as is, without any warranty
 */

function good_query($string, $debug=0)
{
    if ($debug == 1)
        print $string;

    if ($debug == 2)
        error_log($string);

    $result = mysql_query($string);

    if ($result == false)
    {
        error_log("SQL error: ".mysql_error()."\n\nOriginal query: $string\n");
  // Remove following line from production servers 
        die("SQL error: ".mysql_error()."\b<br>\n<br>Original query: $string \n<br>\n<br>");
    }
    return $result;
}

function good_query_list($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
  
    if($lst = mysql_fetch_row($result))
    {
  mysql_free_result($result);
  return $lst;
    }
    mysql_free_result($result);
    return false;
}

function good_query_assoc($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
  
    if($lst = mysql_fetch_assoc($result))
    {
  mysql_free_result($result);
  return $lst;
    }
    mysql_free_result($result);
    return false;
}

function good_query_value($sql, $debug=0)
{
    // this function require presence of good_query_list() function
    $lst = good_query_list($sql, $debug);
    return is_array($lst)?$lst[0]:false;
}

function good_query_table($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
  
    $table = array();
    if (mysql_num_rows($result) > 0)
    {
        $i = 0;
        while($table[$i] = mysql_fetch_assoc($result)) 
      $i++;
        unset($table[$i]);                                                                                  
    }                                                                                                                                     
    mysql_free_result($result);
    return $table;
}


// MySQL connecting and disconnecting 
function good_connect($host, $user, $pwd, $db)
{
  $link = @mysql_connect($host, $user, $pwd);
  if (!$link) {
    die('Can\'t connect to database server (check $host, $user, $pwd)');
    error_log('Can\'t connect to database server (check $host, $user, $pwd)');
  }
  
  $has_db = mysql_select_db($db);
  if (!$has_db)
  {
    die('Can\'t select database (check $db)');
    error_log('Can\'t select database (check $db)');
  }
}

function good_close()
{
  mysql_close();
}

// Another trivial functions

function good_row(&$result)
{
    return mysql_fetch_row($result);
}

function good_assoc(&$result)
{
    return mysql_fetch_assoc($result);
}

function good_num(&$result)
{
    return mysql_num_rows($result);
}

function good_free(&$result)
{
    return mysql_free_result($result);
}

// if you don't remember which functions 
// do need MySQL resource, and which don't
// you may pass MySQL resource to all...
function good_last($notused = 0)
{
    return mysql_insert_id();
}

function good_affected($notused = 0)
{
    return mysql_affected_rows();
}
?>